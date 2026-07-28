<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
     * Get the route key for implicit model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
