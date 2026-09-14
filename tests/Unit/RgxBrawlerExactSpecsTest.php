<?php

namespace Tests\Unit;

use App\Services\RuguexStoreCatalogService;
use App\Services\TechnicalKnowledgeService;
use ReflectionMethod;
use Tests\TestCase;

class RgxBrawlerExactSpecsTest extends TestCase
{
    private function identity(
        string $sku,
        string $model,
        string $measure
    ): array {
        $service =
            app(
                RuguexStoreCatalogService::class
            );

        $method =
            new ReflectionMethod(
                $service,
                'resolveTechnicalIdentity'
            );

        $method->setAccessible(true);

        return $method->invoke(
            $service,
            $sku,
            $model,
            $measure
        );
    }

    private function ids(
        array $result
    ): array {
        return array_column(
            $result['facts'] ?? [],
            'id'
        );
    }

    public function test_base_and_suffix_share_exact_identity(): void
    {
        $base =
            $this->identity(
                '20000969',
                'Brawler HPS SS SF TR TFT',
                '31x10-20/7.5'
            );

        $suffix =
            $this->identity(
                '20000969_C',
                'Brawler HPS SS SF TR TFT',
                '10-16.5'
            );

        $this->assertSame(
            'spec:hps-solidflex-traction:31x10-20',
            $base[
                'technical_spec_scope'
            ] ?? null
        );

        $this->assertSame(
            $base,
            $suffix
        );

        $this->assertArrayNotHasKey(
            'ply_rating',
            $base
        );
    }

    public function test_wrong_model_or_measure_fails_closed(): void
    {
        $this->assertSame(
            [],
            $this->identity(
                '20000969',
                'Brawler HPS SS SM',
                '31x10-20/7.5'
            )
        );

        $this->assertSame(
            [],
            $this->identity(
                '20000969',
                'Brawler HPS SS SF TR TFT',
                '12-16.5'
            )
        );
    }

    public function test_exact_traction_scope_unlocks_only_exact_row(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $ids =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HPS SS SF TR TFT',

                        'technical_spec_scope' => 'spec:hps-solidflex-traction:31x10-20',
                    ])
            );

        $this->assertContains(
            'brawler-hps-solidflex-traction-31x10-20-load-table',
            $ids
        );

        $this->assertNotContains(
            'brawler-hps-smooth-31x10-20-load-table',
            $ids
        );
    }

    public function test_solidflex_smooth_and_smooth_do_not_cross(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $sf =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HPS SS SF SM-A',

                        'technical_spec_scope' => 'spec:hps-solidflex-smooth:33x12-20',
                    ])
            );

        $smooth =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HPS SS SM',

                        'technical_spec_scope' => 'spec:hps-smooth:33x12-20',
                    ])
            );

        $this->assertContains(
            'brawler-hps-solidflex-smooth-33x12-20-load-table',
            $sf
        );

        $this->assertNotContains(
            'brawler-hps-smooth-33x12-20-load-table',
            $sf
        );

        $this->assertContains(
            'brawler-hps-smooth-33x12-20-load-table',
            $smooth
        );

        $this->assertNotContains(
            'brawler-hps-solidflex-smooth-33x12-20-load-table',
            $smooth
        );
    }

    public function test_foreign_or_unknown_exact_scope_is_ignored(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        foreach ([
            'spec:hd-smooth:31x5x9',
            'spec:hps-smooth:no-existe',
        ] as $scope) {
            $scopes =
                $technical
                    ->deriveScopesForVerifiedProduct([
                        'model' => 'Brawler HPS SS SM',

                        'technical_spec_scope' => $scope,
                    ]);

            $this->assertNotContains(
                $scope,
                $scopes
            );
        }
    }

    public function test_exactly_thirteen_hps_rows_exist(): void
    {
        $data =
            json_decode(
                file_get_contents(
                    resource_path(
                        'data/chatbot/technical-knowledge.json'
                    )
                ),
                true
            );

        $facts =
            collect(
                $data[
                    'families'
                ][
                    'Brawler HPS'
                ][
                    'facts'
                ]
                ?? []
            )
                ->filter(
                    fn (
                        array $fact
                    ): bool => str_starts_with(
                        (string) (
                            $fact['id']
                            ?? ''
                        ),
                        'brawler-hps-'
                    )
                        && str_contains(
                            (string) (
                                $fact['id']
                                ?? ''
                            ),
                            'load-table'
                        )
                );

        $this->assertCount(
            13,
            $facts
        );
    }
}
