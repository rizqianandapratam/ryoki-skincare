<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::featured()->available()->latest()->take(6)->get();
        if ($featuredProducts->count() < 3) {
            $featuredProducts = Product::available()->latest()->take(4)->get();
        }

        $bestSellers = Product::bestSeller()->available()->latest()->take(4)->get();

        return view('home', compact('featuredProducts', 'bestSellers'));
    }
}
