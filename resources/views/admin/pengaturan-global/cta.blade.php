
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan CTA - CMS ADK</title>

    <style>
        * { box-sizing: border-box; }

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
    object-fit: contain;
    max-width: 100%;
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

@media (max-width: 900px) {
    .page-content {
        margin-left: 0;
        width: 100%;
        padding: 22px 16px;
    }
}


.page-header {
    margin-bottom: 28px;
}

.page-header h1 {
    margin: 0 0 8px;
    font-size: 28px;
}

.page-header p {
    margin: 0;
    color: var(--muted);
}

.card {
    width: 100%;
    max-width: 900px;
    margin: 0;
    background: var(--white);
    border-radius: 12px;
    padding: 28px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
}


/* PERBAIKAN FORM CTA */
.page-content .card form {
    display: flex;
    flex-direction: column;
    gap: 22px;
}

.page-content .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin: 0;
}

.page-content .form-group label {
    display: block;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    color: #202124;
}

.page-content .form-group input[type="text"],
.page-content .form-group textarea {
    display: block;
    width: 100%;
    min-width: 0;
    padding: 12px 14px;
    border: 1px solid #dedfe3;
    border-radius: 8px;
    background: #fff;
    color: #202124;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    outline: none;
}

.page-content .form-group input[type="text"] {
    min-height: 44px;
}

.page-content .form-group textarea {
    min-height: 120px;
    resize: vertical;
}

.page-content .form-group input:focus,
.page-content .form-group textarea:focus {
    border-color: #c9232c;
    box-shadow: 0 0 0 3px rgba(201, 35, 44, .1);
}

.page-content .form-group .help {
    margin: 0;
    font-size: 12px;
    color: #727782;
}

.page-content .form-group.checkbox-row {
    flex-direction: row;
    align-items: center;
    gap: 10px;
}

.page-content .form-group.checkbox-row input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: #c9232c;
}

.page-content .form-group.checkbox-row label {
    font-weight: 500;
}

.page-content .card button[type="submit"] {
    align-self: flex-start;
    min-height: 44px;
    padding: 12px 22px;
    border: none;
    border-radius: 8px;
    background: #c9232c;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

.page-content .card button[type="submit"]:hover {
    background: #a71922;
}

.page-content .error {
    color: #b91c1c;
    font-size: 12px;
}

@media (max-width: 600px) {
    .page-content .card {
        padding: 20px 16px;
    }
}

.page-content .topbar {
    min-height: 64px;
    margin: -32px -32px 32px;
    padding: 0 32px;
    background: #fff;
    border-bottom: 1px solid var(--line);
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
    min-width: 0;
    color: var(--muted);
    font-size: 12px;
    white-space: nowrap;
}


.page-content .breadcrumb strong {
    color: var(--black);
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
    flex-shrink: 0;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: #fde8e9;
    color: var(--red);
    font-weight: 700;
}

.page-content .admin-profile strong {
    display: block;
    font-size: 12px;
}

.page-content .admin-profile small {
    display: none;
}


.page-content .admin-chevron {
    width: 15px;
    height: 15px;
    flex-shrink: 0;
    color: #758195;
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
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 10px;
    }

    .page-content .admin-profile strong {
        display: none;
    }
}

.page-content .admin-profile strong {
    font-size: 12px;
}

.page-content .admin-profile small {
    margin-top: 4px;
    color: #727782;
    font-size: 11px;
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
            aria-label="Buka atau tutup menu"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                aria-hidden="true"
            >
                <path d="M4 7h16M4 12h16M4 17h16"></path>
            </svg>
        </button>

        <div class="breadcrumb">
            CMS ADK &nbsp; / &nbsp;
            Pengaturan Global &nbsp; / &nbsp;
            <strong>CTA</strong>
        </div>
    </div>

    <div class="topbar-right">
        <button
            type="button"
            class="notification-button"
            aria-label="Notifikasi"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                <path d="M10 21h4"></path>
            </svg>
        </button>

        <div class="admin-profile">
            <div class="avatar">A</div>
            <strong>Admin</strong>

            <svg
                class="admin-chevron"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
            >
                <path d="m7 10 5 5 5-5"></path>
            </svg>
        </div>
    </div>
</header>


    <div class="page-heading">
        <h1>Pengaturan CTA</h1>
        <p>Kelola ajakan kerja sama yang ditampilkan pada website PT Ari Dharma Kanti.</p>
    </div>

    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert" style="background:#fee2e2;color:#991b1b;">
            Periksa kembali data yang kamu masukkan.
        </div>
    @endif

    <section class="card">
        <form action="{{ route('cms.global-settings.cta.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul CTA</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $ctaSetting?->title ?? 'Siap Bekerja Sama dengan PT Ari Dharma Kanti?') }}"
                >
                @error('title') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi CTA</label>
                <textarea id="description" name="description">{{ old('description', $ctaSetting?->description ?? 'Hubungi kami sekarang untuk mendapatkan penawaran terbaik sesuai kebutuhan Anda.') }}</textarea>
                @error('description') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="button_text">Teks Tombol</label>
                <input
                    type="text"
                    id="button_text"
                    name="button_text"
                    value="{{ old('button_text', $ctaSetting?->button_text ?? 'Hubungi Kami') }}"
                >
                @error('button_text') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="button_link">Link Tombol</label>
                <input
                    type="text"
                    id="button_link"
                    name="button_link"
                    value="{{ old('button_link', $ctaSetting?->button_link ?? '/kontak') }}"
                >
                <p class="help">Contoh: /kontak atau https://example.com</p>
                @error('button_link') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group checkbox-row">
                <input
                    type="checkbox"
                    id="is_active"
                    name="is_active"
                    value="1"
                    @checked(old('is_active', $ctaSetting?->is_active ?? true))
                >
                <label for="is_active">Tampilkan CTA di website</label>
            </div>

            <button type="submit" class="btn">Simpan Pengaturan</button>
        </form>
    </section>
</main>

</body>
</html>
