<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ isset($productService) ? 'Edit' : 'Tambah' }} Produk & Layanan - CMS ADK</title>

    <style>
        * { box-sizing: border-box; }

        :root {
            --red: #e50920;
            --red-dark: #c9081b;
            --sidebar: #101820;
            --text: #1f2d3d;
            --muted: #7b8ba0;
            --line: #e9edf2;
            --bg: #f5f7fa;
            --sidebar-w: 225px;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: var(--bg);
            font-size: 14px;
        }

        a { color: inherit; }

        /* ===== LAYOUT ===== */

        .app {
            min-height: 100vh;
            display: flex;
        }

        .main {
            flex: 1 1 0;
            min-width: 0;
            margin-left: var(--sidebar-w);
            transition: margin-left .25s ease;
        }

        .app.sidebar-collapsed .main { margin-left: 0; }
        .app.sidebar-collapsed .sidebar { transform: translateX(-100%); }

        /* ===== TOPBAR ===== */

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            height: 64px;
            padding: 0 30px;
            background: white;
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        .menu-toggle {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            padding: 0;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: #526072;
            cursor: pointer;
        }

        .menu-toggle:hover { background: #f1f4f8; }

        .breadcrumb {
            color: #8994a4;
            font-size: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .breadcrumb a { text-decoration: none; color: inherit; }
        .breadcrumb a:hover { color: var(--red); }
        .breadcrumb .sep { margin: 0 8px; }
        .breadcrumb strong { color: var(--text); }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
            flex-shrink: 0;
        }

        .notif {
            position: relative;
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            color: #526072;
            cursor: pointer;
        }

        .notif-dot {
            position: absolute;
            top: 3px;
            right: 5px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--red);
            border: 1.5px solid white;
        }

        .avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #fce4e7;
            color: #b91429;
            font-weight: 700;
        }

        .admin-name {
            font-size: 12px;
            font-weight: 700;
        }

        .admin-chevron {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #526072;
            cursor: pointer;
        }

        /* ===== CONTENT ===== */

        .content {
            width: 100%;
            padding: 30px;
        }

        .page-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        /* tombol kembali (gaya sama seperti tombol "+ Tambah Galeri") */
        .breadcrumb-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            flex-shrink: 0;
            min-height: 42px;
            padding: 11px 18px;
            border-radius: 6px;
            background: var(--red);
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            transition: background .2s ease;
        }

        .breadcrumb-back:hover { background: var(--red-dark); }

        /* ===== FORM CARD ===== */

        .form-card {
            background: white;
            border: 1px solid #edf0f4;
            border-radius: 10px;
            box-shadow: 0 3px 15px #202e4010;
            overflow: hidden;
        }

        .form-card-header {
            padding: 22px 25px;
            border-bottom: 1px solid var(--line);
        }

        .form-card-header h2 {
            margin: 0 0 7px;
            font-size: 16px;
        }

        .form-card-header p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .form-body { padding: 25px; }

        .section-title {
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
            font-weight: 700;
        }

        .section-title:not(:first-child) { margin-top: 12px; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 20px;
        }

        .form-group {
            min-width: 0;
            margin-bottom: 20px;
        }

        .form-group.full { grid-column: 1 / -1; }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-size: 12px;
            font-weight: 700;
        }

        .required-star { color: var(--red); margin-left: 3px; }

        .form-control {
            display: block;
            width: 100%;
            min-height: 43px;
            padding: 11px 13px;
            border: 1px solid #dfe5ec;
            border-radius: 6px;
            background: white;
            color: var(--text);
            outline: none;
            font: inherit;
            font-size: 13px;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-control::placeholder { color: #a3adba; }

        .form-control:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px #e5092014;
        }

        select.form-control { cursor: pointer; }

        textarea.form-control {
            min-height: 115px;
            resize: vertical;
            line-height: 1.6;
        }

        input[type="file"].form-control { padding: 9px; }

        .form-help {
            display: block;
            margin-top: 7px;
            color: #929cab;
            font-size: 11px;
            line-height: 1.6;
        }

        .error-message {
            margin-top: 6px;
            color: var(--red);
            font-size: 11px;
        }

        .alert-error {
            margin-bottom: 22px;
            padding: 14px 17px;
            border: 1px solid #f5c4ca;
            border-radius: 6px;
            background: #fff1f2;
            color: #b91429;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert-error ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        .image-preview { margin-top: 12px; }

        .image-preview .form-help { margin: 0 0 7px; }

        .image-preview img {
            display: block;
            width: 160px;
            height: 110px;
            object-fit: cover;
            border: 1px solid var(--line);
            border-radius: 8px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px;
            background: #f8f9fb;
            border: 1px solid var(--line);
            border-radius: 6px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin: 0;
            accent-color: var(--red);
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            padding: 18px 25px;
            background: #fcfcfd;
            border-top: 1px solid var(--line);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 42px;
            padding: 11px 18px;
            border: 1px solid transparent;
            border-radius: 6px;
            text-decoration: none;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary { background: var(--red); color: white; }
        .btn-primary:hover { background: var(--red-dark); }

        .btn-outline {
            background: white;
            border-color: #dce2e9;
            color: #526072;
        }

        .btn-outline:hover { background: #f5f7fa; }

        .btn:disabled { opacity: .6; cursor: not-allowed; }

        /* ===== SIDEBAR CMS ADK ===== */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            width: var(--sidebar-w);
            height: 100vh;
            padding: 20px 12px;
            overflow-y: auto;
            background: var(--sidebar);
            color: #c7d0dc;
            transition: transform .25s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 0 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
        }

        .brand img,
        .brand-logo {
            display: block;
            width: 145px;
            height: 65px;
            max-width: 100%;
            object-fit: contain;
        }

        .nav-list {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border-radius: 5px;
            color: #c7d0dc;
            text-decoration: none;
            font-size: 12px;
            transition: .2s ease;
        }

        .nav-item svg { width: 17px; height: 17px; flex-shrink: 0; }
        .nav-item:hover { background: #202a35; color: white; }
        .nav-item.active { background: var(--red); color: white; font-weight: 700; }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 10px 0;
            border-top: 1px solid #27313b;
            color: #8190a1;
            font-size: 10px;
            line-height: 1.7;
        }

        /* ===== TABLET ===== */

        @media (min-width: 701px) and (max-width: 1050px) {
            :root { --sidebar-w: 190px; }

            .brand img,
            .brand-logo { width: 130px; height: 58px; }

            .content { padding: 23px 18px; }
            .topbar { padding: 0 18px; }
        }

        /* ===== MOBILE ===== */

        @media (max-width: 700px) {
            .app { display: block; }

            .sidebar {
                position: relative;
                inset: auto;
                width: 100%;
                height: auto;
                padding: 12px;
                transform: none !important;
            }

            .app.sidebar-collapsed .sidebar { display: none; }

            .brand { padding: 3px 0 12px; margin-bottom: 10px; }

            .brand img,
            .brand-logo { width: 110px; height: 48px; }

            .nav-list {
                flex-direction: row;
                gap: 4px;
                overflow-x: auto;
                padding-bottom: 5px;
            }

            .nav-item { flex: 0 0 auto; padding: 10px; }
            .sidebar-bottom { display: none; }

            .main,
            .app.sidebar-collapsed .main { width: 100%; margin-left: 0; }

            .topbar { position: static; height: 55px; padding: 0 14px; }
            .topbar-left { gap: 10px; }
            .breadcrumb { font-size: 10px; }
            .admin-name { display: none; }

            .content { padding: 21px 12px; }

            .page-top { flex-direction: column; gap: 14px; }
            .page-heading h1 { font-size: 22px; }
            .breadcrumb-back { width: 100%; }

            .form-card-header,
            .form-body { padding: 18px 15px; }

            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }

            .form-footer {
                padding: 14px 15px;
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-footer .btn { width: 100%; }
        }

                /* ===== TAMBAHAN RESPONSIVE ===== */

        /* Breadcrumb bisa terpotong rapi di layar sempit */
        .breadcrumb { min-width: 0; }

        /* Tablet kecil: form jadi 1 kolom supaya input tidak sempit */
        @media (min-width: 701px) and (max-width: 860px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }

            .page-heading h1 { font-size: 24px; }
        }

        /* HP */
        @media (max-width: 700px) {
            /* Menu sidebar horizontal tidak turun baris */
            .nav-item { white-space: nowrap; }

            /* Cegah auto-zoom di iPhone saat fokus ke input */
            .form-control { font-size: 16px; }

            /* Gambar preview menyesuaikan lebar layar */
            .image-preview img {
                width: 100%;
                max-width: 220px;
                height: auto;
                aspect-ratio: 16 / 11;
            }

            .checkbox-group { align-items: flex-start; }
            .checkbox-group input[type="checkbox"] { margin-top: 2px; }
        }

        /* HP kecil (≤400px) */
        @media (max-width: 400px) {
            .topbar { padding: 0 10px; }
            .topbar-right { gap: 8px; }
            .page-heading h1 { font-size: 20px; }
            .btn,
            .breadcrumb-back { font-size: 11px; padding: 10px 12px; }
        }


                /* ===== NAVBAR ATAS DI HP ===== */
        @media (max-width: 700px) {

            /* menu berjajar horizontal & bisa digeser (menimpa CSS sidebar.blade.php) */
            .app .sidebar .nav-list {
                flex-direction: row;
                align-items: center;
                gap: 4px;
                width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                padding-bottom: 5px;
                -webkit-overflow-scrolling: touch;
            }

            .app .sidebar .nav-item {
                width: auto;
                flex: 0 0 auto;
                min-height: 40px;
                padding: 10px;
                white-space: nowrap;
            }

            .app .sidebar .nav-group {
                width: auto;
                flex: 0 0 auto;
            }

            .app .sidebar .nav-toggle span { flex: 0 0 auto; }

            .app .sidebar .nav-toggle .submenu-chevron { margin-left: 4px; }

            /* submenu ikut berjajar kalau sedang terbuka */
            .app .sidebar .nav-submenu {
                flex-direction: row;
                width: auto;
                padding: 4px 0 0;
            }

            .app .sidebar .nav-subitem {
                width: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
<div class="app" id="app">
    @include('admin.partials.sidebar')



    <main class="main">

        {{-- ===== TOPBAR ===== --}}
        <header class="topbar">
            <div class="topbar-left">
                <button type="button" class="menu-toggle" id="menuToggle" aria-label="Buka atau tutup menu">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="breadcrumb">
                    CMS ADK
                    <span class="sep">/</span>
                    <a href="{{ route('cms.products-services.index') }}">Produk &amp; Layanan</a>
                    <span class="sep">/</span>
                    <strong>{{ isset($productService) ? 'Edit Data' : 'Tambah Data' }}</strong>
                </div>
            </div>

            <div class="topbar-right">
                <span class="notif" aria-label="Notifikasi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                    <span class="notif-dot"></span>
                </span>

                <div class="avatar">A</div>
                <span class="admin-name">Admin</span>

                <span class="admin-chevron">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </span>
            </div>
        </header>
        {{-- ^ header SUDAH DITUTUP. Di kode lama </header> hilang, jadi seluruh konten
             "masuk" ke dalam topbar dan itulah penyebab tampilan berantakan. --}}

        {{-- ===== CONTENT ===== --}}
        <section class="content">

            <div class="page-top">
                <div class="page-heading">
                    <h1>{{ isset($productService) ? 'Edit Produk & Layanan' : 'Tambah Produk & Layanan' }}</h1>
                    <p>
                        {{ isset($productService)
                            ? 'Perbarui informasi produk atau layanan perusahaan.'
                            : 'Tambahkan informasi produk atau layanan baru perusahaan.' }}
                    </p>
                </div>

                <a href="{{ route('cms.products-services.index') }}" class="breadcrumb-back">
                    ← Kembali ke Produk &amp; Layanan
                </a>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Periksa kembali data yang dimasukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-card">

                <div class="form-card-header">
                    <h2>Informasi Produk & Layanan</h2>
                    <p>Lengkapi informasi berikut sesuai dengan data perusahaan.</p>
                </div>

                <form
                    action="{{ isset($productService)
                        ? route('cms.products-services.update', $productService->id)
                        : route('cms.products-services.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    @if (isset($productService))
                        @method('PUT')
                    @endif

                    <div class="form-body">

                        <h3 class="section-title">Informasi Utama</h3>

                        <div class="form-grid">

                            <div class="form-group">
                                <label for="name">
                                    Nama Produk atau Layanan
                                    <span class="required-star">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name', $productService->name ?? '') }}"
                                    placeholder="Masukkan nama produk atau layanan"
                                    maxlength="255"
                                    required
                                >

                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">
                                    Jenis
                                    <span class="required-star">*</span>
                                </label>

                                <select id="type" name="type" class="form-control" required>
                                    <option value="">Pilih jenis</option>
                                    <option value="Produk" {{ old('type', $productService->type ?? '') === 'Produk' ? 'selected' : '' }}>
                                        Produk
                                    </option>
                                    <option value="Layanan" {{ old('type', $productService->type ?? '') === 'Layanan' ? 'selected' : '' }}>
                                        Layanan
                                    </option>
                                </select>

                                @error('type')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label for="category">
                                    Kategori
                                    <span class="required-star">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="category"
                                    name="category"
                                    class="form-control"
                                    value="{{ old('category', $productService->category ?? '') }}"
                                    placeholder="Masukkan kategori"
                                    maxlength="255"
                                    required
                                >

                                @error('category')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label for="short_description">Deskripsi Singkat</label>

                                <textarea
                                    id="short_description"
                                    name="short_description"
                                    class="form-control"
                                    placeholder="Tuliskan deskripsi singkat produk atau layanan"
                                >{{ old('short_description', $productService->short_description ?? '') }}</textarea>

                                @error('short_description')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <h3 class="section-title">Gambar Produk atau Layanan</h3>

                        <div class="form-group">
                            <label for="card_image">Gambar Kartu</label>

                            <input
                                type="file"
                                id="card_image"
                                name="card_image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="form-help">
                                Format JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                            </small>

                            @if (isset($productService) && $productService->card_image)
                                <div class="image-preview">
                                    <p class="form-help">Gambar saat ini:</p>
                                    <img
                                        src="{{ asset('storage/' . $productService->card_image) }}"
                                        alt="Gambar {{ $productService->name }}"
                                    >
                                </div>
                            @endif

                            @error('card_image')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <h3 class="section-title">Pengaturan Tampilan</h3>

                        <div class="form-grid">

                            <div class="form-group">
                                <label for="sort_order">Urutan Tampilan</label>

                                <input
                                    type="number"
                                    id="sort_order"
                                    name="sort_order"
                                    class="form-control"
                                    min="0"
                                    value="{{ old('sort_order', $productService->sort_order ?? 0) }}"
                                >

                                @error('sort_order')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="home_order">Urutan di Beranda</label>

                                <input
                                    type="number"
                                    id="home_order"
                                    name="home_order"
                                    class="form-control"
                                    min="0"
                                    value="{{ old('home_order', $productService->home_order ?? 0) }}"
                                >

                                @error('home_order')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <div class="checkbox-group">
                                    <input type="hidden" name="show_on_home" value="0">

                                    <input
                                        type="checkbox"
                                        id="show_on_home"
                                        name="show_on_home"
                                        value="1"
                                        {{ old('show_on_home', $productService->show_on_home ?? false) ? 'checked' : '' }}
                                    >

                                    <label for="show_on_home">
                                        Tampilkan produk atau layanan di Beranda
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>

                   <div class="form-footer">
                        <a href="{{ route('cms.products-services.index') }}" class="btn btn-outline">
                            ← Kembali ke Produk &amp; Layanan
                        </a>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($productService) ? 'Simpan Perubahan' : 'Simpan Produk & Layanan' }}
                        </button>
                    </div>

                </form>

            </div>

        </section>

    </main>
</div>

<script>
    // Tombol hamburger: buka/tutup sidebar
    document.getElementById('menuToggle').addEventListener('click', function () {
        document.getElementById('app').classList.toggle('sidebar-collapsed');
    });
</script>

</body>
</html>
