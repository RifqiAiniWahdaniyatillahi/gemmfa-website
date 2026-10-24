@extends('admin.layout')

@section('title', 'Kelola Berita')
@section('heading', 'Berita')
@section('subheading', 'Kelola artikel berita dan dakwah.')

@section('content')
    <div class="admin-actions">
        <a class="button" href="{{ route('admin.news-posts.create') }}">Tambah Berita</a>
    </div>
    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Penulis</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>
                            @if ($post->cover_image)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->cover_image) }}" alt="{{ $post->title }}" style="width: 64px; height: 48px; object-fit: cover; border-radius: 8px;" />
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category ?? '-' }}</td>
                        <td>{{ $post->is_published ? 'Publish' : 'Draft' }}</td>
                        <td>{{ $post->author?->name ?? '-' }}</td>
                        <td>{{ $post->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="admin-row-actions">
                                <a class="link" href="{{ route('admin.news-posts.show', $post) }}">Detail</a>
                                <a class="link" href="{{ route('admin.news-posts.edit', $post) }}">Edit</a>
                                <form method="post" action="{{ route('admin.news-posts.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link danger" onclick="return confirm('Hapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
