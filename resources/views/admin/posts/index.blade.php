@extends('layouts.app')

@section('title', 'Entradas del blog')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Entradas del blog
    </h2>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensajes flash --}}
            @if (session('success'))
                <div class="mb-4 text-sm text-green-800 bg-green-50 border border-green-200 rounded-md px-4 py-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    Listado de entradas
                </h3>

                <a
                    href="{{ route('admin.posts.create') }}"
                    class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold bg-orange-600 text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                >
                    Nueva entrada
                </a>
            </div>

            {{-- Tarjeta con tabla --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700 text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    <th class="px-3 py-2 text-left">Título</th>
                                    <th class="px-3 py-2 text-left hidden md:table-cell">Slug</th>
                                    <th class="px-3 py-2 text-left">Publicado</th>
                                    <th class="px-3 py-2 text-left hidden md:table-cell">Categoría</th>
                                    <th class="px-3 py-2 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr class="border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                                        <td class="px-3 py-3 align-top">
                                            <div class="flex items-center gap-3">
                                                <img
                                                    src="{{ $post->featured_image_url }}"
                                                    alt=""
                                                    class="w-10 h-10 rounded-lg object-cover hidden sm:block"
                                                >
                                                <div>
                                                    <div class="font-semibold text-gray-900 dark:text-gray-100">
                                                        {{ $post->title }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">
                                                        {{ $post->author }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-3 py-3 align-top text-xs text-gray-500 hidden md:table-cell">
                                            {{ $post->slug }}
                                        </td>

                                        <td class="px-3 py-3 align-top text-xs text-gray-600">
                                            @if($post->published_at)
                                                {{ $post->published_at->format('Y-m-d H:i') }}<br>
                                            @endif
                                            <span class="inline-flex items-center mt-1">
                                                <span class="w-2 h-2 rounded-full {{ $post->is_published ? 'bg-green-500' : 'bg-gray-400' }} mr-1"></span>
                                                {{ $post->is_published ? 'Publicado' : 'Borrador' }}
                                            </span>
                                        </td>

                                        <td class="px-3 py-3 align-top text-xs text-gray-600 hidden md:table-cell">
                                            {{ $post->category ?? '—' }}
                                        </td>

                                        <td class="px-3 py-3 align-top">
                                            <div class="flex justify-end gap-2">
                                                <a
                                                    href="{{ route('admin.posts.edit', $post) }}"
                                                    class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-semibold border border-gray-300 text-gray-700 hover:border-orange-500 hover:text-orange-600"
                                                >
                                                    Editar
                                                </a>

                                                <form
                                                    action="{{ route('admin.posts.destroy', $post) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Eliminar esta entrada?');"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center px-2 py-1 rounded-full text-[11px] font-semibold border border-red-200 text-red-600 hover:bg-red-50"
                                                    >
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-3 py-6 text-center text-sm text-gray-500">
                                            No hay entradas aún.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
