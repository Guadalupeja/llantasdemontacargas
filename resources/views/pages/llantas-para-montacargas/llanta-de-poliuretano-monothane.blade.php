@extends('layouts.public')

@section('title', 'Ruedas de Poliuretano para Montacargas y Patines | MONOTHANE')
@section('meta_description', 'Cotiza llantas Premium de Poliuretano con Entrega inmediata, Precios Mayorista y el mejor rendimiento para Montacargas y patines de la marca Trelleborg.')

@php
  $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroJpg      = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroWebp960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

  $productOriginal = 'originals/Trelleborg_Polyurethane_Monothane_660x660.webp';
  $productImageUrl = asset('storage/originals/Trelleborg_Polyurethane_Monothane_660x660.webp');

  $variants = image_variants($productOriginal);
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? $productImageUrl;

  $toSrcset = static function ($arr) {
      return implode(', ', array_map(static fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  };
@endphp

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Precarga de la imagen principal real de la vista --}}
  <link
    rel="preload"
    as="image"
    href="{{ $fallback }}"
    imagesizes="{{ $sizes }}"
    @if($srcsetAvif)
      imagesrcset="{{ $toSrcset($srcsetAvif) }}"
    @elseif($srcsetWebp)
      imagesrcset="{{ $toSrcset($srcsetWebp) }}"
    @elseif($srcsetJpg)
      imagesrcset="{{ $toSrcset($srcsetJpg) }}"
    @endif
    fetchpriority="high"
  >

  {{-- Hero inferior, no LCP, se mantiene sin cambiar diseño --}}
  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ $heroAvif1024 }} type('image/avif'),
      {{ $heroWebp1024 }} type('image/webp'),
      {{ $heroJpg }} type('image/jpeg')
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
          "BSH | Llantas de Montacargas"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ $heroJpg }}"
        },
        "image": [
          "{{ $heroJpg }}"
        ],
        "description": "Somos una comercializadora de equipos y refacciones especializadas al servicio de la industria en México. Distribuimos desde 2010 la gama de producto Trelleborg, incluyendo llantas premium para manejo de materiales, ruedas de poliuretano para montacargas y patines, con stock, asistencia técnica, entrega directa en sitio y precios competitivos.",
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
          "Ruedas de poliuretano para montacargas",
          "Ruedas de poliuretano para patines",
          "Llantas de poliuretano Trelleborg",
          "Ruedas press-on de poliuretano",
          "Ruedas industriales para frigoríficos y congeladores",
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
          "url": "{{ $productImageUrl }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Llanta de Poliuretano Monothane®",
        "alternateName": [
          "MONOTHANE",
          "Monothane",
          "Trelleborg Monothane",
          "Llanta de Poliuretano Monothane",
          "Rueda de Poliuretano Monothane Press-On"
        ],
        "sku": "MONOTHANE",
        "mpn": "MONOTHANE",
        "category": "IndustrialTire",
        "image": [
          "{{ $productImageUrl }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta de poliuretano Monothane de alta calidad con anillo metálico Press-On para montacargas y patines. Diseñada para almacenes y suelos uniformes, con conducción suave y silenciosa, resistencia a fisuras, ahorro de combustible, excelente disipación de calor y opción de diseños antiderrapantes para pisos mojados.",
        "additionalProperty": [
          { "@type": "PropertyValue", "name": "Tipo", "value": "Llanta o rueda de poliuretano Press-On con anillo metálico" },
          { "@type": "PropertyValue", "name": "Aplicación", "value": "Montacargas y patines" },
          { "@type": "PropertyValue", "name": "Uso recomendado", "value": "Almacenes, suelos uniformes, frigoríficos y congeladores" },
          { "@type": "PropertyValue", "name": "Beneficio principal", "value": "25% más vida útil llanta contra llanta, garantizado por escrito" },
          { "@type": "PropertyValue", "name": "Dureza disponible", "value": "83 Shore A y 92 Shore A" },
          { "@type": "PropertyValue", "name": "Configuración", "value": "Press-On con anillo metálico" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Largos recorridos con carga" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Resistente a fisuras" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Conducción suave y silenciosa" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Ideal para frigoríficos y congeladores" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Disponible en diseños antiderrapantes para pisos mojados" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Ahorro de combustible notable" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Compuesto con alta disipación y resistencia al calor" }
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
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para ruedas de poliuretano Monothane para montacargas y patines",
        "serviceType": "Venta y asesoría de ruedas industriales de poliuretano",
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
        "@id": "{{ url()->current() }}#sizes",
        "name": "Medidas disponibles Monothane",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 49,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "8x4½x4½" },
          { "@type": "ListItem", "position": 2, "name": "9x5x5" },
          { "@type": "ListItem", "position": 3, "name": "8x4x6¼" },
          { "@type": "ListItem", "position": 4, "name": "10x5x6¼" },
          { "@type": "ListItem", "position": 5, "name": "10x6x6¼" },
          { "@type": "ListItem", "position": 6, "name": "10x7x6¼" },
          { "@type": "ListItem", "position": 7, "name": "10x5x6½" },
          { "@type": "ListItem", "position": 8, "name": "10x5x6½ Crown" },
          { "@type": "ListItem", "position": 9, "name": "10½x5x6½" },
          { "@type": "ListItem", "position": 10, "name": "10½x7x6½" },
          { "@type": "ListItem", "position": 11, "name": "12x3½x8" },
          { "@type": "ListItem", "position": 12, "name": "12x4x8" },
          { "@type": "ListItem", "position": 13, "name": "12x4½x8" },
          { "@type": "ListItem", "position": 14, "name": "12x5x8 Standard Load" },
          { "@type": "ListItem", "position": 15, "name": "12x5x8 High Load" },
          { "@type": "ListItem", "position": 16, "name": "12x5½x8" },
          { "@type": "ListItem", "position": 17, "name": "13x4½x8" },
          { "@type": "ListItem", "position": 18, "name": "13½x4½x8 Standard Load" },
          { "@type": "ListItem", "position": 19, "name": "13½x4½x8 High Load" },
          { "@type": "ListItem", "position": 20, "name": "13x5½x8" },
          { "@type": "ListItem", "position": 21, "name": "13½x5½x8" },
          { "@type": "ListItem", "position": 22, "name": "14x4½x8" },
          { "@type": "ListItem", "position": 23, "name": "12x5x9" },
          { "@type": "ListItem", "position": 24, "name": "13x5½x9½" },
          { "@type": "ListItem", "position": 25, "name": "13½x6x10" },
          { "@type": "ListItem", "position": 26, "name": "13x6x10½" },
          { "@type": "ListItem", "position": 27, "name": "13½x6x10½" },
          { "@type": "ListItem", "position": 28, "name": "16x5x10½" },
          { "@type": "ListItem", "position": 29, "name": "16x6x10½" },
          { "@type": "ListItem", "position": 30, "name": "15x5x11¼" },
          { "@type": "ListItem", "position": 31, "name": "15x6x11¼" },
          { "@type": "ListItem", "position": 32, "name": "15x7x11¼" },
          { "@type": "ListItem", "position": 33, "name": "15x9x11¼" },
          { "@type": "ListItem", "position": 34, "name": "16¼x6x11¼" },
          { "@type": "ListItem", "position": 35, "name": "16¼x7x11¼" },
          { "@type": "ListItem", "position": 36, "name": "17x4½x121/8" },
          { "@type": "ListItem", "position": 37, "name": "18x5x121/8" },
          { "@type": "ListItem", "position": 38, "name": "18x6x121/8" },
          { "@type": "ListItem", "position": 39, "name": "18x7x121/8" },
          { "@type": "ListItem", "position": 40, "name": "18x8x121/8" },
          { "@type": "ListItem", "position": 41, "name": "18x9x121/8" },
          { "@type": "ListItem", "position": 42, "name": "21x7x15" },
          { "@type": "ListItem", "position": 43, "name": "21x8x15" },
          { "@type": "ListItem", "position": 44, "name": "20x8x16" },
          { "@type": "ListItem", "position": 45, "name": "22x8x16" },
          { "@type": "ListItem", "position": 46, "name": "22X9x16" },
          { "@type": "ListItem", "position": 47, "name": "22X10x16" },
          { "@type": "ListItem", "position": 48, "name": "22x12x16" },
          { "@type": "ListItem", "position": 49, "name": "28x10x22" }
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
            "name": "Llantas de poliuretano para montacargas",
            "item": "{{ url('/llantas-de-poliuretano-para-montacargas') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "MONOTHANE",
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
  <div class="relative mx-auto max-w-[1140px]">
    <div class="relative flex w-full min-h-px">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="mb-5 h-[68px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <h1 class="m-0 font-sans text-[22px] font-semibold leading-[22px] text-black lg:text-[32px] lg:leading-[32px]">
            Llantas de Poliuretano para Montacargas
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 text-[#7a7a7a]">
            Ruedas que soportan grandes cargas, en almacenes, pasillos, congeladores y suelos en buen estado.
          </p>
        </div>

        <div class="h-[26px] w-full" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>

<section class="relative" role="region" aria-label="Detalle PS800">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    <div class="w-full p-[10px] md:w-[32.708%]">
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
            alt="Trelleborg mono-thane"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] font-semibold leading-[33px] text-black lg:text-[43px] lg:leading-[43px]">
        Llanta de Poliuretano Monothane®.
      </h2>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div>
        <a
          href="#contacto"
          class="mt-6 inline-block rounded-[3px] bg-[#e76a3e] px-6 py-3 text-[20px] font-medium leading-[30px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#ff6d00]/60 focus:ring-offset-2"
        >
          <span class="flex justify-center">
            <span class="block">25% mas vida llanta contra llanta, GARANTIZADO por escrito.</span>
          </span>
        </a>
      </div>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div class="text-[#7a7a7a] leading-[29px]">
        <p class="mb-5 mt-6">
          Llanta de poliuretano de alta calidad con anillo metálico Press-On, para almacenes y suelos uniformes.
        </p>

        <p class="mb-5 mt-6">
          Serie PREMIUM para gran carga disponibles dureza 83 Shore A y 92 Shore A; de materiales de primera y diseño exclusivo.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Largos recorridos con carga.</li>
          <li>Resistente a fisuras.</li>
          <li>Conducción suave y silenciosa.</li>
          <li>Ideal para frigoríficos, congeladores.</li>
          <li>Disponible en diseños antiderrapantes para pisos mojados.</li>
          <li>Ahorro de combustible notable.</li>
          <li>Compuesto único con la mejor disipación y resistencia al calor.</li>
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
            href="{{ asset('pdfs/Trelleborg_ICT_MH_POS_Monothane_PDF_US_LR.pdf') }}"
            target="_blank"
            download="{{ asset('pdfs/Trelleborg_ICT_MH_POS_Monothane_PDF_US_LR.pdf') }}"
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

<div class="h-[10px] lg:h-[35px]" aria-hidden="true"></div>

<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1000px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Compound</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Profile</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity (lbs)<br>10 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity (lbs)<br>6 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight (lbs)</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8x4½x4½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2150</td><td class="px-3 py-2 text-center text-neutral-700">2430</td><td class="px-3 py-2 text-center text-neutral-700">11</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9x5x5</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2680</td><td class="px-3 py-2 text-center text-neutral-700">3020</td><td class="px-3 py-2 text-center text-neutral-700">16</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8x4x6¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">1500</td><td class="px-3 py-2 text-center text-neutral-700">1700</td><td class="px-3 py-2 text-center text-neutral-700">10</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x5x6¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2890</td><td class="px-3 py-2 text-center text-neutral-700">3270</td><td class="px-3 py-2 text-center text-neutral-700">19</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x6x6¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3540</td><td class="px-3 py-2 text-center text-neutral-700">4000</td><td class="px-3 py-2 text-center text-neutral-700">23</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x7x6¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4240</td><td class="px-3 py-2 text-center text-neutral-700">4770</td><td class="px-3 py-2 text-center text-neutral-700">24</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x5x6½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2830</td><td class="px-3 py-2 text-center text-neutral-700">3190</td><td class="px-3 py-2 text-center text-neutral-700">17</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x5x6½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Crown</td><td class="px-3 py-2 text-center text-neutral-700">2830</td><td class="px-3 py-2 text-center text-neutral-700">3190</td><td class="px-3 py-2 text-center text-neutral-700">17</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x5x6½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2290</td><td class="px-3 py-2 text-center text-neutral-700">3380</td><td class="px-3 py-2 text-center text-neutral-700">21</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x7x6½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4450</td><td class="px-3 py-2 text-center text-neutral-700">5040</td><td class="px-3 py-2 text-center text-neutral-700">29</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x3½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2110</td><td class="px-3 py-2 text-center text-neutral-700">2390</td><td class="px-3 py-2 text-center text-neutral-700">18</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x4x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2510</td><td class="px-3 py-2 text-center text-neutral-700">2840</td><td class="px-3 py-2 text-center text-neutral-700">20</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x4½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">2910</td><td class="px-3 py-2 text-center text-neutral-700">3300</td><td class="px-3 py-2 text-center text-neutral-700">22</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x5x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3320</td><td class="px-3 py-2 text-center text-neutral-700">3750</td><td class="px-3 py-2 text-center text-neutral-700">25</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x5x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3320</td><td class="px-3 py-2 text-center text-neutral-700">3750</td><td class="px-3 py-2 text-center text-neutral-700">26</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x5½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3710</td><td class="px-3 py-2 text-center text-neutral-700">4200</td><td class="px-3 py-2 text-center text-neutral-700">26</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x4½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3130</td><td class="px-3 py-2 text-center text-neutral-700">3540</td><td class="px-3 py-2 text-center text-neutral-700">23</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x4½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3620</td><td class="px-3 py-2 text-center text-neutral-700">3200</td><td class="px-3 py-2 text-center text-neutral-700">24</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x4½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3620</td><td class="px-3 py-2 text-center text-neutral-700">3200</td><td class="px-3 py-2 text-center text-neutral-700">24</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x5½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4060</td><td class="px-3 py-2 text-center text-neutral-700">4590</td><td class="px-3 py-2 text-center text-neutral-700">28</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x5½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4200</td><td class="px-3 py-2 text-center text-neutral-700">4740</td><td class="px-3 py-2 text-center text-neutral-700">30</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14x4½x8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3260</td><td class="px-3 py-2 text-center text-neutral-700">3680</td><td class="px-3 py-2 text-center text-neutral-700">25</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x5x9</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4800</td><td class="px-3 py-2 text-center text-neutral-700">5510</td><td class="px-3 py-2 text-center text-neutral-700">21</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x5½x9½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">5545</td><td class="px-3 py-2 text-center text-neutral-700">6300</td><td class="px-3 py-2 text-center text-neutral-700">26</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x6x10</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">6320</td><td class="px-3 py-2 text-center text-neutral-700">7140</td><td class="px-3 py-2 text-center text-neutral-700">30</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x6x10½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">6600</td><td class="px-3 py-2 text-center text-neutral-700">7500</td><td class="px-3 py-2 text-center text-neutral-700">27</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x6x10½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">6605</td><td class="px-3 py-2 text-center text-neutral-700">7460</td><td class="px-3 py-2 text-center text-neutral-700">29</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x5x10½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4200</td><td class="px-3 py-2 text-center text-neutral-700">4760</td><td class="px-3 py-2 text-center text-neutral-700">37</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6x10½</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">5330</td><td class="px-3 py-2 text-center text-neutral-700">6040</td><td class="px-3 py-2 text-center text-neutral-700">44</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x5x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3880</td><td class="px-3 py-2 text-center text-neutral-700">4390</td><td class="px-3 py-2 text-center text-neutral-700">25</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x6x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4800</td><td class="px-3 py-2 text-center text-neutral-700">5440</td><td class="px-3 py-2 text-center text-neutral-700">29</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x7x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">5730</td><td class="px-3 py-2 text-center text-neutral-700">6480</td><td class="px-3 py-2 text-center text-neutral-700">45</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x9x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">7690</td><td class="px-3 py-2 text-center text-neutral-700">8700</td><td class="px-3 py-2 text-center text-neutral-700">54</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x6x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">5360</td><td class="px-3 py-2 text-center text-neutral-700">6050</td><td class="px-3 py-2 text-center text-neutral-700">46</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x7x11¼</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">6450</td><td class="px-3 py-2 text-center text-neutral-700">7300</td><td class="px-3 py-2 text-center text-neutral-700">49</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x4½x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">3820</td><td class="px-3 py-2 text-center text-neutral-700">4300</td><td class="px-3 py-2 text-center text-neutral-700">33</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x5x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">4590</td><td class="px-3 py-2 text-center text-neutral-700">5170</td><td class="px-3 py-2 text-center text-neutral-700">44</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x6x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">5850</td><td class="px-3 py-2 text-center text-neutral-700">6610</td><td class="px-3 py-2 text-center text-neutral-700">52</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">7110</td><td class="px-3 py-2 text-center text-neutral-700">8040</td><td class="px-3 py-2 text-center text-neutral-700">64</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x8x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">8380</td><td class="px-3 py-2 text-center text-neutral-700">9470</td><td class="px-3 py-2 text-center text-neutral-700">68</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x9x121/8</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">9660</td><td class="px-3 py-2 text-center text-neutral-700">10900</td><td class="px-3 py-2 text-center text-neutral-700">82</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x7x15</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">8010</td><td class="px-3 py-2 text-center text-neutral-700">9040</td><td class="px-3 py-2 text-center text-neutral-700">75</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8x15</h2></th><td class="px-3 py-2 text-center text-neutral-700">Standard Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">9440</td><td class="px-3 py-2 text-center text-neutral-700">10670</td><td class="px-3 py-2 text-center text-neutral-700">78</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">20x8x16</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">8410</td><td class="px-3 py-2 text-center text-neutral-700">9500</td><td class="px-3 py-2 text-center text-neutral-700">76</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x8x16</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">9760</td><td class="px-3 py-2 text-center text-neutral-700">11040</td><td class="px-3 py-2 text-center text-neutral-700">93</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22X9x16</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">10870</td><td class="px-3 py-2 text-center text-neutral-700">12290</td><td class="px-3 py-2 text-center text-neutral-700">106</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22X10x16</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">12740</td><td class="px-3 py-2 text-center text-neutral-700">14400</td><td class="px-3 py-2 text-center text-neutral-700">118</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x12x16</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">15710</td><td class="px-3 py-2 text-center text-neutral-700">17760</td><td class="px-3 py-2 text-center text-neutral-700">140</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x10x22</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">15260</td><td class="px-3 py-2 text-center text-neutral-700">17250</td><td class="px-3 py-2 text-center text-neutral-700">156</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x12x22</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">18820</td><td class="px-3 py-2 text-center text-neutral-700">21280</td><td class="px-3 py-2 text-center text-neutral-700">188</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x14x22</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">22380</td><td class="px-3 py-2 text-center text-neutral-700">25300</td><td class="px-3 py-2 text-center text-neutral-700">210</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x8x30</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">14130</td><td class="px-3 py-2 text-center text-neutral-700">16000</td><td class="px-3 py-2 text-center text-neutral-700">169</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x12x30</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">22730</td><td class="px-3 py-2 text-center text-neutral-700">25690</td><td class="px-3 py-2 text-center text-neutral-700">252</td></tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors"><th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x16x30</h2></th><td class="px-3 py-2 text-center text-neutral-700">High Load</td><td class="px-3 py-2 text-center text-neutral-700">Smooth</td><td class="px-3 py-2 text-center text-neutral-700">31310</td><td class="px-3 py-2 text-center text-neutral-700">35400</td><td class="px-3 py-2 text-center text-neutral-700">336</td></tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="6" class="px-3 py-3 text-center text-xs"></td>
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
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
    );
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 mb-5 w-full text-center">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[42px] text-white lg:text-[42px]">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 mb-5 w-full">
          <div data-hs-forms-root="true" id="hs-form-wrapper-monothane">
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

@push('scripts')
<script>
  (function () {
    const wrapper = document.getElementById('hs-form-wrapper-monothane');
    if (!wrapper) return;

    let loaded = false;

    function createForm() {
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
            target: '#hs-form-wrapper-monothane'
          });
        }
      };

      document.head.appendChild(script);
    }

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            createForm();
            observer.disconnect();
          }
        });
      }, { rootMargin: '300px 0px' });

      observer.observe(wrapper);
    } else {
      window.addEventListener('load', function () {
        setTimeout(createForm, 1200);
      }, { once: true });
    }
  })();
</script>
@endpush

<style>
  @media (max-width: 768px) {
    #contacto {
      background-image: url('{{ $heroJpg }}');
      background-image: image-set(
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endsection