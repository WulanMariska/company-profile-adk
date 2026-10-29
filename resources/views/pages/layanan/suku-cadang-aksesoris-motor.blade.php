@extends('layouts.app')

@section('title', 'Perdagangan Eceran Suku Cadang Sepeda Motor dan Aksesorisnya - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-aksesoris-motor.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="accessories-detail-hero">

    <div class="accessories-detail-hero-overlay"></div>

    <div class="accessories-detail-hero-content">

        <h1>
            PERDAGANGAN ECERAN SUKU CADANGAN<br>
            SEPEDA MOTOR dan AKSESORISNYA
        </h1>

        <p>
            Lengkapi kebutuhan kendaraan Anda dengan suku cadang
            dan aksesoris sepeda motor.
        </p>

        <a href="{{ route('services') }}" class="accessories-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="accessories-detail-main">

    <div class="accessories-detail-container">

        <div class="accessories-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="accessories-detail-left">

                {{-- GAMBAR UTAMA --}}

                <div class="accessories-detail-image">

                    <img
                        src="{{ asset('assets/css/images-aksesoris-motor/aksesoris-motor.png') }}"
                        alt="Suku Cadang Sepeda Motor dan Aksesorisnya"
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="accessories-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan eceran
                        suku cadang sepeda motor dan aksesorisnya untuk memenuhi
                        kebutuhan kelengkapan serta pemeliharaan kendaraan.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="accessories-detail-features">

                        <div class="accessories-feature-card">

                            <h3>
                                <span></span>
                                Suku Cadang Sepeda Motor
                            </h3>

                            <p>
                                Menyediakan kebutuhan suku cadang untuk
                                mendukung pemeliharaan kendaraan.
                            </p>

                        </div>


                        <div class="accessories-feature-card">

                            <h3>
                                <span></span>
                                Aksesoris Kendaraan
                            </h3>

                            <p>
                                Pilihan aksesoris untuk melengkapi kebutuhan
                                penggunaan sepeda motor.
                            </p>

                        </div>


                        <div class="accessories-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Perawatan
                            </h3>

                            <p>
                                Mendukung kebutuhan penggantian dan pemeliharaan
                                komponen kendaraan.
                            </p>

                        </div>


                        <div class="accessories-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk mendapatkan informasi mengenai
                                kebutuhan suku cadang dan aksesoris.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="accessories-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="accessories-consultation-card">

                    <span class="accessories-consultation-label">
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
                        class="accessories-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="accessories-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="accessories-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-aksesoris-motor/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="accessories-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-aksesoris-motor/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="accessories-office-card">

                    <h3>
                        Kantor Operasional
                    </h3>

                    <p>
                        JL. TUKAD YEH AYA NO. 46 DENPASAR, BALI
                    </p>

                    <a href="tel:08113383828">
                        08113383828
                    </a>

                </div>


            </aside>

        </div>

    </div>

</section>




@endsection