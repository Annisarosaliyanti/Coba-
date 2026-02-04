@extends('layouts.app')

@section('title', 'Struktur Organisasi - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Struktur Organisasi</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Struktur Organisasi</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2 class="text-center"><i class="fas fa-sitemap text-primary"></i> Struktur Organisasi Kecamatan Sungai Pinang</h2>
            
            @if($struktur->count() > 0)
                <div class="org-chart mt-4">
                    @foreach($struktur as $leader)
                        <!-- Top Level (Camat) -->
                        <div class="org-level">
                            <div class="org-node top">
                                @if($leader->photo)
                                    <img src="{{ asset('storage/' . $leader->photo) }}" alt="{{ $leader->name }}">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($leader->name) }}&background=397FB1&color=fff&size=80" alt="{{ $leader->name }}">
                                @endif
                                <h4>{{ $leader->name }}</h4>
                                <p>{{ $leader->position }}</p>
                            </div>
                        </div>
                        
                        <!-- Second Level -->
                        @if($leader->children->count() > 0)
                            <div class="org-level">
                                @foreach($leader->children as $child)
                                    <div class="org-node">
                                        @if($child->photo)
                                            <img src="{{ asset('storage/' . $child->photo) }}" alt="{{ $child->name }}">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($child->name) }}&background=183269&color=fff&size=80" alt="{{ $child->name }}">
                                        @endif
                                        <h4>{{ $child->name }}</h4>
                                        <p>{{ $child->position }}</p>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Third Level (if exists) -->
                            @php
                                $thirdLevel = collect();
                                foreach($leader->children as $child) {
                                    $thirdLevel = $thirdLevel->merge($child->children);
                                }
                            @endphp
                            
                            @if($thirdLevel->count() > 0)
                                <div class="org-level">
                                    @foreach($thirdLevel as $grandchild)
                                        <div class="org-node">
                                            @if($grandchild->photo)
                                                <img src="{{ asset('storage/' . $grandchild->photo) }}" alt="{{ $grandchild->name }}">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($grandchild->name) }}&background=5a9ac7&color=fff&size=80" alt="{{ $grandchild->name }}">
                                            @endif
                                            <h4>{{ $grandchild->name }}</h4>
                                            <p>{{ $grandchild->position }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            @else
                <div class="alert alert-info mt-4">
                    <i class="fas fa-info-circle"></i>
                    <span>Struktur organisasi belum tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
