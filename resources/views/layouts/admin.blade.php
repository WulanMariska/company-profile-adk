<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') - CMS ADK</title>

    {{-- CSS bersama seluruh halaman CMS (sidebar, topbar, tombol, form, tabel) --}}
    <style>
        /* ==========================================================================
           ADK CMS - CSS Terpusat
           Satu-satunya sumber gaya untuk sidebar, topbar, dan komponen umum.
           Gaya khusus setiap halaman ditempatkan di dalam style utama layout ini.
           ========================================================================== */

        :root {
            --red: #e50920;
            --red-dark: #c9081b;
            --sidebar: #101820;
            --text: #263445;
            --muted: #8793a3;
            --line: #e9edf2;
            --bg: #f5f7fa;
            --white: #ffffff;
            --sidebar-w: 225px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font: 13px Arial, Helvetica, sans-serif;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            color: inherit;
        }

        html {
            -webkit-text-size-adjust: 100%;
        }

        /* ==========================================================================
           LAYOUT
           ========================================================================== */

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

        .app.sidebar-collapsed .main {
            margin-left: 0;
        }

        .app.sidebar-collapsed .sidebar {
            transform: translateX(-100%);
        }

        .content {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px;
        }

        /* ==========================================================================
           SIDEBAR
           ========================================================================== */

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

        .sidebar .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 0 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
        }

        .sidebar .brand-logo {
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
            color: #fff;
            text-align: center;
        }

        .sidebar .brand-name span {
            color: #ff747a;
        }

        .sidebar .nav-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
            width: 100%;
        }

        .sidebar .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            min-height: 44px;
            padding: 11px 12px;
            margin: 0;
            border: 0;
            border-radius: 7px;
            background: transparent;
            color: #d5dbe3;
            text-decoration: none;
            text-align: left;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.4;
            cursor: pointer;
            transition: background-color .2s ease, color .2s ease;
        }

        .sidebar .nav-item svg {
            display: block;
            width: 19px;
            height: 19px;
            flex: 0 0 19px;
            stroke: currentColor;
            transition: transform .2s ease;
        }

        .sidebar .nav-item:hover {
            background: #202a35;
            color: #fff;
        }

        .sidebar .nav-item.active {
            background: var(--red);
            color: #fff;
            font-weight: 700;
        }

        /* Grup menu Pengaturan Global */

        .sidebar .nav-group {
            width: 100%;
        }

        .sidebar .nav-toggle {
            appearance: none;
            -webkit-appearance: none;
            box-shadow: none;
            outline-offset: 2px;
        }

        .sidebar .nav-toggle span {
            flex: 1;
            min-width: 0;
        }

        .sidebar .nav-toggle .submenu-chevron {
            width: 16px;
            height: 16px;
            flex: 0 0 16px;
            margin-left: auto;
            transition: transform .2s ease;
        }

        .sidebar .nav-toggle[aria-expanded="true"] .submenu-chevron {
            transform: rotate(180deg);
        }

        .sidebar .nav-submenu {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 5px;
            width: 100%;
            padding: 7px 0 8px 34px;
        }

        .sidebar .nav-subitem {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            min-height: 38px;
            padding: 9px 12px;
            border: 1px solid transparent;
            border-radius: 6px;
            background: transparent;
            color: #aeb9c8;
            text-decoration: none;
            font-size: 12px;
            line-height: 1.4;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease;
        }

        .sidebar .submenu-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            flex: 0 0 6px;
            border-radius: 50%;
            background: #64748b;
            transition: background-color .2s ease;
        }

        .sidebar .nav-subitem:hover {
            background: #202a35;
            color: #fff;
        }

        .sidebar .nav-subitem:hover .submenu-dot {
            background: #fff;
        }

        .sidebar .nav-subitem.active {
            background: rgba(229, 9, 32, .14);
            border-color: rgba(229, 9, 32, .35);
            color: #ff6878;
            font-weight: 700;
        }

        .sidebar .nav-subitem.active .submenu-dot {
            background: var(--red);
        }

        /* Bagian bawah sidebar */

        .sidebar .sidebar-bottom {
            margin-top: auto;
            padding: 18px 10px 0;
            border-top: 1px solid #27313b;
            color: #8190a1;
            font-size: 10px;
            line-height: 1.7;
        }

        .sidebar .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            min-height: 42px;
            padding: 10px 12px;
            margin-bottom: 16px;
            border: 1px solid rgba(229, 9, 32, .45);
            border-radius: 7px;
            background: rgba(229, 9, 32, .12);
            color: #ff6878;
            font-size: 13px;
            font-weight: 700;
            transition: background-color .2s ease, color .2s ease;
        }

        .sidebar .logout-button svg {
            width: 18px;
            height: 18px;
            flex: 0 0 18px;
        }

        .sidebar .logout-button:hover {
            background: var(--red);
            color: #fff;
        }

        .sidebar .sidebar-brand-info strong {
            color: #8190a1;
        }

        /* ==========================================================================
           TOPBAR
           ========================================================================== */

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            height: 64px;
            padding: 0 30px;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
            flex-shrink: 0;
        }

        .menu-toggle,
        .notif {
            position: relative;
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            padding: 0;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: #758195;
        }

        .menu-toggle:hover {
            background: #f1f4f8;
        }

        .notif-dot {
            position: absolute;
            top: 5px;
            right: 6px;
            width: 7px;
            height: 7px;
            border: 1.5px solid #fff;
            border-radius: 50%;
            background: var(--red);
        }

        .breadcrumb {
            min-width: 0;
            color: #8a95a5;
            font-size: 11px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .breadcrumb .sep {
            margin: 0 8px;
        }

        .breadcrumb strong {
            color: #374355;
        }

        .avatar {
            display: grid;
            place-items: center;
            flex: 0 0 34px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #fce4e7;
            color: #b91429;
            font-weight: 700;
        }

        .admin-name {
            font-size: 11px;
            font-weight: 700;
        }

        .admin-chevron {
            display: flex;
            align-items: center;
            color: #758195;
        }

        /* ==========================================================================
           KOMPONEN UMUM
           ========================================================================== */

        /* Judul halaman */

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 25px;
            letter-spacing: -.7px;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* Tombol */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--red);
            color: #fff;
            box-shadow: 0 3px 8px #e5092020;
        }

        .btn-primary:hover {
            background: var(--red-dark);
        }

        .btn-outline {
            background: #fff;
            border-color: #dce2e9;
            color: #526072;
        }

        .btn-outline:hover {
            background: #f5f7fa;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            padding: 0;
            border: 1px solid #e3e8ef;
            border-radius: 6px;
            background: #fff;
            color: #7b8ba0;
            text-decoration: none;
            transition: background-color .2s, border-color .2s, color .2s;
        }

        .btn-icon svg {
            width: 14px;
            height: 14px;
        }

        .btn-icon:hover {
            background: #f1f4f8;
            color: #1f2d3d;
        }

        .btn-icon.btn-delete {
            border-color: #fbd0d5;
            color: var(--red);
        }

        .btn-icon.btn-delete:hover {
            background: #fff1f2;
            border-color: var(--red);
            color: var(--red-dark);
        }

        /* Pesan */

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            background: #fde8e8;
            color: #b91c1c;
        }

        .alert ul {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        .notice {
            padding: 13px 16px;
            border: 1px solid #f5d4d6;
            border-radius: 7px;
            background: #fff5f5;
            color: #8e2028;
            font-size: 12px;
            line-height: 1.6;
        }

        /* Panel */

        .panel {
            margin-bottom: 22px;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
        }

        .panel[id] {
            scroll-margin-top: 84px;
        }

        .panel-header {
            padding: 20px 23px;
            border-bottom: 1px solid var(--line);
        }

        .panel-header h2 {
            margin: 0 0 6px;
            font-size: 15px;
        }

        .panel-header p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .panel-body {
            padding: 23px;
        }

        /* Form */

        .form-group {
            margin-bottom: 18px;
            min-width: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 11px 12px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            outline: none;
            background: #fff;
            color: var(--text);
        }

        .form-group textarea {
            min-height: 95px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .form-help {
            display: block;
            margin-top: 6px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.5;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        /* Toolbar pencarian */

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            padding: 18px 23px;
        }

        .search {
            position: relative;
            flex: 1 1 260px;
            max-width: 420px;
        }

        .search svg {
            position: absolute;
            top: 50%;
            left: 12px;
            width: 16px;
            height: 16px;
            transform: translateY(-50%);
            color: #98a3b1;
        }

        .search input,
        .toolbar select {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            outline: none;
            background: #fff;
            color: #4c596b;
        }

        .search svg ~ input {
            padding-left: 38px;
        }

        .search input:focus,
        .toolbar select:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .toolbar select {
            width: 180px;
        }

        /* Tabel */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-wrap table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-wrap thead {
            background: #f8f9fb;
        }

        .table-wrap th {
            padding: 14px 16px;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            color: #7b8797;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
        }

        .table-wrap td {
            padding: 14px 16px;
            border-bottom: 1px solid #f0f2f5;
            font-size: 12px;
            vertical-align: middle;
        }

        .table-wrap tbody tr:hover {
            background: #fcfcfd;
        }

        .table-wrap tbody tr:last-child td {
            border-bottom: 0;
        }

        .empty-state {
            padding: 35px 15px;
            color: var(--muted);
            text-align: center;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-group form {
            margin: 0;
        }

        /* Badge */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            background: #eef1f6;
            color: #526072;
            font-size: 11px;
            white-space: nowrap;
        }

        .badge-dot {
            font-weight: 700;
        }

        .badge-dot::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        .badge-success {
            background: #e8f8ef;
            color: #239456;
        }

        .badge-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Footer tabel + pagination Laravel */

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 23px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 12px;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin: 0;
        }

        .pagination nav {
            display: flex;
        }

        /* tombol Previous/Next versi mobile bawaan Laravel */

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .pagination nav p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        .pagination nav p span {
            font-weight: 400;
        }

        .pagination nav > div:last-child > div:last-child > span {
            display: inline-flex;
            align-items: center;
            gap: 2px;
        }

        .pagination nav a,
        .pagination nav span[aria-current="page"] > span,
        .pagination nav span[aria-disabled="true"] > span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 26px;
            height: 28px;
            padding: 0 6px;
            border-radius: 6px;
            background: transparent;
            color: var(--muted);
            text-decoration: none;
            font-size: 12px;
        }

        .pagination nav a:hover {
            background: #f1f4f8;
            color: #1f2d3d;
        }

        .pagination nav span[aria-current="page"] > span {
            color: #1f2d3d;
            font-weight: 700;
        }

        .pagination nav svg {
            width: 14px;
            height: 14px;
        }

        /* Toast */

        .toast {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 2000;
            display: none;
            max-width: calc(100% - 32px);
            padding: 13px 17px;
            border-radius: 7px;
            background: #18232e;
            color: #fff;
            box-shadow: 0 8px 30px #0002;
            font-size: 12px;
            line-height: 1.5;
        }

        /* ==========================================================================
           RESPONSIVE: TABLET
           ========================================================================== */

        @media (min-width: 701px) and (max-width: 1050px) {
            :root {
                --sidebar-w: 190px;
            }

            .sidebar .brand-logo {
                width: 130px;
                height: 58px;
            }

            .content {
                padding: 23px 18px;
            }

            .topbar {
                padding: 0 18px;
            }
        }

        /* ==========================================================================
           RESPONSIVE: MOBILE (menu horizontal di atas)
           ========================================================================== */

        @media (max-width: 700px) {
            .app {
                display: block;
            }

            .sidebar {
                position: relative;
                inset: auto;
                width: 100%;
                height: auto;
                padding: 8px 12px 10px;
                overflow: visible;
                transform: none !important;
            }

            .app.sidebar-collapsed .sidebar {
                display: none;
            }

            .sidebar .brand {
                padding: 0 0 8px;
                margin-bottom: 8px;
            }

            .sidebar .brand-logo {
                width: 100px;
                height: 42px;
            }

            .sidebar .nav-list {
                flex-direction: row;
                align-items: center;
                gap: 5px;
                overflow-x: auto;
                overflow-y: hidden;
                padding-bottom: 6px;
                scrollbar-width: none;
                -webkit-overflow-scrolling: touch;
            }

            .sidebar .nav-list::-webkit-scrollbar {
                display: none;
            }

            .sidebar .nav-item {
                flex: 0 0 auto;
                width: auto;
                min-height: 38px;
                padding: 8px 12px;
                font-size: 12px;
                white-space: nowrap;
            }

            .sidebar .nav-group {
                display: flex;
                align-items: center;
                gap: 5px;
                flex: 0 0 auto;
                width: auto;
            }

            .sidebar .nav-toggle span {
                flex: 0 0 auto;
            }

            .sidebar .nav-toggle .submenu-chevron {
                margin-left: 4px;
            }

            .sidebar .nav-submenu {
                flex-direction: row;
                width: auto;
                gap: 5px;
                padding: 0;
            }

            .sidebar .nav-subitem {
                width: auto;
                min-height: 36px;
                white-space: nowrap;
            }

            /* Di mobile hanya tombol Keluar yang ditampilkan */

            .sidebar .sidebar-bottom {
                padding: 6px 0 0;
                border-top: 0;
            }

            .sidebar .logout-button {
                min-height: 38px;
                margin-bottom: 0;
                font-size: 12px;
            }

            .sidebar .sidebar-brand-info {
                display: none;
            }

            .main,
            .app.sidebar-collapsed .main {
                width: 100%;
                margin-left: 0;
            }

            .topbar {
                position: static;
                height: 55px;
                padding: 0 14px;
            }

            .topbar-left {
                gap: 10px;
            }

            .topbar-right {
                gap: 8px;
            }

            .admin-name {
                display: none;
            }

            .content {
                padding: 21px 12px;
            }

            .page-heading h1 {
                font-size: 22px;
            }

            .panel-body {
                padding: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .toolbar {
                padding: 15px;
                gap: 8px;
            }

            .toolbar select {
                flex: 1;
                width: auto;
                min-width: 130px;
            }

            /* cegah auto-zoom di iPhone saat fokus ke input */

            .search input {
                font-size: 16px;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
                padding: 14px;
            }

            .pagination {
                justify-content: flex-start;
                max-width: 100%;
                overflow-x: auto;
            }
        }

        @media (max-width: 540px) {
            .breadcrumb {
                display: none;
            }

            .page-heading {
                flex-direction: column;
            }

            .page-heading .btn {
                width: 100%;
            }
        }

        /* ================================================================
           CMS GALERI — CSS KHUSUS HALAMAN
           Ditempatkan di layouts/admin.blade.php, di dalam <style> utama.
           ================================================================ */

        .gallery-page button,
        .gallery-page input,
        .gallery-page textarea,
        .gallery-page select { font: inherit; }
        .gallery-page button { cursor: pointer; }
        .gallery-page .heading { display:flex; justify-content:space-between; align-items:flex-start; gap:18px; margin-bottom:24px; }
        .gallery-page .heading h1 { margin:0 0 8px; font-size:25px; letter-spacing:-.5px; }
        .gallery-page .heading p { margin:0; color:var(--muted); font-size:12px; line-height:1.6; }
        .gallery-page .btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:11px 15px; border:1px solid transparent; border-radius:5px; font-size:12px; font-weight:700; white-space:nowrap; }
        .gallery-page .primary { background:var(--red); color:#fff; }
        .gallery-page .primary:hover { background:var(--red-dark); }
        .gallery-page .outline { background:#fff; border-color:#dce2e9; color:#526072; }
        .gallery-page .toolbar { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px; padding:16px 18px; margin-bottom:18px; border:1px solid #edf0f4; border-radius:8px; background:#fff; }
        .gallery-page .search { position:relative; flex:1 1 260px; max-width:420px; }
        .gallery-page .search svg { position:absolute; left:12px; top:50%; width:16px; transform:translateY(-50%); color:#9aa4b2; }
        .gallery-page .search input { width:100%; min-height:40px; padding:10px 12px 10px 37px; border:1px solid #dfe5ec; border-radius:5px; outline:none; }
        .gallery-page .toolbar select { min-width:150px; min-height:40px; padding:10px 12px; border:1px solid #dfe5ec; border-radius:5px; background:#fff; color:#526072; }
        .gallery-page .grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:18px; }
        .gallery-page .card { min-width:0; overflow:hidden; border:1px solid #e9edf2; border-radius:8px; background:#fff; box-shadow:0 3px 15px #202e4007; }
        .gallery-page .photo { aspect-ratio:4/3; display:grid; place-items:center; overflow:hidden; background:#edf1f5; }
        .gallery-page .photo img { width:100%; height:100%; object-fit:cover; }
        .gallery-page .body { padding:16px; }
        .gallery-page .card-top { display:flex; align-items:flex-start; justify-content:space-between; gap:10px; margin-bottom:8px; }
        .gallery-page .card h2 { margin:0; font-size:14px; line-height:1.4; overflow-wrap:anywhere; }
        .gallery-page .category { flex-shrink:0; padding:5px 8px; border-radius:4px; color:#b91429; background:#fce4e7; font-size:10px; }
        .gallery-page .description { min-height:36px; margin:0 0 14px; color:#778395; font-size:11px; line-height:1.6; overflow-wrap:anywhere; }
        .gallery-page .footer { display:flex; align-items:center; justify-content:space-between; gap:10px; padding-top:12px; border-top:1px solid var(--line); }
        .gallery-page .status { display:flex; align-items:center; gap:5px; color:#208b52; font-size:10px; }
        .gallery-page .status:before { content:""; width:6px; height:6px; border-radius:50%; background:#2cb875; }
        .gallery-page .actions { display:flex; gap:6px; }
        .gallery-page .actions form { margin:0; }
        .gallery-page .small-btn { width:29px; height:29px; display:grid; place-items:center; border:1px solid #e4e8ee; border-radius:5px; background:#fff; color:#657184; }
        .gallery-page .small-btn.delete { color:var(--red); }
        .gallery-page .empty { display:none; padding:40px 20px; border:1px dashed #d7dee7; border-radius:8px; background:#fff; color:#8793a3; text-align:center; }
        .gallery-page .backdrop { position:fixed; inset:0; z-index:1500; display:none; align-items:center; justify-content:center; padding:20px; background:#10182080; }
        .gallery-page .backdrop.open { display:flex; }
        .gallery-page .modal { width:min(620px,100%); max-height:92vh; overflow-y:auto; border-radius:10px; background:#fff; box-shadow:0 18px 55px #0002; }
        .gallery-page .modal-head { display:flex; justify-content:space-between; gap:15px; padding:20px 22px; border-bottom:1px solid var(--line); }
        .gallery-page .modal-head h2 { margin:0 0 6px; font-size:17px; }
        .gallery-page .modal-head p { margin:0; color:var(--muted); font-size:11px; line-height:1.5; }
        .gallery-page .close { width:30px; height:30px; flex:0 0 30px; border:0; border-radius:5px; background:#f1f4f7; color:#667386; font-size:20px; }
        .gallery-page .modal-body { padding:22px; }
        .gallery-page .field { margin-bottom:17px; }
        .gallery-page .field label { display:block; margin-bottom:8px; font-size:12px; font-weight:700; }
        .gallery-page .field input:not([type=checkbox]):not([type=file]), .gallery-page .field textarea, .gallery-page .field select { width:100%; max-width:100%; padding:11px 12px; border:1px solid #dfe5ec; border-radius:5px; color:var(--text); background:#fff; outline:none; }
        .gallery-page .field textarea { min-height:95px; resize:vertical; }
        .gallery-page .field small { display:block; margin-top:6px; color:#929cab; font-size:10px; line-height:1.5; }
        .gallery-page .gallery-status-toggle { display:flex !important; align-items:center; gap:8px; margin-top:8px; font-weight:400 !important; }
        .gallery-page .gallery-status-toggle input { width:auto; margin:0; }
        .gallery-page .upload { min-height:135px; padding:20px; border:1px dashed #cbd4df; border-radius:7px; background:#fafbfd; text-align:center; }
        .gallery-page .upload label { cursor:pointer; color:#596779; }
        .gallery-page .upload input { display:none; }
        .gallery-page .upload img { display:none; max-width:100%; max-height:200px; object-fit:contain; }
        .gallery-page .modal-actions { display:flex; justify-content:flex-end; flex-wrap:wrap; gap:9px; padding:16px 22px; border-top:1px solid var(--line); background:#fbfcfd; }
        .gallery-page .toast { position:fixed; right:24px; bottom:24px; z-index:1600; display:none; max-width:calc(100% - 32px); padding:13px 17px; border-radius:7px; background:#18232e; color:#fff; box-shadow:0 8px 30px #0002; font-size:12px; }
        @media (min-width:701px) and (max-width:1050px) { .gallery-page .grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
        @media (max-width:700px) {
            .gallery-page .grid { grid-template-columns:repeat(2,minmax(0,1fr)); gap:12px; }
            .gallery-page .heading { flex-wrap:wrap; }
            .gallery-page .heading > div { min-width:0; }
            .gallery-page .heading .btn { width:100%; }
            .gallery-page .toolbar { padding:14px; }
            .gallery-page .search { flex:1 1 100%; max-width:none; }
            .gallery-page .toolbar select { width:100%; min-width:0; }
            .gallery-page .body { padding:12px; }
            .gallery-page .card-top { flex-direction:column; align-items:flex-start; }
            .gallery-page .footer { flex-wrap:wrap; }
            .gallery-page .modal-head, .gallery-page .modal-actions { padding-left:16px; padding-right:16px; }
            .gallery-page .backdrop { padding:10px; }
            .gallery-page .modal-body { padding:16px; }
        }
        @media (max-width:420px) {
            .gallery-page .grid { grid-template-columns:1fr; }
            .gallery-page .modal-actions > .btn { flex:1 1 100%; }
        }

        /* ======================================================================
           HALAMAN TENTANG KAMI
           ====================================================================== */
        .about-page .editor-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 9px;
            border: 1px solid #dfe5ec;
            border-bottom: 0;
            border-radius: 5px 5px 0 0;
            background: #f8f9fb;
        }

        .about-page .editor-toolbar button {
            min-width: 29px;
            height: 29px;
            border: 1px solid #e3e8ee;
            border-radius: 4px;
            background: #fff;
            color: #526072;
        }

        .about-page .editor-toolbar button:hover {
            background: #fff0f2;
            color: var(--red);
        }

        .about-page .editor-content {
            min-height: 160px;
            padding: 14px;
            border: 1px solid #dfe5ec;
            border-radius: 0 0 5px 5px;
            outline: none;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .about-page .editor-content:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .about-page .image-section {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr);
            gap: 24px;
            align-items: start;
        }

        .about-page .image-preview {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 180px;
            min-height: 180px;
            padding: 15px;
            overflow: hidden;
            border: 1px dashed #cbd3de;
            border-radius: 6px;
            background: #f8fafc;
            color: #8994a4;
            text-align: center;
        }

        .about-page .image-preview img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .about-page .image-preview.has-image img { display: block; }
        .about-page .image-preview.has-image .image-placeholder { display: none; }

        .about-page .save-row {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        .about-page .about-alert {
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 5px;
            line-height: 1.6;
        }

        .about-page .about-alert-success {
            background: #e8f7ed;
            color: #176b35;
        }

        .about-page .about-alert-error {
            background: #fdeaea;
            color: #a61b1b;
        }

        .about-page .about-alert ul {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        @media (max-width: 700px) {
            .about-page .image-section { grid-template-columns: 1fr; gap: 8px; }
            .about-page .panel-body { padding: 16px; }
            .about-page .save-row .btn { width: 100%; }
        }

         /* ================================================================
           CMS KONTAK — CSS KHUSUS HALAMAN
           Seluruh selector dibatasi .contact-page agar tidak mengubah UI
           halaman CMS lainnya.
           Responsif: Laptop (>1050px), Tablet (701-1050px), HP (≤700px)
           ================================================================ */

        /* ---------- LAPTOP / DESKTOP (default) ---------- */

        .contact-page {
            width: 100%;
            min-width: 0;
        }

        .contact-page .grid {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, .9fr);
            gap: 20px;
            align-items: start;
        }

        .contact-page .grid > * {
            min-width: 0;
        }

        .contact-page .panel {
            background: #fff;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
        }

        .contact-page .panel-head {
            padding: 20px 22px;
            border-bottom: 1px solid var(--line);
        }

        .contact-page .panel-head h2 {
            margin: 0 0 6px;
            font-size: 15px;
        }

        .contact-page .panel-head p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .contact-page .panel-body {
            padding: 22px;
        }

        .contact-page .group {
            margin-bottom: 17px;
            min-width: 0;
        }

        .contact-page .group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 12px;
        }

        .contact-page .group input,
        .contact-page .group textarea {
            display: block;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            padding: 11px 12px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            outline: none;
            color: var(--text);
            background: #fff;
        }

        .contact-page .group textarea {
            min-height: 85px;
            resize: vertical;
        }

        .contact-page .group input:focus,
        .contact-page .group textarea:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .contact-page .help {
            display: block;
            margin-top: 6px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.5;
        }

        .contact-page .two {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 14px;
        }

        .contact-page .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .contact-page .primary {
            background: var(--red);
            color: #fff;
        }

        .contact-page .primary:hover {
            background: #c9081b;
        }

        .contact-page .outline {
            background: #fff;
            border-color: #dce2e9;
            color: #526072;
        }

        .contact-page .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            margin-top: 22px;
        }

        .contact-page .map-preview {
            min-height: 290px;
            background: #eef2f5;
            position: relative;
            display: grid;
            place-items: center;
            overflow: hidden;
        }

        .contact-page .placeholder {
            text-align: center;
            padding: 25px;
            color: #7b8797;
        }

        .contact-page .pin {
            font-size: 38px;
            color: var(--red);
            margin-bottom: 10px;
        }

        .contact-page .placeholder strong {
            display: block;
            color: #374355;
            margin-bottom: 6px;
        }

        .contact-page .map-frame {
            width: 100%;
            height: 290px;
            border: 0;
            display: none;
        }

        .contact-page .map-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: none;
            background: transparent;
        }

        .contact-page .map-note {
            padding: 14px 18px;
            color: #7d8998;
            font-size: 11px;
            line-height: 1.6;
            border-top: 1px solid var(--line);
        }

        .contact-page .map-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 14px 18px;
            border-top: 1px solid var(--line);
        }

        .contact-page .map-actions #mapStatus {
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .contact-page .status {
            display: block;
            padding: 11px 13px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 11px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .contact-page .status-success {
            background: #e8f8ef;
            color: #239456;
        }

        .contact-page .status-error {
            background: #fde8e8;
            color: #b91c1c;
        }

        .contact-page .status ul {
            margin: 0;
            padding-left: 20px;
        }

        /* ---------- TABLET (701px - 1050px): panel tersusun ke bawah ---------- */

        @media (min-width: 701px) and (max-width: 1050px) {
            .contact-page .grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 0;
            }

            .contact-page .map-preview {
                min-height: 340px;
            }

            .contact-page .map-frame {
                height: 340px;
            }
        }

        /* ---------- HP (≤700px) ---------- */

        @media (max-width: 700px) {
            .contact-page .grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 0;
            }

            .contact-page .panel-head {
                padding: 16px;
            }

            .contact-page .panel-body {
                padding: 16px;
            }

            .contact-page .two {
                grid-template-columns: minmax(0, 1fr);
                gap: 0;
            }

            /* cegah auto-zoom di iPhone saat fokus ke input */
            .contact-page .group input,
            .contact-page .group textarea {
                font-size: 16px;
            }

            /* tombol Reset & Simpan tersusun penuh, Simpan di atas */
            .contact-page .actions {
                flex-direction: column-reverse;
                gap: 8px;
            }

            .contact-page .actions .btn {
                width: 100%;
            }

            .contact-page .map-preview {
                min-height: 240px;
            }

            .contact-page .map-frame {
                height: 240px;
            }

            .contact-page .map-note {
                padding: 12px 16px;
            }

            .contact-page .map-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                padding: 14px 16px;
                text-align: center;
            }

            .contact-page .map-actions .btn {
                width: 100%;
            }
        }

        /* ---------- HP kecil (≤420px) ---------- */

        @media (max-width: 420px) {
            .contact-page .panel-head,
            .contact-page .panel-body {
                padding: 14px;
            }

            .contact-page .map-preview {
                min-height: 210px;
            }

            .contact-page .map-frame {
                height: 210px;
            }

            .contact-page .placeholder {
                padding: 18px;
            }

            .contact-page .pin {
                font-size: 32px;
            }
        }


        /* ================================================================
           CMS BERANDA
           CSS halaman Beranda, dibatasi .home-page agar tidak mengubah
           halaman CMS lain. Nama class tidak diubah.
           ================================================================ */
        .home-page {
            --black: #202124;
            max-width: 1500px;
            margin: 0 auto;
            padding: 2px 5px 15px;
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        .home-page,
        .home-page * {
            box-sizing: border-box;
        }

        .home-page * {
            margin: 0;
            padding: 0;
        }

        /* ---------- Judul halaman ---------- */

        .home-page .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 24px;
        }

        .home-page .page-heading h1 {
            margin-bottom: 8px;
            font-size: 25px;
            letter-spacing: -.5px;
        }

        .home-page .page-heading p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* ---------- Tombol ---------- */

        .home-page .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 16px;
            border: 1px solid #dce2e9;
            border-radius: 5px;
            background: #fff;
            color: #526072;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background-color .2s ease, border-color .2s ease;
        }

        .home-page .button:hover {
            background: #f5f7fa;
        }

        .home-page .button-primary {
            background: var(--red);
            border-color: var(--red);
            color: #fff;
            box-shadow: 0 3px 8px #e5092020;
        }

        .home-page .button-primary:hover {
            background: var(--red-dark);
            border-color: var(--red-dark);
        }

        /* ---------- Notice ---------- */

        .home-page .notice {
            margin-bottom: 22px;
            padding: 13px 16px;
            border: 1px solid #f5d4d6;
            border-radius: 7px;
            background: #fff5f5;
            color: #8e2028;
            font-size: 12px;
            line-height: 1.6;
        }

        /* ---------- Section (kartu) ---------- */

        .home-page .section {
            margin-bottom: 22px;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
        }

        .home-page .section-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 20px 23px;
            border-bottom: 1px solid var(--line);
        }

        .home-page .section-header > div {
            min-width: 0;
        }

        .home-page .section-header h2 {
            margin-bottom: 6px;
            font-size: 15px;
        }

        .home-page .section-header p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .home-page .section-body {
            padding: 23px;
        }

        .home-page .section-footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 23px;
            border-top: 1px solid var(--line);
            background: #fbfcfd;
        }

        .home-page .bottom-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            padding: 4px 0 10px;
        }

        /* ---------- Form ---------- */

        .home-page .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 20px;
        }

        .home-page .field {
            min-width: 0;
        }

        .home-page .field.full {
            grid-column: 1 / -1;
        }

        .home-page .field label:not(.check-row) {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.4;
        }

        .home-page .field-label-note {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 400;
            line-height: 1.5;
        }

        .home-page .field input:not([type="checkbox"]):not([type="radio"]):not([type="file"]),
        .home-page .field textarea,
        .home-page .field select {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 11px 12px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            outline: none;
            background: #fff;
            color: var(--text);
        }

        .home-page .field input:not([type="checkbox"]):not([type="radio"]):not([type="file"]):focus,
        .home-page .field textarea:focus,
        .home-page .field select:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .home-page .field input:not([type="checkbox"]):not([type="radio"]):not([type="file"]),
        .home-page .field select {
            height: 42px;
        }

        .home-page .field textarea {
            min-height: 95px;
            resize: vertical;
            line-height: 1.6;
        }

        .home-page .field small {
            display: block;
            margin-top: 6px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.5;
        }

        /* ---------- Upload gambar ---------- */

        .home-page .upload-box {
            padding: 20px;
            border: 1px dashed #cbd4df;
            border-radius: 7px;
            background: #fafbfd;
            text-align: center;
        }

        .home-page .upload-box input[type="file"] {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 9px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            background: #fff;
            font-size: 12px;
        }

        .home-page .upload-box img {
            display: none;
            max-width: 100%;
            max-height: 180px;
            margin: 14px auto 0;
            object-fit: contain;
        }

        /* ---------- Preview banner ---------- */

        .home-page .preview-banner {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 20px;
            align-items: center;
            margin-top: 23px;
            padding: 27px;
            border-radius: 8px;
            background: var(--sidebar);
            color: #fff;
        }

        .home-page .preview-banner > div {
            min-width: 0;
        }

        .home-page .preview-label {
            display: inline-block;
            margin-bottom: 13px;
            color: #ff8b90;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .home-page .preview-banner h3 {
            margin-bottom: 10px;
            font-size: 22px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .home-page .preview-banner p {
            color: #d1d6dd;
            font-size: 12px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .home-page .preview-image {
            display: grid;
            place-items: center;
            min-height: 125px;
            padding: 10px;
            border: 1px dashed #5b6877;
            border-radius: 7px;
            color: #c5cbd3;
            font-size: 12px;
            text-align: center;
            overflow: hidden;
        }

        .home-page .preview-image img {
            max-width: 100%;
            max-height: 180px;
            object-fit: contain;
        }

        .home-page .preview-button {
            display: inline-block;
            margin-top: 17px;
            padding: 10px 15px;
            border-radius: 5px;
            background: var(--red);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
        }

        /* ---------- Kartu pengaturan ---------- */

        .home-page .setting-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
        }

        .home-page .setting-card {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 0;
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
        }

        .home-page .setting-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .home-page .setting-top h3 {
            font-size: 14px;
        }

        .home-page .setting-card p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .home-page .status {
            padding: 5px 10px;
            border-radius: 20px;
            background: #e8f8ef;
            color: #239456;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .home-page .status.off {
            background: #eef1f6;
            color: #778395;
        }

        .home-page .check-row {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: auto;
            padding-top: 4px;
            font-size: 12px;
            cursor: pointer;
        }

        .home-page .check-row input {
            flex: 0 0 auto;
            width: auto;
            accent-color: var(--red);
        }

        /* ---------- Toast ---------- */

        .home-page .toast {
            display: none;
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 2000;
            max-width: calc(100% - 32px);
            padding: 13px 17px;
            border-radius: 7px;
            background: #18232e;
            color: #fff;
            box-shadow: 0 8px 30px #0002;
            font-size: 12px;
            line-height: 1.5;
        }

        /* ---------- Responsive ---------- */

        @media (max-width: 1050px) {
            .home-page {
                padding: 4px 4px 15px;
            }
        }

        @media (max-width: 900px) {
            .home-page .preview-banner {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .home-page {
                padding: 2px 4px 15px;
            }

            .home-page .page-heading h1 {
                font-size: 22px;
            }

            .home-page .form-grid,
            .home-page .setting-list {
                grid-template-columns: 1fr;
            }

            /* cegah auto-zoom di iPhone saat fokus ke input */
            .home-page .field input:not([type="checkbox"]):not([type="radio"]):not([type="file"]),
            .home-page .field textarea,
            .home-page .field select {
                font-size: 16px;
            }
        }

        @media (max-width: 540px) {
            .home-page {
                padding: 2px 0 15px;
            }

            .home-page .page-heading {
                flex-direction: column;
            }

            .home-page .page-heading .button {
                width: 100%;
            }

            .home-page .section-header {
                padding: 18px;
            }

            .home-page .section-body {
                padding: 17px;
            }

            .home-page .section-footer {
                padding: 14px 17px;
            }

            .home-page .section-footer .button {
                flex: 1 1 100%;
            }

            .home-page .preview-banner {
                padding: 20px;
            }

            .home-page .preview-banner h3 {
                font-size: 19px;
            }

            .home-page .bottom-actions {
                flex-direction: column-reverse;
            }
        }


        /* ================================================================
           CMS PRODUK & LAYANAN — CSS HALAMAN
           Dipindahkan dari Blade halaman tanpa mengubah aturan tampilannya.
           Seluruh selector dibatasi ke .products-page.
           ================================================================ */
/* JUDUL HALAMAN */

.products-page .page-heading {
display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
}

.products-page .page-heading h1 {
margin: 0 0 9px;
            font-size: 25px;
            letter-spacing: -0.7px;
}

.products-page .page-heading p {
margin: 0;
            color: var(--muted);
            font-size: 12px;
}

.products-page .btn {
display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-weight: 600;
            white-space: nowrap;
}

.products-page .btn svg {
width: 16px;
            height: 16px;
}

.products-page .btn-primary {
background: var(--red);
            color: white;
            box-shadow: 0 3px 8px #e5092020;
}

.products-page .btn-primary:hover {
background: #c9081b;
}

.products-page .btn-outline {
background: white;
            border-color: #dce2e9;
            color: #526072;
}

/* PANEL PRODUK & LAYANAN */

.products-page .panel {
width: 100%;
            min-width: 0;
            background: #ffffff;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
}

.products-page .tabs {
display: flex;
            align-items: center;
            gap: 28px;
            padding: 0 23px;
            border-bottom: 1px solid var(--line);
}

.products-page .tab {
position: relative;
            border: 0;
            padding: 18px 2px;
            background: transparent;
            color: #7f8998;
            font-weight: 600;
}

.products-page .tab.active {
color: var(--red);
}

.products-page .tab.active::after {
content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--red);
}

.products-page .toolbar {
display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 23px;
}

.products-page .search {
flex: 1;
            position: relative;
            min-width: 140px;
}

.products-page .search svg {
width: 17px;
            height: 17px;
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #98a3b1;
}

.products-page .search input,
.products-page .toolbar select {
width: 100%;
            height: 39px;
            border: 1px solid #e1e6ed;
            border-radius: 5px;
            outline: none;
            background: white;
            color: #4c596b;
}

.products-page .search input {
padding: 0 12px 0 38px;
}

.products-page .search input:focus,
.products-page .toolbar select:focus {
border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
}

.products-page .toolbar select {
width: 180px;
            padding: 0 10px;
}

.products-page .view-toggle {
display: flex;
            gap: 4px;
}

.products-page .view-toggle button {
width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border: 1px solid #e1e6ed;
            border-radius: 5px;
            background: white;
            color: #8a95a5;
}

.products-page .view-toggle button.selected {
color: var(--red);
            background: #fff5f6;
            border-color: #f5c4ca;
}

/* TABLE */

.products-page .table-wrap {
overflow-x: auto;
}

.products-page table {
width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
}

.products-page thead {
background: #f8f9fb;
}

.products-page th {
padding: 14px 20px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            color: #7b8797;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
}

.products-page td {
padding: 13px 20px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
            font-size: 12px;
}

.products-page tbody tr:hover {
background: #fcfcfd;
}

.products-page tbody tr:last-child td {
border-bottom: 0;
}

.products-page .product-cell {
display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
}

.products-page .product-thumb {
width: 48px;
            height: 43px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: #f0f3f7;
            border: 1px solid #e9edf2;
            border-radius: 5px;
            color: #8591a2;
}

.products-page .product-thumb svg {
width: 25px;
            height: 25px;
}

.products-page .product-name {
font-weight: 700;
            color: #354255;
}

.products-page .product-description {
color: #9aa3af;
            font-size: 10px;
            margin-top: 5px;
}

.products-page .category {
display: inline-block;
            padding: 5px 9px;
            border-radius: 4px;
            background: #f0f3f7;
            color: #657286;
            font-size: 10px;
}

.products-page .status {
display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 4px;
            background: #e8f8ef;
            color: #239456;
            font-size: 10px;
            font-weight: 700;
}

.products-page .status::before {
content: "";
            width: 5px;
            height: 5px;
            background: currentColor;
            border-radius: 50%;
}

.products-page .date {
color: #8994a4;
            font-size: 11px;
}

.products-page .actions {
display: flex;
            align-items: center;
            gap: 6px;
}

.products-page .action-btn {
display: grid;
            place-items: center;
            width: 29px;
            height: 29px;
            border: 1px solid #e7ebf0;
            background: white;
            border-radius: 5px;
            color: #788496;
}

.products-page .action-btn svg {
width: 14px;
            height: 14px;
}

.products-page .action-btn:hover {
background: #f5f7fa;
}

.products-page .action-btn.delete {
color: var(--red);
}

.products-page .table-footer {
padding: 16px 23px;
            border-top: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            color: #8994a4;
            font-size: 11px;
}

.products-page .pagination {
display: flex;
            align-items: center;
            gap: 5px;
}

.products-page .page-btn {
min-width: 29px;
            height: 29px;
            border: 1px solid #e2e7ed;
            border-radius: 4px;
            background: white;
            color: #657286;
}

.products-page .page-btn.active {
color: white;
            background: var(--red);
            border-color: var(--red);
}

/* PERBAIKAN PAGINATION LARAVEL */

.products-page .table-footer nav {
display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
            min-width: 0;
}

/* Sembunyikan navigasi Previous/Next versi mobile */

.products-page .table-footer nav > div:first-child {
display: none !important;
}

/* Rapikan navigasi nomor halaman */

.products-page .table-footer nav > div:last-child {
display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            width: 100%;
            min-width: 0;
}

.products-page .table-footer nav > div:last-child > div {
display: flex;
            align-items: center;
            gap: 10px;
}

.products-page .table-footer nav a,
.products-page .table-footer nav span {
font-size: 11px;
}

.products-page .table-footer nav svg {
width: 16px !important;
            height: 16px !important;
            max-width: 16px;
            max-height: 16px;
}

.products-page .table-footer nav a {
text-decoration: none;
}

.products-page .empty {
display: none;
            padding: 35px;
            text-align: center;
            color: #8b96a5;
}

/* MODAL */

.products-page .modal-backdrop {
position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            place-items: center;
            padding: 16px;
            background: #11182080;
}

.products-page .modal-backdrop.open {
display: grid;
}

.products-page .modal {
width: min(560px, calc(100vw - 32px));
            max-height: calc(100vh - 32px);
            max-height: calc(100dvh - 32px);
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 9px;
            box-shadow: 0 20px 70px #0003;
            overflow: hidden;
            min-height: 0;
}

.products-page #productForm {
display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
            overflow: hidden;
}

.products-page .modal-header {
display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid var(--line);
            flex-shrink: 0;
}

.products-page .modal-header h2 {
margin: 0;
            font-size: 17px;
}

.products-page .modal-body {
padding: 22px;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1;
            min-height: 0;
}

.products-page .form-group {
margin-bottom: 16px;
            min-width: 0;
}

.products-page .form-group label {
display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 12px;
}

.products-page .form-group input,
.products-page .form-group select,
.products-page .form-group textarea {
display: block;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            padding: 11px;
            outline: none;
            color: var(--text);
}

.products-page .form-group input[type="file"] {
padding: 10px;
            background: #fff;
            font-size: 12px;
}

.products-page .form-group textarea {
min-height: 90px;
            resize: vertical;
}

.products-page .form-group input:focus,
.products-page .form-group select:focus,
.products-page .form-group textarea:focus {
border-color: #e88b96;
}

.products-page .form-help {
display: block;
            margin-top: 6px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.5;
            overflow-wrap: anywhere;
}

.products-page .modal-footer {
flex-shrink: 0;
            padding: 14px 22px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            border-top: 1px solid var(--line);
            background: white;
}

        @media (max-width: 1050px) {
            .sidebar {
                width: 190px;
            }

            .content {
                padding: 23px 18px;
            }

            .topbar {
                padding: 0 18px;
            }

            .toolbar {
                flex-wrap: wrap;
            }

            .search {
                flex-basis: 100%;
            }
        }

       /* MOBILE */
        @media (max-width: 700px) { .app { display: block; }

           .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
            }

            .brand {
                padding: 4px 0 12px;
                margin-bottom: 10px;
            }

            .brand-mark {
                font-size: 25px;
            }

            .nav-label,
            .sidebar-bottom {
                display: none;
            }

            .sidebar nav {
                display: flex;
                gap: 5px;
                overflow-x: auto;
                padding-bottom: 3px;
            }

            .nav-item {
                width: auto;
                flex-shrink: 0;
                margin: 0;
                padding: 10px;
            }

            .topbar {
                height: 55px;
                padding: 0 14px;
            }

            .breadcrumb {
                display: none;
            }

            .content {
                padding: 21px 12px;
            }

            .page-heading {
                flex-direction: column;
                align-items: stretch;
                margin-bottom: 20px;
            }

            .page-heading h1 {
                font-size: 22px;
            }

            .page-heading .btn {
                align-self: flex-start;
            }

            .tabs {
                gap: 20px;
                padding: 0 15px;
            }

            .toolbar {
                padding: 15px;
                gap: 8px;
            }

            .toolbar select {
                flex: 1;
                width: auto;
                min-width: 130px;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
                padding: 14px;
            }

            .admin-name {
                display: none;
            }


        .topbar-right > .avatar {
            display: grid !important;
            place-items: center !important;
            box-sizing: border-box !important;

            width: 34px !important;
            height: 34px !important;
            min-width: 34px !important;
            max-width: 34px !important;
            min-height: 34px !important;
            max-height: 34px !important;

            flex: 0 0 34px !important;
            padding: 0 !important;
            margin: 0 !important;

            border-radius: 50% !important;
            background: #fce4e7 !important;
            color: #b91429 !important;

            font-size: 13px !important;
            font-weight: 700 !important;
            line-height: 1 !important;
            aspect-ratio: 1 / 1 !important;
        }

/* REVISI MODAL TAMBAH PRODUK & LAYANAN */
#productModal {
    position: fixed;
    inset: 0;
    padding: 12px;
    box-sizing: border-box;
    display: none;
    place-items: center;
    overflow: hidden;
}

#productModal.open {
    display: grid;
}

#productModal .modal {
    width: min(650px, calc(100vw - 24px));
    height: calc(100vh - 24px);
    height: calc(100dvh - 24px);
    max-height: none;
    min-height: 0;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-sizing: border-box;
}

/* Judul tetap di bagian atas */
#productModal .modal-header {
    flex: 0 0 auto;
    background: #fff;
    position: relative;
    z-index: 2;
}

/* Form memenuhi ruang yang tersedia */
#productModal #productForm {
    display: flex;
    flex-direction: column;
    flex: 1 1 auto;
    min-height: 0;
    overflow: hidden;
}

/* Hanya bagian isi form yang di-scroll */
#productModal .modal-body {
    flex: 1 1 0;
    min-height: 0;
    overflow-y: auto;
    overflow-x: hidden;
    overscroll-behavior: contain;
    padding: 22px;
    box-sizing: border-box;
}

/* Upload mengikuti isi form, bukan menempel di layar */
#productModal .modal-body .form-group:last-child {
    margin-bottom: 0;
}

#productModal .modal-body input[type="file"] {
    display: block;
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
}

/* Footer tombol selalu berada di bawah */
#productModal .modal-footer {
    position: relative;
    flex: 0 0 auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    padding: 14px 22px;
    background: #fff;
    border-top: 1px solid var(--line);
    box-sizing: border-box;
    z-index: 2;
}

#productModal .modal-footer button {
    flex: 0 0 auto;
    min-width: 90px;
    min-height: 42px;
    margin: 0;
}

/* Input tidak keluar dari lebar modal */
#productModal .modal-body input:not([type="file"]),
#productModal .modal-body select,
#productModal .modal-body textarea {
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
}

@media (max-width: 600px) {
    #productModal {
        padding: 8px;
    }

    #productModal .modal {
        width: calc(100vw - 16px);
        height: calc(100vh - 16px);
        height: calc(100dvh - 16px);
    }

    #productModal .modal-header {
        padding: 16px;
    }

    #productModal .modal-body {
        padding: 16px;
    }

    #productModal .modal-footer {
        padding: 12px 16px;
        gap: 8px;
    }
}
}

.products-page .icon-button {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border: 0;
    background: transparent;
    color: #758195;
    padding: 7px;
    border-radius: 5px;
}
.products-page .icon-button svg {
    width: 18px;
    height: 18px;
}

    

        /* ===== FORM TAMBAH/EDIT PRODUK & LAYANAN ===== */
.product-form-page .page-top {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 24px;

        }

.product-form-page .page-heading {
            display: block;
            margin-bottom: 0;
        }
        
.product-form-page .page-heading h1 {

            margin: 0 0 8px;

            font-size: 28px;

            font-weight: 700;

            color: var(--text);

        }

.product-form-page .page-heading p {

            margin: 0;

            color: var(--muted);

            font-size: 13px;

            line-height: 1.6;

        }

.product-form-page .breadcrumb-back {

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

.product-form-page .breadcrumb-back:hover { background: var(--red-dark); }

.product-form-page .form-card {

            background: white;

            border: 1px solid #edf0f4;

            border-radius: 10px;

            box-shadow: 0 3px 15px #202e4010;

            overflow: hidden;

        }

.product-form-page .form-card-header {

            padding: 22px 25px;

            border-bottom: 1px solid var(--line);

        }

.product-form-page .form-card-header h2 {

            margin: 0 0 7px;

            font-size: 16px;

        }

.product-form-page .form-card-header p {

            margin: 0;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.6;

        }

.product-form-page .form-body { padding: 25px; }

.product-form-page .section-title {

            margin: 0 0 20px;

            padding-bottom: 12px;

            border-bottom: 1px solid var(--line);

            font-size: 14px;

            font-weight: 700;

        }

.product-form-page .section-title:not(:first-child) { margin-top: 12px; }

.product-form-page .form-grid {

            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            column-gap: 20px;

        }

.product-form-page .form-group {

            min-width: 0;

            margin-bottom: 20px;

        }

.product-form-page .form-group.full { grid-column: 1 / -1; }

.product-form-page .form-group label {

            display: block;

            margin-bottom: 9px;

            font-size: 12px;

            font-weight: 700;

        }

.product-form-page .required-star { color: var(--red); margin-left: 3px; }

.product-form-page .form-control {

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

.product-form-page .form-control::placeholder { color: #a3adba; }

.product-form-page .form-control:focus {

            border-color: var(--red);

            box-shadow: 0 0 0 3px #e5092014;

        }

.product-form-page select.form-control { cursor: pointer; }

.product-form-page textarea.form-control {

            min-height: 115px;

            resize: vertical;

            line-height: 1.6;

        }

.product-form-page input[type="file"].form-control { padding: 9px; }

.product-form-page .form-help {

            display: block;

            margin-top: 7px;

            color: #929cab;

            font-size: 11px;

            line-height: 1.6;

        }

.product-form-page .error-message {

            margin-top: 6px;

            color: var(--red);

            font-size: 11px;

        }

.product-form-page .alert-error {

            margin-bottom: 22px;

            padding: 14px 17px;

            border: 1px solid #f5c4ca;

            border-radius: 6px;

            background: #fff1f2;

            color: #b91429;

            font-size: 12px;

            line-height: 1.7;

        }

.product-form-page .alert-error ul {

            margin: 6px 0 0;

            padding-left: 18px;

        }

.product-form-page .image-preview { margin-top: 12px; }

.product-form-page .image-preview .form-help { margin: 0 0 7px; }

.product-form-page .image-preview img {

            display: block;

            width: 160px;

            height: 110px;

            object-fit: cover;

            border: 1px solid var(--line);

            border-radius: 8px;

        }

.product-form-page .checkbox-group {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 14px;

            background: #f8f9fb;

            border: 1px solid var(--line);

            border-radius: 6px;

        }

.product-form-page .checkbox-group input[type="checkbox"] {

            width: 16px;

            height: 16px;

            margin: 0;

            accent-color: var(--red);

            cursor: pointer;

        }

.product-form-page .checkbox-group label {

            margin: 0;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

        }

.product-form-page .form-footer {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 12px;

            padding: 18px 25px;

            background: #fcfcfd;

            border-top: 1px solid var(--line);

        }

.product-form-page .btn {

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

.product-form-page .btn-primary { background: var(--red); color: white; }

.product-form-page .btn-primary:hover { background: var(--red-dark); }

.product-form-page .btn-outline {

            background: white;

            border-color: #dce2e9;

            color: #526072;

        }

.product-form-page .btn-outline:hover { background: #f5f7fa; }

.product-form-page .btn:disabled { opacity: .6; cursor: not-allowed; }

@media (min-width: 701px) and (max-width: 860px) {
    .product-form-page .form-grid { grid-template-columns: 1fr; }
    .product-form-page .form-group.full { grid-column: auto; }
    .product-form-page .page-heading h1 { font-size: 24px; }
}
@media (max-width: 700px) {
    .product-form-page .page-top { flex-direction: column; gap: 14px; }
    .product-form-page .page-heading h1 { font-size: 22px; }
    .product-form-page .breadcrumb-back { width: 100%; }
    .product-form-page .form-card-header,
    .product-form-page .form-body { padding: 18px 15px; }
    .product-form-page .form-grid { grid-template-columns: 1fr; }
    .product-form-page .form-group.full { grid-column: auto; }
    .product-form-page .form-footer {
        padding: 14px 15px;
        flex-direction: column-reverse;
        align-items: stretch;
    }
    .product-form-page .form-footer .btn { width: 100%; }
    .product-form-page .form-control { font-size: 16px; }
    .product-form-page .image-preview img {
        width: 100%; max-width: 220px; height: auto; aspect-ratio: 16 / 11;
    }
    .product-form-page .checkbox-group { align-items: flex-start; }
    .product-form-page .checkbox-group input[type="checkbox"] { margin-top: 2px; }
}
@media (max-width: 400px) {
    .product-form-page .page-heading h1 { font-size: 20px; }
    .product-form-page .btn,
    .product-form-page .breadcrumb-back { font-size: 11px; padding: 10px 12px; }
}


    

/* Ajustes de presisi halaman form Produk & Layanan */
.product-form-page {
    width: 100%;
    min-width: 0;
}
.product-form-page .page-top {
    align-items: flex-start;
}
.product-form-page .form-card {
    width: 100%;
}
.product-form-page .form-body > .section-title + .form-grid {
    margin-top: 0;
}
.product-form-page .form-group input,
.product-form-page .form-group select,
.product-form-page .form-group textarea {
    min-width: 0;
}
.product-form-page .form-footer .btn {
    min-width: 130px;
}
@media (max-width: 700px) {
    .product-form-page .form-footer {
        flex-direction: column-reverse;
    }
    .product-form-page .form-footer .btn {
        width: 100%;
    }
}


        /* ===== PENGATURAN GLOBAL: hanya halaman ini ===== */
        .global-settings-page { width:100%; min-width:0; color:#222; font-family:Arial,sans-serif; }
        .global-settings-page .page-header { margin-bottom:26px; }
        .global-settings-page .page-header h1 { margin:0 0 8px; font-size:28px; color:#222; letter-spacing:normal; }
        .global-settings-page .page-header p { margin:0; color:#6b7280; line-height:1.6; font-size:13px; }
        .global-settings-page .settings-card { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:24px; margin-bottom:24px; }
        .global-settings-page .settings-card h2 { margin:0 0 8px; font-size:20px; color:#222; }
        .global-settings-page .settings-card .description { margin:0 0 22px; color:#6b7280; line-height:1.6; font-size:13px; }
        .global-settings-page .form-group { margin-bottom:18px; }
        .global-settings-page .form-group label { display:block; margin-bottom:8px; font-weight:600; font-size:14px; }
        .global-settings-page .form-group input,
        .global-settings-page .form-group textarea { display:block; width:100%; padding:12px 14px; border:1px solid #d1d5db; border-radius:8px; font:inherit; background:#fff; color:#222; }
        .global-settings-page .form-group textarea { min-height:100px; resize:vertical; }
        .global-settings-page .form-group input:focus,
        .global-settings-page .form-group textarea:focus { outline:none; border-color:#e50920; box-shadow:0 0 0 3px rgba(229,9,32,.08); }
        .global-settings-page .save-button { border:none; border-radius:8px; background:#e50920; color:#fff; padding:12px 20px; font-size:14px; font-weight:600; cursor:pointer; }
        .global-settings-page .save-button:hover { background:#c9071b; }
        .global-settings-page .notice { background:#fff5f5; border:1px solid #fecdd3; border-radius:8px; padding:14px; color:#9f1239; line-height:1.6; font-size:14px; }
        .global-settings-page .alert-success { padding:14px 16px; border-radius:8px; background:#ecfdf3; color:#166534; margin-bottom:20px; }
        .global-settings-page .alert-error { padding:14px 16px; border-radius:8px; background:#fff1f2; color:#b42318; margin-bottom:20px; }
        .global-settings-page .alert-error ul { margin:8px 0 0; padding-left:20px; }
        .global-settings-page .settings-card[id] { scroll-margin-top:85px; }
        @media (max-width:600px) {
            .global-settings-page .page-header h1 { font-size:24px; }
            .global-settings-page .settings-card { padding:18px; }
            .global-settings-page .save-button { max-width:100%; }
            .global-settings-page .form-group input { font-size:16px; }
            .global-settings-page .form-group textarea { font-size:16px; }
        }



/* =========================================================
   PENGATURAN CTA — CSS khusus halaman (terisolasi)
   ========================================================= */
.cta-page { color: #202124; }
.cta-page .page-heading { margin-bottom: 28px; }
.cta-page .page-heading h1 { font-size: 28px; margin: 0 0 8px; }
.cta-page .page-heading p { color: #727782; line-height: 1.6; }
.cta-page .card {
    width: 100%; max-width: 1000px; padding: 28px; margin-bottom: 24px;
    background: #fff; border: 1px solid #eceef1; border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
}
.cta-page .card h2 { margin: 0 0 6px; font-size: 18px; }
.cta-page .card-description { margin: 0 0 24px; color: #727782; line-height: 1.6; }
.cta-page .form-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 20px; }
.cta-page .form-group label { font-size: 13px; font-weight: 700; color: #30343b; }
.cta-page .form-group input,
.cta-page .form-group textarea {
    width: 100%; min-width: 0; padding: 12px 14px; border: 1px solid #dfe2e7;
    border-radius: 7px; background: #fff; color: #202124; outline: none;
}
.cta-page .form-group textarea { min-height: 130px; resize: vertical; line-height: 1.6; }
.cta-page .form-group input:focus,
.cta-page .form-group textarea:focus {
    border-color: #c9232c; box-shadow: 0 0 0 3px rgba(201,35,44,.09);
}
.cta-page .help { margin-top: 5px; color: #858b95; font-size: 12px; line-height: 1.5; }
.cta-page .error { display: block; margin-top: 5px; color: #b4232c; font-size: 12px; }
.cta-page .alert { padding: 13px 16px; margin-bottom: 20px; border-radius: 7px; line-height: 1.5; }
.cta-page .alert.success { background: #e8f7ed; color: #176b35; }
.cta-page .alert.error,
.cta-page .alert.alert-error { background: #fee2e2; color: #991b1b; }
.cta-page .checkbox-group { display: flex; align-items: center; gap: 10px; margin: 8px 0 22px; }
.cta-page .checkbox-group input { width: 17px; height: 17px; accent-color: #c9232c; }
.cta-page .checkbox-group label { color: #30343b; font-weight: 600; }
.cta-page .btn,
.cta-page button[type="submit"] {
    display: inline-flex; align-items: center; justify-content: center;
    min-height: 42px; padding: 11px 20px; border: 0; border-radius: 7px;
    background: #c9232c; color: #fff; font-weight: 700; cursor: pointer;
}
.cta-page .btn:hover,
.cta-page button[type="submit"]:hover { background: #a71922; }
@media (max-width: 700px) {
    .cta-page .page-heading h1 { font-size: 23px; }
    .cta-page .card { padding: 20px; }
    .cta-page .btn, .cta-page button[type="submit"] { width: 100%; }
}

/* =========================================================
   PENGATURAN FOOTER — CSS khusus halaman (terisolasi)
   ========================================================= */
.footer-page { color: #202124; }
.footer-page .page-heading { margin-bottom: 28px; }
.footer-page .page-heading h1 { margin: 0 0 8px; font-size: 28px; }
.footer-page .page-heading p { color: #727782; line-height: 1.6; }
.footer-page .card {
    width: 100%; max-width: 1000px; padding: 28px; margin-bottom: 24px;
    background: #fff; border: 1px solid #eceef1; border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
}
.footer-page .card h2 { margin: 0 0 6px; font-size: 18px; }
.footer-page .card-description { margin: 0 0 24px; color: #727782; line-height: 1.6; }
.footer-page .form-grid {
    display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px;
}
.footer-page .form-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px; min-width: 0; }
.footer-page .form-group.full { grid-column: 1 / -1; }
.footer-page .form-group label { color: #30343b; font-size: 13px; font-weight: 700; }
.footer-page .form-group input,
.footer-page .form-group textarea {
    display: block; width: 100%; max-width: 100%; min-width: 0; padding: 12px 14px;
    border: 1px solid #dfe2e7; border-radius: 7px; background: #fff; color: #202124; outline: none;
}
.footer-page .form-group textarea { min-height: 100px; resize: vertical; line-height: 1.6; }
.footer-page .form-group input:focus,
.footer-page .form-group textarea:focus {
    border-color: #c9232c; box-shadow: 0 0 0 3px rgba(201,35,44,.09);
}
.footer-page .list-input { min-height: 150px; font-family: inherit; }
.footer-page .list-help { margin-top: 7px; color: #858b95; font-size: 12px; line-height: 1.5; }
.footer-page .error { display: block; margin-top: 4px; color: #b4232c; font-size: 12px; }
.footer-page .alert { padding: 13px 16px; margin-bottom: 20px; border-radius: 7px; line-height: 1.5; }
.footer-page .alert.success { background: #e8f7ed; color: #176b35; }
.footer-page .footer-alert-error { background: #fee2e2; color: #991b1b; }
.footer-page .btn,
.footer-page button[type="submit"] {
    display: inline-flex; align-items: center; justify-content: center;
    min-height: 42px; padding: 11px 20px; border: 0; border-radius: 7px;
    background: #c9232c; color: #fff; font-weight: 700; cursor: pointer;
}
.footer-page .btn:hover,
.footer-page button[type="submit"]:hover { background: #a71922; }
.footer-page .footer-preview-card { margin-top: 28px; }
.footer-page .footer-preview {
    padding: 24px; border: 1px solid #e8e9ed; border-radius: 9px; background: #f8f9fb;
    overflow-wrap: anywhere;
}
.footer-page .footer-preview h3 { margin: 0 0 12px; color: #202124; font-size: 18px; }
.footer-page .footer-preview p { margin: 7px 0 0; color: #5f6671; line-height: 1.6; }
.footer-page .footer-preview .footer-preview-spaced { margin-top: 18px; }
@media (max-width: 700px) {
    .footer-page .page-heading h1 { font-size: 23px; }
    .footer-page .card { padding: 20px; }
    .footer-page .form-grid { grid-template-columns: minmax(0, 1fr); gap: 0; }
    .footer-page .btn, .footer-page button[type="submit"] { width: 100%; }
}


/* =========================================================
   FIX MENU PENGATURAN GLOBAL DI HP
   Saat grup "Pengaturan Global" terbuka, menu atas dibuat
   turun ke baris baru, sehingga submenu (Pengaturan CTA,
   Footer, Detail Layanan) tampil penuh di bawahnya.
   Saat grup tertutup, menu tetap satu baris yang bisa digeser.
   ========================================================= */
@media (max-width: 700px) {

    /* pastikan atribut hidden tetap menyembunyikan submenu saat tertutup */
    .sidebar .nav-submenu[hidden] {
        display: none !important;
    }

    /* menu boleh turun ke baris baru saat grup terbuka */
    .sidebar .nav-list:has(.nav-toggle[aria-expanded="true"]) {
        flex-wrap: wrap;
        overflow: visible;
        padding-bottom: 0;
    }

    /* tombol Pengaturan Global tetap ikut berderet dengan menu lain */
    .sidebar .nav-list:has(.nav-toggle[aria-expanded="true"]) .nav-group {
        display: contents;
    }

    /* submenu tampil di baris sendiri selebar layar */
    .sidebar .nav-list:has(.nav-toggle[aria-expanded="true"]) .nav-submenu {
        flex: 0 0 100%;
        width: 100%;
        flex-wrap: wrap;
        gap: 6px;
        padding: 4px 0 6px;
    }

    .sidebar .nav-list:has(.nav-toggle[aria-expanded="true"]) .nav-subitem {
        flex: 0 0 auto;
        width: auto;
        min-height: 36px;
        white-space: nowrap;
    }
}

    </style>

    {{-- CSS khusus halaman --}}
    @stack('styles')
</head>

<body>
<div class="app" id="app">

    @include('admin.partials.sidebar')

    <main class="main">

        <header class="topbar">
            <div class="topbar-left">
                <button
                    type="button"
                    class="menu-toggle"
                    id="menuToggle"
                    aria-label="Buka atau tutup menu"
                >
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="breadcrumb">
                    CMS ADK
                    <span class="sep">/</span>
                    @hasSection('breadcrumb_parent')
                        @yield('breadcrumb_parent')
                        <span class="sep">/</span>
                    @endif
                    <strong>@yield('breadcrumb')</strong>
                </div>
            </div>

            <div class="topbar-right">
                <button type="button" class="notif" aria-label="Notifikasi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>
                    <span class="notif-dot"></span>
                </button>

                <div class="avatar">A</div>
                <span class="admin-name">Admin</span>

                <span class="admin-chevron" aria-hidden="true">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="m7 10 5 5 5-5"/>
                    </svg>
                </span>
            </div>
        </header>

        <section class="content">
            @yield('content')
        </section>

    </main>
</div>

<script>
    // Tombol hamburger: buka/tutup sidebar
    document.getElementById('menuToggle').addEventListener('click', function () {
        document.getElementById('app').classList.toggle('sidebar-collapsed');
    });
</script>

{{-- JavaScript khusus halaman --}}
@stack('scripts')
</body>
</html>