@extends('layouts.public')

@section('title', 'Llantas sólidas con arillo para montacargas | Trelleborg MX')
@section('meta_description', 'Cotice bandajes para montacargas con 25% mas vida garantizado. Llantas sólidas con arillo intercambiables y originales para entrega inmediata precios mayorista.')

@section('structured-data')
@php
  // URLs (evita repetir helpers y reduce riesgo de inconsistencias)
  $homeUrl = url('/');
  $currentUrl = url()->current();

  // Imágenes hero (una sola fuente de verdad)
  $heroJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');

  // Lista de cards (evita repetición y corrige errores HTML sin cambiar diseño/contenido)
  $cards = [
    [
      'url' => url('/llantas-para-montacargas/trelleborg-press-on'),
      'title' => 'Trelleborg Press On',
      'img' => 'originals/Una-llanta-tipo-cushion-llantas-treleborg.jpg',
      'alt' => 'Llantas Trelleborg Press on',
    ],
    [
      'url' => url('/llantas-para-montacargas/trelleborg-ps1000'),
      'title' => 'Trelleborg PS1000',
      'img' => 'originals/MOSAICO-PS-1000.jpg',
      'alt' => 'Llantas Trelleborg PS1000',
    ],
    [
      'url' => url('/llantas-para-montacargas/trelleborg-itl-maxmatic-press-on'),
      'title' => 'Trelleborg ITL Maxmatic Press On',
      'img' => 'originals/Llantas-solidas-con-arillo-para-Montacargas.jpg',
      'alt' => 'Llantas Trelleborg ITL Maxmatic Press On',
    ],
    [
      'url' => url('/llantas-para-montacargas/trelleborg-mono-grip-bandaje-press-on'),
      'title' => 'Trelleborg Mono-Grip bandaje Press On',
      'img' => 'originals/Llanta-solida-con-arillo.jpg',
      'alt' => 'Llantas Trelleborg Mono-Grip bandaje Press On',
    ],
    [
      'url' => url('/llantas-para-montacargas/trelleborg-itl-press-on'),
      'title' => 'Trelleborg ITL Press On',
      // Nota: en tu código original el href tenía slash final en la imagen, pero el enlace de texto era sin slash.
      // Unificamos a la versión sin slash para consistencia.
      'img' => 'originals/Llanta-PREMIUM-solida-con-anillo-para-montacargas-de-uso-rudo.jpg',
      'alt' => 'Llantas Trelleborg ITL Press On',
    ],
    [
      'url' => url('/llantas-para-montacargas/trelleborg-ps800-con-arillo'),
      'title' => 'Trelleborg PS800',
      'img' => 'originals/PS800.jpg',
      'alt' => 'Llantas Trelleborg PS800',
    ],
  ];
@endphp

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "{{ $homeUrl }}#website",
      "url": "{{ $homeUrl }}",
      "name": "{{ config('app.name', 'RUGUEX') }}",
      "inLanguage": "es-MX"
    },
    {
      "@type": "WebPage",
      "@id": "{{ $currentUrl }}#webpage",
      "url": "{{ $currentUrl }}",
      "name": "@yield('title')",
      "description": "@yield('meta_description')",
      "inLanguage": "es-MX",
      "isPartOf": { "@id": "{{ $homeUrl }}#website" },
      "publisher": { "@id": "{{ $homeUrl }}#organization" },
      "primaryImageOfPage": {
        "@type": "ImageObject",
        "@id": "{{ $currentUrl }}#primaryimage",
        "url": "{{ $heroJpg }}",
        "contentUrl": "{{ $heroJpg }}"
      },
      "breadcrumb": { "@id": "{{ $currentUrl }}#breadcrumb" },
      "about": [
        { "@type": "Thing", "name": "Llantas sólidas con arillo" },
        { "@type": "Thing", "name": "Bandajes para montacargas" },
        { "@type": "Thing", "name": "Trelleborg" }
      ],
      "mainEntity": { "@id": "{{ $currentUrl }}#itemlist" }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "{{ $currentUrl }}#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Inicio", "item": "{{ $homeUrl }}" },
        { "@type": "ListItem", "position": 2, "name": "Llantas para montacargas", "item": "{{ url('/llantas-para-montacargas') }}" },
        { "@type": "ListItem", "position": 3, "name": "Llantas sólidas con arillo", "item": "{{ $currentUrl }}" }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "{{ $currentUrl }}#itemlist",
      "name": "Modelos / líneas de llantas sólidas con arillo para montacargas",
      "itemListOrder": "https://schema.org/ItemListOrderAscending",
      "numberOfItems": {{ count($cards) }},
      "itemListElement": [
        @foreach($cards as $i => $c)
        {
          "@type": "ListItem",
          "position": {{ $i + 1 }},
          "url": "{{ $c['url'] }}",
          "name": "{{ $c['title'] }}"
        }@if(!$loop->last),@endif
        @endforeach
      ]
    }
  ]
}
</script>
@endsection


@section('content')
<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="flex w-full">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <!-- Spacer 50 -->
        <div class="w-full mb-5">
          <div class="lg:h-[50px] h-[25px]"></div>
        </div>

        <!-- Heading -->
        <div class="w-full text-center">
          <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[25px] leading-[25px] lg:text-[35px] lg:leading-[35px] font-semibold text-[#e76a3e]">
            Llantas Sólidas con arillo
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="flex w-full">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <!-- Spacer 50 -->
        <div class="w-full">
          <div class="lg:h-[50px] h-[25px]"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="relative w-full">
  <div class="relative mx-auto flex max-w-[1140px] flex-col gap-3 px-2.5 md:flex-row md:gap-0">
    <!-- Col 1 (right on desktop) -->
    <div class="flex justify-center w-full md:w-1/3 md:justify-end">
      <a
        href="{{ url('/llantas-para-montacargas') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        MONTACARGAS
      </a>
    </div>

    <!-- Col 2 (center) -->
    <div class="flex justify-center w-full md:w-1/3 md:justify-center">
      <a
        href="{{ url('/llantas-para-minicargadores') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        MINICARGADORES
      </a>
    </div>

    <!-- Col 3 (left on desktop) -->
    <div class="flex w-full justify-center md:w-1/3 md:justify-start">
      <a
        href="{{ url('/llantas-para-cargadores') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        CARGADOR FRONTAL
      </a>
    </div>
  </div>
</section>

<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="w-full p-[10px] text-center">
      <!-- Spacer 80 -->
      <div class="mb-5 lg:h-[80px] h-[40px]"></div>

      <!-- Heading -->
      <h1 class="m-0 mb-5 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
        Llantas sólidas con arillo para Montacargas
      </h1>

      <!-- Spacer 23 -->
      <div class="mb-5 h-[23px]"></div>

      <!-- Text -->
      <p class="m-0 mb-5 font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
        Bandajes libres de mantenimiento, de materiales Premium, imponchables y de fácil intercambiabilidad.
      </p>

      <!-- Spacer 80 -->
      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>

{{-- Cards: se genera desde $cards para evitar repetición y mantener consistencia --}}
@foreach(array_chunk($cards, 3) as $row)
<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    @foreach($row as $card)
      @php $variants = image_variants($card['img']); @endphp

      <div class="flex w-full md:w-1/3">
        <div class="flex w-full flex-wrap content-start p-[10px]">

          <div class="w-full text-center mb-5">
            <a href="{{ $card['url'] }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  <x-responsive-image
                    :variants="$variants"
                    alt="{{ $card['alt'] }}"
                    sizes="(max-width: 767px) 100vw, 357px"
                    class="w-full h-full object-cover align-middle border-0"
                    width="357" height="357"
                    loading="lazy"
                    decoding="async"
                  />
                </div>
              </figure>
            </a>
          </div>

          <div class="w-full mb-5">
            <div class="h-[20px]"></div>
          </div>

          <div class="w-full text-center justify-center">
            <div class="mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] min-h-[82px] items-center justify-center">
              <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white">
                <a href="{{ $card['url'] }}" class="text-white no-underline">
                  {{ $card['title'] }}
                </a>
              </h2>
            </div>
          </div>

        </div>
      </div>
    @endforeach
  </div>
</section>
@endforeach


{{-- ========= Hero cotización ========= --}}
<section
  id="T7"
  class="relative bg-black bg-no-repeat bg-center bg-cover"
  style="
    background-image: url('{{ $heroJpg }}');
    background-image: image-set(
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
    );
  "
>
  {{-- Overlay sin afectar layout --}}
  <div class="absolute inset-0 bg-black/35 pointer-events-none"></div>

  <div class="relative mx-auto max-w-[1140px] px-[10px]">
    <div class="flex flex-wrap content-start p-2.5">

      {{-- Spacer superior --}}
      <div class="w-full">
        <div class="h-[54px] lg:h-[104px]"></div>
      </div>

      {{-- Título --}}
      <div class="w-full text-center mb-5">
        <div class="m-0 p-0 font-['Roboto',sans-serif] text-white text-[22px] lg:text-[42px] leading-[42px] font-semibold">
          COTIZA EN LINEA O SOLICITA UNA ASESORIA:
        </div>
      </div>

      {{-- Formulario HubSpot --}}
      <div class="w-full mb-5">
        <div data-hs-forms-root="true" id="hsFormContainer"></div>

        @push('scripts')
          <script async defer charset="utf-8" src="https://js.hsforms.net/forms/shell.js"></script>
          <script>
            (function () {
              function mountHsForm() {
                if (window.__hsFormMountedPoly) return;
                window.__hsFormMountedPoly = true;

                if (window.hbspt && window.hbspt.forms && window.hbspt.forms.create) {
                  window.hbspt.forms.create({
                    portalId: "7547674",
                    formId: "26f426a7-e620-42df-98a3-43e10a899b6c",
                    target: "#hsFormContainer"
                  });
                }
              }

              if (document.readyState === 'complete') {
                mountHsForm();
              } else {
                window.addEventListener('load', mountHsForm, { once: true });
              }
            })();
          </script>
        @endpush

        <noscript>
          <p class="text-white">Activa JavaScript para ver el formulario de cotización.</p>
        </noscript>
      </div>

      {{-- Spacer inferior --}}
      <div class="w-full">
        <div class="h-[104px]"></div>
      </div>

    </div>
  </div>
</section>

@endsection
