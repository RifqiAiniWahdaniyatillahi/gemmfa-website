@extends('layouts.site')

@section('title', 'Agenda - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Agenda GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Agenda</span>
                    <h1>Agenda dan Kegiatan GEMMFA</h1>
                    <p>Jadwal kajian, sosial, dan kelas edukasi</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section agenda" id="agenda">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Agenda & Event</span>
                <h2>Kalender Kegiatan GEMMFA</h2>
                <p>Jadwal kajian, kegiatan sosial, dan kelas edukasi yang bisa diikuti remaja gemmfa</p>
            </div>
            <div class="grid-2">
                @forelse ($agendas as $agenda)
                    <div class="card event">
                        <h3>{{ $agenda->start_at->format('d M Y') }}</h3>
                        <p>{{ $agenda->title }}</p>
                        <span class="badge">{{ $agenda->category ?? 'Agenda' }}</span>
                    </div>
                @empty
                    <div class="card event">
                        <h3>Agenda belum tersedia</h3>
                        <p>Jadwal akan tampil setelah admin menambahkan agenda.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

   <section class="section">
    <div class="container">
        <div class="section__head">
            <span class="eyebrow">Agenda Rutin</span>
            <h2>Kegiatan yang berjalan setiap pekan</h2>
            <p>Program rutin yang terbuka bagi para remaja GEMMFA</p>
        </div>
        <div class="grid-3">
            
            <div class="card">
                <h3>Kajian Remaja & Tahfidz Tahsin</h3>
                <p>Kajian keislaman serta pembelajaran tahsin dan tahfidz Al-Qur’an untuk remaja.</p>
                <div class="tags">
                    <span>Malam Sabtu</span>
                    <span>19.30</span>
                </div>
            </div>

            <div class="card">
                <h3>Pelatihan & Pengembangan Diri</h3>
                <p>Pelatihan public speaking, desain, mindset, dan keterampilan dasar untuk pengembangan diri.</p>
                <div class="tags">
                    <span>Malam Minggu</span>
                    <span>19.30</span>
                </div>
            </div>
            <div class="section__foot">
                <div class="note">Informasi perubahan jadwal diinformasikan via WhatsApp komunitas.</div>
                <a class="button ghost" href="https://whatsapp.com/channel/0029VbCYVf7AjPXPSZQRY30w" target="_blank" rel="noopener">Gabung grup info</a>
            </div>
        </div>
    </section>
@endsection
