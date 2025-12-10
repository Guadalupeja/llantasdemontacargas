<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

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
     * Estructura de vistas: resources/views/pages/<ruta>.blade.php
     * Sustituyendo "/" por "." (ej: "llantas-para-montacargas/trelleborg-ps800-con-arillo" -> "pages.llantas-para-montacargas.trelleborg-ps800-con-arillo")
     */
    public function show(Request $request): View
    {
        // Normaliza la ruta solicitada
        $path = trim($request->path(), '/'); // "" para "/"
        if ($path === '') {
            abort(404);
        }

        // Acepta con o sin "/" final, y case-insensitive
        $normalized = Str::lower($path);

        // Si termina en "/", quítalo
        $normalized = rtrim($normalized, '/');

        // Verifica allow-list (comparación estric­ta)
        if (!in_array($normalized, self::ALLOWED, true)) {
            abort(404);
        }

        // Mapea a la vista "pages.<ruta-con-puntos>"
        $viewName = 'pages.' . str_replace('/', '.', $normalized);

        // Si la vista no existe, usa una plantilla genérica "en construcción"
        if (!view()->exists($viewName)) {
            $viewName = 'pages.__generic';
        }

        // Puedes pasar meta por defecto o dejar que cada vista defina @section('title', ...)
        return view($viewName, [
            'slug' => $normalized,
        ]);
    }
}

