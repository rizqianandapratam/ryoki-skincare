<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'thumbnail'    => 'nullable|image|max:5120',
            'is_published' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($validated['title']) ?: 'article-' . time();
        $validated['content'] = $validated['content'] ?? '';

        // Sanitize HTML content — allow standard Trix / rich text tags
        if (!empty($validated['content'])) {
            $validated['content'] = strip_tags($validated['content'], [
                'h1', 'h2', 'h3', 'p', 'br', 'strong', 'em', 'del', 'b', 'i', 'u',
                'a', 'blockquote', 'ul', 'ol', 'li', 'pre', 'code',
                'figure', 'figcaption', 'img', 'div', 'span',
            ]);
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'nullable|string',
            'thumbnail'    => 'nullable|image|max:5120',
            'is_published' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($validated['title']) ?: 'article-' . time();
        $validated['content'] = $validated['content'] ?? ($article->content ?: '');

        // Sanitize HTML content — allow standard Trix / rich text tags
        if (!empty($validated['content'])) {
            $validated['content'] = strip_tags($validated['content'], [
                'h1', 'h2', 'h3', 'p', 'br', 'strong', 'em', 'del', 'b', 'i', 'u',
                'a', 'blockquote', 'ul', 'ol', 'li', 'pre', 'code',
                'figure', 'figcaption', 'img', 'div', 'span',
            ]);
        }

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('articles', 'public');
        }

        $validated['is_published'] = $request->has('is_published');

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
