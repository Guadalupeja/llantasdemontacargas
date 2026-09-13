<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use JsonException;

class TechnicalKnowledgeService
{
    private bool $loaded = false;

    private ?array $knowledge = null;

    public function resolveFamilyForModel(?string $model): array
    {
        $knowledge = $this->loadKnowledge();

        if ($knowledge === null) {
            return [
                'status' => 'unavailable',
                'family' => null,
            ];
        }

        $normalizedModel = $this->normalizeModel($model);

        if ($normalizedModel === null) {
            return [
                'status' => 'invalid_model',
                'family' => null,
            ];
        }

        $matches = [];

        foreach ($knowledge['families'] as $familyName => $family) {
            foreach ($family['match_models'] ?? [] as $candidateModel) {
                if (
                    $this->normalizeModel($candidateModel)
                    !== $normalizedModel
                ) {
                    continue;
                }

                $matches[$familyName] = true;
            }
        }

        $families = array_keys($matches);

        if (count($families) === 0) {
            return [
                'status' => 'not_found',
                'family' => null,
            ];
        }

        if (count($families) > 1) {
            return [
                'status' => 'ambiguous',
                'family' => null,
            ];
        }

        return [
            'status' => 'resolved',
            'family' => $families[0],
        ];
    }

    public function lookupByModel(
        ?string $model,
        array $requestedScopes = [],
        bool $includeConditional = false
    ): array {
        $resolution = $this->resolveFamilyForModel($model);

        if ($resolution['status'] !== 'resolved') {
            return [
                'status' => $resolution['status'],
                'model' => trim((string) $model),
                'family' => null,
                'source' => null,
                'facts' => [],
                'guardrails' => [],
            ];
        }

        $knowledge = $this->loadKnowledge();

        if ($knowledge === null) {
            return [
                'status' => 'unavailable',
                'model' => trim((string) $model),
                'family' => null,
                'source' => null,
                'facts' => [],
                'guardrails' => [],
            ];
        }

        $familyName = $resolution['family'];
        $family = $knowledge['families'][$familyName] ?? null;

        if (! is_array($family)) {
            return [
                'status' => 'unavailable',
                'model' => trim((string) $model),
                'family' => null,
                'source' => null,
                'facts' => [],
                'guardrails' => [],
            ];
        }

        $facts = array_values(array_filter(
            $family['facts'] ?? [],
            fn ($fact) => is_array($fact)
        ));

        $availableServerScopes = collect($facts)
            ->pluck('scope')
            ->filter(
                fn ($scope) => is_string($scope)
                    && $this->isServerControlledFactScope(
                        trim($scope)
                    )
            )
            ->unique()
            ->values()
            ->all();

        $explicitServerScopes = collect($requestedScopes)
            ->filter(fn ($scope) => is_string($scope))
            ->map(fn ($scope) => trim($scope))
            ->filter(
                fn (string $scope) => in_array(
                    $scope,
                    $availableServerScopes,
                    true
                )
            )
            ->unique()
            ->values()
            ->all();

        $allowedScopes = array_merge(
            ['family'],
            $explicitServerScopes
        );

        if ($includeConditional) {
            $allowedScopes[] = 'comparison';
        }

        $allowedStatuses = $includeConditional
            ? ['approved', 'conditional']
            : ['approved'];

        $selectedFacts = collect($facts)
            ->filter(function (array $fact) use (
                $allowedScopes,
                $allowedStatuses
            ): bool {
                return in_array(
                    $fact['scope'] ?? null,
                    $allowedScopes,
                    true
                ) && in_array(
                    $fact['status'] ?? null,
                    $allowedStatuses,
                    true
                );
            })
            ->map(fn (array $fact) => $this->sanitizeFact($fact))
            ->values()
            ->all();

        $guardrails = collect($knowledge['guardrails'] ?? [])
            ->filter(
                fn ($guardrail) => is_array($guardrail)
                    && ($guardrail['family'] ?? null) === $familyName
            )
            ->map(fn (array $guardrail) => [
                'id' => trim(
                    (string) ($guardrail['id'] ?? '')
                ),
                'rule' => trim(
                    (string) ($guardrail['rule'] ?? '')
                ),
                'rule_es' => trim(
                    (string) ($guardrail['rule_es'] ?? '')
                ),
                'forbidden_inference' => trim(
                    (string) (
                        $guardrail['forbidden_inference']
                        ?? ''
                    )
                ),
            ])
            ->values()
            ->all();

        return [
            'status' => 'resolved',
            'model' => trim((string) $model),
            'family' => $familyName,
            'source' => $this->sanitizeSource(
                $family['source'] ?? []
            ),
            'facts' => $selectedFacts,
            'guardrails' => $guardrails,
        ];
    }

    public function lookupForVerifiedProduct(
        array $product,
        bool $includeConditional = false
    ): array {
        $model = trim((string) ($product['model'] ?? ''));

        $scopes = $this->deriveScopesForVerifiedProduct(
            $product
        );

        return $this->lookupByModel(
            $model,
            $scopes,
            $includeConditional
        );
    }

    public function deriveScopesForVerifiedProduct(
        array $product
    ): array {
        $model = trim((string) ($product['model'] ?? ''));

        $resolution = $this->resolveFamilyForModel(
            $model
        );

        if ($resolution['status'] !== 'resolved') {
            return [];
        }

        $knowledge = $this->loadKnowledge();

        if ($knowledge === null) {
            return [];
        }

        $familyName = $resolution['family'];

        $family = $knowledge['families'][$familyName]
            ?? null;

        if (! is_array($family)) {
            return [];
        }

        $availableScopes = collect(
            $family['facts'] ?? []
        )
            ->filter(fn ($fact) => is_array($fact))
            ->pluck('scope')
            ->filter(
                fn ($scope) => is_string($scope)
                    && $this->isServerControlledFactScope(
                        trim($scope)
                    )
            )
            ->unique()
            ->values()
            ->all();

        $candidateScopes = [];

        $measure =
            $this->normalizeMeasureScope(
                $product['measure']
                    ?? null
            );

        if ($measure !== null) {
            $candidateScopes[] =
                'measure:'.$measure;
        }

        $normalizedModel =
            $this->normalizeAttribute(
                $model
            );

        if (
            $familyName === 'SK-900'
            && preg_match(
                '/(?:^|\s)nd(?:\s|$)/',
                $normalizedModel
            ) === 1
        ) {
            $candidateScopes[] =
                'variant:ND';
        }

        if (
            in_array(
                $familyName,
                [
                    'Brawler HPS',
                    'Brawler HD',
                ],
                true
            )
            && (
                Str::contains(
                    $normalizedModel,
                    'solidflex'
                )
                || preg_match(
                    '/(?:^|\s)sf(?:\s|$)/',
                    $normalizedModel
                ) === 1
            )
        ) {
            $candidateScopes[] =
                'variant:Solidflex';
        }

        $function = $this->normalizeAttribute(
            $product['function'] ?? null
        );

        if ($function === 'no manchante') {
            $candidateScopes[] =
                'variant:Non Marking';
        }

        $tread = $this->normalizeAttribute(
            $product['tread'] ?? null
        );

        if ($tread === 'traccion') {
            $candidateScopes[] =
                'variant:Traction';
        }

        if ($tread === 'lisa') {
            $candidateScopes[] =
                'variant:Smooth';
        }

        return collect($candidateScopes)
            ->filter(
                fn (string $scope) => in_array(
                    $scope,
                    $availableScopes,
                    true
                )
            )
            ->unique()
            ->values()
            ->all();
    }

    /**
     * Scopes que pueden ser activados exclusivamente por datos
     * del producto verificado por el servidor.
     *
     * ply: permanece fuera de esta lista hasta que el catalogo
     * comercial entregue un ply rating inequivoco por producto.
     */
    private function isServerControlledFactScope(
        string $scope
    ): bool {
        return Str::startsWith(
            $scope,
            [
                'variant:',
                'measure:',
            ]
        );
    }

    /**
     * Convierte la medida autoritativa del producto a una clave
     * estable de scope tecnico.
     *
     * No interpreta equivalencias entre medidas diferentes.
     */
    private function normalizeMeasureScope(
        mixed $value
    ): ?string {
        $value = trim(
            (string) $value
        );

        if ($value === '') {
            return null;
        }

        $value = str_replace(
            [
                '×',
                '–',
                '—',
                ',',
            ],
            [
                'x',
                '-',
                '-',
                '.',
            ],
            $value
        );

        $value = Str::lower(
            Str::ascii($value)
        );

        $value = preg_replace(
            '/\s+/',
            '',
            $value
        );

        if (! is_string($value)) {
            return null;
        }

        /*
         * Mantiene una sola representacion:
         * 31x10-20/7.50 -> 31-10-20/7.5
         * 10x16.5       -> 10-16.5
         */
        $value = str_replace(
            'x',
            '-',
            $value
        );

        $value =
            preg_replace_callback(
                '/\d+\.\d+/',
                function (
                    array $matches
                ): string {
                    return rtrim(
                        rtrim(
                            $matches[0],
                            '0'
                        ),
                        '.'
                    );
                },
                $value
            );

        if (! is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value !== ''
            ? $value
            : null;
    }

    private function normalizeAttribute(
        mixed $value
    ): string {
        $normalized = Str::lower(
            Str::ascii(trim((string) $value))
        );

        $normalized = str_replace(
            ['_', '-'],
            ' ',
            $normalized
        );

        $normalized = preg_replace(
            '/\s+/',
            ' ',
            $normalized
        );

        return trim($normalized);
    }

    private function loadKnowledge(): ?array
    {
        if ($this->loaded) {
            return $this->knowledge;
        }

        $this->loaded = true;

        $path = resource_path(
            'data/chatbot/technical-knowledge.json'
        );

        if (! File::exists($path)) {
            return null;
        }

        try {
            $decoded = json_decode(
                File::get($path),
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException) {
            return null;
        }

        if (
            ! is_array($decoded)
            || ! isset($decoded['families'])
            || ! is_array($decoded['families'])
        ) {
            return null;
        }

        $this->knowledge = $decoded;

        return $this->knowledge;
    }

    private function normalizeModel(?string $model): ?string
    {
        $normalized = Str::lower(
            Str::ascii(trim((string) $model))
        );

        if ($normalized === '') {
            return null;
        }

        $normalized = preg_replace(
            '/[^a-z0-9]+/',
            '',
            $normalized
        );

        return $normalized !== ''
            ? $normalized
            : null;
    }

    private function sanitizeFact(array $fact): array
    {
        $result = [
            'id' => trim((string) ($fact['id'] ?? '')),
            'category' => trim(
                (string) ($fact['category'] ?? '')
            ),
            'scope' => trim(
                (string) ($fact['scope'] ?? '')
            ),
            'status' => trim(
                (string) ($fact['status'] ?? '')
            ),
            'page' => (int) ($fact['page'] ?? 0),
            'statement' => trim(
                (string) ($fact['statement'] ?? '')
            ),
            'statement_es' => trim(
                (string) ($fact['statement_es'] ?? '')
            ),
        ];

        if (
            isset($fact['condition'])
            && trim((string) $fact['condition']) !== ''
        ) {
            $result['condition'] = trim(
                (string) $fact['condition']
            );
        }

        return $result;
    }

    private function sanitizeSource(array $source): array
    {
        return [
            'path' => trim(
                (string) ($source['path'] ?? '')
            ),
            'official_brand' => trim(
                (string) ($source['official_brand'] ?? '')
            ),
            'pages' => (int) ($source['pages'] ?? 0),
        ];
    }
}
