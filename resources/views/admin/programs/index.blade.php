@extends('admin.layout')

@section('title', 'Kelola Program')
@section('heading', 'Program')
@section('subheading', 'Kelola program utama GEMMFA.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.programs.create') }}">Tambah Program</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Unggulan</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($programs as $program)
                    <tr>
                        <td>
                            @if ($program->image_path)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($program->image_path) }}" alt="{{ $program->title }}" style="width: 64px; height: 48px; object-fit: cover; border-radius: 8px;" />
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $program->title }}</td>
                        <td>{{ $program->category ?? '-' }}</td>
                        <td>{{ $program->status }}</td>
                        <td>{{ $program->is_featured ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $program->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.programs.show', $program) }}">Detail</a>
                                <a class="link" href="{{ route('admin.programs.edit', $program) }}">Edit</a>
                                <form method="post" action="{{ route('admin.programs.destroy', $program) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus program ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada program.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
