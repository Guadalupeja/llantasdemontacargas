@php
  $siteUrl = url('/');
  $currentUrl = url()->current();

  $heroBgJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroBgAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroBgWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroBgAvif960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroBgWebp960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

  $productOriginal = 'originals/Trelleborg_Polyurethane_Permathane-Blue_660x660.webp';
  $productImageUrl = asset('storage/' . $productOriginal);

  $variants = image_variants($productOriginal);
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

  $srcsetAvif = $variants['avif'] ?? [];
  $srcsetWebp = $variants['webp'] ?? [];
  $srcsetJpg  = $variants['jpg'] ?? [];
  $fallback   = $variants['fallback']['url'] ?? $productImageUrl;

  $toSrcset = static function (array $arr): string {
      return implode(', ', array_map(
          static fn($v) => ($v['url'] ?? '') . ' ' . ($v['w'] ?? '') . 'w',
          $arr
      ));
  };

  $productSrcsetAvif = !empty($srcsetAvif) ? $toSrcset($srcsetAvif) : null;
  $productSrcsetWebp = !empty($srcsetWebp) ? $toSrcset($srcsetWebp) : null;
  $productSrcsetJpg  = !empty($srcsetJpg)  ? $toSrcset($srcsetJpg)  : null;
@endphp

@extends('layouts.public')

@section('title', 'Ruedas de Poliuretano para Montacargas y patines| Permathane')
@section('meta_description', 'Cotiza Llantas de Poliuretano para Montacargas entrega inmediata, precios mayorista, el mejor rendimiento para Montacargas y patines de la marca Trelleborg.')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload de la imagen principal visible arriba del fold (LCP más probable) --}}
  <link rel="preload" as="image" href="{{ $fallback }}">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ $siteUrl }}#website",
        "url": "{{ $siteUrl }}",
        "name": "Llantas para Montacargas, Minicargadores y Telehandlers | Trelleborg México",
        "inLanguage": "es-MX",
        "publisher": {
          "@id": "{{ $siteUrl }}#organization"
        },
        "potentialAction": {
          "@type": "SearchAction",
          "target": "{{ $siteUrl }}?s={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "AutoPartsStore",
        "@id": "{{ $siteUrl }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": [
          "BSH",
          "BSH | Llantas de Montacargas"
        ],
        "url": "{{ $siteUrl }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ $heroBgJpg }}"
        },
        "image": [
          "{{ $heroBgJpg }}"
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
          "Ruedas industriales para almacenes",
          "Ruedas para almacenes refrigerados",
          "Manejo de materiales"
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{ $currentUrl }}#webpage",
        "url": "{{ $currentUrl }}",
        "name": "@yield('title')",
        "description": "@yield('meta_description')",
        "inLanguage": "es-MX",
        "isPartOf": {
          "@id": "{{ $siteUrl }}#website"
        },
        "about": {
          "@id": "{{ $currentUrl }}#product"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "{{ $productImageUrl }}"
        },
        "breadcrumb": {
          "@id": "{{ $currentUrl }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ $currentUrl }}#product",
        "name": "Llanta de Poliuretano Permathane",
        "alternateName": [
          "Permathane",
          "Rueda de Poliuretano Permathane",
          "Trelleborg Permathane"
        ],
        "sku": "PERMATHANE",
        "mpn": "PERMATHANE",
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
        "description": "Llanta ultra PREMIUM de poliuretano para montacargas y patines, diseñada para carga adicional y resistencia al frío extremo en almacenes refrigerados. Disponible en durezas 80 Shore A y 90 Shore A, con mayor capacidad de carga que las llantas de hule, resistencia a corte y ponchaduras, sin acumulación de calor y excelente vida útil.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta o rueda de poliuretano industrial"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas y patines"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida útil llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Almacenes, pasillos, congeladores y suelos en buen estado"
          },
          {
            "@type": "PropertyValue",
            "name": "Resistencia",
            "value": "Frío extremo en almacenes refrigerados"
          },
          {
            "@type": "PropertyValue",
            "name": "Dureza disponible",
            "value": "80 Shore A y 90 Shore A"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Mayor capacidad de carga que las llantas de hule"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Resistente a corte y ponchaduras"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "No acumula calor"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Excelente vida útil"
          }
        ],
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"
        },
        "offers": {
          "@type": "Offer",
          "url": "{{ $currentUrl }}",
          "priceCurrency": "MXN",
          "availability": "https://schema.org/InStock",
          "itemCondition": "https://schema.org/NewCondition",
          "seller": {
            "@id": "{{ $siteUrl }}#organization"
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
        "@id": "{{ $currentUrl }}#service",
        "name": "Cotización y asesoría para ruedas de poliuretano para montacargas y patines",
        "serviceType": "Venta y asesoría de ruedas industriales de poliuretano",
        "provider": {
          "@id": "{{ $siteUrl }}#organization"
        },
        "areaServed": {
          "@type": "Country",
          "name": "México"
        },
        "relatedTo": {
          "@id": "{{ $currentUrl }}#product"
        }
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{ $currentUrl }}#breadcrumb",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Inicio",
            "item": "{{ $siteUrl }}"
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
            "name": "Permathane",
            "item": "{{ $currentUrl }}"
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
          @if($productSrcsetAvif)
            <source type="image/avif" srcset="{{ $productSrcsetAvif }}" sizes="{{ $sizes }}">
          @endif

          @if($productSrcsetWebp)
            <source type="image/webp" srcset="{{ $productSrcsetWebp }}" sizes="{{ $sizes }}">
          @endif

          @if($productSrcsetJpg)
            <source type="image/jpeg" srcset="{{ $productSrcsetJpg }}" sizes="{{ $sizes }}">
          @endif

          <img
            fetchpriority="high"
            decoding="async"
            loading="eager"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Trelleborg permathane"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] font-semibold leading-[33px] text-black lg:text-[43px] lg:leading-[43px]">
        Llanta de Poliuretano Permathane
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
          Llanta ultra PREMIUM para carga adicional y resistencia al frio extremo en almacenes refrigerados.
        </p>

        <p class="mb-5 mt-6">
          Disponible en durezas 80 Shore A y 90 Shore A.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Mayor capacidad de carga que las llantas de hule.</li>
          <li>Resistente a corte y ponchaduras.</li>
          <li>No acumulan calor.</li>
          <li>Excelente vida útil.</li>
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
      </div>
    </div>
  </div>
</section>

<div class="h-[10px] lg:h-[35px]" aria-hidden="true"></div>

<section
  id="contacto"
  class="relative box-border block bg-black bg-cover bg-center bg-no-repeat transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $heroBgJpg }}');
    background-image:image-set(
      url('{{ $heroBgAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroBgWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroBgJpg }}') type('image/jpeg') 1x
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
          <div
            id="hubspot-form-container"
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
@endsection

@push('styles')
<style>
  @media (max-width: 768px) {
    #contacto {
      background-image: url('{{ $heroBgJpg }}');
      background-image: image-set(
        url('{{ $heroBgAvif960 }}') type('image/avif') 1x,
        url('{{ $heroBgWebp960 }}') type('image/webp') 1x,
        url('{{ $heroBgJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endpush

@push('scripts')
<script>
  (() => {
    const container = document.getElementById('hubspot-form-container');
    if (!container) return;

    let loaded = false;
    let loading = false;

    const portalId = container.dataset.portalId;
    const formId = container.dataset.formId;

    function renderForm() {
      if (loaded || !window.hbspt?.forms?.create) return;
      loaded = true;

      window.hbspt.forms.create({
        portalId,
        formId,
        target: '#hubspot-form-container'
      });
    }

    function loadScriptAndRender() {
      if (loaded || loading) {
        renderForm();
        return;
      }

      loading = true;

      if (window.hbspt?.forms?.create) {
        renderForm();
        return;
      }

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';
      script.onload = renderForm;
      document.head.appendChild(script);
    }

    const contacto = document.getElementById('contacto');

    if ('IntersectionObserver' in window && contacto) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            loadScriptAndRender();
            observer.disconnect();
          }
        });
      }, {
        rootMargin: '300px 0px'
      });

      observer.observe(contacto);
    } else {
      window.addEventListener('load', loadScriptAndRender, { once: true });
    }

    document.querySelectorAll('a[href="#contacto"]').forEach((link) => {
      link.addEventListener('click', loadScriptAndRender, { once: true, passive: true });
    });
  })();
</script>
@endpush