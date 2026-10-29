<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\GlobalCtaSetting;
use App\Models\ConsultationSetting;
use Illuminate\Http\Request;

class GlobalSettingController extends Controller
{
    public function index(Request $request)
    {
        $section = $request->query('section', 'cta');

        if (!in_array($section, ['cta', 'footer', 'konsultasi'], true)) {
            abort(404);
        }

        $siteSetting = SiteSetting::first();
        $ctaSetting = GlobalCtaSetting::first();
        $consultationSetting = ConsultationSetting::first();

        $views = [
            'cta' => 'admin.pengaturan-global.cta',
            'footer' => 'admin.pengaturan-global.footer',
            'konsultasi' => 'admin.pengaturan-global.konsultasi',
        ];

        return view($views[$section], compact(
            'section',
            'siteSetting',
            'ctaSetting',
            'consultationSetting'
        ));
    }

    public function updateCta(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => ['nullable', 'string', 'max:2000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $setting = GlobalCtaSetting::first() ?? new GlobalCtaSetting();
        $setting->fill($validated);
        $setting->is_active = $request->boolean('is_active');
        $setting->save();

        return redirect()
            ->route('cms.global-settings.index', ['section' => 'cta'])
            ->with('success', 'Pengaturan CTA berhasil disimpan.');
    }

  
public function updateFooter(Request $request)
{
    $validated = $request->validate([
        'company_name' => ['nullable', 'string', 'max:255'],
        'footer_description' => ['nullable', 'string', 'max:5000'],
        'address' => ['nullable', 'string', 'max:5000'],
        'phone' => ['nullable', 'string', 'max:30'],
        'email' => ['nullable', 'email', 'max:255'],
        'google_maps_url' => ['nullable', 'url', 'max:2000'],
        'social_links' => ['nullable', 'array'],
        'social_links.*' => ['nullable', 'url', 'max:2000'],
        'copyright_text' => ['nullable', 'string', 'max:255'],

        // Pengaturan tambahan Footer
        'quick_links_text' => ['nullable', 'string', 'max:10000'],
        'product_categories_text' => ['nullable', 'string', 'max:10000'],
        'services_text' => ['nullable', 'string', 'max:10000'],
        'privacy_policy_url' => ['nullable', 'string', 'max:2000'],
        'terms_url' => ['nullable', 'string', 'max:2000'],
    ]);

    $setting = SiteSetting::first() ?? new SiteSetting();

    $setting->fill($validated);

    if (empty($setting->company_name)) {
        $setting->company_name = 'PT. Ari Dharma Kanti';
    }

    $setting->save();

    return redirect()
        ->route('cms.global-settings.index', ['section' => 'footer'])
        ->with('success', 'Pengaturan Footer berhasil disimpan.');
}

    public function updateConsultation(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_link' => ['nullable', 'string', 'max:2000'],
            'office_name' => ['nullable', 'string', 'max:255'],
            'office_address' => ['nullable', 'string', 'max:5000'],
            'office_phone' => ['nullable', 'string', 'max:30'],
            'office_email' => ['nullable', 'email', 'max:255'],
            'google_maps_url' => ['nullable', 'url', 'max:2000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $setting = ConsultationSetting::first() ?? new ConsultationSetting();
        $setting->fill($validated);
        $setting->is_active = $request->boolean('is_active');
        $setting->save();

        return redirect()
            ->route('cms.global-settings.index', ['section' => 'konsultasi'])
            ->with('success', 'Pengaturan Konsultasi berhasil disimpan.');
    }
}
