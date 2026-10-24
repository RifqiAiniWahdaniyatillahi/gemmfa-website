@extends('admin.layout')

@section('title', 'Detail Program')
@section('heading', 'Detail Program')
@section('subheading', $program->title)

@section('content')
    <div class="admin-card">
        <h3>{{ $program->title }}</h3>
        <p><strong>Kategori:</strong> {{ $program->category ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $program->status }}</p>
        <p><strong>Unggulan:</strong> {{ $program->is_featured ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Ringkasan:</strong> {{ $program->summary ?? '-' }}</p>
        <p><strong>Gambar:</strong></p>
        @if ($program->image_path)
            <div class="admin-media-preview">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($program->image_path) }}" alt="{{ $program->title }}">
            </div>
        @else
            <p>-</p>
        @endif
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $program->description ?? '-' }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.programs.edit', $program) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.programs.index') }}">Kembali</a>
        </div>
    </div>
@endsection
