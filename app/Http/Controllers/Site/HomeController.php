<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\NewsPost;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPrograms = Program::where('is_featured', true)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        if ($featuredPrograms->isEmpty()) {
            $featuredPrograms = Program::orderByDesc('created_at')->take(3)->get();
        }

        $latestAgendas = Agenda::where('is_public', true)
            ->orderBy('start_at')
            ->take(2)
            ->get();

        $latestNews = NewsPost::where('is_published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $stats = [
            'programs' => Program::count(),
            'agendas' => Agenda::count(),
            'news_posts' => NewsPost::where('is_published', true)->count(),
        ];

        return view('welcome', compact('featuredPrograms', 'latestAgendas', 'latestNews', 'stats'));
    }
}
