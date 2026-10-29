
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Footer - CMS ADK</title>

    <style>
        :root {
            --red: #c9232c;
            --red-dark: #a71922;
            --black: #202124;
            --muted: #727782;
            --bg: #f6f7f9;
            --white: #fff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--black);
            font-size: 14px;
        }

        button, input, textarea {
            font: inherit;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            background: var(--black);
            color: white;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 4px 0 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
            flex-shrink: 0;
        }

        .sidebar .brand img {
            display: block;
            width: 145px;
            height: 65px;
            max-width: 100%;
            object-fit: contain;
        }

        .sidebar .brand-name {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.5;
        }

        .sidebar .brand-name span {
            color: #ff747a;
        }

        .page-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
            padding: 32px;
            overflow-x: hidden;
        }

        .page-header {
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--muted);
            line-height: 1.6;
        }

        .card {
            width: 100%;
            max-width: 1000px;
            background: var(--white);
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
            margin-bottom: 24px;
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .card-description {
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
            margin-bottom: 22px;
        }

        .form-grid .form-group {
            margin-bottom: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="url"],
        .form-group textarea {
            display: block;
            width: 100%;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #dedfe3;
            border-radius: 8px;
            background: #fff;
            color: var(--black);
            font-family: inherit;
            font-size: 14px;
            line-height: 1.5;
            outline: none;
        }

        .form-group input {
            min-height: 44px;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(201, 35, 44, .1);
        }

        .help {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }

        
        .list-help {
            margin-top: 6px;
            color: #727782;
            font-size: 12px;
            line-height: 1.6;
        }

        .form-group textarea.list-input {
            min-height: 190px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.8;
        }


        .btn {
            min-height: 44px;
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            background: var(--red);
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--red-dark);
        }

        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            color: #b91c1c;
            font-size: 12px;
        }

        .footer-preview {
            background: #202124;
            color: #fff;
            padding: 28px;
            border-radius: 10px;
        }

        .footer-preview h3 {
            color: #ff747a;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .footer-preview p {
            color: #d1d5db;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        @media (max-width: 900px) {
            .page-content {
                margin-left: 0;
                width: 100%;
                padding: 22px 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media (max-width: 600px) {
            .page-content .card {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 24px;
            }
        }

        
.page-content .topbar {
    min-height: 72px;
    margin: -32px -32px 32px;
    padding: 0 32px;
    background: #fff;
    border-bottom: 1px solid #e8e9ed;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

.page-content .topbar-left,
.page-content .topbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.page-content .topbar-left {
    min-width: 0;
}


.page-content .menu-toggle,
.page-content .notification-button {
    position: relative;
    width: 34px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 0;
    border-radius: 6px;
    background: transparent;
    color: #758195;
    cursor: pointer;
}

.page-content .menu-toggle:hover,
.page-content .notification-button:hover {
    background: #f5f7fa;
}

.page-content .menu-toggle svg,
.page-content .notification-button svg {
    width: 18px;
    height: 18px;
}

.page-content .breadcrumb {
    color: #727782;
    font-size: 12px;
    white-space: nowrap;
}

.page-content .breadcrumb strong {
    color: #202124;
}

.page-content .notification-button::after {
    content: "";
    position: absolute;
    top: 5px;
    right: 5px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--red);
}

.page-content .admin-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.page-content .avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #fde8e9;
    color: #c9232c;
    font-weight: 700;
    flex-shrink: 0;
}


.page-content .admin-profile strong {
    font-size: 12px;
}

.page-content .admin-profile small {
    display: none;
}

.page-content .admin-chevron {
    width: 15px;
    height: 15px;
    color: #758195;
    flex-shrink: 0;
}

@media (max-width: 900px) {
    .page-content .topbar {
        margin: -22px -16px 24px;
        padding: 0 16px;
    }
}

@media (max-width: 540px) {
    .page-content .topbar {
        min-height: 60px;
        gap: 8px;
    }

    .page-content .topbar-left,
    .page-content .topbar-right {
        gap: 8px;
    }

    .page-content .breadcrumb {
        font-size: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .page-content .admin-profile strong {
        display: none;
    }
}

.page-content .page-heading {
    margin-bottom: 28px;
}

.page-content .page-heading h1 {
    margin-bottom: 8px;
    font-size: 28px;
}

.page-content .page-heading p {
    color: #727782;
    line-height: 1.6;
}

@media (max-width: 900px) {
    .page-content .topbar {
        margin: -22px -16px 24px;
        padding: 0 16px;
    }
}

@media (max-width: 540px) {
    .page-content .breadcrumb {
        font-size: 11px;
    }

    .page-content .admin-profile small {
        display: none;
    }
}
      
/* ===== SIDEBAR MOBILE: MENU HORIZONTAL (TEMPEL PALING BAWAH) ===== */
@media (max-width: 700px) {

    .sidebar {
        padding: 8px 12px 0 !important;
    }

    .brand {
        height: 56px !important;
        padding: 0 0 6px !important;
        margin-bottom: 6px !important;
    }

    .brand img {
        width: 95px !important;
        height: 40px !important;
    }

    /* Semua kemungkinan pembungkus menu dibuat horizontal */
    .sidebar > nav,
    .sidebar > ul,
    .sidebar > div:not(.brand):not(.sidebar-bottom),
    .sidebar .nav-list,
    .sidebar .menu,
    .sidebar .sidebar-menu {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        gap: 6px !important;
        overflow-x: auto !important;
        overflow-y: hidden !important;
        padding: 0 0 8px !important;
        margin: 0 !important;
        list-style: none !important;
        scrollbar-width: none;
    }

    .sidebar > nav::-webkit-scrollbar,
    .sidebar > ul::-webkit-scrollbar,
    .sidebar .nav-list::-webkit-scrollbar {
        display: none;
    }

    /* Setiap item menu */
    .sidebar .nav-item,
    .sidebar a.nav-item,
    .sidebar button.nav-item {
        flex: 0 0 auto !important;
        width: auto !important;
        min-height: 38px !important;
        padding: 8px 12px !important;
        margin: 0 !important;
        white-space: nowrap !important;
        font-size: 12px !important;
    }

    /* Panah dropdown disembunyikan di mobile supaya ringkas */
    .sidebar .nav-item > svg:last-child:not(:first-child) {
        display: none !important;
    }

    /* Submenu Pengaturan Global: tidak menumpuk ke bawah */
    .sidebar .submenu,
    .sidebar .dropdown-menu,
    .sidebar .nav-submenu {
        position: static !important;
        display: flex !important;
        flex-direction: row !important;
        gap: 6px !important;
        padding: 0 !important;
        margin: 0 !important;
    }
}
    </style>
</head>
<body>


@include('admin.partials.sidebar')

<main class="page-content">
  
<header class="topbar">
    <div class="topbar-left">
        <button
            type="button"
            class="menu-toggle"
            id="adminMenuToggle"
            aria-label="Menu"
        >
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" aria-hidden="true">
                <path d="M4 7h16M4 12h16M4 17h16"></path>
            </svg>
        </button>

        <div class="breadcrumb">
            CMS ADK &nbsp; / &nbsp; Pengaturan Global &nbsp; / &nbsp;
            <strong>Footer</strong>
        </div>
    </div>

    <div class="topbar-right">
        <button
            type="button"
            class="notification-button"
            aria-label="Notifikasi"
        >
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                <path d="M10 21h4"></path>
            </svg>
        </button>

        <div class="admin-profile">
            <div class="avatar">A</div>
            <strong>Admin</strong>

            <svg class="admin-chevron" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="1.8" aria-hidden="true">
                <path d="m7 10 5 5 5-5"></path>
            </svg>
        </div>
    </div>
</header>


    <div class="page-heading">
        <h1>Pengaturan Footer</h1>
        <p>Kelola informasi perusahaan yang ditampilkan pada bagian footer website PT Ari Dharma Kanti.</p>
    </div>


    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert" style="background:#fee2e2;color:#991b1b;">
            Ada data yang belum valid. Periksa pesan pada setiap kolom.
        </div>
    @endif

    <form action="{{ route('cms.global-settings.footer.update') }}" method="POST">
        @csrf
        @method('PUT')

        <section class="card">
            <h2>Identitas Perusahaan</h2>
            <p class="card-description">Informasi utama perusahaan pada footer website.</p>

            <div class="form-group">
                <label for="company_name">Nama Perusahaan</label>
                <input
                    type="text"
                    id="company_name"
                    name="company_name"
                    value="{{ old('company_name', $siteSetting?->company_name ?? 'PT. Ari Dharma Kanti') }}"
                >
                @error('company_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="footer_description">Deskripsi Perusahaan</label>
                <textarea id="footer_description" name="footer_description">{{ old('footer_description', $siteSetting?->footer_description ?? 'Penyedia solusi kebutuhan bisnis dan rumah dengan produk berkualitas dan layanan profesional.') }}</textarea>
                @error('footer_description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </section>

        <section class="card">
            <h2>Media Sosial</h2>
            <p class="card-description">Masukkan tautan akun resmi perusahaan. Kosongkan jika belum tersedia.</p>

            @php
                $socialLinks = old('social_links', $siteSetting?->social_links ?? []);
            @endphp

            <div class="form-grid">
                <div class="form-group">
                    <label for="social_instagram">Instagram</label>
                    <input
                        type="url"
                        id="social_instagram"
                        name="social_links[instagram]"
                        value="{{ $socialLinks['instagram'] ?? '' }}"
                        placeholder="https://instagram.com/..."
                    >
                    @error('social_links.instagram') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_facebook">Facebook</label>
                    <input
                        type="url"
                        id="social_facebook"
                        name="social_links[facebook]"
                        value="{{ $socialLinks['facebook'] ?? '' }}"
                        placeholder="https://facebook.com/..."
                    >
                    @error('social_links.facebook') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_youtube">YouTube</label>
                    <input
                        type="url"
                        id="social_youtube"
                        name="social_links[youtube]"
                        value="{{ $socialLinks['youtube'] ?? '' }}"
                        placeholder="https://youtube.com/..."
                    >
                    @error('social_links.youtube') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_website">Website</label>
                    <input
                        type="url"
                        id="social_website"
                        name="social_links[website]"
                        value="{{ $socialLinks['website'] ?? '' }}"
                        placeholder="https://..."
                    >
                    @error('social_links.website') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </section>

        <section class="card">
            <h2>Informasi Kontak</h2>
            <p class="card-description">Informasi ini juga dapat digunakan oleh pengunjung untuk menghubungi perusahaan.</p>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address">{{ old('address', $siteSetting?->address ?? 'Jl. [Alamat Lengkap], [Kota], Bali, Indonesia') }}</textarea>
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $siteSetting?->phone ?? '0811xxxxxxx') }}"
                    >
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $siteSetting?->email ?? 'info@aridharmakanti.co.id') }}"
                    >
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full">
                    <label for="google_maps_url">Link Google Maps</label>
                    <input
                        type="url"
                        id="google_maps_url"
                        name="google_maps_url"
                        value="{{ old('google_maps_url', $siteSetting?->google_maps_url ?? '') }}"
                        placeholder="https://maps.google.com/..."
                    >
                    @error('google_maps_url') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </section>



        
<section class="card">
    <h2>Quick Link</h2>
    <p class="card-description">
        Atur tautan navigasi yang ditampilkan pada footer website.
        Tulis satu tautan per baris dengan format: Nama Menu | URL.
    </p>

    <div class="form-group">
        <label for="quick_links_text">Daftar Quick Link</label>
        <textarea
            id="quick_links_text"
            name="quick_links_text"
            class="list-input"
            placeholder="Beranda | /&#10;Tentang Kami | /tentang-kami&#10;Layanan | /layanan&#10;Galeri | /galeri&#10;Kontak | /kontak"
        
            >{{ old('quick_links_text', $siteSetting?->quick_links_text ?? "Beranda | /\nTentang Kami | /tentang-kami\nLayanan | /layanan\nGaleri | /galeri\nKontak | /kontak") }}</textarea>

        <p class="list-help">
            Format setiap baris: Nama Menu | URL tujuan.
        </p>
    </div>
</section>

<section class="card">
    <h2>Kategori Produk ADK</h2>
    <p class="card-description">
        Atur daftar kategori produk yang muncul di bagian footer.
        Tulis satu kategori pada setiap baris.
    </p>

    <div class="form-group">
        <label for="product_categories_text">Daftar Kategori Produk</label>
        
<textarea
    id="product_categories_text"
    name="product_categories_text"
    class="list-input"
    >{{ old('product_categories_text', $siteSetting?->product_categories_text ?? "Sepeda Motor Baru\nSuku Cadang & Aksesoris Motor\nPeralatan Telekomunikasi\nPeralatan Masak, Dapur & Elektronik Rumah Tangga\nKomputer & Perlengkapannya\nMesin Pendingin\nFurniture & Interior\nPeralatan & Perlengkapan Olahraga\nPiranti Lunak\nFotografi & Barang Optik\nMesin & Peralatan Pertanian\nSuku Cadang Elektronik") }}</textarea>


        <p class="list-help">
            Total 12 kategori sesuai daftar produk PT Ari Dharma Kanti.
        </p>
    </div>
</section>



<section class="card">
    <h2>Layanan ADK</h2>
    <p class="card-description">
        Atur daftar layanan yang ditampilkan pada footer website.
        Tulis satu layanan pada setiap baris.
    </p>

    <div class="form-group">
        <label for="services_text">Daftar Layanan</label>
        <textarea
            id="services_text"
            name="services_text"
            class="list-input"
        
            >{{ old('services_text', $siteSetting?->services_text ?? "Penyewaan & Sewa Guna Usaha Mesin dan Peralatan Kantor\nJasa Teknologi Informasi & Komputer") }}</textarea>


        <p class="list-help">
            Masukkan satu layanan pada setiap baris.
        </p>
    </div>
</section>


    <section class="card">
        <h2>Kebijakan dan Ketentuan</h2>
        <p class="card-description">
            Atur tautan kebijakan privasi dan syarat penggunaan website.
        </p>

        <div class="form-grid">
            <div class="form-group">
                <label for="privacy_policy_url">Link Kebijakan Privasi</label>
                <input
                    type="text"
                    id="privacy_policy_url"
                    name="privacy_policy_url"
                    value="{{ old('privacy_policy_url', $siteSetting?->privacy_policy_url ?? '/kebijakan-privasi') }}"
                    placeholder="/kebijakan-privasi"
                >
            </div>

            <div class="form-group">
                <label for="terms_url">Link Syarat & Ketentuan</label>
                <input
                    type="text"
                    id="terms_url"
                    name="terms_url"
                    value="{{ old('terms_url', $siteSetting?->terms_url ?? '/syarat-ketentuan') }}"
                    placeholder="/syarat-ketentuan"
                >
            </div>
        </div>
    </section>

        <section class="card">
            <h2>Copyright</h2>
            <p class="card-description">Teks hak cipta pada bagian paling bawah footer.</p>

            <div class="form-group">
                <label for="copyright_text">Teks Copyright</label>
                <input
                    type="text"
                    id="copyright_text"
                    name="copyright_text"
                    value="{{ old('copyright_text', $siteSetting?->copyright_text ?? '© 2025 PT Ari Dharma Kanti. All rights reserved.') }}"
                >
                @error('copyright_text') <span class="error">{{ $message }}</span> @enderror
            </div>
        </section>

        <button type="submit" class="btn">Simpan Pengaturan Footer</button>
    </form>

    <section class="card" style="margin-top:28px;">
        <h2>Pratinjau Footer</h2>
        <p class="card-description">Pratinjau singkat berdasarkan data yang sedang tersimpan atau diisi.</p>

        <div class="footer-preview">
            <h3>{{ $siteSetting?->company_name ?? 'PT. Ari Dharma Kanti' }}</h3>
            <p>{{ $siteSetting?->footer_description ?? 'Penyedia solusi kebutuhan bisnis dan rumah dengan produk berkualitas dan layanan profesional.' }}</p>
            <p style="margin-top:18px;">
                {{ $siteSetting?->address ?? 'Jl. [Alamat Lengkap], [Kota], Bali, Indonesia' }}
            </p>
            <p>{{ $siteSetting?->phone ?? '0811xxxxxxx' }}</p>
            <p>{{ $siteSetting?->email ?? 'info@aridharmakanti.co.id' }}</p>
            <p style="margin-top:18px;">
                {{ $siteSetting?->copyright_text ?? '© 2025 PT Ari Dharma Kanti. All rights reserved.' }}
            </p>
        </div>
    </section>
</main>

</body>
</html>
