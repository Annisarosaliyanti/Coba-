@extends('layouts.admin')

@section('title', 'Kontak')
@section('page-title', 'Pengaturan Kontak')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.contact.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" rows="3">{{ old('address', $contact->address ?? '') }}</textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone ?? '') }}">
                </div>
                
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" id="fax" value="{{ old('fax', $contact->fax ?? '') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $contact->email ?? '') }}">
            </div>
            
            <div class="form-group">
                <label for="working_hours">Jam Kerja</label>
                <textarea name="working_hours" id="working_hours" rows="3" placeholder="Senin - Jumat: 08:00 - 16:00 WIB">{{ old('working_hours', $contact->working_hours ?? '') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="maps_embed">Embed Google Maps</label>
                <textarea name="maps_embed" id="maps_embed" rows="4" placeholder='<iframe src="https://www.google.com/maps/embed?..."></iframe>'>{{ old('maps_embed', $contact->maps_embed ?? '') }}</textarea>
            </div>
            
            <h3 style="margin: 2rem 0 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">Media Sosial</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="facebook"><i class="fab fa-facebook"></i> Facebook</label>
                    <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $contact->social_media['facebook'] ?? '') }}" placeholder="https://facebook.com/...">
                </div>
                
                <div class="form-group">
                    <label for="instagram"><i class="fab fa-instagram"></i> Instagram</label>
                    <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $contact->social_media['instagram'] ?? '') }}" placeholder="https://instagram.com/...">
                </div>
                
                <div class="form-group">
                    <label for="twitter"><i class="fab fa-twitter"></i> Twitter</label>
                    <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $contact->social_media['twitter'] ?? '') }}" placeholder="https://twitter.com/...">
                </div>
                
                <div class="form-group">
                    <label for="youtube"><i class="fab fa-youtube"></i> YouTube</label>
                    <input type="url" name="youtube" id="youtube" value="{{ old('youtube', $contact->social_media['youtube'] ?? '') }}" placeholder="https://youtube.com/...">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
