<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'usage'           => 'nullable|string',
            'ingredients'     => 'nullable|string',
            'price'           => 'nullable|numeric|min:0',
            'category'        => 'nullable|string|max:255',
            'image'           => 'nullable|image|max:5120',
            'gallery.*'       => 'nullable|image|max:5120',
            'in_stock'        => 'nullable',
            'is_best_seller'  => 'nullable',
            'tiktok_shop_url' => 'nullable|string|max:500',
            'shopee_url'      => 'nullable|string|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['name']) ?: 'product-' . time();
        $validated['category'] = !empty($validated['category']) ? $validated['category'] : 'Skincare';
        $validated['price'] = isset($validated['price']) && $validated['price'] !== '' ? $validated['price'] : 0;

        // Auto-add https:// if omitted
        if (!empty($validated['tiktok_shop_url']) && !preg_match("~^(?:f|ht)tps?://~i", $validated['tiktok_shop_url'])) {
            $validated['tiktok_shop_url'] = 'https://' . $validated['tiktok_shop_url'];
        }
        if (!empty($validated['shopee_url']) && !preg_match("~^(?:f|ht)tps?://~i", $validated['shopee_url'])) {
            $validated['shopee_url'] = 'https://' . $validated['shopee_url'];
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['in_stock'] = $request->has('in_stock');
        $validated['is_best_seller'] = $request->has('is_best_seller');

        // Remove gallery from validated array
        unset($validated['gallery']);

        $product = Product::create($validated);

        // Process gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                $path = $file->store('products', 'public');
                $product->galleryImages()->create([
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $product->load('galleryImages');
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'usage'           => 'nullable|string',
            'ingredients'     => 'nullable|string',
            'price'           => 'nullable|numeric|min:0',
            'category'        => 'nullable|string|max:255',
            'image'           => 'nullable|image|max:5120',
            'gallery.*'       => 'nullable|image|max:5120',
            'in_stock'        => 'nullable',
            'is_best_seller'  => 'nullable',
            'tiktok_shop_url' => 'nullable|string|max:500',
            'shopee_url'      => 'nullable|string|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['name']) ?: 'product-' . time();
        $validated['category'] = !empty($validated['category']) ? $validated['category'] : ($product->category ?: 'Skincare');
        $validated['price'] = isset($validated['price']) && $validated['price'] !== '' ? $validated['price'] : 0;

        // Auto-add https:// if omitted
        if (!empty($validated['tiktok_shop_url']) && !preg_match("~^(?:f|ht)tps?://~i", $validated['tiktok_shop_url'])) {
            $validated['tiktok_shop_url'] = 'https://' . $validated['tiktok_shop_url'];
        }
        if (!empty($validated['shopee_url']) && !preg_match("~^(?:f|ht)tps?://~i", $validated['shopee_url'])) {
            $validated['shopee_url'] = 'https://' . $validated['shopee_url'];
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['in_stock'] = $request->has('in_stock');
        $validated['is_best_seller'] = $request->has('is_best_seller');

        // Remove gallery from validated array
        unset($validated['gallery']);

        $product->update($validated);

        // Append new gallery images
        if ($request->hasFile('gallery')) {
            $maxSort = $product->galleryImages()->max('sort_order') ?? -1;
            foreach ($request->file('gallery') as $index => $file) {
                $path = $file->store('products', 'public');
                $product->galleryImages()->create([
                    'image_path' => $path,
                    'sort_order' => $maxSort + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Delete a single gallery image.
     */
    public function destroyImage(ProductImage $productImage)
    {
        Storage::disk('public')->delete($productImage->image_path);
        $productImage->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    public function destroy(Product $product)
    {
        // Delete main image
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete all gallery images from storage
        foreach ($product->galleryImages as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
