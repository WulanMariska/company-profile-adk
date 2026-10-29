<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductServiceController extends Controller
{

  public function index()
{
    $productsServices = ProductService::orderBy('sort_order')
        ->orderBy('name')
        ->paginate(10);

    $editProduct = null;

    if (session('editProductId')) {
        $editProduct = ProductService::find(
            session('editProductId')
        );
    }

    return view('admin.produk-layanan', compact(
        'productsServices',
        'editProduct'
    ));
}

    public function create()
    {
        return view('admin.products_services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'type' => ['required', Rule::in(['Produk', 'Layanan'])],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],

            'detail_section_title' => ['nullable', 'string', 'max:255'],
            'detail_intro' => ['nullable', 'string'],

            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],

            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],

            'feature_3_title' => ['nullable', 'string', 'max:255'],
            'feature_3_description' => ['nullable', 'string'],

            'feature_4_title' => ['nullable', 'string', 'max:255'],
            'feature_4_description' => ['nullable', 'string'],

            'card_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'detail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['sometimes', 'boolean'],
            'show_on_home' => ['sometimes', 'boolean'],
            'home_order' => ['nullable', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        // Slug boleh tidak dikirim dari form.
        $slug = Str::slug(
            !empty($validated['slug'])
                ? $validated['slug']
                : $validated['name']
        );

        $originalSlug = $slug;
        $counter = 1;

        while (ProductService::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        foreach (['card_image', 'detail_image', 'hero_image'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)
                    ->store('products-services', 'public');
            }
        }

      // Produk atau layanan tetap aktif saat diedit.
        $validated['is_active'] = true;
        $validated['show_on_home'] = $request->boolean('show_on_home');

        ProductService::create($validated);

        return redirect()
            ->route('cms.products-services.index')
            ->with('success', 'Produk atau layanan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $productService = ProductService::findOrFail($id);

        return view('admin.products_services.show', compact('productService'));
    }

        public function edit(string $id)
             {
            $productService = ProductService::findOrFail($id);

            return redirect()
                ->route('cms.products-services.index')
                ->with('editProductId', $productService->id);
            }

    public function update(Request $request, string $id)
    {
        $productService = ProductService::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products_services', 'slug')->ignore($productService->id),
            ],
            'type' => ['required', Rule::in(['Produk', 'Layanan'])],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],

            'detail_section_title' => ['nullable', 'string', 'max:255'],
            'detail_intro' => ['nullable', 'string'],

            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],

            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],

            'feature_3_title' => ['nullable', 'string', 'max:255'],
            'feature_3_description' => ['nullable', 'string'],

            'feature_4_title' => ['nullable', 'string', 'max:255'],
            'feature_4_description' => ['nullable', 'string'],

            'card_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'detail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['sometimes', 'boolean'],
            'show_on_home' => ['sometimes', 'boolean'],
            'home_order' => ['nullable', 'integer', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        // Slug unik tanpa menganggap data sendiri sebagai duplikat.
        $slug = Str::slug(
            !empty($validated['slug'])
                ? $validated['slug']
                : $validated['name']
        );

        $originalSlug = $slug;
        $counter = 1;

        while (
            ProductService::where('slug', $slug)
                ->where('id', '!=', $productService->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        foreach (['card_image', 'detail_image', 'hero_image'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)
                    ->store('products-services', 'public');
            }
        }

        $validated['is_active'] = true;
        $validated['show_on_home'] = $request->boolean('show_on_home');

        $productService->update($validated);

        return redirect()
            ->route('cms.products-services.index')
            ->with('success', 'Produk atau layanan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $productService = ProductService::findOrFail($id);

        $productService->delete();

        return redirect()
            ->route('cms.products-services.index')
            ->with('success', 'Produk atau layanan berhasil dihapus.');
    }
}
