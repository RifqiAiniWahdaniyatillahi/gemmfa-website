@extends('layouts.site')

@section('title', 'Berita - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Berita GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Berita</span>
                    <h1>Berita dan Artikel GEMMFA</h1>
                    <p>Insight, kabar, dan dakwah untuk masyarakat</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section news" id="berita">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Berita & Artikel</span>
                <h2>Insight, Kabar, dan Dakwah</h2>
                <p>Artikel dikategorikan sesuai kebutuhan masyarakat: berita, edukasi, dan dakwah.</p>
            </div>
            <div class="tags" style="margin-bottom: 1.6rem;">
                <span>Berita Kegiatan</span>
                <span>Cerita Inspiratif</span>
                <span>Inspirasi Dakwah</span>
                <span>Laporan Sosial</span>
            </div>
            <div class="grid-2">
                @forelse ($featuredPosts as $post)
                    <article class="card">
                        @if ($post->cover_image)
                            <div class="news__media">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->cover_image) }}" alt="{{ $post->title }}">
                            </div>
                        @else
                            <div class="news__media is-empty">
                                <span>GEMMFA</span>
                            </div>
                        @endif
                        <div class="news__body">
                            <span class="badge">{{ $post->category ?? 'Sorotan' }}</span>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->excerpt ?? \Illuminate\Support\Str::limit($post->body, 180) }}</p>
                            <a class="link" href="{{ route('berita.show', $post) }}">Baca laporan lengkap</a>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <h3>Belum ada berita sorotan</h3>
                        <p>Artikel sorotan akan tampil setelah admin mempublikasikan berita.</p>
                    </article>
                @endforelse
            </div>
            <div class="grid-3">
                @forelse ($otherPosts as $post)
                    <article class="card news-card" data-search-item="{{ strtolower($post->title.' '.$post->category.' '.$post->excerpt) }}">
                        @if ($post->cover_image)
                            <div class="news__media">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->cover_image) }}" alt="{{ $post->title }}">
                            </div>
                        @else
                            <div class="news__media is-empty">
                                <span>GEMMFA</span>
                            </div>
                        @endif
                        <div class="news__body">
                            <span class="badge">{{ $post->category ?? 'Berita' }}</span>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->excerpt ?? \Illuminate\Support\Str::limit($post->body, 120) }}</p>
                            <a class="link" href="{{ route('berita.show', $post) }}">Baca selengkapnya</a>
                        </div>
                    </article>
                @empty
                    <article class="card news-card">
                        <h3>Belum ada berita</h3>
                        <p>Artikel akan tampil setelah admin mempublikasikan berita.</p>
                    </article>
                @endforelse
            </div>
            <div class="section__foot">
                <div class="note">Fitur CRUD berita tersedia di Admin Panel.</div>
                <a class="button ghost" href="/login">Kelola Artikel</a>
            </div>
        </div>
    </section>
@endsection
