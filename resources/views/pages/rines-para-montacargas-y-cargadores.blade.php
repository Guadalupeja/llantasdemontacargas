@extends('layouts.public')

@section('title', 'Rines para montacargas y cargadores durables y a medida 2026')
@section('meta_description', 'Cotiza los mejores rines para montacargas y cargadores, maquinaria de construcción, bobcat, etc. aquí, amplia existencia de rines nuevos y fabricación express.')

@php
  // Reutilizables (evita repetir funciones y strings)
  $currentUrl  = url()->current();
  $homeUrl     = url('/');
  $title       = trim($__env->yieldContent('title'));
  $metaDesc    = trim($__env->yieldContent('meta_description'));

  // Rutas imágenes (originales)
  $heroSrc     = asset('storage/originals/img873.jpg');

  // Variantes hero (si alguna no existe en prod, no rompe; solo se ignora)
  $heroAvif1280 = asset('storage/variants/originals/img873-1280.avif');
  $heroAvif1024 = asset('storage/variants/originals/img873-1024.avif');
  $heroAvif960  = asset('storage/variants/originals/img873-960.avif');
  $heroAvif768  = asset('storage/variants/originals/img873-768.avif');
  $heroAvif640  = asset('storage/variants/originals/img873-640.avif');

  // Hero de contacto
  $contactJpg  = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $contactAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $contactWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $contactAvif960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $contactWebp960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');
@endphp

{{-- Todo esto debe renderizar en <head> --}}
@section('structured-data')
  {{-- DNS hints y preconnect para HubSpot --}}
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload del hero (no cambia diseño) --}}
  <link
    rel="preload"
    as="image"
    href="{{ $heroSrc }}"
    imagesrcset="
      {{ $heroAvif1280 }} 1280w,
      {{ $heroAvif1024 }} 1024w,
      {{ $heroAvif960 }} 960w,
      {{ $heroAvif768 }} 768w,
      {{ $heroAvif640 }} 640w
    "
    imagesizes="100vw"
  >

  {{-- JSON-LD consolidado --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ $homeUrl }}#website",
        "url": "{{ $homeUrl }}",
        "name": "Llantas y rines para montacargas y minicargadores | BSH",
        "inLanguage": "es-MX",
        "potentialAction": {
          "@type": "SearchAction",
          "target": "{{ $homeUrl }}?s={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "Organization",
        "@id": "{{ $homeUrl }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": "RUGUEX | Llantas de Montacargas",
        "url": "{{ $homeUrl }}",
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
        "contactPoint": [
          {"@type":"ContactPoint","telephone":"+52-55-5752-1715","contactType":"sales","areaServed":"MX"},
          {"@type":"ContactPoint","telephone":"+52-83-3246-2205","contactType":"sales","areaServed":"MX"},
          {"@type":"ContactPoint","telephone":"+52-83-3239-5885","contactType":"sales","areaServed":"MX"},
          {"@type":"ContactPoint","telephone":"+52-22-2227-3866","contactType":"sales","areaServed":"MX"},
          {"@type":"ContactPoint","telephone":"+52-59-5112-4238","contactType":"sales","areaServed":"MX"}
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{ $currentUrl }}#webpage",
        "url": "{{ $currentUrl }}",
        "name": "{{ $title }}",
        "description": "{{ $metaDesc }}",
        "inLanguage": "es-MX",
        "isPartOf": { "@id": "{{ $homeUrl }}#website" },
        "about": { "@id": "{{ $currentUrl }}#product" },
        "primaryImageOfPage": { "@id": "{{ $currentUrl }}#primaryimage" }
      },
      {
        "@type": "ImageObject",
        "@id": "{{ $currentUrl }}#primaryimage",
        "url": "{{ $heroSrc }}",
        "caption": "Rines para montacargas y cargadores"
      },
      {
        "@type": "Product",
        "@id": "{{ $currentUrl }}#product",
        "name": "Rines para montacargas y cargadores",
        "category": "Industrial Equipment Part",
        "description": "Rines nuevos y fabricación express para montacargas, cargadores y maquinaria de construcción. Fabricación a medida en rines ciegos, migración de llanta neumática a llanta sólida y cotización rápida.",
        "brand": { "@type": "Brand", "name": "BSH" },
        "image": [
          "{{ asset('storage/originals/rin-1.jpg') }}",
          "{{ asset('storage/originals/rin-2.jpg') }}",
          "{{ asset('storage/originals/imagen-1-2.jpg') }}",
          "{{ asset('storage/originals/carrusel-2.jpg') }}",
          "{{ asset('storage/originals/carrusel-3.jpg') }}",
          "{{ asset('storage/originals/carrusel-4.jpg') }}"
        ],
        "additionalProperty": [
          { "@type":"PropertyValue", "name":"Disponibilidad", "value":"Amplia existencia de rines en medidas comunes" },
          { "@type":"PropertyValue", "name":"Servicio", "value":"Fabricación express y barreno a medida" },
          { "@type":"PropertyValue", "name":"Aplicación", "value":"Montacargas, cargadores, maquinaria de construcción y minicargadores" },
          { "@type":"PropertyValue", "name":"Compatibilidad", "value":"Opciones para migrar de llanta neumática a llanta sólida" }
        ],
        "offers": {
          "@type": "AggregateOffer",
          "url": "{{ $currentUrl }}",
          "priceCurrency": "MXN",
          "availability": "https://schema.org/InStock",
          "seller": { "@id": "{{ $homeUrl }}#organization" }
        }
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{ $currentUrl }}#breadcrumbs",
        "itemListElement": [
          { "@type":"ListItem", "position":1, "name":"Inicio", "item":"{{ $homeUrl }}" },
          { "@type":"ListItem", "position":2, "name":"Rines", "item":"{{ $currentUrl }}" }
        ]
      }
    ]
  }
  </script>
@endsection



@section('content')

<section class="relative w-full p-3">
  <!-- Imagen responsiva (fondo) -->
  <div class="absolute inset-0">
    <x-responsive-image
      :variants="image_variants('originals/img873.jpg')"
      alt=""
      sizes="100vw"
      class="h-full w-full object-cover object-center"
      fetchpriority="high"
      loading="eager"
      width="1920"
      height="600"
    />
  </div>

  <!-- overlay -->
  <div class="absolute inset-0 bg-black/70"></div>

  <!-- container -->
  <div class="relative mx-auto max-w-[1140px] px-[10px]">
    <div class="lg:h-[80px] h-[40px]"></div>

    <h1 class="m-0 p-4 text-center lg:text-[40px] text-[20px] font-bold leading-[1.1] text-white">
      ¿Requieres cambiar los rines de tu Maquinaria?
    </h1>

    <div class="lg:h-[80px] h-[40px]"></div>
  </div>
</section>


<section>
  <div class="mx-auto m-[10px] max-w-[1140px] p-[10px]">
    <div class="hidden h-[15px] lg:block"></div>

    <h2 class="my-[20px] text-center font-['Roboto',sans-serif] lg:text-[38px] text-[18px] font-semibold leading-none text-black">
      Rines para Montacargas y Cargadores
    </h2>

    <div class="hidden h-[15px] lg:block"></div>
  </div>
</section>

<section class="my-[10px] bg-[#F1F1F1]">
  <div class="mx-auto max-w-[1140px] px-[10px]">
    <div class="flex flex-col md:flex-row">

      <!-- Columna izquierda -->
      <div class="w-full p-[10px] md:w-1/2">
        <div class="text-justify font-['Raleway',sans-serif] lg:text-[16px] text-[14px] leading-[1.8] text-[#7A7A7A]">
          <p class="mb-5">
            Tenemos <strong class="font-bold">amplias existencias de rines</strong> nuevos para tu montacargas, cargador y maquinaria de construcción en las medidas mas comunes, así como capacidades de fabricación express.
          </p>
          <p class="mb-5">
            Puedes adquirir un ensamble de fábrica para tu minicargador; llanta con rin, pagando solo una fracción del costo real del Rin, asegurando el correcto funcionamiento de tu equipo y ahorrándote operaciones de montaje.
          </p>
          <p class="mb-5">
            Entra aquí a nuestra tienda en línea y compara las alternativas que incluyen rin, verás que resulta más económico y práctico:
          </p>
        </div>

        <div class="mt-5 text-center">
          <a
            href="https://llantasdemontacargas.com/tienda-en-linea"
            target="_blank"
            class="inline-flex items-center justify-center rounded-[3px] bg-[#EE5835] px-6 py-3 text-[15px] leading-none text-white transition hover:brightness-95"
          >
            Tienda en línea
          </a>
        </div>
      </div>

      <!-- Columna derecha (Carrusel) -->
      <div class="flex w-full items-center justify-center p-[10px] md:w-1/2">
        <div
          class="relative w-full pb-[30px]"
          data-carousel="rines"
          data-autoplay="true"
          data-interval="5000"
        >
          <!-- Viewport -->
          <div class="overflow-hidden">
            <!-- Track -->
            <div class="flex transition-transform duration-500 ease-in-out will-change-transform" data-track>

              <div class="w-full shrink-0 text-center">
                <x-responsive-image
                  :variants="image_variants('originals/imagen-1-2.jpg')"
                  alt="Rines para montacargas y cargadores"
                  sizes="(min-width: 768px) 550px, 100vw"
                  class="w-full h-auto"
                  loading="lazy"
                />
              </div>

              <div class="w-full shrink-0 text-center">
                <x-responsive-image
                  :variants="image_variants('originals/carrusel-2.jpg')"
                  alt="Rines carrusel 2"
                  sizes="(min-width: 768px) 550px, 100vw"
                  class="w-full h-auto"
                  loading="lazy"
                />
              </div>

              <div class="w-full shrink-0 text-center">
                <x-responsive-image
                  :variants="image_variants('originals/carrusel-3.jpg')"
                  alt="Rines carrusel 3"
                  sizes="(min-width: 768px) 550px, 100vw"
                  class="w-full h-auto"
                  loading="lazy"
                />
              </div>

              <div class="w-full shrink-0 text-center">
                <x-responsive-image
                  :variants="image_variants('originals/carrusel-4.jpg')"
                  alt="Rines carrusel 4"
                  sizes="(min-width: 768px) 550px, 100vw"
                  class="w-full h-auto"
                  loading="lazy"
                />
              </div>

            </div>
          </div>

          <!-- Flechas -->
          <button
            type="button"
            aria-label="Diapositiva anterior"
            class="absolute left-[10px] top-1/2 inline-flex -translate-y-1/2 select-none items-center justify-center text-[25px] text-white/90"
            data-prev
          >‹</button>

          <button
            type="button"
            aria-label="Diapositiva siguiente"
            class="absolute right-[10px] top-1/2 inline-flex -translate-y-1/2 select-none items-center justify-center text-[25px] text-white/90"
            data-next
          >›</button>

          <!-- Bullets -->
          <div class="absolute bottom-[5px] left-0 flex w-full justify-center" data-dots></div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="my-[10px] bg-[#f1f1f1]">
  <div class="mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <div class="w-full md:w-1/2">
      <div class="p-[10px] text-center">
        <x-responsive-image
          :variants="image_variants('originals/rin-1.jpg')"
          alt="Rines para montacargas y cargadores"
          sizes="(min-width: 768px) 50vw, 100vw"
          class="inline-block h-auto max-w-full align-middle"
          width="688"
          height="405"
          fetchpriority="high"
          loading="lazy"
        />
      </div>
    </div>

    <div class="flex w-full items-center md:w-1/2">
      <div class="w-full p-[10px]">
        <div class="my-[5px] ml-[5px] text-justify font-['Raleway',sans-serif] lg:text-[16px] text-[14px] font-normal leading-[27.2px] text-[#7a7a7a]">
          <ul class="mb-[10px] mt-0 list-disc pl-5">
            <li>
              En el caso de que tu maquinaría haya sido modificada y no cuente ya con el sistema
              original rin-masa-birlos, <strong class="font-semibold">podemos fabricar</strong> a partir
              de rines ciegos, que se barrenan a medida en
              <strong class="font-semibold">cuestión de horas.</strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="my-[10px] bg-[#F1F1F1]">
  <div class="mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <div class="flex w-full md:w-1/2 items-center p-[10px]">
      <div class="w-full font-['Raleway',sans-serif] lg:text-[16px] text-[14px] font-normal leading-[27.2px] text-[#7a7a7a]">
        <ul class="mb-[10px] mt-0 list-disc pl-5">
          <li>
            Si por otro lado tienes una <strong class="font-semibold">aplicación especial</strong>,
            o requieres migrar tu equipo de llanta neumática a llanta sólida, te cotizamos la
            <strong class="font-semibold">fabricación de un rin específico</strong>
            con los mejores tiempos de entrega y garantías del mercado.
          </li>
        </ul>
      </div>
    </div>

    <div class="w-full md:w-1/2 p-[10px] text-center">
      <x-responsive-image
        :variants="image_variants('originals/rin-2.jpg')"
        alt=""
        sizes="(min-width: 768px) 50vw, 100vw"
        class="inline-block h-auto max-w-full align-middle"
        width="688"
        height="405"
        loading="lazy"
      />
    </div>
  </div>
</section>


<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $contactJpg }}');
    background-image: image-set(
      url('{{ $contactAvif1024 }}') type('image/avif') 1x,
      url('{{ $contactWebp1024 }}') type('image/webp') 1x,
      url('{{ $contactJpg }}') type('image/jpeg') 1x
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
            <h2>Cotiza aquí tu rin:</h2>
          </div>
        </div>

        <div class="z-10 w-full mb-5">
          <div data-hs-forms-root="true">
            <script async defer charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
            <script>
              (function () {
                function tryCreate() {
                  if (window.hbspt && hbspt.forms && typeof hbspt.forms.create === 'function') {
                    hbspt.forms.create({
                      portalId: "7547674",
                      formId: "26f426a7-e620-42df-98a3-43e10a899b6c"
                    });
                    return true;
                  }
                  return false;
                }

                // Intenta al cargar; si el script tarda, reintenta un poco sin bloquear
                window.addEventListener('load', function () {
                  if (tryCreate()) return;
                  var tries = 0;
                  var t = setInterval(function () {
                    tries++;
                    if (tryCreate() || tries >= 30) clearInterval(t);
                  }, 250);
                });
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
      background-image: url('{{ $contactJpg }}');
      background-image: image-set(
        url('{{ $contactAvif960 }}') type('image/avif') 1x,
        url('{{ $contactWebp960 }}') type('image/webp') 1x,
        url('{{ $contactJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>


@push('scripts')
<script>
(function () {
  function initCarousel(root) {
    if (!root) return;

    const track = root.querySelector('[data-track]');
    if (!track) return;

    const slides = Array.from(track.children);
    if (slides.length <= 1) return; // nada que carruselear

    const prevBtn = root.querySelector('[data-prev]');
    const nextBtn = root.querySelector('[data-next]');
    const dotsWrap = root.querySelector('[data-dots]');

    const autoplay = root.dataset.autoplay === 'true';
    const intervalMs = parseInt(root.dataset.interval || '5000', 10);

    let index = 0;
    let timer = null;
    let isHover = false;

    // Dots (solo si existe el contenedor)
    let dots = [];
    if (dotsWrap) {
      dotsWrap.innerHTML = '';
      dots = slides.map((_, i) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        b.className = 'w-[6px] h-[6px] rounded-full bg-black opacity-20 mx-[6px] transition-opacity';
        b.addEventListener('click', () => goTo(i));
        dotsWrap.appendChild(b);
        return b;
      });
    }

    function update() {
      track.style.transform = `translate3d(${-index * 100}%, 0, 0)`;
      if (dots.length) {
        dots.forEach((d, i) => {
          d.classList.toggle('opacity-100', i === index);
          d.classList.toggle('opacity-20', i !== index);
        });
      }
    }

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      update();
    }

    function next() { goTo(index + 1); }
    function prev() { goTo(index - 1); }

    prevBtn && prevBtn.addEventListener('click', prev);
    nextBtn && nextBtn.addEventListener('click', next);

    function start() {
      if (!autoplay) return;
      stop();
      timer = setInterval(() => { if (!isHover) next(); }, intervalMs);
    }
    function stop() {
      if (timer) clearInterval(timer);
      timer = null;
    }

    root.addEventListener('mouseenter', () => { isHover = true; });
    root.addEventListener('mouseleave', () => { isHover = false; });

    // Swipe
    let startX = 0;
    let diffX = 0;

    root.addEventListener('touchstart', (e) => {
      if (!e.touches || !e.touches[0]) return;
      startX = e.touches[0].clientX;
      diffX = 0;
    }, { passive: true });

    root.addEventListener('touchmove', (e) => {
      if (!e.touches || !e.touches[0]) return;
      diffX = e.touches[0].clientX - startX;
    }, { passive: true });

    root.addEventListener('touchend', () => {
      if (Math.abs(diffX) > 40) diffX < 0 ? next() : prev();
      startX = 0;
      diffX = 0;
    });

    update();
    start();

    document.addEventListener('visibilitychange', () => {
      document.hidden ? stop() : start();
    });
  }

  document.querySelectorAll('[data-carousel]').forEach(initCarousel);
})();
</script>
@endpush

@endsection
