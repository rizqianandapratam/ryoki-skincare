<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::featured()->available()->take(6)->get();
        $bestSellers = Product::bestSeller()->available()->take(4)->get();

        return view('home', compact('featuredProducts', 'bestSellers'));
    }
}
