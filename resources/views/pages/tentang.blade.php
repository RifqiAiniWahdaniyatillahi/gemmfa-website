@extends('layouts.site')

@section('title', 'Tentang Kami - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Kegiatan GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Tentang Kami</span>
                    <h1>Profil dan Perjalanan GEMMFA</h1>
                    <p>Bertumbuh, Bergerak, Berdampak</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section about-hero" id="tentang">
        <div class="container about-hero__grid">
            <div>
                <span class="eyebrow">Tentang GEMMFA</span>
                <h2>Generasi Muda Masjid Fathul-Falaah</h2>
                <p>
                    GEMMFA adalah wadah generasi muda Masjid Fathul-Falaah yang bergerak dalam dakwah, pendidikan, dan kepedulian sosial untuk memberikan dampak positif bagi masyarakat.
                </p>
                <div class="about-hero__meta">
                    <div>
                        <span class="about-hero__label">Lokasi</span>
                        <span>Kampung Tenjonagara Lebak, Desa Mekarjaya</span>
                    </div>
                    <div>
                        <span class="about-hero__label">Kabupaten</span>
                        <span>Bandung, Jawa Barat</span>
                    </div>
                </div>
            </div>
            <div class="about-hero__card">
                <h3>Pengertian Umum</h3>
                <p>Generasi Muda Masjid Fathul-Falaah adalah generasi muda di lingkungan Masjid Fathul-Falaah.</p>
                <div class="about-hero__pill">Sejak 2000: GEMMFA</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container about-vision">
            <div class="about-vision__card">
                <div class="about-vision__head">
                    <span class="about-vision__badge">Visi</span>
                    <span class="about-vision__line" aria-hidden="true"></span>
                </div>
                <p class="about-vision__text">Menjadi Generasi Muda Masjid yang beriman, berakhlak mulia, cerdas, kreatif, dan aktif berkontribusi positif bagi umat dan masyarakat.</p>
            </div>
            <div class="about-vision__card light">
                <div class="about-vision__head">
                    <span class="about-vision__badge">Misi</span>
                    <span class="about-vision__line" aria-hidden="true"></span>
                </div>
                <ul class="about-vision__list">
                    <li>Membina dan menguatkan keimanan dan ketaqwaan anggota melalui kegiatan keagamaan yang rutin.</li>
                    <li>Mengembangkan potensi remaja dalam bidang ilmu, seni, kepemimpinan, dan dakwah.</li>
                    <li>Menjadi wadah kreativitas dan inspirasi bagi generasi muda.</li>
                    <li>Menjalankan kegiatan sosial dan ekonomi yang bermanfaat bagi umat.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Sejarah</span>
                <h2>Sejarah nama GEMMFA</h2>
                <p>Menyesuaikan cakupan pembinaan agar merangkul remaja hingga pemuda.</p>
            </div>
            <div class="about-timeline">
                <div class="about-timeline__item">
                    <span class="about-timeline__year">1995</span>
                    <div>
                        <h3>IRMAFA</h3>
                        <p>IRMAFA berdiri sebagai wadah pembinaan remaja masjid.</p>
                    </div>
                </div>
                <div class="about-timeline__item">
                    <span class="about-timeline__year">2000</span>
                    <div>
                        <h3>GEMMFA</h3>
                        <p>Nama diubah menjadi GEMMFA agar mencakup remaja dan pemuda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Media Resmi</span>
                <h2>Kanal komunikasi dan publikasi</h2>
                <p>Digunakan untuk administrasi, dokumentasi program, dan publikasi kegiatan.</p>
            </div>
            <div class="about-media about-media--two">
                <div class="about-media__item">
                    <h3>Email Resmi</h3>
                    <p>Alamat email organisasi untuk administrasi dan korespondensi.</p>
                    <div class="social-list">
                        <a class="social-link" href="mailto:generasimudamesjidfathulfalaah@gmail.com">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm0 2v.2l8 5.2 8-5.2V8H4zm16 8v-5.4l-8 5.2-8-5.2V16h16z" />
                                </svg>
                            </span>
                            <span>generasimudamesjidfathulfalaah@gmail.com</span>
                        </a>
                        <a class="social-link" href="https://whatsapp.com/channel/0029VbCYVf7AjPXPSZQRY30w" target="_blank" rel="noopener">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M12 2a9 9 0 0 0-7.7 13.6L3 22l6.6-1.7A9 9 0 1 0 12 2zm0 2a7 7 0 0 1 0 14c-1.4 0-2.7-.4-3.9-1l-.3-.2-3.9 1 1-3.8-.2-.3A7 7 0 0 1 12 4zm3.9 8.4c-.2-.1-1.1-.6-1.3-.6s-.3-.1-.4.1-.5.6-.6.8-.2.1-.4 0a5.8 5.8 0 0 1-1.7-1 6.5 6.5 0 0 1-1.2-1.5c-.1-.2 0-.3.1-.4l.3-.3c.1-.1.1-.2.2-.3.1-.1 0-.2 0-.3s-.4-1.1-.6-1.5c-.2-.4-.3-.3-.4-.3h-.4c-.1 0-.3.1-.4.2-.1.2-.6.6-.6 1.5s.6 1.7.7 1.8c.1.1 1.2 1.8 3 2.5.4.2.8.3 1.1.4.5.1 1 .1 1.3.1.4-.1 1.1-.4 1.2-.8.2-.4.2-.8.1-.9-.1-.1-.2-.1-.4-.2z" />
                                </svg>
                            </span>
                            <span>Saluran WhatsApp GEMMFA Insight</span>
                        </a>
                    </div>
                </div>
                <div class="about-media__item">
                    <h3>Media Sosial</h3>
                    <p>Instagram, TikTok, YouTube, dan Facebook untuk publikasi dan edukasi.</p>
                    <div class="social-list">
                        <a class="social-link" href="https://www.instagram.com/gemmfa_official?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4zm10 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zm-5 3.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zm0 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm4.3-3.1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </span>
                            <span>Instagram</span>
                        </a>
                        <a class="social-link" href="https://www.tiktok.com/@gemmfa.official?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M14 3c.3 2.1 1.8 3.8 3.9 4.1V9c-1.5-.1-2.8-.7-3.9-1.6V14a5 5 0 1 1-5-5c.3 0 .7 0 1 .1v2.1a2.9 2.9 0 1 0 2 2.8V3h2z" />
                                </svg>
                            </span>
                            <span>TikTok</span>
                        </a>
                        <a class="social-link" href="https://www.youtube.com/@gemmfa_official" target="_blank" rel="noopener">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M22 12s0-3.4-.4-5a2.7 2.7 0 0 0-1.9-1.9C18.1 4.7 12 4.7 12 4.7s-6.1 0-7.7.4A2.7 2.7 0 0 0 2.4 7C2 8.6 2 12 2 12s0 3.4.4 5a2.7 2.7 0 0 0 1.9 1.9c1.6.4 7.7.4 7.7.4s6.1 0 7.7-.4a2.7 2.7 0 0 0 1.9-1.9c.4-1.6.4-5 .4-5zM10 15.5v-7l6 3.5-6 3.5z" />
                                </svg>
                            </span>
                            <span>YouTube</span>
                        </a>
                        <a class="social-link" href="https://www.facebook.com/share/1CCqDAgEX5/" target="_blank" rel="noopener">
                            <span class="social-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M13.8 9.4V7.7c0-.7.5-1.3 1.2-1.3h1.5V4h-1.9c-2.2 0-3.6 1.5-3.6 3.6v1.8H9v2.6h2v8h2.8v-8h2.2l.4-2.6h-2.6z" />
                                </svg>
                            </span>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section impact">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Sorotan Dampak</span>
                <h2>Jejak Langkah GEMMFA</h2>
                <p>Jejak langkah GEMMFA dalam menghadirkan kebaikan melalui berbagai program pembinaan, kegiatan sosial, dan pengembangan generasi muda.</p>
            </div>
            <div class="impact__grid">
                <div class="impact__card">
                    <span class="impact__value">10+</span>
                    <span class="impact__label">Program & kegiatan aktif</span>
                </div>
                <div class="impact__card">
                    <span class="impact__value">25+</span>
                    <span class="impact__label">Anggota aktif</span>
                </div>
                <div class="impact__card">
                    <span class="impact__value">4+</span>
                    <span class="impact__label">Agena Rutin Setiap Bulan</span>
                </div>
                <div class="impact__card">
                    <span class="impact__value">3+</span>
                    <span class="impact__label">Kegiatan Tahunan</span>
                </div>
            </div>
            <div class="impact__note">
                Fokus kami menjaga keberlanjutan program, transparansi laporan, dan pertumbuhan remaja masjid.
            </div>
        </div>
    </section>

    <section class="section about-cta">
        <div class="container about-cta__inner">
            <div>
                <h2>Mari berkolaborasi untuk program bermanfaat</h2>
                <p>Hubungi tim GEMMFA untuk kolaborasi program-program bersama kami</p>
            </div>
            <a class="button" href="{{ route('kontak') }}">Hubungi GEMMFA</a>
        </div>
    </section>
@endsection
