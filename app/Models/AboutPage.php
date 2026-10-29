<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $table = 'about_page';

  protected $fillable = [
    'title',
    'subtitle',
    'content',
    'image_path',
    'vision_title',
    'vision_content',
    'mission_title',
    'mission_content',
    'commitment_title',
    'commitment_content',
    'commitment_image',
    'is_active',
];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
