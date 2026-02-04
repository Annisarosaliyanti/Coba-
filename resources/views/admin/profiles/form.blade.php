@extends('layouts.admin')

@section('title', isset($profile) ? 'Edit Profil' : 'Tambah Profil')
@section('page-title', isset($profile) ? 'Edit Profil' : 'Tambah Profil')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($profile) ? route('admin.profiles.update', $profile) : route('admin.profiles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($profile))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="type">Tipe Profil <span style="color: red;">*</span></label>
                <select name="type" id="type" required>
                    <option value="">-- Pilih Tipe --</option>
                    @foreach($types as $key => $name)
                        <option value="{{ $key }}" {{ old('type', $profile->type ?? '') == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="title">Judul <span style="color: red;">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $profile->title ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" id="content" rows="10">{{ old('content', $profile->content ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Gambar</label>
                @if(isset($profile) && $profile->image)
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ asset('storage/' . $profile->image) }}" alt="Current" style="max-width: 200px; border-radius: 0.5rem;">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" name="order" id="order" value="{{ old('order', $profile->order ?? 0) }}" min="0">
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $profile->is_active ?? true) ? 'checked' : '' }}>
                    <span>Aktif</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.profiles.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
