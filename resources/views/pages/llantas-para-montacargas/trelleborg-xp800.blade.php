@extends('layouts.public')

@section('title', 'Mejores llantas sólidas para Montacargas | Trelleborg xp800')
@section('meta_description', 'Precios Mayorista, Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más. Llantas Sólida para Montacargas XP800. Envío todo México')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }},
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }},
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}
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
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/XP800_660x660.webp') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg XP800",
        "alternateName": [
          "Llanta sólida para montacargas Trelleborg XP800",
          "Llanta sólida XP800",
          "Trelleborg XP 800"
        ],
        "sku": "XP800",
        "mpn": "XP800",
        "category": "Industrial Tire",
        "image": [
          "{{ asset('storage/originals/XP800_660x660.webp') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta sólida estándar para montacargas Trelleborg XP800. Libre de mantenimiento, imponchable y apta para montacargas eléctricos y de combustión. Ofrece gran desempeño a bajo costo para aplicaciones de menor demanda o transporte de cargas ligeras, con estabilidad mejorada, baja resistencia a la rodadura, absorción de impactos y excelente resistencia a los cortes.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida industrial para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "XP800"
          },
          {
            "@type": "PropertyValue",
            "name": "Construcción",
            "value": "Sólida"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas eléctricos y de combustión"
          },
          {
            "@type": "PropertyValue",
            "name": "Segmento",
            "value": "Estándar"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Aplicaciones de menor demanda y transporte de cargas ligeras"
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
            "value": "Disponible en compuesto Non-Marking"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Diseño de banda de rodadura en bloque"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Estabilidad mejorada"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Baja resistencia a la rodadura para mejorar la eficiencia energética"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Absorción de impactos"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Excelente resistencia a los cortes"
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
          "name": "Ficha técnica Trelleborg XP800",
          "url": "{{ asset('pdfs/TWS_XP800_ENG.pdf') }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Trelleborg XP800 para montacargas",
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
        "name": "Medidas disponibles Trelleborg XP800",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 21,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "4.00-8" },
          { "@type": "ListItem", "position": 2, "name": "15x4½-8 / 125/75-8" },
          { "@type": "ListItem", "position": 3, "name": "5.00-8" },
          { "@type": "ListItem", "position": 4, "name": "16x6-8 / 150/75-8" },
          { "@type": "ListItem", "position": 5, "name": "18x7-8 / 180/70-8" },
          { "@type": "ListItem", "position": 6, "name": "140/55-9 / 15x5.5-9" },
          { "@type": "ListItem", "position": 7, "name": "6.00-9" },
          { "@type": "ListItem", "position": 8, "name": "21x8-9 / 200/75-9" },
          { "@type": "ListItem", "position": 9, "name": "6.50-10" },
          { "@type": "ListItem", "position": 10, "name": "200/50-10" },
          { "@type": "ListItem", "position": 11, "name": "23x9-10 / 225/75-10" },
          { "@type": "ListItem", "position": 12, "name": "7.00-12" },
          { "@type": "ListItem", "position": 13, "name": "23x10-12 / 250/60-12" },
          { "@type": "ListItem", "position": 14, "name": "27x10-12 / 250/75-12" },
          { "@type": "ListItem", "position": 15, "name": "7.00-15 / 29x8-15" },
          { "@type": "ListItem", "position": 16, "name": "7.50-15" },
          { "@type": "ListItem", "position": 17, "name": "8.25-15" },
          { "@type": "ListItem", "position": 18, "name": "28x9-15 / 225/75-15 (8.15-15)" },
          { "@type": "ListItem", "position": 19, "name": "250-15 / 250/70-15" },
          { "@type": "ListItem", "position": 20, "name": "300-15 / 315/70-15" },
          { "@type": "ListItem", "position": 21, "name": "355/65-15 / 32x12½-15 (350-15)" }
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
            "name": "Trelleborg XP800",
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
  $variants = image_variants('originals/XP800_660x660.webp');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = !empty($variants['avif']) ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['avif'])) : null;
  $srcsetWebp = !empty($variants['webp']) ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['webp'])) : null;
  $srcsetJpg  = !empty($variants['jpg'])  ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['jpg']))  : null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/XP800_660x660.webp');
@endphp

<section class="relative" role="region" aria-label="Resumen PS800">
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
            Llantas Sólidas, libres de mantenimiento, imponchables y óptimas para cualquier superficie y carga.
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
            <source type="image/avif" srcset="{{ $srcsetAvif }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetWebp)
            <source type="image/webp" srcset="{{ $srcsetWebp }}" sizes="{{ $sizes }}">
          @endif
          @if($srcsetJpg)
            <source type="image/jpeg" srcset="{{ $srcsetJpg }}" sizes="{{ $sizes }}">
          @endif

          <img
            fetchpriority="high"
            loading="eager"
            decoding="async"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Trelleborg XP800"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg XP800
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
          Una llanta sólida de segmento ESTÁNDAR. Gran desempeño a precio bajo para aplicaciones de menor demanda o para el transporte de cargas ligeras
        </p>

        <p class="mb-5 mt-6">
          Apta para montacargas eléctricos y de combustión.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Disponible en: Non-Marking – Un compuesto de gran rendimiento que no mancha. Apto para las aplicaciones donde es importante el cuidado del suelo.</li>
          <li>Diseño de banda de rodadura en bloque. La huella grande reduce la tensión y maximiza la vida útil de los neumáticos.</li>
          <li>Estabilidad mejorada.</li>
          <li>Baja resistencia a la rodadura para mejorar la eficiencia energética.</li>
          <li>Absorción de impactos. El neumático absorbe los golpes de los obstáculos.</li>
          <li>Excelente resistencia a los cortes.</li>
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
            href="{{ asset('pdfs/TWS_XP800_ENG.pdf') }}"
            download="TWS_XP800_ENG.pdf"
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
  style="content-visibility:auto;contain-intrinsic-size:1200px;"
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
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Other<br>Static</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Counterbalanced Lift Trucks up to 25 km/h<br>Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity<br>Counterbalanced Lift Trucks up to 25 km/h<br>Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">398</td>
              <td class="px-3 py-2 text-center text-neutral-700">94</td>
              <td class="px-3 py-2 text-center text-neutral-700">1100</td>
              <td class="px-3 py-2 text-center text-neutral-700">950</td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">125/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">373</td>
              <td class="px-3 py-2 text-center text-neutral-700">110</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">452</td>
              <td class="px-3 py-2 text-center text-neutral-700">114</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">150/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">409</td>
              <td class="px-3 py-2 text-center text-neutral-700">143</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">180/70-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">445</td>
              <td class="px-3 py-2 text-center text-neutral-700">147</td>
              <td class="px-3 py-2 text-center text-neutral-700">2490</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">140/55-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">15x5.5-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">132</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">520</td>
              <td class="px-3 py-2 text-center text-neutral-700">130</td>
              <td class="px-3 py-2 text-center text-neutral-700">2190</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">200/75-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">51=4</td>
              <td class="px-3 py-2 text-center text-neutral-700">180</td>
              <td class="px-3 py-2 text-center text-neutral-700">3200</td>
              <td class="px-3 py-2 text-center text-neutral-700">2755</td>
              <td class="px-3 py-2 text-center text-neutral-700">2120</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">568</td>
              <td class="px-3 py-2 text-center text-neutral-700">153</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">200/50-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">175</td>
              <td class="px-3 py-2 text-center text-neutral-700">2870</td>
              <td class="px-3 py-2 text-center text-neutral-700">2470</td>
              <td class="px-3 py-2 text-center text-neutral-700">1900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x9-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">574</td>
              <td class="px-3 py-2 text-center text-neutral-700">187</td>
              <td class="px-3 py-2 text-center text-neutral-700">4000</td>
              <td class="px-3 py-2 text-center text-neutral-700">3445</td>
              <td class="px-3 py-2 text-center text-neutral-700">2650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">646</td>
              <td class="px-3 py-2 text-center text-neutral-700">163</td>
              <td class="px-3 py-2 text-center text-neutral-700">3380</td>
              <td class="px-3 py-2 text-center text-neutral-700">2920</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/60-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">570</td>
              <td class="px-3 py-2 text-center text-neutral-700">219</td>
              <td class="px-3 py-2 text-center text-neutral-700">4380</td>
              <td class="px-3 py-2 text-center text-neutral-700">3770</td>
              <td class="px-3 py-2 text-center text-neutral-700">2900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/75-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">670</td>
              <td class="px-3 py-2 text-center text-neutral-700">235</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">29x8-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">717</td>
              <td class="px-3 py-2 text-center text-neutral-700">162</td>
              <td class="px-3 py-2 text-center text-neutral-700">4115</td>
              <td class="px-3 py-2 text-center text-neutral-700">3545</td>
              <td class="px-3 py-2 text-center text-neutral-700">2725</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">743</td>
              <td class="px-3 py-2 text-center text-neutral-700">186</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">803</td>
              <td class="px-3 py-2 text-center text-neutral-700">192</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-15 (8.15-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">680</td>
              <td class="px-3 py-2 text-center text-neutral-700">200</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">709</td>
              <td class="px-3 py-2 text-center text-neutral-700">206</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">709</td>
              <td class="px-3 py-2 text-center text-neutral-700">206</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">315/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">807</td>
              <td class="px-3 py-2 text-center text-neutral-700">244</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5850</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/65-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">32x12½-15 (350-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">809</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">9060</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="8" class="px-3 py-3 text-center text-xs"></td>
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
    contain-intrinsic-size:800px;
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]" aria-hidden="true"></div></div>

        <div class="z-10 w-full text-center mb-5">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 w-full mb-5">
          <div
            id="hs-form-container"
            data-hs-forms-root="true"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
            class="min-h-[120px]"
          ></div>
          <noscript>
            <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
          </noscript>
        </div>

        <div class="w-full"><div class="h-[104px]" aria-hidden="true"></div></div>
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
  (function () {
    const container = document.getElementById('hs-form-container');
    if (!container) return;

    let loaded = false;
    let scriptLoading = false;

    function createForm() {
      if (!window.hbspt || !window.hbspt.forms || !window.hbspt.forms.create || container.dataset.rendered === 'true') {
        return;
      }

      window.hbspt.forms.create({
        portalId: container.dataset.portalId,
        formId: container.dataset.formId,
        target: '#hs-form-container'
      });

      container.dataset.rendered = 'true';
    }

    function loadHubspot() {
      if (loaded || scriptLoading) {
        createForm();
        return;
      }

      scriptLoading = true;
      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.onload = function () {
        loaded = true;
        createForm();
      };
      document.head.appendChild(script);
    }

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        if (entries.some(entry => entry.isIntersecting)) {
          loadHubspot();
          observer.disconnect();
        }
      }, { rootMargin: '300px 0px' });

      observer.observe(container);
    } else {
      loadHubspot();
    }

    document.addEventListener('click', function (e) {
      const link = e.target.closest('a[href="#contacto"]');
      if (link) loadHubspot();
    }, { passive: true });

    if ('requestIdleCallback' in window) {
      requestIdleCallback(() => {
        const rect = container.getBoundingClientRect();
        if (rect.top < window.innerHeight * 1.5) loadHubspot();
      }, { timeout: 2500 });
    } else {
      setTimeout(() => {
        const rect = container.getBoundingClientRect();
        if (rect.top < window.innerHeight * 1.5) loadHubspot();
      }, 1500);
    }
  })();
</script>
@endsection