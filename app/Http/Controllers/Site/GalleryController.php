<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderByDesc('event_date')
            ->orderByDesc('created_at')
            ->get();

        $categories = $items
            ->groupBy(function ($item) {
                $category = trim((string) $item->category);

                return $category !== '' ? $category : 'Lainnya';
            })
            ->map(function ($group, $name) {
                $coverItem = $group->firstWhere('media_type', 'image') ?? $group->first();

                return [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'count' => $group->count(),
                    'cover' => $coverItem?->media_url,
                    'latest_date' => $group->max('event_date'),
                    'preview' => $group->take(3),
                ];
            })
            ->sortByDesc('latest_date')
            ->values();

        $latestItems = $items->take(8);

        return view('pages.galeri', compact('items', 'categories', 'latestItems'));
    }

    public function show(string $category)
    {
        $items = GalleryItem::orderByDesc('event_date')
            ->orderByDesc('created_at')
            ->get();

        $categoryName = $items
            ->map(function ($item) {
                $name = trim((string) $item->category);

                return $name !== '' ? $name : 'Lainnya';
            })
            ->unique()
            ->first(function ($name) use ($category) {
                return Str::slug($name) === $category;
            });

        if (!$categoryName) {
            abort(404);
        }

        $filteredItems = $items->filter(function ($item) use ($categoryName) {
            $name = trim((string) $item->category);
            $name = $name !== '' ? $name : 'Lainnya';

            return $name === $categoryName;
        });

        return view('pages.galeri-kategori', [
            'categoryName' => $categoryName,
            'items' => $filteredItems,
        ]);
    }
}
