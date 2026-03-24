@extends('layouts.public')

@section('title', 'Llantas Sólidas Premium Cushion para Montacargas | Press On')
@section('meta_description', 'Cotiza aquí llantas con Garantía de vida 25% más de la marca Trelleborg. Precios Mayorista, crédito y entrega inmediata. Llantas tipo cushion para Montacargas.')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>
  <link rel="preconnect" href="https://forms.hsforms.com" crossorigin>

  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}"
    type="image/avif"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }} 960w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} 1024w
    "
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
        "alternateName": ["BSH", "RUGUEX", "BSH | RUGUEX"],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png') }}"
        },
        "description": "RUGUEX es una marca registrada por Bombas Sellos y Hules Industriales S.A. de C.V. Distribuidor autorizado de llantas Trelleborg para montacargas, minicargadores, cargadores y manipuladores telescópicos en México, con entrega inmediata, asistencia técnica y precios competitivos.",
        "email": "ventas@llantasdemontacargas.com",
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
          { "@type": "Brand", "name": "RUGUEX" },
          { "@type": "Brand", "name": "Trelleborg" }
        ],
        "knowsAbout": [
          "Llantas para montacargas",
          "Llantas sólidas cushion para montacargas",
          "Llantas Press On para montacargas",
          "Bandajes para montacargas",
          "Llantas industriales Trelleborg",
          "Asesoría técnica en selección e instalación de llantas industriales"
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
          "url": "{{ asset('storage/originals/Trelleborg_POS_Traction_660x660.webp') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg Press On",
        "alternateName": [
          "Llantas Sólidas Premium Cushion para Montacargas",
          "Llantas sólidas con anillo para montacargas",
          "Trelleborg Press On Cushion",
          "Bandaje Press On Trelleborg"
        ],
        "image": [
          "{{ asset('storage/originals/Trelleborg_POS_Traction_660x660.webp') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta tipo cushion super premium Trelleborg Press On para montacargas, diseñada para condiciones demandantes y vida útil extendida. Integra unión permanente entre hule y aro metálico, banda de rodamiento 13% más grande que el estándar, baja acumulación de calor, excelente maniobrabilidad, ahorro de combustible y 25% más vida llanta contra llanta garantizado por escrito.",
        "category": "Industrial Tire",
        "material": "Hule industrial premium y aro metálico",
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"
        },
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida cushion / Press On para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Configuración",
            "value": "Con anillo metálico"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas para condiciones demandantes"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Banda de rodamiento 13% más grande que el estándar"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Desgaste parejo por distribución uniforme de carga"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Baja acumulación de calor"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Conducción suave y maniobrabilidad precisa"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Ahorro de combustible del 12% contra competidor premium más cercano"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en perfil liso y 5 compuestos para aplicaciones específicas"
          }
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
        "subjectOf": [
          {
            "@type": "CreativeWork",
            "name": "Ficha técnica Trelleborg Press On",
            "url": "{{ asset('pdfs/Press on Trelleborg.pdf') }}"
          },
          {
            "@type": "Dataset",
            "name": "Tabla de medidas, perfiles y capacidades Trelleborg Press On",
            "description": "Tabla técnica con Tire Size, Metric Size, Pattern & Profile, Load Capacity y Weight para llantas sólidas premium cushion Trelleborg Press On."
          }
        ],
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#sizes"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas premium cushion Trelleborg Press On para montacargas",
        "serviceType": "Venta y asesoría técnica de llantas sólidas cushion con anillo para montacargas",
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
        "name": "Medidas disponibles Trelleborg Press On",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 35,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "9x5x5" },
          { "@type": "ListItem", "position": 2, "name": "10x4x6¼" },
          { "@type": "ListItem", "position": 3, "name": "10x4x6½" },
          { "@type": "ListItem", "position": 4, "name": "10x5x6½" },
          { "@type": "ListItem", "position": 5, "name": "10½x5x6½" },
          { "@type": "ListItem", "position": 6, "name": "10½x7x6½" },
          { "@type": "ListItem", "position": 7, "name": "13x3½x8" },
          { "@type": "ListItem", "position": 8, "name": "13x4½x8" },
          { "@type": "ListItem", "position": 9, "name": "13x5x8" },
          { "@type": "ListItem", "position": 10, "name": "13½x5½x8" },
          { "@type": "ListItem", "position": 11, "name": "14x4½x8" },
          { "@type": "ListItem", "position": 12, "name": "14x5x10" },
          { "@type": "ListItem", "position": 13, "name": "15½x5x10" },
          { "@type": "ListItem", "position": 14, "name": "16x5x10½" },
          { "@type": "ListItem", "position": 15, "name": "16x6x10½" },
          { "@type": "ListItem", "position": 16, "name": "16x7x10½" },
          { "@type": "ListItem", "position": 17, "name": "15x5x11¼" },
          { "@type": "ListItem", "position": 18, "name": "15x6x11¼" },
          { "@type": "ListItem", "position": 19, "name": "16¼x5x11¼" },
          { "@type": "ListItem", "position": 20, "name": "16¼x6x11¼" },
          { "@type": "ListItem", "position": 21, "name": "16¼x7x11¼" },
          { "@type": "ListItem", "position": 22, "name": "17x4½x121/8" },
          { "@type": "ListItem", "position": 23, "name": "17x5x121/8" },
          { "@type": "ListItem", "position": 24, "name": "17x6x121/8" },
          { "@type": "ListItem", "position": 25, "name": "18x5x121/8" },
          { "@type": "ListItem", "position": 26, "name": "18x6x121/8" },
          { "@type": "ListItem", "position": 27, "name": "18x7x121/8" },
          { "@type": "ListItem", "position": 28, "name": "18x8x121/8" },
          { "@type": "ListItem", "position": 29, "name": "18x9x121/8" },
          { "@type": "ListItem", "position": 30, "name": "21x6x15" },
          { "@type": "ListItem", "position": 31, "name": "21x7x15" },
          { "@type": "ListItem", "position": 32, "name": "21x8x15" },
          { "@type": "ListItem", "position": 33, "name": "21x9x15" },
          { "@type": "ListItem", "position": 34, "name": "22x7x16" },
          { "@type": "ListItem", "position": 35, "name": "22x8x16" },
          { "@type": "ListItem", "position": 36, "name": "22x9x16" },
          { "@type": "ListItem", "position": 37, "name": "22x10x16" },
          { "@type": "ListItem", "position": 38, "name": "22x12x16" },
          { "@type": "ListItem", "position": 39, "name": "22x14x16" },
          { "@type": "ListItem", "position": 40, "name": "22x16x16" },
          { "@type": "ListItem", "position": 41, "name": "22x6x17¾" },
          { "@type": "ListItem", "position": 42, "name": "26x7x20" },
          { "@type": "ListItem", "position": 43, "name": "28x10x22" },
          { "@type": "ListItem", "position": 44, "name": "28x12x22" },
          { "@type": "ListItem", "position": 45, "name": "28x14x22" },
          { "@type": "ListItem", "position": 46, "name": "28x16x22" },
          { "@type": "ListItem", "position": 47, "name": "40x12x30" },
          { "@type": "ListItem", "position": 48, "name": "40x14x30" },
          { "@type": "ListItem", "position": 49, "name": "40x16x30" },
          { "@type": "ListItem", "position": 50, "name": "40x20x30" }
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
            "name": "Llantas sólidas premium cushion para montacargas",
            "item": "{{ url()->current() }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg Press On",
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
  $variants = image_variants('originals/Trelleborg_POS_Traction_660x660.webp');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/Trelleborg_POS_Traction_660x660.webp');
  $toSrcset = fn($arr) => implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
@endphp

<section class="relative [content-visibility:auto] [contain-intrinsic-size:1px_400px]" role="region" aria-label="Resumen PS800">
  <div class="mx-auto max-w-[1140px] relative">
    <div class="w-full relative min-h-px flex">
      <div class="w-full p-[10px] flex flex-wrap content-start">
        <div class="w-full h-[68px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 font-sans font-semibold text-[22px] leading-[22px] lg:text-[32px] lg:leading-[32px] text-black">
            Llantas Sólidas con Anillo para Montacargas.
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a]">
            Llantas Sólidas con anillo tipo cushion, libres de mantenimiento, imponchables y con fácil intercambiabilidad.
          </p>
        </div>

        <div class="w-full h-[26px]" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>

<section class="relative [content-visibility:auto] [contain-intrinsic-size:1px_900px]" role="region" aria-label="Detalle PS800">
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
            alt="Trelleborg Press On"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg Press On
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
          Una llanta tipo cushion SUPER PREMIUM para condiciones demandantes con vida útil extendida.
        </p>

        <p class="mb-5 mt-6 font-bold">
          25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <p class="mb-5 mt-6">
          Desarrollo exclusivo de la marca une permanentemente el hule con el aro metálico.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Banda de rodamiento 13% mas grande que el tamaño estandarizado brinda mejor estabilidad y tracción.</li>
          <li>Diseño del perfil de tracción distribuye la carga uniformemente y asegura desgaste parejo.</li>
          <li>Baja acumulación de calor.</li>
          <li>Conducción suave con excelente maniobrabilidad y posicionamiento preciso para carga.</li>
          <li>Ahorro de combustible del 12% contra competidor Premium mas cercano.</li>
          <li>Perfil liso disponible y 5 compuestos para aplicaciones específicas.</li>
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
            href="{{ asset('pdfs/Press on Trelleborg.pdf') }}"
            download="Press on Trelleborg.pdf"
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

<div class="lg:h-[45px] h-[10px]" aria-hidden="true"></div>

<section class="relative mt-6 [content-visibility:auto] [contain-intrinsic-size:1px_2600px]" role="region" aria-label="Tabla de medidas, perfiles y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[2200px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Metric Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile<br>Smooth<br>Flat</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile<br>Smooth<br>Crown</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile<br>Traction<br>Flat</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile<br>Traction<br>Crown</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Other vehicles up to<br>4 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Other vehicles up to<br>6 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Other vehicles up to<br>10 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Counterbalanced lift trucks up to 15 mph<br>Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity<br>Counterbalanced lift trucks up to 15 mph<br>Steering Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight (lbs)</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9x5x5</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">229x127x127</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2115</td><td class="px-3 py-2 text-center text-neutral-700">1740</td><td class="px-3 py-2 text-center text-neutral-700">1500</td><td class="px-3 py-2 text-center text-neutral-700">1530</td><td class="px-3 py-2 text-center text-neutral-700">1255</td><td class="px-3 py-2 text-center text-neutral-700">14</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x4x6¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">254x102x159</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">1720</td><td class="px-3 py-2 text-center text-neutral-700">1410</td><td class="px-3 py-2 text-center text-neutral-700">1235</td><td class="px-3 py-2 text-center text-neutral-700">1245</td><td class="px-3 py-2 text-center text-neutral-700">1025</td><td class="px-3 py-2 text-center text-neutral-700">13</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x4x6½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">254x102x165</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">1720</td><td class="px-3 py-2 text-center text-neutral-700">1410</td><td class="px-3 py-2 text-center text-neutral-700">1225</td><td class="px-3 py-2 text-center text-neutral-700">1245</td><td class="px-3 py-2 text-center text-neutral-700">1025</td><td class="px-3 py-2 text-center text-neutral-700">13</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x5x6½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">254x127x165</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2225</td><td class="px-3 py-2 text-center text-neutral-700">1830</td><td class="px-3 py-2 text-center text-neutral-700">1600</td><td class="px-3 py-2 text-center text-neutral-700">1620</td><td class="px-3 py-2 text-center text-neutral-700">1335</td><td class="px-3 py-2 text-center text-neutral-700">17</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x5x6½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">267x127x165</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2360</td><td class="px-3 py-2 text-center text-neutral-700">1940</td><td class="px-3 py-2 text-center text-neutral-700">1700</td><td class="px-3 py-2 text-center text-neutral-700">1720</td><td class="px-3 py-2 text-center text-neutral-700">1410</td><td class="px-3 py-2 text-center text-neutral-700">17</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x7x6½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">267x178x165</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3525</td><td class="px-3 py-2 text-center text-neutral-700">2890</td><td class="px-3 py-2 text-center text-neutral-700">2515</td><td class="px-3 py-2 text-center text-neutral-700">2555</td><td class="px-3 py-2 text-center text-neutral-700">2095</td><td class="px-3 py-2 text-center text-neutral-700">25</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x3½x8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330x89x203</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">1730</td><td class="px-3 py-2 text-center text-neutral-700">1420</td><td class="px-3 py-2 text-center text-neutral-700">1355</td><td class="px-3 py-2 text-center text-neutral-700">1255</td><td class="px-3 py-2 text-center text-neutral-700">1035</td><td class="px-3 py-2 text-center text-neutral-700">16</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x4½x8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330x114x203</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2470</td><td class="px-3 py-2 text-center text-neutral-700">2030</td><td class="px-3 py-2 text-center text-neutral-700">1765</td><td class="px-3 py-2 text-center text-neutral-700">1795</td><td class="px-3 py-2 text-center text-neutral-700">1475</td><td class="px-3 py-2 text-center text-neutral-700">22</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x5x8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330x127x203</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2845</td><td class="px-3 py-2 text-center text-neutral-700">2335</td><td class="px-3 py-2 text-center text-neutral-700">2030</td><td class="px-3 py-2 text-center text-neutral-700">2060</td><td class="px-3 py-2 text-center text-neutral-700">1685</td><td class="px-3 py-2 text-center text-neutral-700">23</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x5½x8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">343x140x203</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3330</td><td class="px-3 py-2 text-center text-neutral-700">2735</td><td class="px-3 py-2 text-center text-neutral-700">2380</td><td class="px-3 py-2 text-center text-neutral-700">2415</td><td class="px-3 py-2 text-center text-neutral-700">1975</td><td class="px-3 py-2 text-center text-neutral-700">28</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14x4½x8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">356x114x203</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2580</td><td class="px-3 py-2 text-center text-neutral-700">2115</td><td class="px-3 py-2 text-center text-neutral-700">1830</td><td class="px-3 py-2 text-center text-neutral-700">1875</td><td class="px-3 py-2 text-center text-neutral-700">1530</td><td class="px-3 py-2 text-center text-neutral-700">24</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14x5x10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">356x127x254</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">2945</td><td class="px-3 py-2 text-center text-neutral-700">2415</td><td class="px-3 py-2 text-center text-neutral-700">2105</td><td class="px-3 py-2 text-center text-neutral-700">2140</td><td class="px-3 py-2 text-center text-neutral-700">1755</td><td class="px-3 py-2 text-center text-neutral-700">26</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15½x5x10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">394x127x254</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3240</td><td class="px-3 py-2 text-center text-neutral-700">2670</td><td class="px-3 py-2 text-center text-neutral-700">2315</td><td class="px-3 py-2 text-center text-neutral-700">2360</td><td class="px-3 py-2 text-center text-neutral-700">1930</td><td class="px-3 py-2 text-center text-neutral-700">33</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x5x10½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">406x127x267</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3330</td><td class="px-3 py-2 text-center text-neutral-700">2735</td><td class="px-3 py-2 text-center text-neutral-700">2380</td><td class="px-3 py-2 text-center text-neutral-700">2415</td><td class="px-3 py-2 text-center text-neutral-700">1975</td><td class="px-3 py-2 text-center text-neutral-700">33</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6x10½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">406x152x267</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">4210</td><td class="px-3 py-2 text-center text-neutral-700">3460</td><td class="px-3 py-2 text-center text-neutral-700">3000</td><td class="px-3 py-2 text-center text-neutral-700">3065</td><td class="px-3 py-2 text-center text-neutral-700">2515</td><td class="px-3 py-2 text-center text-neutral-700">38</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x7x10½</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">406x178x267</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">5125</td><td class="px-3 py-2 text-center text-neutral-700">4210</td><td class="px-3 py-2 text-center text-neutral-700">3660</td><td class="px-3 py-2 text-center text-neutral-700">3715</td><td class="px-3 py-2 text-center text-neutral-700">3040</td><td class="px-3 py-2 text-center text-neutral-700">43</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x5x11¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">381x127x286</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3065</td><td class="px-3 py-2 text-center text-neutral-700">2515</td><td class="px-3 py-2 text-center text-neutral-700">2185</td><td class="px-3 py-2 text-center text-neutral-700">2225</td><td class="px-3 py-2 text-center text-neutral-700">1830</td><td class="px-3 py-2 text-center text-neutral-700">27</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x6x11¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">381x152x286</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3780</td><td class="px-3 py-2 text-center text-neutral-700">3110</td><td class="px-3 py-2 text-center text-neutral-700">2700</td><td class="px-3 py-2 text-center text-neutral-700">2745</td><td class="px-3 py-2 text-center text-neutral-700">2250</td><td class="px-3 py-2 text-center text-neutral-700">33</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x5x11¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">413x127x286</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3375</td><td class="px-3 py-2 text-center text-neutral-700">2755</td><td class="px-3 py-2 text-center text-neutral-700">2405</td><td class="px-3 py-2 text-center text-neutral-700">2435</td><td class="px-3 py-2 text-center text-neutral-700">1995</td><td class="px-3 py-2 text-center text-neutral-700">32</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x6x11¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">413x152x286</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700">PL</td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">4235</td><td class="px-3 py-2 text-center text-neutral-700">3485</td><td class="px-3 py-2 text-center text-neutral-700">3020</td><td class="px-3 py-2 text-center text-neutral-700">3075</td><td class="px-3 py-2 text-center text-neutral-700">2515</td><td class="px-3 py-2 text-center text-neutral-700">39</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x7x11¼</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">413x178x286</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">5125</td><td class="px-3 py-2 text-center text-neutral-700">4190</td><td class="px-3 py-2 text-center text-neutral-700">3640</td><td class="px-3 py-2 text-center text-neutral-700">3705</td><td class="px-3 py-2 text-center text-neutral-700">3040</td><td class="px-3 py-2 text-center text-neutral-700">45</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x4½x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">432x114x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3020</td><td class="px-3 py-2 text-center text-neutral-700">2490</td><td class="px-3 py-2 text-center text-neutral-700">2160</td><td class="px-3 py-2 text-center text-neutral-700">2195</td><td class="px-3 py-2 text-center text-neutral-700">1795</td><td class="px-3 py-2 text-center text-neutral-700">30</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x5x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">432x127x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3460</td><td class="px-3 py-2 text-center text-neutral-700">2845</td><td class="px-3 py-2 text-center text-neutral-700">2470</td><td class="px-3 py-2 text-center text-neutral-700">2525</td><td class="px-3 py-2 text-center text-neutral-700">2060</td><td class="px-3 py-2 text-center text-neutral-700">34</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x6x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">432x152x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">4365</td><td class="px-3 py-2 text-center text-neutral-700">3595</td><td class="px-3 py-2 text-center text-neutral-700">3110</td><td class="px-3 py-2 text-center text-neutral-700">3165</td><td class="px-3 py-2 text-center text-neutral-700">2600</td><td class="px-3 py-2 text-center text-neutral-700">40</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x5x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">457x127x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">3615</td><td class="px-3 py-2 text-center text-neutral-700">2975</td><td class="px-3 py-2 text-center text-neutral-700">2580</td><td class="px-3 py-2 text-center text-neutral-700">2635</td><td class="px-3 py-2 text-center text-neutral-700">2160</td><td class="px-3 py-2 text-center text-neutral-700">38</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x6x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">457x152x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">4630</td><td class="px-3 py-2 text-center text-neutral-700">3790</td><td class="px-3 py-2 text-center text-neutral-700">3305</td><td class="px-3 py-2 text-center text-neutral-700">3360</td><td class="px-3 py-2 text-center text-neutral-700">2755</td><td class="px-3 py-2 text-center text-neutral-700">47</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">457x178x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">5620</td><td class="px-3 py-2 text-center text-neutral-700">4630</td><td class="px-3 py-2 text-center text-neutral-700">4010</td><td class="px-3 py-2 text-center text-neutral-700">4090</td><td class="px-3 py-2 text-center text-neutral-700">3350</td><td class="px-3 py-2 text-center text-neutral-700">53</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x8x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">457x203x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">6615</td><td class="px-3 py-2 text-center text-neutral-700">5455</td><td class="px-3 py-2 text-center text-neutral-700">4740</td><td class="px-3 py-2 text-center text-neutral-700">4805</td><td class="px-3 py-2 text-center text-neutral-700">3945</td><td class="px-3 py-2 text-center text-neutral-700">61</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x9x121/8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">457x229x308</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">7605</td><td class="px-3 py-2 text-center text-neutral-700">6285</td><td class="px-3 py-2 text-center text-neutral-700">5455</td><td class="px-3 py-2 text-center text-neutral-700">5535</td><td class="px-3 py-2 text-center text-neutral-700">4540</td><td class="px-3 py-2 text-center text-neutral-700">69</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x6x15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">533x152x381</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">5180</td><td class="px-3 py-2 text-center text-neutral-700">4255</td><td class="px-3 py-2 text-center text-neutral-700">3705</td><td class="px-3 py-2 text-center text-neutral-700">3770</td><td class="px-3 py-2 text-center text-neutral-700">3085</td><td class="px-3 py-2 text-center text-neutral-700">57</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x7x15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">533x178x381</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700">PL</td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">6340</td><td class="px-3 py-2 text-center text-neutral-700">5180</td><td class="px-3 py-2 text-center text-neutral-700">4520</td><td class="px-3 py-2 text-center text-neutral-700">4595</td><td class="px-3 py-2 text-center text-neutral-700">3770</td><td class="px-3 py-2 text-center text-neutral-700">68</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8x15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">533x203x381</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">7440</td><td class="px-3 py-2 text-center text-neutral-700">6120</td><td class="px-3 py-2 text-center text-neutral-700">5345</td><td class="px-3 py-2 text-center text-neutral-700">5410</td><td class="px-3 py-2 text-center text-neutral-700">4440</td><td class="px-3 py-2 text-center text-neutral-700">80</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x9x15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">533x229x381</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">8600</td><td class="px-3 py-2 text-center text-neutral-700">7055</td><td class="px-3 py-2 text-center text-neutral-700">6120</td><td class="px-3 py-2 text-center text-neutral-700">6240</td><td class="px-3 py-2 text-center text-neutral-700">5115</td><td class="px-3 py-2 text-center text-neutral-700">86</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x7x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x178x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">6560</td><td class="px-3 py-2 text-center text-neutral-700">5400</td><td class="px-3 py-2 text-center text-neutral-700">4685</td><td class="px-3 py-2 text-center text-neutral-700">4760</td><td class="px-3 py-2 text-center text-neutral-700">3900</td><td class="px-3 py-2 text-center text-neutral-700">72</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x8x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x203x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700">PL</td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">7715</td><td class="px-3 py-2 text-center text-neutral-700">6340</td><td class="px-3 py-2 text-center text-neutral-700">5510</td><td class="px-3 py-2 text-center text-neutral-700">5610</td><td class="px-3 py-2 text-center text-neutral-700">4595</td><td class="px-3 py-2 text-center text-neutral-700">80</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x9x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x229x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">8930</td><td class="px-3 py-2 text-center text-neutral-700">7330</td><td class="px-3 py-2 text-center text-neutral-700">6340</td><td class="px-3 py-2 text-center text-neutral-700">6460</td><td class="px-3 py-2 text-center text-neutral-700">5290</td><td class="px-3 py-2 text-center text-neutral-700">94</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x10x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x254x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">10085</td><td class="px-3 py-2 text-center text-neutral-700">8265</td><td class="px-3 py-2 text-center text-neutral-700">7165</td><td class="px-3 py-2 text-center text-neutral-700">7310</td><td class="px-3 py-2 text-center text-neutral-700">5995</td><td class="px-3 py-2 text-center text-neutral-700">99</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x12x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x305x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">12400</td><td class="px-3 py-2 text-center text-neutral-700">10195</td><td class="px-3 py-2 text-center text-neutral-700">8875</td><td class="px-3 py-2 text-center text-neutral-700">9015</td><td class="px-3 py-2 text-center text-neutral-700">7385</td><td class="px-3 py-2 text-center text-neutral-700">124</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x14x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x356x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">14770</td><td class="px-3 py-2 text-center text-neutral-700">12135</td><td class="px-3 py-2 text-center text-neutral-700">10550</td><td class="px-3 py-2 text-center text-neutral-700">10725</td><td class="px-3 py-2 text-center text-neutral-700">8795</td><td class="px-3 py-2 text-center text-neutral-700">145</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x16x16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x406x406</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">17075</td><td class="px-3 py-2 text-center text-neutral-700">14020</td><td class="px-3 py-2 text-center text-neutral-700">12190</td><td class="px-3 py-2 text-center text-neutral-700">12400</td><td class="px-3 py-2 text-center text-neutral-700">10165</td><td class="px-3 py-2 text-center text-neutral-700">167</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x6x17¾</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">559x152x451</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">5170</td><td class="px-3 py-2 text-center text-neutral-700">4245</td><td class="px-3 py-2 text-center text-neutral-700">3695</td><td class="px-3 py-2 text-center text-neutral-700">3750</td><td class="px-3 py-2 text-center text-neutral-700">3075</td><td class="px-3 py-2 text-center text-neutral-700">54</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">26x7x20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">660x178x508</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">7440</td><td class="px-3 py-2 text-center text-neutral-700">6120</td><td class="px-3 py-2 text-center text-neutral-700">5290</td><td class="px-3 py-2 text-center text-neutral-700">5390</td><td class="px-3 py-2 text-center text-neutral-700">4420</td><td class="px-3 py-2 text-center text-neutral-700">89</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x10x22</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">711x254x559</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">12060</td><td class="px-3 py-2 text-center text-neutral-700">9900</td><td class="px-3 py-2 text-center text-neutral-700">8610</td><td class="px-3 py-2 text-center text-neutral-700">8750</td><td class="px-3 py-2 text-center text-neutral-700">7175</td><td class="px-3 py-2 text-center text-neutral-700">142</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x12x22</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">711x305x559</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">GL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">14860</td><td class="px-3 py-2 text-center text-neutral-700">12215</td><td class="px-3 py-2 text-center text-neutral-700">10625</td><td class="px-3 py-2 text-center text-neutral-700">10805</td><td class="px-3 py-2 text-center text-neutral-700">8850</td><td class="px-3 py-2 text-center text-neutral-700">166</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x14x22</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">711x356x559</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">17680</td><td class="px-3 py-2 text-center text-neutral-700">14530</td><td class="px-3 py-2 text-center text-neutral-700">12610</td><td class="px-3 py-2 text-center text-neutral-700">12830</td><td class="px-3 py-2 text-center text-neutral-700">10540</td><td class="px-3 py-2 text-center text-neutral-700">196</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x16x22</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">711x406x559</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">20435</td><td class="px-3 py-2 text-center text-neutral-700">16800</td><td class="px-3 py-2 text-center text-neutral-700">14595</td><td class="px-3 py-2 text-center text-neutral-700">14835</td><td class="px-3 py-2 text-center text-neutral-700">12170</td><td class="px-3 py-2 text-center text-neutral-700">224</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">40x12x30</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">1016x305x762</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">19310</td><td class="px-3 py-2 text-center text-neutral-700">15805</td><td class="px-3 py-2 text-center text-neutral-700">12545</td><td class="px-3 py-2 text-center text-neutral-700">13295</td><td class="px-3 py-2 text-center text-neutral-700">11045</td><td class="px-3 py-2 text-center text-neutral-700">327</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">40x14x30</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">1016x356x762</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">23390</td><td class="px-3 py-2 text-center text-neutral-700">19125</td><td class="px-3 py-2 text-center text-neutral-700">15190</td><td class="px-3 py-2 text-center text-neutral-700">16095</td><td class="px-3 py-2 text-center text-neutral-700">13360</td><td class="px-3 py-2 text-center text-neutral-700">384</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">40x16x30</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">1016x406x762</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">27380</td><td class="px-3 py-2 text-center text-neutral-700">22400</td><td class="px-3 py-2 text-center text-neutral-700">17770</td><td class="px-3 py-2 text-center text-neutral-700">18850</td><td class="px-3 py-2 text-center text-neutral-700">15640</td><td class="px-3 py-2 text-center text-neutral-700">436</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">40x20x30</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">1016x508x762</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">FL</td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700"></td><td class="px-3 py-2 text-center text-neutral-700">35540</td><td class="px-3 py-2 text-center text-neutral-700">29055</td><td class="px-3 py-2 text-center text-neutral-700">23060</td><td class="px-3 py-2 text-center text-neutral-700">24450</td><td class="px-3 py-2 text-center text-neutral-700">20305</td><td class="px-3 py-2 text-center text-neutral-700">553</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="12" class="px-3 py-3 text-center text-xs"></td>
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
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300 [content-visibility:auto] [contain-intrinsic-size:1px_700px]"
  style="
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image:image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
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
          >
            <script
              src="https://js.hsforms.net/forms/shell.js"
              async
              defer
              fetchpriority="low"
              charset="utf-8"
            ></script>
            <script>
              window.addEventListener('load', function () {
                const root = document.querySelector('[data-hs-forms-root="true"]');
                if (!root) return;

                const createForm = function () {
                  if (window.hbspt && window.hbspt.forms && window.hbspt.forms.create && !root.dataset.formRendered) {
                    root.dataset.formRendered = '1';
                    hbspt.forms.create({
                      portalId: root.dataset.portalId,
                      formId: root.dataset.formId,
                      target: '[data-hs-forms-root="true"]'
                    });
                  }
                };

                if ('requestIdleCallback' in window) {
                  requestIdleCallback(createForm, { timeout: 2500 });
                } else {
                  setTimeout(createForm, 1200);
                }
              });
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