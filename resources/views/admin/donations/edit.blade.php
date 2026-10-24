@extends('admin.layout')

@section('title', 'Edit Donasi')
@section('heading', 'Edit Donasi')
@section('subheading', 'Perbarui data donasi.')

@section('content')
    <form method="post" action="{{ route('admin.donations.update', $donation) }}" class="admin-form">
        @csrf
        @method('PUT')
        <label>
            Nama Donatur
            <input type="text" name="donor_name" value="{{ old('donor_name', $donation->donor_name) }}" required />
        </label>
        <label>
            Telepon Donatur
            <input type="text" name="donor_phone" value="{{ old('donor_phone', $donation->donor_phone) }}" />
        </label>
        <label>
            Nominal
            <input type="number" name="amount" value="{{ old('amount', $donation->amount) }}" required />
        </label>
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', $donation->status) }}" />
        </label>
        <label>
            Tanggal Donasi
            <input type="datetime-local" name="donated_at" value="{{ old('donated_at', optional($donation->donated_at)->format('Y-m-d\TH:i')) }}" />
        </label>
        <label>
            Tanggal Konfirmasi
            <input type="datetime-local" name="confirmed_at" value="{{ old('confirmed_at', optional($donation->confirmed_at)->format('Y-m-d\TH:i')) }}" />
        </label>
        <label>
            Pesan
            <textarea name="message" rows="4">{{ old('message', $donation->message) }}</textarea>
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
