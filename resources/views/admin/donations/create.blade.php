@extends('admin.layout')

@section('title', 'Tambah Donasi')
@section('heading', 'Tambah Donasi')
@section('subheading', 'Input donasi baru.')

@section('content')
    <form method="post" action="{{ route('admin.donations.store') }}" class="admin-form">
        @csrf
        <label>
            Nama Donatur
            <input type="text" name="donor_name" value="{{ old('donor_name') }}" required />
        </label>
        <label>
            Telepon Donatur
            <input type="text" name="donor_phone" value="{{ old('donor_phone') }}" />
        </label>
        <label>
            Nominal
            <input type="number" name="amount" value="{{ old('amount') }}" required />
        </label>
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', 'pending') }}" />
        </label>
        <label>
            Tanggal Donasi
            <input type="datetime-local" name="donated_at" value="{{ old('donated_at') }}" />
        </label>
        <label>
            Tanggal Konfirmasi
            <input type="datetime-local" name="confirmed_at" value="{{ old('confirmed_at') }}" />
        </label>
        <label>
            Pesan
            <textarea name="message" rows="4">{{ old('message') }}</textarea>
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
