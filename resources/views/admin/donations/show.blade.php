@extends('admin.layout')

@section('title', 'Detail Donasi')
@section('heading', 'Detail Donasi')
@section('subheading', $donation->donor_name)

@section('content')
    <div class="admin-card">
        <h3>{{ $donation->donor_name }}</h3>
        <p><strong>Telepon:</strong> {{ $donation->donor_phone ?? '-' }}</p>
        <p><strong>Nominal:</strong> Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ $donation->status }}</p>
        <p><strong>Donasi:</strong> {{ $donation->donated_at ? $donation->donated_at->format('d M Y H:i') : '-' }}</p>
        <p><strong>Konfirmasi:</strong> {{ $donation->confirmed_at ? $donation->confirmed_at->format('d M Y H:i') : '-' }}</p>
        <p><strong>Pesan:</strong> {{ $donation->message ?? '-' }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.donations.edit', $donation) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.donations.index') }}">Kembali</a>
        </div>
    </div>
@endsection
