@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Blog de llantas para montacargas | Ruguex')

@section('content')
<section class="py-10 md:py-14 bg-neutral-100">
    <div class="max-w-6xl mx-auto px-4">
        {{-- Título + subtítulo --}}
        <header class="mb-8 md:mb-10">
            <p class="text-xs font-semibold tracking-[.25em] text-orange-600 uppercase">
                Blog Ruguex
            </p>
            <h1 class="text-3xl md:text-4xl font-extrabold mt-2 mb-3 text-gray-900">
                Optimiza el rendimiento de tus montacargas
            </h1>
            <p class="text-sm md:text-base text-gray-600 max-w-2xl">
                Consejos, guías y casos reales sobre llantas sólidas, neumáticas y de poliuretano
                para montacargas y minicargadores Trelleborg en México.
            </p>
        </header>

        @if ($posts->count())
            {{-- Grid de tarjetas --}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article
                        class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col transition-all duration-200 hover:-translate-y-1 hover:shadow-lg"
                    >
                        {{-- Imagen --}}
                        <a href="{{ route('blog.show', $post->slug) }}" class="block relative overflow-hidden">
                            <div class="aspect-[4/3] w-full overflow-hidden">
                                <img
                                    src="{{ $post->featured_image_url }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                    loading="lazy"
                                >
                            </div>

                            {{-- Categoría --}}
                            @if ($post->category)
                                <span
                                    class="absolute top-3 left-3 inline-flex items-center rounded-full bg-black/70 px-3 py-1 text-[11px] font-medium text-white backdrop-blur-sm"
                                >
                                    {{ $post->category }}
                                </span>
                            @endif
                        </a>

                        {{-- Contenido --}}
                        <div class="p-5 flex-1 flex flex-col">
                            {{-- Meta --}}
                            <div class="flex items-center gap-2 text-[11px] text-gray-500 mb-2">
                                @if ($post->published_at)
                                    <span class="inline-flex items-center gap-1">
                                        <span class="w-1 h-1 rounded-full bg-orange-500"></span>
                                        {{ $post->published_at->translatedFormat('d \\de F \\de Y') }}
                                    </span>
                                @endif

                                <span>·</span>

                                <span>
                                    Por <span class="font-semibold text-gray-700">{{ $post->author }}</span>
                                </span>
                            </div>

                            {{-- Título --}}
                            <h2 class="text-base md:text-lg font-semibold leading-snug mb-2 text-gray-900 line-clamp-2">
                                <a
                                    href="{{ route('blog.show', $post->slug) }}"
                                    class="group-hover:text-orange-600 transition-colors"
                                >
                                    {{ $post->title }}
                                </a>
                            </h2>

                            {{-- Extracto --}}
                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 140) }}
                            </p>

                            {{-- CTA --}}
                            <div class="mt-auto flex items-center justify-between">
                                <a
                                    href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center text-xs font-semibold text-orange-600 hover:text-orange-700"
                                >
                                    Leer artículo
                                    <span class="ml-1 inline-block translate-y-[1px]">»</span>
                                </a>

                                <span class="text-[11px] text-gray-400">
                                    {{ $post->comments()->count() }} comentarios
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="mt-10">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        @else
            <p class="text-sm text-gray-600">
                Aún no hay artículos publicados.
            </p>
        @endif
    </div>
</section>
@endsection
