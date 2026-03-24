@extends('layouts.public')

@section('title', 'Llantas PREMIUM de poliuretano para montacargas | RUGUEX')
@section('meta_description', 'Cotiza aqui las mejores Ruedas de poliuretano ' . now()->year . ' que soportan grandes cargas, en almacenes, pasillos, congeladores y suelos en buen estado marca top europea.')

@section('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "{{ url('/') }}#website",
      "url": "{{ url('/') }}/",
      "name": "RUGUEX",
      "inLanguage": "es-MX"
    },
    {
      "@type": "Organization",
      "@id": "{{ url('/') }}#organization",
      "name": "RUGUEX",
      "url": "{{ url('/') }}/",
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
      "primaryImageOfPage": { "@id": "{{ url()->current() }}#primaryimage" },
      "about": [
        { "@type": "Thing", "name": "Llantas de poliuretano para montacargas" },
        { "@type": "Thing", "name": "Ruedas para grandes cargas" }
      ],
      "mainEntity": [
        { "@id": "{{ url()->current() }}#itemlist" },
        { "@id": "{{ url()->current() }}#service" }
      ]
    },
    {
      "@type": "ItemList",
      "@id": "{{ url()->current() }}#itemlist",
      "name": "Modelos de llantas de poliuretano para montacargas",
      "itemListOrder": "https://schema.org/ItemListUnordered",
      "numberOfItems": 2,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "url": "{{ url('/llantas-para-montacargas/llanta-de-poliuretano-monothane') }}",
          "name": "Llanta de Poliuretano Monothane®"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "url": "{{ url('/llantas-para-montacargas/llanta-de-poliuretano-permathane') }}",
          "name": "Llanta de Poliuretano Permathane®"
        }
      ]
    },
    {
      "@type": "Service",
      "@id": "{{ url()->current() }}#service",
      "name": "Cotización y asesoría de llantas de poliuretano para montacargas",
      "serviceType": "Cotización / Asesoría",
      "provider": { "@id": "{{ url('/') }}#organization" },
      "areaServed": { "@type": "Country", "name": "México" },
      "availableChannel": [
        {
          "@type": "ServiceChannel",
          "serviceUrl": "{{ url()->current() }}#T7",
          "availableLanguage": ["es-MX"]
        },
        {
          "@type": "ServiceChannel",
          "serviceUrl": "https://wa.me/525951124238",
          "availableLanguage": ["es-MX"]
        }
      ]
    }
  ]
}
</script>
@endsection

@section('content')

{{-- ========= Intro ========= --}}
<section class="relative">
  <div class="mx-auto max-w-[1140px] px-[10px]">
    <div class="flex flex-wrap content-start">

      {{-- Spacer 80 (responsive) --}}
      <div class="w-full mb-5">
        <div class="h-[40px] lg:h-[80px]"></div>
      </div>

      {{-- Heading --}}
      <div class="w-full text-center mb-5">
        <h1 class="m-0 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
          Llantas de Poliuretano para Montacargas.
        </h1>
      </div>

      {{-- Spacer 23 --}}
      <div class="w-full mb-5">
        <div class="h-[23px]"></div>
      </div>

      {{-- Text --}}
      <div class="w-full mb-5 text-center font-['Roboto',sans-serif] font-normal text-[#7a7a7a] text-[14px] lg:text-[14px]">
        <p class="m-0 mb-5">
          Ruedas que soportan grandes cargas, en almacenes, pasillos, congeladores y suelos en buen estado.
        </p>
      </div>

      {{-- Spacer 80 (responsive) --}}
      <div class="w-full">
        <div class="h-[40px] lg:h-[80px]"></div>
      </div>

    </div>
  </div>
</section>


{{-- ========= Cards ========= --}}
<section class="relative">
  <div class="mx-auto max-w-[1140px] px-[10px]">
    <div class="flex flex-col md:flex-row">

      {{-- Card 1 --}}
      <article class="w-full md:w-1/2">
        <div class="flex flex-wrap content-start p-[10px]">
          <div class="w-full text-center mb-5">
            <a href="{{ url('/llantas-para-montacargas/llanta-de-poliuretano-monothane') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-de-poliuretano-de-alta-calidad-con-anillo-metalico.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas de poliuretano Monothane"
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

          {{-- Spacer 20 --}}
          <div class="w-full mb-5">
            <div class="h-[20px]"></div>
          </div>

          <div class="w-full text-center">
            <div class="bg-[#00063a] p-[15px]">
              <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[16px] leading-[16px] lg:text-[26px] lg:leading-[26px] font-semibold text-white">
                <a href="{{ url('/llantas-para-montacargas/llanta-de-poliuretano-monothane') }}" class="text-white no-underline">
                  Llanta de Poliuretano Monothane®
                </a>
              </h2>
            </div>
          </div>
        </div>
      </article>

      {{-- Card 2 --}}
      <article class="w-full md:w-1/2">
        <div class="flex flex-wrap content-start p-[10px]">
          <div class="w-full text-center mb-5">
            <a href="{{ url('/llantas-para-montacargas/llanta-de-poliuretano-permathane') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v2 = image_variants('originals/Llanta-ultra-PREMIUM-para-carga-adicional-y-resistencia.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v2"
                    alt="Llantas de poliuretano Permathane"
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

          {{-- Spacer 20 --}}
          <div class="w-full mb-5">
            <div class="h-[20px]"></div>
          </div>

          <div class="w-full text-center">
            <div class="bg-[#00063a] p-[15px]">
              <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[16px] leading-[16px] lg:text-[26px] lg:leading-[26px] font-semibold text-white">
                <a href="{{ url('/llantas-para-montacargas/llanta-de-poliuretano-permathane') }}" class="text-white no-underline">
                  Llanta de Poliuretano Permathane®
                </a>
              </h2>
            </div>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>


{{-- ========= Hero cotización ========= --}}
<section
  id="T7"
  class="relative bg-black bg-no-repeat bg-center bg-cover"
  style="
    background-image: url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}');
    background-image: image-set(
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }}') type('image/avif') 1x,
      url('{{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }}') type('image/webp') 1x,
      url('{{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }}') type('image/jpeg') 1x
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

      {{-- Formulario HubSpot (mejor práctica: cargar shell async/defer y crear al load) --}}
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

      {{-- Spacer inferior --}}
      <div class="w-full">
        <div class="h-[104px]"></div>
      </div>

    </div>
  </div>
</section>

{{-- Ajuste responsive de background SIN <style> global (mejor con media query puntual) --}}
@push('scripts')
<style>
  @media (max-width: 768px) {
    #T7{
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

@endsection
