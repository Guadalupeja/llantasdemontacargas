<?php

namespace Tests\Feature;

use App\Services\MontacargasProductSearchService;
use App\Services\RgxChatbotService;
use ReflectionMethod;
use Tests\TestCase;

class RgxFlexibleProductSearchTest extends TestCase
{
    public function test_minicargador_neumatica_10_16_5_finds_real_models_without_requiring_model(): void
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $products = $service->searchLocal(
            'neumatica',
            '10-16.5',
            null,
            'minicargadores'
        );

        $this->assertGreaterThanOrEqual(
            2,
            $products->count()
        );

        $models = $products
            ->pluck('model')
            ->filter()
            ->map(
                fn ($model): string => mb_strtoupper(
                    (string) $model
                )
            );

        $this->assertTrue(
            $models->contains(
                fn ($model): bool => str_contains(
                    $model,
                    'BIG BOY'
                )
            )
        );

        $this->assertTrue(
            $models->contains(
                fn ($model): bool => str_contains(
                    $model,
                    'SK-05'
                )
            )
        );

        $clarification =
            $service->nextClarification(
                $products
            );

        $this->assertIsArray(
            $clarification
        );

        $this->assertSame(
            'model',
            $clarification['attribute']
        );
    }

    public function test_buscar_producto_schema_does_not_require_type_measure_and_model_together(): void
    {
        $service = app(
            RgxChatbotService::class
        );

        $method = new ReflectionMethod(
            $service,
            'tools'
        );

        $method->setAccessible(true);

        $tools = $method->invoke(
            $service
        );

        $tool = collect($tools)
            ->firstWhere(
                'name',
                'buscar_producto'
            );

        $this->assertIsArray($tool);

        $this->assertSame(
            [],
            $tool['input_schema']['required']
        );
    }

    public function test_multiple_minicargador_candidates_expose_safe_comparison_summary(): void
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $result = $service->resolveForChatbot([
            'vertical' => 'minicargadores',
            'type' => 'neumatica',
            'measure' => '10-16.5',
        ]);

        $this->assertSame(
            'needs_clarification',
            $result['status']
        );

        $this->assertGreaterThanOrEqual(
            2,
            $result['candidate_count']
        );

        $this->assertIsArray(
            $result['candidates'] ?? null
        );

        $models = collect(
            $result['candidates']
        )
            ->pluck('model')
            ->filter()
            ->map(
                fn ($model): string => mb_strtoupper(
                    (string) $model
                )
            );

        $this->assertTrue(
            $models->contains(
                fn (string $model): bool => str_contains(
                    $model,
                    'SK-05'
                )
            )
        );

        $this->assertTrue(
            $models->contains(
                fn (string $model): bool => str_contains(
                    $model,
                    'BIG BOY'
                )
            )
        );
    }

    public function test_candidate_summary_does_not_expose_commercial_authority_fields(): void
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $result = $service->resolveForChatbot([
            'vertical' => 'minicargadores',
            'type' => 'neumatica',
            'measure' => '10-16.5',
        ]);

        $this->assertSame(
            'needs_clarification',
            $result['status']
        );

        $forbiddenFields = [
            'id',
            'product_id',
            'woocommerce_id',
            'sku',
            'price',
            'price_mxn',
            'price_label',
            'url',
            'image',
            'stock_status',
            'is_in_stock',
            'availability',
        ];

        foreach (
            $result['candidates'] ?? [] as $candidate
        ) {
            $this->assertIsArray($candidate);

            foreach ($forbiddenFields as $field) {
                $this->assertArrayNotHasKey(
                    $field,
                    $candidate
                );
            }
        }
    }

    public function test_candidate_summary_keeps_server_authorized_ply_rating_when_available(): void
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $result = $service->resolveForChatbot([
            'vertical' => 'minicargadores',
            'type' => 'neumatica',
            'measure' => '10-16.5',
        ]);

        $candidates = collect(
            $result['candidates'] ?? []
        );

        $sk05 = $candidates->first(
            fn (array $candidate): bool => str_contains(
                mb_strtoupper(
                    (string) ($candidate['model'] ?? '')
                ),
                'SK-05'
            )
        );

        $bigBoy = $candidates->first(
            fn (array $candidate): bool => str_contains(
                mb_strtoupper(
                    (string) ($candidate['model'] ?? '')
                ),
                'BIG BOY'
            )
        );

        $this->assertIsArray($sk05);
        $this->assertIsArray($bigBoy);

        $this->assertSame(
            10,
            (int) ($sk05['ply_rating'] ?? 0)
        );

        $this->assertSame(
            8,
            (int) ($bigBoy['ply_rating'] ?? 0)
        );
    }

    public function test_system_prompt_allows_safe_candidate_comparison_without_inventing_advantages(): void
    {
        $service = app(
            RgxChatbotService::class
        );

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );

        $method->setAccessible(true);

        $prompt = $method->invoke(
            $service,
            [
                'site_origin' => 'llantasdemontacargas.com',
                'default_vertical' => null,
            ],
            false
        );

        $this->assertStringContainsString(
            'No presupongas que el cliente conoce los modelos.',
            $prompt
        );

        $this->assertStringContainsString(
            'un ply_rating mayor no autoriza por sí solo',
            $prompt
        );

        $this->assertStringContainsString(
            'la corrección más reciente prevalece',
            $prompt
        );

        $this->assertStringContainsString(
            'no representan un producto seleccionado',
            $prompt
        );
    }

    public function test_selected_product_can_be_rehydrated_by_verified_id(): void
    {
        $service = app(
            MontacargasProductSearchService::class
        );

        $products = $service->searchLocal(
            'neumatica',
            '10-16.5',
            'BIG BOY',
            'minicargadores'
        );

        $this->assertCount(
            1,
            $products
        );

        $source = $products->first();

        $this->assertIsArray($source);

        $productId = (int) (
            $source['woocommerce_id']
            ?? $source['id']
            ?? 0
        );

        $this->assertGreaterThan(
            0,
            $productId
        );

        $verified = $service->verifiedProductById(
            $productId,
            'minicargadores'
        );

        $this->assertIsArray($verified);
        $this->assertSame(
            'BIG BOY',
            mb_strtoupper(
                (string) ($verified['model'] ?? '')
            )
        );
        $this->assertSame(
            $productId,
            (int) ($verified['product_id'] ?? 0)
        );
        $this->assertNotSame(
            '',
            trim((string) ($verified['url'] ?? ''))
        );
    }

    public function test_reselection_and_product_display_intents_are_detected(): void
    {
        $service = app(
            RgxChatbotService::class
        );

        $reselection = new ReflectionMethod(
            $service,
            'messageRequestsProductReselection'
        );
        $reselection->setAccessible(true);

        $display = new ReflectionMethod(
            $service,
            'messageRequestsSelectedProductDisplay'
        );
        $display->setAccessible(true);

        $this->assertTrue(
            $reselection->invoke(
                $service,
                'no, mejor BIG BOY'
            )
        );

        $this->assertTrue(
            $reselection->invoke(
                $service,
                'me quedo con SK-05'
            )
        );

        $this->assertFalse(
            $reselection->invoke(
                $service,
                'compárame las dos'
            )
        );

        $this->assertTrue(
            $display->invoke(
                $service,
                'muéstrame la tarjeta del producto'
            )
        );

        $this->assertTrue(
            $display->invoke(
                $service,
                'pásame el link de la tienda'
            )
        );
    }

    public function test_prompt_does_not_require_quote_for_product_link_or_infer_work_intensity(): void
    {
        $service = app(
            RgxChatbotService::class
        );

        $method = new ReflectionMethod(
            $service,
            'systemPrompt'
        );
        $method->setAccessible(true);

        $prompt = $method->invoke(
            $service,
            [
                'site_origin' => 'llantasdemontacargas.com',
                'default_vertical' => null,
            ],
            true
        );

        $this->assertStringContainsString(
            'Nunca digas que el cliente debe cotizar',
            $prompt
        );

        $this->assertStringContainsString(
            'uso más intensivo',
            $prompt
        );

        $this->assertStringContainsString(
            'uso más ligero',
            $prompt
        );
    }
}
