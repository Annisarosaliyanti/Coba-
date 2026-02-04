@extends('layouts.app')

@section('title', 'Sejarah - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Sejarah</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Sejarah</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2><i class="fas fa-history text-primary"></i> Sejarah Kecamatan Sungai Pinang</h2>
            @if($sejarah)
                <div class="mt-3">
                    {!! $sejarah->content !!}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Sejarah belum tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
