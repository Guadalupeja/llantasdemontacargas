<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MontacargasProductSearchService
{
    public function __construct(
        private readonly RuguexFinalPriceService $finalPriceService
    ) {
    }

    /**
     * Carga los productos disponibles en el dataset local.
     */
    public function loadProducts(): Collection
    {
        $path = resource_path('data/chatbot/montacargas-products.json');

        if (! File::exists($path)) {
            return collect();
        }

        $json = json_decode(File::get($path), true);

        if (! is_array($json)) {
            return collect();
        }

        $products = $json['products'] ?? [];

        if (! is_array($products)) {
            return collect();
        }

        return collect($products)
            ->filter(fn ($product) => is_array($product))
            ->filter(fn (array $product) => ! empty($product['id']))
            ->filter(fn (array $product) => ! empty($product['title']))
            ->values();
    }

    /**
     * Normaliza texto general para comparaciones.
     */
    public function normalizeText(?string $value): string
    {
        $text = Str::lower(Str::ascii(trim((string) $value)));
        $text = preg_replace('/\s+/', ' ', $text);

        return trim($text);
    }

    /**
     * Convierte distintas formas de escribir el tipo de llanta
     * a los valores oficiales usados por el catálogo.
     */
    public function normalizeType(?string $value): ?string
    {
        $text = $this->normalizeText($value);
        $text = str_replace(['_', '-'], ' ', $text);
        $text = preg_replace('/\s+/', ' ', $text);

        if ($text === '') {
            return null;
        }

        return match (true) {
            Str::contains($text, [
                'solida con arillo',
                'con arillo',
                'press on',
            ]) => 'solida_con_arillo',

            Str::contains($text, [
                'neumatica radial',
                'radial',
            ]) => 'neumatica_radial',

            Str::contains($text, [
                'neumatica',
                'de aire',
                'llanta de aire',
            ]) => 'neumatica',

            Str::contains($text, [
                'solida',
                'maciza',
            ]) => 'solida',

            default => null,
        };
    }

    /**
     * Normaliza una medida para poder comparar variantes escritas
     * de forma diferente por el usuario.
     *
     * Ejemplos:
     * 6.50-10  -> 6.5-10
     * 6.5x10   -> 6.5-10
     * 8.15R15  -> 8.15r15
     */
    public function normalizeMeasure(?string $value): ?string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return null;
        }

        $value = Str::lower(Str::ascii($value));
        $value = str_replace(['×', '–', '—'], ['x', '-', '-'], $value);
        $value = str_replace(',', '.', $value);

        /*
         * Conserva medidas mixtas como:
         * 10 1/2 -> 10+1/2
         */
        $value = preg_replace(
            '/(\d+)\s+(\d+)\s*\/\s*(\d+)/',
            '$1+$2/$3',
            $value
        );

        $value = preg_replace('/\s+/', '', $value);
        $value = str_replace('x', '-', $value);

        /*
         * Elimina ceros decimales innecesarios:
         * 6.50 -> 6.5
         * 7.00 -> 7
         */
        $value = preg_replace_callback(
            '/\d+\.\d+/',
            function (array $matches): string {
                return rtrim(rtrim($matches[0], '0'), '.');
            },
            $value
        );

        return $value !== '' ? $value : null;
    }

    /**
     * Normaliza nombres de modelo.
     *
     * T-900, T 900 y T900 producen el mismo token.
     */
    public function normalizeModel(?string $value): ?string
    {
        $text = $this->normalizeText($value);

        if ($text === '') {
            return null;
        }

        $text = preg_replace('/[^a-z0-9]+/', '', $text);

        return $text !== '' ? $text : null;
    }

    /**
     * Busca candidatos en el catálogo local.
     *
     * Los filtros son opcionales, pero cuando se proporcionan
     * deben coincidir con el producto.
     */
    public function searchLocal(
        ?string $type = null,
        ?string $measure = null,
        ?string $model = null
    ): Collection {
        $normalizedType = $this->normalizeType($type);
        $normalizedMeasure = $this->normalizeMeasure($measure);
        $normalizedModel = $this->normalizeModel($model);

        return $this->loadProducts()
            ->filter(function (array $product) use (
                $normalizedType,
                $normalizedMeasure,
                $normalizedModel
            ) {
                /*
                 * Para el chatbot sólo consideramos productos
                 * disponibles en el catálogo local.
                 */
                if (($product['availability'] ?? 'unknown') !== 'in_stock') {
                    return false;
                }

                if ($normalizedType !== null) {
                    $productType = $this->normalizeType($product['type'] ?? '');

                    if ($productType !== $normalizedType) {
                        return false;
                    }
                }

                if ($normalizedMeasure !== null) {
                    $productMeasure = $this->normalizeMeasure($product['measure'] ?? '');

                    if ($productMeasure !== $normalizedMeasure) {
                        return false;
                    }
                }

                if ($normalizedModel !== null) {
                    $productModel = $this->normalizeModel($product['model'] ?? '');

                    /*
                     * Usamos contains para permitir:
                     *
                     * PS1000
                     *   →
                     * PS1000 SM FL MP
                     * PS1000 SM FL NM
                     */
                    if (
                        $productModel === null ||
                        ! Str::contains($productModel, $normalizedModel)
                    ) {
                        return false;
                    }
                }

                return true;
            })
            ->values();
    }
    /**
     * Busca productos y valida sus datos comerciales
     * contra la API oficial de WooCommerce.
     *
     * Sólo devuelve productos confirmados por WooCommerce
     * y actualmente disponibles.
     */
    public function searchVerified(
        ?string $type = null,
        ?string $measure = null,
        ?string $model = null
    ): Collection {
        $candidates = $this->searchLocal(
            $type,
            $measure,
            $model
        );

        if ($candidates->isEmpty()) {
            return collect();
        }

        return $this->finalPriceService
            ->applyTo($candidates)
            ->filter(function (array $product) {
                if (($product['price_source'] ?? null) !== 'woocommerce_api') {
                    return false;
                }

                if (empty($product['woocommerce_id'])) {
                    return false;
                }

                if (empty($product['url'])) {
                    return false;
                }

                if (($product['is_in_stock'] ?? false) !== true) {
                    return false;
                }

                return true;
            })
            ->values();
    }}