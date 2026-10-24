@extends('layouts.site')

@section('title', 'Donasi - GEMMFA')

@section('content')
    <section class="about-banner">
        <div class="container">
            <div class="about-banner__media">
                <img src="{{ asset('images/profil2.jpeg') }}" alt="Donasi GEMMFA">
                <div class="about-banner__overlay">
                    <span class="eyebrow">Donasi</span>
                    <h1>Dukung Program Kebaikan GEMMFA</h1>
                    <p>Transparan, tepat sasaran, dan bermanfaat</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Transparansi</span>
                <h2>Penyaluran yang terbuka dan terukur</h2>
                <p>Setiap penyaluran dicatat dan diinformasikan sesuai jadwal program.</p>
            </div>
            <div class="grid-3">
                <div class="card">
                    <h3>Transparan</h3>
                    <p>Laporan bulanan dan dokumentasi kegiatan dibagikan melalui kanal resmi.</p>
                </div>
                <div class="card">
                    <h3>Tepat Sasaran</h3>
                    <p>Data penerima manfaat diverifikasi bersama ketua, pengurus dan para mu'alim </p>
                </div>
                <div class="card">
                    <h3>Kolaboratif</h3>
                    <p>Program dijalankan bersama jamaah/masyarakat, mitra komunitas, dan relawan lokal.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section donation" id="donasi">
        <div class="container donation__grid">
            <div class="donation__content">
                <span class="eyebrow">Informasi Donasi</span>
                <h2>Informasi donasi program GEMMFA</h2>
                <p>
                    Program santunan anak yatim dilaksanakan setahun sekali di bulan Ramadhan.
                    Informasi donasi di sini bersifat pendukung dan akan diumumkan sesuai kebutuhan program.
                </p>
                <div class="bank-list">
                    <div>
                        <h4>Rekening Donasi</h4>
                        <p>E-Wallet Dana - 085607427866</p>
                        <p>Atas Nama: Rifqi Aini Wahdaniyatillahi</p>
                    </div>
                </div>
                <p class="note">Pengumuman program donasi utama akan diinformasikan menjelang Ramadhan.</p>
            </div>
            <div class="donation__card">
                <h3>Catatan Program</h3>
                <ul class="checklist">
                    <li>Santunan anak yatim dilaksanakan saat Ramadhan</li>
                    <li>Prioritas program dapat berubah mengikuti kebutuhan</li>
                    <li>Informasi penyaluran dipublikasikan melalui kanal resmi</li>
                </ul>
                <a class="button ghost" href="#form-donasi">Konfirmasi Donasi (opsional)</a>
            </div>
        </div>
    </section>

    <section class="section" id="form-donasi">
        <div class="container">
            <div class="section__head">
                <span class="eyebrow">Formulir</span>
                <h2>Formulir konfirmasi (opsional)</h2>
                <p>Digunakan saat ada program donasi yang aktif.</p>
            </div>
            <div class="card form">
                <form method="post" action="{{ route('donasi.store') }}">
                    @csrf
                    <label>
                        Nama Donatur
                        <input type="text" name="donor_name" value="{{ old('donor_name') }}" required />
                    </label>
                    <label>
                        Nomor Telepon
                        <input type="text" name="donor_phone" value="{{ old('donor_phone') }}" />
                    </label>
                    <label>
                        Nominal
                        <input type="number" name="amount" value="{{ old('amount') }}" required />
                    </label>
                    <label>
                        Pesan
                        <textarea name="message" rows="4">{{ old('message') }}</textarea>
                    </label>
                    <button class="button" type="submit">Kirim Konfirmasi</button>
                </form>
            </div>
        </div>
    </section>
@endsection
