<?php

namespace Tests\Feature;

use App\Services\RgxChatbotService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Mockery;
use RuntimeException;
use Tests\TestCase;

class RgxChatbotSecurityTest extends TestCase
{
    public function test_specialist_request_is_rate_limited(): void
    {
        Mail::fake();

        $this->withServerVariables([
            'REMOTE_ADDR' => '198.51.100.71',
        ]);

        $payload = [
            'name' => 'Cliente Prueba',
            'company' => 'Empresa Prueba',
            'phone' => '2221234567',
            'email' => 'cliente@example.com',
            'message' => 'Necesito asesoría para una llanta.',
            'type' => 'solida',
            'measure' => '16x6x10 1/2',
        ];

        for ($i = 0; $i < 5; $i++) {
            $this->postJson(
                '/chatbot/specialist-request',
                $payload
            )->assertOk();
        }

        $this->postJson(
            '/chatbot/specialist-request',
            $payload
        )->assertStatus(429);

        Mail::assertSentCount(5);
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
