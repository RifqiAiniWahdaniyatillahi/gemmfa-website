@extends('admin.layout')

@section('title', 'Tambah Agenda')
@section('heading', 'Tambah Agenda')
@section('subheading', 'Buat jadwal kegiatan baru.')

@section('content')
    <form method="post" action="{{ route('admin.agendas.store') }}" class="admin-form">
        @csrf
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title') }}" required />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category') }}" />
        </label>
        <label>
            Lokasi
            <input type="text" name="location" value="{{ old('location') }}" />
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="5">{{ old('description') }}</textarea>
        </label>
        <label>
            Mulai
            <input type="datetime-local" name="start_at" value="{{ old('start_at') }}" required />
        </label>
        <label>
            Selesai
            <input type="datetime-local" name="end_at" value="{{ old('end_at') }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_public" value="1" {{ old('is_public', true) ? 'checked' : '' }} />
            Tampilkan ke publik
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
