<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - CMS ADK</title>

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

        button, input, textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            width: 225px;
            height: 100vh;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            background: var(--sidebar);
            color: #c7d0dc;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 4px 0 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid #27313b;
        }

        .brand img {
            width: 145px;
            height: 65px;
            object-fit: contain;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 12px;
            margin-bottom: 5px;
            border-radius: 5px;
            color: #c7d0dc;
            text-decoration: none;
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

        /* MAIN DAN NAVBAR */
        .main {
            margin-left: 225px;
            width: calc(100% - 225px);
            min-width: 0;
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            height: 64px;
            padding: 0 30px;
            background: white;
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
        }

        .topbar-left {
            gap: 18px;
        }

        .topbar-right {
            gap: 15px;
        }

        .icon-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px;
            border: 0;
            border-radius: 5px;
            background: transparent;
            color: #758195;
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
            width: 34px;
            height: 34px;
            flex: 0 0 34px;
            display: grid;
            place-items: center;
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
            width: 14px;
            height: 14px;
            color: #64748b;
        }

        /* KONTEN */
        .content {
            max-width: 1600px;
            margin: auto;
            padding: 30px;
        }

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 9px;
            font-size: 25px;
            letter-spacing: -.7px;
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
            padding: 11px 16px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--red);
            color: white;
            box-shadow: 0 3px 8px #e5092020;
        }

        .btn-primary:hover {
            background: #c9081b;
        }

        .panel {
            margin-bottom: 22px;
            background: white;
            border: 1px solid #edf0f4;
            border-radius: 8px;
            box-shadow: 0 3px 15px #202e4007;
            overflow: hidden;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .form-group input,
        .form-group textarea {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #dfe5ec;
            border-radius: 5px;
            outline: none;
            background: white;
            color: var(--text);
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.7;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #e88b96;
            box-shadow: 0 0 0 3px #e509200c;
        }

        .form-help {
            display: block;
            margin-top: 7px;
            color: #929cab;
            font-size: 10px;
            line-height: 1.6;
        }

        .editor-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 9px;
            border: 1px solid #dfe5ec;
            border-bottom: 0;
            border-radius: 5px 5px 0 0;
            background: #f8f9fb;
        }

        .editor-toolbar button {
            min-width: 29px;
            height: 29px;
            border: 1px solid #e3e8ee;
            border-radius: 4px;
            background: white;
            color: #526072;
        }

        .editor-toolbar button:hover {
            background: #fff0f2;
            color: var(--red);
        }

        .editor-content {
            min-height: 160px;
            padding: 14px;
            border: 1px solid #dfe5ec;
            border-radius: 0 0 5px 5px;
            outline: none;
            line-height: 1.8;
        }

        .editor-content:focus {
            border-color: #e88b96;
        }

        .image-section {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr);
            gap: 24px;
            align-items: start;
        }

        .image-preview {
            width: 100%;
            height: 180px;
            min-height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border: 1px dashed #cbd3de;
            border-radius: 6px;
            background: #f8fafc;
            color: #8994a4;
            text-align: center;
            overflow: hidden;
        }

       .image-preview img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }


        .image-preview.has-image img {
            display: block;
        }

        .image-preview.has-image .image-placeholder {
            display: none;
        }

        .save-row {
            display: flex;
            justify-content: flex-end;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        @media (min-width: 701px) and (max-width: 1050px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
            }

            .content {
                padding: 23px 18px;
            }

            .topbar {
                padding: 0 18px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                min-height: 0;
                padding: 12px;
                overflow: visible;
            }

            .brand {
                padding: 4px 0 12px;
                margin-bottom: 10px;
            }

            .brand img {
                height: 48px;
            }

            .sidebar nav {
                display: flex;
                gap: 5px;
                overflow-x: auto;
            }

            .nav-item {
                width: auto;
                flex-shrink: 0;
                margin: 0;
                padding: 10px;
            }

            .sidebar-bottom {
                display: none;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .topbar {
                height: 55px;
                padding: 0 14px;
            }

            .breadcrumb {
                display: none;
            }

            .admin-name {
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

            .image-section {
                grid-template-columns: 1fr;
            }

            .panel-body {
                padding: 16px;
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
                <button class="icon-button" type="button" aria-label="Menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>

                <div class="breadcrumb">
                    CMS ADK &nbsp; / &nbsp; <strong>Tentang Kami</strong>
                </div>
            </div>

            <div class="topbar-right">
                <button class="icon-button notification" type="button" aria-label="Notifikasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>
                </button>

                <div class="avatar">A</div>
                <span class="admin-name">Admin</span>

                <svg class="admin-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="m7 10 5 5 5-5"/>
                </svg>
            </div>
        </header>

        <section class="content">
            <div class="page-heading">
                <div>
                    <h1>Tentang Kami</h1>
                    <p>Kelola informasi profil perusahaan PT. Ari Dharma Kanti.</p>
                </div>
            </div>

                    @if (session('success'))
            <div style="padding: 12px; margin-bottom: 16px; background: #e8f7ed; color: #176b35; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="padding: 12px; margin-bottom: 16px; background: #fdeaea; color: #a61b1b; border-radius: 5px;">
                <strong>Data belum berhasil disimpan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form id="aboutForm"
                    action="{{ route('cms.about.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                <section class="panel">
                    <div class="panel-header">
                        <h2>Informasi Perusahaan</h2>
                        <p>Atur judul dan informasi utama yang menjelaskan perusahaan.</p>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="aboutTitle">Judul Tentang Kami</label>
                            <input
                                id="aboutTitle"
                                name="title"
                                type="text"
                                value="{{ old('title', $aboutPage->title ?? 'Tentang Kami') }}"
                                placeholder="Masukkan judul"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="aboutSubtitle">Subjudul</label>
                           <input
                                id="aboutSubtitle"
                                name="subtitle"
                                type="text"
                                placeholder="Masukkan subjudul perusahaan"
                                value="{{ old('subtitle', $aboutPage->subtitle ?? '') }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Perusahaan</label>

                           <div class="editor-toolbar">
                            <button type="button" data-command="bold" title="Tebal"><b>B</b></button>
                            <button type="button" data-command="italic" title="Miring"><i>I</i></button>
                            <button type="button" data-command="underline" title="Garis bawah"><u>U</u></button>

                            <button type="button" data-command="insertUnorderedList" title="Bullet List">• List</button>
                            <button type="button" data-command="insertOrderedList" title="Numbered List">1. List</button>

                            <button type="button" data-command="justifyLeft" title="Rata kiri">☰←</button>
                            <button type="button" data-command="justifyCenter" title="Rata tengah">☰</button>
                            <button type="button" data-command="justifyRight" title="Rata kanan">→☰</button>
                            <button type="button" data-command="justifyFull" title="Rata kiri-kanan">☷</button>
                        </div>

                            <div
                                id="aboutDescription"
                                class="editor-content"
                                contenteditable="true"
                                role="textbox"
                                aria-multiline="true"
                            >{!! old('content', $aboutPage->content ?? 'Masukkan deskripsi profil PT. Ari Dharma Kanti di sini.') !!}</div>

                            <input
                                type="hidden"
                                id="aboutContentInput"
                                name="content"
                            >

                            <small class="form-help">
                                Gunakan editor untuk mengatur format teks profil perusahaan.
                            </small>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Gambar Profil Perusahaan</h2>
                        <p>Atur gambar utama yang ditampilkan pada halaman Tentang Kami.</p>
                    </div>

                    <div class="panel-body">
                        <div class="image-section">
                            <div class="form-group">
                                <label for="aboutImage">Gambar Perusahaan</label>
                                <input
                                    id="aboutImage"
                                    name="image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                >
                                <small class="form-help">
                                    Format JPG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </small>
                            </div>

                            <div class="form-group">
                                <label>Preview Gambar Perusahaan</label>
                                <div class="image-preview {{ !empty($aboutPage?->image_path) ? 'has-image' : '' }}" id="imagePreview">
                                    <span class="image-placeholder">Preview gambar perusahaan</span>
                                    <img
                                        id="previewImage"
                                        alt="Preview gambar perusahaan"
                                        @if (!empty($aboutPage?->image_path))
                                            src="{{ asset('storage/' . $aboutPage->image_path) }}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Visi &amp; Misi</h2>
                        <p>Kelola visi dan misi perusahaan yang ditampilkan pada website publik.</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="visionTitle">Judul Visi</label>
                            <input
                                id="visionTitle"
                                name="vision_title"
                                type="text"
                                value="{{ old('vision_title', $aboutPage->vision_title ?? 'Visi Kami') }}"
                                placeholder="Contoh: Visi Kami"
                            >
                        </div>
                        <div class="form-group">
                            <label for="visionContent">Isi Visi</label>
                            <textarea
                                id="visionContent"
                                name="vision_content"
                                placeholder="Tuliskan visi perusahaan..."
                            >{{ old('vision_content', $aboutPage->vision_content ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="missionTitle">Judul Misi</label>
                            <input
                                id="missionTitle"
                                name="mission_title"
                                type="text"
                                value="{{ old('mission_title', $aboutPage->mission_title ?? 'Misi Kami') }}"
                                placeholder="Contoh: Misi Kami"
                            >
                        </div>
                        <div class="form-group">
                            <label for="missionContent">Isi Misi</label>
                            <textarea
                                id="missionContent"
                                name="mission_content"
                                placeholder="Tuliskan misi perusahaan..."
                            >{{ old('mission_content', $aboutPage->mission_content ?? '') }}</textarea>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Komitmen Kami</h2>
                        <p>Kelola judul, deskripsi, dan gambar untuk bagian Komitmen Kami.</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="commitmentTitle">Judul Komitmen</label>
                            <input
                                id="commitmentTitle"
                                name="commitment_title"
                                type="text"
                                value="{{ old('commitment_title', $aboutPage->commitment_title ?? 'Mendukung Beragam Kebutuhan') }}"
                                placeholder="Masukkan judul komitmen"
                            >
                        </div>
                        <div class="form-group">
                            <label for="commitmentContent">Deskripsi Komitmen</label>
                            <textarea
                                id="commitmentContent"
                                name="commitment_content"
                                placeholder="Tuliskan deskripsi komitmen perusahaan..."
                            >{{ old('commitment_content', $aboutPage->commitment_content ?? '') }}</textarea>
                        </div>
                        <div class="image-section">
                            <div class="form-group">
                                <label for="commitmentImage">Gambar Komitmen</label>
                                <input
                                    id="commitmentImage"
                                    name="commitment_image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                >
                                <small class="form-help">
                                    Format JPG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </small>
                            </div>
                            <div class="form-group">
                                <label>Preview Gambar Komitmen</label>
                                <div class="image-preview {{ !empty($aboutPage?->commitment_image) ? 'has-image' : '' }}" id="commitmentImagePreview">
                                    <span class="image-placeholder">Preview gambar komitmen</span>
                                    <img
                                        id="previewCommitmentImage"
                                        alt="Preview gambar komitmen"
                                        @if (!empty($aboutPage?->commitment_image))
                                            src="{{ asset('storage/' . $aboutPage->commitment_image) }}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="save-row" style="margin-bottom: 24px;">
                    <button class="btn btn-primary" type="submit">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script>
        const imageInput = document.getElementById('aboutImage');
        const preview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');

        function setupImagePreview(inputId, previewId, imageId) {
            const input = document.getElementById(inputId);
            const previewBox = document.getElementById(previewId);
            const previewImg = document.getElementById(imageId);

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    alert('Pilih file gambar yang valid.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImg.src = event.target.result;
                    previewBox.classList.add('has-image');
                };
                reader.readAsDataURL(file);
            });
        }

        setupImagePreview('aboutImage', 'imagePreview', 'previewImage');
        setupImagePreview('commitmentImage', 'commitmentImagePreview', 'previewCommitmentImage');

            document.querySelectorAll('.editor-toolbar button').forEach(button => {
            button.addEventListener('click', function () {
                const editor = document.getElementById('aboutDescription');

                editor.focus();
                document.execCommand(this.dataset.command, false, null);
            });
        });

       document.getElementById('aboutForm').addEventListener('submit', function () {
            const editor = document.getElementById('aboutDescription');
            const contentInput = document.getElementById('aboutContentInput');

            contentInput.value = editor.innerHTML;
        });
    </script>
</body>
</html>
