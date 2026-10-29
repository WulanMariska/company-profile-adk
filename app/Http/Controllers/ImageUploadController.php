<?php

namespace App\Http\Controllers;

use App\Services\ImageOptimizer;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function optimize(Request $request, ImageOptimizer $optimizer)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:20480'],
        ]);

        $optimizedImage = $optimizer->optimize(
            $request->file('image')
        );

        return response($optimizedImage)
            ->header('Content-Type', 'image/webp');
    }
}
