
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Konsultasi - CMS ADK</title>

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
            min-height: 44px;
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

        .form-group textarea {
            min-height: 110px;
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

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        .checkbox-row input {
            width: 16px;
            height: 16px;
            accent-color: var(--red);
        }

        .checkbox-row label {
            font-weight: 500;
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

        .preview {
            background: #202124;
            color: white;
            padding: 30px;
            border-radius: 10px;
        }

        .preview h3 {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .preview p {
            color: #d1d5db;
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .preview-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 6px;
            background: var(--red);
            color: white;
            font-weight: 600;
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
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<main class="page-content">
    <header class="page-header">
        <h1>Pengaturan Konsultasi</h1>
        <p>Kelola informasi konsultasi dan operasional kantor PT Ari Dharma Kanti.</p>
    </header>

    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert" style="background:#fee2e2;color:#991b1b;">
            Ada data yang belum valid. Periksa kembali setiap kolom.
        </div>
    @endif

    <form action="{{ route('cms.global-settings.konsultasi.update') }}" method="POST">
        @csrf
        @method('PUT')

        <section class="card">
            <h2>Konten Konsultasi</h2>
            <p class="card-description">
                Atur ajakan kepada pengunjung untuk menghubungi perusahaan.
            </p>

            <div class="form-group">
                <label for="title">Judul Konsultasi</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $consultationSetting?->title ?? 'Butuh Informasi Lebih Lanjut?') }}"
                >
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description">{{ old('description', $consultationSetting?->description ?? 'Hubungi tim PT Ari Dharma Kanti untuk konsultasi mengenai produk dan layanan yang sesuai dengan kebutuhan Anda.') }}</textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="button_text">Teks Tombol</label>
                    <input
                        type="text"
                        id="button_text"
                        name="button_text"
                        value="{{ old('button_text', $consultationSetting?->button_text ?? 'Konsultasi Sekarang') }}"
                    >
                    @error('button_text') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="button_link">Link Tombol</label>
                    <input
                        type="text"
                        id="button_link"
                        name="button_link"
                        value="{{ old('button_link', $consultationSetting?->button_link ?? '/kontak') }}"
                        placeholder="/kontak"
                    >
                    <p class="help">Contoh: /kontak atau tautan WhatsApp resmi.</p>
                    @error('button_link') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="checkbox-row">
                <input
                    type="checkbox"
                    id="is_active"
                    name="is_active"
                    value="1"
                    @checked(old('is_active', $consultationSetting?->is_active ?? true))
                >
                <label for="is_active">Tampilkan bagian konsultasi di website</label>
            </div>
        </section>

        <section class="card">
            <h2>Operasional Kantor</h2>
            <p class="card-description">
                Informasi kontak kantor yang digunakan pengunjung saat melakukan konsultasi.
            </p>

            <div class="form-group">
                <label for="office_name">Nama Kantor</label>
                <input
                    type="text"
                    id="office_name"
                    name="office_name"
                    value="{{ old('office_name', $consultationSetting?->office_name ?? 'PT. Ari Dharma Kanti') }}"
                >
                @error('office_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="office_address">Alamat Kantor</label>
                <textarea id="office_address" name="office_address">{{ old('office_address', $consultationSetting?->office_address ?? '') }}</textarea>
                @error('office_address') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="office_phone">Nomor Telepon</label>
                    <input
                        type="text"
                        id="office_phone"
                        name="office_phone"
                        value="{{ old('office_phone', $consultationSetting?->office_phone ?? '') }}"
                    >
                    @error('office_phone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="office_email">Email Kantor</label>
                    <input
                        type="email"
                        id="office_email"
                        name="office_email"
                        value="{{ old('office_email', $consultationSetting?->office_email ?? '') }}"
                    >
                    @error('office_email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full">
                    <label for="google_maps_url">Link Google Maps</label>
                    <input
                        type="url"
                        id="google_maps_url"
                        name="google_maps_url"
                        value="{{ old('google_maps_url', $consultationSetting?->google_maps_url ?? '') }}"
                        placeholder="https://maps.google.com/..."
                    >
                    @error('google_maps_url') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </section>

        <button type="submit" class="btn">Simpan Pengaturan Konsultasi</button>
    </form>

    <section class="card" style="margin-top:28px;">
        <h2>Pratinjau Konsultasi</h2>
        <p class="card-description">
            Pratinjau berdasarkan data yang sedang tersimpan di database.
        </p>

        <div class="preview">
            <h3>{{ $consultationSetting?->title ?? 'Butuh Informasi Lebih Lanjut?' }}</h3>
            <p>{{ $consultationSetting?->description ?? 'Hubungi tim PT Ari Dharma Kanti untuk konsultasi mengenai produk dan layanan yang sesuai dengan kebutuhan Anda.' }}</p>
            <span class="preview-button">
                {{ $consultationSetting?->button_text ?? 'Konsultasi Sekarang' }}
            </span>
        </div>
    </section>
</main>

</body>
</html>
