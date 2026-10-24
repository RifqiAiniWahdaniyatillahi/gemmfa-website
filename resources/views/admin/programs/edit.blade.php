@extends('admin.layout')

@section('title', 'Edit Program')
@section('heading', 'Edit Program')
@section('subheading', 'Perbarui detail program.')

@section('content')
    <form method="post" action="{{ route('admin.programs.update', $program) }}" class="admin-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title', $program->title) }}" required />
        </label>
        <label>
            Slug
            <input type="text" name="slug" value="{{ old('slug', $program->slug) }}" />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category', $program->category) }}" />
        </label>
        <label>
            Ringkasan
            <textarea name="summary" rows="3">{{ old('summary', $program->summary) }}</textarea>
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="6">{{ old('description', $program->description) }}</textarea>
        </label>
        <label>
            Gambar Program
            <input type="file" name="image" accept="image/*" />
        </label>
        @if ($program->image_path)
            <div class="admin-media-preview">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($program->image_path) }}" alt="{{ $program->title }}">
                <div>
                    <p>Gambar saat ini</p>
                    <p class="note">Unggah file baru untuk mengganti gambar.</p>
                </div>
            </div>
        @endif
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', $program->status) }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }} />
            Program unggulan
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
