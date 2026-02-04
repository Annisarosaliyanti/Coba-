@extends('layouts.admin')

@section('title', 'Profil')
@section('page-title', 'Kelola Profil')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-user-tie"></i> Daftar Profil</h2>
        <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Profil
        </a>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($profiles as $profile)
                    <tr>
                        <td>{{ ucwords(str_replace('_', ' ', $profile->type)) }}</td>
                        <td>{{ Str::limit($profile->title, 50) }}</td>
                        <td>
                            @if($profile->is_active)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus profil ini?')">
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
                        <td colspan="4" style="text-align: center; color: #6b7280;">Belum ada profil.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
