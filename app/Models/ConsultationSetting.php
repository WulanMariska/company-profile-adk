<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationSetting extends Model
{
    protected $table = 'consultation_settings';

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'office_name',
        'office_address',
        'office_phone',
        'office_email',
        'google_maps_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}