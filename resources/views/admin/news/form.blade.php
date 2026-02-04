@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')
@section('page-title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="title">Judul <span style="color: red;">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="slug">Slug (URL)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug ?? '') }}" placeholder="Otomatis dari judul jika kosong">
            </div>
            
            <div class="form-group">
                <label for="excerpt">Ringkasan</label>
                <textarea name="excerpt" id="excerpt" rows="3">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="content">Konten <span style="color: red;">*</span></label>
                <textarea name="content" id="content" rows="15">{{ old('content', $news->content ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Gambar</label>
                @if(isset($news) && $news->image)
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Current" style="max-width: 300px; border-radius: 0.5rem;">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" name="category" id="category" value="{{ old('category', $news->category ?? '') }}" placeholder="Contoh: Pengumuman, Kegiatan">
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}>
                    <span>Publikasikan</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
