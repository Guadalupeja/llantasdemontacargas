@extends('layouts.public')

@section('title', 'Llantas sólidas cushion para Montacargas | Trelleborg ITL')
@section('meta_description', 'Cotiza llantas sólidas con arillo ITL POS 2026, libres de mantenimiento, 25% mas vida GARANTIZADO por escrito. Precios Mayorista, Entrega inmediata y Crédito.')

@section('structured-data')
  @php
    $heroJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
    $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
    $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
    $heroAvif960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
    $heroWebp960 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
    $productImage = asset('storage/originals/Trelleborg_POS_ITL-Maxmatic-660x660.webp');
    $logoImage = asset('storage/originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png');
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
          "Llantas sólidas press on para montacargas",
          "Llantas neumáticas para montacargas",
          "Llantas para minicargadores",
          "Llantas para cargadores",
          "Llantas para manipuladores telescópicos",
          "Llantas industriales Trelleborg",
          "Asesoría técnica en selección e instalación de llantas industriales"
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}#webpage",
        "url": "{{ url()->current() }}",
        "name": "Trelleborg ITL Maxmatic Press On para Montacargas",
        "description": "Llanta sólida press on para montacargas Trelleborg ITL Maxmatic. Mayor vida útil, fácil intercambiabilidad, opción sin manchas, entrega inmediata y asesoría técnica en México.",
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
        "name": "Trelleborg ITL Maxmatic Press On",
        "alternateName": [
          "Llanta sólida Press On para montacargas Trelleborg ITL Maxmatic",
          "Llanta cushion Trelleborg ITL Maxmatic",
          "Trelleborg ITL Maxmatic"
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
        "description": "Llanta sólida Press On premium para montacargas Trelleborg ITL Maxmatic. Diseñada para aplicaciones demandantes en interiores y exteriores, con amplia banda de rodamiento, fácil intercambiabilidad, opción sin manchas y 25% más vida llanta contra llanta, garantizado por escrito.",
        "category": "Industrial Tire",
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"
        },
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida Press On para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "ITL Maxmatic Press On"
          },
          {
            "@type": "PropertyValue",
            "name": "Configuración",
            "value": "Press On / Cushion"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas eléctricos y de combustión"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Aplicaciones demandantes en interiores, almacenes y exterior"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Libre de mantenimiento"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Imponchable"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Fácil intercambiabilidad"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Capacidad de carga superior frente a alternativas convencionales"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Amplia banda de rodamiento para mayor rendimiento y estabilidad"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Excelente tracción en interior y exterior"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible en compuesto sin manchas para cuidado del piso"
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
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Press On Trelleborg para montacargas",
        "serviceType": "Venta y asesoría técnica de llantas industriales para montacargas",
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
            "name": "Llantas sólidas Press On para montacargas",
            "item": "{{ url()->current() }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Trelleborg ITL Maxmatic Press On",
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
    $variants = image_variants('originals/Trelleborg_POS_ITL-Maxmatic-660x660.webp');
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
            Llantas Sólidas Press On para Montacargas.
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 text-[#7a7a7a]">
            Llantas tipo cushion, libres de mantenimiento, imponchables y con fácil intercambiabilidad.
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
            alt="Trelleborg ITL Maxmatic Press On"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] font-semibold leading-[33px] text-black lg:text-[43px] lg:leading-[43px]">
        Trelleborg ITL Maxmatic Press On
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
          Llanta neumática PREMIUM, reforzada y de construcción radial para altas velocidades y trabajo pesado.
        </p>

        <p class="mb-5 mt-6">
          25% mas vida llanta contra llanta, GARANTIZADO por escrito.
        </p>

        <p class="mb-5 mt-6">
          Es una llanta PREMIUM con aro Press On, con capacidad de carga superior hasta en un 25% frente a la competencia gracias a su amplia banda de rodamiento de desarrollo exclusivo de la marca.
        </p>

        <p class="mb-5 mt-6">
          Ofrece excelente tracción en superficies en el interior, en almacenes, como en el exterior. Para Montacargas eléctricos y de combustión.
        </p>

        <p class="mb-5 mt-6">
          Disponible en compuesto sin manchas para el cuidado del piso.
        </p>

        <p class="mb-5 mt-6 font-bold">
          25% más vida llanta contra llanta, GARANTIZADO por escrito.
        </p>
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

<div class="h-[10px] lg:h-[45px]" aria-hidden="true"></div>

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
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative box-border flex min-h-px w-full">
      <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full">
          <div class="h-[104px]"></div>
        </div>

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

        <div class="w-full">
          <div class="h-[104px]"></div>
        </div>
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