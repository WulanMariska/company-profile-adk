<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use Illuminate\Http\Request;

class ProductServiceDetailController extends Controller
{
    public function index()
    {
        $productsServices = ProductService::orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

       return view(
            'admin.pengaturan-global.detail-layanan.index',
            compact('productsServices')
        );
    }

    public function edit(string $id)
    {
        $productService = ProductService::findOrFail($id);

       return view(
            'admin.pengaturan-global.detail-layanan.edit',
            compact('productService')
        );
    }

    public function update(Request $request, string $id)
    {
        $productService = ProductService::findOrFail($id);

     $validated = $request->validate([
            'hero_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'detail_intro' => ['required', 'string'],
            'detail_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'detail_section_title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => ['required', 'string'],

            'feature_1_title' => ['required', 'string', 'max:255'],
            'feature_1_description' => ['required', 'string'],

            'feature_2_title' => ['required', 'string', 'max:255'],
            'feature_2_description' => ['required', 'string'],

            'feature_3_title' => ['required', 'string', 'max:255'],
            'feature_3_description' => ['required', 'string'],

            'feature_4_title' => ['required', 'string', 'max:255'],
            'feature_4_description' => ['required', 'string'],
        ], [
            'required' => ':attribute wajib diisi.',
        ], [
            'detail_intro'          => 'Deskripsi Singkat Hero',
            'detail_section_title'  => 'Judul Bagian Deskripsi',
            'description'           => 'Deskripsi Utama',
            'feature_1_title'       => 'Judul Card 1',
            'feature_1_description' => 'Deskripsi Card 1',
            'feature_2_title'       => 'Judul Card 2',
            'feature_2_description' => 'Deskripsi Card 2',
            'feature_3_title'       => 'Judul Card 3',
            'feature_3_description' => 'Deskripsi Card 3',
            'feature_4_title'       => 'Judul Card 4',
            'feature_4_description' => 'Deskripsi Card 4',
        ]);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request
                ->file('hero_image')
                ->store('products-services', 'public');
        } else {
            unset($validated['hero_image']);
        }

        if ($request->hasFile('detail_image')) {
            $validated['detail_image'] = $request
                ->file('detail_image')
                ->store('products-services', 'public');
        } else {
            unset($validated['detail_image']);
        }

        $productService->update($validated);

        return redirect()
            ->route('cms.global-settings.detail.edit', $id)
            ->with('success', 'Detail produk atau layanan berhasil diperbarui.');
    }



    public function destroy($id)
{
    $item = \App\Models\ProductService::findOrFail($id);

    $item->delete();

    return redirect()
        ->route('cms.global-settings.detail.index')
        ->with('success', 'Data berhasil dihapus.');
}
}
