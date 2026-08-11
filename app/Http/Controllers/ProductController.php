<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (Product::count() < 10) {
                (new \Database\Seeders\ProductSeeder())->run();
            }
        } catch (\Throwable $e) {
            // Suppress error if initial setup
        }

        $query = Product::query();
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $priceService = app(\App\Services\MarketplacePriceService::class);
        $rawProducts = $query->latest()->get();
        $initialProducts = $rawProducts->map(function ($product) use ($priceService) {
            $livePrice = $priceService->resolveLivePrice($product);
            return [
                'id'             => $product->id,
                'name'           => $product->name,
                'slug'           => $product->slug,
                'description'    => $product->description,
                'category'       => $product->category,
                'price'          => $livePrice,
                'price_formatted'=> 'Rp ' . number_format($livePrice, 0, ',', '.'),
                'rating'         => $product->rating ? number_format($product->rating, 1) : '4.9',
                'is_best_seller' => (bool) $product->is_best_seller,
                'image_url'      => $product->image_url,
                'url'            => route('products.show', $product->slug),
                'tiktok_url'     => $product->tiktok_url,
                'shopee_url'     => $product->shopee_url,
            ];
        });

        $categories = Product::select('category')->distinct()->pluck('category');
        $products = Product::paginate(12);
        
        return view('products.index', compact('products', 'initialProducts', 'categories'));
    }

    /**
     * Return filtered products as JSON for Alpine.js interactive filtering.
     */
    public function apiIndex(Request $request)
    {
        try {
            if (Product::count() < 10) {
                (new \Database\Seeders\ProductSeeder())->run();
            }
        } catch (\Throwable $e) {
            // Suppress error if initial setup
        }

        $query = Product::query();

        if ($request->filled('category')) {
            $cat = trim($request->category);
            $query->whereRaw('LOWER(category) = ?', [strtolower($cat)]);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $priceService = app(\App\Services\MarketplacePriceService::class);
        $products = $query->latest()->get()->map(function ($product) use ($priceService) {
            $livePrice = $priceService->resolveLivePrice($product);
            return [
                'id'             => $product->id,
                'name'           => $product->name,
                'slug'           => $product->slug,
                'description'    => $product->description,
                'category'       => $product->category,
                'price'          => $livePrice,
                'price_formatted'=> 'Rp ' . number_format($livePrice, 0, ',', '.'),
                'rating'         => $product->rating ? number_format($product->rating, 1) : '4.9',
                'is_best_seller' => (bool) $product->is_best_seller,
                'image_url'      => $product->image_url,
                'url'            => route('products.show', $product->slug),
                'tiktok_url'     => $product->tiktok_url,
                'shopee_url'     => $product->shopee_url,
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

        $priceService = app(\App\Services\MarketplacePriceService::class);
        $product->price = $priceService->resolveLivePrice($product);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
