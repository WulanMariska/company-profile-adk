<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalCtaSetting extends Model
{
    protected $table = 'global_cta_settings';

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}