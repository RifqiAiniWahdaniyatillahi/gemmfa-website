<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'GEMMFA - bertumbuh, bergerak, berdampak')</title>
        <meta name="description" content="Website resmi GEMMFA di bawah DKM Masjid Fathul-Falaah yang berfokus pada kegiatan sosial, edukasi, dan pemberdayaan masyarakat." />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="site">
        <div class="glow backdrop"></div>
        <header class="topbar">
            <div class="container topbar__content">
                <a class="brand" href="{{ route('home') }}">
                    <img class="brand__logo" src="{{ asset('images/gemmfa-logo.png') }}" alt="Logo GEMMFA" />
                </a>
                <nav class="nav" data-nav>
                    <a class="nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    <a class="nav__link {{ request()->routeIs('tentang') ? 'is-active' : '' }}" href="{{ route('tentang') }}">Tentang Kami</a>
                    <a class="nav__link {{ request()->routeIs('program*') ? 'is-active' : '' }}" href="{{ route('program') }}">Program</a>
                    <a class="nav__link {{ request()->routeIs('berita*') ? 'is-active' : '' }}" href="{{ route('berita') }}">Berita</a>
                    <a class="nav__link {{ request()->routeIs('galeri') ? 'is-active' : '' }}" href="{{ route('galeri') }}">Galeri</a>
                    <a class="nav__link {{ request()->routeIs('donasi') ? 'is-active' : '' }}" href="{{ route('donasi') }}">Donasi</a>
                    <a class="nav__link {{ request()->routeIs('agenda') ? 'is-active' : '' }}" href="{{ route('agenda') }}">Agenda</a>
                    <a class="nav__link {{ request()->routeIs('kontak') ? 'is-active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </nav>
                <div class="topbar__actions">
                    <a class="button ghost" href="{{ route('pencarian') }}">Pencarian</a>
                    <a class="button" href="/login">Admin Login</a>
                    <button class="nav-toggle" type="button" aria-label="Buka menu" data-nav-toggle>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </header>

        <main>
            @if (session('success'))
                <div class="container site-alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="container site-alert error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container footer__grid">
                <div>
                    <h3>GEMMFA</h3>
                    <p>bertumbuh, bergerak, berdampak.</p>
                </div>
                <div>
                    <h4>Menu</h4>
                    <a href="{{ route('berita') }}">Berita</a>
                    <a href="{{ route('galeri') }}">Galeri</a>
                    <a href="{{ route('program') }}">Program</a>
                    <a href="{{ route('donasi') }}">Donasi</a>
                </div>
                <div>
                    <h4>Media Sosial</h4>
                    <a href="https://www.instagram.com/gemmfa_official?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener">Instagram</a>
                    <a href="https://www.tiktok.com/@gemmfa.official?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener">TikTok</a>
                    <a href="https://www.youtube.com/@gemmfa_official" target="_blank" rel="noopener">YouTube</a>
                    <a href="https://www.facebook.com/share/1CCqDAgEX5/" target="_blank" rel="noopener">Facebook</a>
                </div>
                <div>
                    <h4>Newsletter</h4>
                    <p>Dapatkan info kegiatan terbaru dari GEMMFA.</p>
                    <div class="newsletter">
                        <input type="email" placeholder="Email" />
                        <button class="button" type="button">Daftar</button>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">2026 GEMMFA. All rights reserved.</div>
        </footer>
    </body>
</html>
