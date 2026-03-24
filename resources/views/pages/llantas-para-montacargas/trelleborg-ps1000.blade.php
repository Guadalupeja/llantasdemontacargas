@extends('layouts.public')

@section('title', 'Llantas sólidas Press On con aro para Montacargas | PS1000')
@section('meta_description', 'Cotiza aquí llantas con Garantía de vida 25% más de la marca Trelleborg. Precios Mayorista, crédito y entrega inmediata. Llantas tipo cushion para Montacargas.')

@section('structured-data')
  @php
    $heroJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
    $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
    $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
    $heroAvif960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
    $heroWebp960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
    $productImage = asset('storage/originals/PS1000.png');
    $logoImage = asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png');
    $pdfPs1000 = asset('pdfs/Trelleborg_PS1000_ENG-1.pdf');
  @endphp

  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    href="{{ $heroJpg }}"
    imagesrcset="{{ $heroAvif1024 }}, {{ $heroWebp1024 }}, {{ $heroJpg }}"
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
        "alternateName": [
          "BSH",
          "RUGUEX",
          "BSH | RUGUEX"
        ],
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ $logoImage }}"
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
          {
            "@type": "Brand",
            "name": "RUGUEX"
          },
          {
            "@type": "Brand",
            "name": "Trelleborg"
          }
        ],
        "knowsAbout": [
          "Llantas para montacargas",
          "Llantas sólidas press on con aro para montacargas",
          "Llantas cushion para montacargas",
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
          "url": "{{ $productImage }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg PS1000",
        "alternateName": [
          "PS1000",
          "Llanta sólida Press On con aro para montacargas Trelleborg PS1000",
          "Llanta cushion Trelleborg PS1000",
          "Bandaje con aro Trelleborg PS1000"
        ],
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
        "description": "Llanta PREMIUM sólida con aro metálico Trelleborg PS1000 para montacargas. Diseñada para rendimiento prolongado, conducción cómoda y ahorro de combustible, con 25% más vida llanta contra llanta garantizado por escrito, alta resistencia al desgaste, polímero patentado para reducir vibraciones y perfiles lisos o de tracción para distintos terrenos.",
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
            "value": "Llanta sólida Press On con aro para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "PS1000"
          },
          {
            "@type": "PropertyValue",
            "name": "Configuración",
            "value": "Cushion / Press On con aro metálico"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Conducción más cómoda"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Mayor ahorro de combustible"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Excelente maniobrabilidad y posicionamiento para carga"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en 4 perfiles de tracción y lisos para distintos terrenos"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Polímero patentado que reduce vibraciones, absorbe impactos y mejora la disipación de calor"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Enlace permanente entre el hule y el aro metálico"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en perfil Mono-Cushion para manejo más cómodo"
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
            "name": "Ficha técnica Trelleborg PS1000",
            "url": "{{ $pdfPs1000 }}"
          },
          {
            "@type": "VideoObject",
            "name": "Llantas sólidas para Montacargas MONARCH POS TRELLEBORG",
            "embedUrl": "https://www.youtube.com/embed/Xz3Ers83Nj0?controls=1&rel=0",
            "description": "Video informativo sobre llantas sólidas Press On para montacargas Trelleborg."
          },
          {
            "@type": "Dataset",
            "name": "Tabla de medidas y capacidades Trelleborg PS1000",
            "description": "Tabla técnica con Size, Metric Size y capacidades de carga a distintas velocidades para la llanta sólida Press On con aro Trelleborg PS1000."
          }
        ],
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#sizes"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Press On con aro Trelleborg PS1000 para montacargas",
        "serviceType": "Venta y asesoría técnica de llantas sólidas cushion con aro para montacargas",
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
        "name": "Medidas disponibles Trelleborg PS1000",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 57,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "8½x4x4" },
          { "@type": "ListItem", "position": 2, "name": "9x5x5" },
          { "@type": "ListItem", "position": 3, "name": "10x3x6¼" },
          { "@type": "ListItem", "position": 4, "name": "10x6x6¼" },
          { "@type": "ListItem", "position": 5, "name": "10x7x6¼" },
          { "@type": "ListItem", "position": 6, "name": "10x4x6½" },
          { "@type": "ListItem", "position": 7, "name": "10x5x6½" },
          { "@type": "ListItem", "position": 8, "name": "10½x5x6½" },
          { "@type": "ListItem", "position": 9, "name": "12x3½x8" },
          { "@type": "ListItem", "position": 10, "name": "12x4x8" },
          { "@type": "ListItem", "position": 11, "name": "12x4½x8" },
          { "@type": "ListItem", "position": 12, "name": "12x5½x8" },
          { "@type": "ListItem", "position": 13, "name": "13x4½x8" },
          { "@type": "ListItem", "position": 14, "name": "13½x4½x8" },
          { "@type": "ListItem", "position": 15, "name": "13½x5½x8" },
          { "@type": "ListItem", "position": 16, "name": "13½x6½x8" },
          { "@type": "ListItem", "position": 17, "name": "14x4½x8" },
          { "@type": "ListItem", "position": 18, "name": "14x5x10" },
          { "@type": "ListItem", "position": 19, "name": "15½x5x10" },
          { "@type": "ListItem", "position": 20, "name": "15½x6x10" },
          { "@type": "ListItem", "position": 21, "name": "16x5x10½" },
          { "@type": "ListItem", "position": 22, "name": "16x6x10½" },
          { "@type": "ListItem", "position": 23, "name": "16x7x10½" },
          { "@type": "ListItem", "position": 24, "name": "15x4x11¼" },
          { "@type": "ListItem", "position": 25, "name": "15x5x11¼" },
          { "@type": "ListItem", "position": 26, "name": "15x6x11¼" },
          { "@type": "ListItem", "position": 27, "name": "15x7x11¼" },
          { "@type": "ListItem", "position": 28, "name": "15x8x11¼" },
          { "@type": "ListItem", "position": 29, "name": "16¼x4x11¼" },
          { "@type": "ListItem", "position": 30, "name": "16¼x5x11¼" },
          { "@type": "ListItem", "position": 31, "name": "16¼x6x11¼" },
          { "@type": "ListItem", "position": 32, "name": "16¼x7x11¼" },
          { "@type": "ListItem", "position": 33, "name": "16x3½x12⅛" },
          { "@type": "ListItem", "position": 34, "name": "16x4x12⅛" },
          { "@type": "ListItem", "position": 35, "name": "17x6x12⅛" },
          { "@type": "ListItem", "position": 36, "name": "18x5x12⅛" },
          { "@type": "ListItem", "position": 37, "name": "18x6x12⅛" },
          { "@type": "ListItem", "position": 38, "name": "18x7x12⅛" },
          { "@type": "ListItem", "position": 39, "name": "18x8x12⅛" },
          { "@type": "ListItem", "position": 40, "name": "18x9x12⅛" },
          { "@type": "ListItem", "position": 41, "name": "21x6x15" },
          { "@type": "ListItem", "position": 42, "name": "21x7x15" },
          { "@type": "ListItem", "position": 43, "name": "21x8x15" },
          { "@type": "ListItem", "position": 44, "name": "21x9x15" },
          { "@type": "ListItem", "position": 45, "name": "22x6x16" },
          { "@type": "ListItem", "position": 46, "name": "22x7x16" },
          { "@type": "ListItem", "position": 47, "name": "22x8x16" },
          { "@type": "ListItem", "position": 48, "name": "22x9x16" },
          { "@type": "ListItem", "position": 49, "name": "22x10x16" },
          { "@type": "ListItem", "position": 50, "name": "22x12x16" },
          { "@type": "ListItem", "position": 51, "name": "22x6x17¾" },
          { "@type": "ListItem", "position": 52, "name": "28x10x22" },
          { "@type": "ListItem", "position": 53, "name": "28x12x22" },
          { "@type": "ListItem", "position": 54, "name": "28x14x22" },
          { "@type": "ListItem", "position": 55, "name": "28x16x22" },
          { "@type": "ListItem", "position": 56, "name": "36x12x30" },
          { "@type": "ListItem", "position": 57, "name": "36x16x30" }
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
            "name": "Llantas sólidas Press On con aro para montacargas",
            "item": "{{ url()->current() }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg PS1000",
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
    $variants = image_variants('originals/PS1000.png');
    $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

    $srcsetAvif = !empty($variants['avif'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['avif']))
      : null;

    $srcsetWebp = !empty($variants['webp'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['webp']))
      : null;

    $srcsetJpg = !empty($variants['jpg'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $variants['jpg']))
      : null;

    $fallback = $variants['fallback']['url'] ?? $productImage;
  @endphp

<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="relative mx-auto max-w-[1140px]">
    <div class="relative flex min-h-px w-full">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="mb-5 h-[68px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <h1 class="m-0 font-sans text-[22px] font-semibold leading-[22px] text-black lg:text-[32px] lg:leading-[32px]">
            Llantas Sólidas con Aro para Montacargas.
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 text-[#7a7a7a]">
            Llantas Sólidas con anillo tipo cushion, libres de mantenimiento, imponchables y con fácil intercambiabilidad.
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
            decoding="async"
            loading="eager"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Trelleborg PS1000"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] font-semibold leading-[33px] text-black lg:text-[43px] lg:leading-[43px]">
        Trelleborg PS 1000.
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
          Llanta PREMIUM sólida con aro metálico para rendimiento prolongado que ofrece una conducción muy comoda y mayor ahorro de combustible.
        </p>

        <p class="mb-5 mt-6 font-bold">
          25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>El nuevo PS1000 dura hasta un 30% más que los neumáticos de la competencia disponibles en el mercado, lo que lleva a un costo por hora muy bajo</li>
          <li>Excelente maniobrabilidad y posicionamiento para carga.</li>
          <li>Disponible en 4 perfiles de tracción y lisos para todo tipo de terreno.</li>
          <li>Polímero patentado reduce vibraciones, aumenta la disipación de calor y absorbe impactos previniendo cortes y fisuras.</li>
          <li>Enlace permanente entre el hule y el aro metálico.</li>
          <li>Disponible en perfiles lisos, de tracción y Mono-Cushion® que brinda un manejo mas cómodo.</li>
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
            href="{{ $pdfPs1000 }}"
            download="Trelleborg_PS1000_ENG-1.pdf"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center"><span class="block">Descargar Ficha</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="h-[10px] lg:h-[45px]" aria-hidden="true"></div>

<section
  class="relative mt-6"
  role="region"
  aria-label="Tabla de medidas y capacidades"
  style="content-visibility:auto;contain-intrinsic-size:1200px;"
>
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1400px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Metric Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> @ 6 km/h</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> @ 10 km/h</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> @ 16 km/h</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> @ 25 km/h <br> Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity <br> @ 25 km/h <br> Steering Wheel</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8½x4x4</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">216x102x102</td>
              <td class="px-3 py-2 text-center text-neutral-700">695</td>
              <td class="px-3 py-2 text-center text-neutral-700">575</td>
              <td class="px-3 py-2 text-center text-neutral-700">500</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9x5x5</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">229x127x127</td>
              <td class="px-3 py-2 text-center text-neutral-700">960</td>
              <td class="px-3 py-2 text-center text-neutral-700">790</td>
              <td class="px-3 py-2 text-center text-neutral-700">680</td>
              <td class="px-3 py-2 text-center text-neutral-700">695</td>
              <td class="px-3 py-2 text-center text-neutral-700">570</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x3x6¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">254x76x159</td>
              <td class="px-3 py-2 text-center text-neutral-700">1365</td>
              <td class="px-3 py-2 text-center text-neutral-700">1120</td>
              <td class="px-3 py-2 text-center text-neutral-700">955</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x6x6¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">254x152x159</td>
              <td class="px-3 py-2 text-center text-neutral-700">1270</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">910</td>
              <td class="px-3 py-2 text-center text-neutral-700">925</td>
              <td class="px-3 py-2 text-center text-neutral-700">755</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x7x6¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">254x178x159</td>
              <td class="px-3 py-2 text-center text-neutral-700">1515</td>
              <td class="px-3 py-2 text-center text-neutral-700">1245</td>
              <td class="px-3 py-2 text-center text-neutral-700">1085</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x4x6½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">254x102x165</td>
              <td class="px-3 py-2 text-center text-neutral-700">780</td>
              <td class="px-3 py-2 text-center text-neutral-700">640</td>
              <td class="px-3 py-2 text-center text-neutral-700">555</td>
              <td class="px-3 py-2 text-center text-neutral-700">565</td>
              <td class="px-3 py-2 text-center text-neutral-700">465</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10x5x6½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">254x127x165</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">830</td>
              <td class="px-3 py-2 text-center text-neutral-700">725</td>
              <td class="px-3 py-2 text-center text-neutral-700">735</td>
              <td class="px-3 py-2 text-center text-neutral-700">605</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x5x6½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">267x127x165</td>
              <td class="px-3 py-2 text-center text-neutral-700">1070</td>
              <td class="px-3 py-2 text-center text-neutral-700">880</td>
              <td class="px-3 py-2 text-center text-neutral-700">770</td>
              <td class="px-3 py-2 text-center text-neutral-700">780</td>
              <td class="px-3 py-2 text-center text-neutral-700">640</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x3½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">305x89x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">760</td>
              <td class="px-3 py-2 text-center text-neutral-700">620</td>
              <td class="px-3 py-2 text-center text-neutral-700">595</td>
              <td class="px-3 py-2 text-center text-neutral-700">590</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x4x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">305x102x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">905</td>
              <td class="px-3 py-2 text-center text-neutral-700">745</td>
              <td class="px-3 py-2 text-center text-neutral-700">680</td>
              <td class="px-3 py-2 text-center text-neutral-700">660</td>
              <td class="px-3 py-2 text-center text-neutral-700">540</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x4½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">305x114x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1045</td>
              <td class="px-3 py-2 text-center text-neutral-700">860</td>
              <td class="px-3 py-2 text-center text-neutral-700">745</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12x5½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">305x140x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1335</td>
              <td class="px-3 py-2 text-center text-neutral-700">1095</td>
              <td class="px-3 py-2 text-center text-neutral-700">950</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13x4½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">330x114x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1120</td>
              <td class="px-3 py-2 text-center text-neutral-700">920</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
              <td class="px-3 py-2 text-center text-neutral-700">815</td>
              <td class="px-3 py-2 text-center text-neutral-700">670</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x4½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">343x114x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
              <td class="px-3 py-2 text-center text-neutral-700">940</td>
              <td class="px-3 py-2 text-center text-neutral-700">820</td>
              <td class="px-3 py-2 text-center text-neutral-700">835</td>
              <td class="px-3 py-2 text-center text-neutral-700">685</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x5½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">343x140x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1510</td>
              <td class="px-3 py-2 text-center text-neutral-700">1240</td>
              <td class="px-3 py-2 text-center text-neutral-700">1080</td>
              <td class="px-3 py-2 text-center text-neutral-700">1095</td>
              <td class="px-3 py-2 text-center text-neutral-700">895</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">13½x6½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">343x165x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1865</td>
              <td class="px-3 py-2 text-center text-neutral-700">1530</td>
              <td class="px-3 py-2 text-center text-neutral-700">1330</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14x4½x8</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">356x114x203</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">960</td>
              <td class="px-3 py-2 text-center text-neutral-700">830</td>
              <td class="px-3 py-2 text-center text-neutral-700">850</td>
              <td class="px-3 py-2 text-center text-neutral-700">695</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">14x5x10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">356x127x254</td>
              <td class="px-3 py-2 text-center text-neutral-700">1335</td>
              <td class="px-3 py-2 text-center text-neutral-700">1095</td>
              <td class="px-3 py-2 text-center text-neutral-700">955</td>
              <td class="px-3 py-2 text-center text-neutral-700">970</td>
              <td class="px-3 py-2 text-center text-neutral-700">795</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15½x5x10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">394x127x254</td>
              <td class="px-3 py-2 text-center text-neutral-700">1470</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1050</td>
              <td class="px-3 py-2 text-center text-neutral-700">1070</td>
              <td class="px-3 py-2 text-center text-neutral-700">875</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15½x6x10</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">394x152x254</td>
              <td class="px-3 py-2 text-center text-neutral-700">1870</td>
              <td class="px-3 py-2 text-center text-neutral-700">1530</td>
              <td class="px-3 py-2 text-center text-neutral-700">1330</td>
              <td class="px-3 py-2 text-center text-neutral-700">1355</td>
              <td class="px-3 py-2 text-center text-neutral-700">1110</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x5x10½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">406x127x267</td>
              <td class="px-3 py-2 text-center text-neutral-700">1510</td>
              <td class="px-3 py-2 text-center text-neutral-700">1240</td>
              <td class="px-3 py-2 text-center text-neutral-700">1080</td>
              <td class="px-3 py-2 text-center text-neutral-700">1095</td>
              <td class="px-3 py-2 text-center text-neutral-700">895</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6x10½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">406x152x267</td>
              <td class="px-3 py-2 text-center text-neutral-700">1910</td>
              <td class="px-3 py-2 text-center text-neutral-700">1570</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">1390</td>
              <td class="px-3 py-2 text-center text-neutral-700">1140</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x7x10½</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">406x178x267</td>
              <td class="px-3 py-2 text-center text-neutral-700">2325</td>
              <td class="px-3 py-2 text-center text-neutral-700">1910</td>
              <td class="px-3 py-2 text-center text-neutral-700">1660</td>
              <td class="px-3 py-2 text-center text-neutral-700">1685</td>
              <td class="px-3 py-2 text-center text-neutral-700">1380</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">381x102x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">2735</td>
              <td class="px-3 py-2 text-center text-neutral-700">2245</td>
              <td class="px-3 py-2 text-center text-neutral-700">1915</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x5x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">381x127x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">1390</td>
              <td class="px-3 py-2 text-center text-neutral-700">1140</td>
              <td class="px-3 py-2 text-center text-neutral-700">990</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">830</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x6x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">381x152x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">1715</td>
              <td class="px-3 py-2 text-center text-neutral-700">1410</td>
              <td class="px-3 py-2 text-center text-neutral-700">1225</td>
              <td class="px-3 py-2 text-center text-neutral-700">1245</td>
              <td class="px-3 py-2 text-center text-neutral-700">1020</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x7x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">381x178x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">2055</td>
              <td class="px-3 py-2 text-center text-neutral-700">1690</td>
              <td class="px-3 py-2 text-center text-neutral-700">1470</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x8x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">381x203x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">2385</td>
              <td class="px-3 py-2 text-center text-neutral-700">1960</td>
              <td class="px-3 py-2 text-center text-neutral-700">1705</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x4x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">413x101x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">1130</td>
              <td class="px-3 py-2 text-center text-neutral-700">925</td>
              <td class="px-3 py-2 text-center text-neutral-700">805</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x5x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">413x127x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">1530</td>
              <td class="px-3 py-2 text-center text-neutral-700">1250</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">1105</td>
              <td class="px-3 py-2 text-center text-neutral-700">905</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x6x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">413x152x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">1920</td>
              <td class="px-3 py-2 text-center text-neutral-700">1580</td>
              <td class="px-3 py-2 text-center text-neutral-700">1370</td>
              <td class="px-3 py-2 text-center text-neutral-700">1395</td>
              <td class="px-3 py-2 text-center text-neutral-700">1140</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16¼x7x11¼</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">413x178x286</td>
              <td class="px-3 py-2 text-center text-neutral-700">2325</td>
              <td class="px-3 py-2 text-center text-neutral-700">1900</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
              <td class="px-3 py-2 text-center text-neutral-700">1680</td>
              <td class="px-3 py-2 text-center text-neutral-700">1380</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x3½x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">406x89x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">940</td>
              <td class="px-3 py-2 text-center text-neutral-700">770</td>
              <td class="px-3 py-2 text-center text-neutral-700">670</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x4x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">406x102x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">1120</td>
              <td class="px-3 py-2 text-center text-neutral-700">920</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
              <td class="px-3 py-2 text-center text-neutral-700">810</td>
              <td class="px-3 py-2 text-center text-neutral-700">665</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x6x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">432x152x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">1980</td>
              <td class="px-3 py-2 text-center text-neutral-700">1630</td>
              <td class="px-3 py-2 text-center text-neutral-700">1410</td>
              <td class="px-3 py-2 text-center text-neutral-700">1435</td>
              <td class="px-3 py-2 text-center text-neutral-700">1180</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x5x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">457x127x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">1640</td>
              <td class="px-3 py-2 text-center text-neutral-700">1350</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">1195</td>
              <td class="px-3 py-2 text-center text-neutral-700">980</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x6x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">457x152x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">2100</td>
              <td class="px-3 py-2 text-center text-neutral-700">1720</td>
              <td class="px-3 py-2 text-center text-neutral-700">1500</td>
              <td class="px-3 py-2 text-center text-neutral-700">1525</td>
              <td class="px-3 py-2 text-center text-neutral-700">1250</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">457x178x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">2550</td>
              <td class="px-3 py-2 text-center text-neutral-700">2100</td>
              <td class="px-3 py-2 text-center text-neutral-700">1820</td>
              <td class="px-3 py-2 text-center text-neutral-700">1855</td>
              <td class="px-3 py-2 text-center text-neutral-700">1520</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x8x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">457x203x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
              <td class="px-3 py-2 text-center text-neutral-700">2475</td>
              <td class="px-3 py-2 text-center text-neutral-700">2150</td>
              <td class="px-3 py-2 text-center text-neutral-700">2180</td>
              <td class="px-3 py-2 text-center text-neutral-700">1790</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x9x12⅛</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">457x229x308</td>
              <td class="px-3 py-2 text-center text-neutral-700">3450</td>
              <td class="px-3 py-2 text-center text-neutral-700">2850</td>
              <td class="px-3 py-2 text-center text-neutral-700">2475</td>
              <td class="px-3 py-2 text-center text-neutral-700">2510</td>
              <td class="px-3 py-2 text-center text-neutral-700">2060</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x6x15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">533x152x381</td>
              <td class="px-3 py-2 text-center text-neutral-700">2350</td>
              <td class="px-3 py-2 text-center text-neutral-700">1930</td>
              <td class="px-3 py-2 text-center text-neutral-700">1680</td>
              <td class="px-3 py-2 text-center text-neutral-700">1710</td>
              <td class="px-3 py-2 text-center text-neutral-700">1400</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x7x15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">533x178x381</td>
              <td class="px-3 py-2 text-center text-neutral-700">2875</td>
              <td class="px-3 py-2 text-center text-neutral-700">2350</td>
              <td class="px-3 py-2 text-center text-neutral-700">2050</td>
              <td class="px-3 py-2 text-center text-neutral-700">2085</td>
              <td class="px-3 py-2 text-center text-neutral-700">1710</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8x15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">533x203x381</td>
              <td class="px-3 py-2 text-center text-neutral-700">3375</td>
              <td class="px-3 py-2 text-center text-neutral-700">2775</td>
              <td class="px-3 py-2 text-center text-neutral-700">2425</td>
              <td class="px-3 py-2 text-center text-neutral-700">2455</td>
              <td class="px-3 py-2 text-center text-neutral-700">2015</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x9x15</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">533x229x381</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3200</td>
              <td class="px-3 py-2 text-center text-neutral-700">2775</td>
              <td class="px-3 py-2 text-center text-neutral-700">2830</td>
              <td class="px-3 py-2 text-center text-neutral-700">2320</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">20x8x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">508x203x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">3015</td>
              <td class="px-3 py-2 text-center text-neutral-700">2475</td>
              <td class="px-3 py-2 text-center text-neutral-700">2150</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">20x9x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">508x229x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">3435</td>
              <td class="px-3 py-2 text-center text-neutral-700">2820</td>
              <td class="px-3 py-2 text-center text-neutral-700">2455</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x6x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x152x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">2450</td>
              <td class="px-3 py-2 text-center text-neutral-700">2000</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1770</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x7x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x178x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">2975</td>
              <td class="px-3 py-2 text-center text-neutral-700">2450</td>
              <td class="px-3 py-2 text-center text-neutral-700">2125</td>
              <td class="px-3 py-2 text-center text-neutral-700">2160</td>
              <td class="px-3 py-2 text-center text-neutral-700">1770</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x8x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x203x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">3500</td>
              <td class="px-3 py-2 text-center text-neutral-700">2875</td>
              <td class="px-3 py-2 text-center text-neutral-700">2500</td>
              <td class="px-3 py-2 text-center text-neutral-700">2545</td>
              <td class="px-3 py-2 text-center text-neutral-700">2085</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x9x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x229x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">4050</td>
              <td class="px-3 py-2 text-center text-neutral-700">3325</td>
              <td class="px-3 py-2 text-center text-neutral-700">2875</td>
              <td class="px-3 py-2 text-center text-neutral-700">2930</td>
              <td class="px-3 py-2 text-center text-neutral-700">2400</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x10x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x254x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">4575</td>
              <td class="px-3 py-2 text-center text-neutral-700">3750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3250</td>
              <td class="px-3 py-2 text-center text-neutral-700">3315</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x12x16</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x305x406</td>
              <td class="px-3 py-2 text-center text-neutral-700">5625</td>
              <td class="px-3 py-2 text-center text-neutral-700">4625</td>
              <td class="px-3 py-2 text-center text-neutral-700">4025</td>
              <td class="px-3 py-2 text-center text-neutral-700">4090</td>
              <td class="px-3 py-2 text-center text-neutral-700">3350</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">22x6x17¾</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">559x152x451</td>
              <td class="px-3 py-2 text-center text-neutral-700">2345</td>
              <td class="px-3 py-2 text-center text-neutral-700">1925</td>
              <td class="px-3 py-2 text-center text-neutral-700">1675</td>
              <td class="px-3 py-2 text-center text-neutral-700">1700</td>
              <td class="px-3 py-2 text-center text-neutral-700">1395</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x10x22</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">711x254x559</td>
              <td class="px-3 py-2 text-center text-neutral-700">5470</td>
              <td class="px-3 py-2 text-center text-neutral-700">4490</td>
              <td class="px-3 py-2 text-center text-neutral-700">3905</td>
              <td class="px-3 py-2 text-center text-neutral-700">3970</td>
              <td class="px-3 py-2 text-center text-neutral-700">3255</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x12x22</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">711x305x559</td>
              <td class="px-3 py-2 text-center text-neutral-700">6740</td>
              <td class="px-3 py-2 text-center text-neutral-700">5540</td>
              <td class="px-3 py-2 text-center text-neutral-700">4820</td>
              <td class="px-3 py-2 text-center text-neutral-700">4900</td>
              <td class="px-3 py-2 text-center text-neutral-700">4015</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x14x22</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">711x356x559</td>
              <td class="px-3 py-2 text-center text-neutral-700">8020</td>
              <td class="px-3 py-2 text-center text-neutral-700">6590</td>
              <td class="px-3 py-2 text-center text-neutral-700">5720</td>
              <td class="px-3 py-2 text-center text-neutral-700">5820</td>
              <td class="px-3 py-2 text-center text-neutral-700">4780</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x16x22</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">711x406x559</td>
              <td class="px-3 py-2 text-center text-neutral-700">9270</td>
              <td class="px-3 py-2 text-center text-neutral-700">7620</td>
              <td class="px-3 py-2 text-center text-neutral-700">6620</td>
              <td class="px-3 py-2 text-center text-neutral-700">6730</td>
              <td class="px-3 py-2 text-center text-neutral-700">5520</td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x12x30</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">914x305x762</td>
              <td class="px-3 py-2 text-center text-neutral-700">8150</td>
              <td class="px-3 py-2 text-center text-neutral-700">6695</td>
              <td class="px-3 py-2 text-center text-neutral-700">5820</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x16x30</h2></th>
              <td class="px-3 py-2 text-center text-neutral-700">914x406x762</td>
              <td class="px-3 py-2 text-center text-neutral-700">11230</td>
              <td class="px-3 py-2 text-center text-neutral-700">9225</td>
              <td class="px-3 py-2 text-center text-neutral-700">8020</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="h-[68px]" aria-hidden="true"></div>

    <div class="w-full overflow-hidden rounded-xl shadow-md" style="content-visibility:auto;contain-intrinsic-size:700px;">
      <div class="aspect-video">
        <iframe
          class="h-full w-full"
          src="https://www.youtube.com/embed/Xz3Ers83Nj0?controls=1&rel=0"
          title="Llantas sólidas para Montacargas MONARCH POS TRELLEBORG"
          loading="lazy"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
        ></iframe>
      </div>
    </div>

    <div class="h-[68px]" aria-hidden="true"></div>
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-cover bg-center bg-no-repeat transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $heroJpg }}');
    background-image:image-set(
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
    );
    content-visibility:auto;
    contain-intrinsic-size:900px;
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
          <div
            data-hs-forms-root="true"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
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
      background-image: url('{{ $heroJpg }}');
      background-image: image-set(
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>

<script>
  (function () {
    var section = document.getElementById('contacto');
    var formRoot = document.querySelector('[data-hs-forms-root="true"]');
    var loaded = false;
    var scriptLoading = false;

    if (!section || !formRoot) return;

    function createForm() {
      if (!window.hbspt || !window.hbspt.forms || !window.hbspt.forms.create) return;
      if (formRoot.dataset.formInitialized === 'true') return;

      window.hbspt.forms.create({
        portalId: formRoot.dataset.portalId,
        formId: formRoot.dataset.formId,
        target: '[data-hs-forms-root="true"]'
      });

      formRoot.dataset.formInitialized = 'true';
    }

    function loadHubspot() {
      if (loaded || scriptLoading) {
        createForm();
        return;
      }

      scriptLoading = true;

      var s = document.createElement('script');
      s.src = 'https://js.hsforms.net/forms/shell.js';
      s.async = true;
      s.defer = true;
      s.charset = 'utf-8';

      s.onload = function () {
        loaded = true;
        createForm();
      };

      document.head.appendChild(s);
    }

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            loadHubspot();
            observer.disconnect();
          }
        });
      }, { rootMargin: '400px 0px' });

      observer.observe(section);
    } else {
      window.addEventListener('load', loadHubspot, { once: true });
    }

    ['pointerdown', 'touchstart', 'keydown'].forEach(function (eventName) {
      window.addEventListener(eventName, loadHubspot, { once: true, passive: true });
    });

    if ('requestIdleCallback' in window) {
      requestIdleCallback(loadHubspot, { timeout: 3500 });
    } else {
      setTimeout(loadHubspot, 2500);
    }
  })();
</script>
@endsection