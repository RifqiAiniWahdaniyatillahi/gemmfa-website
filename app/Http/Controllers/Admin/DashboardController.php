<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\ContactMessage;
use App\Models\Donation;
use App\Models\GalleryItem;
use App\Models\NewsPost;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news_posts' => NewsPost::count(),
            'programs' => Program::count(),
            'agendas' => Agenda::count(),
            'gallery_items' => GalleryItem::count(),
            'donations' => Donation::count(),
            'contact_messages' => ContactMessage::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
