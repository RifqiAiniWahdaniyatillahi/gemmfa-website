@extends('admin.layout')

@section('title', 'Edit Berita')
@section('heading', 'Edit Berita')
@section('subheading', 'Perbarui konten artikel.')

@section('content')
    <form method="post" action="{{ route('admin.news-posts.update', $newsPost) }}" class="admin-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title', $newsPost->title) }}" required />
        </label>
        <label>
            Slug
            <input type="text" name="slug" value="{{ old('slug', $newsPost->slug) }}" />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category', $newsPost->category) }}" />
        </label>
        <label>
            Ringkasan
            <textarea name="excerpt" rows="3">{{ old('excerpt', $newsPost->excerpt) }}</textarea>
        </label>
        <label>
            Konten
            <textarea name="body" rows="8" required>{{ old('body', $newsPost->body) }}</textarea>
        </label>
        @if ($newsPost->cover_image)
            <div class="admin-media-preview">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($newsPost->cover_image) }}" alt="Cover" />
            </div>
        @endif
        <label>
            Cover Image (opsional)
            <input type="file" name="cover_image" accept="image/*" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $newsPost->is_published) ? 'checked' : '' }} />
            Publish sekarang
        </label>
        <label>
            Tanggal Publish
            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($newsPost->published_at)->format('Y-m-d\TH:i')) }}" />
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
