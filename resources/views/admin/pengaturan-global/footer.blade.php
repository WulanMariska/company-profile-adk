@extends('layouts.admin')

@section('title', 'Pengaturan Footer')
@section('breadcrumb_parent', 'Pengaturan Global')
@section('breadcrumb', 'Footer')

@section('content')
<div class="footer-page">
<div class="page-heading">
        <h1>Pengaturan Footer</h1>
        <p>Kelola informasi perusahaan yang ditampilkan pada bagian footer website PT Ari Dharma Kanti.</p>
    </div>


    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert footer-alert-error">
            Ada data yang belum valid. Periksa pesan pada setiap kolom.
        </div>
    @endif

    <form action="{{ route('cms.global-settings.footer.update') }}" method="POST">
        @csrf
        @method('PUT')

        <section class="card">
            <h2>Identitas Perusahaan</h2>
            <p class="card-description">Informasi utama perusahaan pada footer website.</p>

            <div class="form-group">
                <label for="company_name">Nama Perusahaan</label>
                <input
                    type="text"
                    id="company_name"
                    name="company_name"
                    value="{{ old('company_name', $siteSetting?->company_name ?? 'PT. Ari Dharma Kanti') }}"
                >
                @error('company_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="footer_description">Deskripsi Perusahaan</label>
                <textarea id="footer_description" name="footer_description">{{ old('footer_description', $siteSetting?->footer_description ?? 'Penyedia solusi kebutuhan bisnis dan rumah dengan produk berkualitas dan layanan profesional.') }}</textarea>
                @error('footer_description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </section>

        <section class="card">
            <h2>Media Sosial</h2>
            <p class="card-description">Masukkan tautan akun resmi perusahaan. Kosongkan jika belum tersedia.</p>

            @php
                $socialLinks = old('social_links', $siteSetting?->social_links ?? []);
            @endphp

            <div class="form-grid">
                <div class="form-group">
                    <label for="social_instagram">Instagram</label>
                    <input
                        type="url"
                        id="social_instagram"
                        name="social_links[instagram]"
                        value="{{ $socialLinks['instagram'] ?? '' }}"
                        placeholder="https://instagram.com/..."
                    >
                    @error('social_links.instagram') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_facebook">Facebook</label>
                    <input
                        type="url"
                        id="social_facebook"
                        name="social_links[facebook]"
                        value="{{ $socialLinks['facebook'] ?? '' }}"
                        placeholder="https://facebook.com/..."
                    >
                    @error('social_links.facebook') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_youtube">YouTube</label>
                    <input
                        type="url"
                        id="social_youtube"
                        name="social_links[youtube]"
                        value="{{ $socialLinks['youtube'] ?? '' }}"
                        placeholder="https://youtube.com/..."
                    >
                    @error('social_links.youtube') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="social_website">Website</label>
                    <input
                        type="url"
                        id="social_website"
                        name="social_links[website]"
                        value="{{ $socialLinks['website'] ?? '' }}"
                        placeholder="https://..."
                    >
                    @error('social_links.website') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </section>

        <section class="card">
            <h2>Informasi Kontak</h2>
            <p class="card-description">Informasi ini juga dapat digunakan oleh pengunjung untuk menghubungi perusahaan.</p>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address">{{ old('address', $siteSetting?->address ?? 'Jl. [Alamat Lengkap], [Kota], Bali, Indonesia') }}</textarea>
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $siteSetting?->phone ?? '0811xxxxxxx') }}"
                    >
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $siteSetting?->email ?? 'info@aridharmakanti.co.id') }}"
                    >
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group full">
                    <label for="google_maps_url">Link Google Maps</label>
                    <input
                        type="url"
                        id="google_maps_url"
                        name="google_maps_url"
                        value="{{ old('google_maps_url', $siteSetting?->google_maps_url ?? '') }}"
                        placeholder="https://maps.google.com/..."
                    >
                    @error('google_maps_url') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </section>



        
<section class="card">
    <h2>Quick Link</h2>
    <p class="card-description">
        Atur tautan navigasi yang ditampilkan pada footer website.
        Tulis satu tautan per baris dengan format: Nama Menu | URL.
    </p>

    <div class="form-group">
        <label for="quick_links_text">Daftar Quick Link</label>
        <textarea
            id="quick_links_text"
            name="quick_links_text"
            class="list-input"
            placeholder="Beranda | /&#10;Tentang Kami | /tentang-kami&#10;Layanan | /layanan&#10;Galeri | /galeri&#10;Kontak | /kontak"
        
            >{{ old('quick_links_text', $siteSetting?->quick_links_text ?? "Beranda | /\nTentang Kami | /tentang-kami\nLayanan | /layanan\nGaleri | /galeri\nKontak | /kontak") }}</textarea>

        <p class="list-help">
            Format setiap baris: Nama Menu | URL tujuan.
        </p>
    </div>
</section>

<section class="card">
    <h2>Kategori Produk ADK</h2>
    <p class="card-description">
        Atur daftar kategori produk yang muncul di bagian footer.
        Tulis satu kategori pada setiap baris.
    </p>

    <div class="form-group">
        <label for="product_categories_text">Daftar Kategori Produk</label>
        
<textarea
    id="product_categories_text"
    name="product_categories_text"
    class="list-input"
    >{{ old('product_categories_text', $siteSetting?->product_categories_text ?? "Sepeda Motor Baru\nSuku Cadang & Aksesoris Motor\nPeralatan Telekomunikasi\nPeralatan Masak, Dapur & Elektronik Rumah Tangga\nKomputer & Perlengkapannya\nMesin Pendingin\nFurniture & Interior\nPeralatan & Perlengkapan Olahraga\nPiranti Lunak\nFotografi & Barang Optik\nMesin & Peralatan Pertanian\nSuku Cadang Elektronik") }}</textarea>


        <p class="list-help">
            Total 12 kategori sesuai daftar produk PT Ari Dharma Kanti.
        </p>
    </div>
</section>



<section class="card">
    <h2>Layanan ADK</h2>
    <p class="card-description">
        Atur daftar layanan yang ditampilkan pada footer website.
        Tulis satu layanan pada setiap baris.
    </p>

    <div class="form-group">
        <label for="services_text">Daftar Layanan</label>
        <textarea
            id="services_text"
            name="services_text"
            class="list-input"
        
            >{{ old('services_text', $siteSetting?->services_text ?? "Penyewaan & Sewa Guna Usaha Mesin dan Peralatan Kantor\nJasa Teknologi Informasi & Komputer") }}</textarea>


        <p class="list-help">
            Masukkan satu layanan pada setiap baris.
        </p>
    </div>
</section>


    <section class="card">
        <h2>Kebijakan dan Ketentuan</h2>
        <p class="card-description">
            Atur tautan kebijakan privasi dan syarat penggunaan website.
        </p>

        <div class="form-grid">
            <div class="form-group">
                <label for="privacy_policy_url">Link Kebijakan Privasi</label>
                <input
                    type="text"
                    id="privacy_policy_url"
                    name="privacy_policy_url"
                    value="{{ old('privacy_policy_url', $siteSetting?->privacy_policy_url ?? '/kebijakan-privasi') }}"
                    placeholder="/kebijakan-privasi"
                >
            </div>

            <div class="form-group">
                <label for="terms_url">Link Syarat & Ketentuan</label>
                <input
                    type="text"
                    id="terms_url"
                    name="terms_url"
                    value="{{ old('terms_url', $siteSetting?->terms_url ?? '/syarat-ketentuan') }}"
                    placeholder="/syarat-ketentuan"
                >
            </div>
        </div>
    </section>

        <section class="card">
            <h2>Copyright</h2>
            <p class="card-description">Teks hak cipta pada bagian paling bawah footer.</p>

            <div class="form-group">
                <label for="copyright_text">Teks Copyright</label>
                <input
                    type="text"
                    id="copyright_text"
                    name="copyright_text"
                    value="{{ old('copyright_text', $siteSetting?->copyright_text ?? '© 2025 PT Ari Dharma Kanti. All rights reserved.') }}"
                >
                @error('copyright_text') <span class="error">{{ $message }}</span> @enderror
            </div>
        </section>

        <button type="submit" class="btn">Simpan Pengaturan Footer</button>
    </form>

    <section class="card footer-preview-card">
        <h2>Pratinjau Footer</h2>
        <p class="card-description">Pratinjau singkat berdasarkan data yang sedang tersimpan atau diisi.</p>

        <div class="footer-preview">
            <h3>{{ $siteSetting?->company_name ?? 'PT. Ari Dharma Kanti' }}</h3>
            <p>{{ $siteSetting?->footer_description ?? 'Penyedia solusi kebutuhan bisnis dan rumah dengan produk berkualitas dan layanan profesional.' }}</p>
            <p class="footer-preview-spaced">
                {{ $siteSetting?->address ?? 'Jl. [Alamat Lengkap], [Kota], Bali, Indonesia' }}
            </p>
            <p>{{ $siteSetting?->phone ?? '0811xxxxxxx' }}</p>
            <p>{{ $siteSetting?->email ?? 'info@aridharmakanti.co.id' }}</p>
            <p class="footer-preview-spaced">
                {{ $siteSetting?->copyright_text ?? '© 2025 PT Ari Dharma Kanti. All rights reserved.' }}
            </p>
        </div>
    </section>
</div>

@endsection
