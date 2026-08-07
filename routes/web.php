<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnalyticsController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/products', [ProductController::class, 'apiIndex'])->name('api.products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/analytics/click', [AnalyticsController::class, 'recordClick'])->name('analytics.click');

// Dynamic XML Sitemap & robots.txt (Google & Search Engine Optimized)
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

Route::get('/robots.txt', function () {
    $sitemap = url('/sitemap.xml');
    $content = <<<ROBOTS
# Ryoki Skincare — robots.txt (SEO Optimized)
# Website: {$sitemap}

User-agent: Googlebot
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/
Disallow: /login
Disallow: /register
Disallow: /sanctum/

User-agent: Bingbot
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/

User-agent: *
Allow: /
Disallow: /admin/
Disallow: /analytics/
Disallow: /api/
Disallow: /login
Disallow: /register
Disallow: /sanctum/
Disallow: /_debugbar/
Disallow: /telescope/
Disallow: /horizon/

# Sitemap
Sitemap: {$sitemap}

# Host
Host: {$sitemap}
ROBOTS;
    return response($content, 200)->header('Content-Type', 'text/plain');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin Routes (Protected)
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Analytics Dashboard
    Route::get('analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

    // Products CRUD
    Route::resource('products', AdminProductController::class);
    Route::delete('product-images/{productImage}', [AdminProductController::class, 'destroyImage'])->name('product-images.destroy');
    
    // Articles CRUD
    Route::post('articles/upload-image', [AdminArticleController::class, 'uploadImage'])->name('articles.upload-image');
    Route::resource('articles', AdminArticleController::class);
    
    // Contacts (Inbox)
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{contact}/mark-read', [AdminContactController::class, 'markRead'])->name('contacts.mark-read');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});
require __DIR__.'/auth.php';
