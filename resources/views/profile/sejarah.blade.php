@extends('layouts.app')

@section('title', 'Sejarah - Kecamatan Sungai Pinang')

@section('content')
<!-- Page Header -->
 <div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
 <div class="container">
        <h1>Sejarah</h1>
        <div class="breadcrumb" style="color: rgba(255,255,255,0.8);">
            <a href="{{ route('home') }}" style="color: #fff;"><i class="fas fa-home"></i> Beranda</a>
            <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.7rem;"></i>
            <span>Sejarah</span>
        </div>
    </div>
</div>
</section>

<!-- Sejarah Content -->
<section class="section simple-history-page">
    <div class="container">
        <div class="simple-article-card">
            @if($sejarah)
                <div class="article-content formatted-text">
                    {{-- Fungsi nl2br akan mengubah ENTER jadi <br> secara otomatis --}}
                    {!! nl2br(e($sejarah->content)) !!}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Data sejarah belum tersedia.
                </div>
            @endif
        </div>
    </div>
</section>
@endsection


