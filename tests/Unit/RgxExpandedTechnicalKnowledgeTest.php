<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use Tests\TestCase;

class RgxExpandedTechnicalKnowledgeTest extends TestCase
{
    public function test_minicargador_official_families_resolve(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $cases = [
            'Brawler HPS SS SF' => 'Brawler HPS',

            'Brawler HD Solidflex' => 'Brawler HD',

            'SK-800' => 'SK-800',

            'SK-900' => 'SK-900',

            'SK-900 ND' => 'SK-900',
        ];

        foreach (
            $cases as $model => $family
        ) {
            $result =
                $service->lookupByModel(
                    $model
                );

            $this->assertSame(
                'resolved',
                $result['status'],
                $model
            );

            $this->assertSame(
                $family,
                $result['family'],
                $model
            );

            $this->assertNotEmpty(
                $result['facts'],
                $model
            );
        }
    }

    public function test_variant_and_comparison_facts_do_not_leak_by_default(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $hps =
            $service->lookupByModel(
                'Brawler HPS SS SF'
            );

        $hpsIds = collect(
            $hps['facts']
        )->pluck('id');

        $this->assertFalse(
            $hpsIds->contains(
                'brawler-hps-solidflex-comfort'
            )
        );

        $this->assertFalse(
            $hpsIds->contains(
                'brawler-hps-wear-comparison'
            )
        );

        $sk900 =
            $service->lookupByModel(
                'SK-900'
            );

        $sk900Ids = collect(
            $sk900['facts']
        )->pluck('id');

        $this->assertFalse(
            $sk900Ids->contains(
                'sk900-nd-hard-surfaces'
            )
        );
    }
}
