<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RuguexStoreCatalogService
{
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

        return [
            'id' => $id,
            'woocommerce_id' => $id,
            'vertical' => 'minicargadores',
            'title' => $title,
            'sku' => trim((string) ($product['sku'] ?? '')),
            'brand' => $this->attributeValue(
                $product,
                'pa_marca',
                true
            ),
            'measure' => $this->attributeValue(
                $product,
                'pa_medidas',
                true
            ),
            'model' => $this->attributeValue(
                $product,
                'pa_modelo',
                true
            ),
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
