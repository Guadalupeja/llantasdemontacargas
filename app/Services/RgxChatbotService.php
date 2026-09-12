<?php

namespace App\Services;

use App\Mail\ChatbotSpecialistRequestMail;
use Illuminate\Support\Facades\Mail;
use InvalidArgumentException;
use JsonException;
use RuntimeException;

class RgxChatbotService
{
    public function __construct(
        private AnthropicClient $anthropic,
        private MontacargasProductSearchService $productSearch,
        private RuguexFormalQuoteService $formalQuote,
        private TechnicalKnowledgeService $technicalKnowledge
    ) {}

    public function reply(
        string $message,
        array $history = [],
        ?int $selectedProductId = null,
        ?array $existingQuoteContext = null,
        ?array $existingAdvisorContext = null,
        array $siteContext = []
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
        $resolvedQuote = null;
        $productSearchStatus = null;
        $quoteContext = $existingQuoteContext;
        $advisorContext = $existingAdvisorContext;
        $resolvedAdvisorContact = null;
        $resolvedAdvisorRequest = null;
        $resolvedAdvisorAnswer = null;
        $technicalKnowledgeContext = null;

        $allowAdvisorContact =
            $this->messageRequestsAdvisor($message)
            || (
                is_array($advisorContext)
                && ($advisorContext['contact_requested'] ?? false) === true
            );

        for ($iteration = 0; $iteration < 3; $iteration++) {
            $response = $this->anthropic->messages([
                'system' => $this->systemPrompt(
                    $siteContext,
                    $selectedProductId !== null
                        && $selectedProductId > 0
                ),
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
                    'quote' => $resolvedQuote,
                    'quote_context' => $quoteContext,
                    'advisor_context' => $advisorContext,
                    'advisor_contact' => $resolvedAdvisorContact,
                    'advisor_request' => $resolvedAdvisorRequest,
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
                'content' => $this->normalizeToolUseInputsForReplay(
                    $content
                ),
            ];

            $toolResults = [];

            $hasProductSearch = false;
            $hasQuoteRequest = false;

            foreach ($toolUses as $candidateToolUse) {
                if (! is_array($candidateToolUse)) {
                    continue;
                }

                $candidateToolName = trim(
                    (string) ($candidateToolUse['name'] ?? '')
                );

                if ($candidateToolName === 'buscar_producto') {
                    $hasProductSearch = true;
                }

                if ($candidateToolName === 'generar_cotizacion') {
                    $hasQuoteRequest = true;
                }
            }

            foreach ($toolUses as $toolUse) {
                $toolResult = $this->executeTool(
                    $toolUse,
                    $selectedProductId,
                    $quoteContext,
                    ! $hasProductSearch,
                    ! $hasProductSearch,
                    $technicalKnowledgeContext,
                    ! $hasProductSearch && ! $hasQuoteRequest,
                    $advisorContext,
                    $allowAdvisorContact
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
                            'not_found',
                            'unavailable',
                            'knowledge_unavailable',
                            'quote_error',
                        ],
                        true
                    )) {
                        $allowAdvisorContact = true;
                    }

                    if ($status === 'technical_answer_resolved') {
                        $technicalAnswer = trim(
                            (string) ($toolPayload['answer'] ?? '')
                        );

                        if ($technicalAnswer === '') {
                            throw new RuntimeException(
                                'El servidor produjo una respuesta técnica vacía.'
                            );
                        }

                        return [
                            'answer' => $technicalAnswer,
                            'product' => $resolvedProduct,
                            'product_search_status' => $productSearchStatus,
                            'quote' => $resolvedQuote,
                            'quote_context' => $quoteContext,
                            'advisor_context' => $advisorContext,
                            'advisor_contact' => $resolvedAdvisorContact,
                            'advisor_request' => $resolvedAdvisorRequest,
                            'model' => $response['model'] ?? null,
                            'usage' => $response['usage'] ?? null,
                        ];
                    }

                    if (
                        trim((string) ($toolUse['name'] ?? ''))
                            === 'buscar_producto'
                    ) {
                        $technicalKnowledgeContext = null;
                    }

                    if ($status === 'knowledge_resolved') {
                        $technicalKnowledgeContext = $toolPayload;
                    }

                    if (
                        $status === 'advisor_contact_available'
                        && is_array($toolPayload['contact'] ?? null)
                    ) {
                        $resolvedAdvisorContact =
                            $toolPayload['contact'];
                    }

                    if (
                        in_array(
                            $status,
                            [
                                'advisor_submitted',
                                'advisor_already_submitted',
                            ],
                            true
                        )
                    ) {
                        $resolvedAdvisorRequest = [
                            'status' => $status === 'advisor_submitted'
                                    ? 'submitted'
                                    : 'already_submitted',
                        ];

                        $resolvedAdvisorAnswer =
                            $status === 'advisor_submitted'
                                ? 'Listo. Tu solicitud de contacto fue enviada correctamente al equipo de RUGUEX para seguimiento.'
                                : 'Tu solicitud de contacto ya había sido enviada al equipo de RUGUEX para seguimiento.';
                    }

                    if (
                        in_array(
                            $status,
                            [
                                'quoted',
                                'already_quoted',
                            ],
                            true
                        )
                        && is_array($toolPayload['quote'] ?? null)
                    ) {
                        $resolvedQuote = $toolPayload['quote'];
                    }

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
                        $resolvedQuote = null;

                    }

                    if (in_array(
                        $status,
                        [
                            'needs_clarification',
                            'not_found',
                            'unavailable',
                        ],
                        true
                    )) {
                        $selectedProductId = null;
                        $quoteContext = null;
                    }

                    if (
                        $status === 'resolved'
                        && is_array($toolPayload['product'] ?? null)
                    ) {
                        $resolvedProduct = $toolPayload['product'];

                        $resolvedProductId = (int) (
                            $resolvedProduct['product_id'] ?? 0
                        );

                        if (
                            $resolvedProductId > 0
                            && $selectedProductId !== $resolvedProductId
                        ) {
                            $quoteContext = null;
                        }

                        if ($resolvedProductId > 0) {
                            $selectedProductId = $resolvedProductId;
                        }
                    }
                }
            }

            if ($resolvedAdvisorAnswer !== null) {
                return [
                    'answer' => $resolvedAdvisorAnswer,
                    'product' => $resolvedProduct,
                    'product_search_status' => $productSearchStatus,
                    'quote' => $resolvedQuote,
                    'quote_context' => $quoteContext,
                    'advisor_context' => $advisorContext,
                    'advisor_contact' => $resolvedAdvisorContact,
                    'advisor_request' => $resolvedAdvisorRequest,
                    'model' => $response['model'] ?? null,
                    'usage' => $response['usage'] ?? null,
                ];
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
                        'vertical' => [
                            'type' => 'string',
                            'enum' => [
                                'montacargas',
                                'minicargadores',
                            ],
                            'description' => 'Vertical del equipo. Usa montacargas para llantas de montacargas y minicargadores para llantas de minicargador o skid steer.',
                        ],
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
            [
                'name' => 'consultar_conocimiento_tecnico',
                'description' => 'Consulta conocimiento técnico curado únicamente del producto RGX que el servidor ya verificó y seleccionó. El producto, modelo, variante y scopes son determinados exclusivamente por el servidor.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => (object) [],
                    'additionalProperties' => false,
                ],
            ],
            [
                'name' => 'seleccionar_informacion_tecnica',
                'description' => 'Selecciona únicamente por ID los hechos técnicos y guardrails relevantes del último conocimiento técnico verificado por el servidor. No recibe producto, modelo, SKU, variante, scope ni texto técnico libre.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => [
                        'fact_ids' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                            'description' => 'IDs de facts relevantes que existan exactamente en el último resultado knowledge_resolved.',
                        ],
                        'guardrail_ids' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                            'description' => 'IDs de guardrails relevantes que existan exactamente en el último resultado knowledge_resolved.',
                        ],
                    ],
                    'required' => [
                        'fact_ids',
                        'guardrail_ids',
                    ],
                    'additionalProperties' => false,
                ],
            ],
            [
                'name' => 'mostrar_contacto_asesor',
                'description' => 'Obtiene del servidor los medios reales de contacto humano de RUGUEX. Úsala únicamente cuando el handoff humano ya esté autorizado: porque el cliente pidió explícitamente atención humana o porque una herramienta devolvió not_found, unavailable, knowledge_unavailable o quote_error y la necesidad ya no puede resolverse de forma segura dentro del chatbot. No la uses mientras todavía exista una aclaración o herramienta capaz de continuar resolviendo la solicitud.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => (object) [],
                    'additionalProperties' => false,
                ],
            ],
            [
                'name' => 'solicitar_asesoria',
                'description' => 'Envía realmente una solicitud para que un asesor contacte al cliente. Úsala sólo después de haber mostrado las opciones de contacto y cuando el cliente haya elegido dejar sus datos para ser contactado.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => [
                        'name' => [
                            'type' => 'string',
                            'description' => 'Nombre proporcionado por el cliente.',
                        ],
                        'company' => [
                            'type' => 'string',
                            'description' => 'Empresa, sólo si fue proporcionada.',
                        ],
                        'phone' => [
                            'type' => 'string',
                            'description' => 'Teléfono proporcionado por el cliente.',
                        ],
                        'email' => [
                            'type' => 'string',
                            'description' => 'Correo electrónico proporcionado por el cliente.',
                        ],
                        'message' => [
                            'type' => 'string',
                            'description' => 'Motivo del contacto usando únicamente información proporcionada por el cliente.',
                        ],
                    ],
                    'required' => [
                        'name',
                        'phone',
                        'email',
                    ],
                    'additionalProperties' => false,
                ],
            ],
            [
                'name' => 'generar_cotizacion',
                'description' => 'Genera una cotización formal del producto RGX que el sistema ya verificó y seleccionó previamente. Úsala únicamente cuando el cliente solicite una cotización y ya se hayan recopilado todos los datos obligatorios. El producto, precio, SKU y demás datos comerciales son determinados internamente por el sistema y nunca deben enviarse a esta herramienta.',
                'input_schema' => [
                    'type' => 'object',
                    'properties' => [
                        'cliente' => [
                            'type' => 'string',
                            'description' => 'Empresa, razón social o nombre del cliente que solicita la cotización.',
                        ],
                        'contacto' => [
                            'type' => 'string',
                            'description' => 'Nombre de la persona de contacto.',
                        ],
                        'correo' => [
                            'type' => 'string',
                            'description' => 'Correo electrónico del contacto.',
                        ],
                        'telefono' => [
                            'type' => 'string',
                            'description' => 'Teléfono del contacto.',
                        ],
                        'ubicacion' => [
                            'type' => 'string',
                            'description' => 'Ciudad, estado o ubicación del cliente.',
                        ],
                        'cantidad' => [
                            'type' => 'integer',
                            'minimum' => 1,
                            'description' => 'Cantidad de llantas que el cliente desea cotizar.',
                        ],
                        'comentarios' => [
                            'type' => 'string',
                            'description' => 'Comentarios adicionales del cliente, únicamente si los proporcionó.',
                        ],
                    ],
                    'required' => [
                        'cliente',
                        'contacto',
                        'correo',
                        'telefono',
                        'ubicacion',
                        'cantidad',
                    ],
                ],
            ],
        ];
    }

    private function normalizeToolUseInputsForReplay(
        array $content
    ): array {
        return array_map(
            function ($part) {
                if (
                    ! is_array($part)
                    || ($part['type'] ?? null) !== 'tool_use'
                ) {
                    return $part;
                }

                if (
                    array_key_exists('input', $part)
                    && is_array($part['input'])
                    && $part['input'] === []
                ) {
                    $part['input'] = (object) [];
                }

                return $part;
            },
            $content
        );
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
        ?int $selectedProductId = null,
        ?array &$quoteContext = null,
        bool $allowQuote = true,
        bool $allowTechnicalKnowledge = true,
        ?array $technicalKnowledgeContext = null,
        bool $allowTechnicalSelection = true,
        ?array &$advisorContext = null,
        bool $allowAdvisorContact = false
    ): array {
        $toolUseId = trim((string) ($toolUse['id'] ?? ''));
        $toolName = trim((string) ($toolUse['name'] ?? ''));

        if ($toolUseId === '') {
            throw new RuntimeException(
                'Claude devolvió una llamada de herramienta sin identificador.'
            );
        }

        if (
            $toolName === 'consultar_conocimiento_tecnico'
            && ! $allowTechnicalKnowledge
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'knowledge_waiting_product_verification',
                    'message' => 'Primero debe completarse la verificación del producto antes de consultar conocimiento técnico.',
                ]),
            ];
        }

        if ($toolName === 'consultar_conocimiento_tecnico') {
            return $this->executeTechnicalKnowledgeTool(
                $toolUseId,
                $selectedProductId
            );
        }

        if (
            $toolName === 'seleccionar_informacion_tecnica'
            && ! $allowTechnicalKnowledge
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'technical_selection_waiting_product_verification',
                    'message' => 'La selección técnica debe esperar a que termine la verificación del producto actual.',
                ]),
            ];
        }

        if (
            $toolName === 'seleccionar_informacion_tecnica'
            && ! $allowTechnicalSelection
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'technical_selection_waiting_quote',
                    'message' => 'La selección técnica debe esperar a que se procese la cotización solicitada en esta ejecución.',
                ]),
            ];
        }

        if ($toolName === 'seleccionar_informacion_tecnica') {
            return $this->executeTechnicalSelectionTool(
                $toolUseId,
                $toolUse['input'] ?? [],
                $technicalKnowledgeContext
            );
        }

        if ($toolName === 'mostrar_contacto_asesor') {
            return $this->executeAdvisorContactTool(
                $toolUseId,
                $advisorContext,
                $allowAdvisorContact
            );
        }

        if ($toolName === 'solicitar_asesoria') {
            return $this->executeAdvisorRequestTool(
                $toolUseId,
                $toolUse['input'] ?? [],
                $advisorContext
            );
        }

        if (
            $toolName === 'generar_cotizacion'
            && ! $allowQuote
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'quote_waiting_product_verification',
                    'message' => 'Primero debe completarse la verificación del producto antes de generar la cotización.',
                ]),
            ];
        }

        if ($toolName === 'generar_cotizacion') {
            return $this->executeQuoteTool(
                $toolUseId,
                $toolUse['input'] ?? [],
                $selectedProductId,
                $quoteContext
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
            'vertical',
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

    private function executeTechnicalKnowledgeTool(
        string $toolUseId,
        ?int $selectedProductId
    ): array {
        if (
            $selectedProductId === null
            || $selectedProductId <= 0
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'no_selected_product',
                    'message' => 'No hay un producto verificado seleccionado para consultar información técnica.',
                ]),
            ];
        }

        $product = $this->productSearch
            ->loadProducts()
            ->first(
                fn (array $candidate): bool => (int) ($candidate['id'] ?? 0)
                    === $selectedProductId
            );

        if (! is_array($product)) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'knowledge_unavailable',
                    'message' => 'No fue posible recuperar el producto verificado.',
                ]),
            ];
        }

        $knowledge = $this->technicalKnowledge
            ->lookupForVerifiedProduct($product);

        if (
            ($knowledge['status'] ?? null)
            !== 'resolved'
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'knowledge_unavailable',
                    'message' => 'No hay conocimiento técnico curado disponible para este producto.',
                ]),
            ];
        }

        $facts = collect(
            $knowledge['facts'] ?? []
        )
            ->filter(
                fn ($fact): bool => is_array($fact)
                    && ($fact['status'] ?? null)
                    === 'approved'
            )
            ->map(
                fn (array $fact): array => [
                    'id' => trim(
                        (string) (
                            $fact['id'] ?? ''
                        )
                    ),
                    'category' => trim(
                        (string) (
                            $fact['category'] ?? ''
                        )
                    ),
                    'scope' => trim(
                        (string) (
                            $fact['scope'] ?? ''
                        )
                    ),
                    'status' => 'approved',
                    'page' => (int) (
                        $fact['page'] ?? 0
                    ),
                    'statement' => trim(
                        (string) (
                            $fact['statement'] ?? ''
                        )
                    ),
                    'statement_es' => trim(
                        (string) (
                            $fact['statement_es'] ?? ''
                        )
                    ),
                ]
            )
            ->filter(
                fn (array $fact): bool => $fact['statement'] !== ''
            )
            ->values()
            ->all();

        if ($facts === []) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'knowledge_unavailable',
                    'message' => 'No hay hechos técnicos aprobados disponibles para este producto.',
                ]),
            ];
        }

        $source = is_array(
            $knowledge['source'] ?? null
        )
            ? $knowledge['source']
            : [];

        $sourcePath = str_replace(
            '\\',
            '/',
            trim(
                (string) (
                    $source['path'] ?? ''
                )
            )
        );

        $guardrails = collect(
            $knowledge['guardrails'] ?? []
        )
            ->filter(
                fn ($item): bool => is_array($item)
            )
            ->map(
                fn (array $item): array => [
                    'id' => trim(
                        (string) (
                            $item['id'] ?? ''
                        )
                    ),
                    'rule' => trim(
                        (string) (
                            $item['rule'] ?? ''
                        )
                    ),
                    'rule_es' => trim(
                        (string) (
                            $item['rule_es'] ?? ''
                        )
                    ),
                    'forbidden_inference' => trim(
                        (string) (
                            $item[
                                'forbidden_inference'
                            ] ?? ''
                        )
                    ),
                ]
            )
            ->values()
            ->all();

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'knowledge_resolved',
                'family' => trim(
                    (string) (
                        $knowledge['family'] ?? ''
                    )
                ),
                'source' => [
                    'brand' => trim(
                        (string) (
                            $source[
                                'official_brand'
                            ] ?? ''
                        )
                    ),
                    'document' => $sourcePath !== ''
                            ? basename($sourcePath)
                            : '',
                ],
                'facts' => $facts,
                'guardrails' => $guardrails,
            ]),
        ];
    }

    /**
     * Filtra selecciones técnicas contra el contexto autorizado
     * que ya fue determinado por el servidor.
     */
    private function selectAuthorizedTechnicalItems(
        array $knowledge,
        array $factIds,
        array $guardrailIds
    ): array {
        $requestedFactIds = collect($factIds)
            ->filter(
                fn ($id): bool => is_string($id)
            )
            ->map(
                fn (string $id): string => trim($id)
            )
            ->filter(
                fn (string $id): bool => $id !== ''
            )
            ->unique()
            ->values();

        $requestedGuardrailIds = collect($guardrailIds)
            ->filter(
                fn ($id): bool => is_string($id)
            )
            ->map(
                fn (string $id): string => trim($id)
            )
            ->filter(
                fn (string $id): bool => $id !== ''
            )
            ->unique()
            ->values();

        $factsById = collect(
            $knowledge['facts'] ?? []
        )
            ->filter(
                fn ($item): bool => is_array($item)
                    && trim(
                        (string) ($item['id'] ?? '')
                    ) !== ''
            )
            ->keyBy(
                fn (array $item): string => trim(
                    (string) $item['id']
                )
            );

        $guardrailsById = collect(
            $knowledge['guardrails'] ?? []
        )
            ->filter(
                fn ($item): bool => is_array($item)
                    && trim(
                        (string) ($item['id'] ?? '')
                    ) !== ''
            )
            ->keyBy(
                fn (array $item): string => trim(
                    (string) $item['id']
                )
            );

        $facts = $requestedFactIds
            ->map(
                fn (string $id) => $factsById->get($id)
            )
            ->filter(
                fn ($item): bool => is_array($item)
            )
            ->values()
            ->all();

        $guardrails = $requestedGuardrailIds
            ->map(
                fn (string $id) => $guardrailsById->get($id)
            )
            ->filter(
                fn ($item): bool => is_array($item)
            )
            ->values()
            ->all();

        return [
            'facts' => $facts,
            'guardrails' => $guardrails,
        ];
    }

    /**
     * Construye una respuesta técnica únicamente con contenido
     * previamente autorizado por el servidor.
     */
    private function renderAuthorizedTechnicalSelection(
        array $selection
    ): string {
        $facts = collect(
            $selection['facts'] ?? []
        )
            ->filter(
                fn ($item): bool => is_array($item)
            )
            ->map(
                fn (array $item): string => trim(
                    (string) ($item['statement_es'] ?? '')
                )
            )
            ->filter(
                fn (string $statement): bool => $statement !== ''
            );

        $guardrails = collect(
            $selection['guardrails'] ?? []
        )
            ->filter(
                fn ($item): bool => is_array($item)
            )
            ->map(
                fn (array $item): string => trim(
                    (string) ($item['rule_es'] ?? '')
                )
            )
            ->filter(
                fn (string $rule): bool => $rule !== ''
            );

        $lines = $facts
            ->merge($guardrails)
            ->unique()
            ->values();

        if ($lines->isEmpty()) {
            return 'No hay información técnica verificada disponible para responder esta consulta.';
        }

        return 'Información técnica verificada:'
            .PHP_EOL
            .$lines
                ->map(
                    fn (string $line): string => '- '.$line
                )
                ->implode(PHP_EOL);
    }

    /**
     * Resuelve una selección de IDs técnicos únicamente contra
     * el contexto autorizado previamente por el servidor.
     */
    private function executeTechnicalSelectionTool(
        string $toolUseId,
        mixed $input,
        ?array $knowledge
    ): array {
        if (
            ! is_array($knowledge)
            || ($knowledge['status'] ?? null)
                !== 'knowledge_resolved'
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'technical_selection_unavailable',
                    'message' => 'No existe un contexto técnico verificado para seleccionar información.',
                ]),
            ];
        }

        if (! is_array($input)) {
            $input = [];
        }

        $factIds = is_array(
            $input['fact_ids'] ?? null
        )
            ? $input['fact_ids']
            : [];

        $guardrailIds = is_array(
            $input['guardrail_ids'] ?? null
        )
            ? $input['guardrail_ids']
            : [];

        $selection = $this->selectAuthorizedTechnicalItems(
            $knowledge,
            $factIds,
            $guardrailIds
        );

        if (
            ($selection['facts'] ?? []) === []
            && ($selection['guardrails'] ?? []) === []
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'technical_selection_empty',
                    'message' => 'La selección no contiene información técnica autorizada.',
                ]),
            ];
        }

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'technical_answer_resolved',
                'answer' => $this->renderAuthorizedTechnicalSelection(
                    $selection
                ),
            ]),
        ];
    }

    private function messageRequestsAdvisor(string $message): bool
    {
        $normalized = mb_strtolower(trim($message));

        $normalized = strtr($normalized, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ü' => 'u',
        ]);

        foreach ([
            'asesor',
            'asesora',
            'asesoria',
            'atencion humana',
            'hablar con alguien',
            'hablar con una persona',
            'hablar con un vendedor',
            'hablar con una vendedora',
            'hablar con un ejecutivo',
            'hablar con una ejecutiva',
            'whatsapp',
            'su telefono',
            'telefono de ustedes',
            'telefono de ventas',
            'telefono de ruguex',
            'numero de ventas',
            'numero de ruguex',
            'llamenme',
            'contactenme',
            'quiero que me llamen',
            'quiero que me contacten',
            'necesito que me llamen',
            'necesito que me contacten',
            'prefiero que me llamen',
            'prefiero que me contacten',
        ] as $needle) {
            if (str_contains($normalized, $needle)) {
                return true;
            }
        }

        return false;
    }

    private function advisorBusinessHoursAvailable(): bool
    {
        $timezone = (string) config(
            'app.timezone',
            'America/Mexico_City'
        );

        $now = now($timezone);

        $allowedDays = array_values(
            array_map(
                'intval',
                (array) config(
                    'whatsapp.schedule.days',
                    [1, 2, 3, 4, 5]
                )
            )
        );

        if (! in_array(
            $now->dayOfWeekIso,
            $allowedDays,
            true
        )) {
            return false;
        }

        $startHour = (int) config(
            'whatsapp.schedule.start_hour',
            9
        );

        $endHour = (int) config(
            'whatsapp.schedule.end_hour',
            18
        );

        if (
            $startHour < 0
            || $startHour > 23
            || $endHour < 1
            || $endHour > 24
            || $endHour <= $startHour
        ) {
            return false;
        }

        $currentMinutes =
            ($now->hour * 60)
            + $now->minute;

        return
            $currentMinutes >= ($startHour * 60)
            && $currentMinutes < ($endHour * 60);
    }

    private function executeAdvisorContactTool(
        string $toolUseId,
        ?array &$advisorContext,
        bool $allowAdvisorContact
    ): array {
        if (! $allowAdvisorContact) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_contact_not_requested',
                    'message' => 'La conversación todavía no requiere atención humana.',
                ]),
            ];
        }

        $businessHours =
            $this->advisorBusinessHoursAvailable();

        $advisorContext = [
            'contact_requested' => true,
            'submitted' => (bool) (
                $advisorContext['submitted']
                ?? false
            ),
        ];

        if (! $businessHours) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_contact_available',
                    'contact' => [
                        'business_hours' => false,
                        'phone' => null,
                        'phone_display' => null,
                        'whatsapp_url' => null,
                        'callback_available' => true,
                    ],
                    'message' => 'La atención inmediata no está disponible en este momento. Ofrece únicamente que el cliente deje sus datos para ser contactado posteriormente.',
                ]),
            ];
        }

        $digits = preg_replace(
            '/\D+/',
            '',
            (string) config(
                'whatsapp.phone',
                ''
            )
        );

        if (
            ! is_string($digits)
            || strlen($digits) < 8
            || strlen($digits) > 15
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_contact_available',
                    'contact' => [
                        'business_hours' => true,
                        'phone' => null,
                        'phone_display' => null,
                        'whatsapp_url' => null,
                        'callback_available' => true,
                    ],
                    'message' => 'No hay un medio de atención inmediata configurado. Ofrece que el cliente deje sus datos para ser contactado posteriormente.',
                ]),
            ];
        }

        $phone = '+'.$digits;
        $phoneDisplay = $phone;

        if (
            strlen($digits) === 12
            && str_starts_with(
                $digits,
                '52'
            )
        ) {
            $phoneDisplay = sprintf(
                '+52 %s %s %s',
                substr($digits, 2, 3),
                substr($digits, 5, 3),
                substr($digits, 8, 4)
            );
        }

        $whatsappUrl =
            'https://wa.me/'
            .$digits
            .'?text='
            .rawurlencode(
                (string) config(
                    'whatsapp.message',
                    'Hola RUGUEX'
                )
            );

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'advisor_contact_available',
                'contact' => [
                    'business_hours' => true,
                    'phone' => $phone,
                    'phone_display' => $phoneDisplay,
                    'whatsapp_url' => $whatsappUrl,
                    'callback_available' => true,
                ],
                'message' => 'La atención humana está disponible. Puede elegir WhatsApp, llamada telefónica o dejar sus datos para ser contactado posteriormente.',
            ]),
        ];
    }

    private function executeAdvisorRequestTool(
        string $toolUseId,
        mixed $rawInput,
        ?array &$advisorContext
    ): array {
        if (
            ! is_array($advisorContext)
            || ($advisorContext['contact_requested'] ?? false) !== true
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_submission_waiting_contact_options',
                    'message' => 'Primero deben mostrarse los medios de contacto humano solicitados por el cliente.',
                ]),
            ];
        }

        if (($advisorContext['submitted'] ?? false) === true) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_already_submitted',
                    'message' => 'La solicitud de contacto ya había sido enviada.',
                ]),
            ];
        }

        $input = is_array($rawInput)
            ? $rawInput
            : [];

        $data = [
            'name' => trim((string) ($input['name'] ?? '')),
            'company' => trim((string) ($input['company'] ?? '')),
            'phone' => trim((string) ($input['phone'] ?? '')),
            'email' => mb_strtolower(
                trim((string) ($input['email'] ?? ''))
            ),
            'message' => trim((string) ($input['message'] ?? '')),
        ];

        $missing = [];

        foreach ([
            'name',
            'phone',
            'email',
        ] as $field) {
            if ($data[$field] === '') {
                $missing[] = $field;
            }
        }

        if ($missing !== []) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_missing_required',
                    'missing_fields' => $missing,
                    'message' => 'Faltan datos obligatorios para solicitar contacto.',
                ]),
            ];
        }

        foreach ([
            'name' => 120,
            'company' => 120,
            'phone' => 40,
            'email' => 120,
            'message' => 2000,
        ] as $field => $limit) {
            if (mb_strlen($data[$field]) > $limit) {
                return [
                    'type' => 'tool_result',
                    'tool_use_id' => $toolUseId,
                    'is_error' => true,
                    'content' => $this->encodeToolResult([
                        'status' => 'advisor_invalid_input',
                        'message' => 'Uno de los datos excede la longitud permitida.',
                    ]),
                ];
            }
        }

        if (
            filter_var(
                $data['email'],
                FILTER_VALIDATE_EMAIL
            ) === false
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_invalid_email',
                    'message' => 'El correo electrónico no es válido.',
                ]),
            ];
        }

        try {
            Mail::to(
                'bshgroupcrm@gmail.com'
            )->send(
                new ChatbotSpecialistRequestMail([
                    'name' => $data['name'],
                    'company' => $data['company'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'message' => $data['message'],
                    'type' => null,
                    'measure' => null,
                ])
            );
        } catch (\Throwable) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'is_error' => true,
                'content' => $this->encodeToolResult([
                    'status' => 'advisor_error',
                    'message' => 'No fue posible enviar la solicitud al asesor en este momento.',
                ]),
            ];
        }

        $advisorContext = [
            'contact_requested' => true,
            'submitted' => true,
        ];

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'advisor_submitted',
                'message' => 'La solicitud de contacto fue enviada correctamente.',
            ]),
        ];
    }

    private function executeQuoteTool(
        string $toolUseId,
        mixed $input,
        ?int $selectedProductId,
        ?array &$quoteContext
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

        $fingerprintPayload = [
            'product_id' => $selectedProductId,
            'cliente' => $customer['cliente'],
            'contacto' => $customer['contacto'],
            'correo' => mb_strtolower($customer['correo']),
            'telefono' => $customer['telefono'],
            'ubicacion' => $customer['ubicacion'],
            'cantidad' => $customer['cantidad'],
            'comentarios' => $customer['comentarios'],
        ];

        try {
            $fingerprint = hash(
                'sha256',
                json_encode(
                    $fingerprintPayload,
                    JSON_UNESCAPED_UNICODE
                    | JSON_UNESCAPED_SLASHES
                    | JSON_THROW_ON_ERROR
                )
            );
        } catch (JsonException) {
            throw new RuntimeException(
                'No fue posible generar la huella de la cotización.'
            );
        }

        $existingFingerprint = trim(
            (string) ($quoteContext['fingerprint'] ?? '')
        );

        $existingProductId = (int) (
            $quoteContext['product_id'] ?? 0
        );

        $existingQuote = $quoteContext['quote'] ?? null;

        if (
            $existingFingerprint !== ''
            && hash_equals($existingFingerprint, $fingerprint)
            && $existingProductId === $selectedProductId
            && is_array($existingQuote)
        ) {
            return [
                'type' => 'tool_result',
                'tool_use_id' => $toolUseId,
                'content' => $this->encodeToolResult([
                    'status' => 'already_quoted',
                    'quote' => $existingQuote,
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

        $storedQuote = [
            'message' => trim((string) ($quote['message'] ?? '')),
            'folio' => trim((string) ($quote['folio'] ?? '')),
            'pdf_url' => trim((string) ($quote['pdf_url'] ?? '')),
            'total' => $quote['total'] ?? null,
        ];

        $quoteContext = [
            'fingerprint' => $fingerprint,
            'product_id' => $selectedProductId,
            'quote' => $storedQuote,
        ];

        return [
            'type' => 'tool_result',
            'tool_use_id' => $toolUseId,
            'content' => $this->encodeToolResult([
                'status' => 'quoted',
                'quote' => $storedQuote,
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

    private function systemPrompt(
        array $siteContext = [],
        bool $hasSelectedProduct = false
    ): string {
        $siteOrigin = trim(
            (string) (
                $siteContext['site_origin']
                ?? 'llantasdemontacargas.com'
            )
        );

        $defaultVertical = trim(
            (string) (
                $siteContext['default_vertical']
                ?? 'montacargas'
            )
        );

        if (! in_array(
            $defaultVertical,
            ['montacargas', 'minicargadores'],
            true
        )) {
            $defaultVertical = 'montacargas';
        }

        $contextInstruction = match ($defaultVertical) {
            'minicargadores' => "El sitio de origen es {$siteOrigin}. "
                .'Su contexto predeterminado es minicargadores. '
                .'Si el cliente no especifica el tipo de equipo '
                .'y no existe una señal clara de montacargas, '
                .'usa vertical=minicargadores. '
                .'Una intención explícita de montacargas siempre '
                .'prevalece sobre el contexto del sitio.',

            default => "El sitio de origen es {$siteOrigin}. "
                .'Su contexto predeterminado es montacargas. '
                .'Si el cliente no especifica el tipo de equipo '
                .'y no existe una señal clara de minicargador, '
                .'usa vertical=montacargas. '
                .'Una intención explícita de minicargador siempre '
                .'prevalece sobre el contexto del sitio.',
        };

        if ($hasSelectedProduct) {
            $contextInstruction .= ' El servidor ya tiene un producto '
                .'verificado seleccionado para esta conversación. '
                .'Cuando el cliente se refiera a esa llanta, al mismo producto '
                .'o al producto ya seleccionado, no vuelvas a pedir tipo, medida '
                .'ni modelo sólo para identificarlo nuevamente. '
                .'Si solicita información técnica de ese producto, usa '
                .'consultar_conocimiento_tecnico. '
                .'La herramienta resolverá internamente la identidad autorizada. '
                .'No envíes, elijas, sustituyas ni infieras identificadores, SKU, '
                .'modelo o variante de la selección; esas decisiones permanecen '
                .'bajo control exclusivo del servidor.';
        }

        $prompt = <<<'PROMPT'
Eres el asistente virtual de RGX especializado en llantas industriales para
montacargas y minicargadores.

Responde siempre en español, de forma clara, profesional, breve y natural.

Usa únicamente texto plano. No uses Markdown, asteriscos, encabezados ni otros símbolos de formato.

Tu función es conversar con clientes y utilizar las herramientas del sistema para identificar productos reales.

Los tres datos principales para iniciar una búsqueda son:
- tipo de llanta;
- medida;
- modelo o línea de la llanta.

Ejemplos de modelos o líneas de llanta para montacargas son XP800, XP1000,
PS800, PS1000 y T-900. Para minicargadores son ejemplos SK-05, SKS-900,
BIG BOY y las líneas Brawler disponibles en el catálogo verificado.

Cuando el cliente indique explícitamente que busca una llanta para
minicargador o skid steer, usa vertical=minicargadores en buscar_producto.
Cuando indique montacargas, usa vertical=montacargas.

No confundas el modelo o línea de la llanta con la marca o modelo del
equipo.

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

Si el resultado resuelve un producto, utiliza únicamente los datos devueltos por buscar_producto para identificarlo y para cualquier dato comercial. Para características técnicas utiliza exclusivamente consultar_conocimiento_tecnico.

Cuando el producto quede resuelto, no escribas ni copies la URL en tu respuesta. La interfaz mostrará un botón seguro para abrir el producto verificado en la tienda.

El SKU, precio, disponibilidad, enlace, identificador y demás datos comerciales sólo son válidos si fueron devueltos por buscar_producto.


Los atributos type, measure, model, function, rim_type, tread, service y shifts
devueltos por buscar_producto pueden mostrarse literalmente como datos de
catálogo verificados, pero no deben convertirse por iniciativa propia en
afirmaciones sobre desempeño, capacidad, beneficios, aplicaciones,
durabilidad o comportamiento técnico.

No afirmes que una llanta "está diseñada para", "es ideal para", "soporta",
"tiene capacidad para" ni expresiones técnicas equivalentes basándote sólo
en esos atributos. Para una explicación técnica utiliza exclusivamente
consultar_conocimiento_tecnico cuando exista conocimiento autorizado.

No modifiques, completes ni inventes precios, existencias, SKU, enlaces, identificadores, especificaciones técnicas ni productos concretos.

Si el cliente pregunta por características, ventajas, aplicaciones, construcción, comportamiento o información técnica de un producto ya verificado, utiliza consultar_conocimiento_tecnico antes de responder.

consultar_conocimiento_tecnico no recibe producto, identificador, SKU, modelo, variante, compuesto ni scope. El servidor determina automáticamente el producto y los alcances permitidos.

Si el resultado es knowledge_resolved, no redactes todavía una respuesta técnica. Usa inmediatamente seleccionar_informacion_tecnica.

seleccionar_informacion_tecnica sólo recibe fact_ids y guardrail_ids que existan exactamente en el último resultado knowledge_resolved. No envíes producto, identificador, SKU, modelo, variante, scope, texto técnico libre ni otros campos.

Selecciona únicamente los IDs necesarios para responder la pregunta del cliente. No inventes, reconstruyas ni modifiques IDs.

No uses seleccionar_informacion_tecnica antes de recibir knowledge_resolved ni en la misma ejecución de herramientas que buscar_producto.

No uses seleccionar_informacion_tecnica en la misma ejecución de herramientas que generar_cotizacion. Si ambas acciones están pendientes, procesa primero generar_cotizacion.

Si generar_cotizacion devuelve quoted o already_quoted y todavía debes responder una consulta técnica, utiliza seleccionar_informacion_tecnica en la siguiente ejecución.

Si generar_cotizacion devuelve missing_required, invalid_email, quote_error u otro estado que requiera atención, resuelve primero ese estado y no intentes completar la selección técnica en esa misma ejecución.

Después de seleccionar los IDs, el servidor construirá la respuesta técnica final con contenido autorizado.

Después de knowledge_resolved tu función técnica se limita exclusivamente a seleccionar IDs autorizados. No redactes, traduzcas, resumas, expliques ni parafrasees los facts o guardrails.

Respeta el scope de cada fact al decidir qué IDs seleccionar. Un fact variant:... sólo puede seleccionarse cuando el servidor lo haya incluido en knowledge_resolved para la variante verificada.

Selecciona únicamente facts que respondan directamente a la consulta del cliente. No agregues IDs por conocimiento general, semejanza entre modelos, inferencia o conveniencia.

Respeta siempre los guardrails devueltos. Si la pregunta del cliente toca una afirmación, confusión o interpretación cubierta por un guardrail, incluye expresamente su guardrail_id en seleccionar_informacion_tecnica.

No construyas por tu cuenta la corrección contenida en un guardrail ni reveles forbidden_inference. Selecciona el guardrail_id correspondiente y deja que el servidor produzca el texto final autorizado.

No utilices conocimiento general, conocimiento previo del modelo, definiciones externas ni inferencias propias para decidir hechos que no estén presentes en knowledge_resolved.

Si ningún fact o guardrail autorizado responde a la consulta, no inventes una explicación técnica.

consultar_conocimiento_tecnico nunca es fuente autorizada para precio, SKU, disponibilidad, stock, URL, folio, total ni otros datos comerciales.

Si el resultado es knowledge_waiting_product_verification, espera a que concluya la búsqueda actual y consulta el conocimiento técnico en la siguiente ejecución.

Si el resultado es no_selected_product o knowledge_unavailable, indica que esa información técnica no está confirmada y no la inventes.

Cuando el cliente solicite una cotización, primero debe existir un producto resuelto y verificado mediante buscar_producto.

Para generar una cotización formal recopila únicamente estos datos:
- empresa, razón social o nombre del cliente;
- nombre de contacto;
- correo electrónico;
- teléfono;
- ubicación;
- cantidad de llantas.

Los comentarios adicionales son opcionales y sólo debes incluirlos si el cliente los proporciona.

Si falta alguno de los datos obligatorios para cotizar, pregunta únicamente por los que falten. No vuelvas a solicitar información que el cliente ya proporcionó.

Cuando ya tengas todos los datos obligatorios y el cliente haya solicitado una cotización, usa generar_cotizacion. No pidas confirmación adicional antes de ejecutar la herramienta.

Nunca envíes, inventes ni solicites producto_id, SKU, precio, total, enlace del producto, folio o enlace del PDF como argumentos para generar_cotizacion. Esos valores son determinados exclusivamente por el sistema.

Interpreta el resultado de generar_cotizacion como autoridad del sistema.

Si el resultado es no_selected_product, no afirmes que existe una cotización. Indica que primero es necesario identificar y verificar el producto.

Si el resultado es missing_required, solicita únicamente los campos indicados por la herramienta.

Si el resultado es quote_waiting_product_verification, no afirmes que existe una cotización. Espera a que la búsqueda actual termine de verificar el producto y, si ya cuentas con todos los datos obligatorios del cliente, utiliza generar_cotizacion en la siguiente ejecución de herramienta.

Si el resultado es invalid_email, solicita un correo electrónico válido.

Si el resultado es quote_error, informa que no fue posible generar la cotización en ese momento y no inventes folio, total ni PDF.

Si el resultado es quoted, informa al cliente que su cotización fue generada correctamente. En el texto de respuesta puedes mencionar únicamente el folio y el total devueltos por generar_cotizacion, además de datos que el propio cliente ya haya proporcionado como la cantidad solicitada.

Si el resultado es already_quoted, no generes otra cotización. Informa que la cotización ya había sido generada y utiliza únicamente el folio y total existentes devueltos por la herramienta.

Nunca afirmes que una cotización fue enviada por correo, entregada, recibida, notificada o enviada a ningún destinatario, a menos que la herramienta indique expresamente ese hecho mediante un campo específico. La presencia del correo del cliente no demuestra que se haya enviado un correo.

No menciones, copies ni escribas el campo pdf_url en tu respuesta. Tampoco afirmes que existe un botón, enlace, descarga o elemento de interfaz para abrir el PDF. La interfaz gestionará el PDF independientemente cuando esa función esté disponible.

No infieras efectos secundarios de generar_cotizacion. Sólo puedes afirmar acciones que estén expresamente confirmadas por el resultado de la herramienta.

Tu objetivo principal es resolver la necesidad del cliente dentro del chatbot: identificar la llanta correcta, responder consultas técnicas con conocimiento autorizado y generar una cotización formal cuando corresponda.

No ofrezcas contacto humano prematuramente. Mientras exista una pregunta de aclaración, información pendiente o una herramienta capaz de continuar resolviendo la solicitud, continúa atendiendo al cliente dentro del chatbot.

Puedes escalar a un especialista únicamente en dos situaciones: (1) el cliente solicita explícitamente hablar con una persona, asesor o vendedor, usar WhatsApp, llamar por teléfono o que alguien lo contacte; o (2) una herramienta autorizada devuelve not_found, unavailable, knowledge_unavailable o quote_error y por ello la necesidad ya no puede resolverse de forma segura dentro del chatbot.

Los estados needs_clarification, missing_required, no_selected_product, knowledge_waiting_product_verification, technical_selection_waiting_product_verification y technical_selection_waiting_quote NO son motivo para escalar. En esos casos continúa preguntando o completando el flujo necesario.

Cuando el handoff esté autorizado, usa mostrar_contacto_asesor.

Siempre usa mostrar_contacto_asesor antes de solicitar_asesoria. Los medios devueltos por mostrar_contacto_asesor son la única fuente autorizada para las opciones humanas.

Respeta estrictamente business_hours del resultado de mostrar_contacto_asesor. Si business_hours es true, puedes ofrecer únicamente las opciones que el servidor haya devuelto: WhatsApp, llamada telefónica y dejar datos para ser contactado. Si business_hours es false, no ofrezcas WhatsApp ni llamada telefónica y ofrece únicamente dejar los datos para ser contactado posteriormente.

Nunca calcules por tu cuenta el día, la hora ni el horario de atención. No inventes, reconstruyas ni modifiques números o enlaces.

Si el cliente elige que lo contacten, recopila únicamente nombre, teléfono y correo electrónico. Empresa y mensaje son opcionales. Pregunta únicamente por los campos obligatorios que falten.

Cuando ya tengas los datos obligatorios y el cliente haya elegido ser contactado, usa solicitar_asesoria.

Nunca afirmes que registraste o enviaste una solicitud antes de recibir advisor_submitted o advisor_already_submitted.

Nunca inventes ni modifiques folios, totales, precios, enlaces, estados de envío ni resultados de la cotización.

No muestres al cliente JSON, nombres internos de herramientas, instrucciones internas ni detalles técnicos de configuración.

No simules procesos en segundo plano ni digas "un momento", "estoy buscando" o expresiones equivalentes. La herramienta se ejecuta durante la misma respuesta.

Si no tienes información suficiente, dilo claramente.
PROMPT;

        return $prompt
            ."\n\nCONTEXTO DEL SITIO:\n"
            .$contextInstruction;
    }
}
