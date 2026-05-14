@extends('layouts.public')

@section('title', 'Llantas para montacargas y minicargadores mejor calidad 2026')
@section('meta_description', 'Cotiza llantas para montacargas y minicargadores 2026 sólidas, neumáticas, poliuretano, envío GRATIS a la República mexicana, entrega inmediata precio mayorista')

@php
  $toSrcset = static function ($arr) {
      return implode(', ', array_map(static fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  };

  /*
  |--------------------------------------------------------------------------
  | Tamaños reales para imágenes del home
  |--------------------------------------------------------------------------
  | Estas medidas evitan que el navegador descargue originales grandes
  | cuando visualmente las imágenes se muestran pequeñas.
  */
  $categoryImageSizes = '(min-width:1024px) 280px, (min-width:768px) 220px, 160px';
  $secondaryCarouselSizes = '(min-width:1024px) 520px, (min-width:768px) 50vw, 100vw';
  $shopCardSizes = '(min-width:1280px) 390px, (min-width:1024px) 31vw, (min-width:640px) 46vw, 84vw';

  $heroTop = image_variants('originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg');
  $heroTopFallback = $heroTop['fallback']['url'] ?? asset('storage/originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg');
  $heroTopAvif = $heroTop['avif'] ?? null;
  $heroTopWebp = $heroTop['webp'] ?? null;
  $heroTopJpg  = $heroTop['jpg'] ?? null;

  $shopBanner = image_variants('originals/venta-de-llantas-para-montacargas-1.webp');
  $aboutHero  = image_variants('originals/llantas-para-Montacargas-y-Cargadores.jpg');

  $imgMontaSolidas           = image_variants('originals/montacargas-con-llantas-solidas.png');
  $imgLlantaXp800            = image_variants('originals/llanta-solida-xp800.png');
  $imgMontaArillo            = image_variants('originals/montacargas-con-solida-con-arillo.png');
  $imgLlantaPs1000           = image_variants('originals/llanta-ps1000.png');
  $imgMontaNeumatica         = image_variants('originals/llantas-neumaticas-para-montacargas-con-montacargas.png');
  $imgLlantaT900             = image_variants('originals/Montacargas-con-llanta-t900-neumatica.png');
  $imgMontaRadial            = image_variants('originals/montacargas-con-llantas-neumaticas-radiales.png');
  $imgLlantaRadial           = image_variants('originals/TR-900-NEUMATICA-RADIAL.jpg');

  $carousel1 = image_variants('originals/MOSAICO-PS-1000.png');
  $carousel2 = image_variants('originals/Llanta-neumatica-reforzada.jpg');
  $carousel3 = image_variants('originals/Llanta-solida-con-arillo.jpg');
  $carousel4 = image_variants('originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg');

  $ctaHeroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $ctaHeroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $ctaHeroAvif960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $ctaHeroWebp960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
  $ctaHeroJpg      = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');



$shopCarouselItems = collect([
    [
        'measure' => '6.50-10 / 5.00',
        'title' => 'Llanta Sólida para Montacargas 6.50-10/5.00 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$7,800.68 MXN',
        'image_path' => 'home/shop/650-10-500.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-6-50-10-5-00-trabajo-extra-pesado/',
    ],
    [
        'measure' => '6.00-9 / 4.00',
        'title' => 'Llanta Sólida para Montacargas 6.00-9/4.00 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$5,517.20 MXN',
        'image_path' => 'home/shop/600-9-400.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-6-00-9-4-00-trabajo-extra-pesado/',
    ],
    [
        'measure' => '6.00x9',
        'title' => 'Llanta 6.00x9 Neumática para Montacargas Trabajo Medio',
        'promo' => 'Trabajo medio',
        'price' => '$2,354.39 MXN',
        'image_path' => 'home/shop/600x9-neumatica.jpg',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-6-00x9-neumatica-para-montacargas-trabajo-medio/',
    ],
    [
        'measure' => '300-15 / 8.00',
        'title' => 'Llanta Sólida para Montacargas 300-15/8.00 Trabajo Medio',
        'promo' => 'Trabajo medio',
        'price' => '$19,076.20 MXN',
        'image_path' => 'home/shop/300-15-800.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-300-15-8-00-trabajo-medio/',
    ],
    [
        'measure' => '300-15 / 8.00',
        'title' => 'Llanta Sólida para Montacargas 300-15/8.00 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$27,756.22 MXN',
        'image_path' => 'home/shop/300-15-800-extra.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-300-15-8-00-trabajo-extra-pesado/',
    ],
    [
        'measure' => '28x9-15 / 7.00',
        'title' => 'Llanta Sólida para Montacargas 28x9-15/7.00 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$15,672.27 MXN',
        'image_path' => 'home/shop/28x9-15-700.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-28x9-15-7-00-trabajo-extra-pesado/',
    ],
    [
        'measure' => '250-15 / 7.00',
        'title' => 'Llanta Sólida para Montacargas 250-15/7.00 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$18,437.96 MXN',
        'image_path' => 'home/shop/250-15-700.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-250-15-7-00-trabajo-extra-pesado/',
    ],
    [
        'measure' => '250-15 / 7.50',
        'title' => 'Llanta Sólida para Montacargas 250-15/7.50 Trabajo Extra Pesado',
        'promo' => 'Trabajo extra pesado',
        'price' => '$21,217.84 MXN',
        'image_path' => 'home/shop/250-15-750.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-250-15-7-50-trabajo-extra-pesado/',
    ],
    [
        'measure' => '21x7x15',
        'title' => 'Llanta Sólida para Montacargas 21x7x15 Trabajo Medio Lisa',
        'promo' => 'Alta demanda',
        'price' => '$4,822.24 MXN',
        'image_path' => 'home/shop/21x7x15.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-21x7x15-trabajo-medio-lisa/',
    ],
    [
        'measure' => '8.25-15 / 6.50',
        'title' => 'Llanta Sólida para Montacargas 8.25-15/6.50 Trabajo Medio',
        'promo' => 'Alta demanda',
        'price' => '$15,331.87 MXN',
        'image_path' => 'home/shop/825-15-650.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-8-25-15-6-50-trabajo-medio/',
    ],
    [
        'measure' => '16x6x10 1/2',
        'title' => 'Llanta Sólida para Montacargas 16x6x10 1/2 Trabajo Medio Lisa',
        'promo' => 'Uso industrial',
        'price' => '$2,751.51 MXN',
        'image_path' => 'home/shop/16x6x10-5.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-16x6x10-1-2-trabajo-medio-lisa/',
    ],
    [
        'measure' => '15x4 1/2-8 / 3.00',
        'title' => 'Llanta Sólida para Montacargas 15x4 1/2-8/3.00 Trabajo Medio',
        'promo' => 'Uso industrial',
        'price' => '$2,510.40 MXN',
        'image_path' => 'home/shop/15x4-5-8-300.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-15x4-1-2-8-3-00-trabajo-medio/',
    ],
    [
        'measure' => '18x7x12 1/8',
        'title' => 'Llanta Sólida para Montacargas 18x7x12 1/8 Trabajo Pesado Lisa',
        'promo' => 'Trabajo intensivo',
        'price' => '$5,006.62 MXN',
        'image_path' => 'home/shop/18x7x12-1-8.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-18x7x12-1-8-trabajo-pesado-lisa/',
    ],
    [
        'measure' => '23x9-10 / 6.50',
        'title' => 'Llanta Sólida para Montacargas 23x9-10/6.50 Trabajo Extra Pesado',
        'promo' => 'Trabajo intensivo',
        'price' => '$14,211.41 MXN',
        'image_path' => 'home/shop/23x9-10-650.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-23x9-10-6-50-trabajo-extra-pesado/',
    ],
    [
        'measure' => '12.00-20 / 10.00',
        'title' => 'Llanta Sólida para Montacargas 12.00-20/10.00 Trabajo Extra Pesado',
        'promo' => 'Gran capacidad',
        'price' => '$60,334.68 MXN',
        'image_path' => 'home/shop/12-00-20-10-00.png',
        'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-montacargas-12-00-20-10-00-trabajo-extra-pesado/',
    ],
]);


@endphp

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Precarga LCP real del home --}}
  <link
    rel="preload"
    as="image"
    href="{{ $heroTopFallback }}"
    imagesizes="(min-width:300px) 1000px, 100vw"
    @if($heroTopAvif)
      imagesrcset="{{ $toSrcset($heroTopAvif) }}"
    @elseif($heroTopWebp)
      imagesrcset="{{ $toSrcset($heroTopWebp) }}"
    @elseif($heroTopJpg)
      imagesrcset="{{ $toSrcset($heroTopJpg) }}"
    @endif
    fetchpriority="high"
  >

 
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}#webpage",
        "url": "{{ url()->current() }}",
        "name": "@yield('title')",
        "inLanguage": "es-MX",
        "description": "@yield('meta_description')",
        "isPartOf": { "@id": "{{ url('/') }}#website" },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg') }}",
          "width": 1000,
          "height": 300
        },
        "about": [
          { "@type": "Thing", "name": "Llantas para montacargas" },
          { "@type": "Thing", "name": "Llantas para minicargadores" },
          { "@type": "Thing", "name": "Llantas industriales Trelleborg" }
        ],
        "potentialAction": {
          "@type": "Action",
          "name": "Cotizar llantas",
          "target": "{{ url('/#T7') }}"
        }
      },
      {
        "@type": "Organization",
        "@id": "{{ url('/') }}#organization",
        "name": "BSH · Bombas Sellos y Hules Industriales S.A. de C.V. (RUGUEX Llantas Industriales)",
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png') }}"
        },
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "contactPoint": [{
          "@type": "ContactPoint",
          "contactType": "ventas",
          "email": "bsh@bombasellos.com.mx",
          "telephone": "+52-55-5752-1715",
          "areaServed": "MX",
          "availableLanguage": ["es"]
        },{
          "@type": "ContactPoint",
          "contactType": "ventas",
          "telephone": "+52-22-2227-3866",
          "areaServed": "MX",
          "availableLanguage": ["es"]
        }],
        "foundingDate": "2010",
        "slogan": "Llantas Premium para manejo de materiales con 25% más desempeño garantizado",
        "description": "Comercializadora mexicana de equipos y refacciones industriales. Distribuidores autorizados de llantas Trelleborg para montacargas, minicargadores, cargadores y manipuladores, con entrega inmediata, crédito y asistencia técnica."
      },
      {
        "@type": "OfferCatalog",
        "@id": "{{ url('/') }}#catalog",
        "name": "Catálogo de llantas industriales Trelleborg",
        "url": "{{ url('/') }}",
        "itemListElement": [
          {
            "@type": "OfferCatalog",
            "name": "Llantas para Montacargas",
            "url": "{{ url('/llantas-para-montacargas') }}",
            "itemListElement": [
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas sólidas para montacargas", "brand": "Trelleborg" } },
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas neumáticas para montacargas", "brand": "Trelleborg" } },
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas de poliuretano para montacargas", "brand": "Trelleborg" } }
            ]
          },
          {
            "@type": "OfferCatalog",
            "name": "Llantas para Minicargadores",
            "url": "{{ url('/llantas-para-minicargadores') }}",
            "itemListElement": [
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Brawler HD SolidFlex", "brand": "Trelleborg" } },
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas sólidas para minicargador", "brand": "Trelleborg" } }
            ]
          },
          {
            "@type": "OfferCatalog",
            "name": "Llantas para Cargadores",
            "url": "{{ url('/llantas-para-cargadores') }}",
            "itemListElement": [
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas para cargador frontal", "brand": "Trelleborg" } }
            ]
          },
          {
            "@type": "OfferCatalog",
            "name": "Llantas para Manipuladores Telescópicos",
            "url": "{{ url('/llantas-para-manipulador-telescopico') }}",
            "itemListElement": [
              { "@type": "Offer", "itemOffered": { "@type": "Product", "name": "Llantas para manipulador telescópico", "brand": "Trelleborg" } }
            ]
          }
        ],
        "provider": { "@id": "{{ url('/') }}#organization" }
      },
      {
        "@type": "ItemList",
        "name": "Tabla de contenido",
        "itemListOrder": "http://schema.org/ItemListOrderAscending",
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "url": "{{ url('/llantas-para-montacargas') }}" },
          { "@type": "ListItem", "position": 2, "url": "{{ url('/llantas-para-minicargadores') }}" },
          { "@type": "ListItem", "position": 3, "url": "{{ url('/tienda-en-linea') }}" },
          { "@type": "ListItem", "position": 4, "url": "{{ url('/llantas-para-cargadores') }}" },
          { "@type": "ListItem", "position": 5, "url": "{{ url('/llantas-para-manipulador-telescopico') }}" },
          { "@type": "ListItem", "position": 6, "url": "{{ url('/instalacion-de-llantas-montacargas-ruguex') }}" },
          { "@type": "ListItem", "position": 7, "url": "{{ url('/#T7') }}" }
        ]
      },
      {
        "@type": "Service",
        "name": "Instalación de llantas gratis en la compra",
        "serviceType": "Instalación de llantas industriales",
        "provider": { "@id": "{{ url('/') }}#organization" },
        "areaServed": "MX",
        "offers": {
          "@type": "Offer",
          "url": "{{ url('/instalacion-de-llantas-montacargas-ruguex') }}",
          "priceCurrency": "MXN",
          "price": "0",
          "category": "Servicio incluido con compra",
          "eligibleRegion": "MX"
        },
        "description": "Instalación sin costo al comprar cualquier llanta. Cobertura nacional, entrega inmediata y asistencia técnica."
      },
      {
        "@type": "Brand",
        "name": "Trelleborg",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg') }}"
        },
        "url": "https://www.trelleborg.com/"
      },
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Llantas para Montacargas y Minicargadores · RUGUEX",
        "inLanguage": "es-MX",
        "publisher": { "@id": "{{ url('/') }}#organization" }
      }
    ]
  }
  </script>
@endsection

@section('content')

<section class="relative bg-black transition-colors">
  <div class="relative mx-auto flex max-w-[1140px] flex-col gap-6 md:flex-row md:items-start">
<nav aria-label="Elige cómo te ayudamos" class="hidden md:block w-full md:w-1/2">
  <div class="flex w-full flex-wrap content-start p-2.5">
    <div class="mx-[24px] w-full lg:mx-[36px]">
      <div class="overflow-hidden rounded-[22px] border border-white/10 bg-gradient-to-br from-[#111111] via-[#0b0b0b] to-[#070707] shadow-[0_18px_60px_rgba(0,0,0,0.4)]">
        <div class="border-b border-white/10 px-5 py-4">
          <button
            type="button"
            class="flex w-full items-center gap-3 text-left font-roboto"
            aria-expanded="true"
            aria-controls="toc-panel"
            id="toc-button"
          >
            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#e76a3e]/15 text-[#e76a3e] text-sm" aria-hidden="true">
              ▾
            </span>

            <div>
              <p class="text-[10px] font-semibold uppercase tracking-[0.24em] text-[#e76a3e]">
                Compra mejor
              </p>
              <h2 class="mt-1 text-[18px] font-semibold leading-5 text-white">
                Elige cómo te ayudamos
              </h2>
            </div>
          </button>
        </div>

        <div
          id="toc-panel"
          role="region"
          aria-labelledby="toc-button"
          class="px-5 py-4 font-roboto text-white"
        >
          <p class="mb-3 text-[13px] leading-5 text-white/70">
            Compra más rápido y aprovecha nuestros beneficios.
          </p>

          <div class="overflow-hidden rounded-[16px] border border-white/10 bg-white/[0.02]">
            <a
              href="{{ url('/llantas-para-montacargas') }}"
              class="group flex items-center gap-3 px-4 py-3 transition hover:bg-white/[0.05]"
            >
              <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#e76a3e] text-xs font-bold text-white">1</span>
              <span class="text-[15px] leading-6 text-white transition group-hover:text-[#ff8a5f]">
                Explora nuestras llantas para montacargas
              </span>
            </a>

            <div class="h-px bg-white/10"></div>

            <a
              href="https://llantasdemontacargas.com/tienda-en-linea"
              target="_blank"
              rel="noopener"
              class="group flex items-center gap-3 px-4 py-3 transition hover:bg-white/[0.05]"
            >
              <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#e76a3e] text-xs font-bold text-white">2</span>
              <span class="text-[15px] leading-6 text-white transition group-hover:text-[#ff8a5f]">
                Compra en línea con entrega a todo México
              </span>
            </a>

            <div class="h-px bg-white/10"></div>

            <a
              href="{{ url('/instalacion-de-llantas-montacargas-ruguex') }}"
              target="_blank"
              rel="noopener"
              class="group flex items-center gap-3 px-4 py-3 transition hover:bg-white/[0.05]"
            >
              <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#e76a3e] text-xs font-bold text-white">3</span>
              <span class="text-[15px] leading-6 text-white transition group-hover:text-[#ff8a5f]">
                Aprovecha instalación gratis en tu compra
              </span>
            </a>

            <div class="h-px bg-white/10"></div>

            <a
              href="#T7"
              class="group flex items-center gap-3 px-4 py-3 transition hover:bg-white/[0.05]"
            >
              <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#e76a3e] text-xs font-bold text-white">4</span>
              <span class="text-[15px] leading-6 text-white transition group-hover:text-[#ff8a5f]">
                Solicita tu cotización hoy mismo
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>



    <div class="relative w-full md:w-[52%]">
      <div class="flex w-full flex-wrap content-start p-2.5">
        <x-responsive-image
          :variants="$heroTop"
          alt="Llantas para montacargas y minicargadores Trelleborg"
          sizes="(min-width:300px) 1000px, 100vw"
          class="inline-block border-0"
          width="500"
          height="300"
          fetchpriority="high"
          loading="eager"
        />

        <div class="absolute left-[-8px] top-[141px] z-0 w-full text-center">
          <a
            href="#T7"
            class="inline-block rounded-[6px] bg-[#e76a3e] px-[50px] py-[25px] text-[25px] leading-[20px] font-medium text-white transition"
          >
            <span class="flex justify-center"><span class="block">Cotiza Ahora </span></span>
          </a>
        </div>

        <div class="w-full max-w-[100.558%]">
          <div class="m-0 bg-black p-2.5 text-center">
            <h1 class="m-0 font-roboto text-[25px] lg:text-[35px] leading-[35px] font-semibold text-white [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
              <a href="{{ url('/llantas-para-montacargas') }}" class="text-white transition">
                Llantas para Montacargas
              </a>
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section
    id="featured-products-carousel-section"
    class="relative left-1/2 right-1/2 w-screen -translate-x-1/2 overflow-hidden bg-black py-5 lg:py-7"
>
    <div class="mx-auto max-w-[1680px] px-4 sm:px-6 lg:px-10">
        <div class="rounded-[32px] border border-white/10 bg-[#0b0b0b] px-4 py-6 shadow-[0_20px_80px_rgba(0,0,0,0.35)] sm:px-6 sm:py-8 lg:px-8 lg:py-10">
            <div class="mb-8 flex flex-col gap-5 lg:mb-10 md:flex-row md:items-end md:justify-between">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#EB6D3F]">
                        Compra en línea
                    </p>

                    <h2 class="mt-3 text-3xl font-extrabold leading-tight text-white md:text-4xl xl:text-5xl">
                        Productos destacados para montacargas
                    </h2>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-white/70 md:text-base">
                        Explora algunas de las medidas con mayor demanda y presencia comercial en nuestra tienda en línea.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" id="shop-carousel-prev"
                        class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:border-white/30 hover:bg-white/10">
                        <span class="sr-only">Anterior</span>
                        &#10094;
                    </button>

                    <button type="button" id="shop-carousel-next"
                        class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:border-white/30 hover:bg-white/10">
                        <span class="sr-only">Siguiente</span>
                        &#10095;
                    </button>

                    <a href="https://llantasdemontacargas.com/tienda-en-linea/"
                        class="inline-flex items-center justify-center rounded-full bg-[#EB6D3F] px-5 py-3 text-sm font-semibold text-white transition hover:opacity-90">
                        Ver toda la tienda
                    </a>
                </div>
            </div>

            <div class="relative">
                <div id="shop-carousel"
                    class="flex gap-6 overflow-x-auto scroll-smooth px-1 pb-3 pt-1 sm:px-1 lg:px-2 [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">
                    @foreach ($shopCarouselItems as $item)
                        <a href="{{ $item['url'] }}"
                            class="group min-w-[84%] sm:min-w-[46%] lg:min-w-[31%] xl:min-w-[23.2%] overflow-hidden rounded-[30px] border border-black/5 bg-white shadow-[0_12px_40px_rgba(0,0,0,0.22)] transition duration-300 hover:-translate-y-1.5 hover:shadow-[0_24px_60px_rgba(0,0,0,0.30)]">
                            <div class="relative aspect-[4/3] overflow-hidden bg-[#f4f4f4]">
                                @php
                                    $imageInfo = pathinfo($item['image_path']);
                                    $imageDir = $imageInfo['dirname'];
                                    $imageName = $imageInfo['filename'];

                                    $shopWebp280 = "img/{$imageDir}/optimized/{$imageName}-280.webp";
                                    $shopWebp360 = "img/{$imageDir}/optimized/{$imageName}-360.webp";
                                    $shopWebp480 = "img/{$imageDir}/optimized/{$imageName}-480.webp";
                                    $shopWebp640 = "img/{$imageDir}/optimized/{$imageName}-640.webp";

                                    $shopWebpSources = collect([
                                        ['path' => $shopWebp280, 'w' => 280],
                                        ['path' => $shopWebp360, 'w' => 360],
                                        ['path' => $shopWebp480, 'w' => 480],
                                        ['path' => $shopWebp640, 'w' => 640],
                                    ])->filter(fn ($source) => file_exists(public_path($source['path'])));
                                @endphp

                                <picture>
                                    @if($shopWebpSources->isNotEmpty())
                                        <source
                                            type="image/webp"
                                            srcset="{{ $shopWebpSources->map(fn ($source) => asset($source['path']).' '.$source['w'].'w')->implode(', ') }}"
                                            sizes="{{ $shopCardSizes }}"
                                        >
                                    @endif

                                    <img
                                        src="{{ asset('img/' . $item['image_path']) }}"
                                        alt="{{ $item['title'] }} {{ $item['measure'] }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy"
                                        decoding="async"
                                        width="640"
                                        height="480"
                                    >
                                </picture>

                                <span class="absolute left-4 top-4 rounded-full bg-[#EB6D3F] px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.08em] text-white shadow">
                                    {{ $item['promo'] }}
                                </span>
                            </div>

                            <div class="flex min-h-[220px] flex-col p-6">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-500">
                                    {{ $item['measure'] }}
                                </p>

                                <h3 class="mt-3 line-clamp-3 text-lg font-extrabold leading-6 text-slate-900 lg:text-[22px] lg:leading-7">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="mt-4 text-xl font-extrabold text-[#EB6D3F] lg:text-2xl">
                                    {{ $item['price'] }}
                                </p>

                                <span class="mt-auto pt-5 inline-flex items-center text-sm font-semibold text-slate-900">
                                    Ver producto
                                    <svg class="ml-2 h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h9.586L10.293 5.707a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L13.586 11H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>




<div class="relative mx-auto flex flex-col md:flex-row min-h-[400px] items-center bg-[#e76a3e] ">
  <div class="relative flex min-h-px basis-[50.468%]">
    <div class="relative flex w-full flex-wrap items-center content-center">
      <div class="relative w-full text-center">
        <span class="relative z-[1] inline-block">
          <span class="inline-table text-[25px] lg:text-[35px] font-black text-black">
            <span>25% más </span>
            <span class="mx-[10px] mt-[50px] inline-block text-center [perspective:400px]" aria-live="polite">
              <span id="word-rotator" class="inline-block w-[10ch] will-change-transform">Desempeño</span>
            </span>
            <span><br />GARANTIZADO. </span>
          </span>
        </span>
      </div>
    </div>
  </div>

  <div class="relative flex min-h-px basis-[49.532%]">
    <div class="relative flex w-full flex-wrap content-start bg-black">
      <section class="relative block w-full">
        <div class="relative mx-auto flex max-w-[1140px]">
          <div class="relative flex min-h-px basis-full">
            <div class="relative m-[5px] w-full flex-wrap content-start border-[3px] border-white border-double p-[10px]">
              <div class="relative mb-[20px] w-full">
                <div class="h-[30px]"></div>
              </div>

              <div class="relative mb-[20px] w-full text-center">
                <h2 class="m-0 p-0 text-[25px] lg:text-[35px] font-semibold leading-[35px] text-white">
                  Instalación de llantas gratis en la compra de cualquier llanta
                </h2>
              </div>

              <div class="relative w-full text-center">
                <a
                  href="{{ url('/instalacion-de-llantas-montacargas-ruguex') }}"
                  class="inline-block rounded-[3px] bg-white px-[24px] py-[12px] text-[15px] font-medium leading-[15px] text-black no-underline transition"
                >
                  <span class="flex justify-center">
                    <span class="order-5 mr-[5px] flex-grow-0">
                      <i class="fa-solid fa-arrow-right inline-block leading-[15px]" aria-hidden="true"></i>
                    </span>
                    <span class="order-10 block flex-grow">Solicita ahora</span>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<section class="relative w-full">
  <div class="flex w-full max-w-auto flex-col md:flex-row">
    <div class="relative w-full md:w-1/2">
      <div class="relative flex w-full flex-wrap content-start">
        <div class="relative mb-[20px] w-full text-center">
          <div class="bg-black p-[10px]">
            <h2 class="m-0 p-0 text-[25px] lg:text-[39px] font-semibold leading-[39px] text-white">
              Llantas Sólidas
            </h2>
          </div>
        </div>

        <section class="relative my-[13px] w-full bg-transparent lg:p-8">
          <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">
            <article class="flex flex-col rounded-none">
              <div class="w-full overflow-hidden rounded-none">
                <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square bg-transparent">
                  <x-responsive-image
                    :variants="$imgMontaSolidas"
                    alt="Montacargas"
                    :sizes="$categoryImageSizes"
                    class="h-full w-full object-contain"
                    width="280" height="280"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col rounded-none">
              <a href="{{ url('/llantas-solidas') }}" class="block no-underline">
                <div class="w-full overflow-hidden rounded-none">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaXp800"
                      alt="Llantas sólidas para Montacargas Trelleborg"
                      :sizes="$categoryImageSizes"
                      class="h-full w-full object-contain"
                      width="280" height="280"
                      loading="lazy"
                    />
                  </div>
                </div>
              </a>
            </article>

            <article class="flex flex-col justify-center">
              <div class="w-full">
                <a
                  href="{{ url('/llantas-solidas') }}"
                  target="_blank"
                  class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
                >
                  Sólidas para montacargas
                </a>
              </div>
            </article>
          </div>
        </section>

        <section class="relative w-full bg-transparent lg:p-8">
          <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">
            <article class="flex flex-col">
              <div class="w-full overflow-hidden">
                <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                  <x-responsive-image
                    :variants="$imgMontaArillo"
                    alt="Llantas sólidas para minicargadores Brawler"
                    :sizes="$categoryImageSizes"
                    class="h-full w-full object-contain"
                    width="280" height="280"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col">
              <a href="{{ url('/llantas-solidas-con-arillo') }}" class="block no-underline">
                <div class="w-full overflow-hidden">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaPs1000"
                      alt="Llantas solidas con arillo"
                      :sizes="$categoryImageSizes"
                      class="h-full w-full object-contain"
                      width="280" height="280"
                      loading="lazy"
                    />
                  </div>
                </div>
              </a>
            </article>

            <article class="flex flex-col justify-center">
              <div class="w-full">
                <a
                  href="{{ url('/llantas-solidas-con-arillo') }}"
                  target="_blank"
                  class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
                >
                  Sólidas con arillo
                </a>
              </div>
            </article>
          </div>
        </section>
      </div>
    </div>

    <div class="relative w-full md:w-1/2">
      <div class="relative flex w-full flex-wrap content-start">
        <div class="relative mb-[20px] w-full text-center">
          <div class="bg-black p-[10px]">
            <h2 class="m-0 p-0 text-[25px] lg:text-[39px] font-semibold leading-[39px] text-white">
              Llantas Neumáticas
            </h2>
          </div>
        </div>

        <section class="relative my-[13px] w-full bg-transparent lg:p-8">
          <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">
            <article class="flex flex-col rounded-none">
              <div class="w-full overflow-hidden rounded-none">
                <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square bg-transparent">
                  <x-responsive-image
                    :variants="$imgMontaNeumatica"
                    alt="Montacargas"
                    :sizes="$categoryImageSizes"
                    class="h-full w-full object-contain"
                    width="280" height="280"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col rounded-none">
              <a href="{{ url('/llantas-neumaticas') }}" class="block no-underline">
                <div class="w-full overflow-hidden rounded-none">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaT900"
                      alt="Llantas sólidas para Montacargas Trelleborg"
                      :sizes="$categoryImageSizes"
                      class="h-full w-full object-contain"
                      width="280" height="280"
                      loading="lazy"
                    />
                  </div>
                </div>
              </a>
            </article>

            <article class="flex flex-col justify-center">
              <div class="w-full">
                <a
                  href="{{ url('/llantas-neumaticas') }}"
                  target="_blank"
                  class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
                >
                  Neumáticas para montacargas
                </a>
              </div>
            </article>
          </div>
        </section>

        <section class="relative w-full bg-transparent lg:p-8">
          <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">
            <article class="flex flex-col">
              <div class="w-full overflow-hidden">
                <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                  <x-responsive-image
                    :variants="$imgMontaRadial"
                    alt="Llantas sólidas para minicargadores Brawler"
                    :sizes="$categoryImageSizes"
                    class="h-full w-full object-contain"
                    width="280" height="280"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col">
              <a href="{{ url('/llantas-neumaticas') }}" class="block no-underline">
                <div class="w-full overflow-hidden">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaRadial"
                      alt="Llanta sólida rellena para minicargador Brawler HD SolidFlex"
                      :sizes="$categoryImageSizes"
                      class="h-full w-full object-contain"
                      width="280" height="280"
                      loading="lazy"
                    />
                  </div>
                </div>
              </a>
            </article>

            <article class="flex flex-col justify-center">
              <div class="w-full">
                <a
                  href="{{ url('/llantas-neumaticas') }}"
                  target="_blank"
                  class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
                >
                  Neumáticas Radiales
                </a>
              </div>
            </article>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>

<div class="relative box-border flex w-full flex-wrap content-start p-[10px] bg-black">
  <div class="relative order-0 box-border w-full">
    <p class="lg:py-10 text-center font-normal text-white lg:text-[44px] text-[24px] lg:leading-[44px] font-sans">
      Distribuidores autorizados de la marca Trelleborg
    </p>
  </div>
</div>

<section class="relative block box-border py-[30px] lg:py-[110px]">
  <div class="relative mx-auto box-border flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-[10px]">
        <div class="order-0 mb-[20px] w-full">
          <p class="m-0 p-0 text-[28px] font-normal text-[#e76a3e]">
            <strong class="font-semibold">Descubre como mejorar el desempeño de tu equipo:</strong>
          </p>
        </div>

        <div class="order-0 mb-[20px] w-full">
          <p class="m-0 text-[25px] font-semibold text-black lg:text-[45px] lg:leading-[54px]">
            Llantas Premium hechas para rendir en cualquier aplicación e Industria.
          </p>
        </div>

        <section class="relative w-full">
          <div id="carousel-products"
               class="relative mx-auto w-full overflow-hidden"
               aria-roledescription="carousel"
               aria-label="Productos"
               data-items-mobile="1"
               data-items-desktop="2"
               data-loop="true"
               data-autoplay="5000"
               data-pause-on-hover="true">

            <div class="flex w-full gap-x-4 transition-transform duration-500 ease-out will-change-transform"
                 data-carousel-track>
              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2" role="group" aria-roledescription="slide" aria-label="1 de 4">
                <figure class="m-0">
                  <x-responsive-image
                    :variants="$carousel1"
                    alt="Llantas Sólidas para Montacargas"
                    :sizes="$secondaryCarouselSizes"
                    class="mx-auto inline-block h-auto max-h-[340px] w-auto align-middle"
                    loading="lazy"
                    width="357" height="357"
                  />
                  <figcaption class="mt-1 text-center text-[22px] font-semibold text-[#e76a3e]">
                    Llantas Sólidas para Montacargas
                  </figcaption>
                </figure>
              </article>

              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2" role="group" aria-roledescription="slide" aria-label="2 de 4">
                <figure class="m-0">
                  <x-responsive-image
                    :variants="$carousel2"
                    alt="Llanta neumática Trelleborg T-900 uso pesado en montacargas"
                    :sizes="$secondaryCarouselSizes"
                    class="mx-auto inline-block h-auto max-h-[340px] w-auto align-middle"
                    loading="lazy"
                    width="357" height="357"
                  />
                  <figcaption class="mt-1 text-center text-[22px] font-semibold text-[#e76a3e]">
                    Llantas Neumáticas
                  </figcaption>
                </figure>
              </article>

              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2" role="group" aria-roledescription="slide" aria-label="3 de 4">
                <figure class="m-0">
                  <x-responsive-image
                    :variants="$carousel3"
                    alt="Llanta sólida con arillo tipo cushion Trelleborg Mono"
                    :sizes="$secondaryCarouselSizes"
                    class="mx-auto inline-block h-auto max-h-[340px] w-auto align-middle"
                    loading="lazy"
                    width="357" height="357"
                  />
                  <figcaption class="mt-1 text-center text-[22px] font-semibold text-[#e76a3e]">
                    Sólidas con Arillo
                  </figcaption>
                </figure>
              </article>

              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2" role="group" aria-roledescription="slide" aria-label="4 de 4">
                <figure class="m-0">
                  <x-responsive-image
                    :variants="$carousel4"
                    alt="Llantas de poliuretano para montacargas"
                    :sizes="$secondaryCarouselSizes"
                    class="mx-auto inline-block h-auto max-h-[340px] w-auto align-middle"
                    loading="lazy"
                    width="357" height="357"
                  />
                  <figcaption class="mt-1 text-center text-[22px] font-semibold text-[#e76a3e]">
                    Llantas de Poliuretano
                  </figcaption>
                </figure>
              </article>
            </div>

            <div class="pointer-events-none absolute inset-0 z-20 flex items-center justify-between">
              <button type="button" aria-label="Anterior"
                      class="pointer-events-auto ml-2 rounded-full bg-black/40 p-2 text-white backdrop-blur hover:bg-black/60 focus:outline-none focus:ring-2 focus:ring-white"
                      data-carousel-prev>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                  <path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
              <button type="button" aria-label="Siguiente"
                      class="pointer-events-auto mr-2 rounded-full bg-black/40 p-2 text-white backdrop-blur hover:bg-black/60 focus:outline-none focus:ring-2 focus:ring-white"
                      data-carousel-next>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                  <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>

            <div class="pointer-events-none bottom-2 mt-6 left-0 right-0 z-20 flex items-center justify-center">
              <div class="pointer-events-auto flex items-center gap-2" data-carousel-dots></div>
            </div>

            <span aria-live="polite" aria-atomic="true" class="sr-only" data-carousel-status></span>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>

<section class="relative">
  <div class="mx-auto grid max-w-auto grid-cols-1 md:grid-cols-2">
    <div class="relative flex w-full flex-wrap content-center items-center overflow-hidden bg-black/10 md:min-h-[520px] lg:min-h-[904.781px]">
      <div class="absolute inset-0 -z-10">
        <x-responsive-image
          :variants="$aboutHero"
          alt=""
          sizes="(min-width:1024px) 50vw, 100vw"
          class="h-full w-full object-cover object-center"
          loading="lazy"
        />
      </div>
    </div>

<div class="relative w-full md:min-h-[520px] lg:min-h-[904.781px]">
  <div class="absolute inset-0 bg-black"></div>

  <div class="relative z-[1] flex h-full w-full flex-col justify-center gap-4 p-5 text-white lg:p-20">
    <p class="mb-5">
      <span class="font-semibold text-[#e76a3e]">NOSOTROS</span>
    </p>

    <h2 class="m-0 text-justify text-[22px] font-medium leading-[22px]">
      Distribuidores a todo el país: Monterrey, Querétaro, Etc.
    </h2>

    <p class="mb-5">
      <strong class="text-white text-[25px] lg:text-[35px]">
        Compra a crédito, con entrega inmediata y Garantías. Las mejores Llantas para el manejo de materiales en la Industria.
      </strong>
    </p>

    <span class="text-justify">
      Distribuidor Autorizado de la marca Trelleborg. Soluciones para Montacargas, Cargadores, Manipuladores y maquinaria de Construcción. Trelleborg fabrica las llantas de alta gama más resistentes y duraderas para aplicaciones demandantes. Ofrecemos los precios más bajos, entrega inmediata, crédito y asesoría técnica en la selección e instalación.
    </span>

    <div class="mt-4 space-y-3">
      <div class="rounded-lg border border-white/10 bg-white/5 p-4">
        <h3 class="m-0 text-[18px] font-semibold text-white">
          Matriz Puebla
        </h3>

        <p class="mt-2 text-[14px] leading-6 text-white/80">
          Atención comercial y técnica para selección, cotización y seguimiento de llantas para montacargas.
          Matriz en Puebla.
        </p>
      </div>

      <div class="rounded-lg border border-white/10 bg-white/5 p-4">
        <h3 class="m-0 text-[18px] font-semibold text-white">
          Almacenes con entrega y montaje
        </h3>

        <ul class="mt-3 grid grid-cols-2 gap-x-4 gap-y-2 text-[14px] text-white/85">
          <li>ESTADO DE MEXICO</li>
          <li>PUEBLA</li>
          <li>GUANAJUATO</li>
          <li>NUEVO LEÓN</li>
          <li>SAN LUIS POTOSÍ</li>
          <li>JALISCO</li>
          <li>AGUASCALIENTES</li>
        </ul>

        <p class="mt-3 text-[14px] leading-6 text-white/80">
          Consulta stock y disponibilidad de prensa para montaje.
        </p>
      </div>
    </div>

    <div class="mt-4">
      <a
        href="{{ url('/somos') }}"
        class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white transition"
      >
        <span class="flex justify-center"><span class="block">CONOCER MÁS</span></span>
      </a>
    </div>
  </div>
</div>
  </div>
</section>

<section
  id="T7"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $ctaHeroJpg }}');
    background-image:image-set(
      url('{{ $ctaHeroAvif1024 }}') type('image/avif') 1x,
      url('{{ $ctaHeroWebp1024 }}') type('image/webp') 1x,
      url('{{ $ctaHeroJpg }}') type('image/jpeg') 1x
    );
  "
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 w-full mb-5">
          <div data-hs-forms-root="true" id="hs-form-home">
            <noscript>
              <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
            </noscript>
          </div>
        </div>

        <div class="w-full"><div class="h-[104px]"></div></div>
      </div>
    </div>
  </div>
</section>

<style>
  @media (max-width: 768px) {
    #T7{
      background-image: url('{{ $ctaHeroJpg }}');
      background-image: image-set(
        url('{{ $ctaHeroAvif960 }}') type('image/avif') 1x,
        url('{{ $ctaHeroWebp960 }}') type('image/webp') 1x,
        url('{{ $ctaHeroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>

@push('scripts')
<script>
  (function () {
    const btn = document.getElementById('toc-button');
    const panel = document.getElementById('toc-panel');
    if (!btn || !panel) return;

    const caret = btn.querySelector('[aria-hidden="true"]');

    function toggle() {
      const open = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!open));
      panel.hidden = open;

      if (caret) {
        caret.textContent = open ? '▸' : '▾';
      }
    }

    btn.addEventListener('click', toggle);
    btn.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        toggle();
      }
    });
  })();

  (function () {
    const el = document.getElementById('word-rotator');
    if (!el) return;

    const words = ['Desempeño', 'Vida', 'Ciclos'];
    let i = 0;
    let timer = null;
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function showNext() {
      el.classList.add('opacity-0', 'translate-y-2', 'transition', 'duration-300', 'ease-out');

      setTimeout(function () {
        i = (i + 1) % words.length;
        el.textContent = words[i];

        el.classList.remove('translate-y-2');
        el.classList.add('-translate-y-2');

        void el.offsetHeight;

        el.classList.remove('opacity-0');
        el.classList.remove('-translate-y-2');
      }, 300);
    }

    function start() {
      if (prefersReduced || timer) return;
      timer = setInterval(showNext, 2200);
    }

    function stop() {
      if (!timer) return;
      clearInterval(timer);
      timer = null;
    }

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) start();
          else stop();
        });
      }, { threshold: 0.2 });

      io.observe(el);
    } else {
      start();
    }
  })();

  (function () {
    const root = document.getElementById('carousel-products');
    if (!root) return;

    const track = root.querySelector('[data-carousel-track]');
    const slides = Array.from(track.children);
    const btnPrev = root.querySelector('[data-carousel-prev]');
    const btnNext = root.querySelector('[data-carousel-next]');
    const dotsBox = root.querySelector('[data-carousel-dots]');
    const status = root.querySelector('[data-carousel-status]');

    const itemsMobile = parseInt(root.dataset.itemsMobile || '1', 10);
    const itemsDesktop = parseInt(root.dataset.itemsDesktop || '2', 10);
    const loopEnabled = (root.dataset.loop || 'false') === 'true';
    const autoplayMs = parseInt(root.dataset.autoplay || '0', 10);
    const pauseOnHover = (root.dataset.pauseOnHover || 'false') === 'true';
    const respectReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const mqlMd = window.matchMedia('(min-width: 768px)');

    let itemsPerView = mqlMd.matches ? itemsDesktop : itemsMobile;
    let page = 0;
    let pages = Math.max(1, Math.ceil(slides.length / itemsPerView));
    let autoplayTimer = null;
    let isPaused = false;

    function updatePages() {
      itemsPerView = mqlMd.matches ? itemsDesktop : itemsMobile;
      pages = Math.max(1, Math.ceil(slides.length / itemsPerView));

      if (page >= pages) {
        page = pages - 1;
      }

      buildDots();
      goTo(page, false);
      refreshAutoplay(true);
    }

    function goTo(newPage, animate = true) {
      if (!loopEnabled) {
        newPage = Math.max(0, Math.min(pages - 1, newPage));
      } else {
        if (newPage < 0) newPage = pages - 1;
        if (newPage >= pages) newPage = 0;
      }

      page = newPage;

      const percent = -(page * 100);

      if (!animate) {
        track.style.transitionDuration = '0ms';
      }

      track.style.transform = `translateX(${percent}%)`;

      if (!animate) {
        void track.offsetHeight;
        track.style.transitionDuration = '';
      }

      updateAria();
      highlightDots();
    }

    function next() {
      goTo(page + 1);
    }

    function prev() {
      goTo(page - 1);
    }

    function updateAria() {
      const start = page * itemsPerView;
      const end = start + itemsPerView - 1;

      slides.forEach(function (sl, idx) {
        const visible = idx >= start && idx <= end;
        sl.setAttribute('aria-hidden', (!visible).toString());
      });

      if (status) {
        status.textContent = `Página ${page + 1} de ${pages}`;
      }
    }

    function buildDots() {
      if (!dotsBox) return;

      dotsBox.innerHTML = '';

      for (let i = 0; i < pages; i++) {
        const b = document.createElement('button');
        b.type = 'button';
        b.setAttribute('aria-label', `Ir a la página ${i + 1}`);
        b.className = 'h-2 w-2 rounded-full bg-black/60 hover:bg-black focus:outline-none focus:ring-2 focus:ring-white/60';

        b.addEventListener('click', function () {
          goTo(i);
          refreshAutoplay(true);
        });

        dotsBox.appendChild(b);
      }

      highlightDots();
    }

    function highlightDots() {
      if (!dotsBox) return;

      const dots = dotsBox.querySelectorAll('button');

      dots.forEach(function (d, i) {
        d.classList.toggle('bg-white', i === page);
        d.classList.toggle('bg-black/60', i !== page);
      });
    }

    function startAutoplay() {
      if (autoplayMs <= 0 || respectReduced || pages <= 1) return;

      stopAutoplay();

      autoplayTimer = setInterval(function () {
        if (!isPaused) {
          next();
        }
      }, autoplayMs);
    }

    function stopAutoplay() {
      if (!autoplayTimer) return;

      clearInterval(autoplayTimer);
      autoplayTimer = null;
    }

    function refreshAutoplay(reset = false) {
      if (autoplayMs <= 0 || respectReduced) return;

      if (reset) {
        stopAutoplay();
      }

      startAutoplay();
    }

    if (pauseOnHover && autoplayMs > 0) {
      root.addEventListener('mouseenter', function () { isPaused = true; });
      root.addEventListener('mouseleave', function () { isPaused = false; });
      root.addEventListener('focusin', function () { isPaused = true; });
      root.addEventListener('focusout', function () { isPaused = false; });
    }

    document.addEventListener('visibilitychange', function () {
      if (document.hidden) stopAutoplay();
      else refreshAutoplay(true);
    });

    if (btnNext) {
      btnNext.addEventListener('click', function () {
        next();
        refreshAutoplay(true);
      });
    }

    if (btnPrev) {
      btnPrev.addEventListener('click', function () {
        prev();
        refreshAutoplay(true);
      });
    }

    root.tabIndex = 0;

    root.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') {
        next();
        refreshAutoplay(true);
      }

      if (e.key === 'ArrowLeft') {
        prev();
        refreshAutoplay(true);
      }
    });

    let startX = null;
    let deltaX = 0;
    let swiping = false;
    const thresh = 40;

    root.addEventListener('touchstart', function (e) {
      if (!e.touches || !e.touches[0]) return;

      startX = e.touches[0].clientX;
      deltaX = 0;
      swiping = true;
      track.style.transitionDuration = '0ms';
      isPaused = true;
    }, { passive: true });

    root.addEventListener('touchmove', function (e) {
      if (!swiping || startX === null) return;

      deltaX = e.touches[0].clientX - startX;

      const viewport = root.clientWidth;
      const shiftPct = (deltaX / viewport) * 100;
      const basePct = -(page * 100);

      track.style.transform = `translateX(${basePct + shiftPct}%)`;
    }, { passive: true });

    root.addEventListener('touchend', function () {
      track.style.transitionDuration = '';

      if (Math.abs(deltaX) > thresh) {
        if (deltaX < 0) next();
        else prev();
      } else {
        goTo(page);
      }

      startX = null;
      deltaX = 0;
      swiping = false;
      isPaused = false;

      refreshAutoplay(true);
    });

    mqlMd.addEventListener('change', updatePages);
    window.addEventListener('resize', function () { goTo(page, false); });
    window.addEventListener('load', updatePages);

    updatePages();
    startAutoplay();
  })();

  (function () {
    const wrapper = document.getElementById('hs-form-home');
    if (!wrapper) return;

    let loaded = false;

    function loadForm() {
      if (loaded) return;
      loaded = true;

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';

      script.onload = function () {
        if (window.hbspt && window.hbspt.forms && typeof window.hbspt.forms.create === 'function') {
          window.hbspt.forms.create({
            portalId: '7547674',
            formId: '26f426a7-e620-42df-98a3-43e10a899b6c',
            target: '#hs-form-home'
          });
        }
      };

      document.head.appendChild(script);
    }

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            loadForm();
            io.disconnect();
          }
        });
      }, { rootMargin: '300px 0px' });

      io.observe(wrapper);
    } else {
      window.addEventListener('load', function () {
        setTimeout(loadForm, 1800);
      }, { once: true });
    }
  })();

  (function () {
    function onIdle(callback) {
      if ('requestIdleCallback' in window) {
        requestIdleCallback(callback, { timeout: 2500 });
      } else {
        setTimeout(callback, 1200);
      }
    }

    function initShopCarousel() {
      const track = document.getElementById('shop-carousel');
      const prev = document.getElementById('shop-carousel-prev');
      const next = document.getElementById('shop-carousel-next');

      if (!track || !prev || !next) return;
      if (track.dataset.carouselReady === 'true') return;

      track.dataset.carouselReady = 'true';

      const originalCards = Array.from(track.querySelectorAll('a:not([data-clone="true"])'));

      if (!originalCards.length) return;

      const getGap = () => {
        const styles = window.getComputedStyle(track);
        return parseInt(styles.columnGap || styles.gap || 24, 10);
      };

      const getCardWidth = () => {
        const firstCard = track.querySelector('a');
        if (!firstCard) return 320;

        return firstCard.getBoundingClientRect().width + getGap();
      };

      const getCardsPerView = () => {
        if (window.innerWidth >= 1280) return 4;
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 640) return 2;
        return 1;
      };

      let clonesPerSide = 0;
      let autoplay = null;
      let isResetting = false;
      let scrollTimer = null;
      let resizeTimer = null;

      function clearClones() {
        track.querySelectorAll('[data-clone="true"]').forEach(node => node.remove());
      }

      function buildInfiniteTrack() {
        clearClones();

        const cardsPerView = getCardsPerView();
        clonesPerSide = Math.min(cardsPerView + 1, originalCards.length);

        const headClones = originalCards.slice(-clonesPerSide).map(card => {
          const clone = card.cloneNode(true);
          clone.setAttribute('data-clone', 'true');
          clone.setAttribute('tabindex', '-1');
          clone.setAttribute('aria-hidden', 'true');
          return clone;
        });

        const tailClones = originalCards.slice(0, clonesPerSide).map(card => {
          const clone = card.cloneNode(true);
          clone.setAttribute('data-clone', 'true');
          clone.setAttribute('tabindex', '-1');
          clone.setAttribute('aria-hidden', 'true');
          return clone;
        });

        headClones.forEach(clone => track.insertBefore(clone, track.firstChild));
        tailClones.forEach(clone => track.appendChild(clone));

        track.classList.remove('scroll-smooth');
        track.scrollLeft = clonesPerSide * getCardWidth();

        requestAnimationFrame(() => {
          track.classList.add('scroll-smooth');
        });
      }

      function jumpIfNeeded() {
        if (isResetting) return;

        const cardWidth = getCardWidth();
        const realCount = originalCards.length;
        const startBoundary = clonesPerSide * cardWidth;
        const endBoundary = (clonesPerSide + realCount) * cardWidth;

        if (track.scrollLeft <= cardWidth * 0.5) {
          isResetting = true;
          track.classList.remove('scroll-smooth');
          track.scrollLeft = realCount * cardWidth;

          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              track.classList.add('scroll-smooth');
              isResetting = false;
            });
          });
        }

        if (track.scrollLeft >= endBoundary) {
          isResetting = true;
          track.classList.remove('scroll-smooth');
          track.scrollLeft = startBoundary;

          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              track.classList.add('scroll-smooth');
              isResetting = false;
            });
          });
        }
      }

      function goNext() {
        track.scrollBy({
          left: getCardWidth(),
          behavior: 'smooth',
        });
      }

      function goPrev() {
        track.scrollBy({
          left: -getCardWidth(),
          behavior: 'smooth',
        });
      }

      function stopAutoplay() {
        if (!autoplay) return;

        clearInterval(autoplay);
        autoplay = null;
      }

      function startAutoplay() {
        stopAutoplay();

        autoplay = setInterval(() => {
          if (document.hidden) return;
          goNext();
        }, 2600);
      }

      prev.addEventListener('click', () => {
        goPrev();
        startAutoplay();
      });

      next.addEventListener('click', () => {
        goNext();
        startAutoplay();
      });

      track.addEventListener('scroll', () => {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(jumpIfNeeded, 120);
      }, { passive: true });

      track.addEventListener('mouseenter', stopAutoplay);
      track.addEventListener('mouseleave', startAutoplay);
      track.addEventListener('touchstart', stopAutoplay, { passive: true });
      track.addEventListener('touchend', startAutoplay, { passive: true });

      document.addEventListener('visibilitychange', () => {
        if (document.hidden) stopAutoplay();
        else startAutoplay();
      });

      window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);

        resizeTimer = setTimeout(() => {
          buildInfiniteTrack();
        }, 250);
      }, { passive: true });

      buildInfiniteTrack();
      startAutoplay();
    }

    function observeCarousel() {
      const section = document.getElementById('featured-products-carousel-section');

      if (!section) {
        onIdle(initShopCarousel);
        return;
      }

      if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              onIdle(initShopCarousel);
              observer.disconnect();
            }
          });
        }, {
          rootMargin: '450px 0px',
          threshold: 0.01,
        });

        observer.observe(section);
      } else {
        window.addEventListener('load', () => {
          onIdle(initShopCarousel);
        }, { once: true });
      }
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', observeCarousel, { once: true });
    } else {
      observeCarousel();
    }
  })();
</script>
@endpush

@endsection