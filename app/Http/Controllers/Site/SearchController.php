<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\GalleryItem;
use App\Models\NewsPost;
use App\Models\Program;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index()
    {
        $programs = Program::orderByDesc('created_at')->take(6)->get();
        $news = NewsPost::where('is_published', true)->orderByDesc('published_at')->take(6)->get();
        $agendas = Agenda::where('is_public', true)->orderBy('start_at')->take(6)->get();
        $gallery = GalleryItem::orderByDesc('event_date')->take(6)->get();

        $items = collect();

        foreach ($programs as $program) {
            $items->push([
                'type' => 'Program',
                'title' => $program->title,
                'excerpt' => $program->summary ?: Str::limit($program->description ?? '', 120),
                'keywords' => implode(' ', [$program->title, $program->category, $program->summary]),
                'url' => route('program.show', $program),
            ]);
        }

        foreach ($news as $post) {
            $items->push([
                'type' => 'Berita',
                'title' => $post->title,
                'excerpt' => $post->excerpt ?: Str::limit($post->body, 120),
                'keywords' => implode(' ', [$post->title, $post->category, $post->excerpt]),
                'url' => route('berita.show', $post),
            ]);
        }

        foreach ($agendas as $agenda) {
            $items->push([
                'type' => 'Agenda',
                'title' => $agenda->title,
                'excerpt' => $agenda->description ?: $agenda->start_at->format('d M Y H:i'),
                'keywords' => implode(' ', [$agenda->title, $agenda->category, $agenda->location]),
                'url' => route('agenda'),
            ]);
        }

        foreach ($gallery as $item) {
            $items->push([
                'type' => 'Galeri',
                'title' => $item->title,
                'excerpt' => $item->description ?: ($item->event_date ? $item->event_date->format('d M Y') : ''),
                'keywords' => implode(' ', [$item->title, $item->category, $item->media_type]),
                'url' => route('galeri'),
            ]);
        }

        return view('pages.pencarian', [
            'items' => $items,
        ]);
    }
}
