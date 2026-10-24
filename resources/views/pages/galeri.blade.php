@extends('layouts.site')

@section('title', 'Galeri - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Galeri GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Galeri</span>
                    <h1>Galeri Dokumentasi GEMMFA</h1>
                    <p>Potret kegiatan dan karya untuk transparansi</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section gallery is-glow" id="galeri">
        <div class="container">
            <div class="gallery-hero">
                <div class="section__head">
                    <span class="eyebrow">Galeri</span>
                    <h2>Dokumentasi Foto & Video</h2>
                    <p>Album dibuat per event untuk memudahkan pencarian dokumentasi.</p>
                </div>
                <div class="gallery-hero__meta">
                    <div class="gallery-stat">
                        <span class="gallery-stat__label">Total dokumentasi</span>
                        <span class="gallery-stat__value">{{ $items->count() }}</span>
                    </div>
                    <div class="gallery-stat">
                        <span class="gallery-stat__label">Kategori kegiatan</span>
                        <span class="gallery-stat__value">{{ $categories->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="gallery-toolbar">
                <div class="tags">
                    <span>Sosial</span>
                    <span>Pendidikan</span>
                    <span>Keagamaan</span>
                    <span>Relawan</span>
                </div>
                <div class="gallery-hint">Dokumentasi diperbarui setelah setiap program utama.</div>
            </div>
            <div class="gallery-category-grid">
                @forelse ($categories as $category)
                    <a class="gallery-category-card" href="{{ route('galeri.show', $category['slug']) }}">
                        <div class="gallery-category__media">
                            @if ($category['cover'])
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($category['cover']) }}" alt="{{ $category['name'] }}">
                            @else
                                <div class="gallery-category__placeholder">GEMMFA</div>
                            @endif
                        </div>
                        <div class="gallery-category__body">
                            <div>
                                <h3>{{ $category['name'] }}</h3>
                                <p>{{ $category['count'] }} dokumentasi</p>
                            </div>
                            <div class="gallery-category__cta">Lihat detail</div>
                        </div>
                    </a>
                @empty
                    <div class="gallery-empty">Belum ada dokumentasi</div>
                @endforelse
            </div>
            @if ($latestItems->isNotEmpty())
                <div class="gallery-latest">
                    <div class="section__head">
                        <span class="eyebrow">Terbaru</span>
                        <h2>Dokumentasi terbaru</h2>
                        <p>Cuplikan dokumentasi terbaru dari kegiatan GEMMFA.</p>
                    </div>
                    <div class="gallery-grid">
                        @foreach ($latestItems as $item)
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
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
