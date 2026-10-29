@extends('layouts.app')

@section('title', 'Furniture & Interior - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-furniture-interior.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="furniture-detail-hero">

    <div class="furniture-detail-hero-overlay"></div>

    <div class="furniture-detail-hero-content">

        <h1>
            FURNITURE &amp; INTERIOR
        </h1>

        <p>
            Lengkapi ruang rumah, kantor, dan pertokoan dengan
            furniture serta perlengkapan interior.
        </p>

        <a href="{{ route('services') }}" class="furniture-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="furniture-detail-main">

    <div class="furniture-detail-container">

        <div class="furniture-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="furniture-detail-left">


                {{-- IMAGE --}}

                <div class="furniture-detail-image">

                    <img
                        src="{{ asset('assets/css/images-furniture-interior/furniture-interior.png') }}"
                        alt="Furniture & Interior"
                    >

                </div>


                {{-- DESCRIPTION --}}

                <div class="furniture-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar furniture,
                        karpet, dan perlengkapan pencahayaan untuk rumah tangga,
                        perkantoran, dan pertokoan.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="furniture-detail-features">


                        <div class="furniture-feature-card">

                            <h3>
                                <span></span>
                                Furniture
                            </h3>

                            <p>
                                Mendukung kebutuhan perabot untuk rumah,
                                kantor, dan ruang usaha.
                            </p>

                        </div>


                        <div class="furniture-feature-card">

                            <h3>
                                <span></span>
                                Perlengkapan Pencahayaan
                            </h3>

                            <p>
                                Mendukung kebutuhan pencahayaan untuk rumah,
                                perkantoran, dan pertokoan.
                            </p>

                        </div>


                        <div class="furniture-feature-card">

                            <h3>
                                <span></span>
                                Karpet
                            </h3>

                            <p>
                                Melengkapi kebutuhan interior untuk berbagai
                                jenis ruang.
                            </p>

                        </div>


                        <div class="furniture-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Ruang
                            </h3>

                            <p>
                                Membantu melengkapi kebutuhan furniture dan interior
                                sesuai fungsi ruang.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="furniture-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="furniture-consultation-card">

                    <span class="furniture-consultation-label">
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
                        class="furniture-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="furniture-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="furniture-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-furniture-interior/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="furniture-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-furniture-interior/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="furniture-office-card">

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