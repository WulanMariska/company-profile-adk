# Website Company Profile PT Ari Dharma Kanti

Website Company Profile PT Ari Dharma Kanti (ADK) merupakan aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk menampilkan informasi perusahaan, bidang usaha, produk dan layanan, galeri, serta informasi kontak perusahaan.

## Tentang Proyek

Proyek ini dikembangkan sebagai website company profile yang memiliki halaman publik dan Content Management System (CMS) untuk membantu pengelolaan konten website.

## Fitur Website

- **Beranda** — Menampilkan informasi utama dan ringkasan perusahaan.
- **Tentang Kami** — Menampilkan informasi mengenai perusahaan.
- **Produk dan Layanan** — Menampilkan kategori produk dan layanan perusahaan beserta halaman detailnya.
- **Galeri** — Menampilkan gambar yang berkaitan dengan produk dan kegiatan.
- **Kontak** — Menampilkan informasi kontak perusahaan.

## Fitur CMS

CMS digunakan untuk mengelola konten pada website, meliputi:

- Beranda
- Produk dan Layanan
- Galeri
- Tentang Kami
- Kontak
- Pengaturan Global, termasuk CTA, dan footer.

Konten yang dikelola melalui CMS terhubung dengan database sesuai implementasi aplikasi.

## Teknologi yang Digunakan

- **Framework:** Laravel
- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, dan JavaScript
- **Build Tool:** Vite
- **Package Manager PHP:** Composer
- **Package Manager JavaScript:** npm

## Persyaratan Sistem

Pastikan perangkat telah memiliki:

- PHP yang kompatibel dengan versi Laravel pada proyek
- Composer
- MySQL
- Node.js dan npm
- Git

## Instalasi dan Menjalankan Proyek

### 1. Clone Repository

```bash
git clone <URL_REPOSITORY>
```

Masuk ke direktori proyek:

```bash
cd company-profile-adk
```

### 2. Instal Dependensi PHP

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file konfigurasi contoh:

```bash
copy .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Buat database MySQL, kemudian sesuaikan konfigurasi database pada file `.env`.

Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database, username, dan password dengan konfigurasi lokal.

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

Jalankan seeder jika diperlukan:

```bash
php artisan db:seed
```

### 6. Instal Dependensi Frontend

```bash
npm install
```

Jalankan Vite dalam mode pengembangan:

```bash
npm run dev
```

### 7. Jalankan Laravel

Buka terminal baru, kemudian jalankan:

```bash
php artisan serve
```

Buka alamat lokal yang ditampilkan oleh Laravel pada browser.

## Catatan Keamanan

- File `.env` tidak boleh diunggah ke repository publik karena dapat berisi kredensial dan konfigurasi rahasia.
- Gunakan `.env.example` sebagai contoh konfigurasi environment.
- Jangan menyimpan password, API key, atau token rahasia di dalam repository.

## Status Proyek

Website company profile PT Ari Dharma Kanti dikembangkan menggunakan Laravel dengan halaman publik dan CMS untuk pengelolaan konten website.
