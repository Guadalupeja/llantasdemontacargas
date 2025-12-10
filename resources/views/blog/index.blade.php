@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Blog de Llantas para Montacargas | Ruguex')

@section('content')
<div class="py-10">
    <div class="max-w-6xl mx-auto px-4">

        <h1 class="text-3xl md:text-4xl font-bold mb-6">
            Blog
        </h1>

        @if ($posts->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="bg-white shadow-sm rounded-lg overflow-hidden flex flex-col">
                        @if ($post->featured_image)
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <img
                                    src="{{ asset($post->featured_image) }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-56 object-cover"
                                >
                            </a>
                        @endif

                        <div class="p-5 flex-1 flex flex-col">
                            <h2 class="text-lg font-semibold leading-snug mb-2">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                   class="hover:text-orange-600">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <div class="text-xs text-gray-500 mb-3">
                                @if($post->published_at)
                                    {{ $post->published_at->translatedFormat('d \\de F \\de Y') }}
                                @endif
                                · {{ $post->author }}
                                @if($post->category)
                                    · {{ $post->category }}
                                @endif
                            </div>

                            <p class="text-sm text-gray-700 flex-1">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 140) }}
                            </p>

                            <div class="mt-4">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                   class="text-sm font-semibold text-orange-600 hover:underline">
                                    Leer más »
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $posts->links() }} {{-- Paginador Tailwind --}}
            </div>
        @else
            <p>No hay entradas aún.</p>
        @endif
    </div>
</div>
@endsection
