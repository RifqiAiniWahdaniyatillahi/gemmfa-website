@extends('admin.layout')

@section('title', 'Kelola Donasi')
@section('heading', 'Donasi')
@section('subheading', 'Kelola data donasi dan konfirmasi.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.donations.create') }}">Tambah Donasi</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Donatur</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donations as $donation)
                    <tr>
                        <td>{{ $donation->donor_name }}</td>
                        <td>Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                        <td>{{ $donation->status }}</td>
                        <td>{{ $donation->donated_at ? $donation->donated_at->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.donations.show', $donation) }}">Detail</a>
                                <a class="link" href="{{ route('admin.donations.edit', $donation) }}">Edit</a>
                                <form method="post" action="{{ route('admin.donations.destroy', $donation) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus donasi ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada donasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
