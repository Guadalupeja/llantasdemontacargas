<?php

namespace Tests\Unit;

use App\Services\RgxChatbotService;
use ReflectionMethod;
use Tests\TestCase;

class RgxChatbotSiteContextTest extends TestCase
{
    private function prompt(array $context = []): string
    {
        $service = app(RgxChatbotService::class);

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );

        return (string) $method->invoke(
            $service,
            $context
        );
    }

    public function test_montacargas_is_default_context(): void
    {
        $prompt = $this->prompt();

        $this->assertStringContainsString(
            'Su contexto predeterminado es montacargas.',
            $prompt
        );

        $this->assertStringContainsString(
            'usa vertical=montacargas',
            $prompt
        );
    }

    public function test_minicargadores_site_changes_default_context(): void
    {
        $prompt = $this->prompt([
            'site_origin' => 'llantasparaminicargadores.com',
            'default_vertical' => 'minicargadores',
        ]);

        $this->assertStringContainsString(
            'El sitio de origen es llantasparaminicargadores.com.',
            $prompt
        );

        $this->assertStringContainsString(
            'Su contexto predeterminado es minicargadores.',
            $prompt
        );

        $this->assertStringContainsString(
            'usa vertical=minicargadores',
            $prompt
        );

        $this->assertStringContainsString(
            'Una intención explícita de montacargas siempre prevalece',
            $prompt
        );
    }

    public function test_prompt_forbids_turning_catalog_attributes_into_technical_claims(): void
    {
        $prompt = preg_replace(
            '/\\s+/u',
            ' ',
            $this->prompt()
        );

        $this->assertIsString($prompt);

        $this->assertStringContainsString(
            'pueden mostrarse literalmente como datos de catálogo verificados',
            $prompt
        );

        $this->assertStringContainsString(
            'No afirmes que una llanta "está diseñada para"',
            $prompt
        );

        $this->assertStringContainsString(
            'consultar_conocimiento_tecnico',
            $prompt
        );
    }

    public function test_prompt_knows_server_has_selected_product_without_exposing_identity(): void
    {
        $service = app(RgxChatbotService::class);

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );

        $method->setAccessible(true);

        $prompt = (string) $method->invoke(
            $service,
            [
                'site_origin' =>
                    'llantasdemontacargas.com',

                'default_vertical' =>
                    'montacargas',
            ],
            true
        );

        $this->assertStringContainsString(
            'El servidor ya tiene un producto verificado seleccionado para esta conversación.',
            $prompt
        );

        $this->assertStringContainsString(
            'no vuelvas a pedir tipo, medida ni modelo',
            $prompt
        );

        $this->assertStringContainsString(
            'Si solicita información técnica de ese producto, usa consultar_conocimiento_tecnico.',
            $prompt
        );

        $this->assertStringContainsString(
            'bajo control exclusivo del servidor',
            $prompt
        );

        $this->assertStringNotContainsString(
            '6074',
            $prompt
        );

        $this->assertStringNotContainsString(
            'GX88542692',
            $prompt
        );
    }

    public function test_prompt_does_not_claim_server_selection_when_none_exists(): void
    {
        $service = app(RgxChatbotService::class);

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );

        $method->setAccessible(true);

        $prompt = (string) $method->invoke(
            $service,
            [
                'site_origin' =>
                    'llantasdemontacargas.com',

                'default_vertical' =>
                    'montacargas',
            ],
            false
        );

        $this->assertStringNotContainsString(
            'verificado seleccionado para esta conversación.',
            $prompt
        );
    }

}
