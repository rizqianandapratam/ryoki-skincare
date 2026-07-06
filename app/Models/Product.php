<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'usage', 'ingredients', 
        'price', 'category', 'image', 'in_stock', 'is_best_seller'
    ];
}
