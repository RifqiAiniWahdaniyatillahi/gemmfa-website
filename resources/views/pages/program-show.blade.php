@extends('layouts.site')

@section('title', $program->title.' - GEMMFA')

@section('content')
    <section class="section programs">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Program</span>
                <h2>{{ $program->title }}</h2>
                <p>{{ $program->summary ?? 'Program GEMMFA untuk jamaah.' }}</p>
            </div>
            <div class="card">
                @if ($program->image_path)
                    <div class="program__media program__media--detail">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($program->image_path) }}" alt="{{ $program->title }}">
                    </div>
                @endif
                <p><strong>Kategori:</strong> {{ $program->category ?? '-' }}</p>
                <p><strong>Status:</strong> {{ $program->status }}</p>
                <p><strong>Unggulan:</strong> {{ $program->is_featured ? 'Ya' : 'Tidak' }}</p>
                <div style="margin-top: 1rem;">
                    <p>{{ $program->description ?? 'Deskripsi program akan ditambahkan.' }}</p>
                </div>
            </div>
            <div class="section__foot">
                <div class="note">Informasi donasi diumumkan sesuai jadwal program, terutama saat Ramadhan.</div>
                <a class="button ghost" href="{{ route('donasi') }}">Info donasi</a>
                <a class="button ghost" href="{{ route('program') }}">Kembali ke program</a>
            </div>
        </div>
    </section>
@endsection
