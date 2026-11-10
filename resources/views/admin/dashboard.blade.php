@extends('layouts.admin')

@section('title', 'Beranda')
@section('breadcrumb', 'Beranda')

@section('content')
<div class="home-page">

    {{-- Judul halaman --}}
    <div class="page-heading">
        <div>
            <h1>Pengaturan Beranda</h1>
            <p>Kelola konten utama yang ditampilkan pada halaman depan website ADK.</p>
        </div>

        <a href="{{ route('home') }}" target="_blank" class="button">↗ Lihat Website</a>
    </div>

    <div class="notice">
        <strong>Mode desain:</strong>
        Formulir ini masih berupa antarmuka. Perubahan belum tersimpan ke database
        dan belum mengubah website publik.
    </div>

    <form id="homepageForm"
          action="{{ route('cms.dashboard.update') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ============ 01. HERO ============ --}}
        <section class="section">
            <div class="section-header">
                <div>
                    <h2>01. Hero / Banner Beranda</h2>
                    <p>Atur judul utama, deskripsi, gambar, dan tombol pada banner.</p>
                </div>
                <span class="status">Bagian utama</span>
            </div>

            <div class="section-body">
                <div class="form-grid">

                    <div class="field full">
                        <label for="heroTitle">Judul utama</label>
                        <input id="heroTitle" name="hero_title" maxlength="150"
                               value="{{ old('hero_title', $settings->hero_title ?? 'Solusi Kebutuhan Anda, Bersama ADK') }}">
                    </div>

                    <div class="field full">
                        <label for="heroDescription">Deskripsi banner</label>
                        <textarea id="heroDescription" name="hero_description">{{ old('hero_description', $settings->hero_description ?? 'PT. Ari Dharma Kanti menyediakan beragam produk dan solusi untuk mendukung kebutuhan Anda.') }}</textarea>
                    </div>

                    <div class="field">
                        <label for="heroButton">
                            Teks tombol utama
                            <span class="field-label-note">Muncul pada tombol pertama di Hero Beranda</span>
                        </label>
                        <input id="heroButton" name="hero_button"
                               value="{{ old('hero_button', $settings->hero_button ?? 'Jelajahi Layanan') }}">
                    </div>

                    <div class="field">
                        <label for="heroLink">
                            Tautan tombol utama
                            <span class="field-label-note">Menentukan halaman yang dibuka saat tombol utama diklik</span>
                        </label>
                        <select id="heroLink" name="hero_link">
                            <option value="/layanan" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/layanan')>Halaman Layanan</option>
                            <option value="/tentang-kami" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/tentang-kami')>Tentang Kami</option>
                            <option value="/kontak" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/kontak')>Kontak</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="heroSecondButton">
                            Teks tombol kedua
                            <span class="field-label-note">Muncul pada tombol kedua di Hero Beranda</span>
                        </label>
                        <input id="heroSecondButton" name="hero_second_button"
                               value="{{ old('hero_second_button', $settings->hero_second_button ?? 'Hubungi Kami') }}">
                    </div>

                    <div class="field">
                        <label for="heroSecondLink">
                            Tautan tombol kedua
                            <span class="field-label-note">Menentukan halaman yang dibuka saat tombol kedua diklik</span>
                        </label>
                        <select id="heroSecondLink" name="hero_second_link">
                            <option value="/kontak" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/kontak')>Halaman Kontak</option>
                            <option value="/layanan" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/layanan')>Halaman Layanan</option>
                            <option value="/tentang-kami" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/tentang-kami')>Tentang Kami</option>
                        </select>
                    </div>

                    <div class="field full">
                        <label for="heroImage">Gambar banner</label>
                        <div class="upload-box">
                            <input type="file" id="heroImage" name="hero_image"
                                   accept="image/png,image/jpeg,image/webp">
                            <small>Pilih gambar JPG, PNG, atau WebP untuk pratinjau.</small>
                            <img id="heroImagePreview" alt="Pratinjau banner">
                        </div>
                    </div>
                </div>

                {{-- Pratinjau banner --}}
                <div class="preview-banner">
                    <div>
                        <span class="preview-label">PRATINJAU BANNER</span>
                        <h3 id="heroTitlePreview">Solusi Kebutuhan Anda, Bersama ADK</h3>
                        <p id="heroDescriptionPreview">PT. Ari Dharma Kanti menyediakan beragam produk dan solusi untuk mendukung kebutuhan Anda.</p>
                        <span class="preview-button" id="heroButtonPreview">Jelajahi Layanan</span>
                    </div>

                    <div class="preview-image" id="heroImageBox">
                        Gambar banner akan tampil di sini.
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ 02. CUPLIKAN KONTEN ============ --}}
        <section class="section">
            <div class="section-header">
                <div>
                    <h2>02. Cuplikan Konten Beranda</h2>
                    <p>Atur bagian yang ditampilkan pada halaman depan.</p>
                </div>
            </div>

            <div class="section-body">
                <div class="setting-list">

                    <article class="setting-card">
                        <div class="setting-top">
                            <h3>Layanan Kami</h3>
                            <span class="status">Aktif</span>
                        </div>
                        <p>Menampilkan pilihan layanan dari halaman Produk &amp; Layanan.</p>

                        <div class="field">
                            <label for="serviceCount">Jumlah kartu layanan</label>
                            <select id="serviceCount" name="service_count">
                                <option value="3">3 layanan</option>
                                <option value="4" selected>4 layanan</option>
                                <option value="6">6 layanan</option>
                            </select>
                        </div>

                        <label class="check-row">
                            <input type="checkbox" name="services_visible" value="1"
                                   @checked(old('services_visible', $settings->services_visible ?? true))>
                            Tampilkan di Beranda
                        </label>
                    </article>

                    <article class="setting-card">
                        <div class="setting-top">
                            <h3>Galeri Layanan</h3>
                            <span class="status">Aktif</span>
                        </div>
                        <p>Menampilkan pilihan foto dari halaman Galeri.</p>

                        <div class="field">
                            <label for="galleryCount">Jumlah foto</label>
                            <select id="galleryCount" name="gallery_count">
                                <option value="3" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 3)>3 foto</option>
                                <option value="4" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 4)>4 foto</option>
                                <option value="6" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 6)>6 foto</option>
                                <option value="8" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 8)>8 foto</option>
                            </select>
                        </div>

                        <label class="check-row">
                            <input type="checkbox" name="services_visible" value="1"
                                   @checked(old('services_visible', $settings->services_visible ?? true))>
                            Tampilkan di Beranda
                        </label>
                    </article>

                    <article class="setting-card">
                        <div class="setting-top">
                            <h3>Tentang Kami</h3>
                            <span class="status">Aktif</span>
                        </div>
                        <p>Menampilkan ringkasan profil perusahaan di halaman depan.</p>

                        <div class="field">
                            <label for="aboutSummary">Ringkasan Tentang Kami</label>
                            <textarea id="aboutSummary" name="about_summary">PT. Ari Dharma Kanti berkomitmen menyediakan produk dan solusi untuk beragam kebutuhan pelanggan.</textarea>
                        </div>

                        <label class="check-row">
                            <input type="checkbox" name="services_visible" value="1"
                                   @checked(old('services_visible', $settings->services_visible ?? true))>
                            Tampilkan di Beranda
                        </label>
                    </article>

                </div>
            </div>
        </section>

        {{-- Tombol aksi --}}
        <div class="bottom-actions">
            <button type="reset" class="button">Reset Form</button>
            <button type="button" class="button" id="previewButton">Perbarui Pratinjau</button>
            <button type="submit" class="button button-primary">Simpan Perubahan</button>
        </div>
    </form>

    <div class="toast" id="toast" role="status"></div>
</div>
@endsection

@push('scripts')
<script>
    const form = document.getElementById('homepageForm');
    const toast = document.getElementById('toast');

    function showToast(message) {
        toast.textContent = message;
        toast.style.display = 'block';
        window.clearTimeout(showToast.timer);
        showToast.timer = window.setTimeout(() => {
            toast.style.display = 'none';
        }, 3500);
    }

    function updateText(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);

        input.addEventListener('input', () => {
            preview.textContent = input.value.trim() || 'Belum diisi';
        });
    }

    updateText('heroTitle', 'heroTitlePreview');
    updateText('heroDescription', 'heroDescriptionPreview');
    updateText('heroButton', 'heroButtonPreview');

    document.getElementById('heroImage').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            showToast('Pilih file gambar yang valid.');
            this.value = '';
            return;
        }

        const preview = document.getElementById('heroImagePreview');
        const box = document.getElementById('heroImageBox');

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';

        box.replaceChildren(preview.cloneNode(true));
        box.querySelector('img').style.display = 'block';
        showToast('Pratinjau gambar berhasil diperbarui.');
    });

    document.getElementById('previewButton').addEventListener('click', () => {
        showToast('Pratinjau diperbarui. Data belum tersimpan ke database.');
    });

    form.addEventListener('reset', () => {
        window.setTimeout(() => {
            document.getElementById('heroTitlePreview').textContent =
                document.getElementById('heroTitle').value;

            document.getElementById('heroDescriptionPreview').textContent =
                document.getElementById('heroDescription').value;

            document.getElementById('heroButtonPreview').textContent =
                document.getElementById('heroButton').value;

            document.getElementById('heroImagePreview').style.display = 'none';
            document.getElementById('heroImageBox').textContent =
                'Gambar banner akan tampil di sini.';

            showToast('Formulir dikembalikan ke nilai awal.');
        }, 0);
    });
</script>
@endpush
