@extends('layouts.app')

@section('title', $mode === 'create' ? 'Nueva entrada' : 'Editar entrada')

@section('content')
<section class="py-8 md:py-10 bg-neutral-100">
    <div class="max-w-4xl mx-auto px-4">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    {{ $mode === 'create' ? 'Nueva entrada' : 'Editar entrada' }}
                </h1>
                <p class="text-xs text-gray-500 mt-1">
                    Completa la información para {{ $mode === 'create' ? 'crear' : 'actualizar' }} el artículo del blog.
                </p>
            </div>

            <a
                href="{{ route('admin.posts.index') }}"
                class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border border-gray-300 text-gray-700 hover:bg-gray-50"
            >
                Volver al listado
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-xs md:text-sm text-red-800 bg-red-50 border border-red-200 rounded-md px-3 py-2">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ $mode === 'create' ? route('admin.posts.store') : route('admin.posts.update', $post) }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow-sm border border-gray-100 px-5 md:px-8 py-6 md:py-8 space-y-5"
        >
            @csrf
            @if($mode === 'edit')
                @method('PUT')
            @endif

            {{-- Título y slug --}}
            <div class="grid md:grid-cols-3 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Título *
                    </label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $post->title) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                        required
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Slug (opcional)
                    </label>
                    <input
                        type="text"
                        name="slug"
                        value="{{ old('slug', $post->slug) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="optimiza-rendimiento-montacargas"
                    >
                    <p class="mt-1 text-[10px] text-gray-500">
                        Si lo dejas vacío, se generará automáticamente a partir del título.
                    </p>
                </div>
            </div>

            {{-- Extracto --}}
            <div>
                <label class="block text-xs font-semibold mb-1 text-gray-800">
                    Extracto
                </label>
                <textarea
                    name="excerpt"
                    rows="2"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                >{{ old('excerpt', $post->excerpt) }}</textarea>
                <p class="mt-1 text-[10px] text-gray-500">
                    Se muestra en la tarjeta del blog y resultados de Google como descripción corta.
                </p>
            </div>

            {{-- Contenido --}}
            <div>
                <label class="block text-xs font-semibold mb-1 text-gray-800">
                    Contenido *
                </label>
                <textarea
                    name="content"
                    rows="10"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                    required
                >{{ old('content', $post->content) }}</textarea>
            </div>

            {{-- Meta: autor, categoría, fecha, estado --}}
            <div class="grid md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Autor
                    </label>
                    <input
                        type="text"
                        name="author"
                        value="{{ old('author', $post->author ?? 'llantasbsh') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Categoría
                    </label>
                    <input
                        type="text"
                        name="category"
                        value="{{ old('category', $post->category) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Uncategorized"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Fecha de publicación
                    </label>
                    <input
                        type="datetime-local"
                        name="published_at"
                        value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500"
                    >
                </div>
                <div class="flex items-center md:items-end">
                    <label class="inline-flex items-center gap-2 text-xs font-semibold text-gray-800">
                        <input
                            type="checkbox"
                            name="is_published"
                            value="1"
                            {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-orange-600 focus:ring-orange-500"
                        >
                        Publicado
                    </label>
                </div>
            </div>

            {{-- Imagen destacada --}}
            <div class="grid md:grid-cols-[2fr,1fr] gap-4 items-start">
                <div>
                    <label class="block text-xs font-semibold mb-1 text-gray-800">
                        Imagen destacada
                    </label>
                    <input
                        type="file"
                        name="featured_image"
                        accept="image/*"
                        class="w-full text-sm text-gray-700 file:text-xs file:font-semibold file:px-3 file:py-1.5 file:rounded-full file:border-0 file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100"
                    >
                    <p class="mt-1 text-[10px] text-gray-500">
                        Formatos recomendados: JPG, WebP. Tamaño sugerido: 1200x675 px (~16:9).
                    </p>
                </div>
                <div class="flex flex-col items-start gap-2">
                    <span class="text-[11px] font-semibold text-gray-700">
                        Vista previa
                    </span>
                    <div class="w-32 h-20 rounded-lg overflow-hidden bg-neutral-100 border border-gray-200">
                        <img
                            src="{{ $post->exists ? $post->featured_image_url : asset('img/blog/default-blog.jpg') }}"
                            alt=""
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a
                    href="{{ route('admin.posts.index') }}"
                    class="inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold border border-gray-300 text-gray-700 hover:bg-gray-50"
                >
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center px-5 py-2 rounded-full text-xs font-semibold bg-orange-600 text-white hover:bg-orange-700"
                >
                    {{ $mode === 'create' ? 'Crear entrada' : 'Guardar cambios' }}
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
