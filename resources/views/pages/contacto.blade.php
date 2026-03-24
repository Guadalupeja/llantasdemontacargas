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

<section class="propuesta-valor-bg font-bold relative block w-full box-border bg-cover bg-center bg-no-repeat py-[20px] md:py-[50px] lg:py-[85px]"
style="background-image: url('{{ asset('storage/originals/llantas-de-montacarga-1.webp') }}');">
    <div class="lg:mx-[80px]">
        <div class="mb-[30px] mx-[80px] flex border-b border-[#e1e1e1] pb-[10px]">
            <ul class="m-0 mb-5 list-none p-0">
                <li class="relative flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="mailto:ventas@llantasdemontacargas.com" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-envelope block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">ventas@llantasdemontacargas.com</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <span class="relative top-0 flex pr-[5px] text-left">
                        <i aria-hidden="true" class="fa-solid fa-location-dot block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                    </span>
                    <span class="block self-center pl-[5px] font-['Roboto',sans-serif] text-white">Avenida 125 Oriente #224, Guadalupe Hidalgo. Puebla. C.P. 72494.</span>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(83)3246-2205" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(83)3246-2205</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(83)3239-5885" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(83)3239-5885</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(22)2227-3866" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(22)2227-3866</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(59)5112-4238" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(59)5112-4238</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start text-left text-[16px]">
                    <a href="tel:(55)5752-1715" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(55)5752-1715</span>
                    </a>
                </li>
            </ul>
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

        <div class="w-full"><div class="h-[54px]"></div></div>

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


