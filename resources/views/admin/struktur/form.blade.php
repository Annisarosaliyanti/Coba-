@extends('layouts.admin')

@section('title', isset($struktur) ? 'Edit Struktur' : 'Tambah Struktur')
@section('page-title', isset($struktur) ? 'Edit Struktur Organisasi' : 'Tambah Struktur Organisasi')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($struktur) ? route('admin.struktur.update', $struktur) : route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($struktur))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="name">Nama <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $struktur->name ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="position">Jabatan <span style="color: red;">*</span></label>
                <input type="text" name="position" id="position" value="{{ old('position', $struktur->position ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="parent_id">Atasan</label>
                <select name="parent_id" id="parent_id">
                    <option value="">-- Tidak Ada (Posisi Tertinggi) --</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $struktur->parent_id ?? '') == $parent->id ? 'selected' : '' }}>{{ $parent->name }} - {{ $parent->position }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="photo">Foto</label>
                @if(isset($struktur) && $struktur->photo)
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ asset('storage/' . $struktur->photo) }}" alt="Current" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" name="order" id="order" value="{{ old('order', $struktur->order ?? 0) }}" min="0">
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $struktur->is_active ?? true) ? 'checked' : '' }}>
                    <span>Aktif</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.struktur.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
