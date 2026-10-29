<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    /**
     * Menampilkan halaman CMS Tentang Kami.
     */
    public function index()
    {
        $aboutPage = AboutPage::where('is_active', true)->first();

        return view('admin.tentang-kami', compact('aboutPage'));
    }

    /**
     * Menyimpan perubahan konten Tentang Kami.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Informasi perusahaan
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],

            // Gambar profil perusahaan
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Visi dan misi
            'vision_title' => ['nullable', 'string', 'max:255'],
            'vision_content' => ['nullable', 'string'],
            'mission_title' => ['nullable', 'string', 'max:255'],
            'mission_content' => ['nullable', 'string'],

            // Komitmen kami
            'commitment_title' => ['nullable', 'string', 'max:255'],
            'commitment_content' => ['nullable', 'string'],
            'commitment_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $aboutPage = AboutPage::where('is_active', true)->first();

        if (!$aboutPage) {
            $aboutPage = new AboutPage();
            $aboutPage->is_active = true;
        }

        // Simpan lokasi gambar lama untuk dihapus setelah data berhasil disimpan.
        $oldImagePath = $aboutPage->image_path;
        $oldCommitmentImage = $aboutPage->commitment_image;

        // Upload gambar profil perusahaan jika ada gambar baru.
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')
                ->store('about-page', 'public');
        }

        // Upload gambar Komitmen Kami jika ada gambar baru.
        if ($request->hasFile('commitment_image')) {
            $validated['commitment_image'] = $request
                ->file('commitment_image')
                ->store('about-page/commitment', 'public');
        }

        // Hapus field file sementara agar tidak ikut diisi ke model.
        unset($validated['image']);

        // Simpan seluruh perubahan ke tabel about_page.
        $aboutPage->fill($validated);
        $aboutPage->save();

        // Hapus gambar lama setelah penyimpanan berhasil.
        if (
            $request->hasFile('image') &&
            $oldImagePath &&
            $oldImagePath !== $aboutPage->image_path
        ) {
            Storage::disk('public')->delete($oldImagePath);
        }

        if (
            $request->hasFile('commitment_image') &&
            $oldCommitmentImage &&
            $oldCommitmentImage !== $aboutPage->commitment_image
        ) {
            Storage::disk('public')->delete($oldCommitmentImage);
        }

        return redirect()
            ->route('cms.about')
            ->with('success', 'Konten Tentang Kami berhasil disimpan.');
    }
}
