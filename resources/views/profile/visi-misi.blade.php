@extends('layouts.app')

@section('title', 'Visi & Misi - Kecamatan Sungai Pinang')

@section('content')

{{-- HEADER HALAMAN --}}
<div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
    <div class="container">
        <h1>Visi & Misi</h1>
        <div class="breadcrumb">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
            <i class="fas fa-chevron-right"></i>
            <span>Visi & Misi</span>
        </div>
    </div>
</div>

{{-- KONTEN UTAMA --}}
<section class="section visi-misi-page">
    <div class="container">
        @if($visiMisi)
            <div class="visi-misi-container">
                
                {{-- Bagian Atas: Simbol/Icon --}}
                <div class="top-icon-decor">
                    <i class="fas fa-bullseye"></i>
                </div>

                {{-- Tampilan Konten --}}
                <div class="formatted-visi-misi">
                    {{-- nl2br untuk menjaga spasi/enter dari admin --}}
                    {!! nl2br(e($visiMisi->content)) !!}
                </div>

            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Data Visi & Misi belum tersedia.
            </div>
        @endif
    </div>
</section>

@endsection