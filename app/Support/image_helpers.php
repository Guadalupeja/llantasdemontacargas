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
    string $variantsRoot = 'variants'
): array {
    $diskFs = Storage::disk($disk);

    // Normaliza separadores (Windows ↔ Linux)
    $src = Str::of($src)->replace('\\', '/')->value();

    // Datos del original
    $dir      = trim(pathinfo($src, PATHINFO_DIRNAME) ?: '', '/');   // "originals/llantas"
    $filename = pathinfo($src, PATHINFO_FILENAME) ?: 'image';        // "mi-foto"
    $ext      = strtolower(pathinfo($src, PATHINFO_EXTENSION) ?: ''); // "jpg"

    // URL del original como fallback (si existe)
    $fallbackUrl = $diskFs->exists($src) ? Storage::url($src) : '';

    // Directorio donde deberían vivir las variantes
    // variants/originals/llantas/mi-foto-640.webp
    $baseDir = $dir ? "{$variantsRoot}/{$dir}" : $variantsRoot;

    // Siempre define fallback
    $out = [
        'fallback' => ['url' => $fallbackUrl, 'w' => null],
    ];

    // Helper interno para agregar candidate y evitar duplicados por width
    $pushCandidate = function (&$arr, int $w, string $path) {
        $arr[$w] = [
            'w'   => $w,
            'url' => Storage::url($path),
        ];
    };

    foreach ($formats as $format) {
        $format = strtolower($format);
        $byWidth = [];

        // 1) Intento normal: usar los widths configurados
        foreach ($widths as $w) {
            $w = (int) $w;
            if ($w <= 0) continue;

            $variantPath = "{$baseDir}/{$filename}-{$w}.{$format}";
            if ($diskFs->exists($variantPath)) {
                $pushCandidate($byWidth, $w, $variantPath);
            }
        }

        /**
         * 2) Si no encontró nada y el directorio existe,
         *    escanea el folder para detectar variantes con regex:
         *    {filename}-{numero}.{format}
         *
         * Esto cubre casos como:
         * - original 300px => variante -300.jpg
         * - widths no incluye 300
         * - o nombres raros donde se generó 480w por error, etc.
         */
        if (empty($byWidth) && $diskFs->exists($baseDir)) {
            try {
                $files = $diskFs->files($baseDir);

                // Regex: empieza con filename-, captura el ancho y termina con .format
                $pattern = '/^' . preg_quote($filename, '/') . '-(\d+)\.' . preg_quote($format, '/') . '$/i';

                foreach ($files as $p) {
                    $base = basename($p);
                    if (preg_match($pattern, $base, $m)) {
                        $w = (int) $m[1];
                        if ($w > 0) {
                            $pushCandidate($byWidth, $w, $p);
                        }
                    }
                }
            } catch (\Throwable $e) {
                // Si el FS falla por permisos o algo, no rompemos la página.
            }
        }

        if (!empty($byWidth)) {
            // Ordena por width asc y normaliza a lista
            ksort($byWidth);
            $out[$format] = array_values($byWidth);
        }
    }

    return $out;
}