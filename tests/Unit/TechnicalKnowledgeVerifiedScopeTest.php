<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use ReflectionMethod;
use Tests\TestCase;

class TechnicalKnowledgeVerifiedScopeTest extends TestCase
{
    public function test_server_controlled_scope_types_are_explicit(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $method = new ReflectionMethod(
            $service,
            'isServerControlledFactScope'
        );

        $method->setAccessible(true);

        $this->assertTrue(
            $method->invoke(
                $service,
                'variant:ND'
            )
        );

        $this->assertTrue(
            $method->invoke(
                $service,
                'measure:10-16.5'
            )
        );

        $this->assertFalse(
            $method->invoke(
                $service,
                'ply:10'
            )
        );

        $this->assertFalse(
            $method->invoke(
                $service,
                'comparison'
            )
        );
    }

    public function test_measure_normalization_is_deterministic(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $method = new ReflectionMethod(
            $service,
            'normalizeMeasureScope'
        );

        $method->setAccessible(true);

        $cases = [
            '10-16.5' => '10-16.5',

            '10 x 16.5' => '10-16.5',

            '31×10-20/7.50' => '31-10-20/7.5',

            '33X12-20/7.5' => '33-12-20/7.5',

            ' 12-16.50 ' => '12-16.5',
        ];

        foreach (
            $cases as $input => $expected
        ) {
            $this->assertSame(
                $expected,
                $method->invoke(
                    $service,
                    $input
                ),
                $input
            );
        }

        $this->assertNull(
            $method->invoke(
                $service,
                null
            )
        );
    }

    public function test_sk900_nd_scope_requires_verified_nd_model(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $nd = $service
            ->deriveScopesForVerifiedProduct([
                'model' => 'SK-900 ND',
                'measure' => '12-16.5',
                'function' => 'estandar',
                'tread' => 'traccion',
            ]);

        $standard = $service
            ->deriveScopesForVerifiedProduct([
                'model' => 'SK-900',
                'measure' => '12-16.5',
                'function' => 'estandar',
                'tread' => 'traccion',
            ]);

        $this->assertContains(
            'variant:ND',
            $nd
        );

        $this->assertNotContains(
            'variant:ND',
            $standard
        );
    }

    public function test_brawler_hps_sf_token_derives_solidflex(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $tractionSolidflex =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'Brawler HPS SS SF TR TFT',
                    'measure' => '10-16.5',
                    'tread' => 'traccion',
                    'function' => 'estandar',
                ]);

        $smoothSolidflex =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'Brawler HPS SS SF SM-A',
                    'measure' => '12-16.5',
                    'tread' => 'lisa',
                    'function' => 'estandar',
                ]);

        $smoothNonSolidflex =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'Brawler HPS SS SM-A',
                    'measure' => '10-16.5',
                    'tread' => 'lisa',
                    'function' => 'estandar',
                ]);

        $this->assertContains(
            'variant:Solidflex',
            $tractionSolidflex
        );

        $this->assertContains(
            'variant:Solidflex',
            $smoothSolidflex
        );

        $this->assertNotContains(
            'variant:Solidflex',
            $smoothNonSolidflex
        );
    }

    public function test_brawler_lookup_exposes_solidflex_fact_only_for_sf_model(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $withSolidflex =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'Brawler HPS SS SF TR TFT',
                    'measure' => '10-16.5',
                    'tread' => 'traccion',
                    'function' => 'estandar',
                ]);

        $withoutSolidflex =
            $service
                ->lookupForVerifiedProduct([
                    'model' => 'Brawler HPS SS SM-A',
                    'measure' => '10-16.5',
                    'tread' => 'lisa',
                    'function' => 'estandar',
                ]);

        $withIds = array_column(
            $withSolidflex['facts'],
            'id'
        );

        $withoutIds = array_column(
            $withoutSolidflex['facts'],
            'id'
        );

        $this->assertContains(
            'brawler-hps-solidflex-comfort',
            $withIds
        );

        $this->assertNotContains(
            'brawler-hps-solidflex-comfort',
            $withoutIds
        );
    }

    public function test_measure_does_not_unlock_fact_until_curated_scope_exists(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $scopes =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'SK-05',
                    'measure' => '10-16.5',
                    'function' => 'estandar',
                    'tread' => 'traccion',
                ]);

        $this->assertNotContains(
            'measure:10-16.5',
            $scopes
        );

        $result =
            $service->lookupByModel(
                'SK-05',
                [
                    'measure:10-16.5',
                ]
            );

        foreach (
            $result['facts'] as $fact
        ) {
            $this->assertSame(
                'family',
                $fact['scope']
            );
        }
    }

    public function test_ply_like_product_fields_cannot_create_ply_scope(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $scopes =
            $service
                ->deriveScopesForVerifiedProduct([
                    'model' => 'SK-05',
                    'measure' => '10-16.5',
                    'ply' => '10',
                    'pr' => '10PR',
                    'ply_rating' => '10',
                    'load_capacity' => '9999',
                    'function' => 'estandar',
                    'tread' => 'traccion',
                ]);

        foreach ($scopes as $scope) {
            $this->assertStringNotStartsWith(
                'ply:',
                $scope
            );
        }

        $this->assertNotContains(
            'ply:10',
            $scopes
        );
    }
}
