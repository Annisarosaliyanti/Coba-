@extends('layouts.app')

@section('title', 'Tugas & Wewenang - PPID Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Tugas & Wewenang</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('ppid.index') }}">PPID</a>
        <i class="fas fa-chevron-right"></i>
        <span>Tugas & Wewenang</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2><i class="fas fa-tasks text-primary"></i> Tugas dan Wewenang PPID</h2>
            
            @if($content)
                <div class="mt-3">
                    {!! $content->description !!}
                </div>
            @else
                <div class="mt-3">
                    <h3>Tugas PPID</h3>
                    <ul style="margin-left: 1.5rem; margin-top: 1rem; list-style: disc;">
                        <li>Mengkoordinasikan penyediaan dan pelayanan informasi publik</li>
                        <li>Melakukan verifikasi dan uji konsekuensi atas informasi yang dikecualikan</li>
                        <li>Menentukan dan memutakhirkan daftar informasi publik</li>
                        <li>Menyediakan akses informasi publik bagi pemohon informasi</li>
                        <li>Membuat dan menyampaikan laporan pelayanan informasi publik</li>
                    </ul>
                    
                    <h3 class="mt-4">Wewenang PPID</h3>
                    <ul style="margin-left: 1.5rem; margin-top: 1rem; list-style: disc;">
                        <li>Menolak memberikan informasi yang dikecualikan</li>
                        <li>Meminta dan memperoleh informasi dari unit kerja yang menjadi cakupan kerjanya</li>
                        <li>Menghitamkan atau mengaburkan informasi yang dikecualikan</li>
                        <li>Mengkoordinasikan pemberian pelayanan informasi dengan unit kerja terkait</li>
                        <li>Menentukan atau menetapkan suatu informasi dapat diakses publik atau tidak</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
