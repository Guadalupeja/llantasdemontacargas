@extends('layouts.public')

@section('title', 'Llantas neumáticas para montacargas Y cargadores Trelleborg.')
@section('meta_description', 'Cotiza llantas neumáticas PREMIUM para montacargas, cargadores y minicargadores, entrega inmediata, envío GRATIS a toda la República mexicana, precio mayorista.')

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
        "llantas neumáticas",
        "llantas neumáticas para montacargas",
        "llantas para cargador frontal",
        "llantas neumáticas para minicargadores",
        "llantas para manipuladores telescópicos",
        "llantas radiales",
        "llantas trelleborg",
        "llantas premium",
        "envío gratis",
        "precio mayorista"
      ],

      "about": [
        { "@type": "Thing", "name": "Llantas neumáticas para montacargas" },
        { "@type": "Thing", "name": "Llantas neumáticas para cargador frontal" },
        { "@type": "Thing", "name": "Llantas neumáticas para minicargadores" },
        { "@type": "Thing", "name": "Llantas neumáticas para manipuladores telescópicos" },
        { "@type": "Thing", "name": "Trelleborg" }
      ],

      "mainEntity": [
        { "@id": "{{ url()->current() }}#itemlist" },
        { "@id": "{{ url()->current() }}#service" }
      ],

      "hasPart": [
        { "@id": "{{ url()->current() }}#montacargas" },
        { "@id": "{{ url()->current() }}#minicargadores" },
        { "@id": "{{ url()->current() }}#cargadorfrontal" },
        { "@id": "{{ url()->current() }}#telescopicos" }
      ]
    },

    {
      "@type": "BreadcrumbList",
      "@id": "{{ url()->current() }}#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Inicio", "item": "{{ url('/') }}" },
        { "@type": "ListItem", "position": 2, "name": "Llantas", "item": "{{ url('/') }}/llantas" },
        { "@type": "ListItem", "position": 3, "name": "Llantas neumáticas", "item": "{{ url()->current() }}" }
      ]
    },

    {
      "@type": "ItemList",
      "@id": "{{ url()->current() }}#itemlist",
      "name": "Modelos / líneas de llantas neumáticas",
      "itemListOrder": "https://schema.org/ItemListUnordered",
      "numberOfItems": 9,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "url": "{{ url('/llantas-para-montacargas/trelleborg-tr-900-neumatica-radial') }}",
          "name": "Trelleborg TR-900 Neumática Radial"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "url": "{{ url('/llantas-para-montacargas/trelleborg-t-800') }}",
          "name": "Trelleborg T-800"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "url": "{{ url('/llantas-para-montacargas/trelleborg-t-900-neumatica') }}",
          "name": "Trelleborg T-900 Neumática"
        },

        {
          "@type": "ListItem",
          "position": 4,
          "url": "{{ url('/llantas-para-minicargadores/sk-900') }}",
          "name": "SK 900"
        },
        {
          "@type": "ListItem",
          "position": 5,
          "url": "{{ url('/llantas-para-minicargadores/sk-900-2') }}",
          "name": "SK 900 No Direccional"
        },
        {
          "@type": "ListItem",
          "position": 6,
          "url": "{{ url('/llantas-para-minicargadores/sk-800') }}",
          "name": "SK 800"
        },

        {
          "@type": "ListItem",
          "position": 7,
          "url": "{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr') }}",
          "name": "Neumático C800 L2 OTR"
        },
        {
          "@type": "ListItem",
          "position": 8,
          "url": "{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr-2') }}",
          "name": "Neumático C-800 E3/L3 (OTR)"
        },

        {
          "@type": "ListItem",
          "position": 9,
          "url": "{{ url('/llantas-para-manipulador-telescopico/th400') }}",
          "name": "TH400"
        }
      ]
    },

    {
      "@type": "Service",
      "@id": "{{ url()->current() }}#service",
      "name": "Cotización y asesoría de llantas neumáticas",
      "serviceType": "Cotización / Asesoría",
      "provider": { "@id": "{{ url('/') }}#organization" },
      "areaServed": { "@type": "Country", "name": "México" },

      "availableChannel": [
        {
          "@type": "ServiceChannel",
          "serviceUrl": "{{ url()->current() }}#T7",
          "availableLanguage": ["es", "es-MX"]
        },
        {
          "@type": "ServiceChannel",
          "serviceUrl": "https://wa.me/525951124238",
          "availableLanguage": ["es", "es-MX"]
        }
      ],

      "offers": {
        "@type": "Offer",
        "url": "{{ url()->current() }}#T7",
        "priceCurrency": "MXN",
        "availability": "https://schema.org/InStock",
        "areaServed": { "@type": "Country", "name": "MX" },
        "eligibleRegion": { "@type": "Country", "name": "MX" },
        "availableDeliveryMethod": [
          "https://schema.org/OnSitePickup",
          "https://schema.org/DeliveryModeDirect"
        ]
      }
    },

    {
      "@type": "WebPageElement",
      "@id": "{{ url()->current() }}#montacargas",
      "name": "Llantas Neumáticas para Montacargas",
      "isPartOf": { "@id": "{{ url()->current() }}#webpage" }
    },
    {
      "@type": "WebPageElement",
      "@id": "{{ url()->current() }}#minicargadores",
      "name": "Llantas Neumáticas para Minicargador",
      "isPartOf": { "@id": "{{ url()->current() }}#webpage" }
    },
    {
      "@type": "WebPageElement",
      "@id": "{{ url()->current() }}#cargadorfrontal",
      "name": "Llantas Neumáticas para Cargador frontal",
      "isPartOf": { "@id": "{{ url()->current() }}#webpage" }
    },
    {
      "@type": "WebPageElement",
      "@id": "{{ url()->current() }}#telescopicos",
      "name": "Llantas Neumáticas para Manipuladores Telescópicos",
      "isPartOf": { "@id": "{{ url()->current() }}#webpage" }
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
            Llantas Neumáticas
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
        href="{{ url('#montacargas') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        MONTACARGAS
      </a>
    </div>

    <!-- Col 2 (center) -->
    <div class="flex justify-center w-full md:w-1/3 md:justify-center">
      <a
        href="{{ url('#minicargadores') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        MINICARGADORES
      </a>
    </div>

    <!-- Col 3 (left on desktop) -->
    <div class="flex w-full justify-center md:w-1/3 md:justify-start">
      <a
        href="{{ url('#cargadorfrontal') }}"
        class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-6 py-3 font-['Roboto',sans-serif] text-[15px] leading-[15px] font-medium text-white no-underline transition duration-300"
      >
        CARGADOR FRONTAL
      </a>
    </div>
  </div>
</section>


<section class="relative" id="montacargas">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="w-full p-[10px] text-center">
      <!-- Spacer 80 -->
      <div class="mb-5 lg:h-[80px] h-[40px]"></div>

      <!-- Heading -->
      <h1 class="m-0 mb-5 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
        Llantas Neumáticas para Montacargas
      </h1>

      <!-- Spacer 23 -->
      <div class="mb-5 h-[23px]"></div>

      <!-- Text -->
      <p class="m-0 mb-5 font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
        Con gran capacidad de carga y el mejor desempeño a altas velocidades, trayectos largos y en terracería.
   </p>

      <!-- Spacer 80 -->
      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>


<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <!-- Card 1 -->
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-montacargas/trelleborg-tr-900-neumatica-radial') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-con-camara-del-segmento.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Trelleborg TR-900 Neumática Radial"
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
              <a href="{{ url('/llantas-para-montacargas/trelleborg-tr-900-neumatica-radial') }}" class="text-white no-underline">
                Trelleborg TR-900 Neumática Radial
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-montacargas/trelleborg-t-800') }}" class="inline-block">
            <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Neumatico-de-uso-medio-a-ligero.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Trelleborg T-800"
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
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white"> <a href="{{ url('/llantas-para-montacargas/trelleborg-ps1000') }}" class="text-white no-underline">
              <a href="{{ url('/llantas-para-montacargas/trelleborg-t-800') }}" class="text-white no-underline">  
              Trelleborg T-800
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-montacargas/trelleborg-t-900-neumatica') }}" class="inline-block">
           <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-neumatica-reforzada.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Trelleborg T-900 Neumática"
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

        <div class="w-full text-center">
          <div class="mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] min-h-[82px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white"> <a href="{{ url('/llantas-para-montacargas/trelleborg-ps1000') }}" class="text-white no-underline">
              <a href="{{ url('/llantas-para-montacargas/trelleborg-t-900-neumatica') }}" class="text-white no-underline">
                Trelleborg T-900 Neumática
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<section class="relative" id="minicargadores">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="w-full p-[10px] text-center">
      <!-- Spacer 80 -->
      <div class="mb-5 lg:h-[80px] h-[40px]"></div>

      <!-- Heading -->
      <h2 class="m-0 mb-5 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
        Llantas Neumáticas para Minicargador
      </h2>

      <!-- Spacer 23 -->
      <div class="mb-5 h-[23px]"></div>

      <!-- Text -->
      <p class="m-0 mb-5 font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
      Más versátiles, mejor amortiguamiento y desempeño en tierra.

     </p>

      <!-- Spacer 80 -->
      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>


<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <!-- Card 1 -->
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-minicargadores/sk-900') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-perfil-asimetrico-con-banda-de-rodamiento-superior-a-cualquier-llanta-1.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas SK 900"
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
          <div class="mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white">
              <a href="{{ url('/llantas-para-minicargadores/sk-900') }}" class="text-white no-underline">
                SK 900
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 --> 
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-minicargadores/sk-900-2') }}" class="inline-block">
            <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-perfil-asimetrico-con-banda-de-rodamiento-superior-a-cualquier-llanta-1.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Trelleborg SK 900 No Direccional"
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
          <div class="mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white"> <a href="{{ url('/llantas-para-montacargas/trelleborg-ps1000') }}" class="text-white no-underline">
              <a href="{{ url('/llantas-para-minicargadores/sk-900-2') }}" class="text-white no-underline">  
              SK 900 No Direccional
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="flex w-full md:w-1/3">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-minicargadores/sk-800') }}" class="inline-block">
           <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/llanta-de-segmento-Medio.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Trelleborg SK 800"
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

        <div class="w-full text-center">
          <div class="mx-auto flex w-full max-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white"> <a href="{{ url('/llantas-para-montacargas/trelleborg-ps1000') }}" class="text-white no-underline">
              <a href="{{ url('/llantas-para-minicargadores/sk-800') }}" class="text-white no-underline">
                SK 800
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






<section class="relative" id="cargadorfrontal">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="w-full p-[10px] text-center">
      <!-- Spacer 80 -->
      <div class="mb-5 lg:h-[80px] h-[40px]"></div>

      <!-- Heading -->
      <h2 class="m-0 mb-5 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
      Llantas Neumáticas para Cargador frontal.
      </h2>

     
      <!-- Spacer 80 -->
      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>


<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <!-- Card 1 -->
    <div class="flex w-full md:w-1/2">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llantas-para-minicargadores-en-las-aplicaciones-mas-rigurosas.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Neumáticas C800 L2 OTR"
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
          <div class="mx-auto flex w-full min-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white">
              <a href="{{ url('llantas-para-cargadores/neumatico-c800-l2-otr') }}" class="text-white no-underline">
                Neumático C800 L2 OTR
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>


    <!-- Card 2 -->
    <div class="flex w-full md:w-1/2">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr-2') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Neumatico-C-800-E3_L3-OTR.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas Neumático C-800 E3/L3 (OTR)"
                    sizes="(max-width: 767px) 100vw, 357px"
                    class="w-full h-full object-cover align-middle border-0"
                    min-width="357" min-height="357"
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
          <div class="mx-auto flex w-full min-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white">
              <a href="{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr-2') }}" class="text-white no-underline">
                Neumático C-800 E3/L3 (OTR)
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>



<section class="relative" id="cargadorfrontal">
  <div class="relative mx-auto flex max-w-[1140px]">
    <div class="w-full p-[10px] text-center">
      <!-- Spacer 80 -->
      <div class="mb-5 lg:h-[80px] h-[40px]"></div>

      <!-- Heading -->
      <h2 class="m-0 mb-5 p-0 font-['Roboto',sans-serif] text-[23px] leading-[23px] lg:text-[33px] lg:leading-[33px] font-semibold text-[#e76a3e]">
      Llantas Neumáticas para Manipuladores Telescópicos
      </h2>

      <!-- Spacer 23 -->
      <div class="mb-5 h-[23px]"></div>

      <!-- Text -->
      <p class="m-0 mb-5 font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
      Llantas Radiales para Manipuladores telescópicos
     </p>

      <!-- Spacer 80 -->
      <div class="lg:h-[80px] h-[40px]"></div>
    </div>
  </div>
</section>


<section class="relative">
  <div class="relative mx-auto flex max-w-[1140px] flex-col md:flex-row">
    <!-- Card 1 -->
    <div class="flex w-full md:w-1/2">
      <div class="flex w-full flex-wrap content-start p-[10px]">
        <div class="w-full text-center mb-5">
          <a href="{{ url('/llantas-para-manipulador-telescopico/th400') }}" class="inline-block">
              <figure class="m-0 w-full max-w-[357px] mx-auto">
                <div class="aspect-square w-full">
                  @php $v1 = image_variants('originals/Llanta-radial-para-manipuladores-y-cargadores-de-uso-rudo-con-cargas-pesadas.jpg'); @endphp
                  <x-responsive-image
                    :variants="$v1"
                    alt="Llantas TH400"
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
          <div class="mx-auto flex w-full min-w-[357px] bg-[#00063a] p-[15px] min-h-[56px] items-center justify-center">
            <h2 class="justify-center m-0 p-0 font-['Roboto',sans-serif] text-[26px] leading-[26px] font-semibold text-white">
              <a href="{{ url('/llantas-para-manipulador-telescopico/th400') }}" class="text-white no-underline">
                TH400
              </a>
            </h2>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>



        <!-- Spacer 50 -->
        <div class="w-full mb-5">
          <div class="lg:h-[50px] h-[25px]"></div>
        </div>


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

@endsection
