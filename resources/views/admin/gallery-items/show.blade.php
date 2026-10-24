@extends('admin.layout')

@section('title', 'Detail Galeri')
@section('heading', 'Detail Galeri')
@section('subheading', $galleryItem->title ?: 'Tanpa judul')

@section('content')
    <div class="admin-card">
        <h3>{{ $galleryItem->title ?: 'Tanpa judul' }}</h3>
        <p><strong>Kategori:</strong> {{ $galleryItem->category ?? '-' }}</p>
        <p><strong>Tipe Media:</strong> {{ ucfirst($galleryItem->media_type) }}</p>
        @if ($galleryItem->media_url)
            <div class="admin-media-preview">
                @if ($galleryItem->media_type === 'video')
                    <a class="link" href="{{ \Illuminate\Support\Facades\Storage::url($galleryItem->media_url) }}" target="_blank">Lihat video</a>
                @else
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($galleryItem->media_url) }}" alt="Media" />
                @endif
            </div>
        @endif
        <p><strong>Tanggal:</strong> {{ $galleryItem->event_date ? $galleryItem->event_date->format('d M Y') : '-' }}</p>
        <p><strong>Unggulan:</strong> {{ $galleryItem->is_featured ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $galleryItem->description ?? '-' }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.gallery-items.edit', $galleryItem) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.gallery-items.index') }}">Kembali</a>
        </div>
    </div>
@endsection
