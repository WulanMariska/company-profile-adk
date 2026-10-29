<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\ProductServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\GlobalSettingController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
| Login hanya bisa diakses user yang BELUM login (middleware guest).
| User yang sudah login otomatis dilempar ke halaman CMS
| (diatur di bootstrap/app.php lewat redirectUsersTo).
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [
        LoginController::class,
        'showLoginForm',
    ])->name('login');

    Route::post('/login', [
        LoginController::class,
        'login',
    ])->name('login.submit');
});

Route::post('/logout', [
    LoginController::class,
    'logout',
])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK - BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $settings = \App\Models\HomePageSetting::first();
    $ctaSetting = \App\Models\GlobalCtaSetting::first();

    $galleryCount = (int) ($settings?->gallery_count ?? 4);

    if (!in_array($galleryCount, [3, 4, 6, 8], true)) {
        $galleryCount = 4;
    }

    $galleryItems = \App\Models\GalleryItem::with('category')
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
})->name('home');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK - TENTANG KAMI
|--------------------------------------------------------------------------
*/

Route::get('/tentang-kami', function () {
    $aboutPage = \App\Models\AboutPage::where('is_active', true)->first();

    return view('pages.tentangkami', compact('aboutPage'));
})->name('about');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK - LAYANAN
|--------------------------------------------------------------------------
*/

Route::get('/layanan', function () {
    $productsServices = \App\Models\ProductService::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    return view('pages.layanan.index', compact('productsServices'));
})->name('services');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK - GALERI
|--------------------------------------------------------------------------
*/

Route::get('/galeri', function () {
    $galleryItems = \App\Models\GalleryItem::with('category')
        ->where('is_active', true)
        ->whereHas('category', function ($query) {
            $query->where('is_active', true);
        })
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->get();

    return view('pages.galeri', compact('galleryItems'));
})->name('gallery');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK - KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/kontak', function () {
    $siteSetting = \App\Models\SiteSetting::first();

    return view('pages.kontak', compact('siteSetting'));
})->name('contact');


/*
|--------------------------------------------------------------------------
| DETAIL LAYANAN
|--------------------------------------------------------------------------
*/

Route::get('/layanan/sepeda-motor-baru', function () {
    return view('pages.layanan.detail');
})->name('service.motor');

Route::get('/layanan/peralatan-telekomunikasi', function () {
    return view('pages.layanan.telekomunikasi');
})->name('service.telecommunication');

Route::get('/layanan/mesin-pendingin', function () {
    return view('pages.layanan.mesin-pendingin');
})->name('service.cooling');


/*
|--------------------------------------------------------------------------
| ROUTE DETAIL UMUM
|--------------------------------------------------------------------------
*/

Route::get('/layanan/{slug}', function ($slug) {
    switch ($slug) {
        case 'sepeda-motor-baru':
            return view('pages.layanan.detail');

        case 'peralatan-telekomunikasi':
            return view('pages.layanan.telekomunikasi');

        case 'mesin-pendingin':
            return view('pages.layanan.mesin-pendingin');

        case 'peralatan-perlengkapan-olahraga':
            return view('pages.layanan.peralatan-olahraga');

        case 'fotografi-barang-optik':
            return view('pages.layanan.fotografi-barang-optik');

        case 'furniture-interior':
            return view('pages.layanan.furniture-interior');

        case 'penyewaan-mesin-peralatan-kantor':
            return view('pages.layanan.penyewaan-mesin-peralatan-kantor');

        case 'jasa-teknologi-informasi-komputer':
            return view('pages.layanan.jasa-teknologi-informasi-komputer');

        case 'piranti-lunak':
            return view('pages.layanan.piranti-lunak');

        case 'suku-cadang-elektronik':
            return view('pages.layanan.suku-cadang-elektronik');

        case 'mesin-peralatan-pertanian':
            return view('pages.layanan.mesin-peralatan-pertanian');

        case 'peralatan-masak-dapur-elektronik':
            return view('pages.layanan.peralatan-masak-dapur-elektronik');

        case 'komputer-perlengkapannya':
            return view('pages.layanan.komputer-perlengkapannya');

        case 'suku-cadang-aksesoris-motor':
            return view('pages.layanan.suku-cadang-aksesoris-motor');

        default:
            $productService = \App\Models\ProductService::where('slug', $slug)
                ->where('is_active', true)
                ->first();

            if (!$productService) {
                abort(404);
            }

            return view(
                'pages.layanan.detail-dinamis',
                compact('productService')
            );
    }
})->name('service.detail');


/*
|--------------------------------------------------------------------------
| ROUTE ALIAS TAMBAHAN
|--------------------------------------------------------------------------
*/

Route::get('/tentangkami', function () {
    return view('pages.tentangkami');
})->name('about-us');


/*
|--------------------------------------------------------------------------
| PREVIEW CMS
|--------------------------------------------------------------------------
| Tetap dipisahkan dari CMS utama.
| Route preview ini belum dilindungi middleware auth.
*/

Route::get('/preview-cms-dashboard', function () {
    return view('admin.dashboard');
})->name('preview.cms.dashboard');

Route::get('/preview-cms-produk-layanan', [
    ProductServiceController::class,
    'index',
])->name('preview.cms.produk-layanan');

Route::get('/preview-cms-galeri', [
    GalleryController::class,
    'index',
])->name('preview.cms.galeri');

Route::view('/preview-cms-tentang-kami', 'admin.tentang-kami')
    ->name('preview.cms.tentang-kami');

Route::view('/preview-cms-kontak', 'admin.kontak')
    ->name('preview.cms.kontak');


/*
|--------------------------------------------------------------------------
| CMS PRODUK & LAYANAN
|--------------------------------------------------------------------------
*/

Route::prefix('cms')
    ->name('cms.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/produk-layanan', [
            ProductServiceController::class,
            'index',
        ])->name('products-services.index');

        Route::get('/produk-layanan/{id}/edit', [
            ProductServiceController::class,
            'edit',
        ])->name('products-services.edit');

        Route::post('/produk-layanan', [
            ProductServiceController::class,
            'store',
        ])->name('products-services.store');

        Route::put('/produk-layanan/{id}', [
            ProductServiceController::class,
            'update',
        ])->name('products-services.update');

        Route::delete('/produk-layanan/{id}', [
            ProductServiceController::class,
            'destroy',
        ])->name('products-services.destroy');
    });


/*
|--------------------------------------------------------------------------
| CMS BERANDA, TENTANG KAMI, DAN KONTAK
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // CMS Beranda
    Route::get('/cms/beranda', [
        HomePageController::class,
        'index',
    ])->name('cms.dashboard');

    Route::put('/cms/beranda', [
        HomePageController::class,
        'update',
    ])->name('cms.dashboard.update');

    // CMS Tentang Kami
    Route::get('/cms/tentang-kami', [
        \App\Http\Controllers\Admin\AboutPageController::class,
        'index',
    ])->name('cms.about');

    Route::put('/cms/tentang-kami', [
        \App\Http\Controllers\Admin\AboutPageController::class,
        'update',
    ])->name('cms.about.update');

    // CMS Kontak
    Route::get('/cms/kontak', [
        ContactController::class,
        'index',
    ])->name('cms.contact');

    Route::put('/cms/kontak', [
        ContactController::class,
        'update',
    ])->name('cms.contact.update');
});


/*
|--------------------------------------------------------------------------
| CMS GALERI
|--------------------------------------------------------------------------
*/

Route::prefix('cms')
    ->name('cms.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/galeri', [
            GalleryController::class,
            'index',
        ])->name('gallery.index');

        Route::post('/galeri', [
            GalleryController::class,
            'store',
        ])->name('gallery.store');

        Route::put('/galeri/{id}', [
            GalleryController::class,
            'update',
        ])->name('gallery.update');

        Route::delete('/galeri/{id}', [
            GalleryController::class,
            'destroy',
        ])->name('gallery.destroy');
    });


/*
|--------------------------------------------------------------------------
| CMS PENGATURAN GLOBAL
|--------------------------------------------------------------------------
*/

Route::prefix('cms')
    ->name('cms.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/pengaturan-global', [
            GlobalSettingController::class,
            'index',
        ])->name('global-settings.index');

        Route::put('/pengaturan-global/cta', [
            GlobalSettingController::class,
            'updateCta',
        ])->name('global-settings.cta.update');

        Route::put('/pengaturan-global/footer', [
            GlobalSettingController::class,
            'updateFooter',
        ])->name('global-settings.footer.update');

        Route::put('/pengaturan-global/konsultasi', [
            GlobalSettingController::class,
            'updateConsultation',
        ])->name('global-settings.konsultasi.update');
    });