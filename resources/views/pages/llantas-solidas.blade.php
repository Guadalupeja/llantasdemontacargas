@extends('layouts.public')

@section('title', 'Llantas sólidas para montacargas y minicargadores Trelleborg')
@section('meta_description', 'Cotiza aquí llantas sólidas para montacargas, minicargadores,cargadores y telehandlers Envío GRATIS en la República mexicana, entrega inmediata precios mayoreo.')

@section('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "{{ url('/') }}#organization",
      "name": "{{ config('app.name', 'RUGUEX') }}",
      "url": "{{ url('/') }}",
      "logo": {
        "@type": "ImageObject",
        "@id": "{{ url('/') }}#logo",
        "url": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}",
        "contentUrl": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
      },
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "contactType": "Ventas / Cotizaciones",
          "availableLanguage": ["es", "es-MX"],
          "url": "https://wa.me/525951124238"
        }
      ],
      "areaServed": "MX"
    },
    {
      "@type": "WebSite",
      "@id": "{{ url('/') }}#website",
      "url": "{{ url('/') }}",
      "name": "{{ config('app.name', 'RUGUEX') }}",
      "inLanguage": "es-MX",
      "publisher": { "@id": "{{ url('/') }}#organization" }
    },
    {
      "@type": "ImageObject",
      "@id": "{{ url()->current() }}#primaryimage",
      "url": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}",
      "contentUrl": "{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}"
    },
    {
      "@type": ["WebPage", "CollectionPage"],
      "@id": "{{ url()->current() }}#webpage",
      "url": "{{ url()->current() }}",
      "name": "@yield('title')",
      "description": "@yield('meta_description')",
      "inLanguage": "es-MX",
      "isPartOf": { "@id": "{{ url('/') }}#website" },
      "publisher": { "@id": "{{ url('/') }}#organization" },
      "primaryImageOfPage": { "@id": "{{ url()->current() }}#primaryimage" },
      "breadcrumb": { "@id": "{{ url()->current() }}#breadcrumb" },
      "keywords": [
        "llantas sólidas",
        "bandajes para montacargas",
        "llantas para minicargadores",
        "llantas para manipulador telescópico",
        "llantas trelleborg",
        "imponchables",
        "llantas uso rudo"
      ],
      "about": [
        { "@type": "Thing", "name": "Llantas sólidas para montacargas" },
        { "@type": "Thing", "name": "Llantas sólidas para minicargadores" },
        { "@type": "Thing", "name": "Llantas sólidas para manipuladores telescópicos" },
        { "@type": "Thing", "name": "Trelleborg" }
      ],
      "mainEntity": [
        { "@id": "{{ url()->current() }}#itemlist" },
        { "@id": "{{ url()->current() }}#service" }
      ],
      "hasPart": [
        { "@id": "{{ url()->current() }}#montacargas" },
        { "@id": "{{ url()->current() }}#minicargadores" },
        { "@id": "{{ url()->current() }}#cargadorfrontal" }
      ]
    },
    {
      "@type": "BreadcrumbList",
      "@id": "{{ url()->current() }}#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Inicio", "item": "{{ url('/') }}" },
        { "@type": "ListItem", "position": 2, "name": "Llantas", "item": "{{ url()->current() }}" }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "{{ url()->current() }}#itemlist",
      "name": "Modelos / líneas de llantas sólidas",
      "itemListOrder": "https://schema.org/ItemListUnordered",
      "numberOfItems": 10,
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "url": "{{ url('/llantas-para-montacargas/trelleborg-elite-xp') }}", "name": "Trelleborg XP1000" },
        { "@type": "ListItem", "position": 2, "url": "{{ url('/llantas-para-montacargas/trelleborg-xp800') }}", "name": "Trelleborg XP800" },
        { "@type": "ListItem", "position": 3, "url": "{{ url('/llantas-para-montacargas/trelleborg-master-solid') }}", "name": "Trelleborg Master Solid" },
        { "@type": "ListItem", "position": 4, "url": "{{ url('/llantas-para-montacargas/trelleborg-pro-hd') }}", "name": "Trelleborg PRO HD" },
        { "@type": "ListItem", "position": 5, "url": "{{ url('/llantas-para-montacargas/trelleborg-m2') }}", "name": "Trelleborg M2" },
        { "@type": "ListItem", "position": 6, "url": "{{ url('/llantas-para-montacargas/trelleborg-ecosolid') }}", "name": "Trelleborg ECOSOLID" },
        { "@type": "ListItem", "position": 7, "url": "{{ url('/llantas-para-minicargadores/brawler-hd-solidflex') }}", "name": "Brawler HD Solidflex" },
        { "@type": "ListItem", "position": 8, "url": "{{ url('/llantas-para-minicargadores/brawler-hps-solidflex-traction-smooth') }}", "name": "Brawler® HPS Solidflex Traction/Smooth" },
        { "@type": "ListItem", "position": 9, "url": "{{ url('/llantas-para-minicargadores/sks-900-traction-smooth') }}", "name": "SKS 900 Traction/Smooth" },
        { "@type": "ListItem", "position": 10, "url": "{{ url('/llantas-para-manipulador-telescopico/trelleborg-brawler-hps') }}", "name": "Brawler HD (manipulador telescópico)" }
      ]
    },
    {
      "@type": "Service",
      "@id": "{{ url()->current() }}#service",
      "name": "Cotización y asesoría de llantas sólidas",
      "serviceType": "Cotización / Asesoría",
      "provider": { "@id": "{{ url('/') }}#organization" },
      "areaServed": { "@type": "Country", "name": "México" },
      "availableChannel": [
        { "@type": "ServiceChannel", "serviceUrl": "{{ url()->current() }}#T7", "availableLanguage": ["es", "es-MX"] },
        { "@type": "ServiceChannel", "serviceUrl": "https://wa.me/525951124238", "availableLanguage": ["es", "es-MX"] }
      ]
    }
  ]
}
</script>
@endsection

@php
  /**
   * Optimización:
   * - Definimos arrays de tarjetas para evitar repetición (misma salida HTML).
   * - Los "spacers" se mantienen iguales (mismas alturas).
   * - Mantiene exactamente el mismo layout y textos.
   */

  $containerClass = 'relative mx-auto flex max-w-[1140px]';
  $pad10 = 'p-[10px]';
  $roboto = "font-['Roboto',sans-serif]";
  $titleOrange = 'text-[#e76a3e] font-semibold';
  $textGray = 'text-[#7a7a7a] font-normal';
  $cardTitleWrap = 'mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] items-center justify-center';
  $cardTitleH2 = "m-0 p-0 {$roboto} text-[26px] leading-[26px] font-semibold text-white";
  $btnClass = "inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 {$roboto} text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300";

  $cardsMontacargas = [
    [
      'href' => '/llantas-para-montacargas/trelleborg-elite-xp',
      'img'  => 'originals/MOSAICO-XP1000.png',
      'alt'  => 'Llantas Trelleborg XP1000',
      'title'=> 'Trelleborg XP1000',
      'minH' => 'min-h-[50px]',
    ],
    [
      'href' => '/llantas-para-montacargas/trelleborg-xp800',
      'img'  => 'originals/MOSAICO-XP800.png',
      'alt'  => 'Llantas Trelleborg XP800',
      'title'=> 'Trelleborg XP800',
      'minH' => 'min-h-[50px]',
    ],
    [
      'href' => '/llantas-para-montacargas/trelleborg-master-solid',
      'img'  => 'originals/master-solid.png',
      'alt'  => 'Llantas Trelleborg Master Solid',
      'title'=> 'Trelleborg Master Solid',
      'minH' => 'min-h-[50px]',
    ],
    [
      'href' => '/llantas-para-montacargas/trelleborg-pro-hd',
      'img'  => 'originals/Trelleborg-Pro-HD.png',
      'alt'  => 'Llantas Trelleborg PRO HD',
      'title'=> 'Trelleborg PRO HD',
      'minH' => 'min-h-[50px]',
    ],
    [
      'href' => '/llantas-para-montacargas/trelleborg-m2',
      'img'  => 'originals/M2.png',
      'alt'  => 'Llantas Trelleborg M2',
      'title'=> 'Trelleborg M2',
      'minH' => 'min-h-[50px]',
    ],
    [
      'href' => '/llantas-para-montacargas/trelleborg-ecosolid',
      'img'  => 'originals/llanta-solida-para-montacargas.jpg',
      'alt'  => 'Llantas Trelleborg ECOSOLID',
      'title'=> 'Trelleborg ECOSOLID',
      'minH' => 'min-h-[50px]',
    ],
  ];



  $heroImgJpg = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroImgAvif = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroImgWebp = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
@endphp

@section('content')
<section class="relative">
  <div class="{{ $containerClass }}">
    <div class="flex w-full">
      <div class="flex w-full flex-wrap content-start {{ $pad10 }}">
        <div class="w-full mb-5">
          <div class="lg:h-[50px] h-[25px]"></div>
        </div>

        <div class="w-full text-center">
          <h2 class="m-0 p-0 {{ $roboto }} text-[25px] leading-[25px] lg:text-[35px] lg:leading-[35px] {{ $titleOrange }}">
            Llantas Sólidas
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="relative">
  <div class="{{ $containerClass }}">
    <div class="flex w-full">
      <div class="flex w-full flex-wrap content-start {{ $pad10 }}">
        <div class="w-full">
          <div class="lg:h-[50px] h-[25px]"></div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="relative" id="montacargas">
  <div class="{{ $containerClass }}">
    <div class="w-full {{ $pad10 }} text-center">
  

      <h1 class="m-0 mb-5 p-0 {{ $roboto }} text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] {{ $titleOrange }}">
        Llantas sólidas para Montacargas
      </h1>

      <div class="mb-5 h-[23px]"></div>

      <p class="m-0 mb-5 {{ $roboto }} {{ $textGray }}">
        Llantas libres de mantenimiento, imponchables y óptimas para cualquier superficie y carga.
      </p>

      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>

{{-- Grid Montacargas (2 filas, 3 columnas en desktop) --}}
@foreach (array_chunk($cardsMontacargas, 3) as $row)
<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    @foreach ($row as $card)
      <div class="flex w-full md:w-1/3">
        <div class="flex w-full flex-wrap content-start {{ $pad10 }}">
          <div class="w-full text-center mb-5">
            <a href="{{ url($card['href']) }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants($card['img']); @endphp
                  <x-responsive-image
                    :variants="$v1"
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
            <div class="{{ $cardTitleWrap }} {{ $card['minH'] }}">
              <h2 class="{{ $cardTitleH2 }}">
                <a href="{{ url($card['href']) }}" class="text-white no-underline">
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
    background-image: url('{{ $heroImgJpg }}');
    background-image: image-set(
      url('{{ $heroImgAvif }}') type('image/avif') 1x,
      url('{{ $heroImgWebp }}') type('image/webp') 1x,
      url('{{ $heroImgJpg }}') type('image/jpeg') 1x
    );
  "
>
  <div class="absolute inset-0 bg-black/35 pointer-events-none"></div>

  <div class="relative mx-auto max-w-[1140px] px-[10px]">
    <div class="flex flex-wrap content-start p-2.5">

      <div class="w-full">
        <div class="h-[54px] lg:h-[104px]"></div>
      </div>

      <div class="w-full text-center mb-5">
        <div class="m-0 p-0 {{ $roboto }} text-white text-[22px] lg:text-[42px] leading-[42px] font-semibold">
          COTIZA EN LINEA O SOLICITA UNA ASESORIA:
        </div>
      </div>

      <div class="w-full mb-5">
        <div data-hs-forms-root="true" id="hsFormContainer"></div>

        @push('scripts')
          <script async defer charset="utf-8" src="https://js.hsforms.net/forms/shell.js"></script>
          <script>
            window.addEventListener('load', function () {
              if (window.__hsFormMountedPoly) return;
              window.__hsFormMountedPoly = true;

              if (window.hbspt && hbspt.forms && hbspt.forms.create) {
                hbspt.forms.create({
                  portalId: "7547674",
                  formId: "26f426a7-e620-42df-98a3-43e10a899b6c",
                  target: "#hsFormContainer"
                });
              }
            });
          </script>
        @endpush

        <noscript>
          <p class="text-white">Activa JavaScript para ver el formulario de cotización.</p>
        </noscript>
      </div>

      <div class="w-full">
        <div class="h-[104px]"></div>
      </div>

    </div>
  </div>
</section>
@endsection
