@extends('admin.layout')

@section('title', 'Detail Pesan')
@section('heading', 'Detail Pesan')
@section('subheading', $contactMessage->name)

@section('content')
    <div class="admin-card">
        <h3>{{ $contactMessage->name }}</h3>
        <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
        <p><strong>Telepon:</strong> {{ $contactMessage->phone ?? '-' }}</p>
        <p><strong>Subjek:</strong> {{ $contactMessage->subject ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $contactMessage->status }}</p>
        <p><strong>Pesan:</strong></p>
        <p>{{ $contactMessage->message }}</p>
        <div class="admin-actions">
            <a class="button" href="{{ route('admin.contact-messages.edit', $contactMessage) }}">Edit</a>
            <a class="button ghost" href="{{ route('admin.contact-messages.index') }}">Kembali</a>
        </div>
    </div>
@endsection
