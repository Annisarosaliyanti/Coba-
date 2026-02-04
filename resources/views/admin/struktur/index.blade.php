@extends('layouts.admin')

@section('title', 'Struktur Organisasi')
@section('page-title', 'Kelola Struktur Organisasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-sitemap"></i> Struktur Organisasi</h2>
        <a href="{{ route('admin.struktur.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Atasan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($struktur as $item)
                    <tr>
                        <td>
                            <img src="{{ $item->photo ? asset('storage/' . $item->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) . '&background=397FB1&color=fff' }}" alt="{{ $item->name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->position }}</td>
                        <td>{{ $item->parent->name ?? '-' }}</td>
                        <td>
                            @if($item->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.struktur.edit', $item) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.struktur.destroy', $item) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus data ini?')">
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
                        <td colspan="6" style="text-align: center; color: #6b7280;">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
