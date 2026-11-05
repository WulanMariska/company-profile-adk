<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use App\Models\GlobalCtaSetting;
use App\Models\GalleryItem;

class HomeController extends Controller
{
    public function index()
    {
        $settings = HomePageSetting::first();
        $ctaSetting = GlobalCtaSetting::first();

        $galleryCount = (int) ($settings?->gallery_count ?? 4);

        if (!in_array($galleryCount, [3, 4, 6, 8], true)) {
            $galleryCount = 4;
        }

        $galleryItems = GalleryItem::with('category')
            ->where('is_active', true)
            ->whereHas('category', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit($galleryCount)
            ->get();

        return view('pages.home', compact(
            'settings',
            'galleryItems',
            'ctaSetting'
        ));
    }
}