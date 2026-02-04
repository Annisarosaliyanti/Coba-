@extends('layouts.app')

@section('title', $news->title . ' - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Berita</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('berita.index') }}">Berita</a>
        <i class="fas fa-chevron-right"></i>
        <span>{{ Str::limit($news->title, 30) }}</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: var(--radius-lg); margin-bottom: 2rem;">
            @endif
            
            <h2>{{ $news->title }}</h2>
            
            <div class="card-meta mb-4">
                <span><i class="fas fa-calendar"></i> {{ $news->published_at ? $news->published_at->format('d M Y, H:i') : '-' }}</span>
                <span><i class="fas fa-eye"></i> {{ $news->views }} views</span>
                @if($news->author)
                    <span><i class="fas fa-user"></i> {{ $news->author->name }}</span>
                @endif
                @if($news->category)
                    <span><i class="fas fa-folder"></i> {{ $news->category }}</span>
                @endif
            </div>
            
            <div class="news-content">
                {!! $news->content !!}
            </div>
            
            <!-- Share Buttons -->
            <div class="mt-4 pt-4" style="border-top: 1px solid var(--gray-200);">
                <h4 class="mb-2">Bagikan Berita:</h4>
                <div class="d-flex gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline" style="padding: 0.5rem 1rem;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" target="_blank" class="btn btn-outline" style="padding: 0.5rem 1rem;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-outline" style="padding: 0.5rem 1rem;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Berita
                </a>
            </div>
        </div>
        
        @if($relatedNews->count() > 0)
            <div class="mt-5">
                <h3 class="section-header" style="text-align: left;">
                    <span>Berita Lainnya</span>
                </h3>
                <div class="news-grid">
                    @foreach($relatedNews as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" class="card">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="card-img">
                            @else
                                <img src="https://via.placeholder.com/400x200/397FB1/ffffff?text=Berita" alt="{{ $item->title }}" class="card-img">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ Str::limit($item->title, 50) }}</h3>
                                <div class="card-meta">
                                    <span><i class="fas fa-calendar"></i> {{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
