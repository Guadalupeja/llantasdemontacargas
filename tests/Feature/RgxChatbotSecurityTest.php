<?php

namespace Tests\Feature;

use App\Services\RgxChatbotService;
use App\Services\RgxChatbotStateStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Mockery;
use RuntimeException;
use Tests\TestCase;

class RgxChatbotSecurityTest extends TestCase
{
    public function test_chatbot_message_is_rate_limited(): void
    {
        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldReceive('reply')
            ->times(12)
            ->andReturn([
                'answer' => 'Respuesta de prueba.',
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

        $this->withServerVariables([
            'REMOTE_ADDR' => '198.51.100.71',
        ]);

        $payload = [
            'message' => 'Hola',
            'conversation_id' => (string) Str::uuid(),
            'history' => [],
        ];

        for ($i = 0; $i < 12; $i++) {
            $this->postJson(
                '/chatbot/message',
                $payload
            )->assertOk();
        }

        $this->postJson(
            '/chatbot/message',
            $payload
        )->assertStatus(429);
    }

    public function test_legacy_specialist_route_is_removed(): void
    {
        $this->assertFalse(
            Route::has(
                'chatbot.specialist-request'
            )
        );
    }

    public function test_chatbot_error_log_does_not_persist_exception_message(): void
    {
        Log::spy();

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldReceive('reply')
            ->once()
            ->andThrow(
                new RuntimeException(
                    'SENSITIVE_UPSTREAM_RESPONSE'
                )
            );

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $this->withServerVariables([
            'REMOTE_ADDR' => '198.51.100.72',
        ]);

        $response = $this->postJson(
            '/chatbot/message',
            [
                'message' => 'Hola',
                'conversation_id' => (string) Str::uuid(),
                'history' => [],
            ]
        );

        $response
            ->assertStatus(502)
            ->assertJson([
                'error' => 'El asistente no pudo responder en este momento.',
            ]);

        Log::shouldHaveReceived('error')
            ->once()
            ->with(
                'RGX chatbot error',
                Mockery::on(
                    function (array $context): bool {
                        return
                            ($context['exception'] ?? null)
                                === RuntimeException::class
                            && ! array_key_exists(
                                'message',
                                $context
                            )
                            && ! str_contains(
                                json_encode($context),
                                'SENSITIVE_UPSTREAM_RESPONSE'
                            );
                    }
                )
            );
    }

    public function test_chatbot_state_is_kept_out_of_session(): void
    {
        config()->set(
            'rgx-chatbot.state_store',
            'array'
        );

        Cache::store('array')->flush();

        $conversationId =
            (string) Str::uuid();

        $scope =
            (string) Str::uuid();

        $calls = 0;

        $chatbot = Mockery::mock(
            RgxChatbotService::class
        );

        $chatbot
            ->shouldReceive('reply')
            ->twice()
            ->andReturnUsing(
                function (
                    string $message,
                    array $history,
                    ?int $selectedProductId,
                    ?array $quoteContext,
                    ?array $advisorContext,
                    array $siteContext
                ) use (&$calls): array {
                    $calls++;

                    $this->assertSame(
                        'llantasdemontacargas.com',
                        $siteContext[
                            'site_origin'
                        ]
                    );

                    $this->assertSame(
                        'montacargas',
                        $siteContext[
                            'default_vertical'
                        ]
                    );

                    if ($calls === 1) {
                        $this->assertNull(
                            $selectedProductId
                        );

                        $this->assertNull(
                            $quoteContext
                        );

                        $this->assertNull(
                            $advisorContext
                        );

                        return [
                            'answer' => 'Producto resuelto.',

                            'product' => [
                                'product_id' => 6074,

                                'vertical' => 'montacargas',

                                'sku' => 'TEST-6074',
                            ],

                            'product_search_status' => 'resolved',

                            'quote' => null,

                            'quote_context' => [
                                'marker' => 'quote-context',
                            ],

                            'advisor_context' => [
                                'contact_requested' => false,
                            ],

                            'advisor_contact' => null,

                            'advisor_request' => null,
                        ];
                    }

                    $this->assertSame(
                        6074,
                        $selectedProductId
                    );

                    $this->assertSame(
                        'quote-context',
                        $quoteContext[
                            'marker'
                        ]
                    );

                    $this->assertFalse(
                        $advisorContext[
                            'contact_requested'
                        ]
                    );

                    return [
                        'answer' => 'Estado recuperado.',

                        'product' => null,

                        'product_search_status' => null,

                        'quote' => null,

                        'quote_context' => $quoteContext,

                        'advisor_context' => $advisorContext,

                        'advisor_contact' => null,

                        'advisor_request' => null,
                    ];
                }
            );

        $this->app->instance(
            RgxChatbotService::class,
            $chatbot
        );

        $payload = [
            'message' => 'Hola',

            'conversation_id' => $conversationId,

            'history' => [],
        ];

        $this
            ->withSession([
                'rgx_chatbot.scope' => $scope,
            ])
            ->postJson(
                '/chatbot/message',
                $payload
            )
            ->assertOk();

        $this
            ->withSession([
                'rgx_chatbot.scope' => $scope,
            ])
            ->postJson(
                '/chatbot/message',
                $payload
            )
            ->assertOk();

        $this->assertSame(
            2,
            $calls
        );

        $state = app(
            RgxChatbotStateStore::class
        )->load(
            'montacargas',
            $conversationId,
            $scope
        );

        $this->assertSame(
            6074,
            $state[
                'selected_product'
            ]['product_id']
        );

        $this->assertSame(
            'montacargas',
            $state[
                'selected_product'
            ]['vertical']
        );

        $this->assertSame(
            'quote-context',
            $state[
                'quote_context'
            ]['marker']
        );

        $this->assertSame(
            $scope,
            session('rgx_chatbot.scope')
        );

        $this->assertFalse(
            session()->has(
                "rgx_chatbot.selected_products.{$conversationId}"
            )
        );

        $this->assertFalse(
            session()->has(
                "rgx_chatbot.quotations.{$conversationId}"
            )
        );

        $this->assertFalse(
            session()->has(
                "rgx_chatbot.advisor.{$conversationId}"
            )
        );
    }
}
