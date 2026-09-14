<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use Tests\TestCase;

class RgxSk800Sk900ExactSpecsTest extends TestCase
{
    private function ids(
        array $result
    ): array {
        return array_column(
            $result['facts'] ?? [],
            'id'
        );
    }

    public function test_sk800_exact_10_16_5_rows_are_isolated_by_ply(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $eight =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-800',
                    'technical_measure' => '10-16.5',
                    'ply_rating' => 8,
                ]);

        $ten =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-800',
                    'technical_measure' => '10-16.5',
                    'ply_rating' => 10,
                ]);

        $eightIds =
            $this->ids($eight);

        $tenIds =
            $this->ids($ten);

        $this->assertContains(
            'sk800-10-16-5-8pr-load-table',
            $eightIds
        );

        $this->assertNotContains(
            'sk800-10-16-5-10pr-load-table',
            $eightIds
        );

        $this->assertContains(
            'sk800-10-16-5-10pr-load-table',
            $tenIds
        );

        $this->assertNotContains(
            'sk800-10-16-5-8pr-load-table',
            $tenIds
        );
    }

    public function test_sk800_x_measure_normalization_unlocks_exact_row(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-800',
                    'technical_measure' => '23x8.5-12',
                    'ply_rating' => 6,
                ]);

        $scopes =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'SK-800',
                    'technical_measure' => '23x8.5-12',
                    'ply_rating' => 6,
                ]);

        $this->assertContains(
            'spec:23-8.5-12:6pr',
            $scopes
        );

        $this->assertContains(
            'sk800-23-8-5-12-6pr-load-table',
            $this->ids($result)
        );
    }

    public function test_sk800_without_authoritative_ply_has_no_numeric_row(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-800',
                    'technical_measure' => '12-16.5',
                ]);

        foreach (
            $this->ids($result) as $id
        ) {
            $this->assertFalse(
                str_contains(
                    $id,
                    'load-table'
                )
            );
        }
    }

    public function test_sk900_standard_and_nd_10pr_rows_never_cross(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $standardProduct = [
            'model' => 'SK-900',
            'technical_measure' => '10-16.5',
            'ply_rating' => 10,
        ];

        $ndProduct = [
            'model' => 'SK-900 ND',
            'technical_measure' => '10-16.5',
            'ply_rating' => 10,
        ];

        $standardScopes =
            $service
                ->deriveScopesForVerifiedProduct(
                    $standardProduct
                );

        $ndScopes =
            $service
                ->deriveScopesForVerifiedProduct(
                    $ndProduct
                );

        $standardIds =
            $this->ids(
                $service
                    ->lookupForVerifiedProduct(
                        $standardProduct
                    )
            );

        $ndIds =
            $this->ids(
                $service
                    ->lookupForVerifiedProduct(
                        $ndProduct
                    )
            );

        $this->assertContains(
            'spec:standard:10-16.5:10pr',
            $standardScopes
        );

        $this->assertNotContains(
            'spec:nd:10-16.5:10pr',
            $standardScopes
        );

        $this->assertContains(
            'spec:nd:10-16.5:10pr',
            $ndScopes
        );

        $this->assertNotContains(
            'spec:standard:10-16.5:10pr',
            $ndScopes
        );

        $this->assertContains(
            'sk900-standard-10-16-5-10pr-load-table',
            $standardIds
        );

        $this->assertNotContains(
            'sk900-nd-10-16-5-10pr-load-table',
            $standardIds
        );

        $this->assertContains(
            'sk900-nd-10-16-5-10pr-load-table',
            $ndIds
        );

        $this->assertNotContains(
            'sk900-standard-10-16-5-10pr-load-table',
            $ndIds
        );
    }

    public function test_sk900_nd_cannot_receive_standard_only_8pr_row(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-900 ND',
                    'technical_measure' => '10-16.5',
                    'ply_rating' => 8,
                ]);

        $ids =
            $this->ids($result);

        $this->assertNotContains(
            'sk900-standard-10-16-5-8pr-load-table',
            $ids
        );

        foreach ($ids as $id) {
            if (
                str_starts_with(
                    $id,
                    'sk900-'
                )
                && str_contains(
                    $id,
                    'load-table'
                )
            ) {
                $this->fail(
                    'SK-900 ND 8PR recibio una fila numerica no autorizada: '
                    .$id
                );
            }
        }

        $this->addToAssertionCount(1);
    }

    public function test_sk900_standard_and_nd_12pr_rows_keep_tread_data_separate(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $standard =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-900',
                    'technical_measure' => '12-16.5',
                    'ply_rating' => 12,
                ]);

        $nd =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'SK-900 ND',
                    'technical_measure' => '12-16.5',
                    'ply_rating' => 12,
                ]);

        $standardIds =
            $this->ids($standard);

        $ndIds =
            $this->ids($nd);

        $this->assertContains(
            'sk900-standard-12-16-5-12pr-load-table',
            $standardIds
        );

        $this->assertNotContains(
            'sk900-nd-12-16-5-12pr-load-table',
            $standardIds
        );

        $this->assertContains(
            'sk900-nd-12-16-5-12pr-load-table',
            $ndIds
        );

        $this->assertNotContains(
            'sk900-standard-12-16-5-12pr-load-table',
            $ndIds
        );
    }

    public function test_sk900_without_ply_exposes_no_load_table(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        foreach ([
            'SK-900',
            'SK-900 ND',
        ] as $model) {
            $result =
                $service
                    ->lookupForVerifiedProduct([
                        'model' => $model,
                        'technical_measure' => '10-16.5',
                    ]);

            foreach (
                $this->ids($result) as $id
            ) {
                $this->assertFalse(
                    str_contains(
                        $id,
                        'load-table'
                    ),
                    $model.' leaked '.$id
                );
            }
        }
    }
}
