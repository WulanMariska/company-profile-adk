<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class HomePage extends Model
{
    use HasMedias, HasFiles, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
}