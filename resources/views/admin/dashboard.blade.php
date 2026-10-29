
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Beranda | PT. Ari Dharma Kanti</title>

    <style>
        :root {
            --red: #c9232c;
            --red-dark: #a71922;
            --black: #202124;
            --muted: #727782;
            --line: #e8e9ed;
            --bg: #f6f7f9;
            --white: #ffffff;
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

        button, input, textarea, select {
            font: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            inset: 0 auto 0 0;
            background: var(--black);
            color: white;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

       .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 4px 0 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
        }

          .brand img {

            width: 145px;

            height: 65px;

            object-fit: contain;

            max-width: 100%}
            
        .brand-name {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.5;
        }

        .brand-name span {
            color: #ff747a;
        }

        .nav-label {
            color: #999ba3;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 12px;
            color: #d6d6da;
            text-decoration: none;
            border-radius: 7px;
            transition: .2s;
        }

        .nav-item:hover {
            background: #333438;
            color: white;
        }

        .nav-item.active {
            color: white;
            background: var(--red);
            font-weight: 700;
        }

        .nav-icon {
            width: 19px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 12px 0;
            border-top: 1px solid #414247;
            color: #b9bbc2;
            font-size: 12px;
            line-height: 1.7;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 64px;
            background: #ffffff;
            border-bottom: 1px solid var(--line);
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
            min-width: 0;
        }

        .menu-toggle {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: none;
            border-radius: 6px;
            background: transparent;
            color: #718096;
            cursor: pointer;
        }

        .menu-toggle:hover {
            background: #f3f4f6;
        }

        .menu-toggle svg {
            width: 18px;
            height: 18px;
        }
         .breadcrumb {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        .breadcrumb strong {
            color: var(--black);
            font-weight: 700;
        }

        .breadcrumb-divider {
            color: #c4c7ce;
        }

        .topbar-right {
    display: flex;
    align-items: center;
    gap: 18px;
    flex-shrink: 0;
}

.notification-button {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 36px;
    border: none;
    background: transparent;
    color: #718096;
}

.notification-button svg {
    width: 19px;
    height: 19px;
}

.notification-dot {
    position: absolute;
    top: 5px;
    right: 3px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--red);
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #fde8e9;
    color: var(--red);
    font-weight: 700;
}

.admin-profile .admin-name {
    color: var(--black);
    font-size: 12px;
    font-weight: 600;
}

.admin-chevron {
    width: 15px;
    height: 15px;
    color: #718096;
    flex-shrink: 0;
}

@media (max-width: 600px) {
    .topbar {
        min-height: 60px;
        padding: 0 14px;
        gap: 10px;
    }

    .topbar-left {
        gap: 10px;
    }

    .breadcrumb {
        gap: 7px;
        font-size: 11px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .topbar-right {
        gap: 8px;
    }

    .admin-profile {
        gap: 7px;
    }

    .admin-profile .admin-name {
        display: none;
    }
}

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #fde8e9;
            color: var(--red);
            font-weight: 700;
        }

        .admin-profile strong {
            display: block;
            font-size: 12px;
        }

        .admin-profile small {
            color: var(--muted);
            font-size: 11px;
        }

        .content {
            max-width: 1500px;
            margin: auto;
            padding: 32px 35px 45px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 27px;
        }

        .page-heading h1 {
            font-size: 27px;
            margin-bottom: 9px;
        }

        .page-heading p {
            color: var(--muted);
            line-height: 1.6;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: 1px solid var(--line);
            background: white;
            color: var(--black);
            border-radius: 6px;
            padding: 11px 15px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
        }

        .button-primary {
            background: var(--red);
            color: white;
            border-color: var(--red);
        }

        .button-primary:hover {
            background: var(--red-dark);
        }

        .notice {
            padding: 13px 16px;
            background: #fff5f5;
            border: 1px solid #f5d4d6;
            border-radius: 7px;
            color: #8e2028;
            margin-bottom: 25px;
            line-height: 1.6;
            font-size: 12px;
        }

        .section {
            background: white;
            border: 1px solid var(--line);
            border-radius: 9px;
            margin-bottom: 22px;
            overflow: hidden;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 21px 23px;
            border-bottom: 1px solid var(--line);
        }

        .section-header h2 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .section-header p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .section-body {
            padding: 23px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;
            border: 1px solid #dfe1e6;
            background: white;
            border-radius: 6px;
            padding: 12px;
            outline: none;
            color: var(--black);
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px #c9232c12;
        }

        .field textarea {
            resize: vertical;
            min-height: 95px;
            line-height: 1.6;
        }

        .field small {
            display: block;
            color: var(--muted);
            margin-top: 7px;
            line-height: 1.5;
            font-size: 11px;
        }

        .upload-box {
            border: 1px dashed #c9cbd2;
            background: #fafafa;
            border-radius: 7px;
            padding: 20px;
            text-align: center;
        }

        .upload-box input {
            padding: 9px;
            background: white;
        }

        .upload-box img {
            display: none;
            max-width: 100%;
            max-height: 180px;
            margin: 14px auto 0;
            object-fit: contain;
        }

        .preview-banner {
            background: #242426;
            color: white;
            border-radius: 8px;
            padding: 27px;
            margin-top: 23px;
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 20px;
            align-items: center;
        }

        .preview-label {
            display: inline-block;
            color: #ff8b90;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 13px;
        }

        .preview-banner h3 {
            font-size: 23px;
            line-height: 1.4;
            margin-bottom: 10px;
        }

        .preview-banner p {
            color: #d1d1d5;
            font-size: 12px;
            line-height: 1.7;
        }

        .preview-image {
            min-height: 125px;
            border: 1px dashed #777;
            border-radius: 7px;
            display: grid;
            place-items: center;
            color: #c5c5c8;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            overflow: hidden;
        }

        .preview-image img {
            max-width: 100%;
            max-height: 180px;
            object-fit: contain;
        }

        .preview-button {
            display: inline-block;
            background: var(--red);
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 17px;
            font-size: 11px;
            font-weight: 700;
        }

        .setting-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .setting-card {
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .setting-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .setting-top h3 {
            font-size: 14px;
        }

        .setting-card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.6;
        }

        .status {
            font-size: 10px;
            color: #18764a;
            background: #e8f7ef;
            border-radius: 20px;
            padding: 6px 9px;
            white-space: nowrap;
        }

        .status.off {
            color: #777;
            background: #eeeef0;
        }

        .setting-card .field label {
            font-weight: 400;
        }

        .check-row {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12px;
            cursor: pointer;
        }

        .check-row input {
            accent-color: var(--red);
        }

        .section-footer {
            border-top: 1px solid var(--line);
            background: #fcfcfd;
            padding: 15px 23px;
            display: flex;
            justify-content: flex-end;
            gap: 9px;
        }

        .bottom-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 4px;
        }

        .toast {
            display: none;
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #202124;
            color: white;
            padding: 15px 19px;
            border-radius: 7px;
            box-shadow: 0 5px 25px #0002;
            z-index: 30;
            max-width: calc(100% - 32px);
            line-height: 1.5;
        }

        @media (max-width: 1050px) {
            .sidebar {
                width: 215px;
            }

            .main {
                margin-left: 215px;
            }

            .content {
                padding: 27px 22px;
            }

            .topbar {
                padding: 0 22px;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 13px;
            }

            .brand {
                padding: 4px 8px 12px;
                margin-bottom: 13px;
            }

            .brand img {
                height: 43px;
            }

            .brand-name {
                font-size: 13px;
            }

            .nav-label,
            .sidebar-bottom {
                display: none;
            }

            .nav-list {
                flex-direction: row;
                overflow-x: auto;
                gap: 5px;
                padding-bottom: 3px;
            }

            .nav-item {
                flex: 0 0 auto;
                padding: 11px;
                font-size: 12px;
            }

            .main {
                margin: 0;
            }

            .topbar {
                height: 60px;
                padding: 0 16px;
            }

            .content {
                padding: 23px 16px 35px;
            }

            .page-heading h1 {
                font-size: 23px;
            }
        }

        @media (max-width: 540px) {
            .breadcrumb {
                display: none;
            }

            .page-heading {
                flex-direction: column;
            }

            .page-heading .button {
                width: 100%;
            }

            .form-grid,
            .setting-list,
            .preview-banner {
                grid-template-columns: 1fr;
            }

            .section-header {
                padding: 18px;
            }

            .section-body {
                padding: 17px;
            }

            .preview-banner {
                padding: 20px;
            }

            .preview-banner h3 {
                font-size: 20px;
            }

            .section-footer {
                padding: 14px 17px;
            }

            .bottom-actions {
                flex-direction: column-reverse;
            }

            .bottom-actions .button {
                width: 100%;
            }

            .admin-profile strong {
                font-size: 11px;
            }
        }


        
            .nav-list {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .nav-item {
                display: flex;
                align-items: center;
                gap: 12px;
                min-height: 44px;
                padding: 11px 12px;
                border-radius: 7px;
                color: #d5dbe3;
                text-decoration: none;
                font-size: 13px;
                transition: background-color .2s ease, color .2s ease;
            }

            .nav-item svg {
                width: 19px;
                height: 19px;
                flex: 0 0 19px;
                display: block;
                stroke: currentColor;
                transition: transform .2s ease;
            }

            .nav-item:hover {
                background: #2a3038;
                color: #fff;
            }

            .nav-item:hover svg {
                transform: translateY(-1px);
            }

            .nav-item.active {
                background: #e50920;
                color: #fff;
                font-weight: 700;
            }

            .nav-item.active svg {
                stroke-width: 1.9;
            }

            .nav-item span {
                line-height: 1.4;
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

    <main class="main">
      
<header class="topbar">
    <div class="topbar-left">
        <button
            type="button"
            class="menu-toggle"
            aria-label="Buka atau tutup menu"
            aria-expanded="true"
            id="adminMenuToggle"
        >
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" aria-hidden="true">
                <path d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </button>

        <div class="breadcrumb">
            <span>CMS ADK</span>
            <span class="breadcrumb-divider">/</span>
            <strong>Beranda</strong>
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
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                <path d="M10 21h4"/>
            </svg>
            <span class="notification-dot"></span>
        </button>

        <div class="admin-profile">
            <div class="avatar">A</div>
            <span class="admin-name">Admin</span>

            <svg class="admin-chevron"
                 viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 aria-hidden="true">
                <path d="m7 10 5 5 5-5"/>
            </svg>
        </div>
    </div>
</header>


        <div class="content">
            <div class="page-heading">
                <div>
                    <h1>Pengaturan Beranda</h1>
                    <p>Kelola konten utama yang ditampilkan pada halaman depan website ADK.</p>
                </div>

                <a href="{{ route('home') }}" target="_blank"
                   class="button">↗ Lihat Website</a>
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

                <!-- HERO -->
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
                                <input id="heroTitle" name="hero_title"
                                value="{{ old('hero_title', $settings->hero_title ?? 'Solusi Kebutuhan Anda, Bersama ADK') }}"
                                maxlength="150">
                            </div>

                            <div class="field full">
                                <textarea id="heroDescription" name="hero_description">{{ old('hero_description', $settings->hero_description ?? 'PT. Ari Dharma Kanti menyediakan beragam produk dan solusi untuk mendukung kebutuhan Anda.') }}</textarea>
                            </div>

                            <div class="field">
                                <label for="heroButton">Teks tombol utama</label>
                               <input id="heroButton" name="hero_button"
                                value="{{ old('hero_button', $settings->hero_button ?? 'Jelajahi Layanan') }}">
                            </div>

                            <div class="field">
                                <label for="heroLink">Tautan tombol utama</label>
                                <select id="heroLink" name="hero_link">
                                    <option value="/layanan" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/layanan')>Halaman Layanan</option>
                                    <option value="/tentang-kami" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/tentang-kami')>Tentang Kami</option>
                                    <option value="/kontak" @selected(old('hero_link', $settings->hero_link ?? '/layanan') === '/kontak')>Kontak</option>
                                </select>
                            </div>

                            <div class="field">
                                <label for="heroSecondButton">Teks tombol kedua</label>
                                <input id="heroSecondButton" name="hero_second_button"
                                 value="{{ old('hero_second_button', $settings->hero_second_button ?? 'Hubungi Kami') }}">
                            </div>

                            <div class="field">
                                <label for="heroSecondLink">Tautan tombol kedua</label>
                               <select id="heroSecondLink" name="hero_second_link">
                                    <option value="/kontak" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/kontak')>Halaman Kontak</option>
                                    <option value="/layanan" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/layanan')>Halaman Layanan</option>
                                    <option value="/tentang-kami" @selected(old('hero_second_link', $settings->hero_second_link ?? '/kontak') === '/tentang-kami')>Tentang Kami</option>
                                </select>
                            </div>

                            <div class="field full">
                                <label for="heroImage">Gambar banner</label>
                                <div class="upload-box">
                                   <input type="file"
                                        id="heroImage"
                                        name="hero_image"
                                        accept="image/png,image/jpeg,image/webp">
                                    <small>Pilih gambar JPG, PNG, atau WebP untuk pratinjau.</small>
                                    <img id="heroImagePreview" alt="Pratinjau banner">
                                </div>
                            </div>
                        </div>

                        <div class="preview-banner">
                            <div>
                                <span class="preview-label">PRATINJAU BANNER</span>
                                <h3 id="heroTitlePreview">Solusi Kebutuhan Anda, Bersama ADK</h3>
                                <p id="heroDescriptionPreview">
                                    PT. Ari Dharma Kanti menyediakan beragam produk dan solusi
                                    untuk mendukung kebutuhan Anda.
                                </p>
                                <span class="preview-button" id="heroButtonPreview">
                                    Jelajahi Layanan
                                </span>
                            </div>
                            <div class="preview-image" id="heroImageBox">
                                Gambar banner akan tampil di sini.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CUPLIKAN -->
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
                                    <input
                                        type="checkbox"
                                        name="services_visible"
                                        value="1"
                                        @checked(old('services_visible', $settings->services_visible ?? true))
                                    >
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
                                        <option value="3" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 3)>
                                            3 foto
                                        </option>
                                        <option value="4" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 4)>
                                            4 foto
                                        </option>
                                        <option value="6" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 6)>
                                            6 foto
                                        </option>
                                        <option value="8" @selected((int) old('gallery_count', $settings->gallery_count ?? 4) === 8)>
                                            8 foto
                                        </option>
                                    </select>

                                </div>

                                <label class="check-row">
                                <input
                                    type="checkbox"
                                    name="services_visible"
                                    value="1"
                                    @checked(old('services_visible', $settings->services_visible ?? true))
                                >
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
                                <input
                                    type="checkbox"
                                    name="services_visible"
                                    value="1"
                                    @checked(old('services_visible', $settings->services_visible ?? true))
                                >
                                Tampilkan di Beranda
                            </label>
                            </article>
                        </div>
                    </div>
                </section>


               <div class="bottom-actions">
                    <button type="reset" class="button">Reset Form</button>

                    <button
                        type="button"
                        class="button"
                        id="previewButton"
                    >
                        Perbarui Pratinjau
                    </button>

                    <button type="submit" class="button button-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <div class="toast" id="toast" role="status"></div>

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
</body>
</html>
