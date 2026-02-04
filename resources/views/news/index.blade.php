@extends('layouts.app')

@section('title', 'Berita - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Berita</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Berita</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        @if($news->count() > 0)
            <div class="news-grid">
                @foreach($news as $item)
                    <a href="{{ route('berita.show', $item->slug) }}" class="card">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="card-img">
                        @else
                            <img src="https://via.placeholder.com/400x200/397FB1/ffffff?text=Berita" alt="{{ $item->title }}" class="card-img">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ Str::limit($item->title, 60) }}</h3>
                            <p class="card-text">{{ Str::limit($item->excerpt ?? strip_tags($item->content), 100) }}</p>
                            <div class="card-meta">
                                <span><i class="fas fa-calendar"></i> {{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}</span>
                                <span><i class="fas fa-eye"></i> {{ $item->views }} views</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class="pagination">
                {{ $news->links() }}
            </div>
        @else
            <div class="content-wrapper">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Belum ada berita tersedia.</span>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
