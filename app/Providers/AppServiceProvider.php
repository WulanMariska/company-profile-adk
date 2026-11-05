<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\GlobalCtaSetting;
use App\Models\SiteSetting;
use App\Models\ConsultationSetting;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {


        // Pengaturan global untuk layout dan halaman publik.
        View::composer('layouts.app', function ($view) {
            $view->with([
                'globalCtaSetting' => GlobalCtaSetting::first(),
                'globalSiteSetting' => SiteSetting::first(),
                'globalConsultationSetting' => ConsultationSetting::first(),
            ]);
        });

        // Data kontak untuk semua halaman detail layanan.
        View::composer('pages.layanan.*', function ($view) {
            $view->with(
                'globalSiteSetting',
                SiteSetting::first()
            );
        });

        // Data kontak untuk semua halaman detail produk.
        View::composer('pages.produk.*', function ($view) {
            $view->with(
                'globalSiteSetting',
                SiteSetting::first()
            );
        });
    }
}
