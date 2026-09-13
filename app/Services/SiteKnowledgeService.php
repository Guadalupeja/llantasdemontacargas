<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SiteKnowledgeService
{
    public function search(
        string $query,
        ?string $site = null,
        int $limit = 5
    ): array {
        $query = trim($query);

        if ($query === '') {
            return [];
        }

        $index = $this->loadIndex();

        if ($index === null) {
            return [];
        }

        $normalizedQuery =
            $this->normalize($query);

        $tokens = collect(
            explode(
                ' ',
                $normalizedQuery
            )
        )
            ->filter(
                fn (string $token) => mb_strlen($token) >= 2
            )
            ->unique()
            ->values();

        if ($tokens->isEmpty()) {
            return [];
        }

        $siteWasProvided =
            $site !== null;

        $site = $siteWasProvided
            ? $this->normalizeSite($site)
            : null;

        if (
            $siteWasProvided
            && $site === null
        ) {
            return [];
        }

        return collect(
            $index['documents']
            ?? []
        )
            ->filter(
                fn ($document) => is_array($document)
                    && (
                        $document[
                            'authority'
                        ]
                        ?? null
                    ) ===
                    'site_editorial'
            )
            ->filter(
                function (
                    array $document
                ) use ($site) {
                    if ($site === null) {
                        return true;
                    }

                    return (
                        $document['site']
                        ?? null
                    ) === $site;
                }
            )
            ->map(
                function (
                    array $document
                ) use (
                    $normalizedQuery,
                    $tokens
                ) {
                    $document['score'] =
                        $this->score(
                            $document,
                            $normalizedQuery,
                            $tokens
                        );

                    return $document;
                }
            )
            ->filter(
                fn (array $document) => (
                    $document['score']
                    ?? 0
                ) > 0
            )
            ->sortByDesc(
                'score'
            )
            ->take(
                max(
                    1,
                    min(
                        $limit,
                        10
                    )
                )
            )
            ->map(
                fn (array $document) => [
                    'id' => $document['id']
                        ?? null,

                    'site' => $document['site']
                        ?? null,

                    'authority' => 'site_editorial',

                    'source_path' => $document[
                            'source_path'
                        ]
                        ?? null,

                    'models' => $document['models']
                        ?? [],

                    'measures' => $document['measures']
                        ?? [],

                    'content' => $document['content']
                        ?? '',

                    'score' => $document['score'],
                ]
            )
            ->values()
            ->all();
    }

    private function score(
        array $document,
        string $normalizedQuery,
        Collection $tokens
    ): int {
        $content =
            $this->normalize(
                (string) (
                    $document['content']
                    ?? ''
                )
            );

        $source =
            $this->normalize(
                (string) (
                    $document['source_path']
                    ?? ''
                )
            );

        $models =
            $this->normalize(
                implode(
                    ' ',
                    $document['models']
                    ?? []
                )
            );

        $measures =
            $this->normalize(
                implode(
                    ' ',
                    $document['measures']
                    ?? []
                )
            );

        $score = 0;

        if (
            $normalizedQuery !== ''
            && str_contains(
                $content,
                $normalizedQuery
            )
        ) {
            $score += 20;
        }

        foreach ($tokens as $token) {
            $contentMatches =
                substr_count(
                    $content,
                    $token
                );

            $score += min(
                $contentMatches,
                8
            );

            if (
                str_contains(
                    $source,
                    $token
                )
            ) {
                $score += 2;
            }

            if (
                str_contains(
                    $models,
                    $token
                )
            ) {
                $score += 4;
            }

            if (
                str_contains(
                    $measures,
                    $token
                )
            ) {
                $score += 4;
            }
        }

        return $score;
    }

    private function loadIndex(): ?array
    {
        $path =
            resource_path(
                'data/chatbot/site-knowledge.json'
            );

        if (! is_file($path)) {
            return null;
        }

        try {
            $data =
                json_decode(
                    (string) file_get_contents(
                        $path
                    ),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
        } catch (\Throwable) {
            return null;
        }

        if (
            ! is_array($data)
            || (
                $data['authority']
                ?? null
            ) !== 'site_editorial'
            || ! is_array(
                $data['documents']
                ?? null
            )
        ) {
            return null;
        }

        return $data;
    }

    private function normalize(
        string $value
    ): string {
        return trim(
            preg_replace(
                '/\s+/',
                ' ',
                preg_replace(
                    '/[^a-z0-9]+/',
                    ' ',
                    strtolower(
                        Str::ascii(
                            $value
                        )
                    )
                )
            )
            ?? ''
        );
    }

    private function normalizeSite(
        string $site
    ): ?string {
        $site =
            $this->normalize(
                $site
            );

        return match ($site) {
            'montacargas' => 'montacargas',

            'minicargadores',
            'minicargador' => 'minicargadores',

            'bobcat' => 'bobcat',

            default => null,
        };
    }
}
