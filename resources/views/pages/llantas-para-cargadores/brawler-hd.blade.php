@extends('layouts.public')

@section('title', 'Llantas Neumáticas para Telehandlers, Cargadores BRAWLER HPS')
@section('meta_description', 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más.Llantas numáticas de calidad garantizada para Manipuladores')

{{-- Todo esto debe renderizar en <head> --}}
@section('structured-data')
  {{-- DNS hints y preconnect para HubSpot --}}
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload del hero --}}
  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} type('image/avif'),
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} type('image/webp'),
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} type('image/jpeg')
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
          "url": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        },
        "image": [
          "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
        ],
        "description": "Somos una comercializadora de equipos y refacciones especializadas al servicio de la industria en México. Distribuimos desde 2010 la gama de producto Trelleborg, incluyendo llantas premium para manejo de materiales, montacargas, minicargadores y telehandlers, con stock, asistencia técnica, entrega directa en sitio y precios competitivos.",
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
          {
            "@type": "Country",
            "name": "México"
          },
          {
            "@type": "City",
            "name": "Puebla"
          },
          {
            "@type": "City",
            "name": "Ciudad de México"
          },
          {
            "@type": "State",
            "name": "Estado de México"
          },
          {
            "@type": "City",
            "name": "Monterrey"
          },
          {
            "@type": "State",
            "name": "Guanajuato"
          },
          {
            "@type": "State",
            "name": "Querétaro"
          }
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
          "Llantas para montacargas",
          "Llantas para telehandlers",
          "Llantas para cargadores",
          "Llantas industriales Trelleborg",
          "Llantas para minicargadores",
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
          "url": "{{ asset('storage/originals/Llanta-solida-PREMIUM-de-alto-rendimiento-para-cargador-telescopico.jpg') }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg BRAWLER® HPS – Llantas neumáticas para telehandlers y cargadores",
        "alternateName": "BRAWLER® HPS",
        "sku": "BRAWLER-HPS",
        "mpn": "BRAWLER-HPS",
        "category": "IndustrialTire",
        "image": [
          "{{ asset('storage/originals/Llanta-solida-PREMIUM-de-alto-rendimiento-para-cargador-telescopico.jpg') }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta premium de alto rendimiento para telehandlers y cargadores, apta para aplicaciones severas y condiciones extremas. Ofrece perfil ancho y plano para mayor estabilidad, huella de tracción super profunda, orificios elípticos Solidflex para mayor comodidad y hasta 25% más vida útil llanta contra llanta, garantizado por escrito.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta premium para telehandlers y cargadores"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Telehandlers, cargadores y niveladores"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida útil llanta vs llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Perfil ancho y plano con alta estabilidad y contrabalance"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Orificios elípticos Solidflex para mayor comodidad en el manejo"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Huella de tracción super profunda"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "4 veces más caucho que una llanta neumática"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en perfiles R4 para mayor tracción en arena, lodo y piedras"
          }
        ],
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, construcción, manejo de materiales y operadores de telehandlers y cargadores"
        },
        "isRelatedTo": {
          "@type": "Brand",
          "name": "Trelleborg"
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
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#sizes",
        "name": "Medidas disponibles BRAWLER® HPS",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 5,
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "30x10-16"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "31x10-20"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "33x12-20"
          },
          {
            "@type": "ListItem",
            "position": 4,
            "name": "36x14-20"
          },
          {
            "@type": "ListItem",
            "position": 5,
            "name": "40x14-20"
          }
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
            "name": "Llantas para telehandlers y cargadores",
            "item": "{{ url('/llantas-para-manipulador-telescopico') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "BRAWLER® HPS",
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
          Llantas Solidas para Cargadores
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a] leading-[30px]">
            De uso rudo, no se ponchan y rinden el triple.
          </p>
        </div>

        <div class="w-full h-[26px]" aria-hidden="true"></div>
      </div>
    </div>
  </div>
</section>


<section class="relative" role="region" aria-label="Detalle PS800">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    {{-- Columna imagen (≈32.708%) --}}
    <div class="w-full md:w-[32.708%] p-[10px]">
      @php
        // Original en: storage/app/public/originals/Llantas-para-minicargadores-en-las-aplicaciones-mas-rigurosas.jpg
        $variants = image_variants('originals/Llantas-para-minicargadores-en-las-aplicaciones-mas-rigurosas.jpg');
        $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
        $srcsetAvif = $variants['avif'] ?? null;
        $srcsetWebp = $variants['webp'] ?? null;
        $srcsetJpg  = $variants['jpg']  ?? null;
        $fallback   = $variants['fallback']['url'] ?? '';
        $toSrcset = function($arr){ return implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr)); };
      @endphp
 
@php
  use Illuminate\Support\Facades\Storage;

  $original = 'originals/Llanta-solida-PREMIUM-de-alto-rendimiento-para-cargador-telescopico.jpg';
  $base = pathinfo($original, PATHINFO_FILENAME); // sin .jpg


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
            width="594" height="722"
            src="{{ $fallback }}"
            alt="Trelleborg BRAWLER® HPS"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    {{-- Columna contenido (≈67.292%) --}}
    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[25px] leading-[25px] lg:text-[35px] lg:leading-[35px]  font-semibold text-black">
        TRELLEBORG BRAWLER® HPS
      </h2>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div>
        <a
          href="#contacto"
          class="mt-6 inline-block rounded-[3px] bg-[#e76a3e] px-6 py-3 lg:text-[20px] lg:leading-[30px] text-[15px] leading-[20px]  font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#ff6d00]/60 focus:ring-offset-2"
        >
          <span class="flex justify-center">
            <span class="block">25% mas vida llanta contra llanta, GARANTIZADO por escrito.</span>
          </span>
        </a>
      </div>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div class="text-[#7a7a7a] leading-[30px]">
        <p class="mb-5 mt-6">
          Llanta sólida PREMIUM de alto rendimiento para cargador telescópico en cualquier aplicación, incluso en condiciones extremas.
          </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Perfil ancho y plano con la mejor estabilidad y contrabalance que existe.</li>
          <li>Orificios elípticos en la cara -Solidflex- maximizan la comodidad en el manejo.</li>
          <li>Huella de tracción super profunda.</li>
          <li>4 veces mas caucho que una llanta neumática.</li>
          <li>Disponible en perfiles R4 para mayor tracción en arena, lodo y piedras.</li>
          <li>Llanta apta para su uso en Niveladores, y Cargadores.</li>
        </ul>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <a
            href="#contacto"
            class="inline-block rounded-[4px] bg-black px-[30px] py-[15px] text-[16px] leading-[16px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Solicitar presupuesto ahora</span>
            </span>
          </a>
        </div>

        <div>
          <a
            href="{{ asset('pdfs/TWS-CON-Sell-Sheet-BrawlerHPSskidsteer-A4-EN-LR102019.pdf') }}"
            target="_blank" rel="noopener"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] leading-[16px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center"><span class="block">Descargar Ficha</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto will-change-transform">
  <table class="min-w-[1000px] w-full border-collapse text-sm">
    <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
      <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
        <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
        <th class="font-semibold uppercase tracking-wide text-[12px]">Pneumatic Equivalent Size</th>
        <th class="font-semibold uppercase tracking-wide text-[12px]">Rim Size</th>
        <th class="font-semibold uppercase tracking-wide text-[12px]">Overall Diameter [mm]</th>
        <th class="font-semibold uppercase tracking-wide text-[12px]">Section Width [mm]</th>
        <th class="font-semibold uppercase tracking-wide text-[12px]">Tread Depth [mm]</th>
        <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity 10 km/h [kg]</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-neutral-200/70">
      <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
        <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
          <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">30x10-16</h2>
        </th>
        <td class="px-3 py-2 text-center text-neutral-700">10-16.5</td>
        <td class="px-3 py-2 text-center text-neutral-700">6.00-16</td>
        <td class="px-3 py-2 text-center text-neutral-700">759</td>
        <td class="px-3 py-2 text-center text-neutral-700">236</td>
        <td class="px-3 py-2 text-center text-neutral-700">44</td>
        <td class="px-3 py-2 text-center text-neutral-700">3000</td>
      </tr>

      <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
        <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
          <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">31x10-20</h2>
        </th>
        <td class="px-3 py-2 text-center text-neutral-700">10-16.5</td>
        <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
        <td class="px-3 py-2 text-center text-neutral-700">785</td>
        <td class="px-3 py-2 text-center text-neutral-700">254</td>
        <td class="px-3 py-2 text-center text-neutral-700">41</td>
        <td class="px-3 py-2 text-center text-neutral-700">2815</td>
      </tr>

      <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
        <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
          <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">33x12-20</h2>
        </th>
        <td class="px-3 py-2 text-center text-neutral-700">12-16.5</td>
        <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
        <td class="px-3 py-2 text-center text-neutral-700">840</td>
        <td class="px-3 py-2 text-center text-neutral-700">284</td>
        <td class="px-3 py-2 text-center text-neutral-700">56</td>
        <td class="px-3 py-2 text-center text-neutral-700">2970</td>
      </tr>

      <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
        <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
          <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">36x14-20</h2>
        </th>
        <td class="px-3 py-2 text-center text-neutral-700">14-17.5</td>
        <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
        <td class="px-3 py-2 text-center text-neutral-700">915</td>
        <td class="px-3 py-2 text-center text-neutral-700">356</td>
        <td class="px-3 py-2 text-center text-neutral-700">71</td>
        <td class="px-3 py-2 text-center text-neutral-700">3310</td>
      </tr>

      <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
        <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
          <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">40x14-20</h2>
        </th>
        <td class="px-3 py-2 text-center text-neutral-700">15-19.5</td>
        <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
        <td class="px-3 py-2 text-center text-neutral-700">1015</td>
        <td class="px-3 py-2 text-center text-neutral-700">356</td>
        <td class="px-3 py-2 text-center text-neutral-700">94</td>
        <td class="px-3 py-2 text-center text-neutral-700">4955</td>
      </tr>
    </tbody>
  </table>
      </div>
    </div>
    <div class="h-10" aria-hidden="true"></div>
  </div>
</section>


{{-- Hero cotización PS: usa variantes con image-set --}}
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
          <div data-hs-forms-root="true">
            {{-- Shell async + defer y creación del form cuando la librería esté cargada --}}
            <script async defer charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
            <script>
              window.addEventListener('load', function () {
                if (window.hbspt && hbspt.forms && hbspt.forms.create) {
                  hbspt.forms.create({
                    portalId: "7547674",
                    formId: "26f426a7-e620-42df-98a3-43e10a899b6c"
                  });
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

{{-- Ajuste responsive: en <=768px usa variante más chica (corrige selector a #contacto) --}}
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