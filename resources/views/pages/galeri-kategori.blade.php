@extends('layouts.site')

@section('title', 'Galeri - '. $categoryName .' - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Galeri {{ $categoryName }}">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Galeri</span>
                    <h1>Dokumentasi {{ $categoryName }}</h1>
                    <p>Kumpulan dokumentasi kegiatan dalam kategori {{ $categoryName }}.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section gallery is-glow" id="galeri-kategori">
        <div class="container">
            <div class="gallery-category-header">
                <div>
                    <span class="eyebrow">Kategori</span>
                    <h2>{{ $categoryName }}</h2>
                    <p>{{ $items->count() }} dokumentasi tersedia.</p>
                </div>
                <a class="button ghost" href="{{ route('galeri') }}">Kembali ke Galeri</a>
            </div>

            <div class="gallery-grid">
                @forelse ($items as $item)
                    @php($caption = $item->title ?: ($item->category ?: 'Dokumentasi GEMMFA'))
                    <article class="gallery-card">
                        @if ($item->media_type === 'video')
                            <a class="gallery-card__media is-video" href="{{ \Illuminate\Support\Facades\Storage::url($item->media_url) }}" target="_blank" rel="noopener">
                                <span class="gallery-card__badge">Video</span>
                                <span class="gallery-card__cta">Lihat video</span>
                            </a>
                        @else
                            <a class="gallery-card__media" href="{{ \Illuminate\Support\Facades\Storage::url($item->media_url) }}" data-lightbox data-caption="{{ $caption }}">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($item->media_url) }}" alt="{{ $caption }}" />
                                <span class="gallery-card__badge">Foto</span>
                            </a>
                        @endif
                        <div class="gallery-card__caption">
                            <h3>{{ $caption }}</h3>
                            <span class="gallery-card__meta">{{ $item->media_type === 'video' ? 'Video' : 'Foto' }}</span>
                        </div>
                    </article>
                @empty
                    <div class="gallery-empty">Belum ada dokumentasi pada kategori ini</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
