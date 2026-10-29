@extends('layouts.app')

@section('title', 'Perdagangan Besar Suku Cadang Elektronik - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-suku-cadang.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="electronic-parts-detail-hero">

    <div class="electronic-parts-detail-hero-overlay"></div>

    <div class="electronic-parts-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR SUKU CADANG ELEKTRONIK
        </h1>

        <p>
            Mendukung kebutuhan penggantian dan pemeliharaan
            perangkat melalui suku cadang elektronik.
        </p>

        <a href="{{ route('services') }}" class="electronic-parts-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="electronic-parts-detail-main">

    <div class="electronic-parts-detail-container">

        <div class="electronic-parts-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="electronic-parts-detail-left">


                {{-- IMAGE UTAMA --}}

                <div class="electronic-parts-detail-image">

                    <img
                        src="{{ asset('assets/css/images-suku-cadang/suku-cadang-elektronik.png') }}"
                        alt="Perdagangan Besar Suku Cadang Elektronik"
                    >

                </div>


                {{-- DESCRIPTION --}}

                <div class="electronic-parts-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar suku cadang elektronik
                        untuk memenuhi kebutuhan yang berkaitan dengan penggantian dan
                        pemeliharaan komponen elektronik.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="electronic-parts-detail-features">


                        <div class="electronic-parts-feature-card">

                            <h3>
                                <span></span>
                                Suku Cadang Elektronik
                            </h3>

                            <p>
                                Mendukung kebutuhan komponen pengganti untuk
                                perangkat elektronik.
                            </p>

                        </div>


                        <div class="electronic-parts-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Perangkat
                            </h3>

                            <p>
                                Menyediakan kategori suku cadang untuk mendukung
                                kebutuhan perangkat elektronik.
                            </p>

                        </div>


                        <div class="electronic-parts-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Pemeliharaan
                            </h3>

                            <p>
                                Mendukung kebutuhan pemeliharaan dan penggantian
                                komponen perangkat.
                            </p>

                        </div>


                        <div class="electronic-parts-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk mendapatkan informasi mengenai
                                suku cadang elektronik yang dibutuhkan.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="electronic-parts-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="electronic-parts-consultation-card">

                    <span class="electronic-parts-consultation-label">
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
                        class="electronic-parts-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="electronic-parts-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="electronic-parts-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-suku-cadang/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="electronic-parts-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-suku-cadang/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="electronic-parts-office-card">

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