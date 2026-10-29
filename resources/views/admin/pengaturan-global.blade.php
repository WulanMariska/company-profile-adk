
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Global | ADK CMS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #222;
        }

        .page-content {
            margin-left: 260px;
            padding: 32px;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 26px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
            line-height: 1.6;
        }

        .settings-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .settings-card h2 {
            margin: 0 0 8px;
            font-size: 20px;
        }

        .settings-card .description {
            margin: 0 0 22px;
            color: #6b7280;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font: inherit;
            background: #fff;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #e50920;
            box-shadow: 0 0 0 3px rgba(229, 9, 32, 0.08);
        }

        .save-button {
            border: none;
            border-radius: 8px;
            background: #e50920;
            color: #fff;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-button:hover {
            background: #c9071b;
        }

        .notice {
            background: #fff5f5;
            border: 1px solid #fecdd3;
            border-radius: 8px;
            padding: 14px;
            color: #9f1239;
            line-height: 1.6;
            font-size: 14px;
        }

        .alert-success {
            padding: 14px 16px;
            border-radius: 8px;
            background: #ecfdf3;
            color: #166534;
            margin-bottom: 20px;
        }

        .alert-error {
            padding: 14px 16px;
            border-radius: 8px;
            background: #fff1f2;
            color: #b42318;
            margin-bottom: 20px;
        }

        .nav-group {
            width: 100%;
        }

        .nav-toggle {
            width: 100%;
            border: none;
            background: transparent;
            font: inherit;
            text-align: left;
            cursor: pointer;
        }

        .nav-toggle .submenu-chevron {
            width: 16px;
            height: 16px;
            margin-left: auto;
            transition: transform 0.2s ease;
        }

        .nav-group.active-group .submenu-chevron {
            transform: rotate(180deg);
        }

        .nav-submenu {
            padding: 4px 0 6px 42px;
        }

        .nav-subitem {
            display: block;
            padding: 10px 12px;
            margin: 3px 0;
            border-radius: 7px;
            color: inherit;
            text-decoration: none;
            font-size: 13px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav-subitem:hover {
            background: #fff0f1;
            color: #e50920;
        }

        .nav-subitem.active {
            background: #e50920;
            color: #fff;
            font-weight: 600;
        }

        .nav-toggle.active {
            color: #e50920;
        }

        @media (max-width: 900px) {
            .page-content {
                margin-left: 0;
                padding: 24px 18px;
            }
        }

        @media (max-width: 600px) {
            .page-content {
                padding: 18px 12px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .settings-card {
                padding: 18px;
            }
        }

        
    </style>
</head>

<body>
    @include('admin.partials.sidebar')

    <main class="page-content">
        <header class="page-header">
            <h1>Pengaturan Global</h1>
            <p>
                Kelola CTA, Footer, dan Konsultasi untuk website
                PT. Ari Dharma Kanti.
            </p>
        </header>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
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
            <p class="description">
                Atur judul, deskripsi, dan tombol ajakan bertindak
                yang akan digunakan pada website.
            </p>

            <div class="notice">
                Pengaturan CTA belum aktif. Kita akan menghubungkannya
                ke penyimpanan global setelah struktur datanya ditentukan.
            </div>
        </section>

        <section class="settings-card" id="footer">
            <h2>2. Footer</h2>
            <p class="description">
                Atur deskripsi footer, tautan media sosial, dan copyright.
            </p>

            <form
                action="{{ route('cms.global-settings.footer.update') }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="footer_description">
                        Deskripsi Footer
                    </label>
                    <textarea
                        id="footer_description"
                        name="footer_description"
                        placeholder="Masukkan deskripsi singkat perusahaan"
                    >{{ old('footer_description', $siteSetting?->footer_description ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="social_website">
                        Website Perusahaan
                    </label>
                    <input
                        id="social_website"
                        type="url"
                        name="social_links[website]"
                        value="{{ old('social_links.website', $siteSetting?->social_links['website'] ?? '') }}"
                        placeholder="https://contoh.com"
                    >
                </div>

                <div class="form-group">
                    <label for="social_instagram">
                        Instagram
                    </label>
                    <input
                        id="social_instagram"
                        type="url"
                        name="social_links[instagram]"
                        value="{{ old('social_links.instagram', $siteSetting?->social_links['instagram'] ?? '') }}"
                        placeholder="https://instagram.com/akun"
                    >
                </div>

                <div class="form-group">
                    <label for="copyright_text">
                        Teks Hak Cipta
                    </label>
                    <input
                        id="copyright_text"
                        type="text"
                        name="copyright_text"
                        value="{{ old('copyright_text', $siteSetting?->copyright_text ?? '') }}"
                        placeholder="© 2026 PT. Ari Dharma Kanti"
                    >
                </div>

                <button type="submit" class="save-button">
                    Simpan Pengaturan Footer
                </button>
            </form>
        </section>

        <section class="settings-card" id="konsultasi">
            <h2>3. Konsultasi</h2>
            <p class="description">
                Atur informasi dan tombol konsultasi untuk pengunjung website.
            </p>

            <div class="notice">
                Pengaturan Konsultasi belum aktif. Kita akan menghubungkannya
                setelah kebutuhan penyimpanan dan tujuan tombol dipastikan.
            </div>
        </section>
    </main>
</body>
</html>
