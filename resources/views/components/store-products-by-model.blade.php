@if($products->isNotEmpty())
<section class="relative bg-[#0b0b0b] py-12 md:py-16">
    <div class="mx-auto max-w-[1180px] px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#e76a3e]">
                    {{ $settings['eyebrow'] ?? 'Compra en línea' }}
                </p>

                <h2 class="mt-3 text-3xl font-extrabold leading-tight text-white md:text-4xl">
                    {{ $settings['heading'] ?? 'Productos disponibles en tienda' }}
                </h2>

                <p class="mt-4 max-w-2xl text-sm leading-7 text-white/70 md:text-base">
                    {{ $settings['description'] ?? 'Consulta productos disponibles con precio en MXN y compra en línea.' }}
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a
                    href="{{ $settings['button_url'] ?? 'https://llantasdemontacargas.com/tienda-en-linea/' }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center justify-center rounded-full bg-[#e76a3e] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-black/20 transition hover:opacity-90"
                >
                    {{ $settings['button_label'] ?? 'Ver tienda en línea' }}
                </a>

                <a
                    href="#T7"
                    class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/5 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/10"
                >
                    Solicitar asesoría
                </a>
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($products as $product)
                @php
                    $image = $product['image'] ?? null;
                    $title = $product['title'] ?? 'Producto disponible';
                    $measure = $product['measure'] ?? null;
                    $price = $product['price_label'] ?? $product['price'] ?? 'Consultar precio';
                    $url = $product['url'] ?? '#';
                @endphp

                <article class="group overflow-hidden rounded-[28px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_70px_rgba(0,0,0,0.35)]">
                    <a href="{{ $url }}" target="_blank" rel="noopener" class="block">
                        <div class="relative aspect-[4/3] overflow-hidden bg-[#f4f4f4]">
                            @if($image)
                                <img
                                    src="{{ $image }}"
                                    alt="{{ $title }}"
                                    class="h-full w-full object-contain p-4 transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                    decoding="async"
                                    width="420"
                                    height="315"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-slate-100 px-6 text-center text-sm font-semibold text-slate-500">
                                    Imagen no disponible
                                </div>
                            @endif

                            <span class="absolute left-4 top-4 rounded-full bg-[#e76a3e] px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.08em] text-white shadow">
                                Disponible
                            </span>
                        </div>

                        <div class="flex min-h-[230px] flex-col p-5">
                            @if($measure)
                                <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                                    {{ $measure }}
                                </p>
                            @endif

                            <h3 class="mt-3 line-clamp-3 text-lg font-extrabold leading-6 text-slate-900">
                                {{ $title }}
                            </h3>

                            <p class="mt-4 text-xl font-extrabold text-[#e76a3e]">
                                {{ $price }}
                            </p>

                            <span class="mt-auto inline-flex items-center pt-5 text-sm font-bold text-slate-900">
                                Comprar ahora
                                <svg class="ml-2 h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h9.586L10.293 5.707a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L13.586 11H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.04] p-5 text-center">
            <p class="text-sm leading-6 text-white/75">
                ¿No encuentras tu medida? Podemos ayudarte a validar medida, rin, tipo de operación y disponibilidad.
            </p>

            <a
                href="#T7"
                class="mt-4 inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-bold text-slate-900 transition hover:bg-slate-100"
            >
                Pedir ayuda para elegir mi llanta
            </a>
        </div>
    </div>
</section>
@endif