<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidDocument extends Model
{
    protected $fillable = [
        'category',
        'title',
        'description',
        'file_path',
        'external_link',
        'file_type',
        'file_size',
        'download_count',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CATEGORIES = [
        'profil' => 'Profil Kecamatan',
        'dasar_hukum' => 'Dasar Hukum',
        'tugas_wewenang' => 'Tugas dan Wewenang',
        'layanan' => 'Layanan Informasi',
        'informasi_publik' => 'Informasi Publik',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getCategoryNameAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }

    public function incrementDownloads()
    {
        $this->increment('download_count');
    }

    public function getFormattedFileSizeAttribute()
    {
        $bytes = $this->file_size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' bytes';
    }
}
