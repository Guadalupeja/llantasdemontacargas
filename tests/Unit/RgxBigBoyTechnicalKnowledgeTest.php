<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use Tests\TestCase;

class RgxBigBoyTechnicalKnowledgeTest extends TestCase
{
    public function test_big_boy_resolves_to_curated_family(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->resolveFamilyForModel(
                    'BIG BOY'
                );

        $this->assertSame(
            'resolved',
            $result['status']
        );

        $this->assertSame(
            'BIG BOY',
            $result['family']
        );
    }

    public function test_big_boy_10_16_5_8pr_unlocks_only_exact_row(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'BIG BOY',

                    'technical_measure' => '10-16.5',

                    'ply_rating' => 8,
                ]);

        $ids =
            array_column(
                $result['facts'],
                'id'
            );

        $this->assertContains(
            'big-boy-industrial-resistance',
            $ids
        );

        $this->assertContains(
            'big-boy-10-16-5-8pr-load-table',
            $ids
        );

        $this->assertNotContains(
            'big-boy-12-16-5-10pr-load-table',
            $ids
        );
    }

    public function test_big_boy_12_16_5_10pr_unlocks_only_exact_row(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'BIG BOY',

                    'technical_measure' => '12-16.5',

                    'ply_rating' => 10,
                ]);

        $ids =
            array_column(
                $result['facts'],
                'id'
            );

        $this->assertContains(
            'big-boy-industrial-resistance',
            $ids
        );

        $this->assertContains(
            'big-boy-12-16-5-10pr-load-table',
            $ids
        );

        $this->assertNotContains(
            'big-boy-10-16-5-8pr-load-table',
            $ids
        );
    }

    public function test_wrong_ply_does_not_leak_numeric_big_boy_fact(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'BIG BOY',

                    'technical_measure' => '10-16.5',

                    'ply_rating' => 10,
                ]);

        $ids =
            array_column(
                $result['facts'],
                'id'
            );

        $this->assertContains(
            'big-boy-industrial-resistance',
            $ids
        );

        $this->assertNotContains(
            'big-boy-10-16-5-8pr-load-table',
            $ids
        );

        $this->assertNotContains(
            'big-boy-12-16-5-10pr-load-table',
            $ids
        );
    }

    public function test_measure_without_ply_exposes_no_load_table(): void
    {
        $service =
            app(
                TechnicalKnowledgeService::class
            );

        $result =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'BIG BOY',

                    'technical_measure' => '10-16.5',
                ]);

        $ids =
            array_column(
                $result['facts'],
                'id'
            );

        $this->assertContains(
            'big-boy-industrial-resistance',
            $ids
        );

        foreach ($ids as $id) {
            $this->assertFalse(
                str_contains(
                    $id,
                    'load-table'
                )
            );
        }
    }
}
