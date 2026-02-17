@extends('layouts.app')

@section('title', 'Tupoksi - Kecamatan Sungai Pinang')

@section('content')

{{-- HEADER HALAMAN --}}
<div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
    <div class="container">
        <h1>Tugas Pokok dan Fungsi</h1>
        <div class="breadcrumb" style="color: rgba(255,255,255,0.8);">
            <a href="{{ route('home') }}" style="color: #fff;"><i class="fas fa-home"></i> Beranda</a>
            <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.7rem;"></i>
                <li class="active">Tupoksi</li>
            </ul>
        </nav>
    </div>
</div>

{{-- KONTEN UTAMA --}}
<section class="section tupoksi-page">
    <div class="container">
        <div class="document-paper">
            
            {{-- Badge Judul Peraturan --}}
            <div class="legal-badge">
                <div class="gavel-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="legal-info">
                    <small>Dasar Hukum:</small>
                    <p>Peraturan Walikota Samarinda No. 57 Tahun 2016</p>
                </div>
            </div>

            {{-- Isi Tupoksi --}}
            <div class="tupoksi-content">
                @if($tupoksi)
                    <div class="rich-text-content">
                        {!! nl2br(e($tupoksi->content)) !!}
                    </div>
                @else
                    <div class="empty-state">
                        <p>Data Tupoksi belum tersedia.</p>
                    </div>
                @endif
            </div>

            {{-- Footer Dokumen --}}
            <div class="document-footer">
                <p>Kecamatan Sungai Pinang - Kota Samarinda</p>
            </div>
        </div>
    </div>
</section>

@endsection