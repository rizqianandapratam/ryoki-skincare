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
            'title'                => 'required|string|max:255',
            'content'              => 'nullable|string',
            'thumbnail'            => 'nullable|image|max:10240',
            'thumbnail_base64'     => 'nullable|string',
            'thumbnail_url_input'  => 'nullable|string|max:2000',
            'is_published'         => 'nullable',
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

        // Process thumbnail in priority order
        if (!empty($request->input('thumbnail_base64')) && str_starts_with($request->input('thumbnail_base64'), 'data:image/')) {
            $validated['thumbnail'] = $request->input('thumbnail_base64');
        } elseif (!empty($request->input('thumbnail_url_input'))) {
            $validated['thumbnail'] = trim($request->input('thumbnail_url_input'));
        } elseif ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileToBase64DataUri($request->file('thumbnail'), 1200, 85);
        }

        unset($validated['thumbnail_base64'], $validated['thumbnail_url_input']);
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
            'title'                => 'required|string|max:255',
            'content'              => 'nullable|string',
            'thumbnail'            => 'nullable|image|max:10240',
            'thumbnail_base64'     => 'nullable|string',
            'thumbnail_url_input'  => 'nullable|string|max:2000',
            'is_published'         => 'nullable',
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

        // Process thumbnail in priority order
        if (!empty($request->input('thumbnail_base64')) && str_starts_with($request->input('thumbnail_base64'), 'data:image/')) {
            $validated['thumbnail'] = $request->input('thumbnail_base64');
        } elseif (!empty($request->input('thumbnail_url_input'))) {
            $validated['thumbnail'] = trim($request->input('thumbnail_url_input'));
        } elseif ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $this->fileToBase64DataUri($request->file('thumbnail'), 1200, 85);
        }

        unset($validated['thumbnail_base64'], $validated['thumbnail_url_input']);
        $validated['is_published'] = $request->has('is_published');

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail && !str_starts_with($article->thumbnail, 'data:')) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5120',
        ]);

        $dataUri = $this->fileToBase64DataUri($request->file('file'), 1200, 82);

        return response()->json([
            'url' => $dataUri,
        ]);
    }

    /**
     * Convert an uploaded image file to a compressed Base64 Data URI string.
     * This allows images to be stored in the database and rendered on Vercel Serverless without a read-only filesystem limit.
     */
    private function fileToBase64DataUri($file, int $maxWidth = 1200, int $quality = 82): string
    {
        $mime = $file->getMimeType() ?: 'image/jpeg';
        $realPath = $file->getRealPath();

        if (extension_loaded('gd') && str_starts_with($mime, 'image/')) {
            $image = @imagecreatefromstring(file_get_contents($realPath));
            if ($image !== false) {
                $width = imagesx($image);
                $height = imagesy($image);

                if ($width > $maxWidth) {
                    $newWidth = $maxWidth;
                    $newHeight = (int) ($height * ($maxWidth / $width));
                    $resized = imagecreatetruecolor($newWidth, $newHeight);

                    if ($mime === 'image/png' || $mime === 'image/webp') {
                        imagealphablending($resized, false);
                        imagesavealpha($resized, true);
                        $transparent = imagecolorallocatealpha($resized, 255, 255, 255, 127);
                        imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $transparent);
                    }

                    imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagedestroy($image);
                    $image = $resized;
                }

                ob_start();
                if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                    imagejpeg($image, null, $quality);
                } elseif ($mime === 'image/png') {
                    imagepng($image, null, 6);
                } elseif ($mime === 'image/webp') {
                    imagewebp($image, null, $quality);
                } else {
                    imagejpeg($image, null, $quality);
                    $mime = 'image/jpeg';
                }
                $binary = ob_get_clean();
                imagedestroy($image);

                return 'data:' . $mime . ';base64,' . base64_encode($binary);
            }
        }

        return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($realPath));
    }
}
