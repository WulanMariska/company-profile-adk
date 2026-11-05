<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;

class ContactController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::first();

        return view('pages.kontak', compact('siteSetting'));
    }
}