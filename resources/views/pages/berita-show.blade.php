@extends('layouts.site')

@section('title', $newsPost->title.' - GEMMFA')

@section('content')
    <section class="section news">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Berita</span>
                <h2>{{ $newsPost->title }}</h2>
                <p>{{ $newsPost->published_at ? $newsPost->published_at->format('d M Y') : $newsPost->created_at->format('d M Y') }}</p>
            </div>
            <div class="card">
                <p><strong>Kategori:</strong> {{ $newsPost->category ?? '-' }}</p>
                @if ($newsPost->cover_image)
                    <div class="news__media news__media--detail">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($newsPost->cover_image) }}" alt="{{ $newsPost->title }}" />
                    </div>
                @endif
                @if ($newsPost->excerpt)
                    <p>{{ $newsPost->excerpt }}</p>
                @endif
                <div style="margin-top: 1rem;">
                    <p>{{ $newsPost->body }}</p>
                </div>
            </div>
            <div class="section__foot">
                <div class="note">Artikel lain tersedia di halaman berita.</div>
                <a class="button ghost" href="{{ route('berita') }}">Kembali ke berita</a>
            </div>
        </div>
    </section>
@endsection
