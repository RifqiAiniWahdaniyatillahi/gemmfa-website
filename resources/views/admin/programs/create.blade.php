@extends('admin.layout')

@section('title', 'Tambah Program')
@section('heading', 'Tambah Program')
@section('subheading', 'Buat program baru.')

@section('content')
    <form method="post" action="{{ route('admin.programs.store') }}" class="admin-form" enctype="multipart/form-data">
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
            <textarea name="summary" rows="3">{{ old('summary') }}</textarea>
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="6">{{ old('description') }}</textarea>
        </label>
        <label>
            Gambar Program
            <input type="file" name="image" accept="image/*" />
        </label>
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', 'active') }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} />
            Program unggulan
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
