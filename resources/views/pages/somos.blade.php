@extends('layouts.public')

@section('title', 'Distribuidor Autorizado llantas Trelleborg para Montacargas')
@section('meta_description', 'Descubre nuestra oferta de llantas premium para Montacargas con Precios Mayorista 2026, Entrega Inmediata, Crédito y asesoría en la selección.')

@section('structured-data')
  <link
    rel="preload"
    as="image"
    href="{{ asset('storage/originals/about1-1.jpg') }}"
    imagesrcset="
      {{ asset('storage/variants/originals/about1-1-490.avif') }} 490w,
      {{ asset('storage/variants/originals/about1-1-490.webp') }} 490w,
      {{ asset('storage/originals/about1-1.jpg') }} 750w
    "
    imagesizes="(max-width: 768px) 92vw, (max-width: 1140px) 43vw, 490px"
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
          "{{ asset('storage/originals/about1-1.jpg') }}",
          "{{ asset('storage/originals/llantas-de-montacarga-1.webp') }}"
        ],
        "description": "Distribuidor autorizado de llantas Trelleborg para montacargas, minicargadores y telehandlers en México. Venta de llantas premium, entrega inmediata, crédito y asesoría técnica especializada.",
        "email": "bsh@bombasellos.com.mx",
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
          "Llantas para montacargas",
          "Llantas para minicargadores",
          "Llantas para telehandlers",
          "Llantas Trelleborg",
          "Llantas premium industriales",
          "Asesoría técnica en llantas industriales",
          "Entrega inmediata de llantas industriales",
          "Crédito para compra de llantas industriales"
        ]
      },
      {
        "@type": "AboutPage",
        "@id": "{{ url()->current() }}#aboutpage",
        "url": "{{ url()->current() }}",
        "name": "@yield('title')",
        "description": "@yield('meta_description')",
        "inLanguage": "es-MX",
        "isPartOf": {
          "@id": "{{ url('/') }}#website"
        },
        "about": {
          "@id": "{{ url('/') }}#organization"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ asset('storage/originals/about1-1.jpg') }}"
        },
        "mainEntity": {
          "@id": "{{ url()->current() }}#service"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Distribución y asesoría de llantas Trelleborg para montacargas",
        "serviceType": "Venta y asesoría técnica de llantas industriales premium",
        "provider": {
          "@id": "{{ url('/') }}#organization"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, operadores de montacargas, flotillas, centros logísticos y talleres"
        },
        "description": "Distribución autorizada de llantas Trelleborg para montacargas, minicargadores y telehandlers, con precios mayorista, garantía de vida y desempeño, entrega inmediata, crédito y asistencia técnica.",
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "hasOfferCatalog": {
          "@type": "OfferCatalog",
          "name": "Llantas industriales Trelleborg",
          "itemListElement": [
            {
              "@type": "OfferCatalog",
              "name": "Llantas para Montacargas"
            },
            {
              "@type": "OfferCatalog",
              "name": "Llantas para Minicargadores"
            },
            {
              "@type": "OfferCatalog",
              "name": "Llantas para Telehandlers"
            }
          ]
        }
      },
      {
        "@type": "ItemList",
        "@id": "{{ url()->current() }}#value-props",
        "name": "Propuesta de valor",
        "itemListOrder": "https://schema.org/ItemListOrderAscending",
        "numberOfItems": 5,
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Producto Premium con más vida útil llanta v/s llanta, garantizado por escrito"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Asistencia directa en sitio con fuerza de ventas en Puebla, Ciudad de México, Estado de México, Monterrey, Guanajuato y Queretaro"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Precios competitivos"
          },
          {
            "@type": "ListItem",
            "position": 4,
            "name": "Amplio stock para entrega inmediata"
          },
          {
            "@type": "ListItem",
            "position": 5,
            "name": "Crédito rápido y sencillo"
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
            "name": "Distribuidor autorizado llantas Trelleborg para Montacargas",
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
  $variants = image_variants('originals/about1-1.jpg');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 43vw, 490px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/about1-1.jpg');

  $toSrcset = function ($arr) {
    return implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
  };
@endphp

<section
  class="relative block box-border py-[70px] md:py-[90px] lg:py-[110px]"
  style="content-visibility:auto; contain-intrinsic-size: 950px;"
>
    <div class="relative mx-auto flex max-w-[1140px] flex-wrap md:flex-nowrap">
        <div class="relative flex min-h-px w-full md:w-1/2">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="pb-[20px] md:pb-[40px]">
                        <p class="mb-[20px]">Llantas para Montacargas, Minicargadores y Telehandlers.</p>
                        <p class="mb-[20px]">“Somos una comercializadora de equipos y refacciones especializadas al servicio de la Industria en México.</p>
                        <p class="mb-[20px]">Distribuimos desde el año 2010 la gama de producto del fabricante top Europeo Trelleborg, incluyendo entre otras líneas de producto, sus llantas Premium para manejo de materiales.&nbsp;</p>
                        <p class="mb-[20px]">A través de nuestra marca&nbsp;surtimos las llantas más resistentes y duraderas; para aplicaciones demandantes, a precios competitivos, con amplias existencias, asistencia y entrega directa en sitio.</p>
                        <p class="mb-[20px]">Conozca más de nuestra gama de producto en: bsh@bombasellos.com.mx”</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:min-h-px md:w-[7%]">
            <div class="relative flex w-full flex-wrap content-start"></div>
        </div>

        <div class="relative flex min-h-px w-full md:w-[42.996%]">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="w-full text-center">
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
                              width="750"
                              height="840"
                              src="{{ $fallback }}"
                              alt="sobre nosotros"
                              class="mx-auto inline-block h-auto max-w-full align-middle border-0"
                            >
                        </picture>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section
  class="propuesta-valor-bg relative block w-full box-border bg-cover bg-center bg-no-repeat py-[140px] md:py-[200px] lg:py-[270px]"
style="background-image: url('{{ asset('storage/originals/llantas-de-montacarga-1.webp') }}');"
  
  style="content-visibility:auto; contain-intrinsic-size: 900px;"
>
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap md:flex-nowrap">
    <div class="relative flex min-h-px w-full md:w-[45%]">
      <div class="relative flex w-full flex-wrap content-center items-center p-[10px]">
        <div class="relative mb-4 md:mb-5 w-full font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
          <div>
            <p class="mb-4 md:mb-5">
              <span class="text-white">
                <strong class="font-semibold">Conoce nuestra</strong>
              </span>
            </p>
          </div>
        </div>

        <div class="relative w-full font-['Roboto',sans-serif] text-[34px] leading-[1.1] md:text-[42px] lg:text-[51px] font-normal text-[#7a7a7a]">
          <div>
            <p class="mb-5">
              <span class="text-white">
                <strong class="font-semibold">Propuesta de valor</strong>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="relative flex min-h-px w-full md:w-[55%]">
      <div class="relative flex w-full flex-wrap content-center items-center p-[10px]">
        <div class="relative w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal leading-[30px] md:leading-[33.6px] text-white">
          <div>
            <ul class="mt-0 mb-[10px] pl-5">
              <li>Producto Premium con más vida útil llanta v/s llanta, GARANTIZADO por escrito.</li>
              <li>Asistencia directa en sitio con fuerza de ventas en <b class="font-bold">Puebla, Ciudad de México, Estado de México, Monterrey, Guanajuato y Queretaro.</b></li>
              <li>Precios competitivos.</li>
              <li>Amplio Stock para entrega inmediata.</li>
              <li>Extendemos Crédito de forma rápida y sencilla.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  @media (max-width: 768px) {
    .propuesta-valor-bg {
      background-image: url('{{ asset('storage/originals/llantas-de-montacarga-1.webp') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/llantas-de-montacarga-1-960.avif') }}') type('image/avif') 1x,
        url('{{ asset('storage/variants/originals/llantas-de-montacarga-1-960.webp') }}') type('image/webp') 1x,
        url('{{ asset('storage/originals/llantas-de-montacarga-1.webp') }}') type('image/webp') 1x
      );
    }
  }
</style>

<section
  class="relative block box-border py-[70px] md:py-[110px]"
  style="content-visibility:auto; contain-intrinsic-size: 1100px;"
id="trelleborg">
    <div class="relative mx-auto flex max-w-[1140px]">
        <div class="relative flex min-h-px w-full">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="mb-5 w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="mb-5">
                        <p class="mb-5">Fundada en 1905, con presencia en 50 países y mas de 23 mil empleados, Trelleborg es un fabricante top Europeo de sellos hidráulicos, compuestos plásticos, mangueras, componentes automotrices y llantas industriales.</p>
                        <p class="mb-5">Su amplia experiencia desarrollando polímeros de alto desempeño para todo tipo de aplicaciones, le ha permitido posicionarse como el principal proveedor de las marcas de equipo original <strong class="font-semibold">Bobcat®, Case®, CAT®, Gehl®, New Holland®</strong>, entre otras.</p>
                        <p class="mb-5">Trelleborg es actualmente la marca mas innovadora del segmento, con patentes y desarrollos exclusivos en llantas para el manejo de materiales.</p>
                        <p class="mb-5">Sus llantas se caracterizan por ofrecer mas capas de material, de mejores compuestos, con bandas de rodamiento mas amplias y costados mejor reforzados que otros fabricantes Premium.</p>
                        <p class="mb-5"><strong class="font-semibold">Garantizamos 25% mas kilómetros y ciclos llanta contra llanta por escrito, sin importar las condiciones de trabajo de su maquina.</strong></p>
                    </div>
                </div>

                <div class="mb-5 w-full">
                    <div>
                        <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[34px] leading-[1.1] md:text-[44px] lg:text-[51px] lg:leading-[51px] font-semibold text-black">
                            ¿Por qué elegirnos?
                        </h2>
                    </div>
                </div>

                <div class="mb-5 w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="my-[30px]">
                        <p class="mb-5">Llevamos un producto Superior enfocado en mejores materiales, mas rendimiento, mejor diseño y calidad a la Industria con las mejores condiciones comerciales.</p>
                    </div>
                </div>

                <section class="w-full">
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] text-[#ee5a35]">
                                            <i aria-hidden="true" class="fa-solid fa-hand-holding-dollar text-[30px] leading-[30px]"></i>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Precios Mayorista.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] text-[#ee5a35]">
                                            <i aria-hidden="true" class="fa-solid fa-medal text-[30px] leading-[30px]"></i>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Garantía de vida y Desempeño.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] text-[#ee5a35]">
                                            <i aria-hidden="true" class="fa-solid fa-truck-fast text-[30px] leading-[30px]"></i>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Entrega inmediata.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] text-[#ee5a35]">
                                            <i aria-hidden="true" class="fa-solid fa-headset text-[30px] leading-[30px]"></i>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Asistencia Técnica</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
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