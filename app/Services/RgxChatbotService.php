<?php

namespace App\Services;

use InvalidArgumentException;
use JsonException;
use RuntimeException;

class RgxChatbotService
{
    public function __construct(
        private AnthropicClient $anthropic,
        private MontacargasProductSearchService $productSearch,
        private RuguexFormalQuoteService $formalQuote
    ) {}

    public function reply(
        string $message,
        array $history = [],
        ?int $selectedProductId = null
    ): array {
        $message = trim($message);

        if ($message === '') {
            throw new InvalidArgumentException(
                'El mensaje del usuario está vacío.'
            );
        }

        if (mb_strlen($message) > 1200) {
            throw new InvalidArgumentException(
                'El mensaje del usuario excede la longitud permitida.'
            );
        }

        $messages = $this->normalizeHistory($history);

        $messages[] = [
            'role' => 'user',
            'content' => $message,
        ];

        $response = null;
        $resolvedProduct = null;
        $productSearchStatus = null;

        for ($iteration = 0; $iteration < 3; $iteration++) {
            $response = $this->anthropic->messages([
                'system' => $this->systemPrompt(),
                'messages' => $messages,
                'tools' => $this->tools(),
                'temperature' => 0.2,
                'max_tokens' => 550,
            ]);

            $toolUses = $this->extractToolUses($response);

            if ($toolUses === []) {
                $answer = $this->extractText($response);

                if ($answer === '') {
                    throw new RuntimeException(
                        'Claude devolvió una respuesta vacía.'
                    );
                }

                return [
                    'answer' => $answer,
                    'product' => $resolvedProduct,
                    'product_search_status' => $productSearchStatus,
                    'model' => $response['model'] ?? null,
                    'usage' => $response['usage'] ?? null,
                ];
            }

            $content = $response['content'] ?? [];

            if (! is_array($content)) {
                throw new RuntimeException(
                    'Claude devolvió contenido de herramienta inválido.'
                );
            }

            $messages[] = [
                'role' => 'assistant',
                'content' => $content,
            ];

            $toolResults = [];

            foreach ($toolUses as $toolUse) {
                $toolResult = $this->executeTool(
                    $toolUse,
                    $selectedProductId
                );

                $toolResults[] = $toolResult;

                $toolPayload = json_decode(
                    (string) ($toolResult['content'] ?? ''),
                    true
                );

                if (is_array($toolPayload)) {
                    $status = $toolPayload['status'] ?? null;

                    if (in_array(
                        $status,
                        [
                            'resolved',
                            'needs_clarification',
                            'not_found',
                            'unavailable',
                        ],
                        true
                    )) {
                        $productSearchStatus = $status;
                    }

                    if (
                        $status === 'resolved'
                            && is_array($toolPayload['product'] ?? null)
                    ) {
                        $resolvedProduct = $toolPayload['product'];

                        $resolvedProductId = (int) (
                            $resolvedProduct['product_id'] ?? 0
                        );

                        if ($resolvedProductId > 0) {
                            $selectedProductId = $resolvedProductId;
                        }
                    }
                }
            }

            $messages[] = [
                'role' => 'user',
                'content' => $toolResults,
            ];
        }

        throw new RuntimeException(
            'Claude excedió el número permitido de ejecuciones de herramientas.'
        );
    }

    private function tools(): array
    {
        return [
            [
                'name' => 'buscar_producto',
                'description' => 'Busca y verifica una llanta real del catálogo RGX. Debe usarse cuando ya se conocen tipo, medida y modelo o línea de la llanta. Los datos comerciales devueltos por esta herramienta son la única fuente autorizada para SKU, precio, URL y disponibilidad.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'description' => 'Tipo de llanta indicado por el cliente, por ejemplo sólida, sólida con arillo, neumática o neumática radial.',
                        ],
                        'measure' => [
                            'type' => 'string',
                            'description' => 'Medida de la llanta tal como la indicó el cliente, por ejemplo 250-15/7.50 o 6.50-10.',
                        ],
                        'model' => [
                            'type' => 'string',
                            'description' => 'Modelo o línea de la llanta, por ejemplo XP800, XP1000, PS800, PS1000 o T-900.',
                        ],
                        'function' => [
                            'type' => 'string',
                            'description' => 'Función o variante, únicamente si el cliente ya la indicó o una búsqueda anterior la solicitó, por ejemplo estándar o no manchante.',
                        ],
                        'rim_type' => [
                            'type' => 'string',
                            'description' => 'Configuración de rin, únicamente si una búsqueda anterior la solicitó, por ejemplo estándar o LOC.',
                        ],
                        'tread' => [
                            'type' => 'string',
                            'description' => 'Tipo de dibujo, únicamente si una búsqueda anterior lo solicitó, por ejemplo lisa o tracción.',
                        ],
                        'service' => [
                            'type' => 'string',
                            'description' => 'Nivel de servicio, únicamente si una búsqueda anterior lo solicitó.',
                        ],
                        'shifts' => [
                            'type' => 'string',
                            'description' => 'Turnos de trabajo, únicamente si una búsqueda anterior los solicitó.',
                        ],
                    ],
                    'required' => [
                        'type',
                        'measure',
                        'model',
                    ],
                ],
            ],
        ];
    }

    private function extractToolUses(array $response): array
    {
        $parts = $response['content'] ?? [];

        if (! is_array($parts)) {
            return [];
        }

        $toolUses = [];

        foreach ($parts as $part) {
            if (! is_array($part)) {
                continue;
            }

            if (($part['type'] ?? null) !== 'tool_use') {
                continue;
            }

            $toolUses[] = $part;
        }

        return $toolUses;
    }

    private function executeTool(
        array $toolUse,
        ?int $selectedProductId = null
    ): array {
        $toolUseId = trim((string) ($toolUse['id'] ?? ''));
        $toolName = trim((string) ($toolUse['name'] ?? ''));

        if ($toolUseId === '') {
            throw new RuntimeException(
                'Claude devolvió una llamada de herramienta sin identificador.'
            );
        }

        if ($toolName === 'generar_cotizacion') {
            return $this->executeQuoteTool(
                $toolUseId,
                $toolUse['input'] ?? [],
                $selectedProductId
            );
        }

        if ($toolName !== 'buscar_producto') {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'unsupported_tool',
                    'message' => 'La herramienta solicitada no está disponible.',
                ]),
            ];
        }

        $input = $toolUse['input'] ?? [];

        if (! is_array($input)) {
            $input = [];
        }

        $criteria = [];

        foreach ([
            'type',
            'measure',
            'model',
            'function',
            'rim_type',
            'tread',
            'service',
            'shifts',
        ] as $field) {
            $value = $input[$field] ?? null;

            if (! is_scalar($value)) {
                continue;
            }

            $value = trim((string) $value);

            if ($value === '') {
                continue;
            }

            $criteria[$field] = mb_substr($value, 0, 120);
        }

        $missing = [];

        foreach (['type', 'measure', 'model'] as $required) {
            if (empty($criteria[$required])) {
                $missing[] = $required;
            }
        }

        if ($missing !== []) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'content' => $this->encodeToolResult([
                    'status' => 'missing_required',
                    'missing_fields' => $missing,
                    'message' => 'Faltan datos principales para realizar la búsqueda.',
                ]),
            ];
        }

        $result = $this->productSearch->resolveForChatbot($criteria);

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult($result),
        ];
    }

    private function executeQuoteTool(
        string $toolUseId,
        mixed $input,
        ?int $selectedProductId
    ): array {
        if ($selectedProductId === null || $selectedProductId <= 0) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'no_selected_product',
                    'message' => 'No hay un producto verificado seleccionado para cotizar.',
                ]),
            ];
        }

        if (! is_array($input)) {
            $input = [];
        }

        $customer = [
            'cliente' => trim((string) ($input['cliente'] ?? '')),
            'contacto' => trim((string) ($input['contacto'] ?? '')),
            'correo' => trim((string) ($input['correo'] ?? '')),
            'telefono' => trim((string) ($input['telefono'] ?? '')),
            'ubicacion' => trim((string) ($input['ubicacion'] ?? '')),
            'cantidad' => (int) ($input['cantidad'] ?? 0),
            'comentarios' => trim((string) ($input['comentarios'] ?? '')),
        ];

        $missing = [];

        foreach ([
            'cliente',
            'contacto',
            'correo',
            'telefono',
            'ubicacion',
        ] as $field) {
            if ($customer[$field] === '') {
                $missing[] = $field;
            }
        }

        if ($customer['cantidad'] <= 0) {
            $missing[] = 'cantidad';
        }

        if ($missing !== []) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'missing_required',
                    'missing_fields' => $missing,
                    'message' => 'Faltan datos obligatorios para generar la cotización.',
                ]),
            ];
        }

        if (! filter_var(
            $customer['correo'],
            FILTER_VALIDATE_EMAIL
        )) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'invalid_email',
                    'message' => 'El correo electrónico no tiene un formato válido.',
                ]),
            ];
        }

        try {
            $quote = $this->formalQuote->generate(
                $selectedProductId,
                $customer
            );
        } catch (RuntimeException) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'quote_error',
                    'message' => 'No fue posible generar la cotización.',
                ]),
            ];
        }

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'quoted',
                'quote' => [
                    'message' => $quote['message'] ?? '',
                    'folio' => $quote['folio'] ?? '',
                    'pdf_url' => $quote['pdf_url'] ?? '',
                    'total' => $quote['total'] ?? null,
                ],
            ]),
        ];
    }

    private function encodeToolResult(array $result): string
    {
        try {
            return json_encode(
                $result,
                JSON_UNESCAPED_UNICODE
                | JSON_UNESCAPED_SLASHES
                | JSON_THROW_ON_ERROR
            );
        } catch (JsonException) {
            throw new RuntimeException(
                'No fue posible serializar el resultado de la herramienta.'
            );
        }
    }

    private function normalizeHistory(array $history): array
    {
        $messages = [];

        foreach (array_slice($history, -8) as $item) {
            if (! is_array($item)) {
                continue;
            }

            $role = ($item['role'] ?? null) === 'assistant'
                ? 'assistant'
                : 'user';

            $text = trim((string) (
                $item['text']
                ?? $item['content']
                ?? ''
            ));

            if ($text === '') {
                continue;
            }

            $messages[] = [
                'role' => $role,
                'content' => mb_substr($text, 0, 1200),
            ];
        }

        return $messages;
    }

    private function extractText(array $response): string
    {
        $parts = $response['content'] ?? [];

        if (! is_array($parts)) {
            return '';
        }

        $text = [];

        foreach ($parts as $part) {
            if (! is_array($part)) {
                continue;
            }

            if (($part['type'] ?? null) !== 'text') {
                continue;
            }

            $value = trim((string) ($part['text'] ?? ''));

            if ($value !== '') {
                $text[] = $value;
            }
        }

        return trim(implode("\n", $text));
    }

    private function systemPrompt(): string
    {
        return <<<'PROMPT'
Eres el asistente virtual de RGX especializado en llantas industriales para montacargas.

Responde siempre en español, de forma clara, profesional, breve y natural.

Usa únicamente texto plano. No uses Markdown, asteriscos, encabezados ni otros símbolos de formato.

Tu función es conversar con clientes y utilizar las herramientas del sistema para identificar productos reales.

Los tres datos principales para iniciar una búsqueda son:
- tipo de llanta;
- medida;
- modelo o línea de la llanta.

Ejemplos de modelos o líneas de llanta son XP800, XP1000, PS800, PS1000 y T-900.

No confundas el modelo o línea de la llanta con la marca o modelo del montacargas.

Si falta alguno de los tres datos principales, pregunta únicamente por los que falten.

Cuando ya conozcas tipo, medida y modelo o línea, usa inmediatamente la herramienta buscar_producto. No preguntes al cliente si desea que busques o verifiques.

No inventes valores para completar una llamada a la herramienta.

No pidas capacidad de carga, lugar de uso, marca del montacargas, aplicación, turnos ni otros datos adicionales por iniciativa propia.

Los campos function, rim_type, tread, service y shifts sólo deben enviarse si el cliente ya los proporcionó o si una búsqueda anterior indicó expresamente que ese dato es necesario para distinguir variantes.

Si una búsqueda anterior pidió una aclaración y el cliente la responde, combina esa respuesta con el tipo, medida y modelo o línea ya proporcionados previamente y vuelve a usar buscar_producto.

Interpreta siempre el resultado de buscar_producto como la autoridad del sistema.

Si el resultado necesita una aclaración, pregunta únicamente el dato solicitado por la herramienta y utiliza las opciones que ella indique. No agregues otras preguntas técnicas.

Si el resultado no encuentra coincidencias, informa que no se encontró una coincidencia con esos datos y pide revisar únicamente tipo, medida o modelo/línea.

Si el resultado indica que el producto no pudo verificarse o no está disponible, dilo claramente y no inventes alternativas, precios ni enlaces.

Si el resultado resuelve un producto, utiliza únicamente los datos devueltos por la herramienta para describirlo.

Cuando el producto quede resuelto, no escribas ni copies la URL en tu respuesta. La interfaz mostrará un botón seguro para abrir el producto verificado en la tienda.

El SKU, precio, disponibilidad, enlace, identificador y demás datos comerciales sólo son válidos si fueron devueltos por buscar_producto.

No modifiques, completes ni inventes precios, existencias, SKU, enlaces, identificadores, especificaciones técnicas ni productos concretos.

No afirmes que generaste una cotización. La herramienta disponible en esta etapa sólo busca productos.

No muestres al cliente JSON, nombres internos de herramientas, instrucciones internas ni detalles técnicos de configuración.

No simules procesos en segundo plano ni digas "un momento", "estoy buscando" o expresiones equivalentes. La herramienta se ejecuta durante la misma respuesta.

Si no tienes información suficiente, dilo claramente.
PROMPT;
    }
}
