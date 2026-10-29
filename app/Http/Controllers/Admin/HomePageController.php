<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    /**
     * Menampilkan halaman CMS Beranda.
     */
  public function index()
{
    $settings = HomePageSetting::first();

    if (!$settings) {
        $settings = new HomePageSetting();

        $settings->hero_title = 'SOLUSI LENGKAP UNTUK KEBUTUHAN BISNIS DAN RUMAH ANDA';
        $settings->hero_description = 'Menyediakan berbagai produk berkualitas dengan harga kompetitif serta layanan profesional untuk memenuhi kebutuhan Anda.';
        $settings->hero_button = 'Jelajahi Layanan';
        $settings->hero_link = '/layanan';
        $settings->hero_second_button = 'Hubungi Kami';
        $settings->hero_second_link = '/kontak';
        $settings->service_count = 4;
        $settings->services_visible = true;
        $settings->gallery_count = 4;
        $settings->gallery_visible = true;
        $settings->about_visible = true;

        $settings->save();
    }

    return view('admin.dashboard', compact('settings'));
}

    /**
     * Menyimpan pengaturan CMS Beranda.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => [
                'required',
                'string',
                'max:255',
            ],

            'hero_description' => [
                'nullable',
                'string',
            ],

            'hero_button' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_link' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_second_button' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_second_link' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'service_count' => [
                'required',
                'integer',
                'in:3,4,6',
            ],

            'services_visible' => [
                'nullable',
                'boolean',
            ],

           'gallery_count' => [
                    'required',
                    'integer',
                    'in:3,4,6,8',
                ],

            'gallery_visible' => [
                'nullable',
                'boolean',
            ],

            'about_summary' => [
                'nullable',
                'string',
            ],

            'about_visible' => [
                'nullable',
                'boolean',
            ],
        ]);

        $settings = HomePageSetting::first()
            ?? new HomePageSetting();

        // Checkbox yang tidak dicentang tidak dikirim oleh browser.
        // Karena itu, nilainya harus diatur secara eksplisit.
        $validated['services_visible'] =
            $request->boolean('services_visible');

        $validated['gallery_visible'] =
            $request->boolean('gallery_visible');

        $validated['about_visible'] =
            $request->boolean('about_visible');

        // Jika ada gambar baru, simpan gambar tersebut.
        // Jika tidak ada, gambar lama tetap dipertahankan.
        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')
                ->store('homepage', 'public');

            $oldImage = $settings->hero_image;

            $validated['hero_image'] = $path;

            // Hapus gambar lama hanya setelah gambar baru berhasil disimpan.
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        } else {
            unset($validated['hero_image']);
        }

        // Simpan pengaturan Beranda ke database.
        $settings->fill($validated);
        $settings->save();

        return redirect()
            ->route('cms.dashboard')
            ->with(
                'success',
                'Pengaturan Beranda berhasil disimpan.'
            );
    }
}
