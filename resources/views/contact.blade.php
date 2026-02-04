@extends('layouts.app')

@section('title', 'Kontak - Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Kontak</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <span>Kontak</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info-card">
                <h3><i class="fas fa-address-card text-primary"></i> Informasi Kontak</h3>
                
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>Alamat</h4>
                        <p>{{ $contact->address ?? 'Jl. Contoh No. 123, Kecamatan Sungai Pinang, Kota/Kabupaten, Provinsi' }}</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h4>Telepon</h4>
                        <p>{{ $contact->phone ?? '(021) 1234567' }}</p>
                    </div>
                </div>
                
                @if($contact->fax)
                <div class="contact-item">
                    <i class="fas fa-fax"></i>
                    <div>
                        <h4>Fax</h4>
                        <p>{{ $contact->fax }}</p>
                    </div>
                </div>
                @endif
                
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <p>{{ $contact->email ?? 'info@sungaipinang.go.id' }}</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>Jam Operasional</h4>
                        <p>{!! nl2br(e($contact->working_hours ?? "Senin - Jumat: 08:00 - 16:00 WIB\nSabtu - Minggu: Libur")) !!}</p>
                    </div>
                </div>
                
                @if($contact->social_media && count($contact->social_media) > 0)
                <div class="mt-4">
                    <h4 class="mb-2">Media Sosial</h4>
                    <div class="social-links">
                        @foreach($contact->social_media as $platform => $url)
                            @if($url)
                                <a href="{{ $url }}" target="_blank" title="{{ ucfirst($platform) }}">
                                    @switch($platform)
                                        @case('facebook')
                                            <i class="fab fa-facebook-f"></i>
                                            @break
                                        @case('instagram')
                                            <i class="fab fa-instagram"></i>
                                            @break
                                        @case('twitter')
                                            <i class="fab fa-twitter"></i>
                                            @break
                                        @case('youtube')
                                            <i class="fab fa-youtube"></i>
                                            @break
                                        @default
                                            <i class="fas fa-link"></i>
                                    @endswitch
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <div class="map-container">
                @if($contact->maps_embed)
                    {!! $contact->maps_embed !!}
                @else
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.277444357954!2d117.15!3d-0.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMzAnMDAuMCJTIDExN8KwMDknMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
