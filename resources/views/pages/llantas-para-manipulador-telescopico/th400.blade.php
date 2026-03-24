@extends('layouts.public')

@php
  $siteUrl = url('/');
  $pageUrl = url()->current();

  // Imagen principal del producto
  $productSrc = 'originals/Llanta-radial-para-manipuladores-y-cargadores-de-uso-rudo-con-cargas-pesadas2.jpg';
  $productVariants = image_variants($productSrc);
  $productFallback = $productVariants['fallback']['url'] ?? asset('storage/' . $productSrc);

  $productAvif = $productVariants['avif'] ?? [];
  $productWebp = $productVariants['webp'] ?? [];
  $productJpg  = $productVariants['jpg'] ?? [];
  $productSizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

  $toSrcset = function (array $arr): string {
      return implode(', ', array_map(fn($v) => ($v['url'] ?? '') . ' ' . ($v['w'] ?? '') . 'w', $arr));
  };

  $productSrcsetAvif = !empty($productAvif) ? $toSrcset($productAvif) : null;
  $productSrcsetWebp = !empty($productWebp) ? $toSrcset($productWebp) : null;
  $productSrcsetJpg  = !empty($productJpg)  ? $toSrcset($productJpg)  : null;

  // Hero del formulario (below the fold, NO preload)
  $contactHeroJpg  = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $contactHeroAvif = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $contactHeroWebp = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $contactHeroAvifMobile = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $contactHeroWebpMobile = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

  $schema = [
      '@context' => 'https://schema.org',
      '@graph' => [
          [
              '@type' => 'WebSite',
              '@id' => $siteUrl . '#website',
              'url' => $siteUrl,
              'name' => 'Llantas para Montacargas, Minicargadores y Telehandlers | Trelleborg México',
              'inLanguage' => 'es-MX',
              'publisher' => [
                  '@id' => $siteUrl . '#organization',
              ],
              'potentialAction' => [
                  '@type' => 'SearchAction',
                  'target' => $siteUrl . '?s={search_term_string}',
                  'query-input' => 'required name=search_term_string',
              ],
          ],
          [
              '@type' => 'AutoPartsStore',
              '@id' => $siteUrl . '#organization',
              'name' => 'Bombas Sellos y Hules Industriales S.A. de C.V.',
              'alternateName' => ['BSH', 'BSH | Llantas de Montacargas'],
              'url' => $siteUrl,
              'logo' => [
                  '@type' => 'ImageObject',
                  'url' => $contactHeroJpg,
              ],
              'image' => [$contactHeroJpg],
              'description' => 'Somos una comercializadora de equipos y refacciones especializadas al servicio de la industria en México. Distribuimos desde 2010 la gama de producto Trelleborg, incluyendo llantas premium para manejo de materiales, montacargas, minicargadores y telehandlers, con stock, asistencia técnica, entrega directa en sitio y precios competitivos.',
              'email' => 'ventas@llantasdemontacargas.com',
              'telephone' => '+52-55-5752-1715',
              'address' => [
                  '@type' => 'PostalAddress',
                  'streetAddress' => 'Avenida 125 Oriente #224, Guadalupe Hidalgo',
                  'addressLocality' => 'Puebla',
                  'addressRegion' => 'PUE',
                  'postalCode' => '72494',
                  'addressCountry' => 'MX',
              ],
              'areaServed' => [
                  ['@type' => 'Country', 'name' => 'México'],
                  ['@type' => 'City', 'name' => 'Puebla'],
                  ['@type' => 'City', 'name' => 'Ciudad de México'],
                  ['@type' => 'State', 'name' => 'Estado de México'],
                  ['@type' => 'City', 'name' => 'Monterrey'],
                  ['@type' => 'State', 'name' => 'Guanajuato'],
                  ['@type' => 'State', 'name' => 'Querétaro'],
              ],
              'brand' => [
                  '@type' => 'Brand',
                  'name' => 'Trelleborg',
              ],
              'contactPoint' => [
                  [
                      '@type' => 'ContactPoint',
                      'telephone' => '+52-55-5752-1715',
                      'contactType' => 'sales',
                      'areaServed' => 'MX',
                      'availableLanguage' => ['es-MX'],
                  ],
                  [
                      '@type' => 'ContactPoint',
                      'telephone' => '+52-83-3246-2205',
                      'contactType' => 'sales',
                      'areaServed' => 'MX',
                      'availableLanguage' => ['es-MX'],
                  ],
                  [
                      '@type' => 'ContactPoint',
                      'telephone' => '+52-83-3239-5885',
                      'contactType' => 'sales',
                      'areaServed' => 'MX',
                      'availableLanguage' => ['es-MX'],
                  ],
                  [
                      '@type' => 'ContactPoint',
                      'telephone' => '+52-22-2227-3866',
                      'contactType' => 'sales',
                      'areaServed' => 'MX',
                      'availableLanguage' => ['es-MX'],
                  ],
                  [
                      '@type' => 'ContactPoint',
                      'telephone' => '+52-59-5112-4238',
                      'contactType' => 'sales',
                      'areaServed' => 'MX',
                      'availableLanguage' => ['es-MX'],
                  ],
              ],
              'knowsAbout' => [
                  'Llantas para montacargas',
                  'Llantas para manipuladores telescópicos',
                  'Llantas para telehandlers',
                  'Llantas industriales Trelleborg',
                  'Llantas para minicargadores',
                  'Manejo de materiales',
              ],
          ],
          [
              '@type' => 'WebPage',
              '@id' => $pageUrl . '#webpage',
              'url' => $pageUrl,
              'name' => 'Llantas Radiales para Manipuladores telescópicos - TH400',
              'description' => 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más. Llantas radiales de calidad garantizada para Manipuladores',
              'inLanguage' => 'es-MX',
              'isPartOf' => [
                  '@id' => $siteUrl . '#website',
              ],
              'about' => [
                  '@id' => $pageUrl . '#product',
              ],
              'primaryImageOfPage' => [
                  '@type' => 'ImageObject',
                  'url' => asset('storage/' . $productSrc),
              ],
              'breadcrumb' => [
                  '@id' => $pageUrl . '#breadcrumb',
              ],
          ],
          [
              '@type' => 'Product',
              '@id' => $pageUrl . '#product',
              'name' => 'Trelleborg TH400 – Llanta radial para manipuladores telescópicos',
              'alternateName' => 'TH400',
              'sku' => 'TH400',
              'mpn' => 'TH400',
              'category' => 'IndustrialTire',
              'image' => [asset('storage/' . $productSrc)],
              'brand' => [
                  '@type' => 'Brand',
                  'name' => 'Trelleborg',
              ],
              'manufacturer' => [
                  '@type' => 'Organization',
                  'name' => 'Trelleborg',
              ],
              'description' => 'Llanta radial para manipuladores y cargadores de uso rudo con cargas pesadas. Neumático super premium para telehandlers, con hombros y costados reforzados, huella amplia, tacos profundos, mejor tracción, ahorro de combustible y diseño de autolimpieza mejorado.',
              'additionalProperty' => [
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Tipo',
                      'value' => 'Llanta radial industrial para manipuladores telescópicos',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Aplicación',
                      'value' => 'Manipuladores telescópicos y cargadores de uso rudo con cargas pesadas',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Configuración',
                      'value' => 'Sin cámara',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Beneficio principal',
                      'value' => '25% más vida útil llanta vs llanta, garantizado por escrito',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Ventaja',
                      'value' => 'Hombros y costados reforzados reducen la deformación en un 20%',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Ventaja',
                      'value' => 'Huella más amplia y tacos profundos para mejor tracción',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Ventaja',
                      'value' => 'Diseño de banda más resistente a abrasión y desgaste',
                  ],
                  [
                      '@type' => 'PropertyValue',
                      'name' => 'Ventaja',
                      'value' => 'Notable ahorro de combustible',
                  ],
              ],
              'audience' => [
                  '@type' => 'Audience',
                  'audienceType' => 'Empresas industriales, almacenes, operaciones de manejo de materiales y telehandlers',
              ],
              'isRelatedTo' => [
                  '@type' => 'Brand',
                  'name' => 'Trelleborg',
              ],
              'offers' => [
                  '@type' => 'Offer',
                  'url' => $pageUrl,
                  'priceCurrency' => 'MXN',
                  'availability' => 'https://schema.org/InStock',
                  'itemCondition' => 'https://schema.org/NewCondition',
                  'seller' => [
                      '@id' => $siteUrl . '#organization',
                  ],
                  'priceSpecification' => [
                      '@type' => 'PriceSpecification',
                      'priceCurrency' => 'MXN',
                      'valueAddedTaxIncluded' => false,
                  ],
                  'eligibleRegion' => [
                      '@type' => 'Country',
                      'name' => 'México',
                  ],
              ],
          ],
          [
              '@type' => 'ItemList',
              '@id' => $pageUrl . '#sizes',
              'name' => 'Medidas disponibles TH400',
              'itemListOrder' => 'https://schema.org/ItemListOrderAscending',
              'numberOfItems' => 10,
              'itemListElement' => [
                  ['@type' => 'ListItem', 'position' => 1, 'name' => '11LR16 122A8'],
                  ['@type' => 'ListItem', 'position' => 2, 'name' => '340/80R18 143A8 (143B) (12.5-18)'],
                  ['@type' => 'ListItem', 'position' => 3, 'name' => '400/70R18 147A8 (147B) (15.5/70-18)'],
                  ['@type' => 'ListItem', 'position' => 4, 'name' => '400/70R20 149A8 (149B) (16.0/70-20)'],
                  ['@type' => 'ListItem', 'position' => 5, 'name' => '400/70R24 152A8 (152B) (16.0/70-24)'],
                  ['@type' => 'ListItem', 'position' => 6, 'name' => '440/80R24 161A8 (161B) (16.9-24)'],
                  ['@type' => 'ListItem', 'position' => 7, 'name' => '460/70R24 159A8 (159B) (17.5L-24)'],
                  ['@type' => 'ListItem', 'position' => 8, 'name' => '500/70R24 164A8 (164B) (19.5L-24)'],
                  ['@type' => 'ListItem', 'position' => 9, 'name' => '480/80R26 160A8 (160B) (18.4-26)'],
                  ['@type' => 'ListItem', 'position' => 10, 'name' => '440/80R28 156A8 (156B) (16.9-28)'],
              ],
          ],
          [
              '@type' => 'BreadcrumbList',
              '@id' => $pageUrl . '#breadcrumb',
              'itemListElement' => [
                  [
                      '@type' => 'ListItem',
                      'position' => 1,
                      'name' => 'Inicio',
                      'item' => $siteUrl,
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 2,
                      'name' => 'Llantas para manipuladores telescópicos',
                      'item' => url('/llantas-para-manipulador-telescopico'),
                  ],
                  [
                      '@type' => 'ListItem',
                      'position' => 3,
                      'name' => 'TH400',
                      'item' => $pageUrl,
                  ],
              ],
          ],
      ],
  ];
@endphp

@section('title', 'Llantas Radiales para Manipulaodres telescópicos - TH400')
@section('meta_description', 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más. Llantas radiales de calidad garantizada para Manipuladores')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload del LCP real: imagen principal del producto --}}
  <link rel="preload" as="image" href="{{ $productFallback }}">
  @if($productSrcsetAvif)
    <link rel="preload" as="image" imagesrcset="{{ $productSrcsetAvif }}" imagesizes="{{ $productSizes }}">
  @elseif($productSrcsetWebp)
    <link rel="preload" as="image" imagesrcset="{{ $productSrcsetWebp }}" imagesizes="{{ $productSizes }}">
  @elseif($productSrcsetJpg)
    <link rel="preload" as="image" imagesrcset="{{ $productSrcsetJpg }}" imagesizes="{{ $productSizes }}">
  @endif

  <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endsection

@section('content')
<section class="relative" role="region" aria-label="Resumen PS800">
  <div class="relative mx-auto max-w-[1140px]">
    <div class="flex w-full">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="mb-5 h-[68px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <h1 class="m-0 font-sans text-[32px] font-semibold leading-[32px] text-black">
            Llantas Radiales para Manipuladores telescópicos.
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>
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
          @if($productSrcsetAvif)
            <source type="image/avif" srcset="{{ $productSrcsetAvif }}" sizes="{{ $productSizes }}">
          @endif
          @if($productSrcsetWebp)
            <source type="image/webp" srcset="{{ $productSrcsetWebp }}" sizes="{{ $productSizes }}">
          @endif
          @if($productSrcsetJpg)
            <source type="image/jpeg" srcset="{{ $productSrcsetJpg }}" sizes="{{ $productSizes }}">
          @endif

          <img
            src="{{ $productFallback }}"
            alt="Trelleborg TH400"
            width="594"
            height="722"
            loading="eager"
            fetchpriority="high"
            decoding="async"
            class="inline-block h-auto max-w-full align-middle border-0"
          >
        </picture>
      </figure>
    </div>

    <div class="w-full p-[10px] md:w-[67.292%]">
      <h2 class="m-0 font-sans text-[43px] font-semibold leading-[43px] text-black">
        TH400
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

      <div class="text-[#7a7a7a]">
        <p class="mb-5 mt-6">
          Llanta radial para manipuladores y cargadores de uso rudo con cargas pesadas; es un neumático Super PREMIUM.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Hombros y costados reforzados reducen la deformación en un 20% mejorando la estabilidad y desempeño con brazo extendido o cargas pesadas.</li>
          <li>Huella mas amplia que cualquier competidor, con tacos profundos de mejor tracción.</li>
          <li>Bordes de tacos redondeados y reforzados contra cortes.</li>
          <li>Nervadura al centro y banda de rodaje de diseño patentado mas resistente a la abrasión, el desgaste y más comoda.</li>
          <li>Notable ahorro de combustible.</li>
          <li>Diseño de banda de autolimpieza mejorado.</li>
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
            href="{{ asset('pdfs/Trelleborg-PS800-ES.pdf') }}"
            target="_blank"
            rel="noopener"
            class="inline-block rounded-[4px] bg-[#e76a3e] px-[30px] py-[15px] text-[16px] font-medium leading-[16px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-white/40"
          >
            <span class="flex justify-center">
              <span class="block">Descargar Ficha</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1000px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Medida</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Modelo</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">SW mm</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">D [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">R.b.c. [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">C.d.r. [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">R.I.</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Llanta</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Otras opciones de llanta</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Tipo</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">11LR16 122A8</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">290</td>
              <td class="px-3 py-2 text-center text-neutral-700">850</td>
              <td class="px-3 py-2 text-center text-neutral-700">370</td>
              <td class="px-3 py-2 text-center text-neutral-700">2530</td>
              <td class="px-3 py-2 text-center text-neutral-700">400</td>
              <td class="px-3 py-2 text-center text-neutral-700">W8</td>
              <td class="px-3 py-2 text-center text-neutral-700">W10L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">340/80R18 143A8 (143B) (12.5-18)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">351</td>
              <td class="px-3 py-2 text-center text-neutral-700">994</td>
              <td class="px-3 py-2 text-center text-neutral-700">440</td>
              <td class="px-3 py-2 text-center text-neutral-700">3020</td>
              <td class="px-3 py-2 text-center text-neutral-700">475</td>
              <td class="px-3 py-2 text-center text-neutral-700">11</td>
              <td class="px-3 py-2 text-center text-neutral-700 leading-snug">W10-11SDC<br>W11-12-12SDC</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">400/70R18 147A8 (147B) (15.5/70-18)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">403</td>
              <td class="px-3 py-2 text-center text-neutral-700">1010</td>
              <td class="px-3 py-2 text-center text-neutral-700">450</td>
              <td class="px-3 py-2 text-center text-neutral-700">3040</td>
              <td class="px-3 py-2 text-center text-neutral-700">475</td>
              <td class="px-3 py-2 text-center text-neutral-700">13</td>
              <td class="px-3 py-2 text-center text-neutral-700">12 - 12SDC</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">400/70R20 149A8 (149B) (16.0/70-20)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">395</td>
              <td class="px-3 py-2 text-center text-neutral-700">1065</td>
              <td class="px-3 py-2 text-center text-neutral-700">475</td>
              <td class="px-3 py-2 text-center text-neutral-700">3200</td>
              <td class="px-3 py-2 text-center text-neutral-700">525</td>
              <td class="px-3 py-2 text-center text-neutral-700">13</td>
              <td class="px-3 py-2 text-center text-neutral-700">12 - 12SDC<br>13SDC - 14</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">400/70R24 152A8 (152B) (16.0/70-24)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">400</td>
              <td class="px-3 py-2 text-center text-neutral-700">1165</td>
              <td class="px-3 py-2 text-center text-neutral-700">520</td>
              <td class="px-3 py-2 text-center text-neutral-700">3520</td>
              <td class="px-3 py-2 text-center text-neutral-700">575</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW13</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW14L - W14L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">440/80R24 161A8 (161B) (16.9-24)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">1312</td>
              <td class="px-3 py-2 text-center text-neutral-700">585</td>
              <td class="px-3 py-2 text-center text-neutral-700">3975</td>
              <td class="px-3 py-2 text-center text-neutral-700">625</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW14L</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW15L - 14 TW14L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">460/70R24 159A8 (159B) (17.5L-24)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">465</td>
              <td class="px-3 py-2 text-center text-neutral-700">1250</td>
              <td class="px-3 py-2 text-center text-neutral-700">555</td>
              <td class="px-3 py-2 text-center text-neutral-700">3790</td>
              <td class="px-3 py-2 text-center text-neutral-700">600</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW15L</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW14L-DW16L 14-TW14L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">500/70R24 164A8 (164B) (19.5L-24)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1302</td>
              <td class="px-3 py-2 text-center text-neutral-700">580</td>
              <td class="px-3 py-2 text-center text-neutral-700">3940</td>
              <td class="px-3 py-2 text-center text-neutral-700">625</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW16L</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW15L - 16</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">480/80R26 160A8 (160B) (18.4-26)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">495</td>
              <td class="px-3 py-2 text-center text-neutral-700">1425</td>
              <td class="px-3 py-2 text-center text-neutral-700">630</td>
              <td class="px-3 py-2 text-center text-neutral-700">4315</td>
              <td class="px-3 py-2 text-center text-neutral-700">675</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW15L</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW16L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">440/80R28 156A8 (156B) (16.9-28)</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">TH400</td>
              <td class="px-3 py-2 text-center text-neutral-700">457</td>
              <td class="px-3 py-2 text-center text-neutral-700">1418</td>
              <td class="px-3 py-2 text-center text-neutral-700">633</td>
              <td class="px-3 py-2 text-center text-neutral-700">4295</td>
              <td class="px-3 py-2 text-center text-neutral-700">675</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW14L</td>
              <td class="px-3 py-2 text-center text-neutral-700">DW15L</td>
              <td class="px-3 py-2 text-center text-neutral-700">SIN CÁMARA</td>
            </tr>
          </tbody>

          <tfoot class="bg-neutral-100 text-neutral-700">
            <tr>
              <td colspan="10" class="px-3 py-3 text-center text-xs"></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="h-10" aria-hidden="true"></div>
  </div>
</section>

<section
  id="contacto"
  class="relative box-border block bg-black bg-no-repeat bg-center bg-cover transition-[background,border,border-radius,box-shadow] duration-300"
  style="
    background-image:url('{{ $contactHeroJpg }}');
    background-image:image-set(
      url('{{ $contactHeroAvif }}') type('image/avif') 1x,
      url('{{ $contactHeroWebp }}') type('image/webp') 1x,
      url('{{ $contactHeroJpg }}') type('image/jpeg') 1x
    );
  "
  role="region"
  aria-label="Formulario de cotización"
>
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="flex min-h-px w-full">
      <div class="relative flex w-full flex-wrap content-start p-2.5">
        <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

        <div class="w-full"><div class="h-[104px]"></div></div>

        <div class="z-10 mb-5 w-full text-center">
          <div class="m-0 p-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[42px] text-white lg:text-[42px]">
            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
          </div>
        </div>

        <div class="z-10 mb-5 w-full">
          <div
            id="hs-form-target"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
            data-hs-forms-root="true"
          ></div>

          <noscript>
            <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
          </noscript>
        </div>

        <div class="w-full"><div class="h-[104px]"></div></div>
      </div>
    </div>
  </div>
</section>

<style>
  @media (max-width: 768px) {
    #contacto {
      background-image: url('{{ $contactHeroJpg }}');
      background-image: image-set(
        url('{{ $contactHeroAvifMobile }}') type('image/avif') 1x,
        url('{{ $contactHeroWebpMobile }}') type('image/webp') 1x,
        url('{{ $contactHeroJpg }}') type('image/jpeg') 1x
      );
    }
  }
</style>
@endsection

@push('scripts')
<script>
(() => {
  const target = document.getElementById('hs-form-target');
  if (!target) return;

  let loaded = false;
  let observer = null;

  const loadHubspotForm = () => {
    if (loaded) return;
    loaded = true;

    const script = document.createElement('script');
    script.src = 'https://js.hsforms.net/forms/shell.js';
    script.async = true;
    script.defer = true;
    script.charset = 'utf-8';

    script.onload = () => {
      if (window.hbspt?.forms?.create) {
        window.hbspt.forms.create({
          portalId: target.dataset.portalId,
          formId: target.dataset.formId,
          target: '#hs-form-target'
        });
      }
    };

    document.head.appendChild(script);

    if (observer) observer.disconnect();
  };

  if ('IntersectionObserver' in window) {
    observer = new IntersectionObserver((entries) => {
      if (entries.some(entry => entry.isIntersecting)) {
        loadHubspotForm();
      }
    }, {
      rootMargin: '300px 0px'
    });

    observer.observe(target);
  } else {
    window.addEventListener('load', loadHubspotForm, { once: true });
  }
})();
</script>
@endpush