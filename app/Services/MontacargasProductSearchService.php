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
    }
    /**
     * Determina qué dato falta para distinguir varios candidatos.
     *
     * La prioridad evita hacer preguntas innecesarias al cliente.
     */
    public function nextClarification(Collection $products): ?array
    {
        $products = $products->values();

        if ($products->count() <= 1) {
            return null;
        }

        $attributes = [
            'function' => [
                'question' => '¿La necesitas estándar o no manchante?',
            ],
            'rim_type' => [
                'question' => '¿La necesitas con configuración estándar o LOC?',
            ],
            'tread' => [
                'question' => '¿La necesitas lisa o con tracción?',
            ],
            'service' => [
                'question' => '¿Qué nivel de servicio o trabajo necesitas?',
            ],
            'shifts' => [
                'question' => '¿Cuántos turnos de trabajo tendrá la llanta?',
            ],
        ];

        foreach ($attributes as $attribute => $config) {
            $values = $products
                ->pluck($attribute)
                ->filter(fn ($value) => $value !== null && trim((string) $value) !== '')
                ->map(fn ($value) => trim((string) $value))
                ->unique()
                ->values();

            if ($values->count() <= 1) {
                continue;
            }

            return [
                'attribute' => $attribute,
                'question' => $config['question'],
                'options' => $values
                    ->map(fn ($value) => [
                        'value' => $value,
                        'label' => $this->variantLabel($attribute, $value),
                    ])
                    ->all(),
                'candidate_count' => $products->count(),
            ];
        }

        return [
            'attribute' => null,
            'question' => 'Necesito más información para distinguir estas opciones.',
            'options' => [],
            'candidate_count' => $products->count(),
        ];
    }

    /**
     * Etiquetas amigables para mostrar al cliente.
     */
    private function variantLabel(string $attribute, string $value): string
    {
        return match ($attribute) {
            'function' => match ($value) {
                'estandar' => 'Estándar',
                'no_manchante' => 'No manchante',
                default => $value,
            },

            'rim_type' => match ($value) {
                'estandar' => 'Estándar',
                'loc' => 'LOC',
                default => $value,
            },

            'tread' => match ($value) {
                'lisa' => 'Lisa',
                'traccion' => 'Tracción',
                default => $value,
            },

            'service' => match ($value) {
                'ligero' => 'Trabajo ligero',
                'medio' => 'Trabajo medio',
                'pesado' => 'Trabajo pesado',
                'extra_pesado' => 'Trabajo extra pesado',
                'cualquiera' => 'Cualquiera',
                default => $value,
            },

            'shifts' => $value === '1'
                ? '1 turno'
                : $value . ' turnos',

            default => $value,
        };
    }
    /**
     * Aplica la respuesta de una pregunta de desambiguación
     * sobre una colección de candidatos.
     */
    public function applyClarification(
        Collection $products,
        string $attribute,
        ?string $value
    ): Collection {
        $allowedAttributes = [
            'function',
            'rim_type',
            'tread',
            'service',
            'shifts',
        ];

        if (! in_array($attribute, $allowedAttributes, true)) {
            throw new \InvalidArgumentException(
                "El atributo de desambiguación [{$attribute}] no es válido."
            );
        }

        $normalizedValue = $this->normalizeVariantValue(
            $attribute,
            $value
        );

        if ($normalizedValue === null) {
            return collect();
        }

        return $products
            ->filter(function (array $product) use (
                $attribute,
                $normalizedValue
            ) {
                $productValue = $this->normalizeVariantValue(
                    $attribute,
                    isset($product[$attribute])
                        ? (string) $product[$attribute]
                        : null
                );

                return $productValue === $normalizedValue;
            })
            ->values();
    }

    /**
     * Normaliza valores usados para distinguir variantes.
     */
    private function normalizeVariantValue(
        string $attribute,
        ?string $value
    ): ?string {
        $text = $this->normalizeText($value);

        if ($text === '') {
            return null;
        }

        $words = preg_replace(
            '/\s+/',
            ' ',
            str_replace('_', ' ', $text)
        );

        return match ($attribute) {
            'function' => match (true) {
                $words === 'nm',
                Str::contains($words, 'no manchante') => 'no_manchante',

                $words === 'estandar',
                $words === 'standard' => 'estandar',

                default => str_replace(' ', '_', $words),
            },

            'rim_type' => match (true) {
                $words === 'loc' => 'loc',

                in_array(
                    $words,
                    ['estandar', 'standard', 'normal'],
                    true
                ) => 'estandar',

                default => str_replace(' ', '_', $words),
            },

            'tread' => match (true) {
                Str::contains($words, 'traccion') => 'traccion',
                Str::contains($words, 'lisa') => 'lisa',
                default => str_replace(' ', '_', $words),
            },

            'service' => match (true) {
                Str::contains($words, 'extra pesado') => 'extra_pesado',
                Str::contains($words, 'pesado') => 'pesado',
                Str::contains($words, 'medio') => 'medio',
                Str::contains($words, 'ligero') => 'ligero',
                Str::contains($words, 'cualquiera') => 'cualquiera',
                default => str_replace(' ', '_', $words),
            },

            'shifts' => trim(
                str_replace(
                    ['turnos', 'turno'],
                    '',
                    $text
                )
            ),

            default => null,
        };
    }
    /**
     * Verifica comercialmente un producto ya resuelto.
     *
     * Sólo acepta exactamente un candidato y únicamente
     * lo devuelve si WooCommerce confirma producto, precio,
     * URL y disponibilidad.
     */
    public function verifyResolved(Collection $products): ?array
    {
        $products = $products->values();

        if ($products->count() !== 1) {
            return null;
        }

        $verified = $this->finalPriceService
            ->applyTo($products)
            ->first();

        if (! is_array($verified)) {
            return null;
        }

        if (($verified['price_source'] ?? null) !== 'woocommerce_api') {
            return null;
        }

        if (empty($verified['woocommerce_id'])) {
            return null;
        }

        if (empty($verified['url'])) {
            return null;
        }

        if (($verified['is_in_stock'] ?? false) !== true) {
            return null;
        }

        $price = $verified['price_mxn'] ?? null;

        if (! is_numeric($price) || (float) $price <= 0) {
            return null;
        }

        return $verified;
    }}