<?php

namespace Tests\Feature;

use App\Services\RgxChatbotService;
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
            'conversation_id' =>
                (string) Str::uuid(),
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
                'conversation_id' =>
                    (string) Str::uuid(),
                'history' => [],
            ]
        );

        $response
            ->assertStatus(502)
            ->assertJson([
                'error' =>
                    'El asistente no pudo responder en este momento.',
            ]);

        Log::shouldHaveReceived('error')
            ->once()
            ->with(
                'RGX chatbot error',
                Mockery::on(
                    function (array $context): bool {
                        return (
                            ($context['exception'] ?? null)
                                === RuntimeException::class
                            && ! array_key_exists(
                                'message',
                                $context
                            )
                            && ! str_contains(
                                json_encode($context),
                                'SENSITIVE_UPSTREAM_RESPONSE'
                            )
                        );
                    }
                )
            );
    }
}
