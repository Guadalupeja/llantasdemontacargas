@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $post->title . ' | Blog Ruguex')

@section('content')
<div class="py-10">
    <div class="max-w-4xl mx-auto px-4">

        <article class="bg-white shadow-sm rounded-lg overflow-hidden">
            @if ($post->featured_image)
                <img
                    src="{{ asset($post->featured_image) }}"
                    alt="{{ $post->title }}"
                    class="w-full h-72 object-cover"
                >
            @endif

            <div class="p-6 md:p-8">
                <h1 class="text-2xl md:text-3xl font-bold mb-2">
                    {{ $post->title }}
                </h1>

                <div class="text-xs text-gray-500 mb-4">
                    @if($post->published_at)
                        {{ $post->published_at->translatedFormat('d \\de F \\de Y') }}
                    @endif
                    · {{ $post->author }}
                    @if($post->category)
                        · {{ $post->category }}
                    @endif
                    · {{ $comments->count() }} comentarios
                </div>

                <div class="prose prose-neutral max-w-none text-sm md:text-base">
                    {!! nl2br(e($post->content)) !!}
                    {{-- Si después quieres guardar HTML directo (tinymce, CKEditor, etc.), cambiar por: {!! $post->content !!} --}}
                </div>
            </div>
        </article>

        {{-- Prev/Next como en WordPress --}}
        <div class="flex flex-col md:flex-row justify-between text-sm mt-6 gap-4">
            @if($prev)
                <a href="{{ route('blog.show', $prev->slug) }}"
                   class="text-orange-600 hover:underline">
                    ← {{ Str::limit($prev->title, 60) }}
                </a>
            @else
                <span></span>
            @endif

            @if($next)
                <a href="{{ route('blog.show', $next->slug) }}"
                   class="text-orange-600 hover:underline md:text-right">
                    {{ Str::limit($next->title, 60) }} →
                </a>
            @endif
        </div>

        {{-- Comentarios --}}
        <div class="mt-10 bg-white shadow-sm rounded-lg p-6 md:p-8">
            <h2 class="text-lg font-semibold mb-4">Deja una respuesta</h2>
            <p class="text-xs text-gray-500 mb-4">
                Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *
            </p>

            @if (session('success'))
                <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded px-3 py-2">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded px-3 py-2">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('blog.comments.store', $post->slug) }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Comentario *
                    </label>
                    <textarea
                        name="content"
                        rows="4"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500"
                        required>{{ old('content') }}</textarea>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Nombre *
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Correo electrónico *
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Web
                        </label>
                        <input
                            type="url"
                            name="website"
                            value="{{ old('website') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
                    </div>
                </div>

                <div class="flex items-center gap-2 text-xs text-gray-600">
                    <input type="checkbox" id="remember-data" class="rounded border-gray-300">
                    <label for="remember-data">
                        Guarda mi nombre, correo electrónico y web en este navegador para la próxima vez que comente.
                    </label>
                </div>

                <button
                    type="submit"
                    class="mt-2 inline-flex items-center px-5 py-2 rounded-md text-sm font-semibold bg-orange-600 text-white hover:bg-orange-700">
                    Enviar comentario
                </button>
            </form>

            {{-- Lista de comentarios --}}
            @if ($comments->count())
                <div class="mt-8 space-y-4">
                    @foreach ($comments as $comment)
                        <div class="border-t border-gray-200 pt-4">
                            <div class="text-sm font-semibold">
                                {{ $comment->name }}
                                <span class="text-xs text-gray-500">
                                    · {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-700 mt-1">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
