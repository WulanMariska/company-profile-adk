<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::with('category')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(9);

        $categories = GalleryCategory::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.galeri', compact(
            'galleryItems',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'gallery_category_id' => [
                'required',
                'integer',
                Rule::exists('gallery_categories', 'id')
                    ->where('is_active', true),
            ],
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'is_active' => ['nullable', 'boolean'],
            'show_on_home' => ['nullable', 'boolean'],
        ]);

        $imagePath = $request->file('image')
            ->store('gallery', 'public');

        $slug = Str::slug($validated['title']);
        $baseSlug = $slug;
        $number = 1;

        while (GalleryItem::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $number++;
        }

        GalleryItem::create([
            'gallery_category_id' => $validated['gallery_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'show_on_home' => $request->boolean('show_on_home'),
            'sort_order' => (GalleryItem::max('sort_order') ?? 0) + 1,
        ]);

        return redirect()
            ->route('cms.gallery.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $galleryItem = GalleryItem::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'gallery_category_id' => [
                'required',
                'integer',
                Rule::exists('gallery_categories', 'id')
                    ->where('is_active', true),
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'is_active' => ['nullable', 'boolean'],
            'show_on_home' => ['nullable', 'boolean'],
        ]);

        $slug = Str::slug($validated['title']);
        $baseSlug = $slug;
        $number = 1;

        while (
            GalleryItem::where('slug', $slug)
                ->where('id', '!=', $galleryItem->id)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $number++;
        }

        $data = [
            'gallery_category_id' => $validated['gallery_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],

            'is_active' => $request->has('is_active')
                ? $request->boolean('is_active')
                : $galleryItem->is_active,

            'show_on_home' => $request->has('show_on_home')
                ? $request->boolean('show_on_home')
                : $galleryItem->show_on_home,
        ];

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')
                ->store('gallery', 'public');

            if ($galleryItem->image_path) {
                Storage::disk('public')->delete(
                    $galleryItem->image_path
                );
            }

            $data['image_path'] = $newImagePath;
        }

        $galleryItem->update($data);

        return redirect()
            ->route('cms.gallery.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $galleryItem = GalleryItem::findOrFail($id);

        if ($galleryItem->image_path) {
            Storage::disk('public')->delete(
                $galleryItem->image_path
            );
        }

        $galleryItem->delete();

        return redirect()
            ->route('cms.gallery.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}
