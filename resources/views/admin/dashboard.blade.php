@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['profiles'] }}</h3>
            <p>Profil</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-hands-helping"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['services'] }}</h3>
            <p>Layanan</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon yellow">
            <i class="fas fa-newspaper"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['news'] }}</h3>
            <p>Berita</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon purple">
            <i class="fas fa-folder-open"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['ppid'] }}</h3>
            <p>Dokumen PPID</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-newspaper text-primary"></i> Berita Terbaru</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body" style="padding: 0;">
        @if($latestNews->count() > 0)
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
                    @foreach($latestNews as $news)
                        <tr>
                            <td>{{ Str::limit($news->title, 50) }}</td>
                            <td>
                                @if($news->is_published)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-warning">Draft</span>
                                @endif
                            </td>
                            <td>{{ $news->created_at->format('d M Y') }}</td>
                            <td>{{ $news->views }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="padding: 1.5rem; color: #6b7280;">Belum ada berita.</p>
        @endif
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-tasks text-primary"></i> Menu Cepat</h2>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem;">
                <a href="{{ route('admin.profiles.index') }}" class="btn btn-primary" style="justify-content: center;">
                    <i class="fas fa-user-tie"></i> Kelola Profil
                </a>
                <a href="{{ route('admin.services.index') }}" class="btn btn-success" style="justify-content: center;">
                    <i class="fas fa-hands-helping"></i> Kelola Layanan
                </a>
                <a href="{{ route('admin.news.create') }}" class="btn btn-warning" style="justify-content: center;">
                    <i class="fas fa-plus"></i> Tambah Berita
                </a>
                <a href="{{ route('admin.contact.edit') }}" class="btn btn-primary" style="justify-content: center; background: var(--secondary);">
                    <i class="fas fa-address-card"></i> Edit Kontak
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
