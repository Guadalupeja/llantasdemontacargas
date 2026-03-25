<?php

use Illuminate\Support\Str;

/**
 * Devuelve el arreglo de variantes para <x-responsive-image />:
 * - ['avif'|'webp'|'jpg'] => [ ['w'=>int,'url'=>string], ... ]
 * - ['fallback'] => ['url'=>string,'w'=>null]
 *
 * $src es la ruta relativa dentro de /storage, por ej:
 *   originals/llantas/mi-foto.jpg
 */
function image_variants(
    string $src,
    array $widths  = [320, 480, 640, 768, 960, 1024, 1280],
    array $formats = ['avif', 'webp', 'jpg'],
    string $variantsRoot = 'variants'
): array {
    // Normaliza separadores
    $src = Str::of($src)->replace('\\', '/')->trim('/')->value();

    // Datos del original
    $dir      = trim(pathinfo($src, PATHINFO_DIRNAME) ?: '', '/');
    $filename = pathinfo($src, PATHINFO_FILENAME) ?: 'image';
    $ext      = strtolower(pathinfo($src, PATHINFO_EXTENSION) ?: '');

    /**
     * Rutas físicas posibles:
     * 1) flujo típico Laravel: storage/app/public/...
     * 2) tu despliegue actual: public/storage/...
     */
    $storageAppPublic = storage_path('app/public');
    $publicStorage    = public_path('storage');

    // Original físico posible en ambos lugares
    $originalCandidates = [
        $storageAppPublic . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $src),
        $publicStorage . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $src),
    ];

    // Fallback: SIEMPRE construimos la URL pública
    $fallbackUrl = asset('storage/' . $src);

    $out = [
        'fallback' => [
            'url' => $fallbackUrl,
            'w'   => null,
        ],
    ];

    $pushCandidate = function (&$arr, int $w, string $relativePublicPath) {
        $arr[$w] = [
            'w'   => $w,
            'url' => asset('storage/' . ltrim(str_replace('\\', '/', $relativePublicPath), '/')),
        ];
    };

    // Directorio relativo de variantes, ejemplo: variants/originals/llantas
    $baseDir = $dir ? "{$variantsRoot}/{$dir}" : $variantsRoot;

    foreach ($formats as $format) {
        $format = strtolower($format);
        $byWidth = [];

        // Directorios físicos posibles donde podrían vivir variantes
        $variantBaseCandidates = [
            $storageAppPublic . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $baseDir),
            $publicStorage . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $baseDir),
        ];

        /**
         * 1) Busca por widths conocidos
         */
        foreach ($widths as $w) {
            $w = (int) $w;
            if ($w <= 0) {
                continue;
            }

            $relativeVariantPath = "{$baseDir}/{$filename}-{$w}.{$format}";

            foreach ($variantBaseCandidates as $baseFsDir) {
                $fullVariantPath = dirname($baseFsDir . DIRECTORY_SEPARATOR . "{$filename}-{$w}.{$format}")
                    . DIRECTORY_SEPARATOR
                    . basename("{$filename}-{$w}.{$format}");

                if (is_file($fullVariantPath)) {
                    $pushCandidate($byWidth, $w, $relativeVariantPath);
                    break;
                }
            }
        }

        /**
         * 2) Si no encontró nada, escanea el folder de variantes con regex
         */
        if (empty($byWidth)) {
            $pattern = '/^' . preg_quote($filename, '/') . '-(\d+)\.' . preg_quote($format, '/') . '$/i';

            foreach ($variantBaseCandidates as $baseFsDir) {
                if (!is_dir($baseFsDir)) {
                    continue;
                }

                try {
                    $files = scandir($baseFsDir);

                    if ($files === false) {
                        continue;
                    }

                    foreach ($files as $file) {
                        if ($file === '.' || $file === '..') {
                            continue;
                        }

                        if (preg_match($pattern, $file, $m)) {
                            $w = (int) $m[1];
                            if ($w > 0) {
                                $relativeVariantPath = "{$baseDir}/{$file}";
                                $pushCandidate($byWidth, $w, $relativeVariantPath);
                            }
                        }
                    }
                } catch (\Throwable $e) {
                    // No rompemos la página si algo falla al leer FS
                }
            }
        }

        if (!empty($byWidth)) {
            ksort($byWidth);
            $out[$format] = array_values($byWidth);
        }
    }

    return $out;
}