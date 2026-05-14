@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $post->title . ' | Blog Ruguex')

@section('content')
<section class="bg-neutral-100 py-10 md:py-14">
    <div class="mx-auto max-w-5xl px-4">

        {{-- Breadcrumb --}}
        <nav class="mb-4 text-[11px] text-gray-500">
            <a href="{{ url('/') }}" class="hover:text-orange-600">Inicio</a>
            <span class="mx-1">/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-orange-600">Blog</a>
            <span class="mx-1">/</span>
            <span class="line-clamp-1 text-gray-600">{{ $post->title }}</span>
        </nav>

        <article class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
            {{-- Imagen principal --}}
            <div class="relative">
                <div class="aspect-[16/7] w-full overflow-hidden bg-neutral-200">
                    <img
                        src="{{ $post->featured_image_url }}"
                        alt="{{ $post->title }}"
                        class="h-full w-full object-cover"
                    >
                </div>

                @if ($post->category)
                    <span class="absolute bottom-3 left-3 inline-flex items-center rounded-full bg-black/70 px-3 py-1 text-[11px] font-medium text-white backdrop-blur-sm">
                        {{ $post->category }}
                    </span>
                @endif
            </div>

            <div class="px-5 pb-8 pt-6 md:px-8 md:pb-10">
                {{-- Meta --}}
                <div class="mb-4 flex flex-wrap items-center gap-x-3 gap-y-1 text-[11px] text-gray-500">
                    @if($post->published_at)
                        <span class="inline-flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
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
                <h1 class="mb-8 text-3xl font-extrabold leading-tight text-gray-900 md:text-4xl">
                    {{ $post->title }}
                </h1>

                {{-- Contenido --}}
                <div class="blog-content max-w-none text-gray-700">
                    {!! $post->content !!}
                </div>
            </div>
        </article>

        {{-- Prev / Next --}}
        <div class="mt-6 flex flex-col justify-between gap-4 text-xs md:flex-row md:text-sm">
            @if($prev)
                <a
                    href="{{ route('blog.show', $prev->slug) }}"
                    class="inline-flex flex-1 items-start gap-2 text-gray-700 hover:text-orange-600 md:flex-none"
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
                    class="inline-flex flex-1 items-start gap-2 text-right text-gray-700 hover:text-orange-600 md:flex-none md:justify-end"
                >
                    <span class="font-medium">{{ Str::limit($next->title, 80) }}</span>
                    <span class="mt-[2px]">→</span>
                </a>
            @endif
        </div>

        {{-- Comentarios --}}
        <section class="mt-10 rounded-2xl border border-gray-100 bg-white px-5 py-6 shadow-sm md:px-8 md:py-8">
            <h2 class="mb-1 text-lg font-semibold text-gray-900">
                Deja una respuesta
            </h2>
            <p class="mb-5 text-[11px] text-gray-500">
                Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *
            </p>

            @if (session('success'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-3 py-2 text-xs text-green-800 md:text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-xs text-red-800 md:text-sm">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.comments.store', $post->slug) }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="mb-1 block text-xs font-semibold text-gray-800">
                        Comentario *
                    </label>
                    <textarea
                        name="content"
                        rows="4"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-orange-500 focus:outline-none focus:ring-1 focus:ring-orange-500"
                        required
                    >{{ old('content') }}</textarea>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-gray-800">
                            Nombre *
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-orange-500 focus:outline-none focus:ring-1 focus:ring-orange-500"
                            required
                        >
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-gray-800">
                            Correo electrónico *
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-orange-500 focus:outline-none focus:ring-1 focus:ring-orange-500"
                            required
                        >
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold text-gray-800">
                            Web
                        </label>
                        <input
                            type="url"
                            name="website"
                            value="{{ old('website') }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-orange-500 focus:outline-none focus:ring-1 focus:ring-orange-500"
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
                    class="mt-2 inline-flex items-center rounded-full bg-orange-600 px-5 py-2.5 text-xs font-semibold text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-1 md:text-sm"
                >
                    Enviar comentario
                </button>
            </form>

            @if ($comments->count())
                <div class="mt-8 space-y-4 border-t border-gray-200 pt-5">
                    @foreach ($comments as $comment)
                        <div class="border-b border-gray-100 pb-4 last:border-b-0 last:pb-0">
                            <div class="mb-1 flex items-center justify-between">
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

<style>
.blog-content {
    font-size: 18px;
    line-height: 1.9;
    color: #374151;
}

.blog-content p {
    margin: 0 0 1.5rem 0;
}

.blog-content h2 {
    margin-top: 3rem;
    margin-bottom: 1rem;
    font-size: 1.9rem;
    line-height: 1.2;
    font-weight: 800;
    color: #111827;
}

.blog-content h3 {
    margin-top: 2rem;
    margin-bottom: .75rem;
    font-size: 1.35rem;
    line-height: 1.3;
    font-weight: 700;
    color: #111827;
}

.blog-content ul,
.blog-content ol {
    margin: 1.5rem 0;
    padding-left: 1.5rem;
}

.blog-content li {
    margin-bottom: .75rem;
}

.blog-content a {
    color: #e76a3e;
    text-decoration: underline;
}

.blog-content strong {
    font-weight: 700;
    color: #111827;
}

.blog-content blockquote {
    margin: 2rem 0;
    padding: 1rem 1.25rem;
    border-left: 4px solid #e76a3e;
    background: #fff7f3;
    color: #374151;
    border-radius: 0.75rem;
}
</style>
@endsection