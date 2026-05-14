<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // LISTADO /blog
    public function index()
    {
        $posts = Post::where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    // DETALLE /blog/{slug}
    public function show(Post $post)
    {
        $comments = $post->comments()
            ->where('is_approved', true)
            ->get();

        $prev = Post::where('is_published', true)
            ->where('published_at', '<', $post->published_at)
            ->orderByDesc('published_at')
            ->first();

        $next = Post::where('is_published', true)
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at')
            ->first();

        return view('blog.show', compact('post', 'comments', 'prev', 'next'));
    }

    // GUARDAR COMENTARIO
    public function storeComment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:5'],
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['post_id'] = $post->id;

        Comment::create($validated);

        return back()->with('success', 'Gracias por tu comentario.');
    }
}