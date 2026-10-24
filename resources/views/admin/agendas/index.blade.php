@extends('admin.layout')

@section('title', 'Kelola Agenda')
@section('heading', 'Agenda')
@section('subheading', 'Kelola agenda kegiatan GEMMFA.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.agendas.create') }}">Tambah Agenda</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Mulai</th>
                    <th>Lokasi</th>
                    <th>Publik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->title }}</td>
                        <td>{{ $agenda->category ?? '-' }}</td>
                        <td>{{ $agenda->start_at->format('d M Y H:i') }}</td>
                        <td>{{ $agenda->location ?? '-' }}</td>
                        <td>{{ $agenda->is_public ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.agendas.show', $agenda) }}">Detail</a>
                                <a class="link" href="{{ route('admin.agendas.edit', $agenda) }}">Edit</a>
                                <form method="post" action="{{ route('admin.agendas.destroy', $agenda) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus agenda ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada agenda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
