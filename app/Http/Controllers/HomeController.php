<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSellers = Product::where('is_best_seller', true)->take(4)->get();
        return view('home', compact('bestSellers'));
    }
}
