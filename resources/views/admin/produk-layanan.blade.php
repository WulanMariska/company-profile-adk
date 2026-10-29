@php
    $editProduct = null;

    if (session('editProductId')) {
        $editProduct = \App\Models\ProductService::find(
            session('editProductId')
        );
    }
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk & Layanan - CMS ADK</title>

    <style>
   * {
            box-sizing: border-box;
        }

        :root {
            --red: #e50920;
            --sidebar: #101820;
            --text: #263445;
            --muted: #8793a3;
            --line: #e9edf2;
            --bg: #f5f7fa;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: var(--bg);
            font-size: 13px;
        }

        button, input, select {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 225px;
            background: var(--sidebar);
            color: #c7d0dc;
            min-height: 100vh;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

      .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90px;
            padding: 8px 0 16px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
            overflow: hidden;
        }

     .brand img {

            width: 145px;

            height: 65px;

            object-fit: contain;

            max-width: 100%}

        .brand-mark {
            font-size: 32px;
            font-weight: 900;
            letter-spacing: -3px;
            color: white;
            font-style: italic;
        }

        .brand-mark span {
            color: var(--red);
        }

        .brand-name {
            margin-top: 5px;
            font-size: 9px;
            letter-spacing: 2px;
            color: #d0d6df;
        }

        .nav-label {
            color: #728092;
            font-size: 10px;
            padding: 0 12px;
            margin: 8px 0 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 12px;
            margin-bottom: 5px;
            border: 0;
            border-radius: 5px;
            color: #c7d0dc;
            background: transparent;
            text-decoration: none;
            text-align: left;
            font-size: 12px;
        }

        .nav-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .nav-item:hover {
            background: #202a35;
            color: white;
        }

        .nav-item.active {
            background: var(--red);
            color: white;
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #27313b;
            padding: 18px 10px 0;
            color: #8190a1;
            font-size: 10px;
            line-height: 1.7;
        }

     
       
/* MAIN CONTENT */
.main {
    flex: 1;
    width: auto;
    min-width: 0;
    margin-left: 0;
}

/* TOP NAVBAR */
.topbar {
    width: 100%;
    height: 64px;
    padding: 0 30px;
    background: #fff;
    border-bottom: 1px solid var(--line);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* CONTENT AREA */
.content {
    width: 100%;
    max-width: none;
    margin: 0;
    padding: 30px;
}

/* RESPONSIVE */

@media (max-width: 1050px) and (min-width: 701px) {
    .content {
        padding: 23px 18px;
    }

    .topbar {
        padding: 0 18px;
    }
}

@media (max-width: 700px) {
    .app {
        display: block;
    }

    .sidebar {
        width: 100%;
        min-height: auto;
    }

       .main {
        width: 100%;
        margin-left: 0;
    }

    .content {
        padding: 21px 12px;
    }
 .topbar {
        height: 55px;
        padding: 0 14px;
    }
}


       /* NAVBAR */
            .topbar {
                width: 100%;
                height: 64px;
                padding: 0 24px;
                background: #ffffff;
                border-bottom: 1px solid var(--line);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .icon-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 0;
            background: transparent;
            color: #758195;
            padding: 7px;
            border-radius: 5px;
        }

        .icon-button svg {
            width: 18px;
            height: 18px;
        }

        .breadcrumb {
            color: #8a95a5;
            font-size: 11px;
        }

        .breadcrumb strong {
            color: #374355;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification {
            position: relative;
        }

        .notification::after {
            content: "";
            position: absolute;
            top: 3px;
            right: 3px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--red);
        }

        .avatar {
            width: 29px;
            height: 29px;
            display: grid;
            place-items: center;
            background: #fce4e7;
            color: #b91429;
            border-radius: 50%;
            font-weight: 700;
        }

        .admin-name {
            font-size: 11px;
            font-weight: 700;
        }

      /* AREA KONTEN */
        .content {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 26px 24px;
        }


       /* JUDUL HALAMAN */
        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 9px;
            font-size: 25px;
            letter-spacing: -0.7px;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .btn {
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

        .btn svg {
            width: 16px;
            height: 16px;
        }

        .btn-primary {
            background: var(--red);
            color: white;
            box-shadow: 0 3px 8px #e5092020;
        }

        .btn-primary:hover {
            background: #c9081b;
        }

        .btn-outline {
            background: white;
            border-color: #dce2e9;
            color: #526072;
        }

     /* PANEL PRODUK & LAYANAN */
        .panel {
            width: 100%;
            min-width: 0;
            background: #ffffff;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
        }

        .tabs {
            display: flex;
            align-items: center;
            gap: 28px;
            padding: 0 23px;
            border-bottom: 1px solid var(--line);
        }

        .tab {
            position: relative;
            border: 0;
            padding: 18px 2px;
            background: transparent;
            color: #7f8998;
            font-weight: 600;
        }

        .tab.active {
            color: var(--red);
        }

        .tab.active::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--red);
        }

        .toolbar {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 23px;
        }

        .search {
            flex: 1;
            position: relative;
            min-width: 140px;
        }

        .search svg {
            width: 17px;
            height: 17px;
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #98a3b1;
        }

        .search input,
        .toolbar select {
            width: 100%;
            height: 39px;
            border: 1px solid #e1e6ed;
            border-radius: 5px;
            outline: none;
            background: white;
            color: #4c596b;
        }

        .search input {
            padding: 0 12px 0 38px;
        }

        .search input:focus,
        .toolbar select:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .toolbar select {
            width: 180px;
            padding: 0 10px;
        }

        .view-toggle {
            display: flex;
            gap: 4px;
        }

        .view-toggle button {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border: 1px solid #e1e6ed;
            border-radius: 5px;
            background: white;
            color: #8a95a5;
        }

        .view-toggle button.selected {
            color: var(--red);
            background: #fff5f6;
            border-color: #f5c4ca;
        }

        /* TABLE */

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        thead {
            background: #f8f9fb;
        }

        th {
            padding: 14px 20px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            color: #7b8797;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 13px 20px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
            font-size: 12px;
        }

        tbody tr:hover {
            background: #fcfcfd;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .product-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
        }

        .product-thumb {
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

        .product-thumb svg {
            width: 25px;
            height: 25px;
        }

        .product-name {
            font-weight: 700;
            color: #354255;
        }

        .product-description {
            color: #9aa3af;
            font-size: 10px;
            margin-top: 5px;
        }

        .category {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 4px;
            background: #f0f3f7;
            color: #657286;
            font-size: 10px;
        }

        .status {
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

        .status::before {
            content: "";
            width: 5px;
            height: 5px;
            background: currentColor;
            border-radius: 50%;
        }

        .date {
            color: #8994a4;
            font-size: 11px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            display: grid;
            place-items: center;
            width: 29px;
            height: 29px;
            border: 1px solid #e7ebf0;
            background: white;
            border-radius: 5px;
            color: #788496;
        }

        .action-btn svg {
            width: 14px;
            height: 14px;
        }

        .action-btn:hover {
            background: #f5f7fa;
        }

        .action-btn.delete {
            color: var(--red);
        }

        .table-footer {
            padding: 16px 23px;
            border-top: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            color: #8994a4;
            font-size: 11px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .page-btn {
            min-width: 29px;
            height: 29px;
            border: 1px solid #e2e7ed;
            border-radius: 4px;
            background: white;
            color: #657286;
        }

        .page-btn.active {
            color: white;
            background: var(--red);
            border-color: var(--red);
        }

        
        /* PERBAIKAN PAGINATION LARAVEL */
        .table-footer nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
            min-width: 0;
        }

        /* Sembunyikan navigasi Previous/Next versi mobile */
        .table-footer nav > div:first-child {
            display: none !important;
        }

        /* Rapikan navigasi nomor halaman */
        .table-footer nav > div:last-child {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            width: 100%;
            min-width: 0;
        }

        .table-footer nav > div:last-child > div {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-footer nav a,
        .table-footer nav span {
            font-size: 11px;
        }

        .table-footer nav svg {
            width: 16px !important;
            height: 16px !important;
            max-width: 16px;
            max-height: 16px;
        }

        .table-footer nav a {
            text-decoration: none;
        }


        .empty {
            display: none;
            padding: 35px;
            text-align: center;
            color: #8b96a5;
        }

        /* MODAL */

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            place-items: center;
            padding: 16px;
            background: #11182080;
        }

        .modal-backdrop.open {
            display: grid;
        }

        .modal {
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

        #productForm {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
            overflow: hidden;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid var(--line);
            flex-shrink: 0;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 17px;
        }

        .modal-body {
            padding: 22px;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1;
            min-height: 0;
        }

        .form-group {
            margin-bottom: 16px;
            min-width: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 12px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
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

        .form-group input[type="file"] {
            padding: 10px;
            background: #fff;
            font-size: 12px;
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #e88b96;
        }

        .form-help {
            display: block;
            margin-top: 6px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .modal-footer {
            flex-shrink: 0;
            padding: 14px 22px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            border-top: 1px solid var(--line);
            background: white;
        }

        /* RESPONSIVE */

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

                    /* SIDEBAR TETAP DIAM SAAT KONTEN DI-SCROLL */
            .app {
                min-height: 100vh;
                align-items: stretch;
            }

            .sidebar {
                position: sticky;
                top: 0;
                align-self: flex-start;
                height: 100vh;
                flex-shrink: 0;
                overflow-y: auto;
            }

           
                .main {
                    flex: 1;
                    width: auto;
                    min-width: 0;
                    margin-left: 0;
            }

          }

        
/* ===== PERBAIKAN LAYOUT UTAMA CMS ===== */

/* Sidebar fixed, jadi konten harus menyediakan ruang untuknya */
@media (min-width: 701px) {
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 225px;
        height: 100vh;
        min-height: 0;
        overflow-y: auto;
        z-index: 1000;
    }

    .main {
        display: block;
        flex: none;
        width: calc(100% - 225px);
        min-width: 0;
        margin-left: 225px;
    }

    .topbar {
        width: 100%;
        box-sizing: border-box;
        padding: 0 30px;
    }

    .content {
        width: 100%;
        max-width: none;
        box-sizing: border-box;
        margin: 0;
        padding: 30px;
    }
}

/* Tablet: sesuaikan ruang sidebar */
@media (min-width: 701px) and (max-width: 1050px) {
    .sidebar {
        width: 190px;
    }

    .main {
        width: calc(100% - 190px);
        margin-left: 190px;
    }

    .topbar {
        padding: 0 18px;
    }

    .content {
        padding: 23px 18px;
    }
}

/* Mobile: sidebar kembali ke alur normal */
@media (max-width: 700px) {
    .app {
        display: block;
    }

    .sidebar {
        position: relative;
        inset: auto;
        width: 100%;
        height: auto;
        min-height: auto;
    }

    .main {
        display: block;
        width: 100%;
        min-width: 0;
        margin-left: 0;
    }

    .topbar {
        width: 100%;
        height: 55px;
        padding: 0 14px;
    }

    .content {
        width: 100%;
        padding: 21px 12px;
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
<div class="app">

  
@include('admin.partials.sidebar')


    <main class="main">
        <header class="topbar">
            <div class="topbar-left">
                <button class="icon-button" aria-label="Menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>

                <div class="breadcrumb">
                    CMS ADK &nbsp; / &nbsp; <strong>Produk &amp; Layanan</strong>
                </div>
            </div>

            <div class="topbar-right">
                <button class="icon-button notification" aria-label="Notifikasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>
                </button>

                                
                            
                <div class="avatar" style="
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 34px;
                    height: 34px;
                    min-width: 34px;
                    flex: 0 0 34px;
                    border-radius: 50%;
                    background: #fce4e7;
                    color: #b91429;
                    font-size: 13px;
                    font-weight: 700;
                ">A</div>

                <span class="admin-name">Admin</span>

                <svg class="admin-chevron"
                    viewBox="0 0 24 24"
                    width="14"
                    height="14"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    aria-hidden="true">
                    <path d="m7 10 5 5 5-5"/>
                </svg>

                


            </div>
        </header>

        <section class="content">
            <div class="page-heading">
                <div>
                    <h1>Produk &amp; Layanan</h1>
                    <p>Kelola data produk dan layanan perusahaan Anda.</p>
                </div>

                <button class="btn btn-primary" id="addButton">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Tambah Produk &amp; Layanan
                </button>
            </div>

            <section class="panel">
                <div class="tabs" role="tablist">
                    <button class="tab active" data-tab="Semua">Semua</button>
                    <button class="tab" data-tab="Produk">Produk</button>
                    <button class="tab" data-tab="Layanan">Layanan</button>
                </div>

                <div class="toolbar">
                    <label class="search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m16 16 4 4"/>
                        </svg>
                        <input id="searchInput" type="search" placeholder="Cari produk atau layanan...">
                    </label>

                    <select id="categoryFilter" aria-label="Filter kategori">
                        <option value="">Semua Kategori</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Peralatan">Peralatan</option>
                    </select>

                    <div class="view-toggle">
                        <button class="selected" aria-label="Tampilan tabel">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 5h16M4 10h16M4 15h16M4 20h16"/>
                            </svg>
                        </button>
                        <button aria-label="Tampilan grid">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="4" y="4" width="6" height="6" rx="1"/>
                                <rect x="14" y="4" width="6" height="6" rx="1"/>
                                <rect x="4" y="14" width="6" height="6" rx="1"/>
                                <rect x="14" y="14" width="6" height="6" rx="1"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>GAMBAR</th>
                            <th>NAMA</th>
                            <th>KATEGORI</th>
                            <th>STATUS</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>AKSI</th>
                        </tr>
                        </thead>

<tbody id="productTable">
    @forelse ($productsServices as $item)
        <tr
            data-type="{{ ucfirst($item->type) }}"
            data-category="{{ $item->category ?? 'Lainnya' }}"
        >
                    
            <td>
                <div class="product-thumb">
                    @if ($item->card_image)
                        <img
                            src="{{ asset('storage/' . $item->card_image) }}"
                            alt="{{ $item->name }}"
                            style="width:100%; height:100%; object-fit:cover; display:block;"
                        >
                    @else
                        <svg viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5">
                            <rect x="4" y="4" width="16" height="16" rx="3"/>
                            <path d="M8 9h8M8 12h8M8 15h5"/>
                        </svg>
                    @endif
                </div>
            </td>


            <td>
                <div class="product-cell">
                    <div>
                        <div class="product-name">
                            {{ $item->name }}
                        </div>
                        <div class="product-description">
                            {{ $item->short_description ?? '-' }}
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <span class="category">
                    {{ $item->category ?? 'Lainnya' }}
                </span>
            </td>

            <td>
                <span class="status">
                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
            </td>

            <td class="date">
                {{ $item->created_at?->format('d M Y') ?? '-' }}
            </td>

            <td>
                <div class="actions">
                    <a href="{{ route('cms.products-services.edit', $item->id) }}"
                       class="action-btn edit" aria-label="Edit {{ $item->name }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                        </svg>
                    </a>

                    <form action="{{ route('cms.products-services.destroy', $item->id) }}"
                          method="POST" onsubmit="return confirm('Hapus {{ $item->name }}?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete" aria-label="Hapus {{ $item->name }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
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
            <td colspan="6" style="text-align: center; padding: 30px;">
                Belum ada data produk atau layanan.
            </td>
        </tr>
    @endforelse
</tbody>

                    </table>

                    <div class="empty" id="emptyState">
                        Tidak ada produk atau layanan yang cocok dengan pencarian.
                    </div>
                </div>

                <div class="table-footer">
                    <span id="resultCount">
                        Menampilkan {{ $productsServices->count() }} dari {{ $productsServices->total() }} data
                    </span>
                    {{ $productsServices->links() }}
                </div>
            </section>
        </section>
    </main>
</div>

<!-- MODAL TAMBAH / EDIT -->
<div class="modal-backdrop" id="productModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="modalTitle">Tambah Produk &amp; Layanan</h2>
            <button class="icon-button" id="closeModal" aria-label="Tutup">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        </div>

        @if ($errors->any())
            <div style="background:#fdecea;color:#b91429;padding:12px;border-radius:6px;margin:16px 22px 0;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form id="productForm"
         action="{{ route('cms.products-services.store') }}"
            method="POST"
                enctype="multipart/form-data">
            @csrf

    <div class="modal-body">
        <div class="form-group">
            <label for="itemName">Nama produk atau layanan</label>
            <input id="itemName"
                    name="name"
                    type="text"
                    required
                    placeholder="Contoh: Sepeda Motor Baru">
                   
        </div>

                <div class="form-group">
                    <label for="itemType">Jenis</label>
                    <select id="itemType" name="type" required>
                        <option value="Produk">Produk</option>
                        <option value="Layanan">Layanan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="itemCategory">Kategori</label>
                    <input
                        id="itemCategory"
                        name="category"
                        type="text"
                        list="categoryOptions"
                        placeholder="Ketik atau pilih kategori..."
                        autocomplete="off"
                        required
                    >
                    <datalist id="categoryOptions">
                        <option value="Kendaraan"></option>
                        <option value="Elektronik"></option>
                        <option value="Teknologi"></option>
                        <option value="Peralatan"></option>
                        <option value="Furniture dan Interior"></option>
                        <option value="Olahraga"></option>
                        <option value="Fotografi dan Barang Optik"></option>
                        <option value="Mesin Pendingin"></option>
                        <option value="Pertanian"></option>
                    </datalist>
                </div>

                                
                <div class="form-group">
                    <label for="itemDescription">Deskripsi singkat</label>
                    <textarea
                        id="itemDescription"
                        name="short_description"
                        placeholder="Masukkan deskripsi singkat untuk card produk..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="itemFullDescription">Deskripsi lengkap</label>
                    <textarea
                        id="itemFullDescription"
                        name="description"
                        rows="6"
                        placeholder="Masukkan deskripsi lengkap untuk halaman detail..."
                    ></textarea>
                    <small class="form-help">
                        Deskripsi ini digunakan pada halaman detail produk atau layanan.
                    </small>
                </div>

                <div class="form-group">
                    <label for="detailSectionTitle">Judul bagian detail</label>
                    <input
                        id="detailSectionTitle"
                        type="text"
                        name="detail_section_title"
                        placeholder="Contoh: Deskripsi & Ruang Lingkup Pasokan"
                    >
                </div>

                <div class="form-group">
                    <label for="detailIntro">Paragraf pembuka detail</label>
                    <textarea
                        id="detailIntro"
                        name="detail_intro"
                        rows="4"
                        placeholder="Masukkan paragraf pembuka bagian detail..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label>Card Detail 1</label>
                    <input
                        type="text"
                        name="feature_1_title"
                        placeholder="Judul card 1"
                    >
                    <textarea
                        name="feature_1_description"
                        rows="3"
                        placeholder="Deskripsi card 1..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label>Card Detail 2</label>
                    <input
                        type="text"
                        name="feature_2_title"
                        placeholder="Judul card 2"
                    >
                    <textarea
                        name="feature_2_description"
                        rows="3"
                        placeholder="Deskripsi card 2..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label>Card Detail 3</label>
                    <input
                        type="text"
                        name="feature_3_title"
                        placeholder="Judul card 3"
                    >
                    <textarea
                        name="feature_3_description"
                        rows="3"
                        placeholder="Deskripsi card 3..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label>Card Detail 4</label>
                    <input
                        type="text"
                        name="feature_4_title"
                        placeholder="Judul card 4"
                    >
                    <textarea
                        name="feature_4_description"
                        rows="3"
                        placeholder="Deskripsi card 4..."
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="itemImage">Gambar Produk atau Layanan</label>
                    <input
                        id="itemImage"
                        name="card_image"
                        type="file"
                        accept=".jpg,.jpeg,.png,.webp"
                    >
                    <small class="form-help">
                        Format JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                    </small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="cancelModal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const rows = [...document.querySelectorAll('#productTable tr')];
    const tabs = [...document.querySelectorAll('.tab')];

    let currentTab = 'Semua';

    function filterRows() {
        const keyword = searchInput.value.toLowerCase().trim();
        const category = categoryFilter.value;
        let visible = 0;

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesKeyword = text.includes(keyword);
            const matchesCategory = !category ||
                row.dataset.category === category;
            const matchesTab = currentTab === 'Semua' ||
                row.dataset.type === currentTab;

            const show = matchesKeyword && matchesCategory && matchesTab;
            row.style.display = show ? '' : 'none';

            if (show) visible++;
        });

        document.getElementById('emptyState').style.display =
            visible === 0 ? 'block' : 'none';

        document.getElementById('resultCount').textContent =
            `Menampilkan ${visible} data contoh`;
    }

    searchInput.addEventListener('input', filterRows);
    categoryFilter.addEventListener('change', filterRows);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(item => item.classList.remove('active'));
            tab.classList.add('active');
            currentTab = tab.dataset.tab;
            filterRows();
        });
    });

    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const addButton = document.getElementById('addButton');
    const modalTitle = document.getElementById('modalTitle');
    const storeUrl = @json(route('cms.products-services.store'));

    function openModal(title = 'Tambah Produk & Layanan') {
        form.reset();
        form.action = storeUrl;

        // Hapus method PUT saat membuka form tambah.
        form.querySelector('input[name="_method"]')?.remove();

        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = false;
        submitButton.textContent = 'Simpan';

        modalTitle.textContent = title;
        modal.classList.add('open');
    }

    function openEditModal(product) {
        openModal('Edit Produk & Layanan');

        // Route update menggunakan PUT melalui method spoofing Laravel.
        form.action = `${storeUrl}/${product.id}`;

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        form.appendChild(methodInput);

        const fields = [
            'name', 'type', 'category',
            'short_description', 'description',
            'detail_section_title', 'detail_intro',
            'feature_1_title', 'feature_1_description',
            'feature_2_title', 'feature_2_description',
            'feature_3_title', 'feature_3_description',
            'feature_4_title', 'feature_4_description'
        ];

        fields.forEach(name => {
            const input = form.elements.namedItem(name);
            if (!input) return;

            let value = product[name] ?? '';
            if (name === 'type' && value) {
                value = value.charAt(0).toUpperCase() + value.slice(1).toLowerCase();
            }
            input.value = value;
        });
    }

    function closeModal() {
        modal.classList.remove('open');
    }

    addButton.addEventListener('click', () => openModal());
    document.getElementById('closeModal').addEventListener('click', closeModal);
    document.getElementById('cancelModal').addEventListener('click', closeModal);

    modal.addEventListener('click', event => {
        if (event.target === modal) closeModal();
    });

    document.querySelectorAll('.view-toggle button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.view-toggle button')
                .forEach(item => item.classList.remove('selected'));
            button.classList.add('selected');
        });
    });

    form.addEventListener('submit', () => {
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Menyimpan...';
    });

    @if (isset($editProduct) && $editProduct)
        openEditModal(@json($editProduct));
    @elseif ($errors->any())
        modal.classList.add('open');
    @endif
    </script>
</body>
</html>