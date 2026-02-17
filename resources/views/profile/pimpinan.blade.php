@extends('layouts.app')

@section('title', 'Profil Pimpinan - Kecamatan Sungai Pinang')

@section('content')

{{-- HEADER HALAMAN --}}
<div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
    <div class="container">
        <h1>Profil Pimpinan</h1>
        <div class="breadcrumb" style="color: rgba(255,255,255,0.8);">
            <a href="{{ route('home') }}" style="color: #fff;"><i class="fas fa-home"></i> Beranda</a>
            <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.7rem;"></i>
            <span>Profil Pimpinan</span>
        </div>
    </div>
</div>

{{-- KONTEN UTAMA --}}
<section class="section profile-detail-page">
    <div class="container">
        @if($pimpinan)
            <div class="profile-master-card">
                
                {{-- SIDEBAR KIRI: Foto & Kontak --}}
                <aside class="profile-sidebar">
                    <div class="sidebar-sticky">
                        {{-- Foto --}}
                        <div class="profile-photo-frame">
                            @if($pimpinan->image)
                                <img src="{{ asset('storage/' . $pimpinan->image) }}" alt="{{ $pimpinan->title }}">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($pimpinan->title ?? 'Camat') }}&background=ffffff&color=397FB1&size=300" alt="Pimpinan">
                            @endif
                        </div>

                        {{-- Identitas --}}
                        <div class="profile-identity">
                            <h2>{{ $pimpinan->title }}</h2>
                            <span class="badge-jabatan">
                                <i class="fas fa-landmark"></i> Camat Sungai Pinang
                            </span>
                        </div>

                        {{-- Kontak Resmi (Dari Data Admin) --}}
                        <div class="profile-contact-list">
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <div>
                                    <small>Telepon</small>
                                    <span>{{ $pimpinan->phone ?? '085387990753' }}</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <small>Email</small>
                                    <span>{{ $pimpinan->email ?? 'abdullah@gmail.com' }}</span>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <small>Alamat Kantor</small>
                                    <span>{{ $pimpinan->address ?? 'Jl. D.I. Panjaitan No.2 Samarinda' }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <a href="{{ route('profil.sambutan') }}" class="btn-sidebar-action">
                            <i class="fas fa-comment-dots"></i> Baca Sambutan
                        </a>
                    </div>
                </aside>

                {{-- KONTEN KANAN: Bio & Tugas --}}
                <main class="profile-main-content">
                    
                    {{-- Header Konten --}}
                    <div class="content-header">
                        <div class="header-icon"><i class="fas fa-id-card"></i></div>
                        <div>
                            <h3>Biodata Pribadi</h3>
                            <p>Informasi data kepegawaian Camat Sungai Pinang</p>
                        </div>
                    </div>

                    {{-- Grid Biodata --}}
                    <div class="biodata-grid">
                        <div class="biodata-item">
                            <label>Nama Lengkap</label>
                            <p>{{ $pimpinan->title }}</p>
                        </div>
                        <div class="biodata-item">
                            <label>NIP</label>
                            <p>{{ $pimpinan->nip ?? 'Belum ada data' }}</p>
                        </div>
                        <div class="biodata-item">
                            <label>TMT Jabatan</label>
                            <p>{{ $pimpinan->tmt ?? 'Belum ada data' }}</p>
                        </div>
                        <div class="biodata-item">
                            <label>Agama</label>
                            <p>{{ $pimpinan->religion ?? 'Belum ada data' }}</p>
                        </div>
                        <div class="biodata-item">
                            <label>Pangkat</label>
                            <p>{{ $pimpinan->rank ?? 'Belum ada data' }}</p>
                        </div>
                        <div class="biodata-item">
                            <label>Golongan</label>
                            <p class="highlight-text">{{ $pimpinan->class ?? 'Belum ada data' }}</p>
                        </div>
                    </div>

                   

                </main>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-user-slash"></i>
                <h3>Data Tidak Ditemukan</h3>
                <p>Profil pimpinan saat ini belum tersedia di database.</p>
            </div>
        @endif
    </div>
</section>

@endsection