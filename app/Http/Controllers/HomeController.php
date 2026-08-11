<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $priceService = app(\App\Services\MarketplacePriceService::class);

        $featuredProducts = Product::featured()->available()->latest()->take(6)->get();
        if ($featuredProducts->count() < 3) {
            $featuredProducts = Product::available()->latest()->take(4)->get();
        }

        foreach ($featuredProducts as $fp) {
            $fp->price = $priceService->resolveLivePrice($fp);
        }

        $bestSellers = Product::bestSeller()->available()->latest()->take(4)->get();
        foreach ($bestSellers as $bs) {
            $bs->price = $priceService->resolveLivePrice($bs);
        }

        return view('home', compact('featuredProducts', 'bestSellers'));
    }
}
