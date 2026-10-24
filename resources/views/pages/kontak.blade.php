@extends('layouts.site')

@section('title', 'Kontak - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Kontak GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Kontak</span>
                    <h1>Terhubung dengan GEMMFA</h1>
                    <p>Hubungi kami untuk kolaborasi dan informasi</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section contact" id="kontak">
        <div class="container contact__grid">
            <div>
                <div class="section__head">
                    <span class="eyebrow">Kontak</span>
                    <h2>Hubungi kami</h2>
                    <p>Masjid Fathul-Falaah, Kp.Tenjonagara Lebak </p>
                </div>
                <div class="contact-cards">
                    <div class="contact-card contact-card--full">
                        <span class="contact-card__label">Kontak Utama</span>
                        <div class="contact-icon-list" aria-label="Kontak utama">
                            <a class="contact-icon" href="https://wa.me/6285607427866" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M12 2a9 9 0 0 0-7.7 13.6L3 22l6.6-1.7A9 9 0 1 0 12 2zm0 2a7 7 0 0 1 0 14c-1.4 0-2.7-.4-3.9-1l-.3-.2-3.9 1 1-3.8-.2-.3A7 7 0 0 1 12 4zm3.9 8.4c-.2-.1-1.1-.6-1.3-.6s-.3-.1-.4.1-.5.6-.6.8-.2.1-.4 0a5.8 5.8 0 0 1-1.7-1 6.5 6.5 0 0 1-1.2-1.5c-.1-.2 0-.3.1-.4l.3-.3c.1-.1.1-.2.2-.3.1-.1 0-.2 0-.3s-.4-1.1-.6-1.5c-.2-.4-.3-.3-.4-.3h-.4c-.1 0-.3.1-.4.2-.1.2-.6.6-.6 1.5s.6 1.7.7 1.8c.1.1 1.2 1.8 3 2.5.4.2.8.3 1.1.4.5.1 1 .1 1.3.1.4-.1 1.1-.4 1.2-.8.2-.4.2-.8.1-.9-.1-.1-.2-.1-.4-.2z" />
                                </svg>
                                <span>WhatsApp</span>
                            </a>
                            <a class="contact-icon" href="mailto:generasimudamesjidfathulfalaah@gmail.com">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm0 2v.2l8 5.2 8-5.2V8H4zm16 8v-5.4l-8 5.2-8-5.2V16h16z" />
                                </svg>
                                <span>Email</span>
                            </a>
                            <a class="contact-icon" href="https://www.instagram.com/gemmfa_official?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4zm10 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zm-5 3.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7zm0 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm4.3-3.1a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                            <a class="contact-icon" href="https://www.facebook.com/share/1CCqDAgEX5/" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" role="img" aria-hidden="true">
                                    <path d="M13.8 9.4V7.7c0-.7.5-1.3 1.2-1.3h1.5V4h-1.9c-2.2 0-3.6 1.5-3.6 3.6v1.8H9v2.6h2v8h2.8v-8h2.2l.4-2.6h-2.6z" />
                                </svg>
                                <span>Facebook</span>
                            </a>
                        </div>
                    </div>
                    <div class="contact-card contact-card--wide">
                        <span class="contact-card__label">Alamat</span>
                        <p class="contact-card__value">Kp.Tenjonagara Lebak Rw.01/Rt.02, Desa.Mekarjaya Kec.Pacet Kabupaten Bandung Jawa Barat</p>
                    </div>
                </div>
                <div class="map">
                    <iframe
                        title="Peta Masjid Fathul-Falaah"
                        src="https://maps.google.com/maps?q=WP22+WW8, Jl. Tenjonagara, Lebak, Mekarjaya, Kec. Pacet, Kabupaten Bandung, Jawa Barat 40385, Indonesia&output=embed"
                        loading="lazy"
                    ></iframe>
                    <a class="link" href="https://maps.google.com/maps?q=WP22+WW8, Jl. Tenjonagara, Lebak, Mekarjaya, Kec. Pacet, Kabupaten Bandung, Jawa Barat 40385, Indonesia" target="_blank" rel="noopener">Lihat di Google Maps</a>
                </div>
            </div>
            <div class="card form">
                <h3>Kirim Pesan</h3>
                <form method="post" action="{{ route('kontak.store') }}">
                    @csrf
                    <label>
                        Nama
                        <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required />
                    </label>
                    <label>
                        Email
                        <input type="email" name="email" placeholder="email@contoh.com" value="{{ old('email') }}" required />
                    </label>
                    <label>
                        Telepon
                        <input type="text" name="phone" placeholder="08xx" value="{{ old('phone') }}" />
                    </label>
                    <label>
                        Subjek
                        <input type="text" name="subject" placeholder="Subjek pesan" value="{{ old('subject') }}" />
                    </label>
                    <label>
                        Pesan
                        <textarea name="message" rows="5" placeholder="Tuliskan pesan Anda" required>{{ old('message') }}</textarea>
                    </label>
                    <button class="button" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </section>

@endsection
