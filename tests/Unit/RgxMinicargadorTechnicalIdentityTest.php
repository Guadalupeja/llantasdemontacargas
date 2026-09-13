<?php

namespace Tests\Unit;

use App\Services\RuguexStoreCatalogService;
use App\Services\TechnicalKnowledgeService;
use ReflectionMethod;
use Tests\TestCase;

class RgxMinicargadorTechnicalIdentityTest extends TestCase
{
    private function rawProduct(
        string $sku,
        string $model,
        string $measure
    ): array {
        return [
            'id' => 999,
            'name' => 'Producto de prueba',
            'sku' => $sku,
            'is_in_stock' => true,
            'permalink' => 'https://example.test/product',
            'images' => [],
            'attributes' => [
                [
                    'taxonomy' => 'pa_modelo',
                    'terms' => [
                        [
                            'name' => $model,
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_medidas',
                    'terms' => [
                        [
                            'name' => $measure,
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_tipo-de-llanta',
                    'terms' => [
                        [
                            'name' => 'Neumática',
                            'slug' => 'neumatica',
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_funcion',
                    'terms' => [
                        [
                            'name' => 'Estándar',
                            'slug' => 'estandar',
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_tipo-de-rin',
                    'terms' => [
                        [
                            'name' => 'Estándar',
                            'slug' => 'estandar',
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_rodamiento',
                    'terms' => [
                        [
                            'name' => 'Tracción',
                            'slug' => 'traccion',
                        ],
                    ],
                ],
                [
                    'taxonomy' => 'pa_turnos',
                    'terms' => [
                        [
                            'name' => '3',
                            'slug' => '3',
                        ],
                    ],
                ],
            ],
        ];
    }

    private function mapProduct(
        array $raw
    ): array {
        $service =
            app(
                RuguexStoreCatalogService::class
            );

        $method =
            new ReflectionMethod(
                $service,
                'mapProduct'
            );

        $method->setAccessible(
            true
        );

        $mapped =
            $method->invoke(
                $service,
                $raw
            );

        $this->assertIsArray(
            $mapped
        );

        return $mapped;
    }

    public function test_sk05_10pr_identity_survives_store_suffix(): void
    {
        $product =
            $this->mapProduct(
                $this->rawProduct(
                    '.5001514750000_C.',
                    'SK-05',
                    '10-16.5'
                )
            );

        $this->assertSame(
            '10-16.5',
            $product[
                'technical_measure'
            ]
        );

        $this->assertSame(
            10,
            $product[
                'ply_rating'
            ]
        );
    }

    public function test_equivalent_store_measure_maps_to_exact_identity(): void
    {
        $product =
            $this->mapProduct(
                $this->rawProduct(
                    '.5001514760000_B.',
                    'SK-05',
                    '33X12-20/7.5'
                )
            );

        $this->assertSame(
            '12-16.5',
            $product[
                'technical_measure'
            ]
        );

        $this->assertSame(
            12,
            $product[
                'ply_rating'
            ]
        );
    }

    public function test_identity_fails_closed_on_wrong_model(): void
    {
        $product =
            $this->mapProduct(
                $this->rawProduct(
                    '.5001514750000_C.',
                    'BIG BOY',
                    '10-16.5'
                )
            );

        $this->assertNull(
            $product[
                'technical_measure'
            ]
        );

        $this->assertNull(
            $product[
                'ply_rating'
            ]
        );
    }

    public function test_unknown_sku_has_no_identity(): void
    {
        $product =
            $this->mapProduct(
                $this->rawProduct(
                    'SKU-DESCONOCIDO',
                    'SK-05',
                    '10-16.5'
                )
            );

        $this->assertNull(
            $product[
                'technical_measure'
            ]
        );

        $this->assertNull(
            $product[
                'ply_rating'
            ]
        );
    }

    public function test_spec_scope_requires_measure_and_authoritative_ply(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $withIdentity =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'SK-05',

                    'technical_measure' => '10-16.5',

                    'ply_rating' => 10,
                ]);

        $withoutPly =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'SK-05',

                    'technical_measure' => '10-16.5',
                ]);

        $this->assertContains(
            'spec:10-16.5:10pr',
            $withIdentity
        );

        $this->assertNotContains(
            'spec:10-16.5:10pr',
            $withoutPly
        );
    }

    public function test_sk05_10pr_fact_does_not_leak_to_wrong_ply(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $correct =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-05',

                    'technical_measure' => '10-16.5',

                    'ply_rating' => 10,
                ]);

        $wrong =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-05',

                    'technical_measure' => '10-16.5',

                    'ply_rating' => 12,
                ]);

        $correctIds =
            array_column(
                $correct['facts'],
                'id'
            );

        $wrongIds =
            array_column(
                $wrong['facts'],
                'id'
            );

        $this->assertContains(
            'sk05-10-16-5-10pr-load-table',
            $correctIds
        );

        $this->assertNotContains(
            'sk05-10-16-5-10pr-load-table',
            $wrongIds
        );
    }

    public function test_sk05_12pr_row_is_independent_from_10pr(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-05',

                    'technical_measure' => '12-16.5',

                    'ply_rating' => 12,
                ]);

        $ids =
            array_column(
                $result['facts'],
                'id'
            );

        $this->assertContains(
            'sk05-12-16-5-12pr-load-table',
            $ids
        );

        $this->assertNotContains(
            'sk05-10-16-5-10pr-load-table',
            $ids
        );
    }
}
