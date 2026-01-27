<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostAdminController extends Controller
{
    public function index()
    {
    
     $posts = Post::latest()->paginate(10);

    return view('admin.posts.index', compact('posts'));

    }

    public function create()
    {
        return view('admin.posts.form', [
            'post' => new Post(),
            'mode' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255'],
            'excerpt'        => ['nullable', 'string'],
            'content'        => ['required', 'string'],
            'author'         => ['nullable', 'string', 'max:255'],
            'category'       => ['nullable', 'string', 'max:255'],
            'published_at'   => ['nullable', 'date'],
            'is_published'   => ['nullable', 'boolean'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
        ]);

        // Slug automático si viene vacío
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        // Author default
        $data['author'] = $data['author'] ?: 'llantasbsh';

        // Por defecto publicado ahora
        if (empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        // Imagen
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('img/blog', 'public');
            // guardamos como "storage/..." para usar asset()
            $data['featured_image'] = 'storage/' . $path;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Entrada creada correctamente.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', [
            'post' => $post,
            'mode' => 'edit',
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255'],
            'excerpt'        => ['nullable', 'string'],
            'content'        => ['required', 'string'],
            'author'         => ['nullable', 'string', 'max:255'],
            'category'       => ['nullable', 'string', 'max:255'],
            'published_at'   => ['nullable', 'date'],
            'is_published'   => ['nullable', 'boolean'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['author'] = $data['author'] ?: $post->author;
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        if (empty($data['published_at'])) {
            $data['published_at'] = $post->published_at ?? now();
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('img/blog', 'public');
            $data['featured_image'] = 'storage/' . $path;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Entrada actualizada correctamente.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Entrada eliminada.');
    }
}
