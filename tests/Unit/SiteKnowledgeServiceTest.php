<?php

namespace Tests\Unit;

use App\Services\SiteKnowledgeService;
use Tests\TestCase;

class SiteKnowledgeServiceTest extends TestCase
{
    public function test_index_contains_the_three_rgx_sites(): void
    {
        $path =
            resource_path(
                'data/chatbot/site-knowledge.json'
            );

        $this->assertFileExists(
            $path
        );

        $data =
            json_decode(
                (string) file_get_contents(
                    $path
                ),
                true,
                512,
                JSON_THROW_ON_ERROR
            );

        $this->assertSame(
            'site_editorial',
            $data['authority']
        );

        foreach (
            [
                'montacargas',
                'minicargadores',
                'bobcat',
            ] as $site
        ) {
            $this->assertGreaterThan(
                0,
                $data[
                    'source_summary'
                ][
                    $site
                ][
                    'documents'
                ]
                ?? 0
            );
        }

        foreach (
            $data['documents'] as $document
        ) {
            $this->assertSame(
                'site_editorial',
                $document['authority']
            );

            $source =
                $document[
                    'source_path'
                ];

            $this->assertStringNotContainsString(
                'resources/views/admin',
                $source
            );

            $this->assertStringNotContainsString(
                'resources/views/auth',
                $source
            );
        }
    }

    public function test_search_is_scoped_to_authenticated_site_context(): void
    {
        $service = app(
            SiteKnowledgeService::class
        );

        $mini =
            $service->search(
                'SK-900 trabajo pesado superficies duras',
                'minicargadores',
                5
            );

        $this->assertNotEmpty(
            $mini
        );

        $this->assertSame(
            ['minicargadores'],
            collect($mini)
                ->pluck('site')
                ->unique()
                ->values()
                ->all()
        );

        $bobcat =
            $service->search(
                'Bobcat S650 medida llanta',
                'bobcat',
                5
            );

        $this->assertNotEmpty(
            $bobcat
        );

        $this->assertSame(
            ['bobcat'],
            collect($bobcat)
                ->pluck('site')
                ->unique()
                ->values()
                ->all()
        );
    }

    public function test_unknown_site_never_broadens_authority_silently(): void
    {
        $service = app(
            SiteKnowledgeService::class
        );

        $results =
            $service->search(
                'PS1000',
                'sitio-inventado',
                5
            );

        $this->assertSame(
            [],
            $results
        );
    }
}
