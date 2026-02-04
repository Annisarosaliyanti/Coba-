@extends('layouts.app')

@section('title', 'Pelayanan - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Pelayanan</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Pelayanan</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <!-- Category Tabs -->
        <div class="d-flex gap-2 mb-4" style="flex-wrap: wrap; justify-content: center;">
            <a href="{{ route('pelayanan.index') }}" 
               class="btn {{ !$currentCategory ? 'btn-primary' : 'btn-outline' }}" 
               style="{{ !$currentCategory ? 'background: var(--primary); color: white;' : '' }}">
                <i class="fas fa-th-large"></i> Semua Layanan
            </a>
            @foreach($categories as $key => $name)
                <a href="{{ route('pelayanan.index', $key) }}" 
                   class="btn {{ $currentCategory === $key ? 'btn-primary' : 'btn-outline' }}"
                   style="{{ $currentCategory === $key ? 'background: var(--primary); color: white;' : '' }}">
                    @switch($key)
                        @case('pemerintahan')
                            <i class="fas fa-landmark"></i>
                            @break
                        @case('ekonomi')
                            <i class="fas fa-chart-line"></i>
                            @break
                        @case('kesra')
                            <i class="fas fa-hands-holding-heart"></i>
                            @break
                        @case('tantrib')
                            <i class="fas fa-shield-alt"></i>
                            @break
                    @endswitch
                    {{ $name }}
                </a>
            @endforeach
        </div>

        @if($currentCategory)
            <!-- Single Category View -->
            <div class="content-wrapper">
                <h2><i class="fas fa-hands-helping text-primary"></i> {{ $categories[$currentCategory] }}</h2>
                
                @if($services->count() > 0)
                    <div class="document-list mt-4">
                        @foreach($services as $service)
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="document-info">
                                    <h4>{{ $service->name }}</h4>
                                    <p>{{ Str::limit($service->description, 100) }}</p>
                                </div>
                                <a href="{{ route('pelayanan.show', $service->id) }}" class="document-download">
                                    <i class="fas fa-arrow-right"></i> Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle"></i>
                        <span>Belum ada layanan untuk kategori ini.</span>
                    </div>
                @endif
            </div>
        @else
            <!-- All Categories View -->
            @foreach($categories as $key => $name)
                @if(isset($services[$key]) && $services[$key]->count() > 0)
                    <div class="content-wrapper mb-4">
                        <h2>
                            @switch($key)
                                @case('pemerintahan')
                                    <i class="fas fa-landmark text-primary"></i>
                                    @break
                                @case('ekonomi')
                                    <i class="fas fa-chart-line text-primary"></i>
                                    @break
                                @case('kesra')
                                    <i class="fas fa-hands-holding-heart text-primary"></i>
                                    @break
                                @case('tantrib')
                                    <i class="fas fa-shield-alt text-primary"></i>
                                    @break
                            @endswitch
                            {{ $name }}
                        </h2>
                        
                        <div class="document-list mt-3">
                            @foreach($services[$key] as $service)
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4>{{ $service->name }}</h4>
                                        <p>{{ Str::limit($service->description, 100) }}</p>
                                    </div>
                                    <a href="{{ route('pelayanan.show', $service->id) }}" class="document-download">
                                        <i class="fas fa-arrow-right"></i> Detail
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
            
            @if($services->flatten()->count() === 0)
                <div class="content-wrapper">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <span>Belum ada layanan tersedia.</span>
                    </div>
                </div>
            @endif
        @endif
    </div>
</section>
@endsection
