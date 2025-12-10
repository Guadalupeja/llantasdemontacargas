<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageVariantService;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'images:generate', description: 'Genera variantes para todas las imágenes bajo storage/app/public/{path}')]
class GenerateImageVariants extends Command
{
    /**
     * Si tu versión de Laravel ignora AsCommand,
     * Signature/Description garantizan compatibilidad.
     */
    protected $signature   = 'images:generate {path=originals}';
    protected $description = 'Genera variantes para todas las imágenes bajo storage/app/public/{path}';

    public function handle(ImageVariantService $svc)
    {
        $path = $this->argument('path');
        $disk = Storage::disk('public');

        if (!$disk->exists($path)) {
            $this->error("No existe la ruta: storage/app/public/{$path}");
            return self::FAILURE;
        }

        $files = collect($disk->allFiles($path))
            ->filter(fn($f) => preg_match('/\.(jpe?g|png|webp|avif)$/i', $f));

        if ($files->isEmpty()) {
            $this->warn('No se encontraron imágenes que procesar.');
            return self::SUCCESS;
        }

        $this->info('Encontradas: '.$files->count().' imágenes.');
        foreach ($files as $src) {
            $this->line(" -> $src");
            // Genera usando los defaults del servicio (modifícalos si quieres)
            $svc->ensureVariants($src);
        }

        $this->info('¡Listo!');
        return self::SUCCESS;
    }
}
