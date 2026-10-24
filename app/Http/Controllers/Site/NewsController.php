<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;

class NewsController extends Controller
{
    public function index()
    {
        $posts = NewsPost::where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        $featuredPosts = $posts->take(2);
        $otherPosts = $posts->slice(2);

        return view('pages.berita', compact('featuredPosts', 'otherPosts'));
    }

    public function show(NewsPost $newsPost)
    {
        if (! $newsPost->is_published) {
            abort(404);
        }

        return view('pages.berita-show', compact('newsPost'));
    }
}
