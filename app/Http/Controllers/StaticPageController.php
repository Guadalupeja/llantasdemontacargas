<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class StaticPageController extends Controller
{
    /**
     * ALLOW-LIST: únicamente estas rutas devolverán vista.
     * Las rutas se definen SIN dominio y SIN querystring; se aceptan con o sin “/” final.
     */
    private const ALLOWED = [
        'llantas-para-montacargas-mantenimiento',
        'optimiza-el-rendimiento-de-tu-montacargas-la-importancia-de-elegir-llantas-premium',
        'seleccion-de-llantas-para-montacargas',
        'guia-para-seleccionar-el-rin-perfecto',
        'tipos-de-llantas-para-montacargas-2',
        'blog-2',
        'ventajas-de-cambiar-las-llantas-de-tu-montacargas',
        'rines-para-montacargas-y-cargadores',
        'llantas-para-montacargas/trelleborg-ps800-con-arillo',
        'preguntas-frecuentes',
        'instalacion-de-llantas-montacargas-ruguex',
        'gracias',
        'llantas-de-poliuretano-para-montacargas',
        'llantas-solidas-con-arillo',
        'llantas-solidas',
        'llantas-neumaticas',
        'llantas-para-manipulador-telescopico/th400',
        'llantas-para-manipulador-telescopico/trelleborg-brawler-hps',
        'que-llanta-dura-mas-y-trabaja-mejor',
        'que-llanta-es-mejor-para-mi-montacargas',
        'que-tipos-de-llantas-existen',
        'llantas-para-cargadores/brawler-hd',
        'llantas-para-cargadores/neumatico-c800-l2-otr-2',
        'llantas-para-minicargadores/brawler-hd-solidflex-2',
        'proximamente',
        'header',
        'llantas-para-montacargas/trelleborg-mono-grip-bandaje-press-on',
        'footecito',
        'llantas-para-minicargadores/sk-800',
        'llantas-para-minicargadores/sk-900-2',
        'llantas-para-cargadores/neumatico-c800-l2-otr',
        'llantas-para-minicargadores/sk-900',
        'llantas-para-minicargadores/sks-900-traction-smooth',
        'llantas-para-minicargadores/brawler-hps-solidflex-traction-smooth',
        'llantas-para-minicargadores/brawler-hd-solidflex',
        'llantas-para-montacargas/llanta-de-poliuretano-permathane',
        'llantas-para-montacargas/llanta-de-poliuretano-monothane',
        'llantas-para-montacargas/trelleborg-t-800',
        'llantas-para-montacargas/trelleborg-t-900-neumatica',
        'llantas-para-montacargas/trelleborg-tr-900-neumatica-radial',
        'llantas-para-montacargas/trelleborg-itl-maxmatic-press-on',
        'llantas-para-montacargas/trelleborg-itl-press-on',
        'llantas-para-montacargas/trelleborg-xp800',
        'llantas-para-montacargas/trelleborg-ps1000',
        'llantas-para-montacargas/trelleborg-press-on',
        'llantas-para-montacargas/trelleborg-ecosolid',
        'llantas-para-montacargas/trelleborg-m2',
        'llantas-para-montacargas/trelleborg-pro-hd',
        'llantas-para-montacargas/trelleborg-master-solid',
        'llantas-para-montacargas/trelleborg-premia',
        'llantas-para-montacargas/trelleborg-elite-xp',
        'que-llanta-necesito',
        'llantas-para-manipulador-telescopico',
        'llantas-para-cargadores',
        'llantas-para-minicargadores',
        'llantas-para-montacargas',
        // la home (/) ya la atiendes con welcome
        'service/transportation-distribution',
        'service/oil-gas-exploited',
        'service/manufacture',
        'service/green-energy',
        'service/automotive-manufacturing',
        'portfolio/metal-industry',
        'portfolio/alternative-energy',
        'portfolio/areb-oil-rigs',
        'portfolio/gothia-mining-factory',
        'portfolio/oil-pipeline-project',
        'portfolio/gear-manufacturing',
        'portfolio/warehouse-industry',
        'portfolio/cnf-machine-engineering',
        'portfolio/refurbishing-old-gears',
        'portfolio/wind-power-in-russia',
        'portfolio/water-recycling-pipelines',
        'portfolio/industry-complex',
        'somos',
        'contacto',
        'news',
        'service/industrial-construction',
    ];

    /**
     * Muestra la vista si la ruta está permitida y existe el archivo Blade correspondiente.
     * Si la ruta coincide con el slug de un post publicado, redirige a /blog/{slug}.
     *
     * Estructura de vistas: resources/views/pages/<ruta>.blade.php
     * Sustituyendo "/" por "." (ej: "llantas-para-montacargas/trelleborg-ps800-con-arillo" -> "pages.llantas-para-montacargas.trelleborg-ps800-con-arillo")
     */
    public function show(Request $request): View|Response
    {
        // Normaliza la ruta solicitada
        $path = trim($request->path(), '/');
        if ($path === '') {
            abort(404);
        }

        $normalized = Str::lower(rtrim($path, '/'));

        /**
         * 1) Si existe un post publicado con ese slug, redirige a la URL oficial del blog.
         * Esto permite que /mi-post funcione, pero consolida SEO en /blog/mi-post
         */
        $post = Post::query()
            ->where('slug', $normalized)
            ->where('is_published', true)
            ->first();

        if ($post) {
            return redirect()->route('blog.show', ['post' => $post->slug], 301);
        }

        /**
         * 2) Si no es post, sigue la lógica normal de páginas estáticas
         */
        if (! in_array($normalized, self::ALLOWED, true)) {
            abort(404);
        }

        $viewName = 'pages.' . str_replace('/', '.', $normalized);

        if (! view()->exists($viewName)) {
            $viewName = 'pages.__generic';
        }

        return view($viewName, [
            'slug' => $normalized,
        ]);
    }
}