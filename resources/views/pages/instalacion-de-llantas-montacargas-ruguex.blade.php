@extends('layouts.public')

@php($year = now()->year)

@section('title', "Instalación de llantas para montacargas mejor servicio {$year}")
@section('meta_description', "Solicita ahora servicios express instalación de llantas para montacargas y minicargadores {$year}. Prensa fija y móvil interfit servicios a domicilio por expertos.")

@section('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "https://llantasdemontacargas.com/#website",
      "url": "https://llantasdemontacargas.com/",
      "name": "RUGUEX",
      "inLanguage": "es-MX"
    },
    {
      "@type": "Organization",
      "@id": "https://llantasdemontacargas.com/#organization",
      "name": "RUGUEX",
      "url": "https://llantasdemontacargas.com/",
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "contactType": "Ventas / Cotizaciones",
          "url": "https://wa.me/525951124238",
          "availableLanguage": ["es", "es-MX"]
        }
      ]
    },
    {
      "@type": "ImageObject",
      "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#primaryimage",
      "url": "https://llantasdemontacargas.com/storage/originals/Montaje-de-Llantas-Rudomaticas-para-Montacaragas-y-Minicargadores..jpg",
      "contentUrl": "https://llantasdemontacargas.com/storage/originals/Montaje-de-Llantas-Rudomaticas-para-Montacaragas-y-Minicargadores..jpg"
    },
    {
      "@type": "Service",
      "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#service",
      "name": "Servicio de instalación de llantas para montacargas y minicargadores",
      "serviceType": "Instalación de llantas (prensa fija y prensa móvil en sitio)",
      "provider": { "@id": "https://llantasdemontacargas.com/#organization" },
      "areaServed": [
        { "@type": "Country", "name": "México" },
        { "@type": "City", "name": "Cuautitlán Izcalli" },
        { "@type": "City", "name": "Puebla" },
        { "@type": "City", "name": "Monterrey" },
        { "@type": "City", "name": "Silao" }
      ],
      "availableChannel": {
        "@type": "ServiceChannel",
        "serviceUrl": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#contacto",
        "availableLanguage": ["es-MX"]
      },
      "image": [
        "https://llantasdemontacargas.com/storage/originals/Instalacion-de-llantas-para-montacargas-con-prensa-movil-en-sitio.jpg"
      ]
    },
    {
      "@type": "VideoObject",
      "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#video",
      "name": "¿En qué consiste el servicio Interfit® de Trelleborg®?",
      "description": "Video explicativo del servicio Interfit® para instalación de llantas en maquinaria móvil.",
      "thumbnailUrl": ["https://img.youtube.com/vi/DNUsnuldki0/hqdefault.jpg"],
      "embedUrl": "https://www.youtube.com/embed/DNUsnuldki0",
      "contentUrl": "https://www.youtube.com/watch?v=DNUsnuldki0",
      "inLanguage": "es-MX",
      "publisher": { "@id": "https://llantasdemontacargas.com/#organization" }
    },
    {
      "@type": "WebPage",
      "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#webpage",
      "url": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/",
      "name": "Instalación de llantas para montacargas mejor servicio 2026",
      "description": "Solicita ahora servicios express instalación de llantas para montacargas y minicargadores 2026. Prensa fija y móvil interfit servicios a domicilio por expertos.",
      "inLanguage": "es-MX",
      "isPartOf": { "@id": "https://llantasdemontacargas.com/#website" },
      "about": { "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#service" },
      "mainEntity": [
        { "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#service" },
        { "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#video" }
      ],
      "primaryImageOfPage": { "@id": "https://llantasdemontacargas.com/instalacion-de-llantas-montacargas-ruguex/#primaryimage" }
    }
  ]
}
</script>
@endsection


@section('content')

<section class="relative w-full lg:h-[474px] overflow-hidden">
  {{-- Fondo responsive (AVIF/WEBP/Fallback) --}}
  <div class="absolute inset-0 z-0" aria-hidden="true">
    <x-responsive-image
      :variants="image_variants('originals/Montaje-de-Llantas-Rudomaticas-para-Montacaragas-y-Minicargadores..jpg')"
      alt=""
      sizes="100vw"
      class="w-full h-full object-cover object-center"
      loading="eager"
      fetchpriority="high"
    />
  </div>

  {{-- Overlay oscuro --}}
  <div class="absolute inset-0 bg-black/35 z-10" aria-hidden="true"></div>

  {{-- Contenido --}}
  <div class="relative z-20 h-full flex items-center">
    <div class="max-w-[1140px] mx-auto w-full px-4 flex items-center">

      {{-- Tabla de contenido --}}
      <div class="hidden md:block w-[300px] border border-white/40 bg-black/65 text-white p-5 mr-10">
        <button
          type="button"
          id="tocToggle"
          class="w-full font-semibold mb-3 flex items-center justify-between gap-2 cursor-pointer select-none"
          aria-expanded="true"
          aria-controls="tocList"
        >
          <span class="flex items-center gap-2 text-[#e76a3e]">
            <span>—</span>
            <span>Tabla de contenido</span>
          </span>
          <span id="tocIcon" class="transition-transform duration-200">▾</span>
        </button>

        <ol id="tocList" class="list-decimal list-inside space-y-2 text-sm font-semibold">
          <li>
            <a class="text-white hover:text-[#e76a3e]" href="#T1">Servicio de instalación de llantas</a>
          </li>
          <li>
            <a class="text-white hover:text-[#e76a3e]" href="#T2">Servicio Interfit de Trelleborg</a>
          </li>
          <li>
            <a class="text-white hover:text-[#e76a3e]" href="#contacto">Solicita servicio de instalación de llantas</a>
          </li>
        </ol>
      </div>

      {{-- Título + botón --}}
      <div class="relative w-full flex flex-wrap content-start items-start">
        <div class="w-full mb-5"><div class="h-[54px]"></div></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 p-0 font-['Roboto',sans-serif] font-semibold text-white lg:text-[40px] lg:leading-[40px] text-[20px] leading-[20px]">
            Montaje de Llantas Rudomáticas para Montacargas y Minicargadores.
          </h1>
        </div>

        <div class="w-full mb-5"><div class="lg:h-[54px]"></div></div>
        <div class="w-full mb-5"><div class="lg:h-[50px]"></div></div>

        <div class="w-full text-center">
          <a
            href="#contacto"
            class="inline-flex items-center justify-center rounded-[5px] bg-[#ff6700] px-[20px] py-[10px] text-[14px] leading-[14px] lg:px-[40px] lg:py-[20px] lg:text-[18px] lg:leading-[18px] font-['Roboto',sans-serif] font-medium text-white no-underline shadow-none transition duration-300 hover:brightness-95"
          >
            <span class="mr-[5px] inline-flex items-center" aria-hidden="true">
              <i class="fa-solid fa-arrow-right"></i>
            </span>
            <span>Solicita ahora</span>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>


<section class="relative" id="T1">
  <div class="mx-auto flex flex-col lg:flex-row max-w-[1140px] items-center min-h-[706px] lg:mt-20">
    {{-- Izquierda --}}
    <div class="lg:w-1/2 lg:p-[10px] p-[20px] flex flex-wrap content-start">
      <h2 class="w-full mb-5 font-['Roboto',sans-serif] font-semibold lg:text-[29px] text-[19px] leading-[29px] text-[#ff6700]">
        ¿Cómo solicitar un servicio de instalación de llantas?
      </h2>

      <div class="w-full mb-5 font-['Roboto',sans-serif] font-normal text-[#7a7a7a] text-justify">
        <p class="mb-5">
          Nuestro servicio de instalación de llantas con prensa hidráulica no tiene costo en la compra de tus llantas sólidas y cushion&nbsp;
          para montacargas o cargadores.
        </p>
        <p class="mb-5">
          En <strong class="font-bold">Ruguex®</strong> sabemos que cada minuto cuenta. Solicita el servicio y recíbelo de forma inmediata acudiendo con tus rines para montaje a cualquiera de nuestras sucursales:
        </p>

        <p class="mb-5">Cuatitlan Izcalli, Edomex.</p>
        <p class="mb-5">Puebla, Puebla.</p>
        <p class="mb-5">Monterrey, Nuevo León.</p>
        <p class="mb-5">Silao, Guanajuato.</p>

        <p class="mb-5">
          Si requieres servicios de instalación en sitio para tu flotilla, también contamos con prensas móviles
          <strong class="font-bold">Interlift®</strong> a tu disposición.&nbsp;
        </p>

        <p class="mb-5">
          Encuentra en Ruguex® la solución completa: Llantas Premium, Rines, ensamble de fabrica (Llanta + Rin) y Servicio de instalación sin costo.
        </p>

        <p class="mb-5">
          Tenemos amplias existencias de llantas, rines y ensambles de fabrica (Llanta+Rin) para los principales fabricantes y modelos de
          <strong class="font-bold">Montacargas</strong> y <strong class="font-bold">Cargadores</strong>;
          <strong class="font-bold">CAT, Komatsu, Toyota, Yale, Bobcat, Clark, Ingersoll</strong>, etc.
        </p>
      </div>

      <div class="w-full">
        <a
          href="#contacto"
          class="inline-flex items-center justify-center rounded-[3px] bg-[#ff6700] px-6 py-3 text-[15px] leading-[15px] font-['Roboto',sans-serif] font-medium text-white no-underline transition duration-300"
        >
          <span class="mr-[5px] inline-flex items-center" aria-hidden="true">
            <i class="fa-solid fa-arrow-right"></i>
          </span>
          <span>Solicita ahora</span>
        </a>
      </div>
    </div>

    {{-- Derecha --}}
    <div class="lg:w-1/2 p-[10px] flex flex-wrap content-start text-center">
      <x-responsive-image
        :variants="image_variants('originals/Instalacion-de-llantas-para-montacargas-con-prensa-movil-en-sitio.jpg')"
        alt="Instalación de llantas para montacargas con prensa móvil en sitio"
        sizes="(min-width: 1024px) 50vw, 100vw"
        class="inline-block max-w-full h-auto align-middle border-0 shadow-none"
      />
    </div>
  </div>
</section>


<section class="relative" id="T2">
  <div class="mx-auto flex flex-col lg:flex-row max-w-[1140px]">
    {{-- Video --}}
    <div class="lg:w-1/2 p-[10px] flex flex-wrap items-center content-center">
      <div class="w-full overflow-hidden">
        <div class="aspect-video">
          <iframe
            class="w-full h-full bg-black border-0"
            src="https://www.youtube.com/embed/DNUsnuldki0?autoplay=1"
            allow="autoplay; encrypted-media; gyroscope;"
            title="Video Interfit"
          ></iframe>
        </div>
      </div>
    </div>

    {{-- Texto --}}
    <div class="lg:w-1/2 lg:p-[10px] p-[20px] flex flex-wrap items-center content-center">
      <h2 class="w-full mb-5 lg:text-right text-center font-['Roboto',sans-serif] font-semibold text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] text-black">
        ¿En qué consiste el servicio Interfit®<br />
        de Trelleborg®?
      </h2>

      <div class="w-full lg:h-[30px] mb-5"></div>

      <div class="w-full text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
        <p class="mb-5">Interfit® es la marca líder mundial en servicios de instalación de llantas para maquinaria móvil.</p>
        <p class="mb-5">
          A través de su red de concesionarios autorizados Trelleborg® Interlift® agrega valor a la compra de tus llantas con el servicio experto de montaje; Prensas especializadas, técnicos capacitados, control de calidad y Garantía en todos los trabajos.
        </p>
        <p class="mb-5">
          Asegura el correcto funcionamiento de tus llantas y tu equipo, con las garantías del propio fabricante y sin costo adicional.
        </p>
      </div>
    </div>
  </div>
</section>


<section
  id="contacto"
  class="relative bg-black bg-cover bg-center"
  style="
    /* Fallback universal */
    background-image:url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');

    /* Navegadores con image-set escogerán el mejor formato */
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
    );
  "
>
  <div class="mx-auto flex flex-col lg:flex-row max-w-[1140px]">
    {{-- Izquierda --}}
    <div class="lg:w-1/2 p-[10px] flex flex-wrap content-start">
      <div class="w-full h-[63px] mb-5"></div>

      <h2 class="w-full mb-5 text-left font-['Roboto',sans-serif] font-semibold lg:text-[42px] lg:leading-[42px] text-[32px] leading-[32px] uppercase text-white">
        Solicita servicios de instalación de llantas aquí
      </h2>

      <div class="w-full h-[50px] mb-5"></div>

      <div class="w-full">
        <a
          href="https://wa.me/525951124238"
          target="_blank"
          rel="noopener"
          class="inline-flex items-center justify-center rounded-[3px] bg-[#61CE70] px-6 py-3 text-[15px] leading-[15px] font-['Roboto',sans-serif] font-medium text-white no-underline transition duration-300"
        >
          <span class="mr-[5px] inline-flex items-center" aria-hidden="true">
            <i class="fa-brands fa-whatsapp"></i>
          </span>
          <span>Contactar WhatsApp</span>
        </a>
      </div>
    </div>

    {{-- Derecha --}}
    <div class="lg:w-1/2 p-[10px] flex flex-wrap content-start">
      <div class="w-full h-[104px] mb-5"></div>

      <div data-hs-forms-root="true" class="w-full">
        <script async defer charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
        <script>
          window.addEventListener('load', function () {
            if (window.__hsFaqFormMounted) return;
            window.__hsFaqFormMounted = true;

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
  </div>
</section>

@endsection


@push('styles')
<style>
  /* Ajuste responsive: en <=768px usa una variante más chica */
  @media (max-width: 768px) {
    #contacto{
      background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
      background-image: image-set(
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif') }}') type('image/avif') 1x,
        url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp') }}') type('image/webp') 1x,
        url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endpush


@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('tocToggle');
    const list   = document.getElementById('tocList');
    const icon   = document.getElementById('tocIcon');

    if (!toggle || !list) return;

    const setState = (open) => {
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      list.classList.toggle('hidden', !open);
      if (icon) icon.classList.toggle('rotate-180', !open);
    };

    setState(true);

    toggle.addEventListener('click', () => {
      setState(toggle.getAttribute('aria-expanded') !== 'true');
    });
  });
</script>
@endpush
