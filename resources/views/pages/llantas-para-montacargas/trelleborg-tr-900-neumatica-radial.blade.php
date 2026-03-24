@extends('layouts.public')

@section('title', 'Llanta Neumática Radial para Montacargas | Trelleborg TR-900')
@section('meta_description', 'Cotiza mejores llantas con Garantia de vida 25% más. Llantas Neumáticas para Montacargas uso rudo de la marca Trelleborg. Entrega inmediata y Precios Mayorista.')

@php
  $productVariants = image_variants('originals/Trelleborg_Pneumatic_TR900_660x660.webp');
  $productSizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

  $productSrcsetAvif = $productVariants['avif'] ?? null;
  $productSrcsetWebp = $productVariants['webp'] ?? null;
  $productSrcsetJpg  = $productVariants['jpg'] ?? null;
  $productFallback   = $productVariants['fallback']['url'] ?? asset('storage/originals/Trelleborg_Pneumatic_TR900_660x660.webp');

  $toSrcset = function ($arr) {
      return implode(', ', array_map(fn($v) => $v['url'] . ' ' . $v['w'] . 'w', $arr));
  };

  $heroDesktopAvif = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroDesktopWebp = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroMobileAvif  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroMobileWebp  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
  $heroJpg         = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');

  $productImageJson = asset('storage/originals/Trelleborg_Pneumatic_TR900_660x660.webp');
  $pdfFicha = asset('pdfs/Trelleborg-TR-900-A4-EN-Oct19-LR.pdf');
@endphp

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- preload de la imagen visible principal --}}
  <link
    rel="preload"
    as="image"
    href="{{ $productFallback }}"
    imagesrcset="
      @if($productSrcsetAvif){{ $toSrcset($productSrcsetAvif) }}@endif
      @if($productSrcsetAvif && ($productSrcsetWebp || $productSrcsetJpg)), @endif
      @if($productSrcsetWebp){{ $toSrcset($productSrcsetWebp) }}@endif
      @if(($productSrcsetAvif || $productSrcsetWebp) && $productSrcsetJpg), @endif
      @if($productSrcsetJpg){{ $toSrcset($productSrcsetJpg) }}@endif
    "
    imagesizes="{{ $productSizes }}"
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
        }
      },
      {
        "@type": "AutoPartsStore",
        "@id": "{{ url('/') }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": [
          "BSH",
          "RUGUEX",
          "BSH | Llantas de Montacargas"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png') }}"
        },
        "image": [
          "{{ $heroJpg }}"
        ],
        "description": "Distribuidor en México de llantas industriales Trelleborg para montacargas. Venta, asesoría técnica, entrega inmediata y atención a proyectos de manejo de materiales.",
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
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
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
          "Llantas neumáticas radiales para montacargas",
          "Llantas industriales Trelleborg",
          "Llantas para trabajo pesado",
          "Llantas para altas velocidades y trayectos largos",
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
          "url": "{{ $productImageJson }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg TR-900 Neumática Radial",
        "alternateName": [
          "Llanta neumática radial Trelleborg TR-900",
          "Llanta radial para montacargas TR-900",
          "Trelleborg TR900"
        ],
        "sku": "TR-900",
        "mpn": "TR-900",
        "category": "Industrial Tire",
        "image": [
          "{{ $productImageJson }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta neumática radial premium para montacargas Trelleborg TR-900, reforzada para altas velocidades y trabajo pesado. Ofrece gran capacidad de carga, excelente desempeño en trayectos largos y terracería, disipación eficiente de calor, ahorro de combustible y alta maniobrabilidad.",
        "additionalProperty": [
          { "@type": "PropertyValue", "name": "Tipo", "value": "Llanta neumática radial industrial para montacargas" },
          { "@type": "PropertyValue", "name": "Modelo", "value": "TR-900" },
          { "@type": "PropertyValue", "name": "Construcción", "value": "Radial" },
          { "@type": "PropertyValue", "name": "Aplicación", "value": "Montacargas" },
          { "@type": "PropertyValue", "name": "Uso recomendado", "value": "Altas velocidades, trabajo pesado, trayectos largos y terracería" },
          { "@type": "PropertyValue", "name": "Configuración", "value": "Llanta neumática premium" },
          { "@type": "PropertyValue", "name": "Beneficio principal", "value": "25% más vida llanta contra llanta, garantizado por escrito" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Lados super reforzados para soportar impactos de costado" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Ideal para recorridos largos con gran disipación de calor" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Permite mayor velocidad y excelente maniobrabilidad" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Huella amplia que absorbe más vibraciones, mejora estabilidad y aumenta vida de la banda" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Baja resistencia al rodado con ahorro evidente de combustible" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Protección contra explosiones" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Antiestática para ambientes riesgosos" }
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
          "eligibleRegion": {
            "@type": "Country",
            "name": "México"
          }
        },
        "subjectOf": {
          "@type": "CreativeWork",
          "name": "Ficha técnica Trelleborg TR-900",
          "url": "{{ $pdfFicha }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas neumáticas radiales Trelleborg TR-900 para montacargas",
        "serviceType": "Venta y asesoría de llantas neumáticas radiales industriales para montacargas",
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
        "name": "Medidas disponibles Trelleborg TR-900",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 13,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "5.00R8" },
          { "@type": "ListItem", "position": 2, "name": "6.00R9" },
          { "@type": "ListItem", "position": 3, "name": "6.50R10" },
          { "@type": "ListItem", "position": 4, "name": "7.00R12" },
          { "@type": "ListItem", "position": 5, "name": "28x9R15 / 225/75R15 (8.15R15)" },
          { "@type": "ListItem", "position": 6, "name": "7.00R15 / 29x8R15" },
          { "@type": "ListItem", "position": 7, "name": "250R15 / 250/70R15" },
          { "@type": "ListItem", "position": 8, "name": "300R15 / 315/70R15" },
          { "@type": "ListItem", "position": 9, "name": "8.25R15" },
          { "@type": "ListItem", "position": 10, "name": "10.00R20 / 290/95R20" },
          { "@type": "ListItem", "position": 11, "name": "12.00R20 / 330/95R20" },
          { "@type": "ListItem", "position": 12, "name": "12.00R24 / 330/95R24" },
          { "@type": "ListItem", "position": 13, "name": "14.00R24 / 385/95R24" }
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
            "name": "Trelleborg TR-900",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    ]
  }
  </script>
@endsection

@section('content')
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
            Con gran capacidad de carga y el mejor desempeño a altas velocidades, trayectos largos y en terracería.
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
          @if($productSrcsetAvif)
            <source type="image/avif" srcset="{{ $toSrcset($productSrcsetAvif) }}" sizes="{{ $productSizes }}">
          @endif
          @if($productSrcsetWebp)
            <source type="image/webp" srcset="{{ $toSrcset($productSrcsetWebp) }}" sizes="{{ $productSizes }}">
          @endif
          @if($productSrcsetJpg)
            <source type="image/jpeg" srcset="{{ $toSrcset($productSrcsetJpg) }}" sizes="{{ $productSizes }}">
          @endif

          <img
            src="{{ $productFallback }}"
            alt="Trelleborg tr-900"
            width="594"
            height="722"
            loading="eager"
            fetchpriority="high"
            decoding="async"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg TR-900 Neumática Radial
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
          Llanta neumática PREMIUM, reforzada y de construcción radial para altas velocidades y trabajo pesado.
        </p>

        <p class="mb-5 mt-6">
          25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Lados super reforzados para soportar cualquier impacto de costado.</li>
          <li>Ideal en recorridos largos con gran disipación de calor.</li>
          <li>Permite mayor velocidad en recorridos y excelente maniobrabilidad.</li>
          <li>Huella Amplia absorbe mas vibraciones, mejora estabilidad y aumenta vida de la banda.</li>
        </ul>

        <p class="mb-5 mt-6">
          Baja resistencia al rodado con ahorro evidente de combustible.
        </p>

        <p class="mb-5 mt-6">
          Protección contra explosiones; Anti estática para ambientes riesgosos.
        </p>
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
            href="{{ $pdfFicha }}"
            download="{{ $pdfFicha }}"
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
  style="content-visibility:auto; contain-intrinsic-size: 1200px;"
>
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1800px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Alternative Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Rim</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Product Dimensions [mm]<br>Overall Diameter</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Product Dimensions [mm]<br>Section Width</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Product Dimensions [mm]<br>Tread Depth</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Minimal Dual Spacing [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Inflation Pressure [bar]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tire Type</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Index</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Speed Symbol</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity [kg]<br>Counterbalanced Lift Trucks up to 25 km/h<br>Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity [kg]<br>Counterbalanced Lift Trucks up to 25 km/h<br>Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00R8</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">468</td>
              <td class="px-3 py-2 text-center text-neutral-700">137</td>
              <td class="px-3 py-2 text-center text-neutral-700">25</td>
              <td class="px-3 py-2 text-center text-neutral-700">158</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">111</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00R9</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">540</td>
              <td class="px-3 py-2 text-center text-neutral-700">162</td>
              <td class="px-3 py-2 text-center text-neutral-700">25</td>
              <td class="px-3 py-2 text-center text-neutral-700">192</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">121</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50R10</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">585</td>
              <td class="px-3 py-2 text-center text-neutral-700">180</td>
              <td class="px-3 py-2 text-center text-neutral-700">27</td>
              <td class="px-3 py-2 text-center text-neutral-700">212</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">128</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00R12</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">670</td>
              <td class="px-3 py-2 text-center text-neutral-700">190</td>
              <td class="px-3 py-2 text-center text-neutral-700">28</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">136</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2915</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9R15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75R15 (8.15R15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">706</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">25</td>
              <td class="px-3 py-2 text-center text-neutral-700">248</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">149</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4225</td>
              <td class="px-3 py-2 text-center text-neutral-700">3250</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00R15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">29x8R15</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">736</td>
              <td class="px-3 py-2 text-center text-neutral-700">195</td>
              <td class="px-3 py-2 text-center text-neutral-700">28</td>
              <td class="px-3 py-2 text-center text-neutral-700">236</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">143</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3540</td>
              <td class="px-3 py-2 text-center text-neutral-700">2725</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250R15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">250/70R15</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">736</td>
              <td class="px-3 py-2 text-center text-neutral-700">252</td>
              <td class="px-3 py-2 text-center text-neutral-700">27</td>
              <td class="px-3 py-2 text-center text-neutral-700">282</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">153</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300R15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">315/70R15</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">835</td>
              <td class="px-3 py-2 text-center text-neutral-700">312</td>
              <td class="px-3 py-2 text-center text-neutral-700">36</td>
              <td class="px-3 py-2 text-center text-neutral-700">345</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">165</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6695</td>
              <td class="px-3 py-2 text-center text-neutral-700">5150</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25R15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">838</td>
              <td class="px-3 py-2 text-center text-neutral-700">232</td>
              <td class="px-3 py-2 text-center text-neutral-700">32</td>
              <td class="px-3 py-2 text-center text-neutral-700">281</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">153</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00R20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">290/95R20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1062</td>
              <td class="px-3 py-2 text-center text-neutral-700">294</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">334</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">166</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6890</td>
              <td class="px-3 py-2 text-center text-neutral-700">5300</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00R20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95R20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1136</td>
              <td class="px-3 py-2 text-center text-neutral-700">320</td>
              <td class="px-3 py-2 text-center text-neutral-700">41</td>
              <td class="px-3 py-2 text-center text-neutral-700">378</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">176</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9230</td>
              <td class="px-3 py-2 text-center text-neutral-700">7100</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00R24</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95R24</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1232</td>
              <td class="px-3 py-2 text-center text-neutral-700">322</td>
              <td class="px-3 py-2 text-center text-neutral-700">39</td>
              <td class="px-3 py-2 text-center text-neutral-700">378</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">178</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9750</td>
              <td class="px-3 py-2 text-center text-neutral-700">7500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14.00R24</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">385/95R24</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1416</td>
              <td class="px-3 py-2 text-center text-neutral-700">390</td>
              <td class="px-3 py-2 text-center text-neutral-700">64</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">193</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">14950</td>
              <td class="px-3 py-2 text-center text-neutral-700">11500</td>
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
    background-image:url('{{ $heroJpg }}');
    background-image:image-set(
      url('{{ $heroDesktopAvif }}') type('image/avif') 1x,
      url('{{ $heroDesktopWebp }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
    );
    content-visibility:auto;
    contain-intrinsic-size: 900px;
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
          <div data-hs-form="tr900">
            <div id="hs-form-tr900"></div>

            <script>
              (() => {
                const init = () => {
                  const container = document.getElementById('hs-form-tr900');
                  const section = document.getElementById('contacto');
                  if (!container || !section) return;

                  let loaded = false;
                  let observer = null;

                  const createForm = () => {
                    if (!window.hbspt?.forms?.create || container.dataset.loaded === '1') return;
                    container.dataset.loaded = '1';
                    window.hbspt.forms.create({
                      portalId: "7547674",
                      formId: "26f426a7-e620-42df-98a3-43e10a899b6c",
                      target: "#hs-form-tr900"
                    });
                  };

                  const loadScript = () => {
                    if (loaded) {
                      createForm();
                      return;
                    }

                    loaded = true;

                    const script = document.createElement('script');
                    script.src = 'https://js.hsforms.net/forms/shell.js';
                    script.async = true;
                    script.defer = true;
                    script.charset = 'utf-8';
                    script.onload = createForm;
                    document.head.appendChild(script);
                  };

                  if ('IntersectionObserver' in window) {
                    observer = new IntersectionObserver((entries) => {
                      if (entries.some(entry => entry.isIntersecting)) {
                        loadScript();
                        observer.disconnect();
                      }
                    }, { rootMargin: '300px 0px' });

                    observer.observe(section);
                  } else {
                    window.addEventListener('load', loadScript, { once: true });
                  }

                  ['pointerdown', 'touchstart', 'keydown'].forEach((eventName) => {
                    window.addEventListener(eventName, loadScript, { once: true, passive: true });
                  });

                  if ('requestIdleCallback' in window) {
                    requestIdleCallback(loadScript, { timeout: 4000 });
                  } else {
                    setTimeout(loadScript, 4000);
                  }
                };

                if (document.readyState === 'loading') {
                  document.addEventListener('DOMContentLoaded', init, { once: true });
                } else {
                  init();
                }
              })();
            </script>

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
      background-image: url('{{ $heroJpg }}');
      background-image: image-set(
        url('{{ $heroMobileAvif }}') type('image/avif') 1x,
        url('{{ $heroMobileWebp }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endsection