@extends('layouts.public')

@section('title', 'Llantas sólidas rudomáticas para Montacargas | Trelleborg M2')
@section('meta_description', 'Cotiza en linea llantas M2 sólidas de Trelleborg para montacargas, únicas con Garantia de vida extendida. Entrega inmediata, Crédito y precio Mayoristas.')

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
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} 1920w
    "
    imagesizes="100vw"
    fetchpriority="high"
  >

  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/originals/Llanta-para-montacargas-de-uso-rudo.jpg') }}"
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
          "Llantas rudomáticas para montacargas",
          "Llantas industriales Trelleborg M2",
          "Llantas para uso rudo",
          "Llantas imponchables para montacargas",
          "Manejo de materiales",
          "Aplicaciones metal-mecánicas, siderúrgicas y chatarreras"
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
          "url": "{{ asset('storage/originals/Llanta-para-montacargas-de-uso-rudo.jpg') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg M2",
        "alternateName": [
          "Llanta sólida rudomática para montacargas Trelleborg M2",
          "Llanta sólida para montacargas Trelleborg M2",
          "Trelleborg M2 rudomática"
        ],
        "sku": "M2",
        "mpn": "M2",
        "category": "Industrial Tire",
        "image": [
          "{{ asset('storage/originals/Llanta-para-montacargas-de-uso-rudo.jpg') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta SUPER PREMIUM para montacargas de uso rudo y aplicaciones muy demandantes en la industria metal-mecánica, siderúrgica y chatarreras con presencia de elementos cortantes. Diseñada para reducir vibraciones, absorber impactos, resistir cortes, mejorar la conducción y ahorrar combustible gracias a su baja resistencia al rodado.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida rudomática para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "M2"
          },
          {
            "@type": "PropertyValue",
            "name": "Construcción",
            "value": "Sólida"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas de uso rudo"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Industria metal-mecánica, siderúrgica y chatarreras con presencia de elementos cortantes"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Diseño de huella que reduce vibraciones y brinda una conducción cómoda"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Compuesto especial que absorbe impactos y resiste cortes"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Mejora conducción y posicionamiento para carga"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Baja resistencia al rodado para ahorrar combustible"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Indicador de desgaste Pit Stop Line"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en 7 compuestos para usos específicos"
          }
        ],
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos, industria metal-mecánica, siderúrgica y chatarreras"
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
          "name": "Ficha técnica Trelleborg M2",
          "url": "{{ asset('pdfs/Trelleborg_MH_Solid_M2_PSL_US_LR.pdf') }}"
        },
        "isRelatedTo": {
          "@id": "{{ url()->current() }}#size-list"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Trelleborg M2 para montacargas",
        "serviceType": "Venta y asesoría de llantas sólidas industriales para montacargas de uso rudo",
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
        "name": "Medidas disponibles Trelleborg M2",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 45,
        "itemListElement": [
          { "@type": "ListItem", "position": 1, "name": "10½x4-6" },
          { "@type": "ListItem", "position": 2, "name": "4.00-8" },
          { "@type": "ListItem", "position": 3, "name": "15x4½-8 / 125/75-8" },
          { "@type": "ListItem", "position": 4, "name": "5.00-8" },
          { "@type": "ListItem", "position": 5, "name": "16x6-8 / 150/75-8" },
          { "@type": "ListItem", "position": 6, "name": "17x7-8" },
          { "@type": "ListItem", "position": 7, "name": "18x7-8 / 180/70-8" },
          { "@type": "ListItem", "position": 8, "name": "18x9-8" },
          { "@type": "ListItem", "position": 9, "name": "140/55-9 / 15x5.5-9" },
          { "@type": "ListItem", "position": 10, "name": "6.00-9" },
          { "@type": "ListItem", "position": 11, "name": "21x8-9 / 200/75-9" },
          { "@type": "ListItem", "position": 12, "name": "6.50-10" },
          { "@type": "ListItem", "position": 13, "name": "180/60-10" },
          { "@type": "ListItem", "position": 14, "name": "200/50-10" },
          { "@type": "ListItem", "position": 15, "name": "23x9-10 / 225/75-10" },
          { "@type": "ListItem", "position": 16, "name": "7.00-12" },
          { "@type": "ListItem", "position": 17, "name": "23x10-12 / 250/60-12" },
          { "@type": "ListItem", "position": 18, "name": "27x10-12 / 250/75-12" },
          { "@type": "ListItem", "position": 19, "name": "315/45-12" },
          { "@type": "ListItem", "position": 20, "name": "7.00-15 / 29x8-15" },
          { "@type": "ListItem", "position": 21, "name": "7.50-15" },
          { "@type": "ListItem", "position": 22, "name": "8.25-15" },
          { "@type": "ListItem", "position": 23, "name": "28x9-15 / 225/75-15" },
          { "@type": "ListItem", "position": 24, "name": "28x9-15 / 225/75-15 (8.15-15)" },
          { "@type": "ListItem", "position": 25, "name": "250-15 / 250/70-15" },
          { "@type": "ListItem", "position": 26, "name": "280/50-15" },
          { "@type": "ListItem", "position": 27, "name": "300-15 / 315/70-15" },
          { "@type": "ListItem", "position": 28, "name": "355/45-15 / 28x12½-15" },
          { "@type": "ListItem", "position": 29, "name": "355/50-15" },
          { "@type": "ListItem", "position": 30, "name": "355/65-15 / 32x12½-15 (350-15)" },
          { "@type": "ListItem", "position": 31, "name": "400/60-15" },
          { "@type": "ListItem", "position": 32, "name": "7.50-16 / 250/80-16" },
          { "@type": "ListItem", "position": 33, "name": "8.25-20" },
          { "@type": "ListItem", "position": 34, "name": "9.00-20 / 270/95-20" },
          { "@type": "ListItem", "position": 35, "name": "10.00-20 / 290/95-20" },
          { "@type": "ListItem", "position": 36, "name": "12.00-20 / 330/95-20" },
          { "@type": "ListItem", "position": 37, "name": "355/50-20" }
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
            "name": "Trelleborg M2",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    ]
  }
  </script>
@endsection


@section('content')
<section class="relative" role="region" aria-label="Resumen PS800" style="content-visibility:auto;contain-intrinsic-size: 400px;">
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


<section class="relative" role="region" aria-label="Detalle PS800" style="content-visibility:auto;contain-intrinsic-size: 1000px;">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    <div class="w-full md:w-[32.708%] p-[10px]">
      @php
        $variants = image_variants('originals/Llanta-para-montacargas-de-uso-rudo.jpg');
        $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
        $srcsetAvif = $variants['avif'] ?? null;
        $srcsetWebp = $variants['webp'] ?? null;
        $srcsetJpg  = $variants['jpg'] ?? null;
        $fallback   = $variants['fallback']['url'] ?? '';
        $toSrcset = fn ($arr) => implode(', ', array_map(fn ($v) => $v['url'].' '.$v['w'].'w', $arr));
      @endphp

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
            alt="Trelleborg M2"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
      Trelleborg M2
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
   Llanta SUPER PREMIUM para montacargas de uso rudo y aplicaciones muy demandantes en la industria metal-mecánica, siderúrgica y chatarreras con presencia de elementos cortantes.
       </p>

        <p class="mb-5 mt-6 font-bold">
        25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Diseño de huella reduce vibraciones y brinda una conducción cómoda.</li>
          <li>Compuesto especial absorbe impactos y resiste cortes como ningún otro.</li>
          <li>Mejora conducción y posicionamiento para carga.</li>
          <li>Ahorra combustible visiblemente gracias a su baja resistencia al rodado.</li>
          <li>Con indicador de desgaste Pit Stop Line.</li>
          <li>Disponible en 7 compuestos para usos específicos.</li>
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
            href="{{ asset('pdfs/Trelleborg_MH_Solid_M2_PSL_US_LR.pdf') }}"
            download
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



<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades" style="content-visibility:auto;contain-intrinsic-size: 2400px;">
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
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10½x4-6</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.25I-6</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed only</td>
              <td class="px-3 py-2 text-center text-neutral-700">268</td>
              <td class="px-3 py-2 text-center text-neutral-700">104</td>
              <td class="px-3 py-2 text-center text-neutral-700">710</td>
              <td class="px-3 py-2 text-center text-neutral-700">610</td>
              <td class="px-3 py-2 text-center text-neutral-700">470</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">2.50-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed only</td>
              <td class="px-3 py-2 text-center text-neutral-700">409</td>
              <td class="px-3 py-2 text-center text-neutral-700">104</td>
              <td class="px-3 py-2 text-center text-neutral-700">1100</td>
              <td class="px-3 py-2 text-center text-neutral-700">950</td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed only</td>
              <td class="px-3 py-2 text-center text-neutral-700">409</td>
              <td class="px-3 py-2 text-center text-neutral-700">104</td>
              <td class="px-3 py-2 text-center text-neutral-700">1100</td>
              <td class="px-3 py-2 text-center text-neutral-700">950</td>
              <td class="px-3 py-2 text-center text-neutral-700">730</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.56-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed only</td>
              <td class="px-3 py-2 text-center text-neutral-700">408</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">1175</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">775</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75P-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">408</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">1175</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">775</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">4.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75P-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">408</td>
              <td class="px-3 py-2 text-center text-neutral-700">125</td>
              <td class="px-3 py-2 text-center text-neutral-700">1175</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">775</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">125/75-8</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">376</td>
              <td class="px-3 py-2 text-center text-neutral-700">117</td>
              <td class="px-3 py-2 text-center text-neutral-700">1210</td>
              <td class="px-3 py-2 text-center text-neutral-700">1040</td>
              <td class="px-3 py-2 text-center text-neutral-700">800</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x4½-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">125/75-8</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">376</td>
              <td class="px-3 py-2 text-center text-neutral-700">117</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">3.00D-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">122</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
              <td class="px-3 py-2 text-center text-neutral-700">1415</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75P-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">5.00-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">3.75P-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">16x6-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">150/75-8</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">406</td>
              <td class="px-3 py-2 text-center text-neutral-700">152</td>
              <td class="px-3 py-2 text-center text-neutral-700">1740</td>
              <td class="px-3 py-2 text-center text-neutral-700">1495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1150</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">17x7-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth only</td>
              <td class="px-3 py-2 text-center text-neutral-700">430</td>
              <td class="px-3 py-2 text-center text-neutral-700">159</td>
              <td class="px-3 py-2 text-center text-neutral-700">2160</td>
              <td class="px-3 py-2 text-center text-neutral-700">1860</td>
              <td class="px-3 py-2 text-center text-neutral-700">1430</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x7-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">180/70-8</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">4.33R-8</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">157</td>
              <td class="px-3 py-2 text-center text-neutral-700">2490</td>
              <td class="px-3 py-2 text-center text-neutral-700">2145</td>
              <td class="px-3 py-2 text-center text-neutral-700">1650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">18x9-8</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">7.00-8</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth Only</td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">207</td>
              <td class="px-3 py-2 text-center text-neutral-700">2870</td>
              <td class="px-3 py-2 text-center text-neutral-700">2470</td>
              <td class="px-3 py-2 text-center text-neutral-700">1900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">140/55-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x5.5-9</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">132</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">140/55-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">15x5.5-9</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">380</td>
              <td class="px-3 py-2 text-center text-neutral-700">132</td>
              <td class="px-3 py-2 text-center text-neutral-700">1360</td>
              <td class="px-3 py-2 text-center text-neutral-700">1170</td>
              <td class="px-3 py-2 text-center text-neutral-700">900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">526</td>
              <td class="px-3 py-2 text-center text-neutral-700">140</td>
              <td class="px-3 py-2 text-center text-neutral-700">2190</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.00-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000004</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed</td>
              <td class="px-3 py-2 text-center text-neutral-700">526</td>
              <td class="px-3 py-2 text-center text-neutral-700">140</td>
              <td class="px-3 py-2 text-center text-neutral-700">2190</td>
              <td class="px-3 py-2 text-center text-neutral-700">1885</td>
              <td class="px-3 py-2 text-center text-neutral-700">1450</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">21x8-9</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">200/75-9</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">0.000000006</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">518</td>
              <td class="px-3 py-2 text-center text-neutral-700">185</td>
              <td class="px-3 py-2 text-center text-neutral-700">3200</td>
              <td class="px-3 py-2 text-center text-neutral-700">2755</td>
              <td class="px-3 py-2 text-center text-neutral-700">2120</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.00F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">577</td>
              <td class="px-3 py-2 text-center text-neutral-700">160</td>
              <td class="px-3 py-2 text-center text-neutral-700">2720</td>
              <td class="px-3 py-2 text-center text-neutral-700">2340</td>
              <td class="px-3 py-2 text-center text-neutral-700">1800</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">6.50-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">577</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">191</td>
              <td class="px-3 py-2 text-center text-neutral-700">2870</td>
              <td class="px-3 py-2 text-center text-neutral-700">2470</td>
              <td class="px-3 py-2 text-center text-neutral-700">1900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x9-10</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">225/75-10</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50F-10</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">584</td>
              <td class="px-3 py-2 text-center text-neutral-700">201</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">173</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">173</td>
              <td class="px-3 py-2 text-center text-neutral-700">3380</td>
              <td class="px-3 py-2 text-center text-neutral-700">2920</td>
              <td class="px-3 py-2 text-center text-neutral-700">2240</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">23x10-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/60-12</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">587</td>
              <td class="px-3 py-2 text-center text-neutral-700">239</td>
              <td class="px-3 py-2 text-center text-neutral-700">4380</td>
              <td class="px-3 py-2 text-center text-neutral-700">3770</td>
              <td class="px-3 py-2 text-center text-neutral-700">2900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">27x10-12</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/75-12</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.00G-12</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">678</td>
              <td class="px-3 py-2 text-center text-neutral-700">239</td>
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
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.00-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">29x8-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">729</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">747</td>
              <td class="px-3 py-2 text-center text-neutral-700">193</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">747</td>
              <td class="px-3 py-2 text-center text-neutral-700">193</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">810</td>
              <td class="px-3 py-2 text-center text-neutral-700">208</td>
              <td class="px-3 py-2 text-center text-neutral-700">5360</td>
              <td class="px-3 py-2 text-center text-neutral-700">4615</td>
              <td class="px-3 py-2 text-center text-neutral-700">3550</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">810</td>
              <td class="px-3 py-2 text-center text-neutral-700">208</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4750</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">225/75-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">693</td>
              <td class="px-3 py-2 text-center text-neutral-700">224</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x9-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">225/75-15 (8.15-15)</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">693</td>
              <td class="px-3 py-2 text-center text-neutral-700">224</td>
              <td class="px-3 py-2 text-center text-neutral-700">4530</td>
              <td class="px-3 py-2 text-center text-neutral-700">3900</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/70-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">7.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">711</td>
              <td class="px-3 py-2 text-center text-neutral-700">224</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/70-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">711</td>
              <td class="px-3 py-2 text-center text-neutral-700">224</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4745</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">280/50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">Ribbed only</td>
              <td class="px-3 py-2 text-center text-neutral-700">670 255 6,040 5,200 4,000</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">300-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">315/70-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">813</td>
              <td class="px-3 py-2 text-center text-neutral-700">257</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5850</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/45-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">28x12½-15</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">683</td>
              <td class="px-3 py-2 text-center text-neutral-700">288</td>
              <td class="px-3 py-2 text-center text-neutral-700">6610</td>
              <td class="px-3 py-2 text-center text-neutral-700">5690</td>
              <td class="px-3 py-2 text-center text-neutral-700">4375</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/50-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">711</td>
              <td class="px-3 py-2 text-center text-neutral-700">284</td>
              <td class="px-3 py-2 text-center text-neutral-700">6610</td>
              <td class="px-3 py-2 text-center text-neutral-700">5690</td>
              <td class="px-3 py-2 text-center text-neutral-700">4375</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/65-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">32x12½-15 (350-15)</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">9.75-15</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">808</td>
              <td class="px-3 py-2 text-center text-neutral-700">282</td>
              <td class="px-3 py-2 text-center text-neutral-700">9060</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">400/60-15</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">11.00-15</td>
              <td class="px-3 py-2 text-center text-neutral-700">M2 VP15</td>
              <td class="px-3 py-2 text-center text-neutral-700">815</td>
              <td class="px-3 py-2 text-center text-neutral-700">325</td>
              <td class="px-3 py-2 text-center text-neutral-700">10420</td>
              <td class="px-3 py-2 text-center text-neutral-700">8970</td>
              <td class="px-3 py-2 text-center text-neutral-700">6900</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">7.50-16</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">250/80-16</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">5.5-16</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">808</td>
              <td class="px-3 py-2 text-center text-neutral-700">208</td>
              <td class="px-3 py-2 text-center text-neutral-700">4645</td>
              <td class="px-3 py-2 text-center text-neutral-700">4000</td>
              <td class="px-3 py-2 text-center text-neutral-700">3075</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">8.25-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.50-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Military</td>
              <td class="px-3 py-2 text-center text-neutral-700">954</td>
              <td class="px-3 py-2 text-center text-neutral-700">230</td>
              <td class="px-3 py-2 text-center text-neutral-700">5510</td>
              <td class="px-3 py-2 text-center text-neutral-700">4380</td>
              <td class="px-3 py-2 text-center text-neutral-700">3650</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">9.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">270/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">6.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">973</td>
              <td class="px-3 py-2 text-center text-neutral-700">221</td>
              <td class="px-3 py-2 text-center text-neutral-700">6795</td>
              <td class="px-3 py-2 text-center text-neutral-700">5400</td>
              <td class="px-3 py-2 text-center text-neutral-700">4500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">10.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">290/95-20</h2></td>
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
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">290/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1011</td>
              <td class="px-3 py-2 text-center text-neutral-700">249</td>
              <td class="px-3 py-2 text-center text-neutral-700">7550</td>
              <td class="px-3 py-2 text-center text-neutral-700">6000</td>
              <td class="px-3 py-2 text-center text-neutral-700">5000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1092</td>
              <td class="px-3 py-2 text-center text-neutral-700">259</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">1092</td>
              <td class="px-3 py-2 text-center text-neutral-700">259</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1092</td>
              <td class="px-3 py-2 text-center text-neutral-700">259</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">8.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">1092</td>
              <td class="px-3 py-2 text-center text-neutral-700">259</td>
              <td class="px-3 py-2 text-center text-neutral-700">9515</td>
              <td class="px-3 py-2 text-center text-neutral-700">7560</td>
              <td class="px-3 py-2 text-center text-neutral-700">6300</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">312</td>
              <td class="px-3 py-2 text-center text-neutral-700">9815</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">12.00-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">330/95-20</h2></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">Smooth</td>
              <td class="px-3 py-2 text-center text-neutral-700">1090</td>
              <td class="px-3 py-2 text-center text-neutral-700">312</td>
              <td class="px-3 py-2 text-center text-neutral-700">9815</td>
              <td class="px-3 py-2 text-center text-neutral-700">7800</td>
              <td class="px-3 py-2 text-center text-neutral-700">6500</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"><h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">355/50-20</h2></th>
              <td class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700"></td>
              <td class="px-3 py-2 text-center text-neutral-700">833</td>
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
              <td class="px-3 py-2 text-center text-neutral-700">833</td>
              <td class="px-3 py-2 text-center text-neutral-700">310</td>
              <td class="px-3 py-2 text-center text-neutral-700">10420</td>
              <td class="px-3 py-2 text-center text-neutral-700">8970</td>
              <td class="px-3 py-2 text-center text-neutral-700">6900</td>
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
    content-visibility:auto;
    contain-intrinsic-size:900px;
  "
  role="region" aria-label="Formulario de cotización"
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
          <div data-hs-forms-root="true" id="hs-form-m2-root">
            <script>
              (function () {
                var formInitialized = false;

                function createHubspotForm() {
                  if (formInitialized) return;
                  if (!(window.hbspt && window.hbspt.forms && window.hbspt.forms.create)) return;

                  formInitialized = true;
                  window.hbspt.forms.create({
                    portalId: "7547674",
                    formId: "26f426a7-e620-42df-98a3-43e10a899b6c",
                    target: "#hs-form-m2-root"
                  });
                }

                function loadHubspotScript() {
                  if (document.querySelector('script[data-hs-forms-shell="true"]')) {
                    createHubspotForm();
                    return;
                  }

                  var s = document.createElement('script');
                  s.src = 'https://js.hsforms.net/forms/shell.js';
                  s.async = true;
                  s.defer = true;
                  s.charset = 'utf-8';
                  s.type = 'text/javascript';
                  s.setAttribute('data-hs-forms-shell', 'true');
                  s.onload = createHubspotForm;
                  document.head.appendChild(s);
                }

                function initWhenVisible() {
                  var el = document.getElementById('contacto');
                  if (!el || !('IntersectionObserver' in window)) {
                    loadHubspotScript();
                    return;
                  }

                  var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                      if (entry.isIntersecting) {
                        observer.disconnect();
                        loadHubspotScript();
                      }
                    });
                  }, { rootMargin: '300px 0px' });

                  observer.observe(el);
                }

                if ('requestIdleCallback' in window) {
                  requestIdleCallback(initWhenVisible, { timeout: 2000 });
                } else {
                  window.addEventListener('load', initWhenVisible, { once: true });
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