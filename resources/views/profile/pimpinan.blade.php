@extends('layouts.app')

@section('title', 'Profil Pimpinan - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Profil Pimpinan</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Profil Pimpinan</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            @if($pimpinan)
                <div class="profile-card">
                    <div class="profile-image">
                        @if($pimpinan->image)
                            <img src="{{ asset('storage/' . $pimpinan->image) }}" alt="{{ $pimpinan->title }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name=Camat&background=397FB1&color=fff&size=250" alt="Pimpinan">
                        @endif
                    </div>
                    <div class="profile-content">
                        <h2>{{ $pimpinan->title }}</h2>
                        <p class="position">Camat Sungai Pinang</p>
                        <div class="mt-3">
                            {!! $pimpinan->content !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Profil pimpinan belum tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
