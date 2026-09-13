<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RuguexStoreCatalogService
{
    private bool $technicalIdentityLoaded = false;

    private array $technicalIdentity = [];

    public function loadMinicargadores(): Collection
    {
        $baseUrl = $this->storeApiBaseUrl();

        if ($baseUrl === null) {
            return collect();
        }

        $categoryId = $this->resolveCategoryId(
            $baseUrl,
            'llantas-minicargadores'
        );

        if ($categoryId === null) {
            return collect();
        }

        $cacheKey = 'rgx_store_catalog_minicargadores_v1_'
            .md5($baseUrl.'|'.$categoryId);

        $products = Cache::remember(
            $cacheKey,
            now()->addMinutes(15),
            fn (): array => $this->fetchProducts(
                $baseUrl,
                $categoryId
            )
        );

        if (! is_array($products)) {
            return collect();
        }

        /*
         * La tienda contiene algunos productos equivalentes heredados.
         * Elegimos determinísticamente el ID menor cuando toda la
         * configuración comercial/técnica de búsqueda coincide.
         */
        return collect($products)
            ->filter(fn ($item): bool => is_array($item))
            ->map(fn (array $item): ?array => $this->mapProduct($item))
            ->filter(fn ($item): bool => is_array($item))
            ->sortBy(fn (array $item): int => (int) ($item['id'] ?? 0))
            ->unique(fn (array $item): string => $this->signature($item))
            ->values();
    }

    private function storeApiBaseUrl(): ?string
    {
        $finalPricesEndpoint = trim(
            (string) config(
                'services.ruguex.final_prices_endpoint',
                ''
            )
        );

        if ($finalPricesEndpoint === '') {
            return null;
        }

        $marker = '/wp-json/ruguex/v1/final-prices';
        $position = strpos($finalPricesEndpoint, $marker);

        if ($position === false) {
            return null;
        }

        return rtrim(
            substr($finalPricesEndpoint, 0, $position),
            '/'
        ).'/wp-json/wc/store/v1';
    }

    private function resolveCategoryId(
        string $baseUrl,
        string $slug
    ): ?int {
        $cacheKey = 'rgx_store_category_'
            .md5($baseUrl.'|'.$slug);

        $categoryId = Cache::remember(
            $cacheKey,
            now()->addMinutes(30),
            function () use ($baseUrl, $slug): ?int {
                try {
                    $response = Http::acceptJson()
                        ->timeout(12)
                        ->retry(2, 300)
                        ->get(
                            $baseUrl.'/products/categories',
                            ['per_page' => 100]
                        );
                } catch (\Throwable $exception) {
                    report($exception);

                    return null;
                }

                if (! $response->successful()) {
                    return null;
                }

                $categories = $response->json();

                if (! is_array($categories)) {
                    return null;
                }

                foreach ($categories as $category) {
                    if (! is_array($category)) {
                        continue;
                    }

                    if (
                        trim((string) ($category['slug'] ?? ''))
                        !== $slug
                    ) {
                        continue;
                    }

                    $id = (int) ($category['id'] ?? 0);

                    return $id > 0 ? $id : null;
                }

                return null;
            }
        );

        return is_int($categoryId) && $categoryId > 0
            ? $categoryId
            : null;
    }

    private function fetchProducts(
        string $baseUrl,
        int $categoryId
    ): array {
        try {
            $response = Http::acceptJson()
                ->timeout(15)
                ->retry(2, 300)
                ->get(
                    $baseUrl.'/products',
                    [
                        'category' => (string) $categoryId,
                        'per_page' => 100,
                    ]
                );
        } catch (\Throwable $exception) {
            report($exception);

            return [];
        }

        if (! $response->successful()) {
            return [];
        }

        $products = $response->json();

        return is_array($products)
            ? $products
            : [];
    }

    private function mapProduct(array $product): ?array
    {
        $id = (int) ($product['id'] ?? 0);
        $title = trim((string) ($product['name'] ?? ''));

        if ($id <= 0 || $title === '') {
            return null;
        }

        $isInStock = ($product['is_in_stock'] ?? false) === true;

        $sku = trim(
            (string) (
                $product['sku']
                ?? ''
            )
        );

        $measure =
            $this->attributeValue(
                $product,
                'pa_medidas',
                true
            );

        $model =
            $this->attributeValue(
                $product,
                'pa_modelo',
                true
            );

        $technicalIdentity =
            $this->resolveTechnicalIdentity(
                $sku,
                $model,
                $measure
            );

        return [
            'id' => $id,
            'woocommerce_id' => $id,
            'vertical' => 'minicargadores',
            'title' => $title,
            'sku' => $sku,
            'brand' => $this->attributeValue(
                $product,
                'pa_marca',
                true
            ),
            'measure' => $measure,
            'model' => $model,
            'technical_measure' => $technicalIdentity[
                    'technical_measure'
                ]
                ?? null,
            'ply_rating' => $technicalIdentity[
                    'ply_rating'
                ]
                ?? null,
            'type' => $this->normalizeSlugAttribute(
                $this->attributeValue(
                    $product,
                    'pa_tipo-de-llanta'
                )
            ),
            'function' => $this->normalizeSlugAttribute(
                $this->attributeValue(
                    $product,
                    'pa_funcion'
                )
            ),
            'rim_type' => $this->normalizeSlugAttribute(
                $this->attributeValue(
                    $product,
                    'pa_tipo-de-rin'
                )
            ),
            'tread' => $this->normalizeSlugAttribute(
                $this->attributeValue(
                    $product,
                    'pa_rodamiento'
                )
            ),
            'shifts' => $this->attributeValue(
                $product,
                'pa_turnos',
                true
            ),
            'service' => $this->serviceFromTitle($title),
            'availability' => $isInStock
                ? 'in_stock'
                : 'out_of_stock',
            'is_in_stock' => $isInStock,
            'url' => trim(
                (string) ($product['permalink'] ?? '')
            ),
            'image' => $this->firstImage($product),
        ];
    }

    private function attributeValue(
        array $product,
        string $taxonomy,
        bool $preferName = false
    ): ?string {
        $attributes = $product['attributes'] ?? [];

        if (! is_array($attributes)) {
            return null;
        }

        foreach ($attributes as $attribute) {
            if (! is_array($attribute)) {
                continue;
            }

            if (
                trim((string) ($attribute['taxonomy'] ?? ''))
                !== $taxonomy
            ) {
                continue;
            }

            $terms = $attribute['terms'] ?? [];

            if (! is_array($terms) || $terms === []) {
                return null;
            }

            $term = $terms[0] ?? null;

            if (! is_array($term)) {
                return null;
            }

            $key = $preferName ? 'name' : 'slug';
            $value = trim((string) ($term[$key] ?? ''));

            if ($value !== '') {
                return $value;
            }

            $fallbackKey = $preferName ? 'slug' : 'name';
            $fallback = trim(
                (string) ($term[$fallbackKey] ?? '')
            );

            return $fallback !== ''
                ? $fallback
                : null;
        }

        return null;
    }

    private function normalizeSlugAttribute(
        ?string $value
    ): ?string {
        $value = trim((string) $value);

        if ($value === '') {
            return null;
        }

        return str_replace('-', '_', $value);
    }

    private function serviceFromTitle(string $title): ?string
    {
        $text = Str::lower(Str::ascii($title));

        return match (true) {
            Str::contains($text, 'extra pesado') => 'extra_pesado',
            Str::contains($text, 'trabajo pesado') => 'pesado',
            Str::contains($text, 'trabajo medio') => 'medio',
            Str::contains($text, 'trabajo ligero') => 'ligero',
            default => null,
        };
    }

    private function resolveTechnicalIdentity(
        string $sku,
        ?string $model,
        ?string $measure
    ): array {
        $identities =
            $this->loadTechnicalIdentity();

        if ($identities === []) {
            return [];
        }

        $baseSku =
            $this->resolveTechnicalIdentitySku(
                $sku,
                $identities
            );

        if ($baseSku === null) {
            return [];
        }

        $identity =
            $identities[$baseSku]
            ?? null;

        if (! is_array($identity)) {
            return [];
        }

        $expectedModel =
            $this->normalizeTechnicalIdentityText(
                $identity['model']
                    ?? null
            );

        $actualModel =
            $this->normalizeTechnicalIdentityText(
                $model
            );

        if (
            $expectedModel === ''
            || $actualModel === ''
            || $expectedModel !== $actualModel
        ) {
            return [];
        }

        $allowedMeasures =
            collect(
                $identity[
                    'store_measures'
                ]
                ?? []
            )
                ->filter(
                    fn ($value): bool => is_string($value)
                )
                ->map(
                    fn (
                        string $value
                    ): string => $this
                        ->normalizeTechnicalIdentityMeasure(
                            $value
                        )
                )
                ->filter()
                ->values()
                ->all();

        $actualMeasure =
            $this
                ->normalizeTechnicalIdentityMeasure(
                    $measure
                );

        if (
            $actualMeasure === ''
            || ! in_array(
                $actualMeasure,
                $allowedMeasures,
                true
            )
        ) {
            return [];
        }

        $technicalMeasure =
            trim(
                (string) (
                    $identity[
                        'technical_measure'
                    ]
                    ?? ''
                )
            );

        $plyRating =
            (int) (
                $identity[
                    'ply_rating'
                ]
                ?? 0
            );

        if (
            $technicalMeasure === ''
            || $plyRating <= 0
        ) {
            return [];
        }

        return [
            'technical_measure' => $technicalMeasure,

            'ply_rating' => $plyRating,
        ];
    }

    private function resolveTechnicalIdentitySku(
        string $sku,
        array $identities
    ): ?string {
        $sku = trim(
            $sku,
            " \t\n\r\0\x0B."
        );

        if ($sku === '') {
            return null;
        }

        if (
            isset(
                $identities[$sku]
            )
        ) {
            return $sku;
        }

        $withoutVariant =
            preg_replace(
                '/_[A-D]$/i',
                '',
                $sku
            );

        if (
            ! is_string(
                $withoutVariant
            )
            || $withoutVariant === ''
            || ! isset(
                $identities[
                    $withoutVariant
                ]
            )
        ) {
            return null;
        }

        return $withoutVariant;
    }

    private function loadTechnicalIdentity(): array
    {
        if (
            $this->technicalIdentityLoaded
        ) {
            return $this->technicalIdentity;
        }

        $this->technicalIdentityLoaded = true;

        $path =
            resource_path(
                'data/chatbot/minicargador-technical-identity.json'
            );

        if (! File::exists($path)) {
            return [];
        }

        $decoded =
            json_decode(
                File::get($path),
                true
            );

        if (
            ! is_array($decoded)
            || ! isset(
                $decoded['products']
            )
            || ! is_array(
                $decoded['products']
            )
        ) {
            return [];
        }

        $this->technicalIdentity =
            $decoded['products'];

        return $this->technicalIdentity;
    }

    private function normalizeTechnicalIdentityText(
        mixed $value
    ): string {
        $value =
            Str::lower(
                Str::ascii(
                    trim(
                        (string) $value
                    )
                )
            );

        $value =
            preg_replace(
                '/[^a-z0-9]+/',
                '',
                $value
            );

        return is_string($value)
            ? $value
            : '';
    }

    private function normalizeTechnicalIdentityMeasure(
        mixed $value
    ): string {
        $value =
            trim(
                (string) $value
            );

        if ($value === '') {
            return '';
        }

        $value =
            str_replace(
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

        $value =
            Str::lower(
                Str::ascii($value)
            );

        $value =
            preg_replace(
                '/\s+/',
                '',
                $value
            );

        if (! is_string($value)) {
            return '';
        }

        $value =
            str_replace(
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

        return is_string($value)
            ? trim($value)
            : '';
    }

    private function firstImage(array $product): ?string
    {
        $images = $product['images'] ?? [];

        if (! is_array($images) || $images === []) {
            return null;
        }

        $image = $images[0] ?? null;

        if (! is_array($image)) {
            return null;
        }

        $src = trim((string) ($image['src'] ?? ''));

        return $src !== ''
            ? $src
            : null;
    }

    private function signature(array $product): string
    {
        $parts = [
            $product['type'] ?? '',
            $product['measure'] ?? '',
            $product['model'] ?? '',
            $product['function'] ?? '',
            $product['rim_type'] ?? '',
            $product['tread'] ?? '',
            $product['service'] ?? '',
            $product['shifts'] ?? '',
            $product['brand'] ?? '',
            $product['technical_measure'] ?? '',
            $product['ply_rating'] ?? '',
        ];

        return collect($parts)
            ->map(
                fn ($value): string => Str::lower(
                    Str::ascii(
                        trim((string) $value)
                    )
                )
            )
            ->implode('|');
    }
}
