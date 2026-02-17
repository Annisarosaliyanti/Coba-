@extends('layouts.app')

@section('title', 'Sambutan Pimpinan - Kecamatan Sungai Pinang')

@section('content')
<!-- Header Halaman (Biarkan sesuai standar theme) -->
<div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
    <div class="container">
        <h1>Sambutan Pimpinan</h1>
        <div class="breadcrumb" style="color: rgba(255,255,255,0.8);">
            <a href="{{ route('home') }}" style="color: #fff;">Beranda</a>
            <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.7rem;"></i>
            <span>Sambutan Pimpinan</span>
        </div>
    </div>
</div>

<!-- Konten Sambutan Kustom -->
<section class="section sambutan-detail-page">
    <div class="container">
        <div class="sambutan-detail-card">
            
            <!-- Sisi Kiri: Profil Pimpinan (Sidebar) -->
            <aside class="sambutan-sidebar">
                <div class="sidebar-sticky">
                    <div class="sidebar-photo-frame">
                        @if($pimpinan && $pimpinan->image)
                            <img src="{{ asset('storage/' . $pimpinan->image) }}" alt="{{ $pimpinan->title ?? 'Pimpinan' }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name=Camat+Sungai+Pinang&background=ffffff&color=397FB1&size=200" alt="Pimpinan">
                        @endif
                    </div>
                    <div class="sidebar-identity">
                        <h3>{{ $pimpinan->title ?? 'Camat Sungai Pinang' }}</h3>
                        <span>{{ $pimpinan->jabatan ?? 'Camat Sungai Pinang' }}</span>
                    </div>
                    <div class="sidebar-decoration">
                        <i class="fas fa-award"></i>
                    </div>
                </div>
            </aside>

            <!-- Sisi Kanan: Konten Sambutan -->
            <div class="sambutan-main-content">
                <div class="content-header">
                    <div class="quote-icon-lg">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <h2>Kata Sambutan</h2>
                </div>

                <div class="sambutan-text-body">
                    @if($sambutan)
                        {!! $sambutan->content !!}
                    @else
                        <p class="text-muted">Sambutan belum tersedia.</p>
                    @endif
                </div>

                <div class="content-footer">
                    <a href="{{ route('home') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection