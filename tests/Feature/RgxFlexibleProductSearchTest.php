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
}
