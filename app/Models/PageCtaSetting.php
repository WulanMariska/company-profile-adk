<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageCtaSetting extends Model
{
    protected $table = 'page_cta_settings';

    protected $fillable = [
        'page_type',
        'products_service_id',
        'title',
        'description',
        'button_text',
        'button_link',
        'is_active',
    ];

    protected $casts = [
        'products_service_id' => 'integer',
        'is_active' => 'boolean',
    ];

    public function productService(): BelongsTo
    {
        return $this->belongsTo(
            ProductService::class,
            'products_service_id'
        );
    }
}
