@extends('layouts.admin')

@section('title', isset($productService) ? 'Edit Produk & Layanan' : 'Tambah Produk & Layanan')

@section('breadcrumb', isset($productService) ? 'Edit Data' : 'Tambah Data')

@section('content')

<div class="product-form-page">

<div class="page-top">

                <div class="page-heading">

                    <h1>{{ isset($productService) ? 'Edit Produk & Layanan' : 'Tambah Produk & Layanan' }}</h1>

              <p>

                @if(isset($productService))

                    Perbarui informasi produk atau layanan perusahaan.

                @else

                    Tambahkan informasi produk atau layanan baru perusahaan.

                @endif

            </p>

                </div>

                <a href="{{ route('cms.products-services.index') }}" class="breadcrumb-back">

                    ← Kembali ke Produk &amp; Layanan

                </a>

            </div>

            @if ($errors->any())

                <div class="alert-error">

                    <strong>Periksa kembali data yang dimasukkan:</strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="form-card">

                <div class="form-card-header">

                    <h2>Informasi Produk & Layanan</h2>

                    <p>Lengkapi informasi berikut sesuai dengan data perusahaan.</p>

                </div>

           <form

            action="{{ isset($productService) ? route('cms.products-services.update', $productService->id) : route('cms.products-services.store') }}"

            method="POST"

            enctype="multipart/form-data"

        >

                    @csrf

                    @if (isset($productService))

                        @method('PUT')

                    @endif

                    <div class="form-body">

                        <h3 class="section-title">Informasi Utama</h3>

                        <div class="form-grid">

                            <div class="form-group">

                                <label for="name">

                                    Nama Produk atau Layanan

                                    <span class="required-star">*</span>

                                </label>

                                <input

                                    type="text"

                                    id="name"

                                    name="name"

                                    class="form-control"

                                    value="{{ old('name', $productService->name ?? '') }}"

                                    placeholder="Masukkan nama produk atau layanan"

                                    maxlength="255"

                                    required

                                >

                                @error('name')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="type">

                                    Jenis

                                    <span class="required-star">*</span>

                                </label>

                                <select id="type" name="type" class="form-control" required>

                                    <option value="">Pilih jenis</option>

                                    <option value="Produk" {{ old('type', $productService->type ?? '') === 'Produk' ? 'selected' : '' }}>

                                        Produk

                                    </option>

                                    <option value="Layanan" {{ old('type', $productService->type ?? '') === 'Layanan' ? 'selected' : '' }}>

                                        Layanan

                                    </option>

                                </select>

                                @error('type')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="form-group full">

                                <label for="category">

                                    Kategori

                                    <span class="required-star">*</span>

                                </label>

                                <input

                                    type="text"

                                    id="category"

                                    name="category"

                                    class="form-control"

                                    value="{{ old('category', $productService->category ?? '') }}"

                                    placeholder="Masukkan kategori"

                                    maxlength="255"

                                    required

                                >

                                @error('category')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="form-group full">

                                <label for="short_description">Deskripsi Singkat</label>

                                <textarea

                                    id="short_description"

                                    name="short_description"

                                    class="form-control"

                                    placeholder="Tuliskan deskripsi singkat produk atau layanan"

                                >{{ old('short_description', $productService->short_description ?? '') }}</textarea>

                                @error('short_description')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                        </div>

                        <h3 class="section-title">Gambar Produk atau Layanan</h3>

                        <div class="form-group">

                            <label for="card_image">Gambar Kartu</label>

                            <input

                                type="file"

                                id="card_image"

                                name="card_image"

                                class="form-control"

                                accept=".jpg,.jpeg,.png,.webp"

                            >

                            <small class="form-help">

                                Format JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.

                            </small>

                            @if (isset($productService) && $productService->card_image)

                                <div class="image-preview">

                                    <p class="form-help">Gambar saat ini:</p>

                                    <img

                                        src="{{ asset('storage/' . $productService->card_image) }}"

                                        alt="Gambar {{ $productService->name }}"

                                    >

                                </div>

                            @endif

                            @error('card_image')

                                <div class="error-message">{{ $message }}</div>

                            @enderror

                        </div>

                        <h3 class="section-title">Pengaturan Tampilan</h3>

                        <div class="form-grid">

                            <div class="form-group">

                                <label for="sort_order">Urutan Tampilan</label>

                                <input

                                    type="number"

                                    id="sort_order"

                                    name="sort_order"

                                    class="form-control"

                                    min="0"

                                    value="{{ old('sort_order', $productService->sort_order ?? 0) }}"

                                >

                                @error('sort_order')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="home_order">Urutan di Beranda</label>

                                <input

                                    type="number"

                                    id="home_order"

                                    name="home_order"

                                    class="form-control"

                                    min="0"

                                    value="{{ old('home_order', $productService->home_order ?? 0) }}"

                                >

                                @error('home_order')

                                    <div class="error-message">{{ $message }}</div>

                                @enderror

                            </div>

                            <div class="form-group full">

                                <div class="checkbox-group">

                                    <input type="hidden" name="show_on_home" value="0">

                                    <input

                                        type="checkbox"

                                        id="show_on_home"

                                        name="show_on_home"

                                        value="1"

                                        {{ old('show_on_home', $productService->show_on_home ?? false) ? 'checked' : '' }}

                                    >

                                    <label for="show_on_home">

                                        Tampilkan produk atau layanan di Beranda

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                   <div class="form-footer">

                        <a href="{{ route('cms.products-services.index') }}" class="btn btn-outline">

                            ← Kembali ke Produk &amp; Layanan

                        </a>

                        <button type="submit" class="btn btn-primary">

                            {{ isset($productService) ? 'Simpan Perubahan' : 'Simpan Produk & Layanan' }}

                        </button>

                    </div>

                </form>

            </div>

</div>

@endsection
