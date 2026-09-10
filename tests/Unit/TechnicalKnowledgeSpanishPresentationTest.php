<?php

namespace Tests\Unit;

use Tests\TestCase;

class TechnicalKnowledgeSpanishPresentationTest extends TestCase
{
    public function test_every_technical_fact_has_curated_spanish_presentation(): void
    {
        $path = resource_path(
            'data/chatbot/technical-knowledge.json'
        );

        $data = json_decode(
            (string) file_get_contents($path),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $families = $data['families'] ?? [];

        $this->assertCount(6, $families);

        $facts = collect($families)
            ->flatMap(
                fn (array $family): array =>
                    $family['facts'] ?? []
            )
            ->values();

        $this->assertCount(64, $facts);

        $this->assertSame(
            61,
            $facts->where(
                'status',
                'approved'
            )->count()
        );

        $this->assertSame(
            3,
            $facts->where(
                'status',
                'conditional'
            )->count()
        );

        foreach ($facts as $fact) {
            $this->assertNotSame(
                '',
                trim(
                    (string) (
                        $fact['statement'] ?? ''
                    )
                ),
                'Falta statement original en '
                    .($fact['id'] ?? '(sin id)')
            );

            $this->assertNotSame(
                '',
                trim(
                    (string) (
                        $fact['statement_es'] ?? ''
                    )
                ),
                'Falta statement_es en '
                    .($fact['id'] ?? '(sin id)')
            );
        }
    }

    public function test_root_guardrails_have_curated_spanish_rules(): void
    {
        $path = resource_path(
            'data/chatbot/technical-knowledge.json'
        );

        $data = json_decode(
            (string) file_get_contents($path),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $guardrails =
            $data['guardrails'] ?? [];

        $this->assertCount(
            2,
            $guardrails
        );

        foreach ($guardrails as $guardrail) {
            $this->assertNotSame(
                '',
                trim(
                    (string) (
                        $guardrail['rule'] ?? ''
                    )
                )
            );

            $this->assertNotSame(
                '',
                trim(
                    (string) (
                        $guardrail['rule_es'] ?? ''
                    )
                )
            );
        }

        $byId = collect(
            $guardrails
        )->keyBy('id');

        $this->assertSame(
            'La expresión «laminillas radiales» describe la geometría de la banda de rodamiento. No significa que la PS1000 sea una llanta radial.',
            $byId[
                'ps1000-radial-sipes-not-radial'
            ]['rule_es']
        );

        $this->assertSame(
            'La característica antiestática no significa que la TR-900 sea una llanta a prueba de explosiones.',
            $byId[
                'tr900-antistatic-not-explosion-proof'
            ]['rule_es']
        );
    }
    public function test_tr900_guardrail_explicitly_prevents_explosion_proof_inference(): void
    {
        $data = json_decode(
            file_get_contents(
                resource_path(
                    'data/chatbot/technical-knowledge.json'
                )
            ),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $guardrail = collect(
            $data['guardrails'] ?? []
        )->firstWhere(
            'id',
            'tr900-antistatic-not-explosion-proof'
        );

        $this->assertIsArray($guardrail);

        $this->assertSame(
            'La característica antiestática no significa que la TR-900 sea una llanta a prueba de explosiones.',
            $guardrail['rule_es'] ?? null
        );

        $this->assertStringContainsString(
            'La característica antiestática no significa que la TR-900 sea una llanta a prueba de explosiones.',
            $guardrail['rule_es'] ?? ''
        );

        $this->assertSame(
            'TR-900 is explosion proof.',
            $guardrail['forbidden_inference'] ?? null
        );
    }
}
