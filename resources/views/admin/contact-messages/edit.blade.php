@extends('admin.layout')

@section('title', 'Edit Pesan')
@section('heading', 'Edit Pesan')
@section('subheading', 'Perbarui pesan kontak.')

@section('content')
    <form method="post" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="admin-form">
        @csrf
        @method('PUT')
        <label>
            Nama
            <input type="text" name="name" value="{{ old('name', $contactMessage->name) }}" required />
        </label>
        <label>
            Email
            <input type="email" name="email" value="{{ old('email', $contactMessage->email) }}" required />
        </label>
        <label>
            Telepon
            <input type="text" name="phone" value="{{ old('phone', $contactMessage->phone) }}" />
        </label>
        <label>
            Subjek
            <input type="text" name="subject" value="{{ old('subject', $contactMessage->subject) }}" />
        </label>
        <label>
            Pesan
            <textarea name="message" rows="4" required>{{ old('message', $contactMessage->message) }}</textarea>
        </label>
        <label>
            Status
            <input type="text" name="status" value="{{ old('status', $contactMessage->status) }}" />
        </label>
        <label>
            Tanggal Selesai
            <input type="datetime-local" name="resolved_at" value="{{ old('resolved_at', optional($contactMessage->resolved_at)->format('Y-m-d\TH:i')) }}" />
        </label>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
@endsection
