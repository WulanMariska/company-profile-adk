@extends('layouts.admin')

@section('title', 'Pengaturan CTA')
@section('breadcrumb_parent', 'Pengaturan Global')
@section('breadcrumb', 'CTA')

@section('content')
<div class="cta-page">
<div class="page-heading">

        <h1>Pengaturan CTA</h1>

        <p>Kelola ajakan kerja sama yang ditampilkan pada website PT Ari Dharma Kanti.</p>

    </div>



    @if (session('success'))

        <div class="alert success">{{ session('success') }}</div>

    @endif



    @if ($errors->any())

        <div class="alert alert-error">

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

                <p class="help">Contoh: /kontak atau https\://example.com</p>

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
</div>

@endsection
