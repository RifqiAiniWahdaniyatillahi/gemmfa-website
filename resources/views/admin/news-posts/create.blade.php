@extends('admin.layout')

@section('title', 'Tambah Berita')
@section('heading', 'Tambah Berita')
@section('subheading', 'Buat artikel berita terbaru.')

@section('content')
    <form method="post" action="{{ route('admin.news-posts.store') }}" class="admin-form" enctype="multipart/form-data">
        @csrf
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title') }}" required />
        </label>
        <label>
            Slug
            <input type="text" name="slug" value="{{ old('slug') }}" />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category') }}" />
        </label>
        <label>
            Ringkasan
            <textarea name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
        </label>
        <label>
            Konten
            <textarea name="body" rows="8" required>{{ old('body') }}</textarea>
        </label>
        <label>
            Cover Image
            <input type="file" name="cover_image" accept="image/*" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} />
            Publish sekarang
        </label>
        <label>
            Tanggal Publish
            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" />
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
