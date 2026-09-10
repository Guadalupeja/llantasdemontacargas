<?php

namespace Tests\Unit;

use App\Services\TechnicalKnowledgeService;
use Tests\TestCase;

class TechnicalKnowledgeServiceTest extends TestCase
{
    public function test_all_operational_models_resolve_to_one_family(): void
    {
        $expected = [
            'XP800' => 'XP800',
            'XP1000' => 'XP1000',
            'PS800 SM PL' => 'PS800',
            'PS800 SM PL NM' => 'PS800',
            'PS800 TR MG' => 'PS800',
            'PS800 TR MG NM' => 'PS800',
            'PS1000 SM FL MP' => 'PS1000',
            'PS1000 SM FL NM' => 'PS1000',
            'PS1000 TR GS MP' => 'PS1000',
            'PS1000 TR GS NM' => 'PS1000',
            'T-900' => 'T-900',
            'TR-900' => 'TR-900',
        ];

        $service = app(
            TechnicalKnowledgeService::class
        );

        foreach ($expected as $model => $family) {
            $result = $service
                ->resolveFamilyForModel($model);

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
        }
    }

    public function test_unknown_and_generic_models_do_not_infer_family(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $unknown = $service
            ->resolveFamilyForModel('MODELO INVENTADO');

        $genericPs1000 = $service
            ->resolveFamilyForModel('PS1000');

        $this->assertSame(
            'not_found',
            $unknown['status']
        );

        $this->assertSame(
            'not_found',
            $genericPs1000['status']
        );
    }

    public function test_default_lookup_exposes_only_approved_family_facts(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $result = $service->lookupByModel(
            'XP1000'
        );

        $this->assertSame(
            'resolved',
            $result['status']
        );

        $this->assertSame(
            'XP1000',
            $result['family']
        );

        $this->assertNotEmpty(
            $result['facts']
        );

        foreach ($result['facts'] as $fact) {
            $this->assertSame(
                'family',
                $fact['scope']
            );

            $this->assertSame(
                'approved',
                $fact['status']
            );
        }

        $ids = array_column(
            $result['facts'],
            'id'
        );

        $this->assertNotContains(
            'xp1000-heatshield',
            $ids
        );

        $this->assertNotContains(
            'xp1000-temperature-comparison',
            $ids
        );
    }

    public function test_variant_fact_requires_explicit_server_scope(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $withoutVariant = $service
            ->lookupByModel('XP1000');

        $withVariant = $service
            ->lookupByModel(
                'XP1000',
                ['variant:Heatshield']
            );

        $this->assertNotContains(
            'xp1000-heatshield',
            array_column(
                $withoutVariant['facts'],
                'id'
            )
        );

        $this->assertContains(
            'xp1000-heatshield',
            array_column(
                $withVariant['facts'],
                'id'
            )
        );
    }

    public function test_invalid_variant_scope_is_ignored(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $result = $service->lookupByModel(
            'XP1000',
            ['variant:Invented']
        );

        foreach ($result['facts'] as $fact) {
            $this->assertSame(
                'family',
                $fact['scope']
            );
        }
    }

    public function test_conditional_comparison_is_opt_in(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $withoutConditional = $service
            ->lookupByModel('XP1000');

        $withConditional = $service
            ->lookupByModel(
                'XP1000',
                [],
                true
            );

        $this->assertNotContains(
            'xp1000-temperature-comparison',
            array_column(
                $withoutConditional['facts'],
                'id'
            )
        );

        $conditional = collect(
            $withConditional['facts']
        )->firstWhere(
            'id',
            'xp1000-temperature-comparison'
        );

        $this->assertNotNull($conditional);

        $this->assertSame(
            'conditional',
            $conditional['status']
        );

        $this->assertNotEmpty(
            $conditional['condition']
        );
    }

    public function test_ps1000_guardrail_prevents_radial_inference(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $result = $service->lookupByModel(
            'PS1000 TR GS MP'
        );

        $forbidden = array_column(
            $result['guardrails'],
            'forbidden_inference'
        );

        $this->assertContains(
            'PS1000 is a radial tire.',
            $forbidden
        );
    }

    public function test_tr900_guardrail_prevents_explosion_proof_claim(): void
    {
        $service = app(
            TechnicalKnowledgeService::class
        );

        $result = $service->lookupByModel(
            'TR-900'
        );

        $forbidden = array_column(
            $result['guardrails'],
            'forbidden_inference'
        );

        $this->assertContains(
            'TR-900 is explosion proof.',
            $forbidden
        );
    }
}
