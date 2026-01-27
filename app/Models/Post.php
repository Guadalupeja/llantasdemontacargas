<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'category',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

     public function getFeaturedImageUrlAttribute(): string
    {
        // Si viene URL absoluta (por si algún día pegas una URL externa)
        if ($this->featured_image && Str::startsWith($this->featured_image, ['http://','https://'])) {
            return $this->featured_image;
        }

        // Si tenemos un path relativo (ej: "img/blog/llantas-premium.jpg")
        if ($this->featured_image) {
            return asset($this->featured_image);
        }

        // Fallback a una imagen por defecto
        return asset('img/blog/default-blog.jpg'); 
        // crea esta imagen en public/img/blog/default-blog.jpg
    }
}
