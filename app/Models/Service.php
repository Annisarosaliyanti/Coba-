<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category',
        'name',
        'description',
        'requirements',
        'procedure',
        'duration',
        'cost',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CATEGORIES = [
        'pemerintahan' => 'Kasi Pemerintahan',
        'ekonomi' => 'Kasi Ekonomi dan Pembangunan',
        'kesra' => 'Kasi Kesejahteraan Rakyat',
        'tantrib' => 'Kasi Ketentraman dan Ketertiban',
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
}
