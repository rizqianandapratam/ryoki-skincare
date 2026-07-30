<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $products = $query->paginate(12);
        $categories = Product::select('category')->distinct()->pluck('category');
        
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Return filtered products as JSON for Alpine.js interactive filtering.
     */
    public function apiIndex(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->get()->map(function ($product) {
            // Build image URL using the same fallback logic as the Blade component
            $imgSrc = asset('images/facial-wash.png');
            if ($product->image) {
                $imgSrc = Storage::url($product->image);
            } elseif (str_contains(strtolower($product->name), 'peeling') || str_contains(strtolower($product->name), 'spray')) {
                $imgSrc = asset('images/peeling-spray.png');
            } elseif (str_contains(strtolower($product->name), 'cream') || str_contains(strtolower($product->name), 'moisturizer')) {
                $imgSrc = asset('images/day-cream.png');
            }

            return [
                'id'             => $product->id,
                'name'           => $product->name,
                'slug'           => $product->slug,
                'description'    => $product->description,
                'category'       => $product->category,
                'price'          => $product->price,
                'price_formatted'=> 'Rp ' . number_format($product->price, 0, ',', '.'),
                'rating'         => $product->rating ? number_format($product->rating, 1) : '4.9',
                'is_best_seller' => (bool) $product->is_best_seller,
                'image_url'      => $imgSrc,
                'url'            => route('products.show', $product->slug),
                'tiktok_url'     => $product->tiktok_url,
            ];
        });

        $categories = Product::select('category')->distinct()->pluck('category');

        return response()->json([
            'products'   => $products,
            'categories' => $categories,
        ]);
    }
    
    public function show(Product $product)
    {
        $product->load('galleryImages');

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
