<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $articlesCount = Article::count();
        $unreadContactsCount = Contact::where('is_read', false)->count();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'productsCount',
            'articlesCount',
            'unreadContactsCount',
            'recentProducts'
        ));
    }
}
