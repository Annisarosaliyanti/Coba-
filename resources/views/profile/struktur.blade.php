@extends('layouts.app')

@section('title', 'Struktur Organisasi - Kecamatan Sungai Pinang')

@section('content')

{{-- HEADER HALAMAN --}}
<div class="page-header" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.9) 0%, rgba(24, 50, 105, 0.95) 100%), url('{{ asset('images/bg_beranda.png') }}') center/cover;">
    <div class="container">
        <h1>Struktur Organisasi</h1>
        <nav class="breadcrumb-nav">
            <ul class="custom-breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a></li>
                <li class="sep"><i class="fas fa-chevron-right"></i></li>
                <li class="active">Struktur Organisasi</li>
            </ul>
        </nav>
    </div>
</div>

<section class="section org-chart-section">
    <div class="container">
        <div class="section-header-inline">
            <i class="fas fa-sitemap"></i>
            <h2>Bagan Organisasi Pemerintah Kecamatan</h2>
        </div>

        <div class="org-container">
            @if($struktur->count() > 0)
                <div class="tree">
                    <ul>
                        @foreach($struktur as $leader)
                            <li>
                                {{-- LEVEL 1: CAMAT --}}
                                <div class="node-card boss">
                                    <div class="node-photo">
                                        @if($leader->photo)
                                            <img src="{{ asset('storage/' . $leader->photo) }}" alt="{{ $leader->name }}">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($leader->name) }}&background=397FB1&color=fff&size=100" alt="{{ $leader->name }}">
                                        @endif
                                    </div>
                                    <div class="node-info">
                                        <p class="pos">Camat</p>
                                        <h4 class="name">{{ $leader->name }}</h4>
                                    </div>
                                </div>

                                {{-- LEVEL 2: SEKRETARIS & KASI --}}
                                @if($leader->children->count() > 0)
                                    <ul>
                                        @foreach($leader->children as $child)
                                            <li>
                                                <div class="node-card staff">
                                                    <div class="node-photo">
                                                        @if($child->photo)
                                                            <img src="{{ asset('storage/' . $child->photo) }}" alt="{{ $child->name }}">
                                                        @else
                                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($child->name) }}&background=183269&color=fff&size=100" alt="{{ $child->name }}">
                                                        @endif
                                                    </div>
                                                    <div class="node-info">
                                                        <p class="pos">{{ $child->position }}</p>
                                                        <h4 class="name">{{ $child->name }}</h4>
                                                    </div>
                                                </div>

                                                {{-- LEVEL 3 (Jika Ada Sub bagian di bawah Kasi/Sekcam) --}}
                                                @if($child->children->count() > 0)
                                                    <ul>
                                                        @foreach($child->children as $grandchild)
                                                            <li>
                                                                <div class="node-card sub-staff">
                                                                    <div class="node-info">
                                                                        <p class="pos">{{ $grandchild->position }}</p>
                                                                        <h4 class="name">{{ $grandchild->name }}</h4>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="empty-chart">
                    <i class="fas fa-users-slash"></i>
                    <p>Struktur organisasi belum tersedia di database.</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection