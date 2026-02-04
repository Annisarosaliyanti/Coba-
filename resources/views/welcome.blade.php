@extends('layouts.app')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <img src="{{ asset('images/bg_beranda.png') }}"
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-4">Selamat Datang Di Kecamatan Sungai Pinang</h1>
        <p class="text-xl md:text-2xl">Melayani Masyarakat dengan Sepenuh Hati</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-1/4 flex justify-center"> 
                <img src="{{ asset('images/sungai-pinang_headman_photo.png') }}" 
         class="rounded-2xl shadow-xl grayscale hover:grayscale-0 transition duration-500 
                w-48 h-64 md:w-64 md:h-80 object-cover" 
         alt="Foto Camat">
        </div>
            <div class="w-full md:w-2/3 text-center md:text-left" data-aos="fade-left" data-aos-delay="200">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-sm">Sambutan Camat</span>
                <h2 class="text-3xl md:text-5xl font-bold mt-2 mb-6">Drs. Nama Camat, M.Si</h2>
                <p class="text-gray-600 leading-relaxed mb-8 italic">
                    "Kami berkomitmen untuk terus meningkatkan pelayanan publik melalui inovasi digital..."
                </p>
                <a href="#" class="inline-block bg-blue-600 text-white px-10 py-4 rounded-xl font-bold">
                    Lihat Profil Lengkap
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold">Berita Terkini</h2>
                <div class="h-1 w-20 bg-blue-600 mt-2"></div>
            </div>
            <a href="/berita" class="text-blue-600 font-semibold hover:underline">Lihat Semua Berita &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach(range(0, 2) as $index)
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden" 
         data-aos="fade-up" 
         data-aos-delay="{{ $index * 200 }}"> <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070" class="w-full h-52 object-cover">
        <div class="p-6">
            <h3 class="text-lg font-bold mb-3">Kegiatan Desa {{ $index + 1 }}</h3>
            <a href="#" class="text-blue-600 font-bold">Baca Selengkapnya</a>
        </div>
    </div>
            @endforeach
        </div>
    </div>
</section>
@endsection