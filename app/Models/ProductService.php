<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    protected $table = 'products_services';

    protected $fillable = [
        'name',
        'slug',
        'type',
        'category',
        'short_description',
        'description',
        'card_image',
        'detail_image',
        'hero_image',
        'is_active',
        'show_on_home',
        'home_order',
        'sort_order',
        'detail_section_title',
        'detail_intro',
        'feature_1_title',
        'feature_1_description',
        'feature_2_title',
        'feature_2_description',
        'feature_3_title',
        'feature_3_description',
        'feature_4_title',
        'feature_4_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_on_home' => 'boolean',
        'home_order' => 'integer',
        'sort_order' => 'integer',
    ];
}
