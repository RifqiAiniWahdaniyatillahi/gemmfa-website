@extends('admin.layout')

@section('title', 'Kelola Kontak')
@section('heading', 'Kontak')
@section('subheading', 'Kelola pesan masuk dari jamaah.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.contact-messages.create') }}">Tambah Pesan</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->status }}</td>
                        <td>{{ $message->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.contact-messages.show', $message) }}">Detail</a>
                                <a class="link" href="{{ route('admin.contact-messages.edit', $message) }}">Edit</a>
                                <form method="post" action="{{ route('admin.contact-messages.destroy', $message) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus pesan ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
