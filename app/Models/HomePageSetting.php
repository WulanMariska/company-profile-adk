<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    protected $table = 'home_page_settings';

    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_button',
        'hero_link',
        'hero_second_button',
        'hero_second_link',
        'hero_image',

        'service_count',
        'services_visible',

        'gallery_count',
        'gallery_visible',

        'about_summary',
        'about_visible',

        'cta_title',
        'cta_description',
        'cta_button',
        'cta_link',
    ];

    protected $casts = [
        'service_count' => 'integer',
        'services_visible' => 'boolean',
        'gallery_count' => 'integer',
        'gallery_visible' => 'boolean',
        'about_visible' => 'boolean',
    ];
}
