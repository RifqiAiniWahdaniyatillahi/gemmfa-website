@extends('admin.layout')

@section('title', 'Tambah Pesan')
@section('heading', 'Tambah Pesan')
@section('subheading', 'Input pesan kontak baru.')

@section('content')
    <form method="post" action="{{ route('admin.contact-messages.store') }}" class="admin-form">
        @csrf
        <label>
            Nama
            <input type="text" name="name" value="{{ old('name') }}" required />
        </label>
        <label>
            Email
            <input type="email" name="email" value="{{ old('email') }}" required />
        </label>
        <label>
            Telepon
            <input type="text" name="phone" value="{{ old('phone') }}" />
        </label>
        <label>
            Subjek
            <input type="text" name="subject" value="{{ old('subject') }}" />
        </label>
        <label>
            Pesan
            <textarea name="message" rows="4" required>{{ old('message') }}</textarea>
        </label>
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', 'new') }}" />
        </label>
        <label>
            Tanggal Selesai
            <input type="datetime-local" name="resolved_at" value="{{ old('resolved_at') }}" />
        </label>
        <button type="submit" class="button">Simpan</button>
    </form>
@endsection
