<!doctype html>
<html lang="es-MX" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

  <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
  <link rel="dns-prefetch" href="//www.googletagmanager.com">
  <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
  <link rel="dns-prefetch" href="//www.google-analytics.com">

  {{-- DataLayer inicial --}}
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ event: 'dl.init', 'dl.ts': Date.now() });

    /*
      Nota:
      Si no tienes CMP real de consentimiento, dejar todo en denied puede limitar medición.
      Lo conservo porque ya lo tenías configurado así.
    */
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

  {{-- Google Tag Manager: carga inmediata async para no afectar Google Ads --}}
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

  <title>@yield('title', 'Llantas para Montacargas – BSH')</title>
  <meta name="description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">

  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title','Llantas para Montacargas – BSH')">
  <meta property="og:description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">
  <meta property="og:url" content="{{ url()->current() }}">

  {{-- Loader diferido de HubSpot: NO carga al inicio --}}
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

      /*
        Disponible globalmente por si un botón/formulario necesita cargar HubSpot manualmente.
      */
      w.loadHubSpot = loadHubSpot;

      /*
        Carga antes si el usuario interactúa.
      */
      w.addEventListener('scroll', loadHubSpot, passiveOptions);
      w.addEventListener('click', loadHubSpot, passiveOptions);
      w.addEventListener('touchstart', loadHubSpot, passiveOptions);
      w.addEventListener('keydown', loadHubSpot);
      w.addEventListener('mousemove', loadHubSpot);

      /*
        Carga automática tardía para no castigar tanto PageSpeed.
        Puedes subirlo a 15000 si quieres ser más agresiva con rendimiento.
      */
      w.addEventListener('load', function () {
        hubspotAutoTimer = setTimeout(loadHubSpot, 12000);
      });
    })(window, document);
  </script>

  @vite(['resources/css/app.css','resources/js/app.js'])
  @stack('styles')
  @yield('structured-data')
</head>

<body class="antialiased text-slate-800">
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

  <main class="min-h-[60vh]">
    @yield('content')
  </main>

  @include('partials.footer')

  @stack('scripts')

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