@extends('layouts.admin')

@section('title', isset($ppid) ? 'Edit Dokumen' : 'Tambah Dokumen')
@section('page-title', isset($ppid) ? 'Edit Dokumen PPID' : 'Tambah Dokumen PPID')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ isset($ppid) ? route('admin.ppid.update', $ppid) : route('admin.ppid.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($ppid))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label for="category">Kategori <span style="color: red;">*</span></label>
                <select name="category" id="category" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $key => $name)
                        <option value="{{ $key }}" {{ old('category', $ppid->category ?? '') == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="title">Judul <span style="color: red;">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $ppid->title ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="4">{{ old('description', $ppid->description ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="file">File Dokumen</label>
                @if(isset($ppid) && $ppid->file_path)
                    <div style="margin-bottom: 0.5rem; color: #059669;">
                        <i class="fas fa-file"></i> File saat ini: {{ $ppid->file_type }} ({{ $ppid->formatted_file_size }})
                    </div>
                @endif
                <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                <small style="color: #6b7280;">Format: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Max: 10MB)</small>
            </div>
            
            <div class="form-group">
                <label for="external_link">Atau Link Eksternal</label>
                <input type="url" name="external_link" id="external_link" value="{{ old('external_link', $ppid->external_link ?? '') }}" placeholder="https://...">
            </div>
            
            <div class="form-group">
                <label for="order">Urutan</label>
                <input type="number" name="order" id="order" value="{{ old('order', $ppid->order ?? 0) }}" min="0">
            </div>
            
            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $ppid->is_active ?? true) ? 'checked' : '' }}>
                    <span>Aktif</span>
                </label>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.ppid.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
