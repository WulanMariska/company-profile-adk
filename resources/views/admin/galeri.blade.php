<!DOCTYPE html>

<html lang="id">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Galeri - CMS ADK</title>

        <style>

            :root {

            --red: #e50920;

            --side: #101820;

            --text: #263445;

            --muted: #8793a3;

            --line: #e9edf2;

            --bg: #f5f7fa}

            * {

            box-sizing: border-box}

            body {

            margin: 0;

            background: var(--bg);

            color: var(--text);

            font: 13px Arial, Helvetica, sans-serif}

            button, input, textarea, select {

            font: inherit}

            button {

            cursor: pointer}

            .sidebar {

            position: fixed;

            inset: 0 auto 0 0;

            z-index: 10;

            display: flex;

            flex-direction: column;

            width: 225px;

            height: 100vh;

            padding: 20px 12px;

            background: var(--side);

            color: #c7d0dc}

            .brand {

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 4px 0 25px;

            margin-bottom: 22px;

            border-bottom: 1px solid #27313b}

            .brand img {

            width: 145px;

            height: 65px;

            object-fit: contain;

            max-width: 100%}

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

        .nav-item.active {
            background: #e50920;
            color: #fff;
            font-weight: 700;
        }

        .nav-item span {
            line-height: 1.4;
        }
            .sidebar-bottom {

            margin-top: auto;

            border-top: 1px solid #27313b;

            padding: 18px 10px 0;

            color: #8190a1;

            font-size: 10px;

            line-height: 1.7}

            .sidebar-bottom strong {

            color: #e3e8ef}

            .main {

            width: calc(100% - 225px);

            min-height: 100vh;

            margin-left: 225px}

            .topbar {

            height: 64px;

            padding: 0 30px;

            background: #fff;

            border-bottom: 1px solid var(--line);

            display: flex;

            align-items: center;

            justify-content: space-between}

            .top-left, .top-right {

            display: flex;

            align-items: center;

            gap: 15px}

            .icon-btn {

            border: 0;

            background: transparent;

            color: #758195;

            padding: 7px}

            .icon-btn svg {

            width: 18px;

            height: 18px}

            .breadcrumb {

            font-size: 11px;

            color: #8a95a5}

            .breadcrumb strong {

            color: #374355}

            .notification {

            position: relative}

            .notification:after {

            content: "";

            position: absolute;

            right: 3px;

            top: 3px;

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: var(--red)}

            .avatar {

            width: 34px;

            height: 34px;

            border-radius: 50%;

            display: grid;

            place-items: center;

            background: #fce4e7;

            color: #b91429;

            font-weight: bold}

            .admin-name {

            font-size: 11px;

            font-weight: bold}

            .content {

            max-width: 1600px;

            padding: 30px;

            margin: auto}

            .heading {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 18px;

            margin-bottom: 24px}

            .heading h1 {

            font-size: 25px;

            letter-spacing: -.5px;

            margin: 0 0 8px}

            .heading p {

            margin: 0;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.6}

            .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 11px 15px;

            border: 1px solid transparent;

            border-radius: 5px;

            font-size: 12px;

            font-weight: bold;

            white-space: nowrap}

            .primary {

            background: var(--red);

            color: white}

            .primary:hover {

            background: #c9081b}

            .outline {

            background: white;

            border-color: #dce2e9;

            color: #526072}

            .toolbar {

            display: flex;

            flex-wrap: wrap;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            padding: 16px 18px;

            margin-bottom: 18px;

            border: 1px solid #edf0f4;

            border-radius: 8px;

            background: white}

            .search {

            position: relative;

            flex: 1 1 260px;

            max-width: 420px}

            .search svg {

            position: absolute;

            left: 12px;

            top: 50%;

            width: 16px;

            transform: translateY(-50%);

            color: #9aa4b2}

            .search input {

            width: 100%;

            padding: 11px 12px 11px 37px;

            border: 1px solid #dfe5ec;

            border-radius: 5px;

            outline: none}

            .toolbar select {

            min-width: 150px;

            padding: 10px 12px;

            border: 1px solid #dfe5ec;

            border-radius: 5px;

            background: white;

            color: #526072}



            .grid {

                display: grid;

                grid-template-columns: repeat(4, minmax(0, 1fr));

                gap: 18px;

            }





            .card {

            min-width: 0;

            overflow: hidden;

            border: 1px solid #e9edf2;

            border-radius: 8px;

            background: white;

            box-shadow: 0 3px 15px #202e4007}

            .photo {

            aspect-ratio: 4 / 3;

            height: auto;

            display: grid;

            place-items: center;

            overflow: hidden;

            background: #edf1f5}

            .photo img {

            width: 100%;

            height: 100%;

            object-fit: cover}

            .placeholder {

            text-align: center;

            color: #8995a4;

            font-size: 11px}

            .placeholder svg {

            display: block;

            width: 35px;

            height: 35px;

            margin: 0 auto 8px}

            .body {

            padding: 16px}

            .card-top {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 10px;

            margin-bottom: 8px}

            .card h2 {

            margin: 0;

            font-size: 14px;

            line-height: 1.4;

            overflow-wrap: anywhere}

            .category {

            flex-shrink: 0;

            padding: 5px 8px;

            border-radius: 4px;

            color: #b91429;

            background: #fce4e7;

            font-size: 10px}

            .description {

            min-height: 36px;

            margin: 0 0 14px;

            color: #778395;

            font-size: 11px;

            line-height: 1.6;

            overflow-wrap: anywhere}

            .footer {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            padding-top: 12px;

            border-top: 1px solid var(--line)}

            .status {

            display: flex;

            align-items: center;

            gap: 5px;

            color: #208b52;

            font-size: 10px}

            .status:before {

            content: "";

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: #2cb875}

            .actions {

            display: flex;

            gap: 6px}

            .small-btn {

            width: 29px;

            height: 29px;

            display: grid;

            place-items: center;

            border: 1px solid #e4e8ee;

            border-radius: 5px;

            background: white;

            color: #657184}

            .small-btn svg {

            width: 14px;

            height: 14px}

            .small-btn.delete {

            color: var(--red)}

            .empty {

            display: none;

            padding: 40px;

            border: 1px dashed #d7dee7;

            border-radius: 8px;

            background: white;

            color: #8793a3;

            text-align: center}

            .backdrop {

            position: fixed;

            inset: 0;

            z-index: 50;

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;

            background: #10182080}

            .backdrop.open {

            display: flex}

            .modal {

            width: min(620px, 100%);

            max-height: 92vh;

            overflow-y: auto;

            border-radius: 10px;

            background: white;

            box-shadow: 0 18px 55px #0002}

            .modal-head {

            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 20px 22px;

            border-bottom: 1px solid var(--line)}

            .modal-head h2 {

            margin: 0 0 6px;

            font-size: 17px}

            .modal-head p {

            margin: 0;

            color: var(--muted);

            font-size: 11px;

            line-height: 1.5}

            .close {

            width: 30px;

            height: 30px;

            border: 0;

            border-radius: 5px;

            background: #f1f4f7;

            color: #667386;

            font-size: 20px}

            .modal-body {

            padding: 22px}

            .field {

            margin-bottom: 17px}

            .field label {

            display: block;

            margin-bottom: 8px;

            font-size: 12px;

            font-weight: bold}

            .field input, .field textarea, .field select {

            width: 100%;

            padding: 11px 12px;

            border: 1px solid #dfe5ec;

            border-radius: 5px;

            color: var(--text);

            background: white;

            outline: none}

            .field textarea {

            min-height: 95px;

            resize: vertical}

            .field small {

            display: block;

            margin-top: 6px;

            color: #929cab;

            font-size: 10px;

            line-height: 1.5}

            .upload {

            min-height: 135px;

            padding: 20px;

            border: 1px dashed #cbd4df;

            border-radius: 7px;

            background: #fafbfd;

            text-align: center}

            .upload label {

            cursor: pointer;

            color: #596779}

            .upload input {

            display: none}

            .upload img {

            display: none;

            max-width: 100%;

            max-height: 200px;

            object-fit: contain}

            .modal-actions {

            display: flex;

            justify-content: flex-end;

            gap: 9px;

            padding: 16px 22px;

            border-top: 1px solid var(--line);

            background: #fbfcfd}

            .toast {

            position: fixed;

            right: 24px;

            bottom: 24px;

            z-index: 70;

            display: none;

            max-width: calc(100% - 32px);

            padding: 13px 17px;

            border-radius: 7px;

            background: #18232e;

            color: white;

            box-shadow: 0 8px 30px #0002;

            font-size: 12px}

            @media(max-width: 1150px) {

            .grid {

            grid-template-columns: repeat(2, minmax(0, 1fr))}

            .content {

            padding: 24px 20px}

            .topbar {

            padding: 0 20px}

            }

            @media(max-width: 760px) {

            .sidebar {

            width: 190px}

            .main {

            width: calc(100% - 190px);

            margin-left: 190px}

            .grid {

            grid-template-columns: 1fr}

            .content {

            padding: 20px 14px}

            .topbar {

            padding: 0 14px}

            .admin-name, .admin-chevron {

            display: none}

            }

            @media(max-width: 560px) {

            .sidebar {

            position: relative;

            width: 100%;

            height: auto;

            padding: 12px}

            .brand {

            padding: 3px 0 12px;

            margin-bottom: 10px}

            .brand img {

            height: 48px}

            .nav-list {

            flex-direction: row;

            gap: 4px;

            overflow-x: auto;

            padding-bottom: 3px}

            .nav-item {

            flex: 0 0 auto;

            padding: 10px}

            .sidebar-bottom {

            display: none}

            .main {

            width: 100%;

            margin: 0}

            .topbar {

            height: 55px}

            .breadcrumb {

            display: none}

            .content {

            padding: 20px 12px}

            .heading {

            flex-direction: column}

            .heading h1 {

            font-size: 22px}

            .toolbar {

            align-items: stretch}

            .search {

            max-width: none;

            flex-basis: 100%}

            .toolbar select {

            flex: 1}

            .backdrop {

            padding: 10px}

            .modal-body {

            padding: 16px}

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

                                        <div class="top-left">

                                            <button class="icon-btn" type="button" aria-label="Menu">

                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                                    <path d="M4 7h16M4 12h16M4 17h16"/>

                                                </svg>

                                            </button>

                                            <div class="breadcrumb">CMS ADK &nbsp; / &nbsp; <strong>Galeri</strong>

                                            </div>

                                        </div>

                                        <div class="top-right">

                                            <button class="icon-btn notification" type="button" aria-label="Notifikasi">

                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">

                                                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/>

                                                </svg>

                                            </button>

                                            <div class="avatar">A</div>

                                            <span class="admin-name">Admin</span>

                                            <svg class="admin-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">

                                                <path d="m7 10 5 5 5-5"/>

                                            </svg>

                                        </div>

                                    </header>

                                    <section class="content">

                                        <div class="heading">

                                            <div>

                                                <h1>Galeri</h1>

                                                <p>Kelola foto kegiatan, fasilitas, dan dokumentasi PT. Ari Dharma Kanti.</p>

                                            </div>

                                            <button class="btn primary" id="addGallery" type="button">＋ Tambah Galeri</button>

                                        </div>

                                        <div class="toolbar">

                                            <label class="search">

                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">

                                                    <circle cx="10.8" cy="10.8" r="6.8"/>

                                                    <path d="m16 16 5 5"/>

                                                </svg>

                                                <input id="search" type="search" placeholder="Cari judul atau deskripsi galeri...">

                                            </label>

                                            <select id="filter">

                                                <option value="">Semua Kategori</option>

                                                @foreach ($categories as $category)

                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                       <div class="grid" id="grid">

                                            @forelse ($galleryItems as $item)

                                                <article

                                                    class="card"

                                                    data-id="{{ $item->id }}"

                                                    data-title="{{ $item->title }}"

                                                    data-description="{{ $item->description }}"

                                                    data-category="{{ $item->category?->name }}"

                                                    data-category-id="{{ $item->gallery_category_id }}"
                                                    data-is-active="{{ $item->is_active ? '1' : '0' }}"

                                                >

                                                    <div class="photo">

                                                        <img

                                                            src="{{ asset('storage/' . $item->image_path) }}"

                                                            alt="{{ $item->title }}"

                                                            loading="lazy"

                                                        >

                                                    </div>



                                                    <div class="body">

                                                        <div class="card-top">

                                                            <h2>{{ $item->title }}</h2>



                                                            <span class="category">

                                                                {{ $item->category?->name ?? 'Tanpa kategori' }}

                                                            </span>

                                                        </div>



                                                        <p class="description">

                                                            {{ $item->description }}

                                                        </p>



                                                        <div class="footer">

                                                            <span class="status">

                                                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}

                                                            </span>



                                                            <div class="actions">

                                                                <button

                                                                    class="small-btn edit"

                                                                    type="button"

                                                                    aria-label="Edit"

                                                                >✎</button>



                                                                <form method="POST" action="{{ route('cms.gallery.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?')">

                                                                    @csrf

                                                                    @method('DELETE')

                                                                    <button class="small-btn delete remove" type="submit" aria-label="Hapus">×</button>

                                                                </form>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </article>

                                            @empty

                                                <p>Belum ada foto galeri. Klik Tambah Galeri untuk menambahkan foto.</p>

                                            @endforelse

                                        </div>

                                                    <div class="empty" id="empty">Galeri tidak ditemukan. Coba kata kunci atau kategori lain.</div>

                                                </section>

                                            </main>

                                            <div class="backdrop" id="backdrop" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

                                                <div class="modal">

                                                    <div class="modal-head">

                                                        <div>

                                                            <h2 id="modalTitle">Tambah Galeri</h2>

                                                            <p>Tambahkan foto, judul, dan deskripsi yang menjelaskan gambar pada website publik.</p>

                                                        </div>

                                                        <button class="close" id="close" type="button" aria-label="Tutup">×</button>

                                                    </div>

                                                    <form id="galleryForm" action="{{ route('cms.gallery.store') }}" method="POST" enctype="multipart/form-data">

                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="_method"
                                                            id="formMethod"
                                                            value="PUT"
                                                            disabled
                                                        >

                                                        <div class="modal-body">
                                                            <div class="field">
                                                                <label for="is_active">Status Galeri</label>
                                                                <input type="hidden" name="is_active" value="0">
                                                                <label style="display:flex; align-items:center; gap:8px; font-weight:normal; margin-top:8px;">
                                                                    <input
                                                                        type="checkbox"
                                                                        id="is_active"
                                                                        name="is_active"
                                                                        value="1"
                                                                        style="width:auto; margin:0;"
                                                                    >
                                                                    Tampilkan di website publik
                                                                </label>
                                                            </div>


                                                            <div class="field">

                                                                <label for="image">Foto Galeri *</label>

                                                                <div class="upload">

                                                                    <label for="image">

                                                                        <span id="uploadLabel">＋ Klik untuk memilih gambar (JPG, PNG, WEBP)</span>

                                                                        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp">

                                                                        <img id="preview" alt="Pratinjau gambar">

                                                                    </label>

                                                                </div>

                                                                <small>Gunakan foto dokumentasi perusahaan yang sesuai dan memiliki izin untuk dipublikasikan.</small>

                                                            </div>

                                                            <div class="field">

                                                                <label for="title">Judul Gambar *</label>

                                                                <input id="title" name="title" type="text" required maxlength="100" placeholder="Contoh: Gedung Perusahaan">

                                                            </div>

                                                            <div class="field">

                                                                <label for="description">Deskripsi Gambar *</label>

                                                                <textarea id="description" name="description" required maxlength="500" placeholder="Jelaskan isi foto, kegiatan, atau informasi yang perlu diketahui pengunjung..."></textarea>

                                                                <small>Deskripsi ini menjelaskan gambar pada galeri website publik.</small>

                                                            </div>

                                                            <div class="field">

                                                                <label for="category">Kategori *</label>

                                                                <select id="category" name="gallery_category_id" required>

                                                                    <option value="">Pilih kategori</option>

                                                                    @foreach ($categories as $category)

                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="modal-actions">

                                                            <button class="btn outline" id="cancel" type="button">Batal</button>

                                                            <button class="btn primary" type="submit">Simpan Galeri</button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                            <div class="toast" id="toast" role="status">

                                            </div>

                                            <script>

                                                const backdrop = document.getElementById('backdrop');

                                                const form = document.getElementById('galleryForm');

                                                const fileInput = document.getElementById('image');

                                                const preview = document.getElementById('preview');

                                                const uploadLabel = document.getElementById('uploadLabel');

                                                const grid = document.getElementById('grid');

                                                const toast = document.getElementById('toast');

                                                const formMethod = document.getElementById('formMethod');

                                                let editing = null;

                                                let imageUrl = '';



                                                function notify(message) {

                                                    toast.textContent = message;

                                                    toast.style.display = 'block';

                                                    clearTimeout(notify.timer);

                                                    notify.timer = setTimeout(() => toast.style.display = 'none', 3200);

                                                }



                                                function openModal(card = null) {

                                                    editing = card;

                                                    form.reset();

                                                    document.getElementById('is_active').checked = false;

                                                    imageUrl = '';

                                                    preview.style.display = 'none';

                                                    preview.removeAttribute('src');

                                                    uploadLabel.style.display = 'block';

                                                    formMethod.value = 'PUT';
                                                    formMethod.disabled = !card;

                                                    form.action = card

                                                        ? `/cms/galeri/${card.dataset.id}`

                                                        : @json(route('cms.gallery.store'));

                                                    fileInput.required = !card;

                                                    document.getElementById('modalTitle').textContent = card ? 'Edit Galeri' : 'Tambah Galeri';



                                                    if (card) {

                                                        document.getElementById('title').value = card.dataset.title;

                                                        document.getElementById('description').value = card.dataset.description;

                                                        document.getElementById('category').value = card.dataset.categoryId;
                                                        document.getElementById('is_active').checked = card.dataset.isActive === '1';

                                                        const img = card.querySelector('.photo img');

                                                        if (img) {

                                                            imageUrl = img.src;

                                                            preview.src = img.src;

                                                            preview.style.display = 'block';

                                                            uploadLabel.style.display = 'none';

                                                        }

                                                    }



                                                    backdrop.classList.add('open');

                                                    document.body.style.overflow = 'hidden';

                                                }



                                                function closeModal() {

                                                    backdrop.classList.remove('open');

                                                    document.body.style.overflow = '';

                                                    editing = null;

                                                }



                                                fileInput.addEventListener('change', () => {

                                                    const file = fileInput.files[0];

                                                    if (!file) return;

                                                    if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {

                                                        notify('Pilih gambar JPG, PNG, atau WEBP.');

                                                        fileInput.value = '';

                                                        return;

                                                    }

                                                    imageUrl = URL.createObjectURL(file);

                                                    preview.src = imageUrl;

                                                    preview.style.display = 'block';

                                                    uploadLabel.style.display = 'none';

                                                });



                                                document.getElementById('addGallery').addEventListener('click', () => openModal());

                                                document.getElementById('close').addEventListener('click', closeModal);

                                                document.getElementById('cancel').addEventListener('click', closeModal);

                                                backdrop.addEventListener('click', event => {

                                                    if (event.target === backdrop) closeModal();

                                                });



                                                grid.addEventListener('click', event => {

                                                    const editButton = event.target.closest('.edit');

                                                    if (!editButton) return;

                                                    const card = editButton.closest('.card');

                                                    if (card) openModal(card);

                                                });



                                                function filterCards() {

                                                    const query = document.getElementById('search').value.toLowerCase().trim();

                                                    const category = document.getElementById('filter').value;

                                                    let count = 0;

                                                    grid.querySelectorAll('.card').forEach(card => {

                                                        const matches = (card.dataset.title + ' ' + card.dataset.description).toLowerCase().includes(query)

                                                            && (!category || card.dataset.category === category);

                                                        card.style.display = matches ? '' : 'none';

                                                        if (matches) count++;

                                                    });

                                                    document.getElementById('empty').style.display = count ? 'none' : 'block';

                                                }



                                                document.getElementById('search').addEventListener('input', filterCards);

                                                document.getElementById('filter').addEventListener('change', filterCards);



                                                @if ($errors->any())

                                                    backdrop.classList.add('open');

                                                    document.body.style.overflow = 'hidden';

                                                @endif

                                            </script>

                                        </body>

                                    </html>