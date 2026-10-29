<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman CMS Kontak.
     */
    public function index()
    {
        $siteSetting = SiteSetting::first();

        return view('admin.kontak', compact('siteSetting'));
    }

    /**
     * Menyimpan informasi kontak perusahaan.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:5000'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'google_maps_url' => [
                'nullable',
                'url',
                'regex:/^https?:\/\/([a-z0-9-]+\.)*(google\.[a-z.]+|maps\.app\.goo\.gl|goo\.gl)(\/|$)/i',
                'max:2000',
            ],
        ]);

        $siteSetting = SiteSetting::first();

        if (!$siteSetting) {
            $siteSetting = new SiteSetting();
        }

        $siteSetting->fill($validated);

        // Kolom ini wajib diisi berdasarkan migration.
        if (!$siteSetting->exists) {
            $siteSetting->company_name = $validated['company_name'];
        }

        $siteSetting->save();

        return redirect()
            ->route('cms.contact')
            ->with('success', 'Informasi kontak berhasil disimpan.');
    }
}
