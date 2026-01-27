@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $post->title . ' | Blog Ruguex')

@section('content')
<section class="py-10 md:py-14 bg-neutral-100">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Breadcrumb simple --}}
        <nav class="text-[11px] text-gray-500 mb-4">
            <a href="{{ url('/') }}" class="hover:text-orange-600">Inicio</a>
            <span class="mx-1">/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-orange-600">Blog</a>
            <span class="mx-1">/</span>
            <span class="text-gray-600 line-clamp-1">{{ $post->title }}</span>
        </nav>

        <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            {{-- Imagen principal --}}
            <div class="relative">
                <div class="aspect-[16/7] w-full bg-neutral-200 overflow-hidden">
                    <img
                        src="{{ $post->featured_image_url }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>

                @if ($post->category)
                    <span
                        class="absolute bottom-3 left-3 inline-flex items-center rounded-full bg-black/70 px-3 py-1 text-[11px] font-medium text-white backdrop-blur-sm"
                    >
                        {{ $post->category }}
                    </span>
                @endif
            </div>

            <div class="px-5 md:px-8 pt-6 pb-8 md:pb-10">
                {{-- Meta principal --}}
                <div class="mb-3 flex flex-wrap items-center gap-x-3 gap-y-1 text-[11px] text-gray-500">
                    @if($post->published_at)
                        <span class="inline-flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                            {{ $post->published_at->translatedFormat('d \\de F \\de Y') }}
                        </span>
                    @endif

                    <span>·</span>

                    <span>
                        Por <span class="font-semibold text-gray-700">{{ $post->author }}</span>
                    </span>

                    <span>·</span>

                    <span>{{ $comments->count() }} comentarios</span>
                </div>

                {{-- Título --}}
                <h1 class="text-2xl md:text-3xl font-extrabold mb-4 text-gray-900">
                    {{ $post->title }}
                </h1>

                {{-- Texto del post --}}
                <div class="prose prose-sm md:prose-base prose-neutral max-w-none leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </article>

        {{-- Prev / Next --}}
        <div class="mt-6 flex flex-col md:flex-row justify-between gap-4 text-xs md:text-sm">
            @if($prev)
                <a
                    href="{{ route('blog.show', $prev->slug) }}"
                    class="flex-1 md:flex-none inline-flex items-start gap-2 text-gray-700 hover:text-orange-600"
                >
                    <span class="mt-[2px]">←</span>
                    <span class="font-medium">{{ Str::limit($prev->title, 80) }}</span>
                </a>
            @else
                <span class="flex-1"></span>
            @endif

            @if($next)
                <a
                    href="{{ route('blog.show', $next->slug) }}"
                    class="flex-1 md:flex-none inline-flex items-start gap-2 text-right text-gray-700 hover:text-orange-600 md:justify-end"
                >
                    <span class="font-medium">{{ Str::limit($next->title, 80) }}</span>
                    <span class="mt-[2px]">→</span>
                </a>
            @endif
        </div>

        {{-- Sección comentarios --}}
        <section class="mt-10 bg-white rounded-2xl shadow-sm border border-gray-100 px-5 md:px-8 py-6 md:py-8">
            <h2 class="text-lg font-semibold mb-1 text-gray-900">
                Deja una respuesta
            </h2>
            <p class="text-[11px] text-gray-500 mb-5">
                Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *
            </p>

            {{-- Mensajes --}}
            @if (session('success'))
                <div class="mb-4 text-xs md:text-sm text-green-800 bg-green-50 border border-green-200 rounded-md px-3 py-2">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-xs md:text-sm text-red-800 bg-red-50 border border-red-200 rounded-md px-3 py-2">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('blog.comments.store', $post->slug) }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Comentario *
                    </label>
                    <textarea
                        name="content"
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                        required
                    >{{ old('content') }}</textarea>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-semibold mb-1 text-gray-800">
                            Nombre *
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1 text-gray-800">
                            Correo electrónico *
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-semibold mb-1 text-gray-800">
                            Web
                        </label>
                        <input
                            type="url"
                            name="website"
                            value="{{ old('website') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                        >
                    </div>
                </div>

                <div class="flex items-start gap-2 text-[11px] text-gray-600">
                    <input
                        type="checkbox"
                        id="remember-data"
                        class="mt-[3px] rounded border-gray-300 text-orange-600 focus:ring-orange-500"
                    >
                    <label for="remember-data">
                        Guarda mi nombre, correo electrónico y web en este navegador para la próxima vez que comente.
                    </label>
                </div>

                <button
                    type="submit"
                    class="mt-2 inline-flex items-center px-5 py-2.5 rounded-full text-xs md:text-sm font-semibold bg-orange-600 text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-1"
                >
                    Enviar comentario
                </button>
            </form>

            {{-- Lista de comentarios --}}
            @if ($comments->count())
                <div class="mt-8 border-t border-gray-200 pt-5 space-y-4">
                    @foreach ($comments as $comment)
                        <div class="pb-4 border-b border-gray-100 last:border-b-0 last:pb-0">
                            <div class="flex items-center justify-between mb-1">
                                <div class="text-sm font-semibold text-gray-900">
                                    {{ $comment->name }}
                                </div>
                                <div class="text-[11px] text-gray-500">
                                    {{ $comment->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <p class="text-sm text-gray-700">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</section>
@endsection
