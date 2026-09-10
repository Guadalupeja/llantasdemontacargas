<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use Illuminate\Support\Facades\Http;
use ReflectionClass;
use Tests\TestCase;

class RgxChatbotTechnicalKnowledgeToolTest extends TestCase
{
    private function chatbot(): RgxChatbotService
    {
        return app(RgxChatbotService::class);
    }

    public function test_technical_tool_has_empty_server_controlled_schema(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod('tools');
        $method->setAccessible(true);

        $tools = $method->invoke($service);

        $technical = collect($tools)->firstWhere(
            'name',
            'consultar_conocimiento_tecnico'
        );

        $this->assertIsArray($technical);

        $schema = $technical['input_schema'];

        $this->assertSame(
            'object',
            $schema['type']
        );

        $this->assertIsObject(
            $schema['properties']
        );

        $this->assertSame(
            [],
            get_object_vars(
                $schema['properties']
            )
        );

        $this->assertFalse(
            $schema['additionalProperties']
        );

        $serialized = json_encode(
            $schema,
            JSON_UNESCAPED_UNICODE
        );

        foreach ([
            'product_id',
            'sku',
            'model',
            'scope',
            'variant',
            'price',
            'url',
        ] as $forbidden) {
            $this->assertStringNotContainsString(
                $forbidden,
                $serialized
            );
        }
    }

    public function test_selected_product_controls_knowledge_even_with_malicious_input(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTool'
        );

        $method->setAccessible(true);

        $quoteContext = null;

        $arguments = [
            [
                'id' => 'technical-security-1',
                'name' => 'consultar_conocimiento_tecnico',
                'input' => [
                    'product_id' => 999999,
                    'sku' => 'SKU-INVENTADO',
                    'model' => 'MODELO INVENTADO',
                    'scope' => 'variant:ProHD',
                    'price' => 1,
                    'url' => 'https://example.invalid',
                ],
            ],
            6074,
            &$quoteContext,
            true,
            true,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            $result['content'],
            true
        );

        $this->assertSame(
            'knowledge_resolved',
            $payload['status']
        );

        $this->assertSame(
            'XP1000',
            $payload['family']
        );

        $scopes = array_column(
            $payload['facts'],
            'scope'
        );

        $this->assertContains(
            'variant:Non Marking',
            $scopes
        );

        $this->assertNotContains(
            'variant:ProHD',
            $scopes
        );

        foreach ($payload['facts'] as $fact) {
            $this->assertSame(
                'approved',
                $fact['status']
            );
        }

        foreach ([
            '"product_id"',
            '"sku"',
            '"price_mxn"',
            '"price_label"',
            '"stock"',
            '"url"',
            'SKU-INVENTADO',
            'MODELO INVENTADO',
            'example.invalid',
        ] as $forbidden) {
            $this->assertStringNotContainsString(
                $forbidden,
                $result['content']
            );
        }
    }

    public function test_technical_tool_requires_server_selected_product(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTechnicalKnowledgeTool'
        );

        $method->setAccessible(true);

        $result = $method->invoke(
            $service,
            'technical-security-2',
            null
        );

        $payload = json_decode(
            $result['content'],
            true
        );

        $this->assertTrue(
            $result['is_error']
        );

        $this->assertSame(
            'no_selected_product',
            $payload['status']
        );
    }

    public function test_technical_knowledge_is_blocked_in_same_batch_as_product_search(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTool'
        );

        $method->setAccessible(true);

        $quoteContext = null;

        $arguments = [
            [
                'id' => 'technical-security-3',
                'name' => 'consultar_conocimiento_tecnico',
                'input' => [],
            ],
            6074,
            &$quoteContext,
            true,
            false,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            $result['content'],
            true
        );

        $this->assertTrue(
            $result['is_error']
        );

        $this->assertSame(
            'knowledge_waiting_product_verification',
            $payload['status']
        );
    }

    public function test_phase_five_quote_barrier_remains_intact(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTool'
        );

        $method->setAccessible(true);

        $quoteContext = null;

        $arguments = [
            [
                'id' => 'quote-security',
                'name' => 'generar_cotizacion',
                'input' => [],
            ],
            6074,
            &$quoteContext,
            false,
            true,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            $result['content'],
            true
        );

        $this->assertTrue(
            $result['is_error']
        );

        $this->assertSame(
            'quote_waiting_product_verification',
            $payload['status']
        );
    }

    public function test_empty_tool_input_is_replayed_as_json_object(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'normalizeToolUseInputsForReplay'
        );

        $method->setAccessible(true);

        $content = [
            [
                'type' => 'tool_use',
                'id' => 'technical-empty',
                'name' => 'consultar_conocimiento_tecnico',
                'input' => [],
            ],
            [
                'type' => 'tool_use',
                'id' => 'search-with-input',
                'name' => 'buscar_producto',
                'input' => [
                    'model' => 'XP1000',
                ],
            ],
            [
                'type' => 'text',
                'text' => 'Texto normal.',
            ],
        ];

        $normalized = $method->invoke(
            $service,
            $content
        );

        $this->assertIsObject(
            $normalized[0]['input']
        );

        $this->assertSame(
            [],
            get_object_vars(
                $normalized[0]['input']
            )
        );

        $this->assertSame(
            '{"input":{}}',
            json_encode([
                'input' => $normalized[0]['input'],
            ])
        );

        $this->assertSame(
            [
                'model' => 'XP1000',
            ],
            $normalized[1]['input']
        );

        $this->assertSame(
            $content[2],
            $normalized[2]
        );
    }
    public function test_system_prompt_forbids_technical_expansion_beyond_curated_knowledge(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'systemPrompt'
        );

        $method->setAccessible(true);

        $prompt = (string) $method->invoke($service);

        $this->assertStringContainsString(
            'tu función técnica se limita exclusivamente a seleccionar IDs autorizados',
            $prompt
        );

        $this->assertStringContainsString(
            'No redactes, traduzcas, resumas, expliques ni parafrasees',
            $prompt
        );

        $this->assertStringContainsString(
            'Respeta el scope de cada fact al decidir qué IDs seleccionar',
            $prompt
        );

        $this->assertStringContainsString(
            'incluye expresamente su guardrail_id',
            $prompt
        );

        $this->assertStringContainsString(
            'No construyas por tu cuenta la corrección contenida en un guardrail',
            $prompt
        );

        $this->assertStringContainsString(
            'No utilices conocimiento general',
            $prompt
        );

        $this->assertStringContainsString(
            'Si ningún fact o guardrail autorizado responde a la consulta, no inventes una explicación técnica',
            $prompt
        );

        $this->assertStringNotContainsString(
            'Puedes parafrasear los facts y guardrails',
            $prompt
        );
    }
    public function test_technical_tool_preserves_stable_guardrail_ids(): void
    {
        $service = $this->chatbot();

        $reflection = new \ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTechnicalKnowledgeTool'
        );

        $method->setAccessible(true);

        $cases = [
            5977 => [
                'PS1000',
                'ps1000-radial-sipes-not-radial',
            ],
            5966 => [
                'TR-900',
                'tr900-antistatic-not-explosion-proof',
            ],
        ];

        foreach ($cases as $productId => [$family, $guardrailId]) {
            $result = $method->invoke(
                $service,
                'guardrail-'.$productId,
                $productId
            );

            $payload = json_decode(
                (string) ($result['content'] ?? ''),
                true
            );

            $this->assertSame(
                'knowledge_resolved',
                $payload['status'] ?? null
            );

            $this->assertSame(
                $family,
                $payload['family'] ?? null
            );

            $guardrail = collect(
                $payload['guardrails'] ?? []
            )->first(
                fn ($item): bool =>
                    is_array($item)
                    && ($item['id'] ?? null) === $guardrailId
            );

            $this->assertIsArray($guardrail);

            $this->assertNotSame(
                '',
                trim((string) ($guardrail['rule'] ?? ''))
            );

            $this->assertNotSame(
                '',
                trim(
                    (string) (
                        $guardrail['forbidden_inference'] ?? ''
                    )
                )
            );
        }
    }
    public function test_server_whitelists_selected_technical_ids(): void
    {
        $service = $this->chatbot();

        $reflection = new \ReflectionClass($service);

        $method = $reflection->getMethod(
            'selectAuthorizedTechnicalItems'
        );

        $method->setAccessible(true);

        $knowledge = [
            'facts' => [
                [
                    'id' => 'fact-a',
                    'statement' => 'Trusted fact A',
                ],
                [
                    'id' => 'fact-b',
                    'statement' => 'Trusted fact B',
                ],
            ],
            'guardrails' => [
                [
                    'id' => 'guard-safe',
                    'rule' => 'Trusted guardrail',
                    'forbidden_inference' => 'Forbidden claim',
                ],
            ],
        ];

        $selected = $method->invoke(
            $service,
            $knowledge,
            [
                'fact-b',
                'invented-fact',
                'fact-b',
                123,
                'fact-a',
            ],
            [
                'invented-guardrail',
                'guard-safe',
            ]
        );

        $this->assertSame(
            [
                'fact-b',
                'fact-a',
            ],
            array_column(
                $selected['facts'],
                'id'
            )
        );

        $this->assertSame(
            ['guard-safe'],
            array_column(
                $selected['guardrails'],
                'id'
            )
        );

        $this->assertSame(
            'Trusted fact B',
            $selected['facts'][0]['statement'] ?? null
        );

        $this->assertSame(
            'Trusted guardrail',
            $selected['guardrails'][0]['rule'] ?? null
        );

        $this->assertSame(
            'Forbidden claim',
            $selected['guardrails'][0]['forbidden_inference'] ?? null
        );
    }
    public function test_server_renders_only_whitelisted_technical_content(): void
    {
        $service = $this->chatbot();

        $reflection = new \ReflectionClass($service);

        $selectMethod = $reflection->getMethod(
            'selectAuthorizedTechnicalItems'
        );

        $selectMethod->setAccessible(true);

        $renderMethod = $reflection->getMethod(
            'renderAuthorizedTechnicalSelection'
        );

        $renderMethod->setAccessible(true);

        $knowledge = [
            'facts' => [
                [
                    'id' => 'fact-safe',
                    'statement' => 'AUTHORIZED ORIGINAL FACT.',
                    'statement_es' => 'Hecho técnico autorizado.',
                ],
            ],
            'guardrails' => [
                [
                    'id' => 'guard-safe',
                    'rule' => 'AUTHORIZED ORIGINAL RULE.',
                    'rule_es' => 'Regla técnica autorizada.',
                    'forbidden_inference' => 'INFERENCIA PROHIBIDA',
                ],
            ],
        ];

        $selection = $selectMethod->invoke(
            $service,
            $knowledge,
            [
                'fact-safe',
                'fact-invented',
            ],
            [
                'guard-safe',
                'guard-invented',
            ]
        );

        $answer = $renderMethod->invoke(
            $service,
            $selection
        );

        $this->assertSame(
            'Información técnica verificada:'.PHP_EOL
                .'- Hecho técnico autorizado.'.PHP_EOL
                .'- Regla técnica autorizada.',
            $answer
        );

        $this->assertStringNotContainsString(
            'fact-invented',
            $answer
        );

        $this->assertStringNotContainsString(
            'guard-invented',
            $answer
        );

        $this->assertStringNotContainsString(
            'INFERENCIA PROHIBIDA',
            $answer
        );

        $this->assertStringNotContainsString(
            'AUTHORIZED ORIGINAL FACT.',
            $answer
        );

        $this->assertStringNotContainsString(
            'AUTHORIZED ORIGINAL RULE.',
            $answer
        );
    }
    public function test_private_selection_executor_uses_only_authorized_server_content(): void
    {
        $service = $this->chatbot();

        $reflection = new \ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTechnicalSelectionTool'
        );

        $method->setAccessible(true);

        $knowledge = [
            'status' => 'knowledge_resolved',
            'facts' => [
                [
                    'id' => 'fact-safe',
                    'statement' => 'PRIVATE ORIGINAL FACT.',
                    'statement_es' => 'Hecho técnico autorizado.',
                ],
            ],
            'guardrails' => [
                [
                    'id' => 'guard-safe',
                    'rule' => 'PRIVATE ORIGINAL RULE.',
                    'rule_es' => 'Regla técnica autorizada.',
                    'forbidden_inference' => 'NO MOSTRAR',
                ],
            ],
        ];

        $result = $method->invoke(
            $service,
            'selection-test',
            [
                'fact_ids' => [
                    'fact-safe',
                    'fact-invented',
                ],
                'guardrail_ids' => [
                    'guard-safe',
                    'guard-invented',
                ],
                'product_id' => 999999,
                'model' => 'MODELO INVENTADO',
                'statement' => 'TEXTO INYECTADO',
            ],
            $knowledge
        );

        $payload = json_decode(
            (string) ($result['content'] ?? ''),
            true
        );

        $this->assertSame(
            'technical_answer_resolved',
            $payload['status'] ?? null
        );

        $answer = (string) (
            $payload['answer'] ?? ''
        );

        $this->assertSame(
            'Información técnica verificada:'
                .PHP_EOL
                .'- Hecho técnico autorizado.'
                .PHP_EOL
                .'- Regla técnica autorizada.',
            $answer
        );

        $this->assertStringNotContainsString(
            'TEXTO INYECTADO',
            $answer
        );

        $this->assertStringNotContainsString(
            'MODELO INVENTADO',
            $answer
        );

        $this->assertStringNotContainsString(
            'NO MOSTRAR',
            $answer
        );
    }
    public function test_reply_replays_verified_technical_knowledge_to_anthropic(): void
    {
        config([
            'services.anthropic.api_key' => 'test-key',
        ]);

        Http::fakeSequence()
            ->push([
                'id' => 'msg-technical-1',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'tool_use',
                        'id' => 'technical-1',
                        'name' => 'consultar_conocimiento_tecnico',
                        'input' => (object) [],
                    ],
                ],
                'stop_reason' => 'tool_use',
            ], 200)
            ->push([
                'id' => 'msg-technical-2',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'text',
                        'text' => 'Respuesta final de prueba.',
                    ],
                ],
                'stop_reason' => 'end_turn',
            ], 200);

        $result = $this->chatbot()->reply(
            '¿Qué características técnicas tiene?',
            [],
            5977
        );

        $this->assertSame(
            'Respuesta final de prueba.',
            $result['answer'] ?? null
        );

        Http::assertSentCount(2);

        Http::assertSent(
            function ($request): bool {
                $payload = $request->data();

                $messages = $payload['messages'] ?? [];

                foreach ($messages as $message) {
                    if (
                        ($message['role'] ?? null) !== 'user'
                        || ! is_array($message['content'] ?? null)
                    ) {
                        continue;
                    }

                    foreach ($message['content'] as $part) {
                        if (! is_array($part)) {
                            continue;
                        }

                        if (
                            ($part['type'] ?? null)
                                !== 'tool_result'
                        ) {
                            continue;
                        }

                        $toolPayload = json_decode(
                            (string) (
                                $part['content'] ?? ''
                            ),
                            true
                        );

                        if (
                            ($toolPayload['status'] ?? null)
                                === 'knowledge_resolved'
                            && ($toolPayload['family'] ?? null)
                                === 'PS1000'
                        ) {
                            return true;
                        }
                    }
                }

                return false;
            }
        );
    }
    public function test_hidden_selection_dispatcher_requires_server_knowledge_context(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);

        $method = $reflection->getMethod(
            'executeTool'
        );

        $method->setAccessible(true);

        $quoteContext = null;

        $knowledge = [
            'status' => 'knowledge_resolved',
            'facts' => [
                [
                    'id' => 'fact-safe',
                    'statement' => 'HIDDEN ORIGINAL FACT.',
                    'statement_es' => 'Hecho autorizado.',
                ],
            ],
            'guardrails' => [],
        ];

        $arguments = [
            [
                'id' => 'selection-hidden-1',
                'name' => 'seleccionar_informacion_tecnica',
                'input' => [
                    'fact_ids' => [
                        'fact-safe',
                        'fact-invented',
                    ],
                ],
            ],
            5977,
            &$quoteContext,
            true,
            true,
            $knowledge,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            (string) ($result['content'] ?? ''),
            true
        );

        $this->assertSame(
            'technical_answer_resolved',
            $payload['status'] ?? null
        );

        $this->assertStringContainsString(
            'Hecho autorizado.',
            (string) ($payload['answer'] ?? '')
        );

        $this->assertStringNotContainsString(
            'fact-invented',
            (string) ($payload['answer'] ?? '')
        );

        $arguments[5] = null;

        $withoutContext = $method->invokeArgs(
            $service,
            $arguments
        );

        $withoutContextPayload = json_decode(
            (string) ($withoutContext['content'] ?? ''),
            true
        );

        $this->assertSame(
            'technical_selection_unavailable',
            $withoutContextPayload['status'] ?? null
        );
    }
    public function test_reply_returns_server_rendered_technical_answer_without_another_anthropic_call(): void
    {
        config([
            'services.anthropic.api_key' => 'test-key',
        ]);

        Http::fakeSequence()
            ->push([
                'id' => 'msg-terminal-1',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'tool_use',
                        'id' => 'technical-terminal-1',
                        'name' => 'consultar_conocimiento_tecnico',
                        'input' => (object) [],
                    ],
                ],
                'stop_reason' => 'tool_use',
            ], 200)
            ->push([
                'id' => 'msg-terminal-2',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'tool_use',
                        'id' => 'technical-selection-terminal',
                        'name' => 'seleccionar_informacion_tecnica',
                        'input' => [
                            'fact_ids' => [
                                'ps1000-type',
                                'fact-invented',
                            ],
                            'guardrail_ids' => [
                                'ps1000-radial-sipes-not-radial',
                                'guardrail-invented',
                            ],
                            'statement' => 'TEXTO TECNICO INYECTADO',
                        ],
                    ],
                ],
                'stop_reason' => 'tool_use',
            ], 200);

        $result = $this->chatbot()->reply(
            '¿La PS1000 es radial?',
            [],
            5977
        );

        $answer = (string) (
            $result['answer'] ?? ''
        );

        $this->assertSame(
            'Información técnica verificada:'
                .PHP_EOL
                .'- PS1000 es una llanta sólida tipo press-on.'
                .PHP_EOL
                .'- La expresión «laminillas radiales» describe la geometría de la banda de rodamiento. No significa que la PS1000 sea una llanta radial.',
            $answer
        );

        $this->assertStringNotContainsString(
            'TEXTO TECNICO INYECTADO',
            $answer
        );

        $this->assertStringNotContainsString(
            'fact-invented',
            $answer
        );

        $this->assertStringNotContainsString(
            'guardrail-invented',
            $answer
        );

        Http::assertSentCount(2);
    }
    public function test_technical_tool_preserves_curated_spanish_presentation(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass(
            $service
        );

        $method = $reflection->getMethod(
            'executeTechnicalKnowledgeTool'
        );

        $method->setAccessible(true);

        $result = $method->invoke(
            $service,
            'technical-spanish-1',
            5977
        );

        $payload = json_decode(
            (string) ($result['content'] ?? ''),
            true
        );

        $fact = collect(
            $payload['facts'] ?? []
        )->firstWhere(
            'id',
            'ps1000-type'
        );

        $guardrail = collect(
            $payload['guardrails'] ?? []
        )->firstWhere(
            'id',
            'ps1000-radial-sipes-not-radial'
        );

        $this->assertIsArray($fact);

        $this->assertSame(
            'PS1000 es una llanta sólida tipo press-on.',
            $fact['statement_es'] ?? null
        );

        $this->assertIsArray($guardrail);

        $this->assertSame(
            'La expresión «laminillas radiales» describe la geometría de la banda de rodamiento. No significa que la PS1000 sea una llanta radial.',
            $guardrail['rule_es'] ?? null
        );
    }
    public function test_renderer_never_falls_back_to_original_language(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass(
            $service
        );

        $method = $reflection->getMethod(
            'renderAuthorizedTechnicalSelection'
        );

        $method->setAccessible(true);

        $answer = $method->invoke(
            $service,
            [
                'facts' => [
                    [
                        'id' => 'english-only-fact',
                        'statement' => 'THIS ENGLISH FACT MUST NEVER BE RENDERED.',
                    ],
                ],
                'guardrails' => [
                    [
                        'id' => 'english-only-guardrail',
                        'rule' => 'THIS ENGLISH RULE MUST NEVER BE RENDERED.',
                    ],
                ],
            ]
        );

        $this->assertSame(
            'No hay información técnica verificada disponible para responder esta consulta.',
            $answer
        );

        $this->assertStringNotContainsString(
            'THIS ENGLISH FACT MUST NEVER BE RENDERED.',
            $answer
        );

        $this->assertStringNotContainsString(
            'THIS ENGLISH RULE MUST NEVER BE RENDERED.',
            $answer
        );
    }
    public function test_technical_selection_tool_accepts_only_authorized_ids(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);
        $method = $reflection->getMethod('tools');
        $method->setAccessible(true);

        $tools = $method->invoke($service);

        $selection = collect($tools)->firstWhere(
            'name',
            'seleccionar_informacion_tecnica'
        );

        $this->assertIsArray($selection);

        $schema = $selection['input_schema'];

        $this->assertSame('object', $schema['type']);

        $this->assertSame(
            ['fact_ids', 'guardrail_ids'],
            array_keys($schema['properties'])
        );

        $this->assertSame(
            ['fact_ids', 'guardrail_ids'],
            $schema['required']
        );

        $this->assertFalse(
            $schema['additionalProperties']
        );

        $serialized = json_encode(
            $schema,
            JSON_UNESCAPED_UNICODE
        );

        foreach ([
            'product_id',
            'sku',
            'model',
            'variant',
            'scope',
            'statement',
            'price',
            'url',
        ] as $forbidden) {
            $this->assertStringNotContainsString(
                $forbidden,
                $serialized
            );
        }
    }

    public function test_technical_selection_is_blocked_in_same_batch_as_product_search(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);
        $method = $reflection->getMethod('executeTool');
        $method->setAccessible(true);

        $quoteContext = null;

        $knowledge = [
            'status' => 'knowledge_resolved',
            'facts' => [
                [
                    'id' => 'old-fact',
                    'statement_es' => 'CONOCIMIENTO ANTERIOR NO DEBE USARSE.',
                ],
            ],
            'guardrails' => [],
        ];

        $arguments = [
            [
                'id' => 'selection-blocked-1',
                'name' => 'seleccionar_informacion_tecnica',
                'input' => [
                    'fact_ids' => ['old-fact'],
                    'guardrail_ids' => [],
                ],
            ],
            5977,
            &$quoteContext,
            true,
            false,
            $knowledge,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            (string) ($result['content'] ?? ''),
            true
        );

        $this->assertTrue(
            (bool) ($result['is_error'] ?? false)
        );

        $this->assertSame(
            'technical_selection_waiting_product_verification',
            $payload['status'] ?? null
        );

        $this->assertStringNotContainsString(
            'CONOCIMIENTO ANTERIOR NO DEBE USARSE.',
            (string) ($result['content'] ?? '')
        );
    }

    public function test_system_prompt_requires_selection_after_verified_knowledge(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);
        $method = $reflection->getMethod('systemPrompt');
        $method->setAccessible(true);

        $prompt = (string) $method->invoke($service);

        $this->assertStringContainsString(
            'no redactes todavía una respuesta técnica',
            $prompt
        );

        $this->assertStringContainsString(
            'Usa inmediatamente seleccionar_informacion_tecnica',
            $prompt
        );

        $this->assertStringContainsString(
            'sólo recibe fact_ids y guardrail_ids',
            $prompt
        );

        $this->assertStringContainsString(
            'No inventes, reconstruyas ni modifiques IDs',
            $prompt
        );
    }
    public function test_technical_selection_is_deferred_when_quote_is_in_same_batch(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);
        $method = $reflection->getMethod('executeTool');
        $method->setAccessible(true);

        $quoteContext = null;

        $knowledge = [
            'status' => 'knowledge_resolved',
            'facts' => [
                [
                    'id' => 'fact-safe',
                    'statement_es' => 'ESTE TEXTO NO DEBE RENDERIZARSE TODAVÍA.',
                ],
            ],
            'guardrails' => [],
        ];

        $arguments = [
            [
                'id' => 'selection-waits-for-quote',
                'name' => 'seleccionar_informacion_tecnica',
                'input' => [
                    'fact_ids' => ['fact-safe'],
                    'guardrail_ids' => [],
                ],
            ],
            5977,
            &$quoteContext,
            true,
            true,
            $knowledge,
            false,
        ];

        $result = $method->invokeArgs(
            $service,
            $arguments
        );

        $payload = json_decode(
            (string) ($result['content'] ?? ''),
            true
        );

        $this->assertTrue(
            (bool) ($result['is_error'] ?? false)
        );

        $this->assertSame(
            'technical_selection_waiting_quote',
            $payload['status'] ?? null
        );

        $this->assertStringNotContainsString(
            'ESTE TEXTO NO DEBE RENDERIZARSE TODAVÍA.',
            (string) ($result['content'] ?? '')
        );
    }

    public function test_system_prompt_prioritizes_quote_before_technical_selection(): void
    {
        $service = $this->chatbot();

        $reflection = new ReflectionClass($service);
        $method = $reflection->getMethod('systemPrompt');
        $method->setAccessible(true);

        $prompt = (string) $method->invoke($service);

        $this->assertStringContainsString(
            'No uses seleccionar_informacion_tecnica en la misma ejecución de herramientas que generar_cotizacion',
            $prompt
        );

        $this->assertStringContainsString(
            'procesa primero generar_cotizacion',
            $prompt
        );

        $this->assertStringContainsString(
            'quoted o already_quoted',
            $prompt
        );

        $this->assertStringContainsString(
            'resuelve primero ese estado',
            $prompt
        );
    }
    public function test_reply_processes_quote_before_deferred_technical_selection_regardless_of_tool_order(): void
    {
        config([
            'services.anthropic.api_key' => 'test-key',
            'services.anthropic.base_url' => 'https://anthropic.example.test',
            'services.ruguex.formal_quote_endpoint' => 'https://quotes.example.test/formal',
            'services.ruguex.formal_quote_token' => 'test-quote-token',
            'services.ruguex.formal_quote_timeout' => 10,
        ]);

        $anthropicCalls = 0;
        $quoteCalls = 0;
        $quoteRequestPayload = null;
        $thirdAnthropicPayload = null;

        Http::fake(
            function ($request) use (
                &$anthropicCalls,
                &$quoteCalls,
                &$quoteRequestPayload,
                &$thirdAnthropicPayload
            ) {
                $url = $request->url();

                if (str_contains($url, '/v1/messages')) {
                    $anthropicCalls++;

                    if ($anthropicCalls === 1) {
                        return Http::response([
                            'id' => 'msg-multi-1',
                            'model' => 'test-model',
                            'content' => [
                                [
                                    'type' => 'tool_use',
                                    'id' => 'knowledge-multi-1',
                                    'name' => 'consultar_conocimiento_tecnico',
                                    'input' => (object) [],
                                ],
                            ],
                            'stop_reason' => 'tool_use',
                        ], 200);
                    }

                    if ($anthropicCalls === 2) {
                        return Http::response([
                            'id' => 'msg-multi-2',
                            'model' => 'test-model',
                            'content' => [
                                [
                                    'type' => 'tool_use',
                                    'id' => 'selection-multi-too-early',
                                    'name' => 'seleccionar_informacion_tecnica',
                                    'input' => [
                                        'fact_ids' => [
                                            'ps1000-type',
                                        ],
                                        'guardrail_ids' => [
                                            'ps1000-radial-sipes-not-radial',
                                        ],
                                    ],
                                ],
                                [
                                    'type' => 'tool_use',
                                    'id' => 'quote-multi-1',
                                    'name' => 'generar_cotizacion',
                                    'input' => [
                                        'cliente' => 'Empresa Prueba',
                                        'contacto' => 'Cliente Prueba',
                                        'correo' => 'cliente@example.com',
                                        'telefono' => '2221234567',
                                        'ubicacion' => 'Puebla',
                                        'cantidad' => 2,
                                    ],
                                ],
                            ],
                            'stop_reason' => 'tool_use',
                        ], 200);
                    }

                    if ($anthropicCalls === 3) {
                        $thirdAnthropicPayload =
                            $request->data();

                        return Http::response([
                            'id' => 'msg-multi-3',
                            'model' => 'test-model',
                            'content' => [
                                [
                                    'type' => 'tool_use',
                                    'id' => 'selection-multi-final',
                                    'name' => 'seleccionar_informacion_tecnica',
                                    'input' => [
                                        'fact_ids' => [
                                            'ps1000-type',
                                        ],
                                        'guardrail_ids' => [
                                            'ps1000-radial-sipes-not-radial',
                                        ],
                                    ],
                                ],
                            ],
                            'stop_reason' => 'tool_use',
                        ], 200);
                    }

                    throw new \RuntimeException(
                        'Claude recibió una llamada inesperada.'
                    );
                }

                if ($url === 'https://quotes.example.test/formal') {
                    $quoteCalls++;
                    $quoteRequestPayload =
                        $request->data();

                    return Http::response([
                        'success' => true,
                        'data' => [
                            'message' => 'Cotización generada correctamente.',
                            'folio' => 'RGX/TEST/001',
                            'pdf_url' => 'https://example.test/cotizacion.pdf',
                            'total' => 6382.38,
                        ],
                    ], 200);
                }

                throw new \RuntimeException(
                    'Petición HTTP inesperada: '.$url
                );
            }
        );

        $result = $this->chatbot()->reply(
            '¿La PS1000 es radial? También genera mi cotización con los datos proporcionados.',
            [],
            5977
        );

        $this->assertSame(
            3,
            $anthropicCalls
        );

        $this->assertSame(
            1,
            $quoteCalls
        );

        $this->assertIsArray(
            $quoteRequestPayload
        );

        $this->assertSame(
            5977,
            $quoteRequestPayload['producto_id'] ?? null
        );

        $this->assertSame(
            'Empresa Prueba',
            $quoteRequestPayload['cliente'] ?? null
        );

        $this->assertSame(
            2,
            $quoteRequestPayload['cantidad'] ?? null
        );

        $this->assertSame(
            'RGX/TEST/001',
            $result['quote']['folio'] ?? null
        );

        $this->assertSame(
            6382.38,
            $result['quote']['total'] ?? null
        );

        $this->assertSame(
            'Información técnica verificada:'
                .PHP_EOL
                .'- PS1000 es una llanta sólida tipo press-on.'
                .PHP_EOL
                .'- La expresión «laminillas radiales» describe la geometría de la banda de rodamiento. No significa que la PS1000 sea una llanta radial.',
            $result['answer'] ?? null
        );

        $this->assertIsArray(
            $thirdAnthropicPayload
        );

        $statuses = [];

        foreach (
            $thirdAnthropicPayload['messages'] ?? []
            as $message
        ) {
            if (
                ($message['role'] ?? null) !== 'user'
                || ! is_array($message['content'] ?? null)
            ) {
                continue;
            }

            foreach ($message['content'] as $part) {
                if (
                    ! is_array($part)
                    || ($part['type'] ?? null) !== 'tool_result'
                ) {
                    continue;
                }

                $payload = json_decode(
                    (string) ($part['content'] ?? ''),
                    true
                );

                if (
                    is_array($payload)
                    && is_string($payload['status'] ?? null)
                ) {
                    $statuses[] = $payload['status'];
                }
            }
        }

        $this->assertContains(
            'technical_selection_waiting_quote',
            $statuses
        );

        $this->assertContains(
            'quoted',
            $statuses
        );

        $this->assertNotEmpty(
            $result['quote_context']['fingerprint'] ?? null
        );

        $this->assertSame(
            5977,
            $result['quote_context']['product_id'] ?? null
        );
    }
}
