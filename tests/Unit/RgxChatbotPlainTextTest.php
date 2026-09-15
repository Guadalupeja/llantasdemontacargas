<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use ReflectionMethod;
use Tests\TestCase;

class RgxChatbotPlainTextTest extends TestCase
{
    private function normalize(
        string $value
    ): string {
        $service = app(
            RgxChatbotService::class
        );

        $method = new ReflectionMethod(
            $service,
            'normalizeAssistantPlainText'
        );

        $method->setAccessible(true);

        return (string) $method->invoke(
            $service,
            $value
        );
    }

    public function test_markdown_bold_and_code_markers_are_removed(): void
    {
        $result = $this->normalize(
            "**Llanta TR-900**\nPrecio: `$9,715.39 MXN`"
        );

        $this->assertSame(
            "Llanta TR-900\nPrecio: $9,715.39 MXN",
            $result
        );

        $this->assertStringNotContainsString(
            '*',
            $result
        );

        $this->assertStringNotContainsString(
            '`',
            $result
        );
    }

    public function test_markdown_heading_prefixes_are_removed(): void
    {
        $result = $this->normalize(
            "# Producto\n## Detalles\nTR-900"
        );

        $this->assertSame(
            "Producto\nDetalles\nTR-900",
            $result
        );
    }

    public function test_markdown_link_is_reduced_to_label(): void
    {
        $result = $this->normalize(
            'Consulta [el producto](https://example.com/producto).'
        );

        $this->assertSame(
            'Consulta el producto.',
            $result
        );
    }

    public function test_product_measure_and_model_are_unchanged(): void
    {
        $result = $this->normalize(
            'Medida 10-16.5 / modelo TR-900'
        );

        $this->assertSame(
            'Medida 10-16.5 / modelo TR-900',
            $result
        );
    }
}
