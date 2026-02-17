@extends('layouts.app')

@section('title', 'Beranda - Kecamatan Sungai Pinang')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, rgba(57, 127, 177, 0.85) 0%, rgba(24, 50, 105, 0.85) 100%), url('{{ asset('images/bg_beranda.png') }}') no-repeat center center / cover;">
    <div class="container hero-content">
        <div class="hero-grid">
            <div class="hero-text">
                <h1>{{ $settings['welcome_title'] }}</h1>
                <p>{{ $settings['welcome_text'] }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Sambutan Section -->
@if($sambutan)
<section class="section sambutan-welcome">
    <div class="container">
        <div class="sambutan-box">
            <!-- Bagian Kiri: Foto & Identitas -->
            <div class="sambutan-leader">
                <div class="leader-photo-frame">
                    @if($pimpinan && $pimpinan->image)
                        <img src="{{ asset('storage/' . $pimpinan->image) }}" alt="{{ $pimpinan->title ?? 'Pimpinan' }}">
                    @else
                         <img src="https://ui-avatars.com/api/?name=Camat&background=397FB1&color=fff&size=300" alt="Foto Pimpinan">
                    @endif
                </div>
                <div class="leader-info">
                    <h3>{{ $pimpinan->title ?? 'Camat Sungai Pinang' }}</h3>
                    <span>Camat Sungai Pinang</span>
                </div>
            </div>

            <!-- Bagian Kanan: Konten Sambutan -->
            <div class="sambutan-body">
                <div class="sambutan-header">
                    <h2>Sambutan Pimpinan</h2>
                    <div class="separator"></div>
                </div>
                
                <!-- Ikon Kutipan Dekoratif -->
                <div class="quote-decor">
                    <i class="fas fa-quote-left"></i>
                </div>

                <!-- Teks Sambutan -->
                <div class="sambutan-text">
                    {!! Str::limit(strip_tags($sambutan->content), 450) !!}
                </div>

                <div class="sambutan-action">
                    <a href="{{ route('profil.sambutan') }}" class="btn btn-read-more">
                        Baca Selengkapnya <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Layanan Section -->


<!-- Berita Terkini -->
@if($latestNews->count() > 0)
<section class="section" style="background: var(--white);">
    <div class="container">
        <div class="section-header">
            <h2>Berita Terkini</h2>
            <p>Informasi dan kegiatan terbaru dari Kecamatan Sungai Pinang</p>
            <div class="section-divider"></div>
        </div>
        <div class="news-grid">
            @foreach($latestNews as $news)
            <a href="{{ route('berita.show', $news->slug) }}" class="card">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="card-img">
                @else
                    <img src="https://via.placeholder.com/400x200/397FB1/ffffff?text=Berita" alt="{{ $news->title }}" class="card-img">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ Str::limit($news->title, 60) }}</h3>
                    <p class="card-text">{{ Str::limit($news->excerpt ?? strip_tags($news->content), 100) }}</p>
                    <div class="card-meta">
                        <span><i class="fas fa-calendar"></i> {{ $news->published_at->format('d M Y') }}</span>
                        <span><i class="fas fa-eye"></i> {{ $news->views }} views</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('berita.index') }}" class="btn btn-outline">
                Lihat Semua Berita <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Quick Info Section -->
<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info-card">
                <h3><i class="fas fa-info-circle text-primary"></i> Informasi Cepat</h3>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>Jam Operasional</h4>
                        <p>Senin - Jumat: 08:00 - 16:00 WIB<br>Sabtu - Minggu: Libur</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h4>Hotline</h4>
                        <p>(021) 1234567</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <p>info@sungaipinang.go.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
