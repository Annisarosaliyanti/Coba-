@extends('layouts.app')

@section('title', 'PPID - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>PPID</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>PPID</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="section-header mb-5">
            <h2>Pejabat Pengelola Informasi dan Dokumentasi</h2>
            <p>Layanan informasi publik Kecamatan Sungai Pinang</p>
            <div class="section-divider"></div>
        </div>
        
        <div class="service-grid">
            <a href="{{ route('ppid.dasar-hukum') }}" class="service-card">
                <div class="service-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <h3>Dasar Hukum</h3>
                <p>Peraturan dan landasan hukum terkait pelayanan informasi publik</p>
            </a>
            
            <a href="{{ route('ppid.tugas-wewenang') }}" class="service-card">
                <div class="service-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3>Tugas & Wewenang</h3>
                <p>Tugas pokok dan kewenangan PPID Kecamatan</p>
            </a>
            
            <a href="{{ route('ppid.informasi-publik') }}" class="service-card">
                <div class="service-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Informasi Publik</h3>
                <p>Daftar informasi yang dapat diakses oleh masyarakat</p>
            </a>
            
            <a href="#" class="service-card" onclick="alert('Link akan ditambahkan oleh admin'); return false;">
                <div class="service-icon">
                    <i class="fas fa-external-link-alt"></i>
                </div>
                <h3>Layanan Informasi</h3>
                <p>Link layanan informasi publik (tautan eksternal)</p>
            </a>
        </div>
    </div>
</section>
@endsection
