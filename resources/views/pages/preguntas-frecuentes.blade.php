@extends('layouts.public')

@section('title', 'Preguntas frecuentes | RUGUEX Llantas para maquinaria')
@section('meta_description', 'Llena el formulario de contacto, o a través del chat o números telefónicos y con gusto te daremos una asesoría gratuita del producto adecuado para tu maquina.')

@php
  $siteUrl   = url('/');
  $pageUrl   = url()->current();
  $imgMain   = asset('storage/originals/Llantas-para-montacargas-trelleborg-1-1.jpg');
  $heroJpg   = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');

  // FAQs (una sola fuente de verdad: úsalo para HTML y JSON-LD si luego quieres)
  $faqs = [
    [
      'q' => '¿Cómo puedo adquirir una llanta si no encuentro la medida que busco?',
      'a' => 'Llena el formulario de contacto, o a través del chat o números telefónicos y con gusto te daremos una asesoría gratuita del producto adecuado para tu máquina.',
      'open' => false,
      'tab' => '1',
      'ariaControls' => 'elementor-tab-content-1041',
      'ariaLabelledBy' => 'elementor-tab-title-1041',
    ],
    [
      'q' => '¿Dónde puedo solicitar una cotización?',
      'a' => 'Puedes llenar el formulario, utilizar el chat de nuestro sitio o comunicarte a los números de contacto y con gusto te atenderemos.',
      'open' => true,
      'tab' => '2',
      'ariaControls' => 'elementor-tab-content-1042',
      'ariaLabelledBy' => 'elementor-tab-title-1042',
    ],
    [
      'q' => '¿Qué información necesitan para cotizar correctamente?',
      'a' => 'Con estos datos te cotizamos rápido: medida de la llanta (o foto), tipo de montacargas/minicargador, tipo de piso, capacidad de carga aproximada y turnos de trabajo. Si no tienes la medida, una foto del costado y del rin nos ayuda.',
      'open' => false,
      'tab' => '3',
    ],
    [
      'q' => '¿Cuál es la diferencia entre llanta sólida, neumática y poliuretano (press-on)?',
      'a' => 'Depende de tu operación: la sólida es ideal para evitar ponchaduras y trabajo pesado; la neumática ofrece más amortiguación; y la press-on (poliuretano/“bandaje”) es común en almacén y pasillos, con buena maniobrabilidad. Te recomendamos la opción correcta según piso, carga y turnos.',
      'open' => false,
      'tab' => '4',
    ],
    [
      'q' => '¿Ofrecen instalación o montaje?',
      'a' => 'Sí, podemos apoyarte con instalación/asesoría de montaje según el tipo de llanta y tu ubicación. Indícanos ciudad y modelo de equipo para confirmarte disponibilidad y tiempos.',
      'open' => false,
      'tab' => '5',
    ],
    [
      'q' => '¿Tienen entrega inmediata o manejan stock?',
      'a' => 'Manejamos stock en varias medidas comunes y opciones bajo pedido en medidas especiales. Para confirmarte disponibilidad exacta, compártenos medida y tipo de aplicación.',
      'open' => false,
      'tab' => '6',
    ],
    [
      'q' => '¿Cómo sé si mi llanta ya requiere cambio?',
      'a' => 'Señales comunes: desgaste irregular, vibración, pérdida de tracción, grietas profundas, “planos” por frenadas, o si ya estás perdiendo altura/capacidad. Si nos mandas foto del desgaste, te recomendamos la mejor opción.',
      'open' => false,
      'tab' => '7',
    ],
    [
      'q' => '¿Pueden ayudarme si solo tengo el modelo del montacargas pero no la medida?',
      'a' => 'Sí. Con marca/modelo/serie del equipo y una foto del costado de la llanta o del rin normalmente podemos identificar la medida y proponerte alternativas equivalentes.',
      'open' => false,
      'tab' => '8',
    ],
  ];
@endphp

@section('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type":"WebSite",
      "@id":"{{ $siteUrl }}#website",
      "url":"{{ $siteUrl }}",
      "name":"RUGUEX | Llantas para maquinaria",
      "inLanguage":"es-MX",
      "potentialAction":{
        "@type":"SearchAction",
        "target":"{{ $siteUrl }}?s={search_term_string}",
        "query-input":"required name=search_term_string"
      }
    },
    {
      "@type":"Organization",
      "@id":"{{ $siteUrl }}#organization",
      "name":"Bombas Sellos y Hules Industriales S.A. de C.V.",
      "alternateName":"RUGUEX",
      "url":"{{ $siteUrl }}",
      "email":"ventas@llantasdemontacargas.com",
      "telephone":"+52-55-5752-1715",
      "areaServed":"MX"
    },
    {
      "@type":"WebPage",
      "@id":"{{ $pageUrl }}#webpage",
      "url":"{{ $pageUrl }}",
      "name":"@yield('title')",
      "description":"@yield('meta_description')",
      "inLanguage":"es-MX",
      "isPartOf":{"@id":"{{ $siteUrl }}#website"},
      "publisher":{"@id":"{{ $siteUrl }}#organization"},
      "primaryImageOfPage":{"@id":"{{ $pageUrl }}#primaryimage"},
      "mainEntity":{"@id":"{{ $pageUrl }}#faq"}
    },
    {
      "@type":"ImageObject",
      "@id":"{{ $pageUrl }}#primaryimage",
      "url":"{{ $imgMain }}",
      "caption":"Preguntas frecuentes sobre llantas para montacargas y maquinaria (RUGUEX)"
    },
    {
      "@type":"FAQPage",
      "@id":"{{ $pageUrl }}#faq",
      "url":"{{ $pageUrl }}",
      "name":"Preguntas frecuentes",
      "inLanguage":"es-MX",
      "mainEntity": [
        @foreach ($faqs as $item)
        {
          "@type":"Question",
          "name": {!! json_encode($item['q'], JSON_UNESCAPED_UNICODE) !!},
          "acceptedAnswer":{
            "@type":"Answer",
            "text": {!! json_encode($item['a'], JSON_UNESCAPED_UNICODE) !!}
          }
        }@if(!$loop->last),@endif
        @endforeach
      ]
    },
    {
      "@type":"BreadcrumbList",
      "@id":"{{ $pageUrl }}#breadcrumbs",
      "itemListElement":[
        {"@type":"ListItem","position":1,"name":"Inicio","item":"{{ $siteUrl }}"},
        {"@type":"ListItem","position":2,"name":"Preguntas frecuentes","item":"{{ $pageUrl }}"}
      ]
    }
  ]
}
</script>
@endsection

@section('content')

<div class="justify-center">
  <h1 class="text-[#e76a3e] lg:text-[35px] text-[25px] text-center font-['Roboto',sans-serif] font-bold lg:my-5">
    Preguntas frecuentes
  </h1>
</div>

<section class="relative block box-border">
  <div class="relative mx-auto flex flex-col lg:flex-row max-w-[1140px] box-border">

    <!-- Columna izquierda -->
    <div class="relative flex min-h-px lg:w-1/2 box-border">
      <div class="relative flex w-full flex-wrap content-start p-[10px] box-border">
        <div class="w-full text-center box-border">
          <div class="box-border transition-[background,border,border-radius,box-shadow,transform] duration-300">

            <x-responsive-image
              :variants="image_variants('originals/Llantas-para-montacargas-trelleborg-1-1.jpg')"
              alt="Llantas para montacargas trelleborg"
              sizes="(min-width: 1024px) 570px, 100vw"
              class="inline-block h-auto max-w-full align-middle border-0 rounded-none shadow-none"
              width="623"
              height="415"
              fetchpriority="high"
              loading="eager"
              decoding="async"
            />

            <noscript>
              <img
                src="{{ $imgMain }}"
                width="623"
                height="415"
                alt="Llantas para montacargas trelleborg"
                class="h-auto max-w-full"
              />
            </noscript>

          </div>
        </div>
      </div>
    </div>

    <!-- Columna derecha -->
    <div class="relative flex min-h-px lg:w-1/2 box-border">
      <div class="relative flex w-full flex-wrap content-start p-[10px] box-border">
        <div class="relative w-full box-border">
          <div class="box-border transition-[background,border,border-radius,box-shadow,transform] duration-300">
            <div class="text-left box-border" data-accordion="faq">

              @foreach ($faqs as $item)
                @php
                  $isOpen = !empty($item['open']);
                  $tab = $item['tab'];
                  $controls = $item['ariaControls'] ?? null;
                  $labelledby = $item['ariaLabelledBy'] ?? null;
                @endphp

                <div class="border border-[#D5D8DC] {{ $loop->first ? '' : 'border-t-0' }} box-border">
                  <div
                    data-tab="{{ $tab }}"
                    role="button"
                    @if($controls) aria-controls="{{ $controls }}" @endif
                    aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                    tabindex="{{ $isOpen ? '0' : '-1' }}"
                    aria-selected="{{ $isOpen ? 'true' : 'false' }}"
                    class="m-0 cursor-pointer p-[15px_20px] font-bold leading-[16px] outline-none box-border"
                  >
                    <span aria-hidden="true" class="float-left block w-[1.5em] text-left text-[#e76a3e] box-border">
                      <span class="{{ $isOpen ? 'hidden' : 'block' }} box-border">
                        <i class="fa-solid fa-plus leading-[16px]"></i>
                      </span>
                      <span class="{{ $isOpen ? 'block' : 'hidden' }} box-border">
                        <i class="fa-solid fa-minus leading-[16px]"></i>
                      </span>
                    </span>

                    <a
                      tabindex="0"
                      class="bg-transparent font-['Roboto',sans-serif] font-semibold text-[#e76a3e] no-underline shadow-none transition-all duration-300 ease-in-out box-border"
                    >
                      {{ $item['q'] }}
                    </a>
                  </div>

                  <div
                    data-tab="{{ $tab }}"
                    role="region"
                    @if($labelledby) aria-labelledby="{{ $labelledby }}" @endif
                    class="{{ $isOpen ? 'block' : 'hidden' }} border-t border-[#D5D8DC] p-[15px_20px] font-['Roboto',sans-serif] font-normal text-[#7A7A7A] box-border"
                    @if(!$isOpen) hidden @endif
                  >
                    <p class="mb-5 box-border">{{ $item['a'] }}</p>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Columna derecha -->

  </div>
</section>

{{-- Hero cotización PS: usa variantes con image-set --}}
<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $heroJpg }}');
    background-image: image-set(
      url('{{ $heroAvif }}') type('image/avif') 1x,
      url('{{ $heroWebp }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
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
            <script async defer charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
            <script>
              window.addEventListener('load', function () {
                // evita doble inicialización
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

        <div class="w-full"><div class="h-[104px]"></div></div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
(function () {
  'use strict';

  const root = document.querySelector('[data-accordion="faq"]');
  if (!root) return;

  const triggers = Array.from(root.querySelectorAll('[role="button"][data-tab]'));
  if (!triggers.length) return;

  const SINGLE_OPEN = true;

  const q = (sel, ctx = root) => ctx.querySelector(sel);

  function panelOf(trigger) {
    const tab = trigger.getAttribute('data-tab');
    return q('[role="region"][data-tab="' + tab + '"]');
  }

  function iconOf(trigger) {
    const wrap = trigger.querySelector('[aria-hidden="true"]');
    if (!wrap) return { plus: null, minus: null };
    const spans = wrap.querySelectorAll('span');
    return { plus: spans[0] || null, minus: spans[1] || null };
  }

  function setExpanded(trigger, expanded) {
    const panel = panelOf(trigger);
    if (!panel) return;

    trigger.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    trigger.setAttribute('aria-selected', expanded ? 'true' : 'false');
    trigger.tabIndex = expanded ? 0 : -1;

    panel.hidden = !expanded;
    panel.classList.toggle('hidden', !expanded);
    panel.classList.toggle('block', expanded);

    const { plus, minus } = iconOf(trigger);
    if (plus) { plus.classList.toggle('hidden', expanded); plus.classList.toggle('block', !expanded); }
    if (minus) { minus.classList.toggle('hidden', !expanded); minus.classList.toggle('block', expanded); }
  }

  function closeAll() {
    triggers.forEach(t => setExpanded(t, false));
  }

  function toggle(trigger) {
    const isOpen = trigger.getAttribute('aria-expanded') === 'true';
    if (isOpen) return setExpanded(trigger, false);

    if (SINGLE_OPEN) closeAll();
    setExpanded(trigger, true);
  }

  // Normaliza estado inicial (respeta el HTML inicial)
  triggers.forEach(t => setExpanded(t, t.getAttribute('aria-expanded') === 'true'));

  // Asegura al menos 1 enfocable
  if (!triggers.some(t => t.tabIndex === 0)) triggers[0].tabIndex = 0;

  triggers.forEach((trigger) => {
    trigger.addEventListener('click', () => toggle(trigger));

    trigger.addEventListener('keydown', (e) => {
      const key = e.key;

      if (key === 'Enter' || key === ' ') {
        e.preventDefault();
        toggle(trigger);
        return;
      }

      if (key === 'ArrowDown' || key === 'ArrowUp') {
        e.preventDefault();
        const i = triggers.indexOf(trigger);
        const next = key === 'ArrowDown'
          ? triggers[(i + 1) % triggers.length]
          : triggers[(i - 1 + triggers.length) % triggers.length];
        next.focus();
      }
    });
  });
})();
</script>
@endpush

@endsection
