<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use ReflectionClass;
use Tests\TestCase;

class RgxChatbotQuoteAnswerTest extends TestCase
{
    private function finalize(
        string $modelAnswer,
        ?array $quote,
        ?string $status
    ): string {
        $service = app(
            RgxChatbotService::class
        );

        $reflection = new ReflectionClass(
            $service
        );

        $method = $reflection->getMethod(
            'finalizeAnswer'
        );

        $method->setAccessible(true);

        return $method->invoke(
            $service,
            $modelAnswer,
            $quote,
            $status
        );
    }

    public function test_quoted_answer_is_server_controlled_and_cannot_promise_handoff(): void
    {
        $answer = $this->finalize(
            'Un asesor se pondrá en contacto contigo pronto para procesar tu pedido.',
            [
                'folio' => 'RGX/TWS/MKT/WEB/14',
                'total' => 15600.40,
                'pdf_url' => 'http://example.test/cotizacion.pdf',
            ],
            'quoted'
        );

        $this->assertStringContainsString(
            'cotización fue generada correctamente',
            $answer
        );

        $this->assertStringContainsString(
            'RGX/TWS/MKT/WEB/14',
            $answer
        );

        $this->assertStringContainsString(
            '$15,600.40 MXN',
            $answer
        );

        $normalized = mb_strtolower(
            $answer
        );

        $this->assertStringNotContainsString(
            'asesor',
            $normalized
        );

        $this->assertStringNotContainsString(
            'se pondrá en contacto',
            $normalized
        );

        $this->assertStringNotContainsString(
            'procesar tu pedido',
            $normalized
        );

        $this->assertStringNotContainsString(
            'example.test',
            $normalized
        );
    }

    public function test_already_quoted_is_server_controlled_without_claiming_new_generation(): void
    {
        $answer = $this->finalize(
            'Texto libre del modelo.',
            [
                'folio' => 'RGX/TWS/MKT/WEB/14',
                'total' => 15600.40,
            ],
            'already_quoted'
        );

        $this->assertStringContainsString(
            'ya había sido generada',
            $answer
        );

        $this->assertStringNotContainsString(
            'fue generada correctamente',
            $answer
        );

        $this->assertStringContainsString(
            'RGX/TWS/MKT/WEB/14',
            $answer
        );
    }

    public function test_non_quote_answer_remains_model_controlled(): void
    {
        $original =
            'Respuesta normal del chatbot.';

        $this->assertSame(
            $original,
            $this->finalize(
                $original,
                null,
                null
            )
        );
    }
}
