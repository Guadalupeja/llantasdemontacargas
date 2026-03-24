@extends('layouts.public')

@section('title', 'Llantas sólidas para Montacargas | Trelleborg Ecosolid')
@section('meta_description', 'Cotiza en linea las llantas sólidas de Trelleborg para montacargas, únicas con Garantia de vida extendida. Entrega inmediata, Crédito y precio Mayoristas.')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload de la imagen principal real de la página --}}
  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/originals/TRELLEBORG-ECOSOLID-600x600.jpg') }}"
    imagesrcset="
      {{ asset('storage/variants/originals/TRELLEBORG-ECOSOLID-600x600-320.avif') }} 320w,
      {{ asset('storage/variants/originals/TRELLEBORG-ECOSOLID-600x600-480.avif') }} 480w,
      {{ asset('storage/variants/originals/TRELLEBORG-ECOSOLID-600x600-640.avif') }} 640w,
      {{ asset('storage/variants/originals/TRELLEBORG-ECOSOLID-600x600-768.avif') }} 768w,
      {{ asset('storage/variants/originals/TRELLEBORG-ECOSOLID-600x600-960.avif') }} 960w
    "
    imagesizes="(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px">

  {{-- Preload ligero del hero de contacto, sin competir demasiado con la imagen principal --}}
  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }}"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }} 960w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} 1024w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }} 960w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} 1024w,
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} 1600w
    "
    imagesizes="100vw">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Llantas para Montacargas, Minicargadores y Telehandlers | RUGUEX",
        "inLanguage": "es-MX",
        "publisher": {
          "@id": "{{ url('/') }}#organization"
        }
      },
      {
        "@type": "Organization",
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
          "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        ],
        "description": "Distribuidor en México de llantas industriales Trelleborg para montacargas. Venta, asesoría técnica, entrega inmediata, crédito y atención a proyectos de manejo de materiales.",
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
        "brand": [
          {
            "@type": "Brand",
            "name": "RUGUEX"
          },
          {
            "@type": "Brand",
            "name": "Trelleborg"
          }
        ],
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
          "Llantas sólidas para montacargas",
          "Llantas industriales Trelleborg",
          "Llantas libres de mantenimiento",
          "Llantas imponchables para montacargas",
          "Llantas para cargas ligeras",
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
        "mainEntity": {
          "@id": "{{ url()->current() }}#product"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/TRELLEBORG-ECOSOLID-600x600.jpg') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg ECOSOLID",
        "alternateName": [
          "Llanta sólida para montacargas Trelleborg ECOSOLID",
          "Llanta sólida Trelleborg Ecosolid",
          "Trelleborg Ecosolid"
        ],
        "sku": "ECOSOLID",
        "mpn": "ECOSOLID",
        "category": "Industrial Tire",
        "image": [
          "{{ asset('storage/originals/TRELLEBORG-ECOSOLID-600x600.jpg') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta sólida económica para montacargas, apiladores y carretillas en aplicaciones ligeras. Libre de mantenimiento, imponchable y con diseño de huella agresivo para brindar buena tracción en pisos lisos. Integra base reforzada de acero, indicador de desgaste y rango de medidas de 8 a 15 pulgadas.",
        "material": "Hule industrial con base reforzada de acero",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida industrial para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "ECOSOLID"
          },
          {
            "@type": "PropertyValue",
            "name": "Construcción",
            "value": "Sólida"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas, apiladores y carretillas"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Aplicaciones ligeras"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Libre de mantenimiento"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Imponchable"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Huella agresiva para buena tracción en pisos lisos"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Base reforzada de acero para mejorar durabilidad y desempeño"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Indicador de desgaste incluido en el perfil"
          },
          {
            "@type": "PropertyValue",
            "name": "Rango de medidas",
            "value": "De 8 a 15 pulgadas"
          }
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
          "name": "Ficha técnica Trelleborg ECOSOLID",
          "url": "{{ asset('pdfs/Trelleborg_MH_Res_EcoSolid_PDF_US_LR.pdf') }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Trelleborg ECOSOLID para montacargas",
        "serviceType": "Venta y asesoría de llantas sólidas industriales para montacargas",
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
        "name": "Medidas disponibles Trelleborg ECOSOLID",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 8,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "5.00-8" },
          { "@type": "ListItem", "position": 2, "name": "6.00-9" },
          { "@type": "ListItem", "position": 3, "name": "6.50-10" },
          { "@type": "ListItem", "position": 4, "name": "7.00-12" },
          { "@type": "ListItem", "position": 5, "name": "8.25-15" },
          { "@type": "ListItem", "position": 6, "name": "28x9-15 / 225/75-15 (8.15-15)" },
          { "@type": "ListItem", "position": 7, "name": "250-15 / 250/70-15" },
          { "@type": "ListItem", "position": 8, "name": "300-15 / 315/70-15" }
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
            "name": "Llantas sólidas para montacargas",
            "item": "{{ url()->current() }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg ECOSOLID",
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
  $variants = image_variants('originals/TRELLEBORG-ECOSOLID-600x600.jpg');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/TRELLEBORG-ECOSOLID-600x600.jpg');
  $toSrcset = fn($arr) => implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
@endphp

<section class="relative" role="region" aria-label="Resumen PS800" style="content-visibility:auto;contain-intrinsic-size:600px;">
  <div class="mx-auto max-w-[1140px] relative">
    <div class="w-full relative min-h-px flex">
      <div class="w-full p-[10px] flex flex-wrap content-start">
        <div class="w-full h-[68px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 font-sans font-semibold text-[22px] leading-[22px] lg:text-[32px] lg:leading-[32px] text-black">
            Llantas Sólidas para Montacargas.
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a]">
            Llantas libres de mantenimiento, imponchables y óptimas para cualquier superficie y carga.
          </p>
        </div>

        <div class="w-full h-[26px]" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>

<section class="relative" role="region" aria-label="Detalle PS800" style="content-visibility:auto;contain-intrinsic-size:1000px;">
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
            width="600"
            height="600"
            src="{{ $fallback }}"
            alt="Trelleborg Ecosolid"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg ECOSOLID
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
          Una llanta sólida muy económica para montacargas, apiladores y carretillas en aplicaciones ligeras.
        </p>

        <p class="mb-5 mt-6">
          Diseño de huella agresivo brinda buena tracción en pisos lisos.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Base reforzada de acero mejora durabilidad y desempeño.</li>
          <li>Rango de medidas de 8” a 15”.</li>
          <li>Indicador de desgaste incluido en el perfil.</li>
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
            href="{{ asset('pdfs/Trelleborg_MH_Res_EcoSolid_PDF_US_LR.pdf') }}"
            download="Trelleborg_MH_Res_EcoSolid_PDF_US_LR.pdf"
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

<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades" style="content-visibility:auto;contain-intrinsic-size:1200px;">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1600px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Alternative Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Rim Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tire Dimensions [in] <br> Overall Diameter</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tire Dimensions [in] <br> Section Width</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Static</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Forklift Trucks up to 15 mph <br> Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Forklift Trucks up to 15 mph <br> Steering Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight (lbs)</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.8</td>
              <td class="px-3 py-2 text-center text-neutral-700">3640</td>
              <td class="px-3 py-2 text-center text-neutral-700">3120</td>
              <td class="px-3 py-2 text-center text-neutral-700">2405</td>
              <td class="px-3 py-2 text-center text-neutral-700">31</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4830</td>
              <td class="px-3 py-2 text-center text-neutral-700">4155</td>
              <td class="px-3 py-2 text-center text-neutral-700">3195</td>
              <td class="px-3 py-2 text-center text-neutral-700">52</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">22</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">5995</td>
              <td class="px-3 py-2 text-center text-neutral-700">5160</td>
              <td class="px-3 py-2 text-center text-neutral-700">3970</td>
              <td class="px-3 py-2 text-center text-neutral-700">72</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">26</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.6</td>
              <td class="px-3 py-2 text-center text-neutral-700">7450</td>
              <td class="px-3 py-2 text-center text-neutral-700">6435</td>
              <td class="px-3 py-2 text-center text-neutral-700">4940</td>
              <td class="px-3 py-2 text-center text-neutral-700">94</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">31</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.1</td>
              <td class="px-3 py-2 text-center text-neutral-700">12145</td>
              <td class="px-3 py-2 text-center text-neutral-700">10470</td>
              <td class="px-3 py-2 text-center text-neutral-700">8045</td>
              <td class="px-3 py-2 text-center text-neutral-700">166</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">225/75-15 (8.15-15)</h2>
              </td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">27</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">8820</td>
              <td class="px-3 py-2 text-center text-neutral-700">7595</td>
              <td class="px-3 py-2 text-center text-neutral-700">5840</td>
              <td class="px-3 py-2 text-center text-neutral-700">118</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/70-15</h2>
              </td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">28</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">12145</td>
              <td class="px-3 py-2 text-center text-neutral-700">10460</td>
              <td class="px-3 py-2 text-center text-neutral-700">8045</td>
              <td class="px-3 py-2 text-center text-neutral-700">134</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2>
              </th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">315/70-15</h2>
              </td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">32</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">14980</td>
              <td class="px-3 py-2 text-center text-neutral-700">12895</td>
              <td class="px-3 py-2 text-center text-neutral-700">9920</td>
              <td class="px-3 py-2 text-center text-neutral-700">223</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="h-[68px]" aria-hidden="true"></div>
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  "
  role="region"
  aria-label="Formulario de cotización"
  style="content-visibility:auto;contain-intrinsic-size:900px;"
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
            id="hubspot-form-container"
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

<script>
  (() => {
    const container = document.getElementById('hubspot-form-container');
    if (!container) return;

    let loaded = false;

    const createForm = () => {
      if (loaded) return;
      loaded = true;

      const init = () => {
        if (window.hbspt?.forms?.create) {
          window.hbspt.forms.create({
            portalId: container.dataset.portalId,
            formId: container.dataset.formId,
            target: '#hubspot-form-container'
          });
        }
      };

      if (window.hbspt?.forms?.create) {
        init();
        return;
      }

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';
      script.onload = init;
      document.head.appendChild(script);
    };

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        if (entries.some(entry => entry.isIntersecting)) {
          createForm();
          observer.disconnect();
        }
      }, {
        rootMargin: '300px 0px'
      });

      observer.observe(container);
    } else {
      if ('requestIdleCallback' in window) {
        requestIdleCallback(createForm, { timeout: 2000 });
      } else {
        setTimeout(createForm, 1200);
      }
    }
  })();
</script>
@endsection