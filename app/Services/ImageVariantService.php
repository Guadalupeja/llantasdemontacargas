<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;   // Cambia a Imagick si tu hosting lo soporta
use Illuminate\Support\Str;

class ImageVariantService
{
    protected ImageManager $manager;

    public function __construct(?ImageManager $manager = null)
    {
        // Si tienes Imagick: new ImageManager(new \Intervention\Image\Drivers\Imagick\Driver());
        $this->manager = $manager ?: new ImageManager(new Driver());
    }

    /**
     * Genera variantes (anchos x formatos) bajo storage/app/public/variants/{dir}/
     * y devuelve el arreglo de variantes listo para <x-responsive-image />:
     *
     * [
     *   'avif' => [ ['w'=>320,'url'=>'/storage/variants/.../file-320.avif'], ... ],
     *   'webp' => [ ... ],
     *   'jpg'  => [ ... ],
     *   'fallback' => ['url'=>'/storage/originals/.../file.jpg','w'=>origW],
     *   'original_dimensions' => ['w'=>origW,'h'=>origH],
     * ]
     *
     * @param  string $src     Ruta relativa en disk('public'), p.ej: 'originals/llantas/foto.jpg'
     * @param  array  $widths  Anchos a generar
     * @param  array  $formats Formatos a generar (si la lib los soporta)
     */
    public function ensureVariants(
        string $src,
        array $widths = [320, 480, 640, 768, 960, 1024, 1280],
        array $formats = ['avif','webp','jpg'],
        int $qualityWebp = 82,
        int $qualityJpg  = 82,
        int $qualityAvif = 60,
        string $diskName = 'public',
        string $variantsRoot = 'variants'
    ): array {
        $disk = Storage::disk($diskName);

        // Normaliza separadores (Windows/Linux)
        $src = Str::of($src)->replace('\\', '/')->value();

        if (!$disk->exists($src)) {
            Log::warning("[ImageVariantService] No existe en disk('{$diskName}'): {$src}");
            return [];
        }

        // Info del original
        $dir      = trim(pathinfo($src, PATHINFO_DIRNAME) ?: '', '/'); // p.ej. 'originals/llantas'
        $filename = pathinfo($src, PATHINFO_FILENAME) ?: 'image';      // p.ej. 'foto'
        $extOrig  = strtolower(pathinfo($src, PATHINFO_EXTENSION) ?: 'jpg');

        // Directorio de salida de variantes: variants/{dir-del-original}
        $baseOutputDir = $dir ? "{$variantsRoot}/{$dir}" : $variantsRoot;
        if (!$disk->exists($baseOutputDir)) {
            $disk->makeDirectory($baseOutputDir);
        }

        // Lee original
        try {
            $original = $this->manager->read($disk->path($src));
        } catch (\Throwable $e) {
            Log::error("[ImageVariantService] Error leyendo {$src}: ".$e->getMessage());
            return [];
        }

        $origW = $original->width();
        $origH = $original->height();

        // Soporte simple por método disponible (Intervention Image 3)
        $supported = [
            'avif' => method_exists($original, 'toAvif'),
            'webp' => method_exists($original, 'toWebp'),
            'jpg'  => method_exists($original, 'toJpeg'),
            'png'  => method_exists($original, 'toPng'),
        ];
        $formats = array_values(array_filter($formats, fn($f) => ($supported[$f] ?? false)));

        $result = [];

        foreach ($formats as $fmt) {
            foreach ($widths as $targetW) {
                // Evita generar más grande que el original
                if ($targetW >= $origW) {
                    continue;
                }

                // IMPORTANTe: nombre EXACTO esperado por tu helper:
                // "{$baseDir}/{$filename}-{$w}.{$format}"
                $targetRelPath = "{$baseOutputDir}/{$filename}-{$targetW}.{$fmt}";

                if (!$disk->exists($targetRelPath)) {
                    try {
                        // Relee desde el original para no acumular pérdidas
                        $img = $this->manager->read($disk->path($src))->scale(width: $targetW);

                        switch ($fmt) {
                            case 'avif':
                                // Calidad 0–100 (dependiendo del driver)
                                $img->toAvif()->save($disk->path($targetRelPath), $qualityAvif);
                                break;
                            case 'webp':
                                $img->toWebp()->save($disk->path($targetRelPath), $qualityWebp);
                                break;
                            case 'jpg':
                                $img->toJpeg()->save($disk->path($targetRelPath), $qualityJpg);
                                break;
                            case 'png':
                                $img->toPng()->save($disk->path($targetRelPath));
                                break;
                        }
                    } catch (\Throwable $e) {
                        Log::error("[ImageVariantService] Error {$fmt} {$targetW}px para {$src}: ".$e->getMessage());
                        // Continúa con el siguiente tamaño/format
                        continue;
                    }
                }

                // Agrega al resultado con URL pública
                $result[$fmt][] = [
                    'w'   => $targetW,
                    'url' => Storage::url($targetRelPath),
                ];
            }
        }

        // Fallback = original (aunque no haya variantes)
        $result['fallback'] = [
            'url' => Storage::url($src),
            'w'   => $origW,
        ];
        $result['original_dimensions'] = ['w' => $origW, 'h' => $origH];

        return $result;
    }
}
