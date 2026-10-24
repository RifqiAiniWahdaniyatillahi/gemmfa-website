@extends('layouts.site')

@section('title', 'Pencarian - GEMMFA')

@section('content')
    <section class="section search" id="pencarian">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Pencarian</span>
                <h2>Cari artikel atau program</h2>
                <p>Ketik kata kunci untuk memfilter konten di halaman ini.</p>
            </div>
            <div class="search__box">
                <input type="text" placeholder="Contoh: donasi, kajian, literasi" data-search-input />
                <span class="search__hint">Hasil akan disaring otomatis</span>
            </div>
            <div class="grid-3" style="margin-top: 1.6rem;">
                @forelse ($items as $item)
                    <div class="card" data-search-item="{{ strtolower($item['keywords']) }}">
                        <span class="badge">{{ $item['type'] }}</span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['excerpt'] }}</p>
                        <a class="link" href="{{ $item['url'] }}">Lihat detail</a>
                    </div>
                @empty
                    <div class="card">
                        <h3>Belum ada data</h3>
                        <p>Konten pencarian akan tampil setelah admin mengisi data.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
