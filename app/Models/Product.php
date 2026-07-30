<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

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
