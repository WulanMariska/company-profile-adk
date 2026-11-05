<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProductService;

class ServiceController extends Controller
{
    public function index()
    {
        $productsServices = ProductService::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('pages.layanan.index', compact('productsServices'));
    }
}