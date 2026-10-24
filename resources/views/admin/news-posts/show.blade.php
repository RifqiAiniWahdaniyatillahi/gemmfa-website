@extends('admin.layout')

@section('title', 'Detail Berita')
@section('heading', 'Detail Berita')
@section('subheading', $newsPost->title)

@section('content')
    <div class="admin-card">
        <h3>{{ $newsPost->title }}</h3>
        <p><strong>Kategori:</strong> {{ $newsPost->category ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $newsPost->is_published ? 'Publish' : 'Draft' }}</p>
        <p><strong>Penulis:</strong> {{ $newsPost->author?->name ?? '-' }}</p>
        @if ($newsPost->cover_image)
            <div class="admin-media-preview">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($newsPost->cover_image) }}" alt="Cover" />
            </div>
        @endif
        <p><strong>Ringkasan:</strong> {{ $newsPost->excerpt ?? '-' }}</p>
        <p><strong>Konten:</strong></p>
        <p>{{ $newsPost->body }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.news-posts.edit', $newsPost) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.news-posts.index') }}">Kembali</a>
        </div>
    </div>
@endsection
