@extends('admin.layout')

@section('title', 'Edit Agenda')
@section('heading', 'Edit Agenda')
@section('subheading', 'Perbarui jadwal kegiatan.')

@section('content')
    <form method="post" action="{{ route('admin.agendas.update', $agenda) }}" class="admin-form">
        @csrf
        @method('PUT')
        <label>
            Judul
            <input type="text" name="title" value="{{ old('title', $agenda->title) }}" required />
        </label>
        <label>
            Kategori
            <input type="text" name="category" value="{{ old('category', $agenda->category) }}" />
        </label>
        <label>
            Lokasi
            <input type="text" name="location" value="{{ old('location', $agenda->location) }}" />
        </label>
        <label>
            Deskripsi
            <textarea name="description" rows="5">{{ old('description', $agenda->description) }}</textarea>
        </label>
        <label>
            Mulai
            <input type="datetime-local" name="start_at" value="{{ old('start_at', $agenda->start_at->format('Y-m-d\TH:i')) }}" required />
        </label>
        <label>
            Selesai
            <input type="datetime-local" name="end_at" value="{{ old('end_at', optional($agenda->end_at)->format('Y-m-d\TH:i')) }}" />
        </label>
        <label class="admin-check">
            <input type="checkbox" name="is_public" value="1" {{ old('is_public', $agenda->is_public) ? 'checked' : '' }} />
            Tampilkan ke publik
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
