<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
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
}
