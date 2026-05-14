<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeHomeImages extends Command
{
    protected $signature = 'images:optimize-home';

    protected $description = 'Genera imágenes optimizadas WebP/JPG para el home';

    private array $storageImages = [
        'originals/montacargas-con-llantas-solidas.png',
        'originals/llanta-solida-xp800.png',
        'originals/montacargas-con-solida-con-arillo.png',
        'originals/llanta-ps1000.png',
        'originals/llantas-neumaticas-para-montacargas-con-montacargas.png',
        'originals/Montacargas-con-llanta-t900-neumatica.png',
        'originals/montacargas-con-llantas-neumaticas-radiales.png',
        'originals/TR-900-NEUMATICA-RADIAL.jpg',
        'originals/MOSAICO-PS-1000.png',
        'originals/Llanta-neumatica-reforzada.jpg',
        'originals/Llanta-solida-con-arillo.jpg',
        'originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg',
    ];

    private array $shopImages = [
        'home/shop/650-10-500.png',
        'home/shop/600-9-400.png',
        'home/shop/600x9-neumatica.jpg',
        'home/shop/300-15-800.png',
        'home/shop/300-15-800-extra.png',
        'home/shop/28x9-15-700.png',
        'home/shop/250-15-700.png',
        'home/shop/250-15-750.png',
        'home/shop/21x7x15.png',
        'home/shop/825-15-650.png',
        'home/shop/16x6x10-5.png',
        'home/shop/15x4-5-8-300.png',
        'home/shop/18x7x12-1-8.png',
        'home/shop/23x9-10-650.png',
        'home/shop/12-00-20-10-00.png',
    ];

    private array $widths = [160, 220, 280, 320, 480, 640];

    public function handle(): int
    {
        if (! function_exists('imagewebp')) {
            $this->error('Tu instalación de PHP/GD no soporta imagewebp(). Activa WebP en GD o usa Intervention/Image.');
            return self::FAILURE;
        }

        $this->info('Optimizando imágenes de storage/app/public/originals...');
        foreach ($this->storageImages as $relativePath) {
            $this->optimizeStorageImage($relativePath);
        }

        $this->info('Optimizando imágenes de public/img/home/shop...');
        foreach ($this->shopImages as $relativePath) {
            $this->optimizePublicShopImage($relativePath);
        }

        $this->info('Imágenes optimizadas correctamente.');

        return self::SUCCESS;
    }

    private function optimizeStorageImage(string $relativePath): void
    {
        $source = storage_path('app/public/' . $relativePath);

        if (! File::exists($source)) {
            $this->warn("No existe: {$source}");
            return;
        }

        $pathInfo = pathinfo($relativePath);
        $directory = $pathInfo['dirname'];
        $filename = $pathInfo['filename'];

        $destinationDirectory = storage_path('app/public/variants/' . $directory);

        File::ensureDirectoryExists($destinationDirectory);

        [$sourceWidth, $sourceHeight] = getimagesize($source);

        foreach ($this->widths as $width) {
            if ($width > $sourceWidth) {
                continue;
            }

            $height = (int) round(($width / $sourceWidth) * $sourceHeight);

            $this->saveResized($source, "{$destinationDirectory}/{$filename}-{$width}.webp", $width, $height, 'webp');
            $this->saveResized($source, "{$destinationDirectory}/{$filename}-{$width}.jpg", $width, $height, 'jpg');

            $this->line("OK storage: {$filename}-{$width}");
        }
    }

    private function optimizePublicShopImage(string $relativePath): void
    {
        $source = public_path('img/' . $relativePath);

        if (! File::exists($source)) {
            $this->warn("No existe: {$source}");
            return;
        }

        $pathInfo = pathinfo($relativePath);
        $directory = $pathInfo['dirname'];
        $filename = $pathInfo['filename'];

        $destinationDirectory = public_path('img/' . $directory . '/optimized');

        File::ensureDirectoryExists($destinationDirectory);

        [$sourceWidth, $sourceHeight] = getimagesize($source);

        foreach ([280, 360, 480, 640] as $width) {
            if ($width > $sourceWidth) {
                continue;
            }

            $height = (int) round(($width / $sourceWidth) * $sourceHeight);

            $this->saveResized($source, "{$destinationDirectory}/{$filename}-{$width}.webp", $width, $height, 'webp');

            $this->line("OK shop: {$filename}-{$width}.webp");
        }
    }

    private function saveResized(string $source, string $destination, int $targetWidth, int $targetHeight, string $format): void
    {
        $extension = strtolower(pathinfo($source, PATHINFO_EXTENSION));

        $srcImage = match ($extension) {
            'png' => imagecreatefrompng($source),
            'jpg', 'jpeg' => imagecreatefromjpeg($source),
            'webp' => imagecreatefromwebp($source),
            default => null,
        };

        if (! $srcImage) {
            $this->warn("Formato no soportado: {$source}");
            return;
        }

        imagesavealpha($srcImage, true);

        $dstImage = imagecreatetruecolor($targetWidth, $targetHeight);

        if ($format === 'webp') {
            imagealphablending($dstImage, false);
            imagesavealpha($dstImage, true);
            $transparent = imagecolorallocatealpha($dstImage, 0, 0, 0, 127);
            imagefilledrectangle($dstImage, 0, 0, $targetWidth, $targetHeight, $transparent);
        } else {
            $white = imagecolorallocate($dstImage, 255, 255, 255);
            imagefilledrectangle($dstImage, 0, 0, $targetWidth, $targetHeight, $white);
        }

        imagecopyresampled(
            $dstImage,
            $srcImage,
            0,
            0,
            0,
            0,
            $targetWidth,
            $targetHeight,
            imagesx($srcImage),
            imagesy($srcImage)
        );

        if ($format === 'webp') {
            imagewebp($dstImage, $destination, 78);
        } else {
            imagejpeg($dstImage, $destination, 78);
        }

        imagedestroy($srcImage);
        imagedestroy($dstImage);
    }
}