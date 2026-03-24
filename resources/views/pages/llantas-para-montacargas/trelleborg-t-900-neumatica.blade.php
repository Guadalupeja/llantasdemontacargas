@extends('layouts.public')

@section('title', 'Llantas neumáticas para Montacargas | Trelleborg T-900')
@section('meta_description', 'Cotiza mejores llantas con Garantia de vida 25% más. Llantas Neumáticas para Montacargas uso rudo de la marca Trelleborg. Entrega inmediata y Precios Mayorista.')

@php
  $heroJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroAvif960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroWebp960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

  $productImage = asset('storage/originals/Trelleborg_Pneumatic_T900_660x660.webp');
  $pdfFile = asset('pdfs/Trelleborg-Tires-T-900-EN.pdf');

  $variants = image_variants('originals/Trelleborg_Pneumatic_T900_660x660.webp');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? $productImage;

  $toSrcset = static function ($arr) {
      return implode(', ', array_map(static fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  };
@endphp

{{-- Todo esto debe renderizar en <head> --}}
@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    href="{{ $heroJpg }}"
    imagesrcset="{{ $heroAvif1024 }} 1024w, {{ $heroWebp1024 }} 1024w, {{ $heroJpg }} 1600w"
    imagesizes="100vw"
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
        "alternateName": ["BSH", "RUGUEX", "BSH | Llantas de Montacargas"],
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
          "Llantas neumáticas para montacargas",
          "Llantas industriales Trelleborg",
          "Llantas para trabajo pesado",
          "Llantas para montacargas en pisos accidentados",
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
          "url": "{{ $productImage }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg T-900 Neumática",
        "alternateName": [
          "Llanta neumática Trelleborg T-900",
          "Llanta neumática para montacargas T-900",
          "Trelleborg T900"
        ],
        "sku": "T-900",
        "mpn": "T-900",
        "category": "Industrial Tire",
        "image": [
          "{{ $productImage }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta neumática para montacargas Trelleborg T-900 con cámara, del segmento premium, para trabajo pesado dentro y fuera de planta. Diseñada para cargas pesadas, altas velocidades, trayectos largos y pisos accidentados.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta neumática industrial para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "T-900"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Trabajo pesado dentro y fuera de planta"
          },
          {
            "@type": "PropertyValue",
            "name": "Configuración",
            "value": "Llanta con cámara"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Huella amplia de gran estabilidad"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Banda de rodamiento plana que alarga la vida del neumático"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Costados súper reforzados para impactos laterales"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Buena maniobrabilidad y excelente posicionamiento para carga"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Mantiene baja temperatura de operación"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Ahorro visible de combustible"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Excelente protección al rin"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Conducción muy cómoda"
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
          "name": "Ficha técnica Trelleborg T-900",
          "url": "{{ $pdfFile }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas neumáticas Trelleborg T-900 para montacargas",
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
        "name": "Medidas disponibles Trelleborg T-900",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 25,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "5.00-8" },
          { "@type": "ListItem", "position": 2, "name": "18x7-8 / 180/70-8" },
          { "@type": "ListItem", "position": 3, "name": "6.00-9" },
          { "@type": "ListItem", "position": 4, "name": "23x9-10 / 225/75-10" },
          { "@type": "ListItem", "position": 5, "name": "6.50-10" },
          { "@type": "ListItem", "position": 6, "name": "23x10-12 / 250/60-12" },
          { "@type": "ListItem", "position": 7, "name": "7.00-12 14PR" },
          { "@type": "ListItem", "position": 8, "name": "7.00-12 16PR" },
          { "@type": "ListItem", "position": 9, "name": "27x10-12 / 250/75-12 16PR" },
          { "@type": "ListItem", "position": 10, "name": "27x10-12 / 250/75-12 24PR" },
          { "@type": "ListItem", "position": 11, "name": "28x9-15 / 225/75-15 (8.15-15)" },
          { "@type": "ListItem", "position": 12, "name": "250-15 / 250/70-15" },
          { "@type": "ListItem", "position": 13, "name": "7.00-15 / 29x8-15" },
          { "@type": "ListItem", "position": 14, "name": "7.50-15" },
          { "@type": "ListItem", "position": 15, "name": "7.50-16 / 250/80-16" },
          { "@type": "ListItem", "position": 16, "name": "300-15 / 315/70-15" },
          { "@type": "ListItem", "position": 17, "name": "8.25-15 14PR" },
          { "@type": "ListItem", "position": 18, "name": "8.25-15 16PR" },
          { "@type": "ListItem", "position": 19, "name": "355/65-15 / 32x12½-15 (350-15)" },
          { "@type": "ListItem", "position": 20, "name": "9.00-20 / 270/95-20" },
          { "@type": "ListItem", "position": 21, "name": "10.00-20 / 290/95-20" },
          { "@type": "ListItem", "position": 22, "name": "11.00-20 / 300/95-20" },
          { "@type": "ListItem", "position": 23, "name": "12.00-20 / 330/95-20" },
          { "@type": "ListItem", "position": 24, "name": "12.00-24 / 330/95-24" },
          { "@type": "ListItem", "position": 25, "name": "14.00-24 / 385/95-24" }
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
            "name": "Trelleborg T-900",
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
            Llantas Neumáticas para Montacargas
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 text-[#7a7a7a]">
            Llantas aptas para cargas pesadas, altas velocidades, trayectos largos y montacargas en pisos accidentados.
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
            src="{{ $fallback }}"
            alt="Trelleborg t-900"
            width="594"
            height="722"
            fetchpriority="high"
            decoding="async"
            loading="eager"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] font-semibold leading-[33px] text-black lg:text-[43px] lg:leading-[43px]">
        Trelleborg T-900 Neumática
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

      <div class="leading-[29px] text-[#7a7a7a]">
        <p class="mb-5 mt-6">
          Llanta con cámara del segmento PREMIUM preferida por los fabricantes de equipo original, para trabajo pesado dentro y fuera de planta.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Huella amplia de gran estabilidad y banda de rodamiento plana alargan la vida del neumático.</li>
          <li>Costados súper reforzados soportan cualquier impacto lateral.</li>
          <li>Buena maniobrabilidad y excelente posicionamiento para carga.</li>
          <li>Mantiene temperatura muy baja y ahorra combustible visiblemente.</li>
          <li>Excelente protección al Rin.</li>
          <li>Conducción muy cómoda.</li>
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
            href="{{ $pdfFile }}"
            download="{{ $pdfFile }}"
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

<div class="h-[10px] lg:h-[35px]" aria-hidden="true"></div>

<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md [content-visibility:auto] [contain-intrinsic-size:900px]">
      <div class="overflow-x-auto">
        <table class="min-w-[1800px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="first:rounded-tl-xl text-[12px] font-semibold uppercase tracking-wide">Size</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Alternative Size</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Ply Rating</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Rim</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Product Dimensions [mm]<br>Overall Diameter</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Product Dimensions [mm]<br>Section Width</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Product Dimensions [mm]<br>Tread Depth</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Minimal Dual Spacing [mm]</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Inflation Pressure [bar]</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Tire Type</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Load Index</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Speed Symbol</th>
              <th class="text-[12px] font-semibold uppercase tracking-wide">Load Capacity [kg]<br>Counterbalanced Lift Trucks up to 25 km/h<br>Load Wheel</th>
              <th class="last:rounded-tr-xl text-[12px] font-semibold uppercase tracking-wide">Load Capacity [kg]<br>Counterbalanced Lift Trucks up to 25 km/h<br>Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">468</td>
              <td class="px-3 py-2 text-center text-neutral-700">140</td>
              <td class="px-3 py-2 text-center text-neutral-700">13</td>
              <td class="px-3 py-2 text-center text-neutral-700">158</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">111</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">180/70-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">462</td>
              <td class="px-3 py-2 text-center text-neutral-700">168</td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">199</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">12</td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">543</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">15</td>
              <td class="px-3 py-2 text-center text-neutral-700">192</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">121</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x9-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">585</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">19</td>
              <td class="px-3 py-2 text-center text-neutral-700">259</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">142</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3445</td>
              <td class="px-3 py-2 text-center text-neutral-700">2650</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">12</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">590</td>
              <td class="px-3 py-2 text-center text-neutral-700">182</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">212</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/60-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">600</td>
              <td class="px-3 py-2 text-center text-neutral-700">245</td>
              <td class="px-3 py-2 text-center text-neutral-700">22</td>
              <td class="px-3 py-2 text-center text-neutral-700">293</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">145</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3770</td>
              <td class="px-3 py-2 text-center text-neutral-700">2900</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">680</td>
              <td class="px-3 py-2 text-center text-neutral-700">191</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">134</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2755</td>
              <td class="px-3 py-2 text-center text-neutral-700">2120</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">680</td>
              <td class="px-3 py-2 text-center text-neutral-700">191</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">136</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">2910</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/75-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">685</td>
              <td class="px-3 py-2 text-center text-neutral-700">250</td>
              <td class="px-3 py-2 text-center text-neutral-700">22</td>
              <td class="px-3 py-2 text-center text-neutral-700">293</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">146</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/75-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">24</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">685</td>
              <td class="px-3 py-2 text-center text-neutral-700">250</td>
              <td class="px-3 py-2 text-center text-neutral-700">22</td>
              <td class="px-3 py-2 text-center text-neutral-700">293</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">155</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">5040</td>
              <td class="px-3 py-2 text-center text-neutral-700">3875</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">225/75-15 (8.15-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">710</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">248</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">146</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">742</td>
              <td class="px-3 py-2 text-center text-neutral-700">240</td>
              <td class="px-3 py-2 text-center text-neutral-700">19</td>
              <td class="px-3 py-2 text-center text-neutral-700">282</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">155</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">5040</td>
              <td class="px-3 py-2 text-center text-neutral-700">3875</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">29x8-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">760</td>
              <td class="px-3 py-2 text-center text-neutral-700">204</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">236</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">140</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3275</td>
              <td class="px-3 py-2 text-center text-neutral-700">2520</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">778</td>
              <td class="px-3 py-2 text-center text-neutral-700">215</td>
              <td class="px-3 py-2 text-center text-neutral-700">21</td>
              <td class="px-3 py-2 text-center text-neutral-700">254</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">146</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">250/80-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">12</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.00G-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">805</td>
              <td class="px-3 py-2 text-center text-neutral-700">220</td>
              <td class="px-3 py-2 text-center text-neutral-700">21</td>
              <td class="px-3 py-2 text-center text-neutral-700">254</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">144</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">3630</td>
              <td class="px-3 py-2 text-center text-neutral-700">2790</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">315/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">840</td>
              <td class="px-3 py-2 text-center text-neutral-700">290</td>
              <td class="px-3 py-2 text-center text-neutral-700">23</td>
              <td class="px-3 py-2 text-center text-neutral-700">345</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">164</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">841</td>
              <td class="px-3 py-2 text-center text-neutral-700">247</td>
              <td class="px-3 py-2 text-center text-neutral-700">19</td>
              <td class="px-3 py-2 text-center text-neutral-700">281</td>
              <td class="px-3 py-2 text-center text-neutral-700">8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">149</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4225</td>
              <td class="px-3 py-2 text-center text-neutral-700">3250</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">841</td>
              <td class="px-3 py-2 text-center text-neutral-700">247</td>
              <td class="px-3 py-2 text-center text-neutral-700">19</td>
              <td class="px-3 py-2 text-center text-neutral-700">281</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.3</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">4615</td>
              <td class="px-3 py-2 text-center text-neutral-700">3550</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/65-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">32x12½-15 (350-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">24</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">843</td>
              <td class="px-3 py-2 text-center text-neutral-700">334</td>
              <td class="px-3 py-2 text-center text-neutral-700">29</td>
              <td class="px-3 py-2 text-center text-neutral-700">407</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">170</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/65-15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">32x12½-15 (350-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">32*</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">843</td>
              <td class="px-3 py-2 text-center text-neutral-700">334</td>
              <td class="px-3 py-2 text-center text-neutral-700">29</td>
              <td class="px-3 py-2 text-center text-neutral-700">407</td>
              <td class="px-3 py-2 text-center text-neutral-700">12.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">177</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9490</td>
              <td class="px-3 py-2 text-center text-neutral-700">7300</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">270/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">14</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1015</td>
              <td class="px-3 py-2 text-center text-neutral-700">265</td>
              <td class="px-3 py-2 text-center text-neutral-700">27</td>
              <td class="px-3 py-2 text-center text-neutral-700">311</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">5850</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">290/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">16</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1085</td>
              <td class="px-3 py-2 text-center text-neutral-700">294</td>
              <td class="px-3 py-2 text-center text-neutral-700">32</td>
              <td class="px-3 py-2 text-center text-neutral-700">334</td>
              <td class="px-3 py-2 text-center text-neutral-700">9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">164</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">11.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">300/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">18</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1110</td>
              <td class="px-3 py-2 text-center text-neutral-700">302</td>
              <td class="px-3 py-2 text-center text-neutral-700">33</td>
              <td class="px-3 py-2 text-center text-neutral-700">352</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">170</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1145</td>
              <td class="px-3 py-2 text-center text-neutral-700">325</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">372</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">175</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">8970</td>
              <td class="px-3 py-2 text-center text-neutral-700">6900</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">24</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1145</td>
              <td class="px-3 py-2 text-center text-neutral-700">325</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">372</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">178</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9710</td>
              <td class="px-3 py-2 text-center text-neutral-700">7470</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">28</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1145</td>
              <td class="px-3 py-2 text-center text-neutral-700">325</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">372</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">180</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">10400</td>
              <td class="px-3 py-2 text-center text-neutral-700">8000</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-24</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1245</td>
              <td class="px-3 py-2 text-center text-neutral-700">320</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">378</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">178</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9750</td>
              <td class="px-3 py-2 text-center text-neutral-700">7500</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-24</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">24</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1245</td>
              <td class="px-3 py-2 text-center text-neutral-700">320</td>
              <td class="px-3 py-2 text-center text-neutral-700">35</td>
              <td class="px-3 py-2 text-center text-neutral-700">378</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">178</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">9945</td>
              <td class="px-3 py-2 text-center text-neutral-700">7650</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14.00-24</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">385/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">24</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.00W-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">39</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">186</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">12350</td>
              <td class="px-3 py-2 text-center text-neutral-700">9500</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14.00-24</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">385/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">24*</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.00W-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">39</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tubeless</td>
              <td class="px-3 py-2 text-center text-neutral-700">186</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">12350</td>
              <td class="px-3 py-2 text-center text-neutral-700">9500</td>
            </tr>

            <tr class="transition-colors odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14.00-24</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">385/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">28</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.00W-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">39</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.4</td>
              <td class="px-3 py-2 text-center text-neutral-700">Tube Type</td>
              <td class="px-3 py-2 text-center text-neutral-700">186</td>
              <td class="px-3 py-2 text-center text-neutral-700">A5</td>
              <td class="px-3 py-2 text-center text-neutral-700">12600</td>
              <td class="px-3 py-2 text-center text-neutral-700">9690</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="14" class="px-3 py-3 text-center text-xs"></td>
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
  class="relative box-border block bg-black bg-cover bg-center bg-no-repeat"
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
          <div data-hs-forms-root="true" id="hs-form-container-t900">
            <noscript>
              <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
            </noscript>
          </div>

          <script>
            (function () {
              var initialized = false;

              function initHubspotForm() {
                if (initialized) return;
                if (!(window.hbspt && window.hbspt.forms && window.hbspt.forms.create)) return;

                initialized = true;
                window.hbspt.forms.create({
                  portalId: "7547674",
                  formId: "26f426a7-e620-42df-98a3-43e10a899b6c",
                  target: "#hs-form-container-t900"
                });
              }

              function loadHubspotScript() {
                if (document.querySelector('script[data-hs-form-shell="t900"]')) {
                  initHubspotForm();
                  return;
                }

                var script = document.createElement('script');
                script.src = 'https://js.hsforms.net/forms/shell.js';
                script.async = true;
                script.defer = true;
                script.charset = 'utf-8';
                script.dataset.hsFormShell = 't900';
                script.onload = initHubspotForm;
                document.head.appendChild(script);
              }

              if ('IntersectionObserver' in window) {
                var formSection = document.getElementById('contacto');
                var observer = new IntersectionObserver(function(entries) {
                  entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                      loadHubspotScript();
                      observer.disconnect();
                    }
                  });
                }, { rootMargin: '300px 0px' });

                if (formSection) {
                  observer.observe(formSection);
                } else {
                  loadHubspotScript();
                }
              } else {
                window.addEventListener('load', loadHubspotScript, { once: true });
              }
            })();
          </script>
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
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endsection