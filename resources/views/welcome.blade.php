@extends('layouts.site')

@section('title', 'GEMMFA - bertumbuh, bergerak, berdampak')

@section('content')
    <section class="hero" id="beranda">
        <div class="hero__welcome">
            <div class="container hero__welcome-inner">
                <span class="eyebrow">Assalamu'alaikum</span>
                <h2 class="hero__welcome-title">Selamat Datang di GEMMFA</h2>
                <p class="hero__welcome-text">
                    Menjadi wadah pembinaan remaja dan pemuda Masjid Fathul-Falaah agar terus bertumbuh
                    dalam iman, bergerak dalam kepedulian, dan berdampak bagi masyarakat.
                </p>
                <a class="button ghost" href="{{ route('tentang') }}">Kenali GEMMFA</a>
            </div>
        </div>
        <div class="container hero__grid">
            <div class="hero__content">
                <h1>Gerakan kebaikan yang menyatu dengan ilmu, ibadah, dan kepedulian.</h1>
                <p>
                    GEMMFA berkomitmen untuk bertumbuh dalam kebaikan, bergerak dalam kepedulian, serta menguatkan dakwah dan pemberdayaan masyarakat melalui program yang terencana, transparan, dan memberikan dampak positif bagi lingkungan sekitar.
                </p>
                <div class="hero__actions">
                    <a class="button" href="{{ route('donasi') }}">Mulai Berdonasi</a>
                    <a class="button ghost" href="{{ route('program') }}">Lihat Program</a>
                </div>
                <div class="hero__highlights">
                    <div class="highlight">
                        <span class="highlight__value">{{ $stats['programs'] }}</span>
                        <span class="highlight__label">Program aktif</span>
                    </div>
                    <div class="highlight">
                        <span class="highlight__value">{{ $stats['agendas'] }}</span>
                        <span class="highlight__label">Agenda terjadwal</span>
                    </div>
                    <div class="highlight">
                        <span class="highlight__value">{{ $stats['news_posts'] }}</span>
                        <span class="highlight__label">Artikel berita</span>
                    </div>
                </div>
            </div>
            <div class="hero__panel">
                <div class="hero__card">
                    <h3>Fokus Utama GEMMFA</h3>
                    <p>
                        “Bertumbuh dalam kebaikan, bergerak dalam kepedulian, dan berdampak bagi masyarakat sekitar.
                    </p>
                    <ul class="checklist">
                        <li>Bidang keagamaan & pembinaan remaja</li>
                        <li>Bidang pengembangan diri & keterampilan</li>
                        <li>Bidang sosial & kepedulian</li>
                        <li>Program tahunan (Sanlat, MABIT, kegiatan besar)</li>
                        <li>Kegiatan rutin internal GEMMFA</li>
                    </ul>
                </div>
                <div class="hero__card outline">
                    <h4>Kegiatan Terbaru</h4>
                    <div class="stack">
                        <div class="stack__item">
                            <span class="badge">Sosial</span>
                            <p>Santunan anak yatim se-daerah YPI tenjonagara</p>
                        </div>
                        <div class="stack__item">
                            <span class="badge">Pendidikan</span>
                            <p>Pelatihan Pengembangan Diri & Keterampilan</p>
                        </div>
                        <div class="stack__item">
                            <span class="badge">Keagamaan</span>
                            <p>Belajar Tahfidz dan Tahsin setiap malam sabtu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section about about-profile">
        <div class="container about-profile__grid">
            <div class="about-profile__media">
                <div class="about-profile__frame">
                    <img src="{{ asset('images/profil.jpeg') }}" alt="Logo GEMMFA">
                </div>
                <div class="about-profile__caption">Dokumentasi asli remaja Gemmfa</div>
            </div>
            <div class="about-profile__content">
                <span class="eyebrow">Profil Singkat</span>
                <h2>Organisasi Islami yang menguatkan generasi muda</h2>
                <p>
                    GEMMFA bernaung di bawah DKM Masjid Fathul-Falaah sebagai penggerak generasi muda dalam menguatkan dakwah, pendidikan, dan kepedulian sosial yang terarah, dan berdampak bagi masyarakat.
                </p>
                <div class="about-profile__actions">
                    <a class="button" href="{{ route('tentang') }}">Baca profil lengkap</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section programs">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Program Unggulan</span>
                <h2>Program utama Gemmfa yang berjalan sepanjang tahun</h2>
                <p>Setiap program selalu didokumentasi dan dilaporkan dampaknya.</p>
            </div>
            <div class="grid-3">
                @forelse ($featuredPrograms as $program)
                    <div class="card program" data-search-item="{{ strtolower($program->title.' '.$program->category.' '.$program->summary) }}">
                        @if ($program->image_path)
                            <div class="program__media">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($program->image_path) }}" alt="{{ $program->title }}">
                            </div>
                        @else
                            <div class="program__media is-empty">
                                <span>GEMMFA</span>
                            </div>
                        @endif
                        <div class="program__body">
                            <span class="badge">{{ $program->category ?? 'Program' }}</span>
                            <h3>{{ $program->title }}</h3>
                            <p>{{ $program->summary ?? $program->description }}</p>
                            <a class="link" href="{{ route('program.show', $program) }}">Lihat detail</a>
                        </div>
                    </div>
                @empty
                    <div class="card program">
                        <div class="program__media is-empty">
                            <span>GEMMFA</span>
                        </div>
                        <div class="program__body">
                        <h3>Belum ada program</h3>
                        <p>Program akan tampil setelah ditambahkan oleh admin.</p>
                        <a class="link" href="{{ route('program') }}">Lihat semua program</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section agenda">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Agenda Terdekat</span>
                <h2>Jadwal kegiatan Rutin</h2>
                <p>Ikuti kajian, kelas edukasi, dan aksi sosial yang terbuka untuk umum.</p>
            </div>
            <div class="grid-2">
                @forelse ($latestAgendas as $agenda)
                    <div class="card event">
                        <h3>{{ $agenda->start_at->format('d M Y') }}</h3>
                        <p>{{ $agenda->title }}</p>
                        <span class="badge">{{ $agenda->category ?? 'Agenda' }}</span>
                    </div>
                @empty
                    <div class="card event">
                        <h3>Agenda belum tersedia</h3>
                        <p>Jadwal kegiatan akan ditampilkan setelah admin menambahkan agenda.</p>
                    </div>
                @endforelse
            </div>
            <div class="section__foot">
                <div class="note">Agenda lengkap tersedia setiap awal bulan.</div>
                <a class="button ghost" href="{{ route('agenda') }}">Lihat semua agenda</a>
            </div>
        </div>
    </section>

    <section class="section donation">
        <div class="container donation__grid">
            <div class="donation__content">
                <span class="eyebrow">Donasi & Wakaf</span>
                <h2>Salurkan Amanah Terbaik untuk Kebaikan Bersama</h2>
                <p>
                    Donasi Anda menjadi bagian dari upaya GEMMFA dalam menebarkan kebaikan, khususnya melalui program santunan anak yatim dan wakaf yang bermanfaat bagi masyarakat.
                </p>
                <div class="tags">
                    <span>Donasi Santunan</span>
                    <span>Wakaf produktif</span>
                </div>
            </div>
            <div class="donation__card">
                <h3>Prioritas Penyaluran</h3>
                <ul class="checklist">
                    <li>Santunan dan bantuan untuk anak yatim</li>
                    <li>Pengadaan Al-Quran dan perlengkapan ibadah</li>
                    <li>Dukungan kegiatan pembinaan keislaman</li>
                    
                </ul>
                <a class="button" href="{{ route('donasi') }}">Detail donasi</a>
            </div>
        </div>
    </section>

    <section class="section news">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Kabar Terkini</span>
                <h2>Berita dan Artikel Gemmfa</h2>
                <p>Informasi kegiatan, edukasi dan inspirasi dakwah untuk Sahabat Gemmfa</p>
            </div>
            <div class="grid-3">
                @forelse ($latestNews as $post)
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
                        <a class="link" href="{{ route('berita') }}">Lihat berita</a>
                    </article>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section testimonials" id="testimoni">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Testimoni</span>
                <h2>Cerita inspiratif</h2>
                <p>Suara nyata dari Orang-orang di lingkungan GEMMFA</p>
            </div>
            <div class="grid-3">
                <div class="card quote">
                    <p>"Sedih bangga terharu campur aduk pokokna 😊 mugia lelahna cape kalian menjadi lillah.sehat selalu GEMMFA /panitia panitia ikut terlibat sehat selalu tur  jembar rezekina😇🤲🤲"</p>
                    <span>- Teh Nurjannah, Jamaah</span>
                </div>
                <div class="card quote">
                    <p>"MasyaaAllah Terimakasih dan Semangat buat remaja GEMMFA yang telah membantu di bidang pendidikan🥰👍"</p>
                    <span>- Ibu Rosita, Guru MDTA Fathul Falaah</span>
                </div>
                <div class="card quote">
                    <p>"Kami bersyukur dengan adanya program ini. Semoga bantuan yang diberikan bisa bermanfaat bagi anak-anak, dan sekaligus dapat memotivasi mereka untuk bisa berbuat baik kepada sesama🤲"</p>
                    <span>- Ust. Yudi Yasa,M.Pd, Kepala Sekolah</span>
                </div>
            </div>
        </div>
    </section>
@endsection
