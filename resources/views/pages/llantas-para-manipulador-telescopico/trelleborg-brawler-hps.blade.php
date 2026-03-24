@extends('layouts.public')

@php
  $siteUrl = url('/');
  $pageUrl = url()->current();

  $productSrc = 'originals/Llanta-solida-PREMIUM-de-alto-rendimiento-para-cargador-telescopico.jpg';
  $productVariants = image_variants($productSrc);
  $productFallback = $productVariants['fallback']['url'] ?? asset('storage/' . $productSrc);

  $productAvif = $productVariants['avif'] ?? [];
  $productWebp = $productVariants['webp'] ?? [];
  $productJpg  = $productVariants['jpg'] ?? [];

  $productSizes = '(max-width: 768px) 92vw, (max-width: 1140px) 33vw, 380px';

  $toSrcset = function (array $arr): string {
      return implode(', ', array_map(
          fn($v) => ($v['url'] ?? '') . ' ' . ($v['w'] ?? '') . 'w',
          $arr
      ));
  };

  $productSrcsetAvif = !empty($productAvif) ? $toSrcset($productAvif) : null;
  $productSrcsetWebp = !empty($productWebp) ? $toSrcset($productWebp) : null;
  $productSrcsetJpg  = !empty($productJpg)  ? $toSrcset($productJpg)  : null;

  $heroJpg        = asset('storage/originals/heros/venta-de-llantas-para-montacargas.jpg');
  $heroAvif1024   = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.avif');
  $heroWebp1024   = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-1024.webp');
  $heroAvif960    = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.avif');
  $heroWebp960    = asset('storage/variants/originals/heros/venta-de-llantas-para-montacargas-960.webp');

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
        'alternateName' => [
          'BSH',
          'BSH | Llantas de Montacargas',
        ],
        'url' => $siteUrl,
        'logo' => [
          '@type' => 'ImageObject',
          'url' => $heroJpg,
        ],
        'image' => [$heroJpg],
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
          'Llantas para telehandlers',
          'Llantas para cargadores',
          'Llantas industriales Trelleborg',
          'Llantas para minicargadores',
          'Manejo de materiales',
        ],
      ],
      [
        '@type' => 'WebPage',
        '@id' => $pageUrl . '#webpage',
        'url' => $pageUrl,
        'name' => 'Llantas Neumáticas para Telehandlers, Cargadores BRAWLER HPS',
        'description' => 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más.Llantas numáticas de calidad garantizada para Manipuladores',
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
        'name' => 'Trelleborg BRAWLER® HPS – Llantas neumáticas para telehandlers y cargadores',
        'alternateName' => 'BRAWLER® HPS',
        'sku' => 'BRAWLER-HPS',
        'mpn' => 'BRAWLER-HPS',
        'category' => 'IndustrialTire',
        'image' => [
          asset('storage/' . $productSrc),
        ],
        'brand' => [
          '@type' => 'Brand',
          'name' => 'Trelleborg',
        ],
        'manufacturer' => [
          '@type' => 'Organization',
          'name' => 'Trelleborg',
        ],
        'description' => 'Llanta premium de alto rendimiento para telehandlers y cargadores, apta para aplicaciones severas y condiciones extremas. Ofrece perfil ancho y plano para mayor estabilidad, huella de tracción super profunda, orificios elípticos Solidflex para mayor comodidad y hasta 25% más vida útil llanta contra llanta, garantizado por escrito.',
        'additionalProperty' => [
          [
            '@type' => 'PropertyValue',
            'name' => 'Tipo',
            'value' => 'Llanta premium para telehandlers y cargadores',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Aplicación',
            'value' => 'Telehandlers, cargadores y niveladores',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Beneficio principal',
            'value' => '25% más vida útil llanta vs llanta, garantizado por escrito',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Ventaja',
            'value' => 'Perfil ancho y plano con alta estabilidad y contrabalance',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Ventaja',
            'value' => 'Orificios elípticos Solidflex para mayor comodidad en el manejo',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Ventaja',
            'value' => 'Huella de tracción super profunda',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Ventaja',
            'value' => '4 veces más caucho que una llanta neumática',
          ],
          [
            '@type' => 'PropertyValue',
            'name' => 'Ventaja',
            'value' => 'Disponible en perfiles R4 para mayor tracción en arena, lodo y piedras',
          ],
        ],
        'audience' => [
          '@type' => 'Audience',
          'audienceType' => 'Empresas industriales, almacenes, construcción, manejo de materiales y operadores de telehandlers y cargadores',
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
        'name' => 'Medidas disponibles BRAWLER® HPS',
        'itemListOrder' => 'https://schema.org/ItemListOrderAscending',
        'numberOfItems' => 5,
        'itemListElement' => [
          ['@type' => 'ListItem', 'position' => 1, 'name' => '30x10-16'],
          ['@type' => 'ListItem', 'position' => 2, 'name' => '31x10-20'],
          ['@type' => 'ListItem', 'position' => 3, 'name' => '33x12-20'],
          ['@type' => 'ListItem', 'position' => 4, 'name' => '36x14-20'],
          ['@type' => 'ListItem', 'position' => 5, 'name' => '40x14-20'],
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
            'name' => 'Llantas para telehandlers y cargadores',
            'item' => url('/llantas-para-manipulador-telescopico'),
          ],
          [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => 'BRAWLER® HPS',
            'item' => $pageUrl,
          ],
        ],
      ],
    ],
  ];
@endphp

@section('title', 'Llantas Neumáticas para Telehandlers, Cargadores BRAWLER HPS')
@section('meta_description', 'Precios Mayorista 2026 Crédito y Entrega inmediata. Cotiza aquí llantas con Garantía de vida 25% más.Llantas numáticas de calidad garantizada para Manipuladores')

@section('structured-data')
  <link rel="dns-prefetch" href="//js.hsforms.net">
  <link rel="preconnect" href="https://js.hsforms.net" crossorigin>

  {{-- Preload del recurso que probablemente sea LCP real --}}
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
          <h1 class="m-0 font-sans text-[22px] leading-[22px] font-semibold text-black lg:text-[32px] lg:leading-[32px]">
            Llantas Neumáticas para Telehandlers y Cargadores.
          </h1>
        </div>

        <div class="mb-5 h-[26px] w-full" aria-hidden="true"></div>

        <div class="mb-5 w-full text-center">
          <p class="m-0 leading-[30px] text-[#7a7a7a]">
            De uso rudo, no se ponchan y rinden el triple.
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
            alt="Trelleborg BRAWLER® HPS"
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
      <h2 class="m-0 font-sans text-[25px] font-semibold leading-[25px] text-black lg:text-[35px] lg:leading-[35px]">
        TRELLEBORG BRAWLER® HPS
      </h2>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div>
        <a
          href="#contacto"
          class="mt-6 inline-block rounded-[3px] bg-[#e76a3e] px-6 py-3 text-[15px] font-medium leading-[20px] text-white no-underline transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-[#ff6d00]/60 focus:ring-offset-2 lg:text-[20px] lg:leading-[30px]"
        >
          <span class="flex justify-center">
            <span class="block">25% mas vida llanta contra llanta, GARANTIZADO por escrito.</span>
          </span>
        </a>
      </div>

      <div class="h-[20px]" aria-hidden="true"></div>

      <div class="leading-[30px] text-[#7a7a7a]">
        <p class="mb-5 mt-6">
          Llanta sólida PREMIUM de alto rendimiento para cargador telescópico en cualquier aplicación, incluso en condiciones extremas.
        </p>

        <ul class="mb-2 list-disc pl-6">
          <li>Perfil ancho y plano con la mejor estabilidad y contrabalance que existe.</li>
          <li>Orificios elípticos en la cara -Solidflex- maximizan la comodidad en el manejo.</li>
          <li>Huella de tracción super profunda.</li>
          <li>4 veces mas caucho que una llanta neumática.</li>
          <li>Disponible en perfiles R4 para mayor tracción en arena, lodo y piedras.</li>
          <li>Llanta apta para su uso en Niveladores, y Cargadores.</li>
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
            href="{{ asset('pdfs/TWS-CON-Sell-Sheet-BrawlerHPSskidsteer-A4-EN-LR102019.pdf') }}"
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

<section class="relative mt-6" role="region" aria-label="Tabla de medidas y capacidades">
  <div class="relative mx-auto max-w-[1140px] px-2 sm:px-3">
    <div class="overflow-hidden rounded-xl border border-neutral-200/70 bg-white shadow-md">
      <div class="overflow-x-auto">
        <table class="min-w-[1000px] w-full border-collapse text-sm">
          <thead class="sticky top-0 z-10 bg-[#e76a3e] text-white">
            <tr class="[&>th]:px-3 [&>th]:py-3 [&>th]:text-center [&>th]:align-middle">
              <th class="font-semibold uppercase tracking-wide text-[12px] first:rounded-tl-xl">Tire Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Pneumatic Equivalent Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Rim Size</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Overall Diameter [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Section Width [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px]">Tread Depth [mm]</th>
              <th class="font-semibold uppercase tracking-wide text-[12px] last:rounded-tr-xl">Load Capacity 10 km/h [kg]</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-neutral-200/70">
            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">30x10-16</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">10-16.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">6.00-16</td>
              <td class="px-3 py-2 text-center text-neutral-700">759</td>
              <td class="px-3 py-2 text-center text-neutral-700">236</td>
              <td class="px-3 py-2 text-center text-neutral-700">44</td>
              <td class="px-3 py-2 text-center text-neutral-700">3000</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">31x10-20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">10-16.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">785</td>
              <td class="px-3 py-2 text-center text-neutral-700">254</td>
              <td class="px-3 py-2 text-center text-neutral-700">41</td>
              <td class="px-3 py-2 text-center text-neutral-700">2815</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">33x12-20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">12-16.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">840</td>
              <td class="px-3 py-2 text-center text-neutral-700">284</td>
              <td class="px-3 py-2 text-center text-neutral-700">56</td>
              <td class="px-3 py-2 text-center text-neutral-700">2970</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">36x14-20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">14-17.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">7.5-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">915</td>
              <td class="px-3 py-2 text-center text-neutral-700">356</td>
              <td class="px-3 py-2 text-center text-neutral-700">71</td>
              <td class="px-3 py-2 text-center text-neutral-700">3310</td>
            </tr>

            <tr class="odd:bg-white even:bg-neutral-50 hover:bg-orange-50/40 transition-colors">
              <th scope="row" class="bg-neutral-100 px-3 py-2 text-center font-semibold text-neutral-700">
                <h2 class="text-[16px] font-bold leading-tight text-[#443f3f]">40x14-20</h2>
              </th>
              <td class="px-3 py-2 text-center text-neutral-700">15-19.5</td>
              <td class="px-3 py-2 text-center text-neutral-700">10.0-20</td>
              <td class="px-3 py-2 text-center text-neutral-700">1015</td>
              <td class="px-3 py-2 text-center text-neutral-700">356</td>
              <td class="px-3 py-2 text-center text-neutral-700">94</td>
              <td class="px-3 py-2 text-center text-neutral-700">4955</td>
            </tr>
          </tbody>
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
    background-image:url('{{ $heroJpg }}');
    background-image:image-set(
      url('{{ $heroAvif1024 }}') type('image/avif') 1x,
      url('{{ $heroWebp1024 }}') type('image/webp') 1x,
      url('{{ $heroJpg }}') type('image/jpeg') 1x
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
            data-hs-forms-root="true"
            data-portal-id="7547674"
            data-form-id="26f426a7-e620-42df-98a3-43e10a899b6c"
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
      background-image: url('{{ $heroJpg }}');
      background-image: image-set(
        url('{{ $heroAvif960 }}') type('image/avif') 1x,
        url('{{ $heroWebp960 }}') type('image/webp') 1x,
        url('{{ $heroJpg }}') type('image/jpeg') 1x
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