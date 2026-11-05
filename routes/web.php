<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Public\ServiceDetailController;
use App\Http\Controllers\Admin\ProductServiceController;
use App\Http\Controllers\Admin\ProductServiceDetailController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\GlobalSettingController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| LOGIN DAN LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    LoginController::class,
    'showLoginForm',
])->name('login');

Route::post('/login', [
    LoginController::class,
    'login',
])->name('login.submit');

Route::post('/logout', [
    LoginController::class,
    'logout',
])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/layanan', [ServiceController::class, 'index'])->name('services');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');


/*
|--------------------------------------------------------------------------
| DETAIL LAYANAN
|--------------------------------------------------------------------------
*/

Route::get('/layanan/sepeda-motor-baru', [
    ServiceDetailController::class,
    'show',
])->defaults('slug', 'perdagangan-eceran-sepeda-motor-baru')
  ->name('service.motor');

Route::get('/layanan/peralatan-telekomunikasi', [
    ServiceDetailController::class,
    'show',
])->defaults('slug', 'perdagangan-besar-peralatan-telekomunikasi')
  ->name('service.telecommunication');

Route::get('/layanan/mesin-pendingin', [
    ServiceDetailController::class,
    'show',
])->defaults('slug', 'industri-mesin-pendingin')
  ->name('service.cooling');

Route::get('/layanan/{slug}', [
    ServiceDetailController::class,
    'show',
])->name('service.detail');


/*
|--------------------------------------------------------------------------
| ROUTE ALIAS TAMBAHAN
|--------------------------------------------------------------------------
*/

Route::get('/tentangkami', [AboutController::class, 'index'])
    ->name('about-us');


/*
|--------------------------------------------------------------------------
| PREVIEW CMS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/preview-cms-dashboard', [
            HomePageController::class,
            'preview',
        ])->name('preview.cms.dashboard');


            Route::get('/preview-cms-produk-layanan', [
                ProductServiceController::class,
                'index',
            ])->name('preview.cms.produk-layanan');


        Route::get('/preview-cms-galeri', [
            AdminGalleryController::class,
            'index',
        ])->name('preview.cms.galeri');


        Route::get('/preview-cms-tentang-kami', [
            AboutPageController::class,
            'index',
        ])->name('preview.cms.tentang-kami');


        Route::get('/preview-cms-kontak', [
            AdminContactController::class,
            'index',
        ])->name('preview.cms.kontak');

});


/*
|--------------------------------------------------------------------------
| CMS PRODUK & LAYANAN
|--------------------------------------------------------------------------
*/

Route::prefix('cms')
    ->name('cms.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Halaman daftar produk dan layanan
        Route::get('/produk-layanan', [
            ProductServiceController::class,
            'index',
        ])->name('products-services.index');

        // Halaman form tambah
        Route::get('/produk-layanan/tambah', [
            ProductServiceController::class,
            'create',
        ])->name('products-services.create');

        // Halaman form edit
        Route::get('/produk-layanan/{id}/edit', [
            ProductServiceController::class,
            'edit',
        ])->name('products-services.edit');

        // Proses menyimpan data baru
        Route::post('/produk-layanan', [
            ProductServiceController::class,
            'store',
        ])->name('products-services.store');

        // Proses memperbarui data
        Route::put('/produk-layanan/{id}', [
            ProductServiceController::class,
            'update',
        ])->name('products-services.update');

        // Proses menghapus data
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

Route::middleware(['auth', 'admin'])->group(function ()   {
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
        AboutPageController::class,
        'index',
    ])->name('cms.about');

    Route::put('/cms/tentang-kami', [
        AboutPageController::class,
        'update',
    ])->name('cms.about.update');

    // CMS Kontak
    Route::get('/cms/kontak', [
        AdminContactController::class,
        'index',
    ])->name('cms.contact');

    Route::put('/cms/kontak', [
        AdminContactController::class,
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
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/galeri', [
            AdminGalleryController::class,
            'index',
        ])->name('gallery.index');

        Route::post('/galeri', [
            AdminGalleryController::class,
            'store',
        ])->name('gallery.store');

        Route::put('/galeri/{id}', [
            AdminGalleryController::class,
            'update',
        ])->name('gallery.update');

        Route::delete('/galeri/{id}', [
            AdminGalleryController::class,
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
    ->middleware(['auth', 'admin'])
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


                // CMS Detail Produk & Layanan
        Route::get('/pengaturan-global/detail-produk-layanan', [
            ProductServiceDetailController::class,
            'index',
        ])->name('global-settings.detail.index');

        Route::get('/pengaturan-global/detail-produk-layanan/{id}/edit', [
            ProductServiceDetailController::class,
            'edit',
        ])->name('global-settings.detail.edit');

        Route::put('/pengaturan-global/detail-produk-layanan/{id}', [
            ProductServiceDetailController::class,
            'update',
        ])->name('global-settings.detail.update');

    });
