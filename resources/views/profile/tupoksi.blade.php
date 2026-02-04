@extends('layouts.app')

@section('title', 'Tupoksi - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Tugas Pokok dan Fungsi</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Tupoksi</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2><i class="fas fa-tasks text-primary"></i> Tugas Pokok dan Fungsi</h2>
            @if($tupoksi)
                <div class="mt-3">
                    {!! $tupoksi->content !!}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Tupoksi belum tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
