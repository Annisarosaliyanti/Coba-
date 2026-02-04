@extends('layouts.app')

@section('title', 'Informasi Publik - PPID Kecamatan Sungai Pinang')

@section('content')
<div class="page-header">
    <h1>Informasi Publik</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ route('ppid.index') }}">PPID</a>
        <i class="fas fa-chevron-right"></i>
        <span>Informasi Publik</span>
    </div>
</div>

<section class="content-area">
    <div class="container">
        <div class="content-wrapper">
            <h2><i class="fas fa-file-alt text-primary"></i> Informasi Publik</h2>
            <p class="text-muted mb-4">Dokumen dan informasi yang dapat diakses oleh masyarakat</p>
            
            @if($documents->count() > 0)
                <div class="document-list">
                    @foreach($documents as $doc)
                        <div class="document-item">
                            <div class="document-icon">
                                @switch($doc->file_type)
                                    @case('pdf')
                                        <i class="fas fa-file-pdf"></i>
                                        @break
                                    @case('doc')
                                    @case('docx')
                                        <i class="fas fa-file-word"></i>
                                        @break
                                    @case('xls')
                                    @case('xlsx')
                                        <i class="fas fa-file-excel"></i>
                                        @break
                                    @default
                                        <i class="fas fa-file-alt"></i>
                                @endswitch
                            </div>
                            <div class="document-info">
                                <h4>{{ $doc->title }}</h4>
                                <p>
                                    {{ Str::limit($doc->description, 100) }}
                                    @if($doc->file_size)
                                        <span class="text-muted">({{ $doc->formatted_file_size }})</span>
                                    @endif
                                </p>
                            </div>
                            @if($doc->file_path)
                                <a href="{{ route('ppid.download', $doc->id) }}" class="document-download">
                                    <i class="fas fa-download"></i> Unduh
                                </a>
                            @elseif($doc->external_link)
                                <a href="{{ $doc->external_link }}" target="_blank" class="document-download">
                                    <i class="fas fa-external-link-alt"></i> Buka
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Belum ada dokumen tersedia.</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
