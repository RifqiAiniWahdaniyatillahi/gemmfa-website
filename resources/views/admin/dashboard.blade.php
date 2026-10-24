@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('heading', 'Dashboard')
@section('subheading', 'Ringkasan cepat untuk pengelolaan konten GEMMFA.')

@section('content')
    <div class="admin-grid">
        <div class="admin-card">
            <h3>Berita</h3>
            <p>{{ $stats['news_posts'] }} artikel</p>
            <a class="link" href="{{ route('admin.news-posts.index') }}">Kelola berita</a>
        </div>
        <div class="admin-card">
            <h3>Program</h3>
            <p>{{ $stats['programs'] }} program</p>
            <a class="link" href="{{ route('admin.programs.index') }}">Kelola program</a>
        </div>
        <div class="admin-card">
            <h3>Agenda</h3>
            <p>{{ $stats['agendas'] }} agenda</p>
            <a class="link" href="{{ route('admin.agendas.index') }}">Kelola agenda</a>
        </div>
        <div class="admin-card">
            <h3>Galeri</h3>
            <p>{{ $stats['gallery_items'] }} item</p>
            <a class="link" href="{{ route('admin.gallery-items.index') }}">Kelola galeri</a>
        </div>
        <div class="admin-card">
            <h3>Donasi</h3>
            <p>{{ $stats['donations'] }} donasi</p>
            <a class="link" href="{{ route('admin.donations.index') }}">Kelola donasi</a>
        </div>
        <div class="admin-card">
            <h3>Kontak</h3>
            <p>{{ $stats['contact_messages'] }} pesan</p>
            <a class="link" href="{{ route('admin.contact-messages.index') }}">Kelola kontak</a>
        </div>
    </div>
@endsection
