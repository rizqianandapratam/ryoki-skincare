<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML Sitemap for Search Engines (Google, Bing, Yahoo).
     */
    public function index(): Response
    {
        $products = Product::where('in_stock', true)->orWhereNotNull('id')->orderBy('updated_at', 'desc')->get();
        $articles = Article::where('is_published', true)->orderBy('updated_at', 'desc')->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

        // 1. Homepage
        $xml .= '<url>';
        $xml .= '<loc>' . url('/') . '</loc>';
        $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // 2. About Page
        $xml .= '<url>';
        $xml .= '<loc>' . route('about') . '</loc>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';

        // 3. Products Catalog Index
        $xml .= '<url>';
        $xml .= '<loc>' . route('products.index') . '</loc>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';

        // 4. Individual Product Detail Pages
        foreach ($products as $prod) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('products.show', $prod->slug) . '</loc>';
            $xml .= '<lastmod>' . $prod->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.9</priority>';
            if ($prod->image) {
                $xml .= '<image:image>';
                $xml .= '<image:loc>' . asset('storage/' . $prod->image) . '</image:loc>';
                $xml .= '<image:title>' . htmlspecialchars($prod->name) . '</image:title>';
                $xml .= '</image:image>';
            }
            $xml .= '</url>';
        }

        // 5. Skinpedia Articles Index
        $xml .= '<url>';
        $xml .= '<loc>' . route('articles.index') . '</loc>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';

        // 6. Individual Skinpedia Articles
        foreach ($articles as $art) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('articles.show', $art->slug) . '</loc>';
            $xml .= '<lastmod>' . $art->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            if ($art->thumbnail) {
                $xml .= '<image:image>';
                $xml .= '<image:loc>' . asset('storage/' . $art->thumbnail) . '</image:loc>';
                $xml .= '<image:title>' . htmlspecialchars($art->title) . '</image:title>';
                $xml .= '</image:image>';
            }
            $xml .= '</url>';
        }

        // 7. Contact Page
        $xml .= '<url>';
        $xml .= '<loc>' . route('contact.index') . '</loc>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>0.7</priority>';
        $xml .= '</url>';

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
