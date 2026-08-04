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
     * Get product image URL with fallback to gallery image and category-based defaults.
     */
    public function getImageUrlAttribute(): string
    {
        $productName = strtolower($this->name ?? '');
        $categoryName = strtolower($this->category ?? '');

        if (!empty($this->image)) {
            // If image is a local images/ path, attempt several filename variants
            if (str_starts_with($this->image, 'images/')) {
                $given = $this->image;
                $basename = preg_replace('#^images/#', '', $given);

                // Normalize function: lowercase, remove non-alphanum
                $normalize = function ($s) {
                    $s = strtolower($s);
                    $s = str_replace([" ","-","_"], '', $s);
                    return preg_replace('/[^a-z0-9]/', '', $s);
                };

                $targetNorm = $normalize($basename);

                // Also prefer a file named after the product slug (with and without `ryoki-` prefix)
                $slugCandidates = [];
                if (!empty($this->slug)) {
                    $slugCandidates[] = 'images/'.$this->slug.'.png';
                    // strip ryoki- prefix
                    $slugCandidates[] = 'images/'.preg_replace('/^ryoki\-/', '', $this->slug).'.png';
                }

                foreach ($slugCandidates as $sc) {
                    if (file_exists(public_path($sc))) {
                        return asset($sc);
                    }
                }

                // Scan public/images for a best match (tolerant to spaces/case/hyphens)
                $imagesDir = public_path('images');
                if (is_dir($imagesDir)) {
                    $files = scandir($imagesDir);
                    foreach ($files as $f) {
                        if ($f === '.' || $f === '..') continue;
                        $candNorm = $normalize($f);
                        if ($candNorm === $targetNorm || str_contains($candNorm, $targetNorm) || str_contains($targetNorm, $candNorm)) {
                            return asset('images/'.rawurlencode($f));
                        }
                    }
                }

                // If scan didn't find anything, try previous candidate generation
                $lowerHyphen = 'images/'.strtolower(str_replace([' ', '_'], '-', $basename));
                $lowerNoSpace = 'images/'.strtolower(str_replace(' ', '', $basename));
                $candidates = [$given, $lowerHyphen, $lowerNoSpace];
                foreach ($candidates as $cand) {
                    if (file_exists(public_path($cand))) {
                        return asset($cand);
                    }
                }

                return asset($given);
            }

            return Storage::url($this->image);
        }

        if ($this->relationLoaded('galleryImages') && $this->galleryImages->isNotEmpty()) {
            return Storage::url($this->galleryImages->first()->image_path);
        }

        $galleryImagePath = $this->galleryImages()->orderBy('sort_order')->value('image_path');
        if (!empty($galleryImagePath)) {
            return Storage::url($galleryImagePath);
        }

        if (str_contains($productName, 'facial wash') || str_contains($categoryName, 'cleanser')) {
            return asset('images/facial-wash.png');
        }

        if (str_contains($productName, 'serum') || str_contains($categoryName, 'serum')) {
            return asset('images/serum.png');
        }

        if (str_contains($productName, 'peeling') || str_contains($productName, 'spray') || str_contains($categoryName, 'spray')) {
            return asset('images/peeling-spray.png');
        }

        if (str_contains($productName, 'cream') || str_contains($productName, 'moisturizer') || str_contains($categoryName, 'moisturizer')) {
            return asset('images/day-cream.png');
        }

        return asset('images/facial-wash.png');
    }

    /**
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
