@extends('layouts.public')

@section('title', 'Llantas Sólidas para Montacargas | Trelleborg Pro HD')
@section('meta_description', 'Cotiza Pro HD las únicas llantas sólidas que te garantizan 25% más vida. Llantas para montacargas y cargadores. Entrega inmediata, Crédito y Precio Mayorista.')

@section('structured-data')
  @php
    $productVariants = image_variants('originals/Trelleborg_Resilient_ProHD_575x575.webp');
    $productFallback = $productVariants['fallback']['url'] ?? asset('storage/originals/Trelleborg_Resilient_ProHD_575x575.webp');
    $productSrcsetAvif = !empty($productVariants['avif'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $productVariants['avif']))
      : null;
    $productSrcsetWebp = !empty($productVariants['webp'])
      ? implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $productVariants['webp']))
      : null;
  @endphp

  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload real del posible LCP: imagen principal del producto --}}
  @if($productSrcsetAvif)
    <link
      rel="preload"
      as="image"
      href="{{ $productFallback }}"
      imagesrcset="{{ $productSrcsetAvif }}"
      imagesizes="(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px"
      type="image/avif"
      fetchpriority="high">
  @elseif($productSrcsetWebp)
    <link
      rel="preload"
      as="image"
      href="{{ $productFallback }}"
      imagesrcset="{{ $productSrcsetWebp }}"
      imagesizes="(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px"
      type="image/webp"
      fetchpriority="high">
  @else
    <link
      rel="preload"
      as="image"
      href="{{ $productFallback }}"
      fetchpriority="high">
  @endif

  {{-- Preload del fondo del formulario solo para pantallas grandes; está debajo del fold --}}
  <link
    rel="preload"
    as="image"
    media="(min-width: 769px)"
    href="{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} 1024w,
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} 1024w,
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} 1600w
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
          "Llantas libres de mantenimiento",
          "Llantas imponchables para montacargas",
          "Llantas para montacargas de uso rudo",
          "Llantas para siderúrgica",
          "Llantas para puertos",
          "Llantas para centros logísticos",
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
          "url": "{{ $productFallback }}"
        },
        "breadcrumb": {
          "@id": "{{ url()->current() }}#breadcrumb"
        }
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg Pro HD",
        "alternateName": [
          "Llanta sólida para montacargas Trelleborg Pro HD",
          "Trelleborg PRO HD",
          "Llanta maciza Ultra-Premium Pro HD"
        ],
        "sku": "PRO-HD",
        "mpn": "PRO-HD",
        "category": "Industrial Tire",
        "image": [
          "{{ $productFallback }}"
        ],
        "brand": {
          "@type": "Brand",
          "name": "Trelleborg"
        },
        "manufacturer": {
          "@type": "Organization",
          "name": "Trelleborg"
        },
        "description": "Llanta maciza Ultra-Premium Trelleborg Pro HD para montacargas de uso rudo. Diseñada para sobrecargas, turnos continuos y procesos críticos en industrias como siderúrgica, metal-mecánica, grandes centros logísticos, puertos y chatarreras. Ofrece 25% más vida llanta contra llanta, mejor resistencia radial a grietas y fisuras, menor calentamiento, estabilidad superior y mejor rendimiento de combustible.",
        "additionalProperty": [
          {
            "@type": "PropertyValue",
            "name": "Tipo",
            "value": "Llanta sólida Ultra-Premium para montacargas"
          },
          {
            "@type": "PropertyValue",
            "name": "Modelo",
            "value": "Pro HD"
          },
          {
            "@type": "PropertyValue",
            "name": "Construcción",
            "value": "Sólida / maciza"
          },
          {
            "@type": "PropertyValue",
            "name": "Aplicación",
            "value": "Montacargas de uso rudo"
          },
          {
            "@type": "PropertyValue",
            "name": "Uso recomendado",
            "value": "Sobrecargas, turnos continuos y procesos críticos"
          },
          {
            "@type": "PropertyValue",
            "name": "Industrias objetivo",
            "value": "Siderúrgica, metal-mecánica, centros logísticos, puertos y chatarreras"
          },
          {
            "@type": "PropertyValue",
            "name": "Beneficio principal",
            "value": "25% más vida llanta contra llanta, garantizado por escrito"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Alta resistencia radial a grietas y fisuras"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Mejora rendimiento de combustible"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Restringe calentamiento excesivo incluso con sobrecargas y turnos continuos"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Estabilidad y conducción superior"
          },
          {
            "@type": "PropertyValue",
            "name": "Ventaja",
            "value": "Disponible con indicador de desgaste Pit Stop Line"
          }
        ],
        "audience": {
          "@type": "Audience",
          "audienceType": "Empresas industriales, almacenes, centros logísticos, puertos, siderúrgicas, metal-mecánicas y chatarreras"
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
          "name": "Ficha técnica Trelleborg Pro HD",
          "url": "{{ asset('pdfs/Trelleborg-ProHD-EN.pdf') }}"
        }
      },
      {
        "@type": "Service",
        "@id": "{{ url()->current() }}#service",
        "name": "Cotización y asesoría para llantas sólidas Trelleborg Pro HD para montacargas",
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
            "name": "Trelleborg Pro HD",
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
  $variants = image_variants('originals/Trelleborg_Resilient_ProHD_575x575.webp');
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? null;
  $srcsetWebp = $variants['webp'] ?? null;
  $srcsetJpg  = $variants['jpg'] ?? null;
  $fallback   = $variants['fallback']['url'] ?? asset('storage/originals/Trelleborg_Resilient_ProHD_575x575.webp');
  $toSrcset = fn($arr) => implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr));
@endphp

<section class="relative" role="region" aria-label="Resumen PS800">
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


<section class="relative" role="region" aria-label="Detalle PS800">
  <div class="relative mx-auto flex max-w-[1140px] flex-wrap">
    {{-- Columna imagen (≈32.708%) --}}
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
            width="575"
            height="575"
            src="{{ $fallback }}"
            alt="Trelleborg PRO HD"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    {{-- Columna contenido (≈67.292%) --}}
    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] lg:text-[43px] lg:leading-[43px] font-semibold text-black">
        Trelleborg PRO HD
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
          Las llantas macizas Ultra-Premium mas resistentes del mercado, diseñadas para montacargas de uso rudo, expuestos a sobrecargas y en procesos críticos en la industria siderúrgica, metal-mecánica, grandes centros logísticos, puertos y chatarreras.
        </p>
        Si sus rudo maticas se agrietan, sobrecalientan constantemente o incluso derriten, esta llanta ha sido diseñada para brindarle la solución optima con <span class="font-bold">vida extendida.</span>

        <ul class="mx-2 list-disc pl-6">
          <li>La mejor resistencia radial a grietas y fisuras.</li>
          <li>Mejora rendimiento de combustible.</li>
          <li>Restringe calentamiento excesivo incluso con sobrecargas y a turnos continuos.</li>
          <li>Estabilidad y conducción superior.</li>
          <li>Disponible con indicador de desgaste Pit Stop Line.</li>
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
            href="{{ asset('pdfs/Trelleborg-ProHD-EN.pdf') }}"
            download="Trelleborg-ProHD-EN.pdf"
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
            data-hs-form-container
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
            data-hs-forms-root="true"
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
  window.addEventListener('load', function () {
    const formContainer = document.querySelector('[data-hs-form-container]');
    if (!formContainer) return;

    const portalId = formContainer.getAttribute('data-portal-id');
    const formId = formContainer.getAttribute('data-form-id');

    let loaded = false;

    function createHubspotForm() {
      if (
        loaded ||
        !window.hbspt ||
        !window.hbspt.forms ||
        !window.hbspt.forms.create
      ) return;

      loaded = true;

      window.hbspt.forms.create({
        portalId,
        formId,
        target: '[data-hs-form-container]'
      });
    }

    function loadHubspotScript() {
      if (document.querySelector('script[data-hs-shell="true"]')) {
        createHubspotForm();
        return;
      }

      const script = document.createElement('script');
      script.src = 'https://js.hsforms.net/forms/shell.js';
      script.async = true;
      script.defer = true;
      script.charset = 'utf-8';
      script.setAttribute('data-hs-shell', 'true');
      script.onload = createHubspotForm;
      document.body.appendChild(script);
    }

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            loadHubspotScript();
            observer.disconnect();
          }
        });
      }, {
        rootMargin: '300px 0px'
      });

      observer.observe(formContainer);
    } else {
      loadHubspotScript();
    }
  }, { once: true });
</script>
@endsection