@extends('layouts.public')

@section('title', 'Llantas sólidas PREMIUM para Montacargas | Trelleborg XP1000')
@section('meta_description', 'Cotiza en linea llantas XP1000 2026 de Trelleborg para montacargas, únicas con Garantia de vida extendida. Entrega inmediata, Crédito y precio Mayoristas.')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} 1024w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} 1024w,
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} 1600w
    "
    imagesizes="100vw"
    fetchpriority="high"
  >

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
          "Llantas super premium para montacargas",
          "Llantas imponchables para montacargas",
          "Llantas para trabajo pesado",
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
          "url": "{{ asset('storage/originals/IMAGEN-DESCRIPCION-XP1000.png') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg XP1000",
        "alternateName": [
          "Llanta sólida premium para montacargas Trelleborg XP1000",
          "Trelleborg XP1000",
          "XP1000 Trelleborg"
        ],
        "sku": "XP1000",
        "mpn": "XP1000",
        "category": "Industrial Tire",
        "image": [
          "{{ asset('storage/originals/IMAGEN-DESCRIPCION-XP1000.png') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta maciza elástica super premium para trabajo pesado de montacargas en almacenes, chatarreras, centros de reciclaje y siderúrgicas con hasta 3 turnos de trabajo continuos. Ofrece huella cuadrada con gran área de contacto, máxima eficiencia en la rodada, baja temperatura de trabajo, amortiguación de golpes y vibraciones, maniobrabilidad precisa e indicador de desgaste Pit Stop Line.",
        "material": "Hule industrial",
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, chatarreras, centros de reciclaje y siderúrgicas"
        },
        "additionalProperty": [
          { "@type": "PropertyValue", "name": "Tipo", "value": "Llanta maciza elástica super premium para montacargas" },
          { "@type": "PropertyValue", "name": "Modelo", "value": "XP1000" },
          { "@type": "PropertyValue", "name": "Construcción", "value": "Sólida" },
          { "@type": "PropertyValue", "name": "Aplicación", "value": "Montacargas para trabajo pesado" },
          { "@type": "PropertyValue", "name": "Segmento", "value": "Super Premium" },
          { "@type": "PropertyValue", "name": "Uso recomendado", "value": "Almacenes, chatarreras, centros de reciclaje y siderúrgicas con hasta 3 turnos de trabajo continuos" },
          { "@type": "PropertyValue", "name": "Beneficio principal", "value": "25% más vida llanta contra llanta, garantizado por escrito" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Huella cuadrada con gran área de contacto para mayor estabilidad y desgaste parejo" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Máxima eficiencia en la rodada para ahorro de combustible" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Mantiene temperatura de trabajo baja hasta para 3 turnos" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Amortigua golpes y vibraciones" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Maniobrabilidad precisa del montacargas" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Indicador de desgaste Pit Stop Line de 100 horas de vida restantes" },
          { "@type": "PropertyValue", "name": "Ventaja", "value": "Disponible en 8 compuestos distintos para aplicaciones especiales" }
        ],
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
          "name": "Ficha técnica Trelleborg XP1000",
          "url": "{{ asset('pdfs/Trelleborg-XP1000-EN.pdf') }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas premium Trelleborg XP1000 para montacargas",
        "serviceType": "Venta y asesoría de llantas sólidas premium para montacargas",
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
        "name": "Medidas disponibles Trelleborg XP1000",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 20,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "3.00-4" },
          { "@type": "ListItem", "position": 2, "name": "4.00-4" },
          { "@type": "ListItem", "position": 3, "name": "4.00-8" },
          { "@type": "ListItem", "position": 4, "name": "15x4½-8 / 125/75-8" },
          { "@type": "ListItem", "position": 5, "name": "5.00-8" },
          { "@type": "ListItem", "position": 6, "name": "16x6-8 / 150/75-8" },
          { "@type": "ListItem", "position": 7, "name": "18x7-8 / 180/70-8" },
          { "@type": "ListItem", "position": 8, "name": "140/55-9 / 15x5.5-9" },
          { "@type": "ListItem", "position": 9, "name": "6.00-9" },
          { "@type": "ListItem", "position": 10, "name": "21x8-9 / 200/75-9" },
          { "@type": "ListItem", "position": 11, "name": "6.50-10" },
          { "@type": "ListItem", "position": 12, "name": "180/60-10" },
          { "@type": "ListItem", "position": 13, "name": "200/50-10" },
          { "@type": "ListItem", "position": 14, "name": "23x9-10 / 225/75-10" },
          { "@type": "ListItem", "position": 15, "name": "7.00-12" },
          { "@type": "ListItem", "position": 16, "name": "23x10-12 / 250/60-12" },
          { "@type": "ListItem", "position": 17, "name": "27x10-12 / 250/75-12" },
          { "@type": "ListItem", "position": 18, "name": "315/45-12" },
          { "@type": "ListItem", "position": 19, "name": "23x5-13" },
          { "@type": "ListItem", "position": 20, "name": "5.50-15" }
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
            "name": "Llantas sólidas premium para montacargas",
            "item": "{{ url('llantas-para-montacargas') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg XP1000",
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
  $variants = image_variants('originals/IMAGEN-DESCRIPCION-XP1000.png');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/IMAGEN-DESCRIPCION-XP1000.png');

  $toSrcset = function ($arr) {
      return implode(', ', array_map(fn ($v) => $v['url'] . ' ' . $v['w'] . 'w', $arr));
  };
@endphp

<section class="relative" role="region" aria-label="Resumen XP1000">
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

<section
  class="relative"
  role="region"
  aria-label="Detalle XP1000"
  style="content-visibility:auto; contain-intrinsic-size: 900px;"
>
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
            src="{{ $fallback }}"
            alt="Trelleborg XP1000"
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

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg XP1000
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
          Es una llanta maciza elástica SUPER PREMIUM para trabajo pesado de montacargas en almacenes, chatarreras, centros de reciclaje y siderúrgicas con hasta 3 turnos de trabajo continuos:
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Huella cuadrada con gran área de contacto para mayor estabilidad y desgaste parejo..</li>
          <li>Máxima eficiencia en la rodada para ahorro de combustible.</li>
          <li>Mantiene temperatura de trabajo baja hasta para 3 turnos.</li>
          <li>Amortigua golpes y vibraciones.</li>
          <li>Maniobrabilidad precisa del montacargas.</li>
          <li>Indicador de desgaste “Pit Stop Line” de 100 horas de vida restantes.</li>
          <li>Disponible en 8 compuestos distintos para aplicaciones especiales.</li>
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
            href="{{ asset('pdfs/Trelleborg-XP1000-EN.pdf') }}"
            download
            target="_blank"
            rel="noopener noreferrer"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Descargar Ficha</span>
            </span>
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
  style="content-visibility:auto; contain-intrinsic-size: 2400px;"
>
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1700px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Alternative Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Rim</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Alternative Pattern</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Product Dimensions [mm] <br> Overall Diameter</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Product Dimensions [mm] <br> Section Width</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Static</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Counterbalanced Lift Trucks up to 25 km/h <br> Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity <br> Counterbalanced Lift Trucks up to 25 km/h <br> Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">3.00-4</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">2.10-4</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">252</td>
              <td class="px-3 py-2 text-center text-neutral-700">84</td>
              <td class="px-3 py-2 text-center text-neutral-700">295</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">195</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">3.00-4</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">2.50C-4</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">252</td>
              <td class="px-3 py-2 text-center text-neutral-700">84</td>
              <td class="px-3 py-2 text-center text-neutral-700">295</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">195</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-4</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">2.50C-4</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">307</td>
              <td class="px-3 py-2 text-center text-neutral-700">92</td>
              <td class="px-3 py-2 text-center text-neutral-700">625</td>
              <td class="px-3 py-2 text-center text-neutral-700">535</td>
              <td class="px-3 py-2 text-center text-neutral-700">412</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">406</td>
              <td class="px-3 py-2 text-center text-neutral-700">104</td>
              <td class="px-3 py-2 text-center text-neutral-700">1100</td>
              <td class="px-3 py-2 text-center text-neutral-700">950</td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">125/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">377</td>
              <td class="px-3 py-2 text-center text-neutral-700">118</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">125/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">377</td>
              <td class="px-3 py-2 text-center text-neutral-700">118</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">125/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">3.25D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">377</td>
              <td class="px-3 py-2 text-center text-neutral-700">118</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">122</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">150/75-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">411</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">180/70-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">456</td>
              <td class="px-3 py-2 text-center text-neutral-700">158</td>
              <td class="px-3 py-2 text-center text-neutral-700">2490</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">180/70-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">456</td>
              <td class="px-3 py-2 text-center text-neutral-700">158</td>
              <td class="px-3 py-2 text-center text-neutral-700">2490</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">140/55-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">15x5.5-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">04.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">132</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">524</td>
              <td class="px-3 py-2 text-center text-neutral-700">141</td>
              <td class="px-3 py-2 text-center text-neutral-700">2190</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">524</td>
              <td class="px-3 py-2 text-center text-neutral-700">141</td>
              <td class="px-3 py-2 text-center text-neutral-700">2190</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">200/75-9</td>
              <td class="px-3 py-2 text-center text-neutral-700">06.00E-9</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">518</td>
              <td class="px-3 py-2 text-center text-neutral-700">186</td>
              <td class="px-3 py-2 text-center text-neutral-700">3200</td>
              <td class="px-3 py-2 text-center text-neutral-700">2755</td>
              <td class="px-3 py-2 text-center text-neutral-700">2120</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">574</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">574</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">180/60-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">458</td>
              <td class="px-3 py-2 text-center text-neutral-700">157</td>
              <td class="px-3 py-2 text-center text-neutral-700">2795</td>
              <td class="px-3 py-2 text-center text-neutral-700">2410</td>
              <td class="px-3 py-2 text-center text-neutral-700">1850</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">200/50-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">456</td>
              <td class="px-3 py-2 text-center text-neutral-700">197</td>
              <td class="px-3 py-2 text-center text-neutral-700">2870</td>
              <td class="px-3 py-2 text-center text-neutral-700">2470</td>
              <td class="px-3 py-2 text-center text-neutral-700">1900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x9-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">225/75-10</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">583</td>
              <td class="px-3 py-2 text-center text-neutral-700">200</td>
              <td class="px-3 py-2 text-center text-neutral-700">4000</td>
              <td class="px-3 py-2 text-center text-neutral-700">3445</td>
              <td class="px-3 py-2 text-center text-neutral-700">2650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">650</td>
              <td class="px-3 py-2 text-center text-neutral-700">172</td>
              <td class="px-3 py-2 text-center text-neutral-700">3380</td>
              <td class="px-3 py-2 text-center text-neutral-700">2920</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00S-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">650</td>
              <td class="px-3 py-2 text-center text-neutral-700">172</td>
              <td class="px-3 py-2 text-center text-neutral-700">3380</td>
              <td class="px-3 py-2 text-center text-neutral-700">2920</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x10-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/60-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">583</td>
              <td class="px-3 py-2 text-center text-neutral-700">240</td>
              <td class="px-3 py-2 text-center text-neutral-700">4380</td>
              <td class="px-3 py-2 text-center text-neutral-700">3770</td>
              <td class="px-3 py-2 text-center text-neutral-700">2900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x10-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/60-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">583</td>
              <td class="px-3 py-2 text-center text-neutral-700">240</td>
              <td class="px-3 py-2 text-center text-neutral-700">4380</td>
              <td class="px-3 py-2 text-center text-neutral-700">3770</td>
              <td class="px-3 py-2 text-center text-neutral-700">2900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/75-12</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">676</td>
              <td class="px-3 py-2 text-center text-neutral-700">240</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">315/45-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">572</td>
              <td class="px-3 py-2 text-center text-neutral-700">279</td>
              <td class="px-3 py-2 text-center text-neutral-700">5210</td>
              <td class="px-3 py-2 text-center text-neutral-700">4485</td>
              <td class="px-3 py-2 text-center text-neutral-700">3450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x5-13</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75P-13</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">617</td>
              <td class="px-3 py-2 text-center text-neutral-700">138</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">664</td>
              <td class="px-3 py-2 text-center text-neutral-700">143</td>
              <td class="px-3 py-2 text-center text-neutral-700">2490</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">694</td>
              <td class="px-3 py-2 text-center text-neutral-700">150</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">29x8-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
              <td class="px-3 py-2 text-center text-neutral-700">180</td>
              <td class="px-3 py-2 text-center text-neutral-700">4115</td>
              <td class="px-3 py-2 text-center text-neutral-700">3545</td>
              <td class="px-3 py-2 text-center text-neutral-700">2725</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">29x8-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
              <td class="px-3 py-2 text-center text-neutral-700">180</td>
              <td class="px-3 py-2 text-center text-neutral-700">4115</td>
              <td class="px-3 py-2 text-center text-neutral-700">3545</td>
              <td class="px-3 py-2 text-center text-neutral-700">2725</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">745</td>
              <td class="px-3 py-2 text-center text-neutral-700">194</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">745</td>
              <td class="px-3 py-2 text-center text-neutral-700">194</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">745</td>
              <td class="px-3 py-2 text-center text-neutral-700">194</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">808</td>
              <td class="px-3 py-2 text-center text-neutral-700">207</td>
              <td class="px-3 py-2 text-center text-neutral-700">5360</td>
              <td class="px-3 py-2 text-center text-neutral-700">4615</td>
              <td class="px-3 py-2 text-center text-neutral-700">3550</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">808</td>
              <td class="px-3 py-2 text-center text-neutral-700">207</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">225/75-15 (8.15-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">692</td>
              <td class="px-3 py-2 text-center text-neutral-700">225</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">711</td>
              <td class="px-3 py-2 text-center text-neutral-700">225</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">712</td>
              <td class="px-3 py-2 text-center text-neutral-700">238</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">315/70-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">812</td>
              <td class="px-3 py-2 text-center text-neutral-700">255</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5850</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">710</td>
              <td class="px-3 py-2 text-center text-neutral-700">284</td>
              <td class="px-3 py-2 text-center text-neutral-700">6610</td>
              <td class="px-3 py-2 text-center text-neutral-700">5690</td>
              <td class="px-3 py-2 text-center text-neutral-700">4375</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/65-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">32x12½-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15 (350-15)</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">812</td>
              <td class="px-3 py-2 text-center text-neutral-700">284</td>
              <td class="px-3 py-2 text-center text-neutral-700">9060</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/80-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-16</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">753</td>
              <td class="px-3 py-2 text-center text-neutral-700">205</td>
              <td class="px-3 py-2 text-center text-neutral-700">4645</td>
              <td class="px-3 py-2 text-center text-neutral-700">4000</td>
              <td class="px-3 py-2 text-center text-neutral-700">3075</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">250/80-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.0-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">753</td>
              <td class="px-3 py-2 text-center text-neutral-700">205</td>
              <td class="px-3 py-2 text-center text-neutral-700">4645</td>
              <td class="px-3 py-2 text-center text-neutral-700">4000</td>
              <td class="px-3 py-2 text-center text-neutral-700">3075</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">270/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">974</td>
              <td class="px-3 py-2 text-center text-neutral-700">220</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5400</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">270/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">974</td>
              <td class="px-3 py-2 text-center text-neutral-700">220</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5400</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">290/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1011</td>
              <td class="px-3 py-2 text-center text-neutral-700">249</td>
              <td class="px-3 py-2 text-center text-neutral-700">7365</td>
              <td class="px-3 py-2 text-center text-neutral-700">5850</td>
              <td class="px-3 py-2 text-center text-neutral-700">4875</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">290/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1009</td>
              <td class="px-3 py-2 text-center text-neutral-700">250</td>
              <td class="px-3 py-2 text-center text-neutral-700">7550</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">290/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">1009</td>
              <td class="px-3 py-2 text-center text-neutral-700">250</td>
              <td class="px-3 py-2 text-center text-neutral-700">7550</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">290/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1009</td>
              <td class="px-3 py-2 text-center text-neutral-700">250</td>
              <td class="px-3 py-2 text-center text-neutral-700">7550</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">11.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">300/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">8230</td>
              <td class="px-3 py-2 text-center text-neutral-700">6540</td>
              <td class="px-3 py-2 text-center text-neutral-700">5450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">260</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">313</td>
              <td class="px-3 py-2 text-center text-neutral-700">9815</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/50-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">834</td>
              <td class="px-3 py-2 text-center text-neutral-700">310</td>
              <td class="px-3 py-2 text-center text-neutral-700">10420</td>
              <td class="px-3 py-2 text-center text-neutral-700">8970</td>
              <td class="px-3 py-2 text-center text-neutral-700">6900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/50-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">834</td>
              <td class="px-3 py-2 text-center text-neutral-700">310</td>
              <td class="px-3 py-2 text-center text-neutral-700">10420</td>
              <td class="px-3 py-2 text-center text-neutral-700">8970</td>
              <td class="px-3 py-2 text-center text-neutral-700">6900</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-24</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-24</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1181</td>
              <td class="px-3 py-2 text-center text-neutral-700">295</td>
              <td class="px-3 py-2 text-center text-neutral-700">10120</td>
              <td class="px-3 py-2 text-center text-neutral-700">8040</td>
              <td class="px-3 py-2 text-center text-neutral-700">6700</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-24</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">330/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-24</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1181</td>
              <td class="px-3 py-2 text-center text-neutral-700">295</td>
              <td class="px-3 py-2 text-center text-neutral-700">11325</td>
              <td class="px-3 py-2 text-center text-neutral-700">9000</td>
              <td class="px-3 py-2 text-center text-neutral-700">7500</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14.00-24</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">385/95-24</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-24</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1325</td>
              <td class="px-3 py-2 text-center text-neutral-700">331</td>
              <td class="px-3 py-2 text-center text-neutral-700">13970</td>
              <td class="px-3 py-2 text-center text-neutral-700">11100</td>
              <td class="px-3 py-2 text-center text-neutral-700">9250</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16.00-25</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">445/95-25</td>
              <td class="px-3 py-2 text-center text-neutral-700">11.25-25</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1445</td>
              <td class="px-3 py-2 text-center text-neutral-700">410</td>
              <td class="px-3 py-2 text-center text-neutral-700">18875</td>
              <td class="px-3 py-2 text-center text-neutral-700">15000</td>
              <td class="px-3 py-2 text-center text-neutral-700">12500</td>
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
  role="region"
  aria-label="Formulario de cotización"
  style="content-visibility:auto; contain-intrinsic-size: 900px;"
>
  <div class="absolute inset-0 contacto-bg" aria-hidden="true"></div>

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
            id="hs-form-wrapper"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
            class="min-h-[320px]"
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
  .contacto-bg {
    background-image: none;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .contacto-bg.is-loaded {
    background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  }

  @media (max-width: 768px) {
    .contacto-bg.is-loaded {
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
    const contacto = document.getElementById('contacto');
    const bg = contacto?.querySelector('.contacto-bg');
    const formWrapper = document.getElementById('hs-form-wrapper');

    let bgLoaded = false;
    let scriptRequested = false;
    let formCreated = false;

    function loadBackground() {
      if (bgLoaded || !bg) return;
      bg.classList.add('is-loaded');
      bgLoaded = true;
    }

    function createHubspotForm() {
      if (formCreated || !window.hbspt?.forms?.create || !formWrapper) return;

      window.hbspt.forms.create({
        portalId: formWrapper.dataset.portalId,
        formId: formWrapper.dataset.formId,
        target: '#hs-form-wrapper'
      });

      formCreated = true;
    }

    function loadHubspotScript() {
      if (scriptRequested) {
        createHubspotForm();
        return;
      }

      scriptRequested = true;

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';
      script.onload = createHubspotForm;
      document.head.appendChild(script);
    }

    function loadContactoAssets() {
      loadBackground();
      loadHubspotScript();
    }

    if ('IntersectionObserver' in window && contacto) {
      const observer = new IntersectionObserver((entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting) {
            loadContactoAssets();
            observer.disconnect();
            break;
          }
        }
      }, { rootMargin: '300px 0px' });

      observer.observe(contacto);
    } else {
      window.addEventListener('load', () => {
        if ('requestIdleCallback' in window) {
          requestIdleCallback(loadContactoAssets, { timeout: 2000 });
        } else {
          setTimeout(loadContactoAssets, 1200);
        }
      }, { once: true });
    }
  })();
</script>
@endsection