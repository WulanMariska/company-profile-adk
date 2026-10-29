@extends('layouts.app')

@section('title', 'Perdagangan Besar Piranti Lunak - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-piranti-lunak.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="software-detail-hero">

    <div class="software-detail-hero-overlay"></div>

    <div class="software-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR PIRANTI LUNAK
        </h1>

        <p>
            Mendukung kebutuhan digital dan operasional melalui
            piranti lunak yang sesuai.
        </p>

        <a href="{{ route('services') }}" class="software-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="software-detail-main">

    <div class="software-detail-container">

        <div class="software-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="software-detail-left">


                {{-- IMAGE --}}

                <div class="software-detail-image">

                    <img
                        src="{{ asset('assets/css/images-piranti-lunak/piranti-lunak.png') }}"
                        alt="Perdagangan Besar Piranti Lunak"
                    >

                </div>


                {{-- DESCRIPTION --}}

                <div class="software-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar
                        piranti lunak untuk mendukung berbagai kebutuhan digital
                        dan operasional yang membutuhkan solusi perangkat lunak.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="software-detail-features">


                        <div class="software-feature-card">

                            <h3>
                                <span></span>
                                Piranti Lunak
                            </h3>

                            <p>
                                Menyediakan produk dalam kategori perangkat lunak
                                untuk berbagai kebutuhan penggunaan.
                            </p>

                        </div>


                        <div class="software-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Operasional
                            </h3>

                            <p>
                                Mendukung penggunaan perangkat lunak untuk
                                menunjang aktivitas operasional.
                            </p>

                        </div>


                        <div class="software-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Digital
                            </h3>

                            <p>
                                Mendukung aktivitas yang membutuhkan perangkat
                                lunak dalam lingkungan digital.
                            </p>

                        </div>


                        <div class="software-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk mendapatkan informasi lebih lanjut
                                mengenai piranti lunak yang dibutuhkan.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="software-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="software-consultation-card">

                    <span class="software-consultation-label">
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
                        class="software-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="software-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="software-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-piranti-lunak/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="software-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-piranti-lunak/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="software-office-card">

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