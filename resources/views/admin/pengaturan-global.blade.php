@extends('layouts.admin')

@section('title', 'Pengaturan Global')
@section('breadcrumb', 'Pengaturan Global')

@section('content')
<div class="global-settings-page">
    <header class="page-header">
        <h1>Pengaturan Global</h1>
        <p>Kelola CTA, Footer, dan Konsultasi untuk website PT. Ari Dharma Kanti.</p>
    </header>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <strong>Data belum berhasil disimpan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="settings-card" id="cta">
        <h2>1. CTA</h2>
        <p class="description">Atur judul, deskripsi, dan tombol ajakan bertindak yang akan digunakan pada website.</p>
        <div class="notice">Pengaturan CTA belum aktif. Kita akan menghubungkannya ke penyimpanan global setelah struktur datanya ditentukan.</div>
    </section>

    <section class="settings-card" id="footer">
        <h2>2. Footer</h2>
        <p class="description">Atur deskripsi footer, tautan media sosial, dan copyright.</p>

        <form action="{{ route('cms.global-settings.footer.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="footer_description">Deskripsi Footer</label>
                <textarea id="footer_description" name="footer_description" placeholder="Masukkan deskripsi singkat perusahaan">{{ old('footer_description', $siteSetting?->footer_description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="social_website">Website Perusahaan</label>
                <input id="social_website" type="url" name="social_links[website]" value="{{ old('social_links.website', $siteSetting?->social_links['website'] ?? '') }}" placeholder="https://contoh.com">
            </div>

            <div class="form-group">
                <label for="social_instagram">Instagram</label>
                <input id="social_instagram" type="url" name="social_links[instagram]" value="{{ old('social_links.instagram', $siteSetting?->social_links['instagram'] ?? '') }}" placeholder="https://instagram.com/akun">
            </div>

            <div class="form-group">
                <label for="copyright_text">Teks Hak Cipta</label>
                <input id="copyright_text" type="text" name="copyright_text" value="{{ old('copyright_text', $siteSetting?->copyright_text ?? '') }}" placeholder="© 2026 PT. Ari Dharma Kanti">
            </div>

            <button type="submit" class="save-button">Simpan Pengaturan Footer</button>
        </form>
    </section>

    <section class="settings-card" id="konsultasi">
        <h2>3. Konsultasi</h2>
        <p class="description">Atur informasi dan tombol konsultasi untuk pengunjung website.</p>
        <div class="notice">Pengaturan Konsultasi belum aktif. Kita akan menghubungkannya setelah kebutuhan penyimpanan dan tujuan tombol dipastikan.</div>
    </section>
</div>
@endsection
