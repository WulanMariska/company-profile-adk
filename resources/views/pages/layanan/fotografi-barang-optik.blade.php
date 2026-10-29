@extends('layouts.app')

@section('title', 'Perdagangan Besar Alat Fotografi dan Barang Optik - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-fotografi.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="fotografi-detail-hero">

    <div class="fotografi-detail-hero-overlay"></div>

    <div class="fotografi-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR ALAT FOTOGRAFI &<br>
            BARANG OPTIK
        </h1>

        <p>
            Mendukung kebutuhan fotografi, visual, dan optik dengan
            berbagai pilihan produk.
        </p>

        <a href="{{ route('services') }}" class="fotografi-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="fotografi-detail-main">

    <div class="fotografi-detail-container">

        <div class="fotografi-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="fotografi-detail-left">


                {{-- IMAGE --}}

                
               
                <div class="fotografi-detail-image">
                    <img
                        src="{{ asset('assets/css/images-fotografi/fotografi-barangoptik.png') }}"
                        alt="Fotografi dan Barang Optik"
                    >
                </div>




                {{-- DESCRIPTION --}}

                <div class="fotografi-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar alat fotografi
                        dan barang optik untuk memenuhi berbagai kebutuhan fotografi dan
                        perangkat optik.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="fotografi-detail-features">


                        <div class="fotografi-feature-card">

                            <h3>
                                <span></span>
                                Alat Fotografi
                            </h3>

                            <p>
                                Mendukung kebutuhan aktivitas fotografi dan
                                dokumentasi visual.
                            </p>

                        </div>


                        <div class="fotografi-feature-card">

                            <h3>
                                <span></span>
                                Dokumentasi
                            </h3>

                            <p>
                                Mendukung kebutuhan perangkat untuk aktivitas
                                dokumentasi dan visual.
                            </p>

                        </div>


                        <div class="fotografi-feature-card">

                            <h3>
                                <span></span>
                                Barang Optik
                            </h3>

                            <p>
                                Menyediakan produk dalam kategori barang optik sesuai
                                kebutuhan penggunaan.
                            </p>

                        </div>


                        <div class="fotografi-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Profesional
                            </h3>

                            <p>
                                Menunjang kebutuhan fotografi dan optik untuk berbagai
                                aktivitas profesional.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="fotografi-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="fotografi-consultation-card">

                    <span class="fotografi-consultation-label">
                        KONSULTASI KEBUTUHAN
                    </span>

                    <h3>
                        Temukan Solusi yang Sesuai
                    </h3>

                    <p>
                        Sampaikan kebutuhan Anda kepada tim
                        PT. Ari Dharma Kanti untuk mendapatkan
                        informasi mengenai produk yang tersedia.
                    </p>


                    <a
                        href="{{ route('contact') }}"
                        class="fotografi-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="fotografi-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="fotografi-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-fotografi/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="fotografi-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-fotografi/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


               

<div class="office-card">
    <h3>Kantor Operasional</h3>

    <p>
        {{ $globalSiteSetting?->address ?: 'Alamat kantor belum tersedia.' }}
    </p>

    @if ($globalSiteSetting?->phone)
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $globalSiteSetting->phone) }}">
            {{ $globalSiteSetting->phone }}
        </a>
    @else
        <span>Nomor telepon belum tersedia.</span>
    @endif
</div>




            </aside>

        </div>

    </div>

</section>



@endsection