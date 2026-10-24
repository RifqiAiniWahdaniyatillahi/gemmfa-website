@extends('admin.layout')

@section('title', 'Detail Agenda')
@section('heading', 'Detail Agenda')
@section('subheading', $agenda->title)

@section('content')
    <div class="admin-card">
        <h3>{{ $agenda->title }}</h3>
        <p><strong>Kategori:</strong> {{ $agenda->category ?? '-' }}</p>
        <p><strong>Lokasi:</strong> {{ $agenda->location ?? '-' }}</p>
        <p><strong>Mulai:</strong> {{ $agenda->start_at->format('d M Y H:i') }}</p>
        <p><strong>Selesai:</strong> {{ $agenda->end_at ? $agenda->end_at->format('d M Y H:i') : '-' }}</p>
        <p><strong>Publik:</strong> {{ $agenda->is_public ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Deskripsi:</strong></p>
        <p>{{ $agenda->description ?? '-' }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.agendas.edit', $agenda) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.agendas.index') }}">Kembali</a>
        </div>
    </div>
@endsection
