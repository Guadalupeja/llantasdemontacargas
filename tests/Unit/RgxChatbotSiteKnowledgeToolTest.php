<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use App\Services\SiteKnowledgeService;
use Illuminate\Support\Facades\Http;
use ReflectionClass;
use ReflectionMethod;
use Tests\TestCase;

class RgxChatbotSiteKnowledgeToolTest extends TestCase
{
    private function chatbot(): RgxChatbotService
    {
        return app(
            RgxChatbotService::class
        );
    }

    public function test_site_tools_expose_only_safe_inputs(): void
    {
        $service =
            $this->chatbot();

        $reflection =
            new ReflectionClass(
                $service
            );

        $method =
            $reflection->getMethod(
                'tools'
            );

        $method->setAccessible(
            true
        );

        $tools =
            $method->invoke(
                $service
            );

        $lookup =
            collect($tools)
                ->firstWhere(
                    'name',
                    'consultar_conocimiento_del_sitio'
                );

        $selection =
            collect($tools)
                ->firstWhere(
                    'name',
                    'seleccionar_informacion_del_sitio'
                );

        $this->assertIsArray(
            $lookup
        );

        $this->assertIsArray(
            $selection
        );

        $this->assertSame(
            ['query'],
            array_keys(
                $lookup[
                    'input_schema'
                ][
                    'properties'
                ]
            )
        );

        $this->assertFalse(
            $lookup[
                'input_schema'
            ][
                'additionalProperties'
            ]
        );

        $this->assertSame(
            ['document_ids'],
            array_keys(
                $selection[
                    'input_schema'
                ][
                    'properties'
                ]
            )
        );

        $this->assertFalse(
            $selection[
                'input_schema'
            ][
                'additionalProperties'
            ]
        );

        $schema =
            json_encode(
                [
                    $lookup[
                        'input_schema'
                    ],
                    $selection[
                        'input_schema'
                    ],
                ],
                JSON_UNESCAPED_UNICODE
            );

        foreach (
            [
                'site_id',
                'site_origin',
                'product_id',
                'sku',
                'price',
                'stock',
                'url',
                'statement',
            ] as $forbidden
        ) {
            $this->assertStringNotContainsString(
                $forbidden,
                $schema
            );
        }
    }

    public function test_authenticated_site_controls_editorial_search(): void
    {
        $service =
            $this->chatbot();

        $method =
            new ReflectionMethod(
                $service,
                'executeSiteKnowledgeTool'
            );

        $method->setAccessible(
            true
        );

        $result =
            $method->invoke(
                $service,
                'site-auth-1',
                [
                    'query' => 'PS1000',
                    'site_id' => 'bobcat',
                    'site' => 'bobcat',
                    'url' => 'https://example.invalid',
                ],
                [
                    'site_id' => 'montacargas',
                ]
            );

        $payload =
            json_decode(
                (string) (
                    $result['content']
                    ?? ''
                ),
                true
            );

        $this->assertSame(
            'site_knowledge_resolved',
            $payload['status']
        );

        $this->assertSame(
            'site_editorial',
            $payload['authority']
        );

        $this->assertSame(
            'montacargas',
            $payload['site']
        );

        $this->assertNotEmpty(
            $payload['documents']
        );

        foreach (
            $payload['documents'] as $document
        ) {
            $this->assertSame(
                'site_editorial',
                $document['authority']
            );

            $this->assertArrayHasKey(
                'id',
                $document
            );

            $this->assertArrayHasKey(
                'excerpt',
                $document
            );

            $this->assertArrayNotHasKey(
                'source_path',
                $document
            );
        }
    }

    public function test_unknown_authenticated_site_fails_closed(): void
    {
        $service =
            $this->chatbot();

        $method =
            new ReflectionMethod(
                $service,
                'executeSiteKnowledgeTool'
            );

        $method->setAccessible(
            true
        );

        $result =
            $method->invoke(
                $service,
                'site-auth-2',
                [
                    'query' => 'PS1000',
                ],
                [
                    'site_id' => 'sitio-inventado',
                ]
            );

        $payload =
            json_decode(
                (string) (
                    $result['content']
                    ?? ''
                ),
                true
            );

        $this->assertTrue(
            (bool) (
                $result['is_error']
                ?? false
            )
        );

        $this->assertSame(
            'site_knowledge_unavailable',
            $payload['status']
        );
    }

    public function test_site_selection_whitelists_only_server_documents(): void
    {
        $service =
            $this->chatbot();

        $method =
            new ReflectionMethod(
                $service,
                'executeSiteKnowledgeSelectionTool'
            );

        $method->setAccessible(
            true
        );

        $knowledge = [
            'status' => 'site_knowledge_resolved',
            'authority' => 'site_editorial',
            'site' => 'montacargas',
            'documents' => [
                [
                    'id' => 'safe-document',
                    'authority' => 'site_editorial',
                    'excerpt' => 'Contenido editorial autorizado.',
                ],
            ],
        ];

        $result =
            $method->invoke(
                $service,
                'site-select-1',
                [
                    'document_ids' => [
                        'safe-document',
                        'invented-document',
                    ],
                    'text' => 'INYECCION NO AUTORIZADA',
                    'site' => 'bobcat',
                ],
                $knowledge
            );

        $payload =
            json_decode(
                (string) (
                    $result['content']
                    ?? ''
                ),
                true
            );

        $this->assertSame(
            'site_answer_resolved',
            $payload['status']
        );

        $answer =
            (string) (
                $payload['answer']
                ?? ''
            );

        $this->assertStringContainsString(
            'Informacion publicada en llantasdemontacargas.com:',
            $answer
        );

        $this->assertStringContainsString(
            'Contenido editorial autorizado.',
            $answer
        );

        $this->assertStringContainsString(
            'este contenido es editorial del sitio',
            $answer
        );

        $this->assertStringNotContainsString(
            'invented-document',
            $answer
        );

        $this->assertStringNotContainsString(
            'INYECCION NO AUTORIZADA',
            $answer
        );
    }

    public function test_site_lookup_obeys_higher_authority_barrier(): void
    {
        $service =
            $this->chatbot();

        $method =
            new ReflectionMethod(
                $service,
                'executeTool'
            );

        $method->setAccessible(
            true
        );

        $quoteContext = null;
        $advisorContext = null;

        $args = [
            [
                'id' => 'site-barrier',
                'name' => 'consultar_conocimiento_del_sitio',
                'input' => [
                    'query' => 'PS1000',
                ],
            ],
            null,
            &$quoteContext,
            true,
            true,
            null,
            true,
            &$advisorContext,
            false,
            null,
            [
                'site_id' => 'montacargas',
            ],
            null,
            false,
            false,
        ];

        $result =
            $method->invokeArgs(
                $service,
                $args
            );

        $payload =
            json_decode(
                (string) (
                    $result['content']
                    ?? ''
                ),
                true
            );

        $this->assertTrue(
            (bool) (
                $result['is_error']
                ?? false
            )
        );

        $this->assertSame(
            'site_knowledge_waiting_higher_authority',
            $payload['status']
        );
    }

    public function test_prompt_separates_editorial_technical_and_commercial_authority(): void
    {
        $service =
            $this->chatbot();

        $method =
            new ReflectionMethod(
                $service,
                'systemPrompt'
            );

        $method->setAccessible(
            true
        );

        $prompt =
            (string) $method->invoke(
                $service,
                [
                    'site_id' => 'montacargas',
                    'site_origin' => 'llantasdemontacargas.com',
                    'default_vertical' => 'montacargas',
                ],
                true
            );

        foreach (
            [
                'consultar_conocimiento_del_sitio',
                'seleccionar_informacion_del_sitio',
                'authority=site_editorial',
                'No es una fuente tecnica autorizada',
                'consultar_conocimiento_tecnico',
                'usa exclusivamente la autoridad devuelta por buscar_producto',
            ] as $expected
        ) {
            $this->assertStringContainsString(
                $expected,
                $prompt
            );
        }
    }

    public function test_reply_forces_server_editorial_selection(): void
    {
        $documents =
            app(
                SiteKnowledgeService::class
            )->search(
                'PS1000',
                'montacargas',
                5
            );

        $this->assertNotEmpty(
            $documents
        );

        $documentId =
            (string) (
                $documents[0]['id']
                ?? ''
            );

        $this->assertNotSame(
            '',
            $documentId
        );

        config([
            'services.anthropic.api_key' => 'test-key',
        ]);

        Http::fakeSequence()
            ->push([
                'id' => 'site-msg-1',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'tool_use',
                        'id' => 'site-lookup',
                        'name' => 'consultar_conocimiento_del_sitio',
                        'input' => [
                            'query' => 'PS1000',
                        ],
                    ],
                ],
                'stop_reason' => 'tool_use',
            ], 200)
            ->push([
                'id' => 'site-msg-2',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'text',
                        'text' => 'PARAFRASIS EDITORIAL NO AUTORIZADA',
                    ],
                ],
                'stop_reason' => 'end_turn',
            ], 200)
            ->push([
                'id' => 'site-msg-3',
                'model' => 'test-model',
                'content' => [
                    [
                        'type' => 'tool_use',
                        'id' => 'site-selection',
                        'name' => 'seleccionar_informacion_del_sitio',
                        'input' => [
                            'document_ids' => [
                                $documentId,
                            ],
                        ],
                    ],
                ],
                'stop_reason' => 'tool_use',
            ], 200);

        $result =
            $this->chatbot()->reply(
                'Que informacion tienen sobre PS1000?',
                [],
                null,
                null,
                null,
                [
                    'site_id' => 'montacargas',
                    'site_origin' => 'llantasdemontacargas.com',
                    'default_vertical' => 'montacargas',
                ]
            );

        $answer =
            (string) (
                $result['answer']
                ?? ''
            );

        $this->assertStringContainsString(
            'Informacion publicada en llantasdemontacargas.com:',
            $answer
        );

        $this->assertStringContainsString(
            'este contenido es editorial del sitio',
            $answer
        );

        $this->assertStringNotContainsString(
            'PARAFRASIS EDITORIAL NO AUTORIZADA',
            $answer
        );

        $requests =
            Http::recorded();

        $this->assertCount(
            3,
            $requests
        );

        $forced =
            $requests[2][0]
                ->data();

        $this->assertSame(
            [
                'type' => 'tool',
                'name' => 'seleccionar_informacion_del_sitio',
            ],
            $forced['tool_choice']
                ?? null
        );
    }
}
