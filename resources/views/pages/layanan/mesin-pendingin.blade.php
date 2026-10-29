@extends('layouts.app')

@section('title', 'Industri Mesin Pendingin - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-mesin-pendingin.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}
<section class="cooling-hero">

    <div class="cooling-hero-overlay"></div>

    <div class="cooling-hero-content">

        <h1>
            INDUSTRI MESIN PENDINGIN
        </h1>

        <p>
            Mendukung kebutuhan pendinginan untuk berbagai
            kebutuhan rumah tangga maupun usaha.
        </p>

        <a href="{{ route('services') }}" class="cooling-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     DETAIL CONTENT
========================================================= --}}
<section class="cooling-main">

    <div class="cooling-container">

        <div class="cooling-layout">


            {{-- =================================================
                 BAGIAN KIRI
            ================================================== --}}
            <div class="cooling-left">


                {{-- FOTO UTAMA --}}
                <div class="cooling-image">

                    <img
                        src="{{ asset('assets/images-layanan-mesin-pendingin/mesin-pendingin.png') }}"
                        alt="Industri Mesin Pendingin"
                    >

                </div>


                {{-- =================================================
                     DESKRIPSI
                ================================================== --}}
                <div class="cooling-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti bergerak dalam industri mesin
                        pendingin untuk memenuhi kebutuhan perangkat pendinginan
                        yang sesuai dengan penggunaan yang diperlukan.
                    </p>


                    {{-- =================================================
                         4 FEATURE CARD
                    ================================================== --}}
                    <div class="cooling-features">


                        {{-- CARD 1 --}}
                        <div class="cooling-feature-card">

                            <h3>
                                <span></span>
                                Mesin Pendingin
                            </h3>

                            <p>
                                Menyediakan produk dalam kategori mesin pendingin
                                untuk berbagai kebutuhan penggunaan.
                            </p>

                        </div>


                        {{-- CARD 2 --}}
                        <div class="cooling-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Usaha
                            </h3>

                            <p>
                                Mendukung kebutuhan pendinginan yang berkaitan
                                dengan aktivitas dan operasional usaha.
                            </p>

                        </div>


                        {{-- CARD 3 --}}
                        <div class="cooling-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Rumah Tangga
                            </h3>

                            <p>
                                Mendukung kebutuhan pendinginan dalam lingkungan
                                rumah tangga.
                            </p>

                        </div>


                        {{-- CARD 4 --}}
                        <div class="cooling-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk memperoleh informasi lebih lanjut
                                mengenai mesin pendingin yang dibutuhkan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR KANAN
                 STICKY SAAT SCROLL
            ================================================== --}}
            <aside class="cooling-sidebar">


                {{-- =================================================
                     KONSULTASI
                ================================================== --}}
                <div class="cooling-consultation">

                    <span class="cooling-consultation-label">
                        KONSULTASI KEBUTUHAN
                    </span>

                    <h3>
                        Temukan Solusi yang Sesuai
                    </h3>

                    <p>
                        Sampaikan kebutuhan Anda kepada tim PT. Ari Dharma Kanti
                        untuk mendapatkan informasi mengenai produk yang tersedia.
                    </p>


                    <a
                        href="{{ route('contact') }}"
                        class="cooling-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="cooling-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    {{-- INFO 1 --}}
                    <div class="cooling-consultation-info">

                        <img
                            src="{{ asset('assets/images-layanan-mesin-pendingin/ikonkotak.png') }}"
                            alt="Informasi produk"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    {{-- INFO 2 --}}
                    <div class="cooling-consultation-info">

                        <img
                            src="{{ asset('assets/images-layanan-mesin-pendingin/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- =================================================
                     KANTOR OPERASIONAL
                ================================================== --}}
                <div class="cooling-office">

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