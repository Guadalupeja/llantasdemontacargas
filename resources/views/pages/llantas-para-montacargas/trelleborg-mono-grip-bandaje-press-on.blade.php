@extends('layouts.public')

@section('title', 'Llanta sólida Cushion para Montacargas | Trelleborg Mono G')
@section('meta_description', 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más. Llantas solidas de calidad garantizada para Montacargas')

@php
  $heroOriginal = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp1024 = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroAvif960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroWebp960  = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

  $productOriginal = 'originals/Llanta-solida-con-arillo-press-on.webp';
  $productImageUrl = asset('storage/' . $productOriginal);

  $variants = image_variants($productOriginal);
  $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
  $srcsetAvif = $variants['avif'] ?? [];
  $srcsetWebp = $variants['webp'] ?? [];
  $srcsetJpg  = $variants['jpg'] ?? [];
  $fallback   = $variants['fallback']['url'] ?? $productImageUrl;

  $toSrcset = static fn(array $arr): string =>
      implode(', ', array_map(static fn($v) => ($v['url'] ?? '') . ' ' . ($v['w'] ?? '') . 'w', $arr));
@endphp

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ $heroAvif1024 }} type('image/avif'),
      {{ $heroWebp1024 }} type('image/webp'),
      {{ $heroOriginal }} type('image/jpeg')
    "
    imagesizes="100vw">

  <script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"{{ url('/') }}#website","url":"{{ url('/') }}","name":"Llantas para Montacargas, Minicargadores y Telehandlers | Trelleborg México","inLanguage":"es-MX","publisher":{"@id":"{{ url('/') }}#organization"},"potentialAction":{"@type":"SearchAction","target":"{{ url('/') }}?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"AutoPartsStore","@id":"{{ url('/') }}#organization","name":"Bombas Sellos y Hules Industriales S.A. de C.V.","alternateName":["BSH","BSH | Llantas de Montacargas"],"url":"{{ url('/') }}","logo":{"@type":"ImageObject","url":"{{ $heroOriginal }}"},"image":["{{ $heroOriginal }}"],"description":"Somos una comercializadora de equipos y refacciones especializadas al servicio de la industria en México. Distribuimos desde 2010 la gama de producto Trelleborg, incluyendo llantas premium para manejo de materiales, con stock, asistencia técnica, entrega directa en sitio y precios competitivos.","email":"ventas@llantasdemontacargas.com","telephone":"+52-55-5752-1715","address":{"@type":"PostalAddress","streetAddress":"Avenida 125 Oriente #224, Guadalupe Hidalgo","addressLocality":"Puebla","addressRegion":"PUE","postalCode":"72494","addressCountry":"MX"},"areaServed":[{"@type":"Country","name":"México"},{"@type":"City","name":"Puebla"},{"@type":"City","name":"Ciudad de México"},{"@type":"State","name":"Estado de México"},{"@type":"City","name":"Monterrey"},{"@type":"State","name":"Guanajuato"},{"@type":"State","name":"Querétaro"}],"brand":{"@type":"Brand","name":"Trelleborg"},"contactPoint":[{"@type":"ContactPoint","telephone":"+52-55-5752-1715","contactType":"sales","areaServed":"MX","availableLanguage":["es-MX"]},{"@type":"ContactPoint","telephone":"+52-83-3246-2205","contactType":"sales","areaServed":"MX","availableLanguage":["es-MX"]},{"@type":"ContactPoint","telephone":"+52-83-3239-5885","contactType":"sales","areaServed":"MX","availableLanguage":["es-MX"]},{"@type":"ContactPoint","telephone":"+52-22-2227-3866","contactType":"sales","areaServed":"MX","availableLanguage":["es-MX"]},{"@type":"ContactPoint","telephone":"+52-59-5112-4238","contactType":"sales","areaServed":"MX","availableLanguage":["es-MX"]}],"knowsAbout":["Llantas para montacargas","Bandajes press on para montacargas","Llantas sólidas cushion","Llantas sólidas con arillo","Llantas industriales Trelleborg","Manejo de materiales"]},{"@type":"WebPage","@id":"{{ url()->current() }}#webpage","url":"{{ url()->current() }}","name":"@yield('title')","description":"@yield('meta_description')","inLanguage":"es-MX","isPartOf":{"@id":"{{ url('/') }}#website"},"about":{"@id":"{{ url()->current() }}#product"},"primaryImageOfPage":{"@type":"ImageObject","url":"{{ $productImageUrl }}"},"breadcrumb":{"@id":"{{ url()->current() }}#breadcrumb"}},{"@type":"Product","@id":"{{ url()->current() }}#product","name":"Trelleborg Mono-Grip bandaje Press On","alternateName":["Trelleborg Mono G","Mono G Press On","Bandaje Press On Trelleborg"],"sku":"MONO-G-PRESS-ON","mpn":"MONO-G-PRESS-ON","category":"IndustrialTire","image":["{{ $productImageUrl }}"],"brand":{"@type":"Brand","name":"Trelleborg"},"manufacturer":{"@type":"Organization","name":"Trelleborg"},"description":"Llanta PREMIUM sólida con arillo tipo cushion para montacargas. Bandaje Press On con gran área de contacto, excelente distribución de carga, compuesto Dual de larga duración, excelente tracción, conducción y ahorro de combustible.","additionalProperty":[{"@type":"PropertyValue","name":"Tipo","value":"Llanta sólida Press On tipo cushion"},{"@type":"PropertyValue","name":"Aplicación","value":"Montacargas eléctricos y a combustión"},{"@type":"PropertyValue","name":"Configuración","value":"Sólida con arillo"},{"@type":"PropertyValue","name":"Mantenimiento","value":"Libre de mantenimiento e imponchable"},{"@type":"PropertyValue","name":"Beneficio principal","value":"25% más vida útil llanta contra llanta, garantizado por escrito"},{"@type":"PropertyValue","name":"Compuesto","value":"Compuesto Dual exclusivo de la marca"},{"@type":"PropertyValue","name":"Ventaja","value":"Mejor distribución de carga por su perfil de gran área de contacto"},{"@type":"PropertyValue","name":"Ventaja","value":"Disponible en perfil LEÓN con 25% más capacidad de carga"},{"@type":"PropertyValue","name":"Ventaja","value":"Excelente tracción, conducción y ahorro de combustible"}],"audience":{"@type":"Audience","audienceType":"Empresas industriales, almacenes, centros logísticos y operaciones de manejo de materiales"},"offers":{"@type":"Offer","url":"{{ url()->current() }}","priceCurrency":"MXN","availability":"https://schema.org/InStock","itemCondition":"https://schema.org/NewCondition","seller":{"@id":"{{ url('/') }}#organization"},"priceSpecification":{"@type":"PriceSpecification","priceCurrency":"MXN","valueAddedTaxIncluded":false},"eligibleRegion":{"@type":"Country","name":"México"}}},{"@type":"Service","@id":"{{ url()->current() }}#service","name":"Cotización y asesoría para llantas sólidas Press On para montacargas","serviceType":"Venta y asesoría de llantas industriales para montacargas","provider":{"@id":"{{ url('/') }}#organization"},"areaServed":{"@type":"Country","name":"México"},"relatedTo":{"@id":"{{ url()->current() }}#product"}},{"@type":"BreadcrumbList","@id":"{{ url()->current() }}#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Inicio","item":"{{ url('/') }}"},{"@type":"ListItem","position":2,"name":"Llantas sólidas con arillo para montacargas","item":"{{ url('/llantas-solidas-con-arillo') }}"},{"@type":"ListItem","position":3,"name":"Trelleborg Mono G","item":"{{ url()->current() }}"}]}]}</script>
@endsection

@section('content')
<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="relative mx-auto max-w-[1140px]">
    <div class="relative flex w-full min-h-px">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="mb-5 h-[68px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <h1 class="m-0 font-sans text-[22px] font-semibold text-black lg:text-[32px] lg:leading-[32px]">
            Llantas Sólidas Press On para Montacargas.
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 text-[#7a7a7a]">
            Llantas Sólidas con anillo tipo cushion, libres de mantenimiento, imponchables y con fácil intercambiabilidad.
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
          @if(!empty($srcsetAvif))
            <source type="image/avif" srcset="{{ $toSrcset($srcsetAvif) }}" sizes="{{ $sizes }}">
          @endif
          @if(!empty($srcsetWebp))
            <source type="image/webp" srcset="{{ $toSrcset($srcsetWebp) }}" sizes="{{ $sizes }}">
          @endif
          @if(!empty($srcsetJpg))
            <source type="image/jpeg" srcset="{{ $toSrcset($srcsetJpg) }}" sizes="{{ $sizes }}">
          @endif

          <img
            fetchpriority="high"
            decoding="async"
            loading="eager"
            width="594"
            height="722"
            src="{{ $fallback }}"
            alt="Trelleborg PRESS ON"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[33px] leading-[33px] font-semibold text-black lg:text-[43px] lg:leading-[43px]">
        Trelleborg Mono-Grip bandaje Press On
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
          Llanta PREMIUM sólida con arillo, con la mejor distribución de carga gracias a su perfil único de gran área de contacto.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Compuesto Dual, desarrollo exclusivo de la marca con vida útil extendida para Montacargas eléctricos y a combustión.</li>
          <li>Disponible el perfil LEÓN con 25% mas capacidad de carga.</li>
          <li>Excelente tracción, conducción y ahorro de combustible.</li>
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
    background-image:url('{{ $heroOriginal }}');
    background-image:image-set(
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroOriginal }}') type('image/jpeg') 1x
    );
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="relative flex min-h-px w-full box-border">
      <div class="relative flex w-full flex-wrap content-start p-2.5 box-border">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 mb-5 w-full text-center">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[42px] text-white lg:text-[42px]">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 mb-5 w-full">
          <div
            id="hs-form-mono-g"
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
@endsection

@push('styles')
<style>
  @media (max-width: 768px) {
    #contacto {
      background-image: url('{{ $heroOriginal }}');
      background-image: image-set(
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroOriginal }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endpush

@push('scripts')
<script>
  (() => {
    const formRoot = document.getElementById('hs-form-mono-g');
    if (!formRoot) return;

    let loaded = false;
    let scriptLoading = false;

    const loadHubspotForm = () => {
      if (loaded || scriptLoading) return;
      scriptLoading = true;

      const onReady = () => {
        if (loaded) return;
        if (window.hbspt && window.hbspt.forms && window.hbspt.forms.create) {
          window.hbspt.forms.create({
            portalId: formRoot.dataset.portalId,
            formId: formRoot.dataset.formId,
            target: '#hs-form-mono-g'
          });
          loaded = true;
        }
      };

      if (window.hbspt && window.hbspt.forms && window.hbspt.forms.create) {
        onReady();
        return;
      }

      const s = document.createElement('script');
      s.src = 'https://js.hsforms.net/forms/shell.js';
      s.async = true;
      s.defer = true;
      s.charset = 'utf-8';
      s.onload = onReady;
      document.head.appendChild(s);
    };

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            loadHubspotForm();
            io.disconnect();
          }
        });
      }, { rootMargin: '300px 0px' });

      io.observe(formRoot);
    } else {
      window.addEventListener('load', loadHubspotForm, { once: true });
    }
  })();
</script>
@endpush