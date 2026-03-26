<!doctype html>
<html lang="es-MX" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
  <link rel="dns-prefetch" href="//www.googletagmanager.com">
  <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
  <link rel="dns-prefetch" href="//www.google-analytics.com">

  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ 'event': 'dl.init', 'dl.ts': Date.now() });
    window.dataLayer.push({
      'event': 'default_consent',
      'gtm.consented': false,
      'analytics_storage': 'denied',
      'ad_storage': 'denied',
      'ad_user_data': 'denied',
      'ad_personalization': 'denied',
      'functionality_storage': 'granted',
      'security_storage': 'granted'
    });
  </script>

  <script>
    (function(w, d, i, dl){
      var loaded = false;

      function loadGTM() {
        if (loaded) return;
        loaded = true;
        w[dl] = w[dl] || [];
        w[dl].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
        var f = d.getElementsByTagName('script')[0],
            j = d.createElement('script');
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + '&l=' + dl;
        f.parentNode.insertBefore(j, f);
      }

      if ('requestIdleCallback' in w) {
        requestIdleCallback(loadGTM, { timeout: 3000 });
      } else {
        setTimeout(loadGTM, 2000);
      }

      ['click','touchstart','keydown','scroll'].forEach(function(evt){
        w.addEventListener(evt, loadGTM, { once: true, passive: true });
      });
    })(window, document, 'GTM-5FQ97FX', 'dataLayer');
  </script>

  <title>@yield('title', 'Llantas para Montacargas – BSH')</title>
  <meta name="description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">

  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title','Llantas para Montacargas – BSH')">
  <meta property="og:description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">
  <meta property="og:url" content="{{ url()->current() }}">

  <script>
    (function (w, d) {
      var loaded = false;

      function loadHubSpot() {
        if (loaded) return;
        if (d.getElementById('hs-script-loader')) {
          loaded = true;
          return;
        }

        loaded = true;

        var s = d.createElement('script');
        s.type = 'text/javascript';
        s.id = 'hs-script-loader';
        s.async = true;
        s.defer = true;
        s.src = 'https://js.hs-scripts.com/7547674.js';
        d.head.appendChild(s);
      }

      // Carga automática diferida
      setTimeout(loadHubSpot, 10000);

      // Carga antes si el usuario interactúa
      ['scroll', 'click', 'touchstart', 'keydown'].forEach(function (evt) {
        w.addEventListener(evt, loadHubSpot, { once: true, passive: true });
      });

      // Si el navegador soporta idle, aprovecha
      if ('requestIdleCallback' in w) {
        requestIdleCallback(loadHubSpot, { timeout: 12000 });
      }
    })(window, document);
  </script>

  @vite(['resources/css/app.css','resources/js/app.js'])
  @stack('styles')
  @yield('structured-data')
</head>
<body class="antialiased text-slate-800">

  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FQ97FX"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>

  @include('partials.header')

  <main class="min-h-[60vh]">
    @yield('content')
  </main>

  @include('partials.footer')
  @stack('scripts')
  <x-whatsapp-widget />
</body>
</html>