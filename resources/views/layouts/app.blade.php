<!doctype html>
<html lang="es-MX" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Tag Manager -->
    {{-- ========= PRECONEXIONES (baratas y seguras) ========= --}}
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
<link rel="dns-prefetch" href="//www.googletagmanager.com">
<link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
<link rel="dns-prefetch" href="//www.google-analytics.com">

{{-- ========= dataLayer temprano (buffer) ========= --}}
<script>
  window.dataLayer = window.dataLayer || [];
  // Marca de arranque para depuración propia (no es obligatoria)
  window.dataLayer.push({ 'event': 'dl.init', 'dl.ts': Date.now() });

  // (Opcional) Consent Mode por defecto (ajústalo a tu CMP/país)
  // Ver: https://developers.google.com/tag-platform/security/concepts/consent
  window.dataLayer.push({
    'event': 'default_consent',
    'gtm.consented': false,
    'analytics_storage': 'denied',
    'ad_storage': 'denied',
    'ad_user_data': 'denied',
    'ad_personalization': 'denied',
    'functionality_storage': 'granted',
    'security_storage': 'granted',
  });
</script>

{{-- ========= Cargador GTM diferido =========
   Estrategia:
   1) requestIdleCallback -> carga cuando el hilo esté libre
   2) Fallback setTimeout -> ~2s tras primera pintura
   3) Primer interacción -> si el usuario toca/scroll, priorizamos cargar
--}}
<script>
  (function(w, d, i, dl){
    var loaded = false;
    function loadGTM() {
      if (loaded) return; loaded = true;
      w[dl] = w[dl] || [];
      w[dl].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
      var f = d.getElementsByTagName('script')[0],
          j = d.createElement('script');
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + '&l=' + dl;
      f.parentNode.insertBefore(j, f);
    }

    // 1) Cargar cuando el hilo esté ocioso
    if ('requestIdleCallback' in w) {
      requestIdleCallback(loadGTM, { timeout: 3000 });
    } else {
      // 2) Fallback: breve retardo (ajusta 1500–2500ms)
      setTimeout(loadGTM, 2000);
    }

    // 3) Prioriza en primera interacción real
    ['click','touchstart','mousemove','keydown','scroll'].forEach(function(evt){
      w.addEventListener(evt, loadGTM, { once: true, passive: true });
    });
  })(window, document, 'GTM-5FQ97FX', 'dataLayer');
</script>

    <!-- End Google Tag Manager -->


  <title>@yield('title', 'Llantas para Montacargas – BSH')</title>
  <meta name="description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">

  {{-- Open Graph básicos --}}
  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title','Llantas para Montacargas – BSH')">
  <meta property="og:description" content="@yield('meta_description','Llantas sólidas y neumáticas para montacargas y minicargadores. Asesoría, stock y envíos en México.')">
  <meta property="og:url" content="{{ url()->current() }}">

  {{-- Vite assets --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @yield('structured-data') <!-- Sección para datos estructurados -->

</head>
<body class="antialiased text-slate-800">

    <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FQ97FX"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  @include('partials.header')

  <main class="min-h-[60vh]">
    @yield('content')
  </main>

  @include('partials.footer')

</body>
</html>
