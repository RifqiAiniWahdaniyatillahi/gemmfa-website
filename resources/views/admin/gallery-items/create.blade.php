@extends('admin.layout')

@section('title', 'Tambah Galeri')
@section('heading', 'Tambah Galeri')
@section('subheading', 'Tambahkan dokumentasi baru.')

@section('content')
    <form method="post" action="{{ route('admin.gallery-items.store') }}" class="admin-form" enctype="multipart/form-data">
        @csrf
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title') }}" />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category') }}" />
        </label>
        <label>
            Tipe Media
            <select name="media_type" required>
                <option value="image" {{ old('media_type', 'image') === 'image' ? 'selected' : '' }}>Gambar</option>
                <option value="video" {{ old('media_type') === 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </label>
        <label>
            File Media
            <input type="file" name="media_file" accept="image/*,video/mp4,video/webm" required />
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </label>
        <label>
            Tanggal Kegiatan
            <input type="date" name="event_date" value="{{ old('event_date') }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} />
            Tampilkan sebagai unggulan
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
