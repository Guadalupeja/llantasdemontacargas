@extends('layouts.app')

@section('title', 'Llantas sólidas con aro para Montacargas | Trelleborg PS800')
@section('meta_description', 'Precios Mayorista 2026, Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más. Llantas Cushion de calidad garantizada para Montacargas.')

{{-- Todo esto debe renderizar en <head> --}}
@section('structured-data')
  {{-- DNS hints y preconnect para HubSpot --}}
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload del hero usando image-set (los navegadores que no soporten lo ignoran sin romper diseño) --}}
  <link
    rel="preload"
    as="image"
    imagesrcset="
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif') }} type('image/avif'),
      {{ asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp') }} type('image/webp'),
      {{ asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg') }} type('image/jpeg')
    "
    imagesizes="100vw">

  {{-- JSON-LD consolidado en un solo @graph para parseo más eficiente --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Llantas para Montacargas, Minicargadores y Telehandlers | Trelleborg México",
        "inLanguage": "es-MX",
        "potentialAction": {
          "@type": "SearchAction",
          "target": "{{ url('/') }}?s={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "AutoPartsStore",
        "@id": "{{ url('/') }}#organization",
        "name": "Bombas Sellos y Hules Industriales S.A. de C.V.",
        "alternateName": "BSH | Llantas de Montacargas",
        "url": "{{ url('/') }}",
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
        "@id": "{{ url()->current() }}#webpage",
        "url": "{{ url()->current() }}",
        "name": "@yield('title')",
        "inLanguage": "es-MX",
        "isPartOf": {"@id": "{{ url('/') }}#website"},
        "about": {"@id": "{{ url()->current() }}#product"}
      },
      {
        "@type": "Product",
        "@id": "{{ url()->current() }}#product",
        "name": "Trelleborg PS800 – Llantas sólidas Press-On para Montacargas",
        "sku": "PS800",
        "category": "IndustrialTire",
        "brand": {"@type":"Brand","name":"Trelleborg"},
        "image": ["https://llantasdemontacargas.com/wp-content/uploads/2023/11/PS800-descripcion-y-tienda.png"],
        "description": "Llantas sólidas con anillo tipo cushion para montacargas. 25% más vida útil garantizada por escrito. Amplio stock, entrega inmediata y crédito.",
        "additionalProperty": [
          {"@type":"PropertyValue","name":"Tipo","value":"Press-On (bandaje)"},
          {"@type":"PropertyValue","name":"Aplicación","value":"Montacargas uso medio/ligero en almacén"},
          {"@type":"PropertyValue","name":"Compuesto","value":"Disponible en compuesto no manchante"},
          {"@type":"PropertyValue","name":"Garantía","value":"25% más vida útil llanta vs llanta"}
        ],
        "offers": {
          "@type":"AggregateOffer",
          "availability":"https://schema.org/InStock",
          "priceCurrency":"MXN",
          "url":"{{ url()->current() }}",
          "offerCount":"1",
          "seller":{"@id":"{{ url('/') }}#organization"}
        }
      },
      {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {"@type":"ListItem","position":1,"name":"Inicio","item":"{{ url('/') }}"},
          {"@type":"ListItem","position":2,"name":"@yield('title')","item":"{{ url()->current() }}"}
        ]
      }
    ]
  }
  </script>
@endsection


@section('content')
<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="mx-auto max-w-[1140px] relative">
    <div class="w-full relative min-h-px flex">
      <div class="w-full p-[10px] flex flex-wrap content-start">
        <div class="w-full h-[68px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <h1 class="m-0 font-sans font-semibold text-[32px] leading-[32px] text-black">
            Llantas Sólidas Press On para Montacargas.
          </h1>
        </div>

        <div class="w-full h-[26px] mb-5" aria-hidden="true"></div>

        <div class="w-full text-center mb-5">
          <p class="m-0 text-[#7a7a7a]">
            Llantas Sólidas con anillo tipo cushion, libres de mantenimiento, imponchables y con fácil intercambiabilidad.
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
      @php
        // Original en: storage/app/public/originals/PS800-descripcion-y-tienda.png
        $variants = image_variants('originals/PS800-descripcion-y-tienda.png');
        $sizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';
        $srcsetAvif = $variants['avif'] ?? null;
        $srcsetWebp = $variants['webp'] ?? null;
        $srcsetJpg  = $variants['jpg']  ?? null;
        $fallback   = $variants['fallback']['url'] ?? '';
        $toSrcset = function($arr){ return implode(', ', array_map(fn($v) => $v['url'].' '.$v['w'].'w', $arr)); };
      @endphp

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
            width="594" height="722"
            src="{{ $fallback }}"
            alt="Trelleborg PS800 — Llantas sólidas Press-On para montacargas"
            class="inline-block h-auto max-w-full align-middle border-0"
          />
        </picture>
      </figure>
    </div>

    {{-- Columna contenido (≈67.292%) --}}
    <div class="w-full md:w-[67.292%] p-[10px]">
      <h2 class="m-0 font-sans text-[43px] leading-[43px] font-semibold text-black">
        Trelleborg PS800
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

      <div class="text-[#7a7a7a]">
        <p class="mb-5 mt-6">
          El PS800 es el nuevo bandaje de Trelleborg para aplicaciones de intensidad media. Su gran versatilidad le permite operar en cualquier condición.
        </p>
        <p class="mb-5">
          Una llanta maciza con anillo metálico de segmento ESTÁNDAR. Gran desempeño a precio bajo para montacargas de uso medio y ligero.
        </p>
        <p class="mb-5">
          Apta para montacargas eléctricos y de combustión con tránsito principalmente en almacenes.
        </p>
        <ul class="mb-2 list-disc pl-6">
          <li>Huella amplia mejora estabilidad y desgaste parejo.</li>
          <li>Buena maniobrabilidad y precisión.</li>
          <li>Absorbe vibraciones e impactos contra baches en la superficie.</li>
          <li>Baja resistencia al rodado que ahorra combustible visiblemente.</li>
          <li>Disponible en compuesto que no mancha.</li>
        </ul>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <a
            href="#contacto"
            class="inline-block rounded-[4px] bg-black px-[30px] py-[15px] text-[16px] leading-[16px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Solicitar presupuesto ahora</span>
            </span>
          </a>
        </div>

        <div>
          <a
            href="{{ asset('pdfs/Trelleborg-PS800-ES.pdf') }}"
            target="_blank" rel="noopener"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] leading-[16px] font-medium text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center"><span class="block">Descargar Ficha</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto will-change-transform">
        <table class="min-w-[1000px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Metric Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile Smooth <br> Flat</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile Smooth <br> Crown</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile Traction <br> Flat</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pattern &amp; Profile Traction <br> Crown</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> 4 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> 6 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Load Capacity <br> Other Vehicles up to <br> 10 mph</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Counter-balanced Lift Trucks up to 15 mph <br> Load Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Counter-balanced Lift Trucks up to 15 mph <br> Steering Wheel</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Weight (lbs)</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            {{-- Filas (contenido intacto) --}}
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">14x4½x8</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">356x114x203</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">2580</td>
              <td class="px-3 py-2 text-center">2115</td>
              <td class="px-3 py-2 text-center">1830</td>
              <td class="px-3 py-2 text-center">1875</td>
              <td class="px-3 py-2 text-center">1530</td>
              <td class="px-3 py-2 text-center">25</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">15x5x11¼</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">381x127x286</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">3065</td>
              <td class="px-3 py-2 text-center">2515</td>
              <td class="px-3 py-2 text-center">2185</td>
              <td class="px-3 py-2 text-center">2225</td>
              <td class="px-3 py-2 text-center">1830</td>
              <td class="px-3 py-2 text-center">28</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">16x5x10½</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">406x127x267</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">3330</td>
              <td class="px-3 py-2 text-center">2735</td>
              <td class="px-3 py-2 text-center">2380</td>
              <td class="px-3 py-2 text-center">2415</td>
              <td class="px-3 py-2 text-center">1975</td>
              <td class="px-3 py-2 text-center">33</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">16x6x10½</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">406x152x267</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">4210</td>
              <td class="px-3 py-2 text-center">3460</td>
              <td class="px-3 py-2 text-center">3000</td>
              <td class="px-3 py-2 text-center">3065</td>
              <td class="px-3 py-2 text-center">2515</td>
              <td class="px-3 py-2 text-center">38</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">16¼x5x11¼</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">413x127x286</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">3375</td>
              <td class="px-3 py-2 text-center">2755</td>
              <td class="px-3 py-2 text-center">2405</td>
              <td class="px-3 py-2 text-center">2435</td>
              <td class="px-3 py-2 text-center">1995</td>
              <td class="px-3 py-2 text-center">31</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">16¼x6x11¼</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">413x152x286</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">4235</td>
              <td class="px-3 py-2 text-center">3485</td>
              <td class="px-3 py-2 text-center">3020</td>
              <td class="px-3 py-2 text-center">3075</td>
              <td class="px-3 py-2 text-center">2515</td>
              <td class="px-3 py-2 text-center">38</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">18x6x12⅛</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">457x152x308</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">4630</td>
              <td class="px-3 py-2 text-center">3790</td>
              <td class="px-3 py-2 text-center">3305</td>
              <td class="px-3 py-2 text-center">3360</td>
              <td class="px-3 py-2 text-center">2755</td>
              <td class="px-3 py-2 text-center">47</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">18x7x12⅛</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">457x178x308</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">5620</td>
              <td class="px-3 py-2 text-center">4630</td>
              <td class="px-3 py-2 text-center">4010</td>
              <td class="px-3 py-2 text-center">4090</td>
              <td class="px-3 py-2 text-center">3350</td>
              <td class="px-3 py-2 text-center">53</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">18x8x12⅛</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">457x203x308</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">6615</td>
              <td class="px-3 py-2 text-center">5455</td>
              <td class="px-3 py-2 text-center">4740</td>
              <td class="px-3 py-2 text-center">4805</td>
              <td class="px-3 py-2 text-center">3945</td>
              <td class="px-3 py-2 text-center">62</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">21x7x15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">533x178x381</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">6340</td>
              <td class="px-3 py-2 text-center">5180</td>
              <td class="px-3 py-2 text-center">4520</td>
              <td class="px-3 py-2 text-center">4595</td>
              <td class="px-3 py-2 text-center">3770</td>
              <td class="px-3 py-2 text-center">66</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">21x8x15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">533x203x381</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">NS</td>
              <td class="px-3 py-2 text-center">7440</td>
              <td class="px-3 py-2 text-center">6120</td>
              <td class="px-3 py-2 text-center">5345</td>
              <td class="px-3 py-2 text-center">5410</td>
              <td class="px-3 py-2 text-center">4440</td>
              <td class="px-3 py-2 text-center">76</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">21x9x15</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">533x229x381</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">8600</td>
              <td class="px-3 py-2 text-center">7055</td>
              <td class="px-3 py-2 text-center">6120</td>
              <td class="px-3 py-2 text-center">6240</td>
              <td class="px-3 py-2 text-center">5115</td>
              <td class="px-3 py-2 text-center">89</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">22x9x16</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">559x229x406</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">8930</td>
              <td class="px-3 py-2 text-center">7330</td>
              <td class="px-3 py-2 text-center">6340</td>
              <td class="px-3 py-2 text-center">6460</td>
              <td class="px-3 py-2 text-center">5290</td>
              <td class="px-3 py-2 text-center">92</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="px-3 py-2 text-center font-semibold text-neutral-700 bg-neutral-100">
                <h2 class="text-[16px] leading-tight font-bold text-[#443f3f]">22x12x16</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700"><h3 class="text-[15px] leading-tight font-semibold">559x305x406</h3></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">PL</td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center"></td>
              <td class="px-3 py-2 text-center">12400</td>
              <td class="px-3 py-2 text-center">10195</td>
              <td class="px-3 py-2 text-center">8875</td>
              <td class="px-3 py-2 text-center">9015</td>
              <td class="px-3 py-2 text-center">7385</td>
              <td class="px-3 py-2 text-center">127</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="12" class="px-3 py-3 text-center text-xs">
                *PL = Pattern Smooth Crown | NS = Pattern Traction Crown
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="h-10" aria-hidden="true"></div>
  </div>
</section>


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
            {{-- Shell async + defer y creación del form cuando la librería esté cargada --}}
            <script async defer charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
            <script>
              window.addEventListener('load', function () {
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

{{-- Ajuste responsive: en <=768px usa variante más chica (corrige selector a #contacto) --}}
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
@endsection
