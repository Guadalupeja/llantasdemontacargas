@extends('layouts.public')

@section('title', 'Llantas para montacargas y minicargadores mejor calidad 2025')
@section('meta_description', 'Cotiza llantas para montacargas y minicargadores 2025 sólidas, neumáticas, poliuretano, envío GRATIS a la República mexicana, entrega inmediata precio mayorista')

@php
  $toSrcset = static function ($arr) {
      return implode(', ', array_map(static fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  };

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

  {{-- Hero del formulario, visible mucho más abajo; se mantiene pero no compite tanto --}}
  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ $ctaHeroAvif1024 }} type('image/avif'),
      {{ $ctaHeroWebp1024 }} type('image/webp'),
      {{ $ctaHeroJpg }} type('image/jpeg')
    "
    imagesizes="100vw"
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
  <div class="relative mx-auto flex max-w-[1140px] flex-col gap-6 md:flex-row">
    <nav aria-label="Tabla de contenido" class="hidden md:block w-full md:w-[48%]">
      <div class="flex w-full flex-wrap content-start p-2.5">
        <div class="mx-[70px] w-full">
          <div class="border border-[#d5d8dc]">
            <button
              type="button"
              class="flex w-full items-center gap-2 px-5 py-[15px] font-roboto font-semibold text-[#e76a3e] leading-4"
              aria-expanded="false"
              aria-controls="toc-panel"
              id="toc-button"
            >
              <span class="inline-block w-[1.5em] text-left" aria-hidden="true">▸</span>
              Tabla de contenido
            </button>

            <div
              id="toc-panel"
              role="region"
              aria-labelledby="toc-button"
              class="border-t border-[#d5d8dc] px-5 py-[15px] font-roboto text-[#7a7a7a]"
              hidden
            >
              <ol class="mb-2.5 mt-0 list-decimal list-inside space-y-1">
                <li><a class="text-white hover:text-[#e76a3e]" href="{{ url('/llantas-para-montacargas') }}">Llantas para Montacargas</a></li>
                <li><a class="text-white hover:text-[#e76a3e]" href="{{ url('/tienda-en-linea') }}" target="_blank" rel="noopener">Compra en línea</a></li>
                <li><a class="text-white hover:text-[#e76a3e]" href="{{ url('/instalacion-de-llantas-montacargas-ruguex') }}" target="_blank" rel="noopener">Instalación de llantas gratis en la compra de cualquier llanta</a></li>
                <li><a class="text-white hover:text-[#e76a3e]" href="#T7">Cotiza en línea o solicita una asesoría</a></li>
              </ol>
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

<section class="relative w-full bg-black overflow-hidden">
  <div class="relative flex w-full">
    <div class="relative w-full min-h-px">
      <div class="relative h-[260px] md:h-[360px] w-full overflow-hidden">
        <div class="absolute inset-0 z-0 pointer-events-none">
          <x-responsive-image
            :variants="$shopBanner"
            alt=""
            sizes="100vw"
            class="h-full w-full object-cover object-center"
            loading="lazy"
          />
        </div>

        <div class="absolute inset-0 z-[1] bg-black/20"></div>

        <div class="relative z-10 flex h-full w-full items-center justify-center text-center px-4">
          <a href="{{ url('/tienda-en-linea') }}"
             class="inline-block rounded-[6px] bg-[#e76a3e] px-[50px] py-[25px] text-[25px] font-medium leading-[20px] text-white no-underline transition">
            <span class="flex justify-center">
              <span class="block">¡Compra en línea aquí!</span>
            </span>
          </a>
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
              ¿Qué Llantas Sólidas necesito?
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
                    sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                    class="h-full w-full object-contain"
                    width="800" height="533"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col rounded-none">
              <a href="{{ url('/llantas-para-montacargas/trelleborg-elite-xp') }}" class="block no-underline">
                <div class="w-full overflow-hidden rounded-none">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaXp800"
                      alt="Llantas sólidas para Montacargas Trelleborg"
                      sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                      class="h-full w-full object-contain"
                      width="170" height="170"
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
                    sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                    class="h-full w-full object-contain"
                    width="800" height="533"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col">
              <a href="{{ url('/llantas-para-minicargadores/brawler-hd-solidflex/') }}" class="block no-underline">
                <div class="w-full overflow-hidden">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaPs1000"
                      alt="Llanta sólida rellena para minicargador Brawler HD SolidFlex"
                      sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                      class="h-full w-full object-contain"
                      width="170" height="170"
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
              ¿Qué Llantas Neumáticas necesito?
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
                    sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                    class="h-full w-full object-contain"
                    width="800" height="533"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col rounded-none">
              <a href="{{ url('/llantas-para-montacargas/trelleborg-elite-xp') }}" class="block no-underline">
                <div class="w-full overflow-hidden rounded-none">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaT900"
                      alt="Llantas sólidas para Montacargas Trelleborg"
                      sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                      class="h-full w-full object-contain"
                      width="170" height="170"
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
                    sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                    class="h-full w-full object-contain"
                    width="800" height="533"
                    loading="lazy"
                  />
                </div>
              </div>
            </article>

            <article class="flex flex-col">
              <a href="{{ url('/llantas-para-minicargadores/brawler-hd-solidflex/') }}" class="block no-underline">
                <div class="w-full overflow-hidden">
                  <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
                    <x-responsive-image
                      :variants="$imgLlantaRadial"
                      alt="Llanta sólida rellena para minicargador Brawler HD SolidFlex"
                      sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
                      class="h-full w-full object-contain"
                      width="170" height="170"
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
                    sizes="(min-width: 1024px) 50vw, 100vw"
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
                    sizes="(min-width: 1024px) 50vw, 100vw"
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
                    sizes="(min-width: 1024px) 50vw, 100vw"
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
                    sizes="(min-width: 1024px) 50vw, 100vw"
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
      if (caret) caret.textContent = open ? '▸' : '▾';
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
    const root    = document.getElementById('carousel-products');
    if (!root) return;

    const track   = root.querySelector('[data-carousel-track]');
    const slides  = Array.from(track.children);
    const btnPrev = root.querySelector('[data-carousel-prev]');
    const btnNext = root.querySelector('[data-carousel-next]');
    const dotsBox = root.querySelector('[data-carousel-dots]');
    const status  = root.querySelector('[data-carousel-status]');

    const itemsMobile    = parseInt(root.dataset.itemsMobile || '1', 10);
    const itemsDesktop   = parseInt(root.dataset.itemsDesktop || '2', 10);
    const loopEnabled    = (root.dataset.loop || 'false') === 'true';
    const autoplayMs     = parseInt(root.dataset.autoplay || '0', 10);
    const pauseOnHover   = (root.dataset.pauseOnHover || 'false') === 'true';
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
      if (page >= pages) page = pages - 1;
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
      if (!animate) track.style.transitionDuration = '0ms';
      track.style.transform = `translateX(${percent}%)`;
      if (!animate) {
        void track.offsetHeight;
        track.style.transitionDuration = '';
      }
      updateAria();
      highlightDots();
    }

    function next() { goTo(page + 1); }
    function prev() { goTo(page - 1); }

    function updateAria() {
      const start = page * itemsPerView;
      const end = start + itemsPerView - 1;
      slides.forEach(function (sl, idx) {
        const visible = idx >= start && idx <= end;
        sl.setAttribute('aria-hidden', (!visible).toString());
      });
      if (status) status.textContent = `Página ${page + 1} de ${pages}`;
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
        if (!isPaused) next();
      }, autoplayMs);
    }

    function stopAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    function refreshAutoplay(reset = false) {
      if (autoplayMs <= 0 || respectReduced) return;
      if (reset) stopAutoplay();
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

    btnNext && btnNext.addEventListener('click', function () { next(); refreshAutoplay(true); });
    btnPrev && btnPrev.addEventListener('click', function () { prev(); refreshAutoplay(true); });

    root.tabIndex = 0;
    root.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') {
        next();
        refreshAutoplay(true);
      } else if (e.key === 'ArrowLeft') {
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
      const basePct  = -(page * 100);
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
</script>
@endpush

@endsection