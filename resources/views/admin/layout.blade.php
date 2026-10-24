<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Admin GEMMFA')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="admin-body">
        <div class="admin-layout">
            <aside class="admin-sidebar">
                <div class="admin-brand">
                    <img class="brand__logo" src="{{ asset('images/gemmfa-logo.png') }}" alt="Logo GEMMFA" />
                    <div>
                        <h1>Admin GEMMFA</h1>
                        <p>Panel pengelola</p>
                    </div>
                </div>
                <nav class="admin-nav">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a href="{{ route('admin.news-posts.index') }}">Berita</a>
                    <a href="{{ route('admin.programs.index') }}">Program</a>
                    <a href="{{ route('admin.agendas.index') }}">Agenda</a>
                    <a href="{{ route('admin.gallery-items.index') }}">Galeri</a>
                    <a href="{{ route('admin.donations.index') }}">Donasi</a>
                    <a href="{{ route('admin.contact-messages.index') }}">Kontak</a>
                </nav>
                <form action="{{ route('logout') }}" method="post" class="admin-logout">
                    @csrf
                    <button type="submit" class="button ghost">Keluar</button>
                </form>
            </aside>
            <div class="admin-main">
                <header class="admin-header">
                    <div>
                        <h2>@yield('heading', 'Dashboard')</h2>
                        <p>@yield('subheading')</p>
                    </div>
                    <a class="button" href="{{ route('home') }}">Lihat Website</a>
                </header>
                @include('admin.partials.flash')
                <div class="admin-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
