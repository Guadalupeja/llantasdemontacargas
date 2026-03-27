<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

  <title>@yield('title', config('app.name', 'Laravel'))</title>
  @hasSection('meta_description')
    <meta name="description" content="@yield('meta_description')">
  @endif

  @yield('structured-data')

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
      setTimeout(loadHubSpot, 6000);

      // Carga antes si hay interacción
      ['scroll', 'click', 'touchstart', 'keydown'].forEach(function (evt) {
        w.addEventListener(evt, loadHubSpot, { once: true, passive: true });
      });

      // Si el navegador soporta idle, aprovecha
      if ('requestIdleCallback' in w) {
        requestIdleCallback(loadHubSpot, { timeout: 7000 });
      }
    })(window, document);
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('head')
  @include('partials.header')
</head>

<body class="font-sans antialiased">
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
</body>
</html>