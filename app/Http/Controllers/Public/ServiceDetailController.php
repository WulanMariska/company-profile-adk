<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProductService;

class ServiceDetailController extends Controller
{
    public function show($slug)
    {
        $productService = ProductService::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$productService) {
            abort(404);
        }

        return view(
            'pages.layanan.detail-dinamis',
            compact('productService')
        );
    }
}
