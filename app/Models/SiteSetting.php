<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'company_name',
        'logo_path',
        'footer_description',
        'address',
        'phone',
        'email',
        'google_maps_url',
        'social_links',
        'copyright_text',

        // Pengaturan tambahan Footer
        'quick_links_text',
        'product_categories_text',
        'services_text',
        'privacy_policy_url',
        'terms_url',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
