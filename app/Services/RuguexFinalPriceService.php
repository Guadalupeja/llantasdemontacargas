<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RuguexFinalPriceService
{
    public function applyTo(iterable $products): Collection
    {
        $products = collect($products);

        $skus = $products
            ->pluck('sku')
            ->filter()
            ->map(fn ($sku) => trim((string) $sku))
            ->filter()
            ->unique()
            ->values();

        if ($skus->isEmpty()) {
            return $products->map(fn ($product) => $this->withoutApiPrice($product));
        }

        $pricesBySku = $this->getPricesBySku($skus);

        return $products->map(function ($product) use ($pricesBySku) {
            $sku = trim((string) ($product['sku'] ?? ''));

            if ($sku === '' || ! isset($pricesBySku[$sku])) {
                return $this->withoutApiPrice($product);
            }

            $apiProduct = $pricesBySku[$sku];

            $product['woocommerce_id'] = $apiProduct['id'] ?? null;
            $product['price_mxn'] = $apiProduct['price_mxn_with_iva'] ?? null;
            $product['price_label'] = $apiProduct['price_mxn_with_iva_formatted'] ?? 'Consultar precio';
            $product['price_source'] = 'woocommerce_api';

            $product['regular_price_mxn'] = $apiProduct['price_mxn_with_iva'] ?? null;
            $product['sale_price_mxn'] = null;

            $product['url'] = $apiProduct['permalink'] ?? ($product['url'] ?? null);
            $product['store_url'] = $apiProduct['permalink'] ?? ($product['store_url'] ?? null);
            $product['image'] = $apiProduct['image'] ?? ($product['image'] ?? null);
            $product['stock_status'] = $apiProduct['stock_status'] ?? null;
            $product['is_in_stock'] = $apiProduct['is_in_stock'] ?? null;

            return $product;
        });
    }

    private function getPricesBySku(Collection $skus): array
    {
        $endpoint = config('services.ruguex.final_prices_endpoint');

        if (! $endpoint) {
            return [];
        }

        $allProducts = [];

        foreach ($skus->chunk(80) as $chunk) {
            $cacheKey = 'ruguex_final_prices_skus_' . md5($chunk->implode(','));

            try {
                $response = Http::acceptJson()
                    ->timeout(12)
                    ->retry(2, 500)
                    ->get($endpoint, [
                        'skus' => $chunk->implode(','),
                    ]);

                if (! $response->successful()) {
                    $allProducts = array_merge($allProducts, Cache::get($cacheKey, []));
                    continue;
                }

                $json = $response->json();
                $products = $json['products'] ?? [];

                Cache::put($cacheKey, $products, now()->addMinutes(30));

                $allProducts = array_merge($allProducts, $products);
            } catch (\Throwable $e) {
                report($e);

                $allProducts = array_merge($allProducts, Cache::get($cacheKey, []));
            }
        }

        return collect($allProducts)
            ->filter(fn ($product) => ! empty($product['sku']))
            ->keyBy(fn ($product) => trim((string) $product['sku']))
            ->all();
    }

    private function withoutApiPrice(array $product): array
    {
        $product['price_label'] = $product['price_label'] ?? 'Consultar precio';
        $product['price_source'] = $product['price_source'] ?? 'local_or_unavailable';

        return $product;
    }
}