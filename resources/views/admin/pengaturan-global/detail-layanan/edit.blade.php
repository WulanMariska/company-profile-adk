<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Detail - CMS ADK</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #e50920;
            --red-dark: #c9081b;
            --sidebar: #101820;
            --black: #1f2d3d;
            --muted: #7b8ba0;
            --line: #e9edf2;
            --bg: #f5f7fa;
            --white: #ffffff;
            --sidebar-w: 225px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--black);
            font-size: 14px;
        }

        button {
            font: inherit;
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

        /* ===== TOPBAR ===== */

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            height: 64px;
            padding: 0 30px;
            background: var(--white);
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
            min-width: 0;
            color: #8994a4;
            font-size: 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .breadcrumb .sep { margin: 0 8px; }
        .breadcrumb strong { color: var(--black); }

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

        /* PAGE HEADING */

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin-bottom: 8px;
            font-size: 28px;
            font-weight: 700;
            color: var(--black);
        }

        .page-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        /* ALERT */

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            line-height: 1.5;
        }

        .alert.success {
            background: #dcfce7;
            color: #166534;
        }

        .alert.error-alert {
            background: #fee2e2;
            color: #991b1b;
        }

        /* CARD */

        .card {
            width: 100%;
            margin-bottom: 22px;
            padding: 24px;
            background: var(--white);
            border: 1px solid #edf0f4;
            border-radius: 10px;
            box-shadow: 0 3px 15px #202e4010;
        }

        .section-heading {
            margin-bottom: 22px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--line);
        }

        .section-heading h2 {
            margin-bottom: 6px;
            font-size: 16px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* FORM */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 700;
            color: var(--black);
        }

        /* TANDA WAJIB ISI (bintang merah) */
        .req {
            margin-left: 4px;
            color: var(--red);
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #dfe5ec;
            border-radius: 6px;
            outline: none;
            background: var(--white);
            color: var(--black);
            font-family: inherit;
            font-size: 13px;
            line-height: 1.6;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-group input[readonly] {
            background: #f8f9fb;
            color: #526072;
        }

        .form-group textarea {
            min-height: 125px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px #e5092014;
        }

        .form-group input[readonly]:focus {
            border-color: #dfe5ec;
            box-shadow: none;
        }

        .help {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.5;
        }

        .image-preview {
            width: 100%;
            max-width: 360px;
            margin-top: 8px;
        }

        .image-preview img {
            display: block;
            width: 100%;
            max-height: 190px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid var(--line);
        }

        .image-preview p {
            margin-bottom: 7px;
            font-size: 11px;
            color: var(--muted);
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px dashed #cfd6df;
            border-radius: 6px;
            background: #f8f9fb;
            color: #526072;
            font-size: 12px;
        }

        /* FEATURE CARD */

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .feature-card {
            min-width: 0;
            padding: 19px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--white);
        }

        .feature-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
        }

        .feature-card-header h3 {
            font-size: 14px;
        }

        .position-badge {
            padding: 5px 10px;
            border-radius: 6px;
            background: #fce4e7;
            color: #b91429;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .feature-card .form-group + .form-group {
            margin-top: 15px;
        }

        .error {
            color: #b91c1c;
            font-size: 12px;
        }

        /* ACTION BUTTON */

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 11px 20px;
            border: 1px solid transparent;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s, border-color .2s;
        }

        .btn-back {
            background: var(--white);
            border-color: #dfe5ec;
            color: #526072;
        }

        .btn-back:hover {
            background: #f1f4f8;
        }

        .btn-save {
            background: var(--red);
            color: white;
        }

        .btn-save:hover {
            background: var(--red-dark);
        }

        /* ===== TABLET ===== */

        @media (min-width: 701px) and (max-width: 1050px) {
            :root { --sidebar-w: 190px; }

            .brand img,
            .brand-logo { width: 130px; height: 58px; }

            .content { padding: 23px 18px; }
            .topbar { padding: 0 18px; }

            .page-heading h1 { font-size: 24px; }
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

            /* navbar horizontal di atas (menimpa CSS sidebar.blade.php) */
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

            .app .sidebar .nav-submenu {
                flex-direction: row;
                width: auto;
                padding: 4px 0 0;
            }

            .app .sidebar .nav-subitem {
                width: auto;
                white-space: nowrap;
            }

            .sidebar-bottom { display: none; }

            .main,
            .app.sidebar-collapsed .main { width: 100%; margin-left: 0; }

            .topbar { position: static; height: 55px; padding: 0 14px; }
            .topbar-left { gap: 10px; }
            .breadcrumb { font-size: 10px; }
            .admin-name { display: none; }

            .content { padding: 21px 12px; }

            .page-heading h1 { font-size: 22px; }

            .card { padding: 17px 13px; }

            .form-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .feature-card { padding: 15px; }

            /* cegah auto-zoom di iPhone saat fokus ke input */
            .form-group input[type="text"],
            .form-group textarea { font-size: 16px; }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn { width: 100%; }
        }

        /* HP kecil (≤400px) */
        @media (max-width: 400px) {
            .topbar { padding: 0 10px; }
            .topbar-right { gap: 8px; }
            .page-heading h1 { font-size: 20px; }
        }
    </style>
</head>

<body>
<div class="app" id="app">

    @include('admin.partials.sidebar')

    <main class="main">

        <!-- TOPBAR -->
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
                    Pengaturan Global
                    <span class="sep">/</span>
                    Detail Layanan
                    <span class="sep">/</span>
                    <strong>Edit Detail</strong>
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

        <section class="content">

            <!-- PAGE HEADING -->
            <div class="page-heading">
                <h1>Edit Detail Produk & Layanan</h1>
                <p>
                    Kelola konten halaman detail produk atau layanan
                    PT. Ari Dharma Kanti.
                </p>
            </div>

            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert error-alert">
                    Terdapat kesalahan pada data yang dimasukkan.
                    Silakan periksa kembali formulir.
                </div>
            @endif

            <form
                action="{{ route('cms.global-settings.detail.update', $productService->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <!-- IDENTITAS DATA -->
                <section class="card">

                    <div class="section-heading">
                        <h2>Informasi Produk & Layanan</h2>
                        <p>Identitas data yang sedang dikelola.</p>
                    </div>

                    <div class="form-group">
                        <label>Nama Produk & Layanan</label>
                        <input
                            type="text"
                            value="{{ $productService->name }}"
                            readonly
                        >
                        <p class="help">
                            Nama ini dikelola melalui CMS Produk & Layanan.
                        </p>
                    </div>

                </section>

                <!-- HERO SECTION -->
                <section class="card">

                    <div class="section-heading">
                        <h2>Hero Section</h2>
                        <p>
                            Atur gambar latar dan deskripsi pembuka
                            halaman detail.
                        </p>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full">
                            <label for="hero_image">Gambar Background Hero</label>

                            <input
                                type="file"
                                id="hero_image"
                                name="hero_image"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            @if ($productService->hero_image)
                                <div class="image-preview">
                                    <p>Gambar hero saat ini:</p>
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($productService->hero_image) }}"
                                        alt="Gambar Hero"
                                    >
                                </div>
                            @endif

                            <p class="help">
                                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                Kosongkan jika tidak ingin mengganti gambar.
                            </p>

                            @error('hero_image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="detail_intro">
                                Deskripsi Singkat Hero <span class="req">*</span>
                            </label>

                            <textarea
                                id="detail_intro"
                                name="detail_intro"
                                required
                                placeholder="Masukkan deskripsi singkat yang tampil di bawah judul hero..."
                            >{{ old('detail_intro', $productService->detail_intro) }}</textarea>

                            @error('detail_intro')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                </section>

                <!-- KONTEN DETAIL -->
                <section class="card">

                    <div class="section-heading">
                        <h2>Konten Detail</h2>
                        <p>
                            Atur gambar, judul bagian, dan deskripsi utama
                            halaman detail.
                        </p>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full">
                            <label for="detail_image">Gambar Konten Detail</label>

                            <input
                                type="file"
                                id="detail_image"
                                name="detail_image"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            @if ($productService->detail_image)
                                <div class="image-preview">
                                    <p>Gambar detail saat ini:</p>
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($productService->detail_image) }}"
                                        alt="Gambar Detail"
                                    >
                                </div>
                            @endif

                            <p class="help">
                                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                Kosongkan jika tidak ingin mengganti gambar.
                            </p>

                            @error('detail_image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="detail_section_title">
                                Judul Bagian Deskripsi <span class="req">*</span>
                            </label>

                            <input
                                type="text"
                                id="detail_section_title"
                                name="detail_section_title"
                                value="{{ old('detail_section_title', $productService->detail_section_title) }}"
                                required
                                placeholder="Contoh: Deskripsi & Ruang Lingkup"
                            >

                            @error('detail_section_title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="description">Deskripsi Utama <span class="req">*</span></label>

                            <textarea
                                id="description"
                                name="description"
                                required
                                placeholder="Masukkan deskripsi utama produk atau layanan..."
                            >{{ old('description', $productService->description) }}</textarea>

                            @error('description')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                </section>

                <!-- EMPAT CARD -->
                <section class="card">

                    <div class="section-heading">
                        <h2>Empat Card Informasi</h2>
                        <p>
                            Kelola judul dan deskripsi setiap card.
                            Posisi mengikuti urutan tampilan halaman detail publik.
                        </p>
                    </div>

                    <div class="feature-grid">

                        <!-- CARD 1 -->
                        <div class="feature-card">

                            <div class="feature-card-header">
                                <h3>Card 1</h3>
                                <span class="position-badge">
                                    Posisi 1 · Kiri atas
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="feature_1_title">
                                    Judul Card 1 <span class="req">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="feature_1_title"
                                    name="feature_1_title"
                                    value="{{ old('feature_1_title', $productService->feature_1_title) }}"
                                    required
                                    placeholder="Masukkan judul card pertama"
                                >

                                @error('feature_1_title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="feature_1_description">
                                    Deskripsi Card 1 <span class="req">*</span>
                                </label>

                                <textarea
                                    id="feature_1_description"
                                    name="feature_1_description"
                                    required
                                    placeholder="Masukkan deskripsi card pertama..."
                                >{{ old('feature_1_description', $productService->feature_1_description) }}</textarea>

                                @error('feature_1_description')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- CARD 2 -->
                        <div class="feature-card">

                            <div class="feature-card-header">
                                <h3>Card 2</h3>
                                <span class="position-badge">
                                    Posisi 2 · Kanan atas
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="feature_2_title">
                                    Judul Card 2 <span class="req">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="feature_2_title"
                                    name="feature_2_title"
                                    value="{{ old('feature_2_title', $productService->feature_2_title) }}"
                                    required
                                    placeholder="Masukkan judul card kedua"
                                >

                                @error('feature_2_title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="feature_2_description">
                                    Deskripsi Card 2 <span class="req">*</span>
                                </label>

                                <textarea
                                    id="feature_2_description"
                                    name="feature_2_description"
                                    required
                                    placeholder="Masukkan deskripsi card kedua..."
                                >{{ old('feature_2_description', $productService->feature_2_description) }}</textarea>

                                @error('feature_2_description')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- CARD 3 -->
                        <div class="feature-card">

                            <div class="feature-card-header">
                                <h3>Card 3</h3>
                                <span class="position-badge">
                                    Posisi 3 · Kiri bawah
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="feature_3_title">
                                    Judul Card 3 <span class="req">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="feature_3_title"
                                    name="feature_3_title"
                                    value="{{ old('feature_3_title', $productService->feature_3_title) }}"
                                    required
                                    placeholder="Masukkan judul card ketiga"
                                >

                                @error('feature_3_title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="feature_3_description">
                                    Deskripsi Card 3 <span class="req">*</span>
                                </label>

                                <textarea
                                    id="feature_3_description"
                                    name="feature_3_description"
                                    required
                                    placeholder="Masukkan deskripsi card ketiga..."
                                >{{ old('feature_3_description', $productService->feature_3_description) }}</textarea>

                                @error('feature_3_description')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- CARD 4 -->
                        <div class="feature-card">

                            <div class="feature-card-header">
                                <h3>Card 4</h3>
                                <span class="position-badge">
                                    Posisi 4 · Kanan bawah
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="feature_4_title">
                                    Judul Card 4 <span class="req">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="feature_4_title"
                                    name="feature_4_title"
                                    value="{{ old('feature_4_title', $productService->feature_4_title) }}"
                                    required
                                    placeholder="Masukkan judul card keempat"
                                >

                                @error('feature_4_title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="feature_4_description">
                                    Deskripsi Card 4 <span class="req">*</span>
                                </label>

                                <textarea
                                    id="feature_4_description"
                                    name="feature_4_description"
                                    required
                                    placeholder="Masukkan deskripsi card keempat..."
                                >{{ old('feature_4_description', $productService->feature_4_description) }}</textarea>

                                @error('feature_4_description')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>

                </section>

                <!-- ACTION BUTTON -->
                <div class="form-actions">

                    <a
                        href="{{ route('cms.global-settings.detail.index') }}"
                        class="btn btn-back"
                    >
                        Kembali ke Daftar
                    </a>

                    <button type="submit" class="btn btn-save">
                        Simpan Detail
                    </button>

                </div>

            </form>

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