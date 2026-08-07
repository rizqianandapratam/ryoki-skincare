<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'thumbnail', 'is_published'
    ];

    protected $appends = [
        'thumbnail_url',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            if (str_starts_with($this->thumbnail, 'data:image/')) {
                return $this->thumbnail;
            }
            if (str_starts_with($this->thumbnail, 'http://') || str_starts_with($this->thumbnail, 'https://')) {
                return $this->thumbnail;
            }
            if (str_starts_with($this->thumbnail, 'images/')) {
                return '/' . ltrim($this->thumbnail, '/');
            }
            if (str_starts_with($this->thumbnail, 'storage/')) {
                return '/' . ltrim($this->thumbnail, '/');
            }
            return '/storage/' . ltrim($this->thumbnail, '/');
        }
        return asset('images/hero-banner.png');
    }
}
