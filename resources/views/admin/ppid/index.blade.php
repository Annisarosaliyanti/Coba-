@extends('layouts.admin')

@section('title', 'PPID')
@section('page-title', 'Kelola Dokumen PPID')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-folder-open"></i> Dokumen PPID</h2>
        <a href="{{ route('admin.ppid.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Dokumen
        </a>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $doc)
                    <tr>
                        <td><span class="badge badge-info">{{ $doc->category_name }}</span></td>
                        <td>{{ Str::limit($doc->title, 40) }}</td>
                        <td>
                            @if($doc->file_path)
                                <span class="badge badge-success">File ({{ $doc->file_type }})</span>
                            @elseif($doc->external_link)
                                <span class="badge badge-warning">Link</span>
                            @else
                                <span class="badge badge-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            @if($doc->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.ppid.edit', $doc) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.ppid.destroy', $doc) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus dokumen ini?')">
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
                        <td colspan="5" style="text-align: center; color: #6b7280;">Belum ada dokumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
