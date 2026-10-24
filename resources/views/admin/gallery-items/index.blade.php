@extends('admin.layout')

@section('title', 'Kelola Galeri')
@section('heading', 'Galeri')
@section('subheading', 'Kelola dokumentasi foto dan video.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.gallery-items.create') }}">Tambah Item</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Media</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Unggulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            @if ($item->media_url)
                                @if ($item->media_type === 'video')
                                    <a class="admin-media-thumb is-video" href="{{ \Illuminate\Support\Facades\Storage::url($item->media_url) }}" target="_blank" rel="noopener">Video</a>
                                @else
                                    <img class="admin-media-thumb" src="{{ \Illuminate\Support\Facades\Storage::url($item->media_url) }}" alt="{{ $item->title ?: 'Media galeri' }}" />
                                @endif
                            @else
                                <span class="admin-media-thumb is-empty">-</span>
                            @endif
                        </td>
                        <td>{{ $item->title ?: '-' }}</td>
                        <td>{{ $item->category ?? '-' }}</td>
                        <td>{{ ucfirst($item->media_type) }}</td>
                        <td>{{ $item->event_date ? $item->event_date->format('d M Y') : '-' }}</td>
                        <td>{{ $item->is_featured ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.gallery-items.show', $item) }}">Detail</a>
                                <a class="link" href="{{ route('admin.gallery-items.edit', $item) }}">Edit</a>
                                <form method="post" action="{{ route('admin.gallery-items.destroy', $item) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus item galeri ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada item galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
