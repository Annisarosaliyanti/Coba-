<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'fax',
        'maps_embed',
        'latitude',
        'longitude',
        'social_media',
        'working_hours',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    public static function getContact()
    {
        return self::first() ?? new self();
    }
}
