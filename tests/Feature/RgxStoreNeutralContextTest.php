<?php

namespace Tests\Feature;

use App\Services\RgxChatbotService;
use Illuminate\Support\Facades\Cache;
use Mockery;
use ReflectionClass;
use ReflectionMethod;
use Tests\TestCase;

class RgxStoreNeutralContextTest extends TestCase
{
    private string $token =
        'test-private-rgx-store-token-000000000001';

    protected function setUp(): void
    {
        parent::setUp();

        config()->set(
            'rgx-chatbot.state_store',
            'array'
        );

        Cache::store('array')->flush();
    }

    private function configureStore(
        ?string $vertical = null
    ): void {
        config()->set(
            'rgx-chatbot.core_sites',
            [
                'store' => [
                    'token' => $this->token,
                    'origin' => 'llantasdemontacargas.com/tienda-en-linea',
                    'default_vertical' => $vertical,
                ],
            ]
        );
    }

    private function payload(): array
    {
        return [
            'message' => 'Busco una llanta industrial.',
            'conversation_id' => '550e8400-e29b-41d4-a716-446655440010',
            'scope' => '550e8400-e29b-41d4-a716-446655440011',
            'history' => [],
        ];
    }

    public function test_store_is_configured_without_default_vertical(): void
    {
        $store = config(
            'rgx-chatbot.core_sites.store'
        );

        $this->assertIsArray($store);
        $this->assertSame(
            'llantasdemontacargas.com/tienda-en-linea',
            $store['origin']
        );
        $this->assertArrayHasKey(
            'default_vertical',
            $store
        );
        $this->assertNull(
            $store['default_vertical']
        );
    }

    public function test_store_token_preserves_neutral_context_and_ignores_browser_authority(): void
    {
        $this->configureStore();

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldReceive('reply')
            ->once()
            ->withArgs(
                function (
                    string $message,
                    array $history,
                    ?int $selectedProductId,
                    ?array $quoteContext,
                    ?array $advisorContext,
                    array $siteContext,
                    ?string $selectedProductVertical
                ): bool {
                    $this->assertSame(
                        'Busco una llanta industrial.',
                        $message
                    );
                    $this->assertSame([], $history);
                    $this->assertNull(
                        $selectedProductId
                    );
                    $this->assertNull(
                        $quoteContext
                    );
                    $this->assertNull(
                        $advisorContext
                    );
                    $this->assertSame(
                        'llantasdemontacargas.com/tienda-en-linea',
                        $siteContext['site_origin']
                    );
                    $this->assertArrayHasKey(
                        'default_vertical',
                        $siteContext
                    );
                    $this->assertNull(
                        $siteContext['default_vertical']
                    );
                    $this->assertNull(
                        $selectedProductVertical
                    );

                    return true;
                }
            )
            ->andReturn([
                'answer' => 'Necesito saber si la llanta es para montacargas o minicargador.',
                'product' => null,
                'product_search_status' => null,
                'quote' => null,
                'quote_context' => null,
                'advisor_context' => null,
                'advisor_contact' => null,
                'advisor_request' => null,
            ]);

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $payload = $this->payload();

        $payload['site_id'] =
            'minicargadores';
        $payload['site_origin'] =
            'evil.example';
        $payload['default_vertical'] =
            'montacargas';
        $payload['product_id'] = 6378;

        $this
            ->withToken($this->token)
            ->postJson(
                '/api/rgx-assistant/v1/message',
                $payload
            )
            ->assertOk()
            ->assertJsonPath(
                'answer',
                'Necesito saber si la llanta es para montacargas o minicargador.'
            );
    }

    public function test_invalid_non_null_store_vertical_fails_closed(): void
    {
        $this->configureStore('general');

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot->shouldNotReceive('reply');

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $this
            ->withToken($this->token)
            ->postJson(
                '/api/rgx-assistant/v1/message',
                $this->payload()
            )
            ->assertStatus(401);
    }

    public function test_neutral_store_prompt_requires_vertical_before_product_search(): void
    {
        $reflection = new ReflectionClass(
            RgxChatbotService::class
        );

        $service =
            $reflection->newInstanceWithoutConstructor();

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );

        $method->setAccessible(true);

        $prompt = $method->invoke(
            $service,
            [
                'site_origin' => 'llantasdemontacargas.com/tienda-en-linea',
                'default_vertical' => null,
            ],
            false
        );

        $this->assertStringContainsString(
            'Este sitio no tiene una vertical predeterminada.',
            $prompt
        );
        $this->assertStringContainsString(
            'No asumas montacargas ni minicargadores',
            $prompt
        );
        $this->assertStringContainsString(
            'antes de usar buscar_producto',
            $prompt
        );
        $this->assertStringNotContainsString(
            'Su contexto predeterminado es montacargas.',
            $prompt
        );
    }

    public function test_product_search_fails_safe_while_store_vertical_is_unresolved(): void
    {
        $service = app(
            RgxChatbotService::class
        );

        $method = new ReflectionMethod(
            $service,
            'executeTool'
        );

        $method->setAccessible(true);

        $quoteContext = null;
        $advisorContext = null;

        $toolUse = [
            'id' => 'store-neutral-search',
            'name' => 'buscar_producto',
            'input' => [
                'type' => 'neumatica',
                'measure' => '10-16.5',
                'model' => 'BIG BOY',
            ],
        ];

        $args = [
            $toolUse,
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
                'site_id' => 'store',
                'site_origin' => 'llantasdemontacargas.com/tienda-en-linea',
                'default_vertical' => null,
            ],
            null,
            true,
            true,
        ];

        $result = $method->invokeArgs(
            $service,
            $args
        );

        $payload = json_decode(
            (string) $result['content'],
            true
        );

        $this->assertSame(
            'needs_clarification',
            $payload['status']
        );
        $this->assertSame(
            'vertical',
            $payload['clarification_field']
        );
        $this->assertSame(
            ['montacargas', 'minicargadores'],
            $payload['options']
        );
    }
}
