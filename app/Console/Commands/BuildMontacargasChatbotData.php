<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuildMontacargasChatbotData extends Command
{
    protected $signature = 'chatbot:build-montacargas
                            {csv=storage/app/imports/wc-product-export-8-5-2026-1778264741065.csv : Ruta del CSV}
                            {feed=storage/app/imports/mxn-feed.xml : Ruta del XML MXN}
                            {json=resources/data/chatbot/montacargas-products.json : Ruta de salida JSON}
                            {report=storage/app/imports/montacargas-feed-unmatched.json : Ruta del reporte de no coincidencias}';

    protected $description = 'Genera el dataset del chatbot de montacargas cruzando CSV + feed MXN con match por URL, slug y atributos';

    public function handle(): int
    {
        $csvPath = base_path($this->argument('csv'));
        $feedPath = base_path($this->argument('feed'));
        $jsonPath = base_path($this->argument('json'));
        $reportPath = base_path($this->argument('report'));

        if (! File::exists($csvPath)) {
            $this->error("No existe el CSV: {$csvPath}");
            return self::FAILURE;
        }

        if (! File::exists($feedPath)) {
            $this->error("No existe el feed XML: {$feedPath}");
            return self::FAILURE;
        }

        $rows = $this->readCsv($csvPath);

        if (count($rows) < 2) {
            $this->error('El CSV está vacío o no tiene suficientes filas.');
            return self::FAILURE;
        }

        $headers = array_shift($rows);
        $feedIndex = $this->buildFeedIndex($feedPath);

        if (empty($feedIndex['by_url']) && empty($feedIndex['by_slug'])) {
            $this->error('No se pudieron indexar productos del feed MXN.');
            return self::FAILURE;
        }

        $products = [];
        $unmatched = [];

        foreach ($rows as $row) {
            $item = $this->combineRow($headers, $row);

            if (! $item) {
                continue;
            }

            $category = trim((string) ($item['Categorías'] ?? ''));
            if (! Str::contains(Str::lower($category), 'llantas para montacargas')) {
                continue;
            }

            $published = $this->normalizeBoolean($item['Publicado'] ?? '');
            if (! $published) {
                continue;
            }

            $title = trim((string) ($item['Nombre'] ?? ''));
            if ($title === '') {
                continue;
            }

            $slug = trim((string) ($item['Slug'] ?? ''));
            $productUrl = $this->buildProductUrl($slug, $title);

            $typeRaw = trim((string) ($item['Valor(es) del atributo 4'] ?? ''));
            $measureRaw = trim((string) ($item['Valor(es) del atributo 2'] ?? ''));
            $modelRaw = trim((string) ($item['Valor(es) del atributo 3'] ?? ''));
            $shiftsRaw = trim((string) ($item['Valor(es) del atributo 5'] ?? ''));
            $rimTypeRaw = trim((string) ($item['Valor(es) del atributo 6'] ?? ''));
            $treadRaw = trim((string) ($item['Valor(es) del atributo 7'] ?? ''));
            $functionRaw = trim((string) ($item['Valor(es) del atributo 8'] ?? ''));
            $brandRaw = trim((string) ($item['Valor(es) del atributo 1'] ?? ''));

            $normalizedType = $this->normalizeType($typeRaw);
            $normalizedMeasure = $this->normalizeMeasure($measureRaw);
            $normalizedFunction = $this->normalizeFunction($functionRaw);
            $normalizedService = $this->normalizeService($title, $modelRaw);

            $feedData = $this->findFeedMatch(
                $feedIndex,
                $productUrl,
                $slug,
                $title,
                $normalizedType,
                $normalizedMeasure,
                $normalizedService,
                $normalizedFunction,
                $modelRaw
            );

            $imageFromCsv = $this->extractFirstImage($item['Imágenes'] ?? '');
            $image = $feedData['image'] ?? $imageFromCsv;

            $priceMxn = $feedData['price_mxn'] ?? null;
            $salePriceMxn = $feedData['sale_price_mxn'] ?? null;
            $finalPrice = $salePriceMxn ?? $priceMxn;

            $normalized = [
                'id' => (string) ($item['ID'] ?? Str::uuid()),
                'sku' => trim((string) ($item['SKU'] ?? '')),
                'title' => $title,
                'type' => $normalizedType,
                'measure' => $normalizedMeasure,
                'model' => $modelRaw,
                'shifts' => $this->normalizeShifts($shiftsRaw),
                'rim_type' => $this->normalizeSimple($rimTypeRaw),
                'tread' => $this->normalizeTread($treadRaw),
                'function' => $normalizedFunction,
                'service' => $normalizedService,
                'price_mxn' => $finalPrice,
                'price_label' => $finalPrice !== null
                    ? '$' . number_format((float) $finalPrice, 2) . ' MXN'
                    : null,
                'regular_price_mxn' => $priceMxn,
                'sale_price_mxn' => $salePriceMxn,
                'image' => $image,
                'url' => $feedData['url'] ?? $productUrl,
                'availability' => $this->normalizeAvailability($item['¿Existencias?'] ?? ''),
                'brand' => $brandRaw,
                'published' => $published,
                'catalog_visibility' => trim((string) ($item['Visibilidad en el catálogo'] ?? '')),
                'stock_quantity' => $this->normalizeStockQuantity($item['Inventario'] ?? null),
                'matched_from_feed' => $feedData ? true : false,
                'match_strategy' => $feedData['match_strategy'] ?? null,
            ];

            if (! $normalized['type'] || ! $normalized['measure'] || ! $normalized['url']) {
                continue;
            }

            if (! $feedData) {
                $generatedSlug = Str::slug($title);

                $unmatched[] = [
                    'id' => (string) ($item['ID'] ?? ''),
                    'sku' => trim((string) ($item['SKU'] ?? '')),
                    'title' => $title,
                    'csv_slug' => $slug,
                    'generated_slug' => $generatedSlug,
                    'product_url' => $productUrl,
                    'normalized_product_url' => $this->normalizeUrl($productUrl),
                    'type' => $normalized['type'],
                    'measure' => $normalized['measure'],
                    'model' => $normalized['model'],
                    'function' => $normalized['function'],
                    'service' => $normalized['service'],
                    'brand' => $normalized['brand'],
                    'possible_similar_feed_slugs' => $this->findSimilarFeedSlugs(
                        $feedIndex['by_slug'],
                        $slug ?: $generatedSlug
                    ),
                ];
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

        File::ensureDirectoryExists(dirname($reportPath));
        File::put(
            $reportPath,
            json_encode([
                'generated_at' => now()->toIso8601String(),
                'unmatched_count' => count($unmatched),
                'items' => array_values($unmatched),
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        $matchedCount = collect($products)->where('matched_from_feed', true)->count();

        $this->info('JSON generado correctamente.');
        $this->line("Archivo JSON: {$jsonPath}");
        $this->line("Archivo reporte: {$reportPath}");
        $this->line('Productos incluidos: ' . count($products));
        $this->line('Productos con precio cruzado desde feed MXN: ' . $matchedCount);
        $this->line('Productos sin coincidencia en feed MXN: ' . count($unmatched));

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

    private function buildFeedIndex(string $feedPath): array
    {
        $xml = simplexml_load_file($feedPath, 'SimpleXMLElement', LIBXML_NOCDATA);

        if (! $xml) {
            return ['by_url' => [], 'by_slug' => [], 'entries' => []];
        }

        $items = [];

        if (isset($xml->channel->item)) {
            $items = $xml->channel->item;
        } elseif (isset($xml->entry)) {
            $items = $xml->entry;
        }

        $byUrl = [];
        $bySlug = [];
        $entries = [];

        foreach ($items as $item) {
            $google = $item->children('http://base.google.com/ns/1.0');

            $link = trim((string) ($google->link ?: $item->link ?: ''));
            $title = trim((string) ($google->title ?: $item->title ?: ''));
            $image = trim((string) ($google->image_link ?: ''));
            $priceRaw = trim((string) ($google->price ?: ''));
            $salePriceRaw = trim((string) ($google->sale_price ?: ''));

            if ($link === '') {
                continue;
            }

            $normalizedUrl = $this->normalizeUrl($link);
            $slug = $this->slugFromUrl($link) ?: Str::slug($title);

            $entry = [
                'url' => $link,
                'normalized_url' => $normalizedUrl,
                'slug' => $slug,
                'title' => $title,
                'title_slug' => Str::slug($title),
                'image' => $image !== '' ? $image : null,
                'price_mxn' => $this->extractFeedPrice($priceRaw),
                'sale_price_mxn' => $this->extractFeedPrice($salePriceRaw),
                'type' => $this->inferTypeFromTitle($title),
                'measure' => $this->extractMeasureFromTitle($title),
                'service' => $this->normalizeService($title, ''),
                'function' => $this->inferFunctionFromTitle($title),
                'variant_flags' => [
                    'nm' => Str::contains(Str::lower($title), 'nm'),
                    'loc' => Str::contains(Str::lower($title), 'loc'),
                ],
            ];

            $byUrl[$normalizedUrl] = $entry;

            if ($slug) {
                $bySlug[$slug] = $entry;
            }

            $entries[] = $entry;
        }

        return [
            'by_url' => $byUrl,
            'by_slug' => $bySlug,
            'entries' => $entries,
        ];
    }

    private function findFeedMatch(
        array $feedIndex,
        ?string $productUrl,
        ?string $slug,
        string $title,
        ?string $type,
        ?string $measure,
        string $service,
        string $function,
        string $model
    ): ?array {
        $normalizedUrl = $productUrl ? $this->normalizeUrl($productUrl) : null;
        $normalizedSlug = $slug ? trim($slug, '/') : null;
        $titleSlug = Str::slug($title);

        if ($normalizedUrl && isset($feedIndex['by_url'][$normalizedUrl])) {
            return $feedIndex['by_url'][$normalizedUrl] + ['match_strategy' => 'url'];
        }

        if ($normalizedSlug && isset($feedIndex['by_slug'][$normalizedSlug])) {
            return $feedIndex['by_slug'][$normalizedSlug] + ['match_strategy' => 'csv_slug'];
        }

        if ($titleSlug && isset($feedIndex['by_slug'][$titleSlug])) {
            return $feedIndex['by_slug'][$titleSlug] + ['match_strategy' => 'title_slug'];
        }

        $attributeMatch = $this->findFeedMatchByAttributes(
            $feedIndex['entries'],
            $title,
            $type,
            $measure,
            $service,
            $function,
            $model
        );

        if ($attributeMatch) {
            return $attributeMatch + ['match_strategy' => 'attributes'];
        }

        return null;
    }

    private function findFeedMatchByAttributes(
        array $entries,
        string $csvTitle,
        ?string $csvType,
        ?string $csvMeasure,
        string $csvService,
        string $csvFunction,
        string $csvModel
    ): ?array {
        if (! $csvMeasure) {
            return null;
        }

        $csvFlags = [
            'nm' => Str::contains(Str::lower($csvTitle), 'nm'),
            'loc' => Str::contains(Str::lower($csvTitle), 'loc'),
        ];

        $normalizedCsvMeasure = $this->normalizeMeasureToken($csvMeasure);

        $candidates = collect($entries)
            ->filter(function ($entry) use ($csvType, $normalizedCsvMeasure, $csvService) {
                if (! $entry['measure']) {
                    return false;
                }

                if ($csvType && $entry['type'] && $entry['type'] !== $csvType) {
                    return false;
                }

                if ($this->normalizeMeasureToken($entry['measure']) !== $normalizedCsvMeasure) {
                    return false;
                }

                if ($csvService !== 'cualquiera' && $entry['service'] !== $csvService) {
                    return false;
                }

                return true;
            })
            ->map(function ($entry) use ($csvFlags, $csvFunction, $csvModel) {
                $score = 0;

                if (($entry['variant_flags']['nm'] ?? false) === $csvFlags['nm']) {
                    $score += 3;
                }

                if (($entry['variant_flags']['loc'] ?? false) === $csvFlags['loc']) {
                    $score += 2;
                }

                if ($csvFunction !== 'cualquiera' && $entry['function'] === $csvFunction) {
                    $score += 2;
                }

                if ($csvModel !== '' && Str::contains(Str::lower($entry['title']), Str::lower($csvModel))) {
                    $score += 1;
                }

                if (! $csvFlags['nm'] && ! ($entry['variant_flags']['nm'] ?? false)) {
                    $score += 1;
                }

                if (! $csvFlags['loc'] && ! ($entry['variant_flags']['loc'] ?? false)) {
                    $score += 1;
                }

                $entry['match_score'] = $score;

                return $entry;
            })
            ->sortByDesc('match_score')
            ->values();

        return $candidates->first();
    }

    private function inferTypeFromTitle(string $title): ?string
    {
        $text = Str::lower($title);

        return match (true) {
            Str::contains($text, 'solida con arillo'),
            Str::contains($text, 'sólida con arillo') => 'solida_con_arillo',

            Str::contains($text, 'neumatica radial'),
            Str::contains($text, 'neumática radial') => 'neumatica_radial',

            Str::contains($text, 'neumatica'),
            Str::contains($text, 'neumática') => 'neumatica',

            Str::contains($text, 'poliuretano') => 'poliuretano',

            Str::contains($text, 'solida'),
            Str::contains($text, 'sólida') => 'solida',

            default => null,
        };
    }

    private function inferFunctionFromTitle(string $title): string
    {
        $text = Str::lower($title);

        return match (true) {
            Str::contains($text, 'nm'),
            Str::contains($text, 'no manchante') => 'no_manchante',
            default => 'estandar',
        };
    }

    private function extractMeasureFromTitle(string $title): ?string
    {
        if (preg_match('/(\d{1,2}(?:\.\d{1,2})?(?:[-x]\d{1,2}(?:\.\d{1,2})?)+(?:\/\d{1,2}(?:\.\d{1,2})+)?)/i', $title, $matches)) {
            return $this->normalizeMeasure($matches[1]);
        }

        return null;
    }

    private function normalizeMeasureToken(?string $measure): string
    {
        $measure = Str::lower((string) $measure);
        $measure = str_replace(['/', 'x', '.', ' '], '-', $measure);
        $measure = preg_replace('/-+/', '-', $measure);
        return trim($measure, '-');
    }

    private function findSimilarFeedSlugs(array $bySlug, ?string $slug): array
    {
        $slug = trim((string) $slug);

        if ($slug === '') {
            return [];
        }

        $similar = [];

        foreach ($bySlug as $feedSlug => $entry) {
            if (
                Str::contains($feedSlug, $slug) ||
                Str::contains($slug, $feedSlug) ||
                levenshtein($feedSlug, $slug) <= 10
            ) {
                $similar[] = [
                    'feed_slug' => $feedSlug,
                    'feed_title' => $entry['title'] ?? null,
                    'feed_url' => $entry['url'] ?? null,
                    'price_mxn' => $entry['sale_price_mxn'] ?? $entry['price_mxn'] ?? null,
                ];
            }

            if (count($similar) >= 5) {
                break;
            }
        }

        return $similar;
    }

    private function extractFeedPrice(string $raw): ?float
    {
        if ($raw === '') {
            return null;
        }

        $value = Str::upper($raw);
        $value = str_replace(['MXN', '$', ','], '', $value);
        $value = trim($value);

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

    private function buildProductUrl(?string $slug, string $title): ?string
    {
        $slug = trim((string) $slug);

        if ($slug !== '') {
            if (Str::startsWith($slug, 'http')) {
                return $slug;
            }

            return 'https://llantasdemontacargas.com/tienda-en-linea/producto/' . trim($slug, '/') . '/';
        }

        return 'https://llantasdemontacargas.com/tienda-en-linea/producto/' . Str::slug($title) . '/';
    }

    private function normalizeUrl(string $url): string
    {
        $url = trim($url);
        $url = preg_replace('/\?.*$/', '', $url);
        return rtrim(Str::lower($url), '/');
    }

    private function slugFromUrl(string $url): ?string
    {
        $path = parse_url($url, PHP_URL_PATH);

        if (! $path) {
            return null;
        }

        $segments = array_values(array_filter(explode('/', trim($path, '/'))));

        return ! empty($segments) ? end($segments) : null;
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
        return collect($products)
            ->pluck($key)
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();
    }
}