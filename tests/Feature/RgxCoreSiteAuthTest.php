<?php

namespace Tests\Feature;

use App\Services\RgxChatbotService;
use Illuminate\Support\Facades\Cache;
use Mockery;
use Tests\TestCase;

class RgxCoreSiteAuthTest extends TestCase
{
    private string $token =
        'test-private-rgx-core-token-000000000001';

    private function configureCore(): void
    {
        config()->set(
            'rgx-chatbot.state_store',
            'array'
        );

        Cache::store('array')->flush();

        config()->set(
            'rgx-chatbot.core_sites',
            [
                'minicargadores' => [
                    'token' => $this->token,

                    'origin' =>
                        'llantasparaminicargadores.com',

                    'default_vertical' =>
                        'minicargadores',
                ],
            ]
        );
    }

    private function payload(): array
    {
        return [
            'message' =>
                'Necesito una llanta para minicargador.',

            'conversation_id' =>
                '550e8400-e29b-41d4-a716-446655440000',

            'scope' =>
                '550e8400-e29b-41d4-a716-446655440001',

            'history' => [],
        ];
    }

    public function test_private_core_rejects_missing_token(): void
    {
        $this->configureCore();

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldNotReceive('reply');

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $this->postJson(
            '/api/rgx-assistant/v1/message',
            $this->payload()
        )
            ->assertStatus(401)
            ->assertExactJson([
                'error' => 'No autorizado.',
            ]);
    }

    public function test_private_core_rejects_invalid_token(): void
    {
        $this->configureCore();

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldNotReceive('reply');

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $this
            ->withToken(
                'invalid-private-token-that-is-long-enough-000'
            )
            ->postJson(
                '/api/rgx-assistant/v1/message',
                $this->payload()
            )
            ->assertStatus(401);
    }

    public function test_private_core_requires_server_scope_uuid(): void
    {
        $this->configureCore();

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldNotReceive('reply');

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $payload = $this->payload();
        $payload['scope'] = 'scope-controlado-por-browser';

        $this
            ->withToken($this->token)
            ->postJson(
                '/api/rgx-assistant/v1/message',
                $payload
            )
            ->assertStatus(422)
            ->assertJsonPath(
                'error',
                'Solicitud inválida.'
            );
    }

    public function test_private_core_derives_site_only_from_authenticated_token(): void
    {
        $this->configureCore();

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
                    array $siteContext
                ): bool {
                    $this->assertSame(
                        'Necesito una llanta para minicargador.',
                        $message
                    );

                    $this->assertSame(
                        [],
                        $history
                    );

                    $this->assertNull(
                        $selectedProductId
                    );

                    $this->assertNull(
                        $quoteContext
                    );

                    $this->assertNull(
                        $advisorContext
                    );

                    /*
                     * Debe venir exclusivamente
                     * de la identidad del token.
                     */
                    $this->assertSame(
                        'llantasparaminicargadores.com',
                        $siteContext['site_origin']
                    );

                    $this->assertSame(
                        'minicargadores',
                        $siteContext[
                            'default_vertical'
                        ]
                    );

                    return true;
                }
            )
            ->andReturn([
                'answer' =>
                    'Respuesta privada de prueba.',

                'product' => null,

                'product_search_status' =>
                    null,

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

        /*
         * Intento malicioso:
         * estos campos NO son autoridad.
         */
        $payload['site_id'] = 'montacargas';
        $payload['site_origin'] = 'evil.example';
        $payload['default_vertical'] =
            'montacargas';

        $this
            ->withToken($this->token)
            ->postJson(
                '/api/rgx-assistant/v1/message',
                $payload
            )
            ->assertOk()
            ->assertJsonPath(
                'answer',
                'Respuesta privada de prueba.'
            );
    }

    public function test_duplicate_server_token_fails_closed(): void
    {
        $this->configureCore();

        config()->set(
            'rgx-chatbot.core_sites.bobcat',
            [
                'token' => $this->token,

                'origin' =>
                    'llantasbobcat.com',

                'default_vertical' =>
                    'minicargadores',
            ]
        );

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldNotReceive('reply');

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
}
