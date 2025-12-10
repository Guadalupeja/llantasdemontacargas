<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Devuelve el arreglo de variantes para <x-responsive-image />:
 * - ['avif'|'webp'|'jpg'] => [ ['w'=>int,'url'=>string], ... ]
 * - ['fallback'] => ['url'=>string,'w'=>null]
 *
 * $src es la RUTA RELATIVA dentro del disco 'public', por ej:
 *   originals/llantas/mi-foto.jpg
 */
function image_variants(
    string $src,
    array $widths  = [320, 480, 640, 768, 960, 1024, 1280],
    array $formats = ['avif', 'webp', 'jpg'],
    string $disk   = 'public',
    string $variantsRoot = 'variants' // raíz donde se guardan las variantes
): array {
    $diskFs = Storage::disk($disk);

    // Normaliza separadores (Windows ↔ Linux)
    $src = Str::of($src)->replace('\\', '/')->value();

    // Datos del original
    $dir      = trim(pathinfo($src, PATHINFO_DIRNAME), '/');   // p.ej. "originals/llantas"
    $filename = pathinfo($src, PATHINFO_FILENAME);             // p.ej. "mi-foto"
    $ext      = strtolower(pathinfo($src, PATHINFO_EXTENSION)); // p.ej. "jpg"

    // URL del original como fallback (si existe en el disco)
    $fallbackUrl = $diskFs->exists($src) ? Storage::url($src) : '';

    // Estructura de variantes: "variants/{dir}/{filename}"
    // => variants/originals/llantas/mi-foto-640.webp
    $baseDir = $dir ? "{$variantsRoot}/{$dir}" : $variantsRoot;

    $out = [];

    foreach ($formats as $format) {
        if ($format === $ext) {
            // El fallback suele ser el original
            $out['fallback'] = ['url' => $fallbackUrl, 'w' => null];
            continue;
        }

        $candidates = [];
        foreach ($widths as $w) {
            $variantPath = "{$baseDir}/{$filename}-{$w}.{$format}";
            if ($diskFs->exists($variantPath)) {
                $candidates[] = [
                    'w'   => $w,
                    'url' => Storage::url($variantPath), // genera /storage/...
                ];
            }
        }
        if ($candidates) {
            $out[$format] = $candidates;
        }
    }

    if (!isset($out['fallback'])) {
        $out['fallback'] = ['url' => $fallbackUrl, 'w' => null];
    }

    return $out;
}
