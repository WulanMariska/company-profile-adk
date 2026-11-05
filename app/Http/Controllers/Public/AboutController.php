<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::where('is_active', true)->first();

        return view('pages.tentangkami', compact('aboutPage'));
    }
}