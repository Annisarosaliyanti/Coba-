@extends('layouts.app')

@section('title', 'Visi & Misi - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Visi & Misi</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Visi & Misi</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2><i class="fas fa-bullseye text-primary"></i> Visi & Misi Kecamatan Sungai Pinang</h2>
            @if($visiMisi)
                <div class="mt-3">
                    {!! $visiMisi->content !!}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Visi & Misi belum tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
