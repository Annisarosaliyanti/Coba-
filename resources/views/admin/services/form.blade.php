@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Layanan' : 'Tambah Layanan')
@section('page-title', isset($service) ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST">
            @csrf
            @if(isset($service))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="category">Kategori <span style="color: red;">*</span></label>
                <select name="category" id="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $key => $name)
                        <option value="{{ $key }}" {{ old('category', $service->category ?? '') == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="name">Nama Layanan <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="3">{{ old('description', $service->description ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="requirements">Persyaratan</label>
                <textarea name="requirements" id="requirements" rows="5" placeholder="Satu persyaratan per baris">{{ old('requirements', $service->requirements ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="procedure">Prosedur</label>
                <textarea name="procedure" id="procedure" rows="5" placeholder="Langkah-langkah prosedur">{{ old('procedure', $service->procedure ?? '') }}</textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="duration">Waktu Proses</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration', $service->duration ?? '') }}" placeholder="Contoh: 1-3 hari kerja">
                </div>
                
                <div class="form-group">
                    <label for="cost">Biaya</label>
                    <input type="text" name="cost" id="cost" value="{{ old('cost', $service->cost ?? '') }}" placeholder="Contoh: Gratis atau Rp 50.000">
                </div>
            </div>
            
            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" name="order" id="order" value="{{ old('order', $service->order ?? 0) }}" min="0">
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                    <span>Aktif</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
