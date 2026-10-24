<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryItemController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderByDesc('event_date')->orderByDesc('created_at')->get();

        return view('admin.gallery-items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery-items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'media_type' => ['required', 'string', 'max:40'],
            'media_file' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,mp4,webm', 'max:10240'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        if (isset($data['title']) && $data['title'] === '') {
            $data['title'] = null;
        }
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);
        [$mediaPath, $mediaType] = $this->storeMediaFile($request, $data['media_type']);
        $data['media_url'] = $mediaPath;
        $data['media_type'] = $mediaType;

        GalleryItem::create($data);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Galeri berhasil dibuat.');
    }

    public function show(GalleryItem $galleryItem)
    {
        return view('admin.gallery-items.show', compact('galleryItem'));
    }

    public function edit(GalleryItem $galleryItem)
    {
        return view('admin.gallery-items.edit', compact('galleryItem'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'media_type' => ['required', 'string', 'max:40'],
            'media_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,mp4,webm', 'max:10240'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        if (isset($data['title']) && $data['title'] === '') {
            $data['title'] = null;
        }
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);
        $data['media_url'] = $galleryItem->media_url;
        $data['media_type'] = $data['media_type'] ?? $galleryItem->media_type;

        if ($request->hasFile('media_file')) {
            $this->deletePublicFile($galleryItem->media_url);
            [$mediaPath, $mediaType] = $this->storeMediaFile($request, $data['media_type']);
            $data['media_url'] = $mediaPath;
            $data['media_type'] = $mediaType;
        }

        $galleryItem->update($data);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        $this->deletePublicFile($galleryItem->media_url);
        $galleryItem->delete();

        return redirect()->route('admin.gallery-items.index')->with('success', 'Galeri berhasil dihapus.');
    }

    private function storeMediaFile(Request $request, string $mediaType): array
    {
        $file = $request->file('media_file');
        $detectedType = $mediaType;

        if ($file && Str::startsWith($file->getMimeType(), 'video/')) {
            $detectedType = 'video';
        }

        if ($file && Str::startsWith($file->getMimeType(), 'image/')) {
            $detectedType = 'image';
        }

        return [$file->store('gallery', 'public'), $detectedType];
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
