@extends('layouts.app')

@section('title', 'Sambutan Pimpinan - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Sambutan Pimpinan</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Sambutan Pimpinan</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <div class="profile-card">
                <div class="profile-image">
                    @if($pimpinan && $pimpinan->image)
                        <img src="{{ asset('storage/' . $pimpinan->image) }}" alt="Pimpinan">
                    @else
                        <img src="https://ui-avatars.com/api/?name=Camat&background=397FB1&color=fff&size=250" alt="Pimpinan">
                    @endif
                </div>
                <div class="profile-content">
                    <h2>{{ $pimpinan->title ?? 'Camat Sungai Pinang' }}</h2>
                    <p class="position">Camat Sungai Pinang</p>
                    @if($sambutan)
                        <div class="mt-3">
                            {!! $sambutan->content !!}
                        </div>
                    @else
                        <p>Sambutan belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
