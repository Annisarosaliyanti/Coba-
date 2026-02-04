@extends('layouts.admin')

@section('title', 'Berita')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-newspaper"></i> Daftar Berita</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Views</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{ Str::limit($item->title, 50) }}</td>
                        <td>
                            @if($item->is_published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>{{ $item->views }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #6b7280;">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($news->hasPages())
            <div style="padding: 1rem; display: flex; justify-content: center;">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
