<?php

namespace App\View\Components;

use App\Services\RuguexFinalPriceService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class StoreProductsByModel extends Component
{
    public string $model;

    public array $settings = [];

    public Collection $products;

public function __construct(string $model)
{
    $this->model = $model;

    $settings = config("store_product_models.{$model}");

    $this->settings = is_array($settings) ? $settings : [];

    $products = $this->loadProducts()
        ->filter(fn (array $product) => $this->matchesModel($product))
        ->sortBy(fn (array $product) => $this->sortProduct($product))
        ->take((int) ($this->settings['limit'] ?? 8))
        ->values();

    $this->products = app(RuguexFinalPriceService::class)
        ->applyTo($products)
        ->values();
}

    public function render(): View
    {
        return view('components.store-products-by-model');
    }

    private function loadProducts(): Collection
    {
        $path = resource_path('data/chatbot/montacargas-products.json');

        if (! File::exists($path)) {
            return collect();
        }

        $json = json_decode(File::get($path), true);

        if (! is_array($json)) {
            return collect();
        }

        return $this->extractProducts($json)
            ->filter(fn ($product) => is_array($product))
            ->filter(fn (array $product) => ! empty($product['title']))
            ->filter(fn (array $product) => ! empty($product['url']))
            ->filter(fn (array $product) => ($product['availability'] ?? 'in_stock') === 'in_stock')
            ->values();
    }

    private function extractProducts(mixed $value): Collection
    {
        $products = collect();

        if (! is_array($value)) {
            return $products;
        }

        /*
         * Cuando encontramos un array que ya parece producto,
         * lo regresamos como producto.
         */
        if (! empty($value['title']) && ! empty($value['url'])) {
            return collect([$value]);
        }

        /*
         * Recorre cualquier estructura anidada hasta encontrar productos.
         */
        foreach ($value as $item) {
            $products = $products->merge($this->extractProducts($item));
        }

        return $products;
    }

    private function matchesModel(array $product): bool
    {
        if (empty($this->settings)) {
            return false;
        }

        $productModel = $this->normalizeText($product['model'] ?? '');
        $productTitle = $this->normalizeText($product['title'] ?? '');

        /*
         * Caso simple:
         * 'model' => 'XP800'
         */
        if (! empty($this->settings['model'])) {
            return $productModel === $this->normalizeText($this->settings['model']);
        }

        /*
         * Caso de varios modelos:
         * 'models' => [
         *     'PS1000 SM FL MP',
         *     'PS1000 SM FL NM',
         * ]
         */
        if (! empty($this->settings['models']) && is_array($this->settings['models'])) {
            foreach ($this->settings['models'] as $model) {
                if ($productModel === $this->normalizeText($model)) {
                    return true;
                }
            }
        }

        /*
         * Respaldo opcional por título:
         * 'title_contains' => [
         *     'ps1000',
         *     'ps 1000',
         * ]
         */
        if (! empty($this->settings['title_contains']) && is_array($this->settings['title_contains'])) {
            foreach ($this->settings['title_contains'] as $word) {
                if (Str::contains($productTitle, $this->normalizeText($word))) {
                    return true;
                }
            }
        }

        return false;
    }

    private function sortProduct(array $product): string
    {
        return $this->normalizeText(
            ($product['measure'] ?? '') . ' ' . ($product['title'] ?? '')
        );
    }

    private function normalizeText(string $value): string
    {
        return Str::lower(Str::ascii(trim($value)));
    }
}