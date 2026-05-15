<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', config('app.name', 'Laravel'))</title>

  @hasSection('meta_description')
    <meta name="description" content="@yield('meta_description')">
  @endif

  @yield('structured-data')

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
  <link rel="dns-prefetch" href="//www.googletagmanager.com">
  <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
  <link rel="dns-prefetch" href="//www.google-analytics.com">

  {{-- DataLayer inicial --}}
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ event: 'dl.init', 'dl.ts': Date.now() });

    window.dataLayer.push({
      event: 'default_consent',
      'gtm.consented': false,
      'analytics_storage': 'denied',
      'ad_storage': 'denied',
      'ad_user_data': 'denied',
      'ad_personalization': 'denied',
      'functionality_storage': 'granted',
      'security_storage': 'granted'
    });
  </script>

  {{-- Google Tag Manager: carga inmediata async para campañas y conversiones --}}
  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){
      w[l]=w[l]||[];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });

      var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),
          dl=l!='dataLayer' ? '&l='+l : '';

      j.async=true;
      j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
      f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5FQ97FX');
  </script>
  <!-- End Google Tag Manager -->

  {{-- HubSpot global diferido --}}
  <script>
    (function (w, d) {
      var hubspotLoaded = false;
      var hubspotAutoTimer = null;
      var passiveOptions = { passive: true };

      function loadHubSpot() {
        if (hubspotLoaded) return;

        if (d.getElementById('hs-script-loader')) {
          hubspotLoaded = true;
          return;
        }

        hubspotLoaded = true;

        var s = d.createElement('script');
        s.type = 'text/javascript';
        s.id = 'hs-script-loader';
        s.async = true;
        s.defer = true;
        s.src = 'https://js.hs-scripts.com/7547674.js';

        d.body ? d.body.appendChild(s) : d.head.appendChild(s);

        if (hubspotAutoTimer) {
          clearTimeout(hubspotAutoTimer);
        }

        w.removeEventListener('scroll', loadHubSpot, passiveOptions);
        w.removeEventListener('click', loadHubSpot, passiveOptions);
        w.removeEventListener('touchstart', loadHubSpot, passiveOptions);
        w.removeEventListener('keydown', loadHubSpot);
        w.removeEventListener('mousemove', loadHubSpot);
      }

      w.loadHubSpot = loadHubSpot;

      w.addEventListener('scroll', loadHubSpot, passiveOptions);
      w.addEventListener('click', loadHubSpot, passiveOptions);
      w.addEventListener('touchstart', loadHubSpot, passiveOptions);
      w.addEventListener('keydown', loadHubSpot);
      w.addEventListener('mousemove', loadHubSpot);

      w.addEventListener('load', function () {
        hubspotAutoTimer = setTimeout(loadHubSpot, 12000);
      });
    })(window, document);
  </script>

  {{-- HubSpot Forms loader diferido para formularios embebidos --}}
  <script>
    (function (w, d) {
      var formsScriptLoaded = false;
      var formsCallbacks = [];

      function runCallbacks() {
        while (formsCallbacks.length) {
          var callback = formsCallbacks.shift();

          if (typeof callback === 'function') {
            callback();
          }
        }
      }

      function loadHubSpotForms(callback) {
        if (typeof callback === 'function') {
          formsCallbacks.push(callback);
        }

        if (w.hbspt && w.hbspt.forms && w.hbspt.forms.create) {
          runCallbacks();
          return;
        }

        if (formsScriptLoaded) return;

        formsScriptLoaded = true;

        var s = d.createElement('script');
        s.type = 'text/javascript';
        s.charset = 'utf-8';
        s.async = true;
        s.defer = true;
        s.src = 'https://js.hsforms.net/forms/shell.js';

        s.onload = function () {
          runCallbacks();
        };

        d.body ? d.body.appendChild(s) : d.head.appendChild(s);
      }

      w.loadHubSpotForms = loadHubSpotForms;
    })(window, document);
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('head')
</head>

<body class="font-sans antialiased">
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe
      src="https://www.googletagmanager.com/ns.html?id=GTM-5FQ97FX"
      height="0"
      width="0"
      style="display:none;visibility:hidden"
    ></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  @include('partials.header')

  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @hasSection('header')
      <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          @yield('header')
        </div>
      </header>
    @endif

    <main>
      @yield('content')
    </main>
  </div>

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
    role="region"
    aria-label="Formulario de cotización"
  >
    <div class="relative mx-auto flex max-w-[1140px]">
      <div class="relative box-border flex min-h-px w-full">
        <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
          <div class="pointer-events-none absolute inset-0 bg-black/35" aria-hidden="true"></div>

          <div class="w-full">
            <div class="h-[104px]"></div>
          </div>

          <div class="z-10 w-full text-center mb-5">
            <div class="m-0 p-0 font-['Roboto',sans-serif] text-white lg:text-[42px] text-[22px] leading-[42px] font-semibold">
              COTIZA EN LINEA O SOLICITA UNA ASESORIA:
            </div>
          </div>

          <div class="z-10 w-full mb-5">
            <div
              id="hubspot-form-contacto"
              data-hs-forms-root="true"
            >
              <noscript>
                <p style="color:#fff;">Activa JavaScript para ver el formulario de cotización.</p>
              </noscript>
            </div>

            <script>
              (function () {
                var formCreated = false;
                var targetSelector = '#hubspot-form-contacto';

                function createForm() {
                  if (formCreated) return;
                  formCreated = true;

                  window.loadHubSpotForms(function () {
                    if (window.hbspt && hbspt.forms && hbspt.forms.create) {
                      hbspt.forms.create({
                        portalId: '7547674',
                        formId: '26f426a7-e620-42df-98a3-43e10a899b6c',
                        target: targetSelector
                      });
                    }
                  });
                }

                var formContainer = document.querySelector(targetSelector);

                if ('IntersectionObserver' in window && formContainer) {
                  var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                      if (entry.isIntersecting) {
                        createForm();
                        observer.disconnect();
                      }
                    });
                  }, {
                    rootMargin: '300px 0px'
                  });

                  observer.observe(formContainer);
                } else {
                  window.addEventListener('load', function () {
                    setTimeout(createForm, 3000);
                  });
                }
              })();
            </script>
          </div>

          <div class="w-full">
            <div class="h-[104px]"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  @stack('scripts')

  @include('partials.footer')

  <x-whatsapp-widget />

  @php
    $chatbotJsonPath = resource_path('data/chatbot/montacargas-products.json');

    $chatbotProducts = file_exists($chatbotJsonPath)
        ? json_decode(file_get_contents($chatbotJsonPath), true)
        : ['products' => []];
  @endphp

  <x-chatbot-montacargas :products="$chatbotProducts" />
</body>
</html>