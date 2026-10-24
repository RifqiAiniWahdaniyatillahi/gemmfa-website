<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsPostController extends Controller
{
    public function index()
    {
        $posts = NewsPost::with('author')->orderByDesc('created_at')->get();

        return view('admin.news-posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.news-posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:280'],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['slug'] ?? $data['title']);
        $data['user_id'] = $request->user()->id;
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if (! $data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('news', 'public');
        }

        NewsPost::create($data);

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function show(NewsPost $newsPost)
    {
        return view('admin.news-posts.show', compact('newsPost'));
    }

    public function edit(NewsPost $newsPost)
    {
        return view('admin.news-posts.edit', compact('newsPost'));
    }

    public function update(Request $request, NewsPost $newsPost)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:280'],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['slug'] ?? $data['title'], $newsPost->id);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if (! $data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('cover_image')) {
            $this->deletePublicFile($newsPost->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('news', 'public');
        }

        $newsPost->update($data);

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(NewsPost $newsPost)
    {
        $this->deletePublicFile($newsPost->cover_image);
        $newsPost->delete();

        return redirect()->route('admin.news-posts.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function makeUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        if ($slug === '') {
            $slug = 'berita';
        }

        $base = $slug;
        $counter = 1;

        while (
            NewsPost::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function deletePublicFile(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return;
        }

        $relativePath = ltrim($path, '/');
        if (Str::startsWith($relativePath, 'storage/')) {
            $relativePath = Str::after($relativePath, 'storage/');
        }

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }
}
