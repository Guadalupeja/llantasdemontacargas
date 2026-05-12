<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuildMontacargasChatbotData extends Command
{
    protected $signature = 'chatbot:build-montacargas
                            {csv=storage/app/imports/wc-product-export-8-5-2026-1778264741065.csv : Ruta del CSV}
                            {json=resources/data/chatbot/montacargas-products.json : Ruta de salida JSON}';

    protected $description = 'Genera el dataset normalizado para el chatbot de llantas para montacargas';

    public function handle(): int
    {
        $csvPath = base_path($this->argument('csv'));
        $jsonPath = base_path($this->argument('json'));

        if (! File::exists($csvPath)) {
            $this->error("No existe el CSV: {$csvPath}");
            return self::FAILURE;
        }

        $rows = $this->readCsv($csvPath);

        if (count($rows) < 2) {
            $this->error('El CSV está vacío o no tiene suficientes filas.');
            return self::FAILURE;
        }

        $headers = array_shift($rows);

        $products = [];

        foreach ($rows as $row) {
            $item = $this->combineRow($headers, $row);

            if (! $item) {
                continue;
            }

            $category = trim((string) ($item['Categorías'] ?? ''));
            if (! Str::contains(Str::lower($category), 'llantas para montacargas')) {
                continue;
            }

            $title = trim((string) ($item['Nombre'] ?? ''));
            if ($title === '') {
                continue;
            }

            $slug = trim((string) ($item['Slug'] ?? ''));
            $url = $this->buildProductUrl($slug, $title);

            $price = $this->extractPrice($item['Precio normal'] ?? null);
            $salePrice = $this->extractPrice($item['Precio rebajado'] ?? null);
            $image = $this->extractFirstImage($item['Imágenes'] ?? '');

            $typeRaw = trim((string) ($item['Valor(es) del atributo 4'] ?? ''));
            $measureRaw = trim((string) ($item['Valor(es) del atributo 2'] ?? ''));
            $modelRaw = trim((string) ($item['Valor(es) del atributo 3'] ?? ''));
            $shiftsRaw = trim((string) ($item['Valor(es) del atributo 5'] ?? ''));
            $rimTypeRaw = trim((string) ($item['Valor(es) del atributo 6'] ?? ''));
            $treadRaw = trim((string) ($item['Valor(es) del atributo 7'] ?? ''));
            $functionRaw = trim((string) ($item['Valor(es) del atributo 8'] ?? ''));
            $brandRaw = trim((string) ($item['Valor(es) del atributo 1'] ?? ''));

            $normalized = [
                'id' => (string) ($item['ID'] ?? Str::uuid()),
                'sku' => trim((string) ($item['SKU'] ?? '')),
                'title' => $title,
                'type' => $this->normalizeType($typeRaw),
                'measure' => $this->normalizeMeasure($measureRaw),
                'model' => $modelRaw,
                'shifts' => $this->normalizeShifts($shiftsRaw),
                'rim_type' => $this->normalizeSimple($rimTypeRaw),
                'tread' => $this->normalizeTread($treadRaw),
                'function' => $this->normalizeFunction($functionRaw),
                'service' => $this->normalizeService($title, $modelRaw),
                'price_mxn' => $salePrice ?? $price,
                'price_label' => ($salePrice ?? $price) !== null
                    ? '$' . number_format((float) ($salePrice ?? $price), 2) . ' MXN'
                    : null,
                'regular_price_mxn' => $price,
                'sale_price_mxn' => $salePrice,
                'image' => $image,
                'url' => $url,
                'availability' => $this->normalizeAvailability($item['¿Existencias?'] ?? ''),
                'brand' => $brandRaw,
                'published' => $this->normalizeBoolean($item['Publicado'] ?? ''),
                'catalog_visibility' => trim((string) ($item['Visibilidad en el catálogo'] ?? '')),
                'stock_quantity' => $this->normalizeStockQuantity($item['Inventario'] ?? null),
            ];

            if (
                ! $normalized['type'] ||
                ! $normalized['measure'] ||
                ! $normalized['url'] ||
                ! $normalized['published']
            ) {
                continue;
            }

            $products[] = $normalized;
        }

        $products = array_values($products);

        File::ensureDirectoryExists(dirname($jsonPath));
        File::put(
            $jsonPath,
            json_encode([
                'generated_at' => now()->toIso8601String(),
                'count' => count($products),
                'products' => $products,
                'filters' => [
                    'types' => $this->uniqueValues($products, 'type'),
                    'measures' => $this->uniqueValues($products, 'measure'),
                    'treads' => $this->uniqueValues($products, 'tread'),
                    'functions' => $this->uniqueValues($products, 'function'),
                    'services' => $this->uniqueValues($products, 'service'),
                ],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $this->info('JSON generado correctamente.');
        $this->line("Archivo: {$jsonPath}");
        $this->line('Productos incluidos: ' . count($products));

        return self::SUCCESS;
    }

    private function readCsv(string $path): array
    {
        $rows = [];

        if (($handle = fopen($path, 'r')) === false) {
            return $rows;
        }

        while (($data = fgetcsv($handle, 0, ',')) !== false) {
            $rows[] = $data;
        }

        fclose($handle);

        return $rows;
    }

    private function combineRow(array $headers, array $row): ?array
    {
        if (empty($row)) {
            return null;
        }

        $row = array_pad($row, count($headers), null);

        return array_combine($headers, array_slice($row, 0, count($headers)));
    }

    private function extractPrice($raw): ?float
    {
        if ($raw === null || $raw === '') {
            return null;
        }

        $value = str_replace(['$', ',', 'MXN', ' '], '', (string) $raw);

        return is_numeric($value) ? (float) $value : null;
    }

    private function extractFirstImage(string $raw): ?string
    {
        if (trim($raw) === '') {
            return null;
        }

        $parts = array_map('trim', explode(',', $raw));
        return $parts[0] ?: null;
    }

    private function buildProductUrl(string $slug, string $title): ?string
    {
        if ($slug !== '') {
            if (Str::startsWith($slug, 'http')) {
                return $slug;
            }

            return 'https://llantasdemontacargas.com/tienda-en-linea/producto/' . trim($slug, '/') . '/';
        }

        $generated = Str::slug($title);
        return 'https://llantasdemontacargas.com/tienda-en-linea/producto/' . $generated . '/';
    }

    private function normalizeType(string $value): ?string
    {
        $text = Str::lower(trim($value));

        return match (true) {
            Str::contains($text, 'sólida con arillo'),
            Str::contains($text, 'solida con arillo') => 'solida_con_arillo',

            Str::contains($text, 'neumática radial'),
            Str::contains($text, 'neumatica radial') => 'neumatica_radial',

            Str::contains($text, 'neumática'),
            Str::contains($text, 'neumatica') => 'neumatica',

            Str::contains($text, 'poliuretano') => 'poliuretano',

            Str::contains($text, 'sólida'),
            Str::contains($text, 'solida') => 'solida',

            default => null,
        };
    }

    private function normalizeMeasure(string $value): ?string
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        $value = preg_replace('/\s+/', ' ', $value);
        $value = str_replace([' ,', ', '], ',', $value);

        return $value;
    }

    private function normalizeTread(string $value): string
    {
        $text = Str::lower(trim($value));

        return match (true) {
            Str::contains($text, 'lisa') => 'lisa',
            Str::contains($text, 'tracción'),
            Str::contains($text, 'traccion') => 'traccion',
            default => 'cualquiera',
        };
    }

    private function normalizeFunction(string $value): string
    {
        $text = Str::lower(trim($value));

        return match (true) {
            Str::contains($text, 'no manchante') => 'no_manchante',
            Str::contains($text, 'estándar'),
            Str::contains($text, 'estandar') => 'estandar',
            default => 'cualquiera',
        };
    }

    private function normalizeService(string $title, string $model): string
    {
        $text = Str::lower($title . ' ' . $model);

        return match (true) {
            Str::contains($text, 'extra pesado') => 'extra_pesado',
            Str::contains($text, 'trabajo pesado') => 'pesado',
            Str::contains($text, 'trabajo medio') => 'medio',
            default => 'cualquiera',
        };
    }

    private function normalizeShifts(string $value): string
    {
        return trim($value) !== '' ? trim($value) : 'cualquiera';
    }

    private function normalizeSimple(string $value): string
    {
        $text = Str::lower(trim($value));
        $text = str_replace(
            ['á', 'é', 'í', 'ó', 'ú', 'ñ', ' '],
            ['a', 'e', 'i', 'o', 'u', 'n', '_'],
            $text
        );
        $text = preg_replace('/[^a-z0-9_]+/', '_', $text);

        return trim($text, '_') ?: 'cualquiera';
    }

    private function normalizeAvailability(string $value): string
    {
        $text = Str::lower(trim($value));

        return match (true) {
            in_array($text, ['1', 'si', 'sí', 'yes', 'instock', 'in stock'], true) => 'in_stock',
            in_array($text, ['0', 'no', 'outofstock', 'out of stock'], true) => 'out_of_stock',
            default => 'unknown',
        };
    }

    private function normalizeBoolean(string $value): bool
    {
        $text = Str::lower(trim($value));
        return in_array($text, ['1', 'si', 'sí', 'yes', 'true'], true);
    }

    private function normalizeStockQuantity($value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        return is_numeric($value) ? (int) $value : null;
    }

    private function uniqueValues(array $products, string $key): array
    {
        $values = collect($products)
            ->pluck($key)
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();

        return $values;
    }
}