<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use Tests\TestCase;

class RgxBrawlerHdExactSpecsTest extends TestCase
{
    private function ids(
        array $result
    ): array {
        return array_column(
            $result['facts'] ?? [],
            'id'
        );
    }

    public function test_exactly_fifteen_hd_rows_are_curated(): void
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
                    'Brawler HD'
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
                        'brawler-hd-'
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
            15,
            $facts
        );
    }

    public function test_generic_hd_product_does_not_unlock_numeric_row(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $product = [
            'model' => 'Brawler HD',

            'measure' => '10-16.5',

            'tread' => 'traccion',

            'service' => 'pesado',
        ];

        $ids =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct(
                        $product
                    )
            );

        foreach ($ids as $id) {
            $this->assertFalse(
                str_starts_with(
                    $id,
                    'brawler-hd-'
                )
                && str_contains(
                    $id,
                    'load-table'
                ),
                'HD numeric leak: '.$id
            );
        }
    }

    public function test_exact_hd_scope_unlocks_only_its_row(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $ids =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HD',

                        'technical_spec_scope' => 'spec:hd-smooth:31x5x9',
                    ])
            );

        $this->assertContains(
            'brawler-hd-smooth-31x5x9-load-table',
            $ids
        );

        $this->assertNotContains(
            'brawler-hd-traction-31x5x8-load-table',
            $ids
        );

        $this->assertNotContains(
            'brawler-hd-solidflex-smooth-31x5x9-load-table',
            $ids
        );
    }

    public function test_hd_constructions_with_same_equivalent_measure_do_not_cross(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $traction =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HD',

                        'technical_spec_scope' => 'spec:hd-traction:31x5x8',
                    ])
            );

        $smooth =
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct([
                        'model' => 'Brawler HD',

                        'technical_spec_scope' => 'spec:hd-smooth:31x5x9',
                    ])
            );

        $this->assertContains(
            'brawler-hd-traction-31x5x8-load-table',
            $traction
        );

        $this->assertNotContains(
            'brawler-hd-smooth-31x5x9-load-table',
            $traction
        );

        $this->assertContains(
            'brawler-hd-smooth-31x5x9-load-table',
            $smooth
        );

        $this->assertNotContains(
            'brawler-hd-traction-31x5x8-load-table',
            $smooth
        );
    }

    public function test_foreign_hps_scope_cannot_unlock_hd_numeric_fact(): void
    {
        $technical =
            app(
                TechnicalKnowledgeService::class
            );

        $product = [
            'model' => 'Brawler HD',

            'technical_spec_scope' => 'spec:hps-smooth:31x10-20',
        ];

        $scopes =
            $technical
                ->deriveScopesForVerifiedProduct(
                    $product
                );

        $this->assertNotContains(
            'spec:hps-smooth:31x10-20',
            $scopes
        );

        foreach (
            $this->ids(
                $technical
                    ->lookupForVerifiedProduct(
                        $product
                    )
            ) as $id
        ) {
            $this->assertFalse(
                str_starts_with(
                    $id,
                    'brawler-hd-'
                )
                && str_contains(
                    $id,
                    'load-table'
                )
            );
        }
    }
}
