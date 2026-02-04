@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan Website')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="site_name">Nama Website <span style="color: red;">*</span></label>
                <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name']) }}" required>
            </div>
            
            <div class="form-group">
                <label for="site_description">Deskripsi Website</label>
                <textarea name="site_description" id="site_description" rows="3">{{ old('site_description', $settings['site_description']) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="welcome_title">Judul Sambutan <span style="color: red;">*</span></label>
                <input type="text" name="welcome_title" id="welcome_title" value="{{ old('welcome_title', $settings['welcome_title']) }}" required>
            </div>
            
            <div class="form-group">
                <label for="welcome_text">Teks Sambutan</label>
                <textarea name="welcome_text" id="welcome_text" rows="4">{{ old('welcome_text', $settings['welcome_text']) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="logo">Logo Website</label>
                @if($settings['logo'])
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="max-width: 150px;">
                    </div>
                @endif
                <input type="file" name="logo" id="logo" accept="image/*">
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Pengaturan
            </button>
        </form>
    </div>
</div>
@endsection
