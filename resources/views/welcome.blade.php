@extends('layouts.app')

@section('title', 'Llantas para montacargas y minicargadores mejor calidad 2025')
@section('meta_description', 'Cotiza llantas para montacargas y minicargadores 2025 sólidas, neumáticas, poliuretano, envío GRATIS a la República mexicana, entrega inmediata precio mayorista')



@section('structured-data')
  {{-- 1) Página --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
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
  }
  </script>

  {{-- 2) Organización (BSH / Ruguex) --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
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
  }
  </script>

  {{-- 3) Catálogo de ofertas (familias de llantas) --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
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
  }
  </script>

  {{-- 4) Tabla de contenidos como ItemList (coincide con tu <nav>) --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
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
  }
  </script>

  {{-- 5) Servicio destacado: Instalación gratis en la compra --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
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
  }
  </script>

  {{-- 6) Marca (Brand) que se comercializa en la página --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Brand",
    "name": "Trelleborg",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('storage/originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg') }}"
    },
    "url": "https://www.trelleborg.com/"
  }
  </script>

  {{-- 7) WebSite básico (opcional, útil si aún no lo declaras en layout) --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": "{{ url('/') }}#website",
    "url": "{{ url('/') }}",
    "name": "Llantas para Montacargas y Minicargadores · RUGUEX",
    "inLanguage": "es-MX",
    "publisher": { "@id": "{{ url('/') }}#organization" }
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
        <!-- Botón del acordeón -->
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

        <!-- Panel -->
        <div
          id="toc-panel"
          role="region"
          aria-labelledby="toc-button"
          class="border-t border-[#d5d8dc] px-5 py-[15px] font-roboto text-[#7a7a7a]"
          hidden
        >
          <ol class="mb-2.5 mt-0 list-decimal list-inside space-y-1">
          <li><a class="text-white hover:text-[#e76a3e]" href="/llantas-para-montacargas/">Llantas para Montacargas</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="/llantas-para-minicargadores/">Llantas para Minicargadores</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="/tienda-en-linea/" target="_blank" rel="noopener">Compra en línea</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="/llantas-para-cargadores/">Llantas para cargadores</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="/llantas-para-manipulador-telescopico/">Llantas para manipuladores</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="/instalacion-de-llantas-montacargas-ruguex/" target="_blank" rel="noopener">Instalación de llantas gratis en la compra de cualquier llanta</a></li>
          <li><a class="text-white hover:text-[#e76a3e]" href="#T7">Cotiza en línea o solicita una asesoría</a></li>
        </ol>


        </div>
      </div>
    </div>
  </div>
</nav>


    <!-- Columna 2 (52%) -->
    <div class="relative w-full md:w-[52%]">
      <div class="flex w-full flex-wrap content-start p-2.5">
        <!-- Imagen -->
        @php
        $v = image_variants('originals/llantas-para-montacargas-trelleborg-2-ousfe5qi9qmv8390s86lcc3l9p4mdicmfsmgsuj2ow.jpg');
      @endphp

      <x-responsive-image
        :variants="$v"
        alt="Llantas para montacargas y minicargadores Trelleborg"
        sizes="(min-width:300px) 1000px, 100vw"
        class="inline-block border-0"
        width="500"
        height="300"
        loading="lazy"
      />


        <!-- Botón absoluto sobre la imagen -->
        <div class="absolute left-[-8px] top-[141px] z-0 w-full text-center">
          <a
            href="#T7"
            class="inline-block rounded-[6px] bg-[#e76a3e] px-[50px] py-[25px] text-[20px] leading-[20px] font-medium text-white transition"
          >
            <span class="flex justify-center"><span class="block">Cotiza Ahora </span></span>
          </a>
        </div>

        <!-- Título debajo -->
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




<section class="relative bg-black">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row ">
    <!-- Columna izquierda (52%) -->
    <div class="relative w-full md:w-[52%]">
  <div class="flex w-full flex-wrap content-start p-2.5">

    <div class="relative w-full">
      <a href="{{ url('/llantas-para-minicargadores') }}" class="block no-underline">
        <div class="relative w-full overflow-hidden [aspect-ratio:5/3] rounded">
          @php
            $v = image_variants('originals/llantas-de-minicargadores-pydymcajo27jg6gz7nbithphn5w8cd65salbb2aobw-pz82bm8oq19ajpmzwehi63mxzwn1db4u4qlojzmkc6.webp');
          @endphp
          <x-responsive-image
            :variants="$v"
            alt="Llantas para minicargadores"
            sizes="(min-width:1280px) 560px, (min-width:768px) 50vw, 100vw"
            class="absolute inset-0 h-full w-full object-cover"
            loading="lazy"
          />
        </div>
      </a>
    </div>

    <div class="relative w-full text-left">
      <div class="bg-black p-[10px]">
        <h2 class="m-0 p-0 text-[25px] lg:text-[35px] font-semibold leading-[35px] text-white [text-shadow:0_0_10px_rgba(0,0,0,0.3)]">
          <a href="{{ url('/llantas-para-minicargadores') }}"
             class="text-[25px] lg:text-[35px] leading-[35px] text-white no-underline">
            Llantas para Minicargadores
          </a>
        </h2>
      </div>
    </div>

  </div>
</div>


    <!-- Columna derecha (48%) con fondo -->
    <!-- Columna derecha (48%) con fondo -->
    <div class="relative flex min-h-px basis-[48%]">

      @php
        // Original bajo storage/app/public/originals/...
        $v = image_variants('originals/venta-de-llantas-para-montacargas-1.jpg');
      @endphp

      <div class="relative flex w-full flex-wrap items-center content-center p-[10px] overflow-hidden
                  h-[260px] md:h-[360px]">   {{-- altura del bloque de fondo --}}

        {{-- Fondo responsivo ocupando todo el bloque --}}
        <div class="absolute inset-0 z-0 pointer-events-none">
          <x-responsive-image
            :variants="$v"
            alt=""
            sizes="100vw"
            wrapperClass="block h-full w-full"               {{-- <picture> llena el bloque --}}
            class="h-full w-full object-cover [object-position:-618px_0]"  {{-- <img> llena y recorta --}}
            fetchpriority="high" loading="eager"              {{-- si es LCP/hero; si no, usa lazy --}}
          />
        </div>

        <!-- Contenido encima -->
        <div class="relative z-10 w-full text-center">
          <a href="{{ url('/tienda-en-linea') }}"
            class="inline-block rounded-[6px] bg-[#e76a3e] px-[50px] py-[25px]
                    text-[20px] font-medium leading-[20px] text-white no-underline transition">
            <span class="flex justify-center">
              <span class="order-10 block flex-grow">¡Compra en línea aquí!</span>
            </span>
          </a>
        </div>

      </div>
    </div>

  </div>
</section>




<div class="relative mx-auto flex flex-col md:flex-row min-h-[400px] items-center bg-[#e76a3e] ">
<!-- Columna izquierda (50.468%) -->
<div class="relative flex min-h-px basis-[50.468%]">
  <div class="relative flex w-full flex-wrap items-center content-center">
    <div class="relative w-full text-center">
      <span class="relative z-[1] inline-block">
        <span class="inline-table text-[25px] lg:text-[35px] font-black text-black">
          <span>25% más </span>

          <!-- Marcador animado -->
          <span
            class="mx-[10px] mt-[50px] inline-block text-center [perspective:400px]"
            aria-live="polite"
          >
            <!-- Ancho fijo para evitar “saltos” entre palabras (ajústalo si quieres) -->
            <span
              id="word-rotator"
              class="inline-block w-[10ch] will-change-transform"
            >Desempeño</span>
          </span>

          <span><br />GARANTIZADO. </span>
        </span>
      </span>
    </div>
  </div>
</div>


  <!-- Columna derecha (49.532%) -->
  <div class="relative flex min-h-px basis-[49.532%]">
    <div class="relative flex w-full flex-wrap content-start bg-black">
      <section class="relative block w-full">
        <div class="relative mx-auto flex max-w-[1140px]">
          <div class="relative flex min-h-px basis-full">
            <div class="relative m-[5px] w-full flex-wrap content-start border-[3px] border-white border-double p-[10px]">
              <!-- Spacer 30px -->
              <div class="relative mb-[20px] w-full">
                <div class="h-[30px]"></div>
              </div>

              <!-- Título -->
              <div class="relative mb-[20px] w-full text-center">
                <h2 class="m-0 p-0 text-[25px] lg:text-[35px] font-semibold leading-[35px] text-white">
                  Instalación de llantas gratis en la compra de cualquier llanta
                </h2>
              </div>

              <!-- Botón -->
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
              <!-- /Botón -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>







<section class="relative w-full">
  <div class="flex w-full max-w-auto flex-col md:flex-row">
    <!-- ===================== COL 1 ===================== -->
    <div class="relative w-full md:w-1/2">
      <div class="relative flex w-full flex-wrap content-start">
        <!-- Título -->
        <div class="relative mb-[20px] w-full text-center">
          <div class="bg-black p-[10px]">
            <h2 class="m-0 p-0 text-[25px] lg:text-[39px] font-semibold leading-[39px] text-white">
              ¿Qué Llantas Sólidas necesito?
            </h2>
          </div>
        </div>

        <!-- Bloque 1 (3 columnas, ancho máx 776px, márgenes 13px) -->
        <section class="relative my-[13px] w-full bg-transparent  lg:p-8">
  <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">

    {{-- Col 1 --}}
    <article class="flex flex-col rounded-none">
      <div class="w-full overflow-hidden rounded-none">
        <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square bg-transparent">
          @php
            $v = image_variants('originals/vehicle-gca9eb81db_1920.png');
          @endphp
          <x-responsive-image
            :variants="$v"
            alt="Montacargas"
            sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
            class="h-full w-full object-contain"
            width="800" height="533"
            loading="lazy"
          />
        </div>
      </div>
    </article>

    {{-- Col 2 --}}
    <article class="flex flex-col rounded-none">
      <a href="{{ url('/llantas-para-montacargas/trelleborg-elite-xp') }}" class="block no-underline">
        <div class="w-full overflow-hidden rounded-none">
          <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
            @php
              $v = image_variants('originals/llantas-para-montacargas-2.jpg');
            @endphp
            <x-responsive-image
              :variants="$v"
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

    {{-- Col 3 (botón) --}}
    <article class="flex flex-col justify-center">
      <div class="w-full">
        <a
          href="{{ url('/llantas-para-montacargas/#solidas-montacargas') }}"
          target="_blank"
          class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
        >
          Sólidas para montacargas
        </a>
      </div>
    </article>

  </div>
</section>


        <!-- Bloque 2 (3 columnas, ancho máx 1140px) -->
        <section class="relative w-full bg-transparent lg:p-8">
  <div class="relative mx-auto max-w-[1140px] grid grid-cols-1 md:grid-cols-3 gap-5">

    {{-- Col 1 --}}
    <article class="flex flex-col">
      <div class="w-full overflow-hidden">
        <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
          @php
            $v = image_variants('originals/llantas-para-montacargas-trelleborg.jpg');
          @endphp
          <x-responsive-image
            :variants="$v"
            alt="Llantas sólidas para minicargadores Brawler"
            sizes="(min-width:1024px) 380px, (min-width:768px) 50vw, 100vw"
            class="h-full w-full object-contain"
            width="800" height="533"
            loading="lazy"
          />
        </div>
      </div>
    </article>

    {{-- Col 2 --}}
    <article class="flex flex-col">
      <a href="{{ url('/llantas-para-minicargadores/brawler-hd-solidflex/') }}" class="block no-underline">
        <div class="w-full overflow-hidden">
          <div class="mx-auto w-[160px] sm:w-[220px] md:w-full md:max-w-none aspect-square">
            @php
              $v = image_variants('originals/llantas-para-minicargadores-en-las-aplicaciones-mas-rigurosas.jpg');
            @endphp
            <x-responsive-image
              :variants="$v"
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

    {{-- Col 3 (botón) --}}
    <article class="flex flex-col justify-center">
      <div class="w-full">
        <a
          href="{{ url('/llantas-para-minicargadores/#solidas-minicargador/') }}"
          target="_blank"
          class="block rounded-[3px] bg-[#00063a] text-center px-6 py-3 lg:text-[22px] text-[12px] lg:leading-[22px] leading-[12px] text-white no-underline"
        >
          Sólidas para minicargadores
        </a>
      </div>
    </article>

  </div>
</section>

      </div>
    </div>

    <!-- ===================== COL 2 (Carrusel) ===================== -->
    <!-- ===================== COL 2 (Carrusel) ===================== -->
    <div class="relative w-full md:w-1/2 flex items-center justify-center" data-carousel>
      <div class="relative flex w-full flex-wrap content-center items-center">
        <div class="relative w-full" aria-roledescription="carousel" aria-label="Carrusel | Scroll horizontal: Flecha izquierda y derecha">
          <div class="relative">
            <!-- Viewport -->
            <div class="relative z-[1] overflow-hidden pb-[30px]">

              <!-- Pista -->
              <div class="relative z-[1] flex h-[373px] w-full
                          transition-transform duration-500 ease-out will-change-transform js-track"
                  aria-live="off">

                <!-- Slide 1 -->
                <div class="relative h-[373px] w-[372px] flex-shrink-0 overflow-hidden text-center
                            transition-[border,background,transform] js-slide"
                    role="group" aria-roledescription="slide" aria-label="1 de 2">
                  <figure class="m-0 block leading-[28.8px]">
                    @php $v = image_variants('originals/llantas-para-cargador-trelleborg.jpg'); @endphp
                    <x-responsive-image
                      :variants="$v"
                      alt="Llantas para cargador Trelleborg"
                      sizes="(min-width:1024px) 900px, 100vw"
                      class="max-w-full align-middle border-0 h-auto"
                      width="290" height="290"
                      loading="lazy"
                    />
                    <figcaption class="block text-center text-[25px] text-[#e76a3e]">
                      ¿Qué llantas para cargador existen?
                    </figcaption>
                  </figure>
                </div>

                <!-- Slide 2 -->
                <div class="relative h-[373px] w-[372px] flex-shrink-0 overflow-hidden text-center
                            transition-[border,background,transform] js-slide"
                    role="group" aria-roledescription="slide" aria-label="2 de 2">
                  <figure class="m-0 block leading-[28.8px]">
                    @php $v = image_variants('originals/llantas-de-manipuladores.jpg'); @endphp
                    <x-responsive-image
                      :variants="$v"
                      alt="Llantas para manipuladores telescópicos"
                      sizes="(min-width:1280px) 1000px, (min-width:768px) 720px, 100vw"
                      class="max-w-full h-auto align-middle border-0"
                      width="290" height="290"
                      loading="lazy"
                    />
                    <figcaption class="block text-center text-[25px] text-[#e76a3e]">
                      ¿Cuáles llantas para manipulador necesito?
                    </figcaption>
                  </figure>
                </div>
              </div>

              <!-- Flechas -->
              <button type="button"
                      aria-label="Diapositiva anterior"
                      class="js-prev absolute left-[10px] top-1/2 z-[1] -translate-y-1/2 cursor-pointer
                            text-[25px] text-[rgba(238,238,238,0.9)]">
                <i aria-hidden="true" class="block leading-[25px]"></i>
              </button>

              <button type="button"
                      aria-label="Diapositiva siguiente"
                      class="js-next absolute right-[10px] top-1/2 z-[1] -translate-y-1/2 cursor-pointer
                            text-[25px] text-[rgba(238,238,238,0.9)]">
                <i aria-hidden="true" class="block leading-[25px]"></i>
              </button>

              <!-- Bullets (el JS los creará aquí) -->
              <div class="js-dots absolute bottom-[5px] left-0 z-10 w-full cursor-default text-center text-white transition"></div>

              <!-- Live region para anuncios (accesibilidad) -->
              <span class="js-live sr-only" aria-live="assertive" aria-atomic="true"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===================== /COL 2 ===================== -->
  </div>
</section>


<div class="relative box-border flex w-full flex-wrap content-start p-[10px] bg-black">
  
  <!-- Texto centrado, 44px, Roboto/sans, color blanco -->
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

        <!-- Intro -->
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

        <!-- Carrusel -->
        <section class="relative w-full">
          <!-- Viewport -->
          <div id="carousel-products"
               class="relative mx-auto w-full overflow-hidden"
               aria-roledescription="carousel"
               aria-label="Productos"
               data-items-mobile="1"
               data-items-desktop="2"
               data-loop="true"
               data-autoplay="5000"
               data-pause-on-hover="true">

            <!-- Track con gap (no paddings en slides) -->
            <div class="flex w-full gap-x-4 transition-transform duration-500 ease-out will-change-transform"
                 data-carousel-track>
             <!-- Slide 1 -->
            <article
              class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2"
              role="group" aria-roledescription="slide" aria-label="1 de 4"
            >
              <figure class="m-0">
                @php
                  $v = image_variants('originals/MOSAICO-PS-1000.png');
                @endphp

                <x-responsive-image
                  :variants="$v"
                  alt="Llantas Sólidas para Montacargas"
                  sizes="(min-width: 1024px) 50vw, 100vw"    {{-- en md+ ocupa media fila; en móvil 100% --}}
                  class="mx-auto inline-block h-auto max-h-[340px] w-auto align-middle"
                  loading="lazy"
                  width="357" height="357" 
                />

                <figcaption class="mt-1 text-center text-[22px] font-semibold text-[#e76a3e]">
                  Llantas Sólidas para Montacargas
                </figcaption>
              </figure>
            </article>

              <!-- Slide 2 -->
              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2"
                      role="group" aria-roledescription="slide" aria-label="2 de 4">
                <figure class="m-0">
                  @php
                    // Debe existir: storage/app/public/originals/Llanta-neumatica-reforzada.jpg
                    $v = image_variants('originals/Llanta-neumatica-reforzada.jpg');
                  @endphp

                  <x-responsive-image
                    :variants="$v"
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


              <!-- Slide 3 -->
              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2"
                      role="group" aria-roledescription="slide" aria-label="3 de 4">
                <figure class="m-0">
                  @php
                    // Debe existir: storage/app/public/originals/Llanta-solida-con-arillo.jpg
                    $v = image_variants('originals/Llanta-solida-con-arillo.jpg');
                  @endphp

                  <x-responsive-image
                    :variants="$v"
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


              <!-- Slide 4 -->
              <article class="relative box-border min-w-0 shrink-0 basis-full overflow-hidden text-center md:basis-1/2"
                      role="group" aria-roledescription="slide" aria-label="4 de 4">
                <figure class="m-0">
                  @php
                    // Debe existir: storage/app/public/originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg
                    $v = image_variants('originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg');
                  @endphp

                  <x-responsive-image
                    :variants="$v"
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

            <!-- Overlay de controles (no empuja el layout) -->
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

            <!-- Bullets -->
            <div class="pointer-events-none  bottom-2 mt-6 left-0 right-0 z-20 flex items-center justify-center">
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
  <!-- Columna 1: fondo con imagen (ahora con <x-responsive-image/>) -->
  @php
    // Debe existir el original en storage/app/public/originals/
    $vHero = image_variants('originals/llantas-para-Montacargas-y-Cargadores.jpg');
  @endphp
  <div class="relative flex w-full flex-wrap content-center items-center overflow-hidden
              bg-black/10 md:min-h-[520px] lg:min-h-[904.781px]">
    <!-- Imagen de fondo responsiva -->
    <div class="absolute inset-0 -z-10">
      <x-responsive-image
        :variants="$vHero"
        alt=""                           {{-- decorativa --}}
        sizes="(min-width:1024px) 50vw, 100vw"
        class="h-full w-full object-cover object-center"
        loading="lazy"
        {{-- Si esta imagen es LCP/hero, usa lo de abajo y quita el lazy: --}}
        {{-- fetchpriority="high" loading="eager" --}}
      />
    </div>
  </div>

  <!-- Columna 2: overlay negro + degradado con contenido -->
  <div class="relative w-full md:min-h-[520px] lg:min-h-[904.781px]">
    <!-- capa de fondo (negro sólido; si quieres degradado, cambia a bg-gradient-to-b ...) -->
    <div class="absolute inset-0 bg-black"></div>

    <!-- contenido -->
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







{{-- Hero cotización PS: usa tus variantes generadas por images:generate --}}
<section
  id="T7"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    /* Fallback universal (JPEG original) */
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');

    /* Navegadores con image-set escogerán el mejor formato */
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  "
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">

        <!-- Overlay para mejorar legibilidad -->
        <div class="pointer-events-none absolute inset-0 bg-black/35"></div>

        <!-- Spacer superior (104px) -->
        <div class="w-full"><div class="h-[104px]"></div></div>

        <!-- Título -->
        <div class="z-10 w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <!-- Formulario (HubSpot) -->
        <div class="z-10 w-full mb-5">
          <div data-hs-forms-root="true">
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
            <script>
              hbspt.forms.create({
                portalId: "7547674",
                formId: "26f426a7-e620-42df-98a3-43e10a899b6c"
              });
            </script>
          </div>
        </div>

        <!-- Spacer inferior (104px) -->
        <div class="w-full"><div class="h-[104px]"></div></div>
      </div>
    </div>
  </div>
</section>

{{-- Ajuste responsive: en <=768px usa una variante más chica --}}
<style>
  @media (max-width: 768px) {
    #T7{
      background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }}') type('image/avif') 1x,
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }}') type('image/webp') 1x,
        url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
      );
    }
  }
</style>



@endsection
