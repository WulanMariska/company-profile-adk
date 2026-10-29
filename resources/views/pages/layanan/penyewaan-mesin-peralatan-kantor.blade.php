@extends('layouts.app')

@section('title', 'Penyewaan & Sewa Guna Usaha Mesin & Peralatan Kantor - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-penyewaan-alatkantor.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="office-rental-detail-hero">

    <div class="office-rental-detail-hero-overlay"></div>

    <div class="office-rental-detail-hero-content">

        <h1>
            PENYEWAAN &amp; SEWA GUNA USAHA MESIN<br>
            &amp; PERALATAN KANTOR
        </h1>

        <p>
            Mendukung kebutuhan operasional kantor melalui layanan
            penyewaan dan sewa guna usaha.
        </p>

        <a href="{{ route('services') }}" class="office-rental-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="office-rental-detail-main">

    <div class="office-rental-detail-container">

        <div class="office-rental-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="office-rental-detail-left">


                {{-- IMAGE --}}

                <div class="office-rental-detail-image">

                    <img
                        src="{{ asset('assets/css/images-penyewaan-alatkantor/penyewa_alatkantor.png') }}"
                        alt="Penyewaan dan Sewa Guna Usaha Mesin dan Peralatan Kantor"
                    >

                </div>


                {{-- DESCRIPTION --}}

                <div class="office-rental-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan layanan penyewaan
                        dan sewa guna usaha mesin dan peralatan kantor
                        untuk mendukung kebutuhan operasional perkantoran
                        sesuai kebutuhan pelanggan.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="office-rental-detail-features">


                        <div class="office-rental-feature-card">

                            <h3>
                                <span></span>
                                Mesin Kantor
                            </h3>

                            <p>
                                Mendukung kebutuhan penggunaan mesin yang
                                diperlukan dalam aktivitas perkantoran.
                            </p>

                        </div>


                        <div class="office-rental-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Operasional
                            </h3>

                            <p>
                                Membantu memenuhi kebutuhan peralatan untuk
                                mendukung aktivitas operasional kantor.
                            </p>

                        </div>


                        <div class="office-rental-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Kantor
                            </h3>

                            <p>
                                Menyediakan solusi penyewaan dan sewa guna usaha
                                untuk kebutuhan peralatan kantor.
                            </p>

                        </div>


                        <div class="office-rental-feature-card">

                            <h3>
                                <span></span>
                                Sesuai Kebutuhan
                            </h3>

                            <p>
                                Informasi layanan dapat dikonsultasikan berdasarkan
                                kebutuhan penggunaan.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="office-rental-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="office-rental-consultation-card">

                    <span class="office-rental-consultation-label">
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
                        class="office-rental-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="office-rental-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="office-rental-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-penyewaan-alatkantor/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="office-rental-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-penyewaan-alatkantor/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="office-rental-office-card">

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