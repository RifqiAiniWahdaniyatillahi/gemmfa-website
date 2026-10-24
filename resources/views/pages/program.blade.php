@extends('layouts.site')

@section('title', 'Program - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Program GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Program</span>
                    <h1>Program dan Kegiatan GEMMFA</h1>
                    <p>Gerak nyata untuk pembinaan dan dampak sosial</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section programs" id="program">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Program & Kegiatan</span>
                <h2>Fokus utama GEMMFA</h2>
                <p>Setiap program didesain dengan SOP, dokumentasi, indikator dampak, dan laporan berkala.</p>
            </div>
            <div class="grid-3">
                @forelse ($programs as $program)
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
                        <h3>Program belum tersedia</h3>
                        <p>Silakan kembali lagi setelah admin menambahkan program.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Program Unggulan</span>
                <h2>Inisiatif prioritas sepanjang tahun</h2>
                <p>Program dengan dampak terbesar dan fokus utama tim GEMMFA.</p>
            </div>
            <div class="grid-3">
                <div class="card">
                    <h3>Santunan Anak Yatim</h3>
                    <p>Program kepedulian sosial melalui santunan anak yatim yang dilaksanakan khususnya pada bulan Ramadhan sebagai bentuk berbagi dan kepedulian terhadap sesama.</p>
                    <div class="tags">
                        <span>Santunan</span>
                        <span>Kebersamaan</span>
                        <span>Kepeduliaan</span>
                    </div>
                </div>
                <div class="card">
                    <h3>Sanlat Ramadhan Gemmfa</h3>
                    <p>Kegiatan pesantren kilat untuk anak-anak dengan pembelajaran keislaman yang interaktif, edukatif, dan menyenangkan.</p>
                    <div class="tags">
                        <span>Edukasi Islam</span>
                        <span>Kegiatan Interaktif</span>
                        <span>Kebersamaan</span>
                    </div>
                </div>
                <div class="card">
                    <h3>Pelatihan & Pengembangan Diri</h3>
                    <p>Program pelatihan untuk meningkatkan keterampilan, kepercayaan diri, serta membentuk mindset positif generasi muda.</p>
                    <div class="tags">
                        <span>Public Speaking</span>
                        <span>Desain & Kreativitas</span>
                        <span>Mindset & Leadership</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Dokumentasi</span>
                <h2>Transparansi dan laporan kegiatan</h2>
                <p>GEMMFA berkomitmen menjaga keterbukaan informasi melalui seluruh dokumentasi dan laporan kegiatan yang dapat diakses oleh masyarakat.</p>
            </div>
            <div class="grid-3">
                <div class="card document">
                    <h3>Dokumentasi Program</h3>
                    <p>Setiap program GEMMFA didokumentasikan sebagai bentuk pertanggungjawaban dan evaluasi kegiatan.</p>
                    <div class="tags">
                        <span>Laporan kegiatan (PDF) untuk para donatur</span>
                        <span>Dokumentasi</span>
                        <span>Evaluasi program</span>
                    </div>
                </div>
                <div class="card document">
                    <h3>Detail Program</h3>
                    <p>Informasi setiap program disusun secara jelas untuk memudahkan jamaah dan masyarakat dalam memahami kegiatan GEMMFA.</p>
                    <div class="tags">
                        <span>Target peserta</span>
                        <span>Timeline kegiatan</span>
                        <span>Keterlibatan panitia</span>
                    </div>
                </div>
                <div class="card document">
                    <h3>Publikasi & Media Sosial</h3>
                    <p>Masyarakat juga dapat melihat dokumentasi kegiatan GEMMFA melalui media sosial resmi sebagai sarana informasi, publikasi, dan transparansi kegiatan.</p>
                    <div class="tags">
                        <span><a href="https://www.instagram.com/gemmfa_official?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener">Instagram</a></span>
                        <span><a href="https://www.tiktok.com/@gemmfa.official?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener">TikTok</a></span>
                        <span><a href="https://www.youtube.com/@gemmfa_official" target="_blank" rel="noopener">YouTube</a></span>
                        <span><a href="https://www.facebook.com/share/1CCqDAgEX5/" target="_blank" rel="noopener">Facebook</a></span>
                    </div>
                </div>
            </div>
            <div class="section__foot">
                <div class="note">Butuh informasi lebih rinci? Hubungi tim program.</div>
                <a class="button ghost" href="{{ route('kontak') }}">Konsultasi program</a>
            </div>
        </div>
    </section>
@endsection
