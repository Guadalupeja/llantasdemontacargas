<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use ReflectionClass;
use ReflectionMethod;
use Tests\TestCase;

class RgxStoreConversationPromptTest extends TestCase
{
    private function prompt(
        array $siteContext
    ): string {
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

        return (string) $method->invoke(
            $service,
            $siteContext,
            false
        );
    }

    public function test_neutral_store_asks_only_vertical_before_search(): void
    {
        $prompt = $this->prompt([
            'site_origin' => 'llantasdemontacargas.com/tienda-en-linea',
            'default_vertical' => null,
        ]);

        $this->assertStringContainsString(
            'la unica aclaracion permitida es si la llanta es para montacargas o minicargador',
            $prompt
        );

        $this->assertStringContainsString(
            'No preguntes tipo, medida, modelo, linea, servicio, dibujo ni otra especificacion en ese mismo turno.',
            $prompt
        );
    }

    public function test_search_criteria_are_progressive_not_mandatory(): void
    {
        $prompt = $this->prompt([
            'site_origin' => 'llantasdemontacargas.com',
            'default_vertical' => 'montacargas',
        ]);

        $this->assertStringContainsString(
            'No todos son obligatorios en cada busqueda.',
            $this->withoutAccents($prompt)
        );

        $this->assertStringContainsString(
            'No exijas el tipo de llanta si no fue proporcionado',
            $prompt
        );

        $this->assertStringNotContainsString(
            'Los tres datos principales para iniciar una busqueda son:',
            $this->withoutAccents($prompt)
        );
    }

    public function test_follow_up_reuses_previous_user_criteria(): void
    {
        $prompt = $this->prompt([
            'site_origin' => 'llantasdemontacargas.com/tienda-en-linea',
            'default_vertical' => null,
        ]);

        $this->assertStringContainsString(
            'No descartes ni vuelvas a pedir un criterio previo solo porque el cliente no lo repita.',
            $prompt
        );

        $this->assertStringContainsString(
            'Vuelve a usar buscar_producto inmediatamente.',
            $prompt
        );
    }

    private function withoutAccents(
        string $value
    ): string {
        return strtr(
            $value,
            [
                'á' => 'a',
                'é' => 'e',
                'í' => 'i',
                'ó' => 'o',
                'ú' => 'u',
                'Á' => 'A',
                'É' => 'E',
                'Í' => 'I',
                'Ó' => 'O',
                'Ú' => 'U',
            ]
        );
    }
}
