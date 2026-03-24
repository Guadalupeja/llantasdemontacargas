@php
  $headerLogo = image_variants(
    'originals/ruguex-llantas-para-minicargadores-distrubuidor-trelleborg-1-1.png',
    [320, 420],
    ['webp', 'png']
  );
@endphp

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur">
  <section class="relative hidden md:block bg-black pt-[10px] pb-[9px]">
    <div class="mx-auto flex min-h-[73px] items-center">
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(83)3239-5885" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(83)3239-5885</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(83)3246-2205" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(83)3246-2205</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(22)2227-3866" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(22)2227-3866</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(59)5112-4238" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(59)5112-4238</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(55)5752-1715" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(55)5752-1715</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[12.5%] items-center justify-center">
        <a href="tel://(55)5752-1715" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-phone text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">(55)5752-1715</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[17.5%] items-center justify-center">
        <a href="mailto:ventas@llantasdemontacargas.com" class="flex items-center text-white/90 hover:text-white transition">
          <i class="fa-solid fa-envelope text-[#e76a3e] text-[14px] leading-[14px] w-[1.25em]"></i>
          <span class="pl-[5px] text-[16px]">ventas@llantasdemontacargas.com</span>
        </a>
      </div>
      <div class="relative flex min-h-px basis-[7%] items-center justify-center">
        <div class="ml-auto inline-flex gap-[5px]">
          <a href="https://www.facebook.com/Ruguex-Llantas-para-Montacargas-118660366666792/" target="_blank"
             class="inline-flex h-[28px] w-[28px] items-center justify-center bg-white text-black rounded hover:bg-white/90 transition">
            <span class="sr-only">Facebook</span>
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="https://www.linkedin.com/company/ruguex/" target="_blank"
             class="inline-flex h-[28px] w-[28px] items-center justify-center bg-white text-black rounded hover:bg-white/90 transition">
            <span class="sr-only">LinkedIn</span>
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="relative bg-black px-[5px] py-[10px]">
    <div class="mx-auto flex items-center">
      <div class="relative flex min-h-px md:basis-[13%] items-center">
        <a href="{{ url('/') }}" class="inline-flex items-center p-[10px]">
          <x-responsive-image
            :variants="$headerLogo"
            alt="Ruguex / Trelleborg"
            sizes="100vw"
            class="h-[38px] w-auto"
            fetchpriority="high"
            loading="eager"
          />
        </a>
      </div>

      <div class="relative flex min-h-px basis-[87%] items-center">
        <div class="relative flex w-full items-center p-[10px]">
          <input id="nav-toggle" type="checkbox" class="peer hidden" />

          <label for="nav-toggle"
                 aria-controls="mobile-nav"
                 class="relative z-[1100] ml-auto inline-flex items-center gap-2 rounded-md border border-black bg-[#e76a3e] px-[14px] py-[10px] lg:hidden shadow-sm hover:brightness-105 active:brightness-95 transition select-none">
            <span class="sr-only">Abrir menú</span>
            <span class="relative block h-5 w-6">
              <span class="absolute left-0 top-0 h-[2px] w-6 bg-white transition-all duration-300 peer-checked:top-[10px] peer-checked:rotate-45"></span>
              <span class="absolute left-0 top-[10px] h-[2px] w-6 bg-white transition-all duration-300 peer-checked:opacity-0"></span>
              <span class="absolute left-0 bottom-0 h-[2px] w-6 bg-white transition-all duration-300 peer-checked:bottom-[10px] peer-checked:-rotate-45"></span>
            </span>
            <span class="text-[13px] font-semibold uppercase tracking-[1px] text-white">Menú</span>
          </label>

          <label for="nav-toggle"
                 class="pointer-events-none fixed inset-0 z-[900] bg-black/50 opacity-0 transition lg:hidden peer-checked:pointer-events-auto peer-checked:opacity-100"></label>

          <nav class="relative z-[1000] hidden w-full lg:block">
            <ul class="m-0 flex h-[56px] list-none items-center justify-between p-0">
              <li><a href="{{ url('/') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-gray-400 hover:text-white">Inicio</a></li>
              <li><a href="{{ url('/llantas-para-montacargas') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">Montacargas</a></li>
              <li><a href="{{ url('/tienda-en-linea') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">Compra en línea</a></li>
              <li><a href="{{ url('/rines-para-montacargas-y-cargadores') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">Rines para tu maquinaria</a></li>
              <li class="relative group">
                <a href="#" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">
                  Ruguex <i class="fa-solid fa-chevron-down ml-[6px] text-[11px] leading-[11px]"></i>
                </a>
                <ul class="invisible absolute left-0 top-full z-[999] min-w-[220px] list-none border border-[#DADADA] bg-[#F4F4F4] p-[15px] opacity-0 shadow-[0_10px_30px_rgba(45,45,45,0.2)] transition-opacity transition-visibility duration-300 group-hover:visible group-hover:opacity-100">
                  <li><a href="{{ url('/somos') }}" class="block rounded px-[15px] py-[10px] text-[14px] text-black hover:bg-black/5">Quienes somos</a></li>
                  <li><a href="{{ url('/somos#trelleborg') }}" class="block rounded px-[15px] py-[10px] text-[14px] text-black hover:bg-black/5">Acerca del fabricante</a></li>
                </ul>
              </li>
              <li><a href="{{ url('/blog') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">Blog</a></li>
              <li><a href="{{ url('/contacto') }}" class="flex h-[56px] items-center px-3 text-[15.5px] font-medium tracking-[-0.7px] text-white hover:text-white/80">Contacto</a></li>
            </ul>
          </nav>

          <div id="mobile-nav"
               class="absolute left-0 right-0 top-full z-[1000] hidden origin-top scale-95 opacity-0 peer-checked:block peer-checked:scale-100 peer-checked:opacity-100 lg:hidden">
            <ul class="mx-2 mt-2 space-y-1 rounded-2xl border border-white/10 bg-black/80 p-2 text-white shadow-2xl backdrop-blur-md">
              <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/') }}"><i class="fa-solid fa-house text-white/70"></i> Inicio</a></li>
              <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/llantas-para-montacargas') }}"><i class="fa-solid fa-truck-ramp-box text-white/70"></i> Montacargas</a></li>
              <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/tienda-en-linea') }}"><i class="fa-solid fa-bag-shopping text-white/70"></i> Compra en línea</a></li>
              <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/rines-para-montacargas-y-cargadores') }}"><i class="fa-solid fa-circle-notch text-white/70"></i> Rines para tu maquinaria</a></li>

              <li class="pt-2">
                <span class="block px-3 pb-1 text-xs uppercase tracking-wide text-white/60">Ruguex</span>
                <ul class="space-y-1">
                  <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/somos') }}"><i class="fa-solid fa-user-group text-white/70"></i> Quienes somos</a></li>
                  <li><a class="flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-white/10" href="{{ url('/somos#trelleborg') }}"><i class="fa-solid fa-industry text-white/70"></i> Acerca del fabricante</a></li>
                </ul>
              </li>

              <li class="pt-2 grid grid-cols-2 gap-2">
                <a class="block rounded-lg bg-[#FF6000] px-3 py-2 text-center font-semibold hover:brightness-110" href="{{ url('/blog-2') }}">Blog</a>
                <a class="block rounded-lg bg-white/10 px-3 py-2 text-center font-semibold hover:bg-white/15" href="{{ url('/contacto') }}">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</header>