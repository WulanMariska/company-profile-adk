<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductServiceController extends Controller
{
    /**
     * Rapikan nama: hapus spasi di awal/akhir, ubah spasi ganda
     * (termasuk spasi non-breaking) menjadi satu spasi.
     */
    private function normalizeName(?string $name): string
    {
        return trim(preg_replace('/[\s\x{00A0}]+/u', ' ', (string) $name));
    }

    /**
     * Cek apakah nama sudah dipakai (tanpa membedakan huruf besar/kecil
     * dan tanpa memedulikan spasi berlebih). Data yang sedang diedit
     * dikecualikan lewat $ignoreId.
     */
    private function nameExists(string $name, $ignoreId = null): bool
    {
        $needle = mb_strtolower($this->normalizeName($name));

        return ProductService::query()
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->pluck('name')
            ->contains(function ($existing) use ($needle) {
                return mb_strtolower($this->normalizeName($existing)) === $needle;
            });
    }

    public function index()
    {
        $productsServices = ProductService::orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.produk-layanan', compact(
            'productsServices'
        ));
    }

    public function create()
    {
        return view('admin.products_services.create');
    }

    public function store(Request $request)
    {
        // Rapikan nama dulu supaya yang divalidasi dan disimpan sudah bersih.
        $request->merge([
            'name' => $this->normalizeName($request->input('name')),
        ]);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if ($this->nameExists($value)) {
                        $fail('Nama produk atau layanan sudah digunakan. Silakan gunakan nama lain.');
                    }
                },
            ],

            'slug' => ['nullable', 'string', 'max:255'],
            'type' => ['required', Rule::in(['Produk', 'Layanan'])],
            'category' => ['required', 'string', 'max:255'],
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

        if ($request->hasFile('card_image')) {
            $validated['card_image'] = $request->file('card_image')
                ->store('products-services', 'public');
        }

        // Produk atau layanan baru langsung aktif.
        $validated['is_active'] = true;
        $validated['show_on_home'] = $request->boolean('show_on_home');

        // Otomatis memberikan nomor urutan berikutnya.
        $validated['sort_order'] = (ProductService::max('sort_order') ?? 0) + 1;

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

        return view(
            'admin.products_services.create',
            compact('productService')
        );
    }

    public function update(Request $request, string $id)
    {
        $productService = ProductService::findOrFail($id);

        // Rapikan nama dulu supaya yang divalidasi dan disimpan sudah bersih.
        $request->merge([
            'name' => $this->normalizeName($request->input('name')),
        ]);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($id) {
                    if ($this->nameExists($value, $id)) {
                        $fail('Nama produk atau layanan sudah digunakan. Silakan gunakan nama lain.');
                    }
                },
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products_services', 'slug')->ignore($productService->id),
            ],
            'type' => ['required', Rule::in(['Produk', 'Layanan'])],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],

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

        if ($request->hasFile('card_image')) {
            $validated['card_image'] = $request->file('card_image')
                ->store('products-services', 'public');
        }

        // Produk atau layanan tetap aktif saat diedit.
        $validated['is_active'] = true;
        $validated['show_on_home'] = $request->boolean('show_on_home');

        DB::transaction(function () use ($productService, $validated) {

            $oldSortOrder = (int) $productService->sort_order;
            $newSortOrder = (int) ($validated['sort_order'] ?? $oldSortOrder);

            // Jika urutan berubah, tukar posisi dengan item lain.
            if ($newSortOrder !== $oldSortOrder) {

                $otherProduct = ProductService::where(
                    'sort_order',
                    $newSortOrder
                )
                ->where('id', '!=', $productService->id)
                ->lockForUpdate()
                ->first();

                if ($otherProduct) {
                    $otherProduct->update([
                        'sort_order' => $oldSortOrder,
                    ]);
                }
            }

            $productService->update($validated);
        });

        return redirect()
            ->route('cms.products-services.index')
            ->with('success', 'Produk atau layanan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {

            // Cari dan kunci data yang akan dihapus.
            $productService = ProductService::lockForUpdate()
                ->findOrFail($id);

            // Hapus produk atau layanan.
            $productService->delete();

            // Ambil seluruh data yang masih tersisa.
            $remainingProducts = ProductService::orderBy('sort_order')
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            // Rapikan kembali nomor urutan mulai dari 1.
            foreach ($remainingProducts as $index => $item) {
                DB::table('products_services')
                    ->where('id', $item->id)
                    ->update([
                        'sort_order' => $index + 1,
                    ]);
            }
        });

        return redirect()
            ->route('cms.products-services.index')
            ->with('success', 'Produk atau layanan berhasil dihapus.');
    }
}