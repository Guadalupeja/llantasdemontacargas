@extends('layouts.public')

@section('title', 'Llanta Neumática para Montacargas 2026 | Trelleborg T-800')
@section('meta_description', 'Cotiza mejores llantas con Garantia de vida 25% más. Llantas Neumáticas para Montacargas uso rudo de la marca Trelleborg. Entrega inmediata y Precios Mayorista.')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Prioriza la imagen principal real del producto --}}
  @php
    $heroProductVariants = image_variants('originals/Trelleborg_Pneumatic_T800_660x660.webp');
    $heroProductSizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
    $heroProductAvif = $heroProductVariants['avif'] ?? null;
    $heroProductWebp = $heroProductVariants['webp'] ?? null;
    $heroProductJpg  = $heroProductVariants['jpg'] ?? null;
    $heroProductFallback = $heroProductVariants['fallback']['url'] ?? '';
    $toSrcset = fn($arr) => implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  @endphp

  <link
    rel="preload"
    as="image"
    href="{{ $heroProductFallback }}"
    @if($heroProductAvif || $heroProductWebp || $heroProductJpg)
      imagesrcset="
        @if($heroProductAvif){{ $toSrcset($heroProductAvif) }}@endif
        @if($heroProductAvif && ($heroProductWebp || $heroProductJpg)), @endif
        @if($heroProductWebp){{ $toSrcset($heroProductWebp) }}@endif
        @if($heroProductWebp && $heroProductJpg), @endif
        @if($heroProductJpg){{ $toSrcset($heroProductJpg) }}@endif
      "
      imagesizes="{{ $heroProductSizes }}"
    @endif
    fetchpriority="high">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Llantas para Montacargas, Minicargadores y Telehandlers | Trelleborg México",
        "inLanguage": "es-MX",
        "publisher": {
          "@id": "{{ url('/') }}#organization"
        },
        "potentialAction": {
          "@type": "SearchAction",
          "target": "{{ url('/') }}?s={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "AutoPartsStore",
        "@id": "{{ url('/') }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": [
          "BSH",
          "BSH | Llantas de Montacargas",
          "RUGUEX"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        },
        "image": [
          "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        ],
        "description": "Somos una comercializadora de equipos y refacciones especializadas al servicio de la industria en México. Distribuimos desde 2010 la gama de producto Trelleborg, incluyendo llantas neumáticas premium para montacargas, con stock, asistencia técnica, entrega directa en sitio y precios competitivos.",
        "email": "ventas@llantasdemontacargas.com",
        "telephone": "+52-55-5752-1715",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Avenida 125 Oriente #224, Guadalupe Hidalgo",
          "addressLocality": "Puebla",
          "addressRegion": "PUE",
          "postalCode": "72494",
          "addressCountry": "MX"
        },
        "areaServed": [
          { "@type": "Country", "name": "México" },
          { "@type": "City", "name": "Puebla" },
          { "@type": "City", "name": "Ciudad de México" },
          { "@type": "State", "name": "Estado de México" },
          { "@type": "City", "name": "Monterrey" },
          { "@type": "State", "name": "Guanajuato" },
          { "@type": "State", "name": "Querétaro" }
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "contactPoint": [
          {
            "@type": "ContactPoint",
            "telephone": "+52-55-5752-1715",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-83-3246-2205",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-83-3239-5885",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-22-2227-3866",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+52-59-5112-4238",
            "contactType": "sales",
            "areaServed": "MX",
            "availableLanguage": ["es-MX"]
          }
        ],
        "knowsAbout": [
          "Llantas neumáticas para montacargas",
          "Llantas industriales Trelleborg",
          "Llantas para uso rudo",
          "Llantas para trayectos largos",
          "Llantas para terracería",
          "Manejo de materiales"
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}#webpage",
        "url": "{{ url()->current() }}",
        "name": "@yield('title')",
        "description": "@yield('meta_description')",
        "inLanguage": "es-MX",
        "isPartOf": {
          "@id": "{{ url('/') }}#website"
        },
        "about": {
          "@id": "{{ url()->current() }}#product"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/Trelleborg_Pneumatic_T800_660x660.webp') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg T-800",
        "alternateName": [
          "Llanta Neumática Trelleborg T-800",
          "Llanta neumática para montacargas T-800",
          "Trelleborg T800"
        ],
        "sku": "T-800",
        "mpn": "T-800",
        "category": "IndustrialTire",
        "image": [
          "{{ asset('storage/originals/Trelleborg_Pneumatic_T800_660x660.webp') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta neumática para montacargas Trelleborg T-800. Un neumático redituable para aplicaciones de uso medio a ligero, con excelente tracción, gran maniobrabilidad, huella amplia para mayor estabilidad y vida útil, y costados reforzados para soportar impactos laterales.",
        "additionalProperty": [
          { "@type": "PropertyValue", "name": "Tipo", "value": "Llanta neumática industrial para montacargas" },
          { "@type": "PropertyValue", "name": "Aplicación", "value": "Montacargas" },
          { "@type": "PropertyValue", "name": "Uso recomendado", "value": "Uso medio a ligero" },
          { "@type": "PropertyValue", "name": "Beneficio principal", "value": "25% más vida llanta contra llanta, garantizado por escrito" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Banda de rodamiento con excelente tracción" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Gran maniobrabilidad" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Huella amplia que brinda estabilidad y aumenta la vida del neumático" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Costados reforzados para soportar impactos laterales" },
          { "@type": "PropertyValue", "name": "Desempeño", "value": "Gran capacidad de carga y buen desempeño a altas velocidades, trayectos largos y terracería" }
        ],
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"
        },
        "offers": {
          "@type": "Offer",
          "url": "{{ url()->current() }}",
          "priceCurrency": "MXN",
          "availability": "https://schema.org/InStock",
          "itemCondition": "https://schema.org/NewCondition",
          "seller": {
            "@id": "{{ url('/') }}#organization"
          },
          "priceSpecification": {
            "@type": "PriceSpecification",
            "priceCurrency": "MXN",
            "valueAddedTaxIncluded": false
          },
          "eligibleRegion": {
            "@type": "Country",
            "name": "México"
          }
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas neumáticas Trelleborg T-800 para montacargas",
        "serviceType": "Venta y asesoría de llantas neumáticas industriales para montacargas",
        "provider": {
          "@id": "{{ url('/') }}#organization"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "relatedTo": {
          "@id": "{{ url()->current() }}#product"
        }
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#size-list",
        "name": "Medidas disponibles Trelleborg T-800",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 15,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "15x4½-8 / 125/75-8" },
          { "@type": "ListItem", "position": 2, "name": "18x7-8 / 180/70-8" },
          { "@type": "ListItem", "position": 3, "name": "5.00-8" },
          { "@type": "ListItem", "position": 4, "name": "21x8-9 / 200/75-9" },
          { "@type": "ListItem", "position": 5, "name": "6.00-9" },
          { "@type": "ListItem", "position": 6, "name": "23x9-10 / 225/75-10" },
          { "@type": "ListItem", "position": 7, "name": "6.50-10" },
          { "@type": "ListItem", "position": 8, "name": "7.00-12" },
          { "@type": "ListItem", "position": 9, "name": "27x10-12 / 250/75-12" },
          { "@type": "ListItem", "position": 10, "name": "28x9-15 / 225/75-15 (8.15-15)" },
          { "@type": "ListItem", "position": 11, "name": "7.00-15 / 29x8-15" },
          { "@type": "ListItem", "position": 12, "name": "250-15 / 250/70-15" },
          { "@type": "ListItem", "position": 13, "name": "7.50-15" },
          { "@type": "ListItem", "position": 14, "name": "8.25-15" },
          { "@type": "ListItem", "position": 15, "name": "300-15 / 315/70-15" }
        ]
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{ url()->current() }}#breadcrumb",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Inicio",
            "item": "{{ url('/') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Llantas neumáticas para montacargas",
            "item": "{{ url('/llantas-neumaticas') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg T-800",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    ]
  }
  </script>
@endsection

@section('content')
@php
  $variants = image_variants('originals/Trelleborg_Pneumatic_T800_660x660.webp');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? '';
  $toSrcset = fn($arr) => implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
@endphp

<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="mx-auto max-w-[1140px] relative">
    <div class="w-full relative min-h-px flex">
      <div class="w-full p-[10px] flex flex-wrap content-start">
        <div class="w-full h-[68px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 font-sans font-semibold text-[22px] leading-[22px] lg:text-[32px] lg:leading-[32px] text-black">
            Llantas Neumáticas para Montacargas
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a]">
            Con gran capacidad de carga y el mejor desempeño a altas velocidades, en trayectos largos y terracería.
          </p>
        </div>

        <div class="w-full h-[26px]" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>

<section class="relative" role="region" aria-label="Detalle PS800">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    <div class="w-full md:w-[32.708%] p-[10px]">
      <figure class="m-0 text-center">
        <picture>
          @if($srcsetAvif)
            <source type="image/avif" srcset="{{ $toSrcset($srcsetAvif) }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetWebp)
            <source type="image/webp" srcset="{{ $toSrcset($srcsetWebp) }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetJpg)
            <source type="image/jpeg" srcset="{{ $toSrcset($srcsetJpg) }}" sizes="{{ $sizes }}">
          @endif

          <img
            fetchpriority="high"
            decoding="async"
            loading="eager"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Llanta neumática Trelleborg T-800 para montacargas"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg T-800
      </h2>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div>
        <a
          href="#contacto"
          class="mt-6 inline-block rounded-[3px] bg-[#e76a3e] px-6 py-3 text-[20px] leading-[30px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#ff6d00]/60 focus:ring-offset-2"
        >
          <span class="flex justify-center">
            <span class="block">25% mas vida llanta contra llanta, GARANTIZADO por escrito.</span>
          </span>
        </a>
      </div>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div class="text-[#7a7a7a] leading-[29px]">
        <p class="mb-5 mt-6">
          Un neumático muy redituable para aplicaciones de uso medio a ligero.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Banda de rodamiento con excelente tracción.</li>
          <li>Una llanta muy cómoda y de gran maniobrabilidad.</li>
          <li>Huella amplia brinda estabilidad y aumenta la vida del neumático.</li>
          <li>Costados reforzados para soportar impactos laterales.</li>
        </ul>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <a
            href="#contacto"
            class="inline-block rounded-[4px] bg-black px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Solicitar presupuesto ahora</span>
            </span>
          </a>
        </div>

        <div>
          <a
            href="{{ asset('pdfs/Trelleborg-T-800-A4-EN-Oct19-LR.pdf') }}"
             download="{{ asset('pdfs/Trelleborg-T-800-A4-EN-Oct19-LR.pdf') }}"
            target="_blank"
            rel="noopener"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center"><span class="block">Descargar Ficha</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="lg:h-[35px] h-[10px]" aria-hidden="true"></div>

<section
  class="relative mt-6"
  role="region"
  aria-label="Tabla de medidas y capacidades"
  style="content-visibility:auto;contain-intrinsic-size:1px 1400px;"
>
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1600px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Alternative Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Ply Rating</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Rim</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Overall Diameter [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Section Width [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tread Depth [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Inflation Pressure [bar]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tire Type</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Index</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Speed Symbol</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity [kg]<br>Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity [kg]<br>Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">125/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">12</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.25-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">385</td>
              <td class="px-3 py-2 text-center text-neutral-700">122</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">100</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">180/70-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">453</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">17</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">465</td>
              <td class="px-3 py-2 text-center text-neutral-700">135</td>
              <td class="px-3 py-2 text-center text-neutral-700">13</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">111</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">200/75-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000006</td>
              <td class="px-3 py-2 text-center text-neutral-700">536</td>
              <td class="px-3 py-2 text-center text-neutral-700">204</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">131</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2535</td>
              <td class="px-3 py-2 text-center text-neutral-700">1950</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">12</td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">540</td>
              <td class="px-3 py-2 text-center text-neutral-700">155</td>
              <td class="px-3 py-2 text-center text-neutral-700">13</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">121</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x9-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">585</td>
              <td class="px-3 py-2 text-center text-neutral-700">228</td>
              <td class="px-3 py-2 text-center text-neutral-700">19</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">142</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3445</td>
              <td class="px-3 py-2 text-center text-neutral-700">2650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">597</td>
              <td class="px-3 py-2 text-center text-neutral-700">183</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">122</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1950</td>
              <td class="px-3 py-2 text-center text-neutral-700">1500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">685</td>
              <td class="px-3 py-2 text-center text-neutral-700">196</td>
              <td class="px-3 py-2 text-center text-neutral-700">15</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">134</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2755</td>
              <td class="px-3 py-2 text-center text-neutral-700">2120</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/75-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">691</td>
              <td class="px-3 py-2 text-center text-neutral-700">245</td>
              <td class="px-3 py-2 text-center text-neutral-700">21</td>
              <td class="px-3 py-2 text-center text-neutral-700">7</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">143</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3545</td>
              <td class="px-3 py-2 text-center text-neutral-700">2725</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-15 (8.15-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">722</td>
              <td class="px-3 py-2 text-center text-neutral-700">217</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">146</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">29x8-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">755</td>
              <td class="px-3 py-2 text-center text-neutral-700">190</td>
              <td class="px-3 py-2 text-center text-neutral-700">17</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.3</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">140</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3250</td>
              <td class="px-3 py-2 text-center text-neutral-700">2500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">760</td>
              <td class="px-3 py-2 text-center text-neutral-700">240</td>
              <td class="px-3 py-2 text-center text-neutral-700">21</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.3</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">155</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">5040</td>
              <td class="px-3 py-2 text-center text-neutral-700">3875</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">808</td>
              <td class="px-3 py-2 text-center text-neutral-700">215</td>
              <td class="px-3 py-2 text-center text-neutral-700">17</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.3</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">144</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3640</td>
              <td class="px-3 py-2 text-center text-neutral-700">2800</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">834</td>
              <td class="px-3 py-2 text-center text-neutral-700">255</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">149</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4225</td>
              <td class="px-3 py-2 text-center text-neutral-700">3250</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">315/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">840</td>
              <td class="px-3 py-2 text-center text-neutral-700">290</td>
              <td class="px-3 py-2 text-center text-neutral-700">25</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">164</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="13" class="px-3 py-3 text-center text-xs"></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="h-10" aria-hidden="true"></div>
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image:image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
    content-visibility:auto;
    contain-intrinsic-size:1px 900px;
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 w-full mb-5">
          <div
            data-hs-forms-root="true"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
            id="hs-form-contacto"
          >
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
    #contacto {
      background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }}') type('image/avif') 1x,
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }}') type('image/webp') 1x,
        url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
      );
    }
  }
</style>

@push('scripts')
<script>
(function () {
  const formRoot = document.getElementById('hs-form-contacto');
  if (!formRoot) return;

  let loaded = false;
  let loading = false;

  function mountForm() {
    if (loaded || loading) return;
    loading = true;

    const done = () => {
      if (window.hbspt && window.hbspt.forms && typeof window.hbspt.forms.create === 'function') {
        window.hbspt.forms.create({
          portalId: formRoot.dataset.portalId,
          formId: formRoot.dataset.formId,
          target: '#hs-form-contacto'
        });
        loaded = true;
      }
      loading = false;
    };

    if (window.hbspt && window.hbspt.forms) {
      done();
      return;
    }

    const s = document.createElement('script');
    s.src = 'https://js.hsforms.net/forms/shell.js';
    s.async = true;
    s.defer = true;
    s.onload = done;
    document.head.appendChild(s);
  }

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          mountForm();
          io.disconnect();
        }
      });
    }, { rootMargin: '200px 0px' });

    io.observe(formRoot);
  } else {
    window.addEventListener('load', mountForm, { once: true });
  }
})();
</script>
@endpush
@endsection