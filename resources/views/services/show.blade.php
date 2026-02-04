@extends('layouts.app')

@section('title', $service->name . ' - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Detail Layanan</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
        <i class="fas fa-chevron-right"></i>
        <span>{{ Str::limit($service->name, 30) }}</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <div class="d-flex align-center gap-2 mb-3">
                <span class="btn btn-outline" style="pointer-events: none;">
                    {{ $service->category_name }}
                </span>
            </div>
            
            <h2>{{ $service->name }}</h2>
            
            @if($service->description)
                <div class="mt-3">
                    <h4 class="text-primary mb-2"><i class="fas fa-info-circle"></i> Deskripsi</h4>
                    <p>{{ $service->description }}</p>
                </div>
            @endif
            
            @if($service->requirements)
                <div class="mt-4">
                    <h4 class="text-primary mb-2"><i class="fas fa-clipboard-list"></i> Persyaratan</h4>
                    <div>{!! nl2br(e($service->requirements)) !!}</div>
                </div>
            @endif
            
            @if($service->procedure)
                <div class="mt-4">
                    <h4 class="text-primary mb-2"><i class="fas fa-list-ol"></i> Prosedur</h4>
                    <div>{!! nl2br(e($service->procedure)) !!}</div>
                </div>
            @endif
            
            <div class="d-flex gap-3 mt-4" style="flex-wrap: wrap;">
                @if($service->duration)
                    <div class="service-card" style="flex: 1; min-width: 200px;">
                        <div class="service-icon" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Waktu Proses</h4>
                        <p>{{ $service->duration }}</p>
                    </div>
                @endif
                
                @if($service->cost)
                    <div class="service-card" style="flex: 1; min-width: 200px;">
                        <div class="service-icon" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Biaya</h4>
                        <p>{{ $service->cost }}</p>
                    </div>
                @endif
            </div>
            
            <div class="mt-4">
                <a href="{{ route('pelayanan.index', $service->category) }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Layanan
                </a>
            </div>
        </div>
        
        @if($relatedServices->count() > 0)
            <div class="content-wrapper mt-4">
                <h3 class="mb-3">Layanan Terkait</h3>
                <div class="document-list">
                    @foreach($relatedServices as $related)
                        <div class="document-item">
                            <div class="document-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="document-info">
                                <h4>{{ $related->name }}</h4>
                                <p>{{ Str::limit($related->description, 80) }}</p>
                            </div>
                            <a href="{{ route('pelayanan.show', $related->id) }}" class="document-download">
                                <i class="fas fa-arrow-right"></i> Detail
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
