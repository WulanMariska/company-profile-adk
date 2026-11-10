<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Produk & Layanan - CMS ADK</title>

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

        /* SUMMARY */

        .summary-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 22px;
            margin-bottom: 22px;
            background: var(--white);
            border: 1px solid #edf0f4;
            border-radius: 10px;
            box-shadow: 0 3px 15px #202e4010;
        }

        .summary-label {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 7px;
        }

        .summary-number {
            font-size: 26px;
            font-weight: 700;
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            background: #fce4e7;
            color: var(--red);
            border-radius: 10px;
            font-size: 22px;
        }

        /* MAIN CARD */

        .card {
            width: 100%;
            background: var(--white);
            border: 1px solid #edf0f4;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 3px 15px #202e4010;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 16px;
        }

        .card-header p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        /* SEARCH */

        .table-tools {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .search-box {
            width: 100%;
            max-width: 320px;
        }

        .search-box input {
            width: 100%;
            min-height: 43px;
            padding: 10px 13px;
            border: 1px solid #dfe5ec;
            border-radius: 6px;
            outline: none;
            font-size: 13px;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .search-box input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px #e5092014;
        }

        .result-count {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        /* TABLE */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 9px;
        }

        table {
            width: 100%;
            min-width: 980px;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fb;
        }

        th {
            padding: 15px 13px;
            color: #7b8ba0;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3px;
            text-transform: uppercase;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 17px 13px;
            border-top: 1px solid var(--line);
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fcfcfd;
        }

        .number-cell {
            width: 55px;
            color: var(--muted);
        }

        .product-name {
            min-width: 260px;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.4;
        }

        .category-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background: #eef1f6;
            color: #526072;
            font-size: 11px;
            white-space: nowrap;
        }

        .date-cell {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        .type-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #f1f1f1;
            color: #444;
            font-size: 11px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
            flex-shrink: 0;
        }

        .status-active {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-inactive {
            background: #fee2e2;
            color: #dc2626;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-group form {
            margin: 0;
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
            background: var(--white);
            color: #7b8ba0;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, border-color .2s, color .2s;
        }

        .btn-icon svg {
            width: 14px;
            height: 14px;
        }

        .btn-icon:hover {
            background: #f1f4f8;
            color: var(--black);
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

        .empty-state {
            padding: 35px 15px;
            color: var(--muted);
            text-align: center;
        }

        /* ALERT */

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
        }

        /* FOOTER TABEL + PAGINATION */

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin: 0;
        }

        .pagination nav {
            display: flex;
        }

        /* tombol prev/next versi mobile bawaan Laravel */
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
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: var(--muted);
            text-decoration: none;
            font-size: 12px;
        }

        .pagination nav a:hover {
            background: #f1f4f8;
            color: var(--black);
        }

        .pagination nav span[aria-current="page"] > span {
            color: var(--black);
            font-weight: 700;
        }

        .pagination nav svg {
            width: 14px;
            height: 14px;
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

            .summary-card { padding: 16px; }

            .card { padding: 17px 13px; }

            .card-header { align-items: flex-start; }

            .table-tools {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-box { max-width: none; }

            /* cegah auto-zoom di iPhone saat fokus ke input */
            .search-box input { font-size: 16px; }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .pagination {
                justify-content: flex-start;
                overflow-x: auto;
                max-width: 100%;
            }
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
                    <strong>Detail Layanan</strong>
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

                <h1>Detail Produk & Layanan</h1>

                <p>
                    Kelola konten halaman detail seluruh produk dan layanan
                    PT. Ari Dharma Kanti.
                </p>

            </div>

            <!-- SUCCESS MESSAGE -->
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- SUMMARY -->
            <section class="summary-card">

                <div>
                    <p class="summary-label">
                        Total Produk & Layanan
                    </p>

                    <div class="summary-number">
                        {{ $productsServices->total() }}
                    </div>
                </div>

                <div class="summary-icon">
                    ✦
                </div>

            </section>

            <!-- DATA TABLE -->
            <section class="card">

                <div class="card-header">

                    <div>
                        <h2>Daftar Produk & Layanan</h2>

                        <p>
                            Pilih data untuk mengelola konten halaman detailnya.
                        </p>
                    </div>

                </div>

                <div class="table-tools">

                    <div class="search-box">
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari nama produk atau layanan..."
                            autocomplete="off"
                        >
                    </div>

                </div>

                <div class="table-wrap">

                    <table id="detailTable">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Produk & Layanan</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($productsServices as $item)

                                <tr class="product-row">

                                    <td class="number-cell">
                                        {{ $productsServices->firstItem() + $loop->index }}
                                    </td>

                                    <td class="product-name">
                                        {{ $item->name }}
                                    </td>

                                    <td>
                                        <span class="type-badge">
                                            {{ $item->type }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($item->category)
                                            <span class="category-badge">
                                                {{ $item->category }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->is_active)
                                            <span class="status-badge status-active">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="status-badge status-inactive">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>

                                    <td class="date-cell">
                                        {{ optional($item->created_at)->format('d M Y') ?? '-' }}
                                    </td>

                                    <td>
                                        <div class="action-group">

                                            <a
                                                href="{{ route('cms.global-settings.detail.edit', $item->id) }}"
                                                class="btn-icon"
                                                title="Edit"
                                                aria-label="Edit"
                                            >
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 20h9"/>
                                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                                </svg>
                                            </a>

                                            <form
                                                action="{{ route('cms.global-settings.detail.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-icon btn-delete"
                                                    title="Hapus"
                                                    aria-label="Hapus"
                                                >
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 6h18"/>
                                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                                        <path d="M10 11v6M14 11v6"/>
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="empty-state">
                                        Belum ada data produk dan layanan.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- FOOTER TABEL -->
                <div class="table-footer">

                    <div class="result-count" id="resultCount">
                        Menampilkan {{ $productsServices->count() }}
                        dari {{ $productsServices->total() }} data
                    </div>

                    <div class="pagination">
                        {{ $productsServices->links() }}
                    </div>

                </div>

            </section>

        </section>

    </main>
</div>

<script>
    // Tombol hamburger: buka/tutup sidebar
    document.getElementById('menuToggle').addEventListener('click', function () {
        document.getElementById('app').classList.toggle('sidebar-collapsed');
    });

    const searchInput = document.getElementById('searchInput');
    const productRows = document.querySelectorAll('.product-row');
    const resultCount = document.getElementById('resultCount');

    if (searchInput) {
        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();

            let visibleCount = 0;

            productRows.forEach(function (row) {

                const name = row.cells[1].textContent.toLowerCase();
                const category = row.cells[3].textContent.toLowerCase();

                const match =
                    name.includes(keyword) ||
                    category.includes(keyword);

                row.style.display = match ? '' : 'none';

                if (match) {
                    visibleCount++;
                }

            });

            resultCount.textContent =
                'Menampilkan ' + visibleCount + ' data pada halaman ini';

        });
    }
</script>

</body>
</html>