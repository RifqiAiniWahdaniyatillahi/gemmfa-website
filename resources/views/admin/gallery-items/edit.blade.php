@extends('admin.layout')

@section('title', 'Edit Galeri')
@section('heading', 'Edit Galeri')
@section('subheading', 'Perbarui item galeri.')

@section('content')
    <form method="post" action="{{ route('admin.gallery-items.update', $galleryItem) }}" class="admin-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title', $galleryItem->title) }}" />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category', $galleryItem->category) }}" />
        </label>
        <label>
            Tipe Media
            <select name="media_type" required>
                <option value="image" {{ old('media_type', $galleryItem->media_type) === 'image' ? 'selected' : '' }}>Gambar</option>
                <option value="video" {{ old('media_type', $galleryItem->media_type) === 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </label>
        @if ($galleryItem->media_url)
            <div class="admin-media-preview">
                @if ($galleryItem->media_type === 'video')
                    <a class="link" href="{{ \Illuminate\Support\Facades\Storage::url($galleryItem->media_url) }}" target="_blank">Lihat video</a>
                @else
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($galleryItem->media_url) }}" alt="Media" />
                @endif
            </div>
        @endif
        <label>
            File Media (opsional)
            <input type="file" name="media_file" accept="image/*,video/mp4,video/webm" />
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="4">{{ old('description', $galleryItem->description) }}</textarea>
        </label>
        <label>
            Tanggal Kegiatan
            <input type="date" name="event_date" value="{{ old('event_date', optional($galleryItem->event_date)->format('Y-m-d')) }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $galleryItem->is_featured) ? 'checked' : '' }} />
            Tampilkan sebagai unggulan
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
