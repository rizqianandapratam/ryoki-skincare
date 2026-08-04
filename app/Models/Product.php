<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $appends = [
        'image_url',
        'tiktok_url',
        'shopee_url',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'usage',
        'ingredients',
        'price',
        'category',
        'image',
        'rating',
        'stock',
        'in_stock',
        'is_best_seller',
        'is_featured',
        'tiktok_shop_url',
        'shopee_url',
    ];

    protected $casts = [
        'price'          => 'decimal:2',
        'rating'         => 'decimal:1',
        'stock'          => 'integer',
        'in_stock'       => 'boolean',
        'is_best_seller' => 'boolean',
        'is_featured'    => 'boolean',
    ];

    /**
     * Get the full product image URL with intelligent fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }

            if (str_starts_with($this->image, 'images/')) {
                return asset($this->image);
            }

            return Storage::url($this->image);
        }

        // Fallback image based on product name or category
        $nameLower = strtolower($this->name ?? '');
        $catLower  = strtolower($this->category ?? '');

        if (str_contains($nameLower, 'serum') || str_contains($catLower, 'serum')) {
            return asset('images/serum.png');
        } elseif (str_contains($nameLower, 'peeling') || str_contains($nameLower, 'spray') || str_contains($catLower, 'spray')) {
            return asset('images/peeling-spray.png');
        } elseif (str_contains($nameLower, 'cream') || str_contains($nameLower, 'moisturizer') || str_contains($catLower, 'moisturizer')) {
            return asset('images/day-cream.png');
        } elseif (str_contains($nameLower, 'toner') || str_contains($catLower, 'toner')) {
            return asset('images/face-toner.png');
        }

        return asset('images/facial-wash.png');
    }

    /**
     * Get the TikTok Shop URL with fallback to official account.
     */
    public function getTiktokUrlAttribute(): string
    {
        return !empty($this->tiktok_shop_url) 
            ? $this->tiktok_shop_url 
            : 'https://www.tiktok.com/@ryokijapanskin';
    }

    /**
     * Get the Shopee URL with fallback to official store URL.
     */
    public function getShopeeUrlAttribute(): string
    {
        return !empty($this->attributes['shopee_url'] ?? null)
            ? $this->attributes['shopee_url']
            : config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore');
    }

    /**
     * Scope: only featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: only best sellers.
     */
    public function scopeBestSeller($query)
    {
        return $query->where('is_best_seller', true);
    }

    /**
     * Scope: only in-stock products.
     */
    public function scopeAvailable($query)
    {
        return $query->where('in_stock', true);
    }

    /**
     * Get gallery images for this product.
     */
    public function galleryImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
