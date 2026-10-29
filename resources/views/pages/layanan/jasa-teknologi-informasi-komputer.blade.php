@extends('layouts.app')

@section('title', 'Aktivitas Jasa Teknologi Informasi & Komputer Lainnya - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-jasa-ti.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="ti-detail-hero">

    <div class="ti-detail-hero-overlay"></div>

    <div class="ti-detail-hero-content">

        <h1>
            AKTIVITAS JASA TEKNOLOGI INFORMASI<br>
            &amp; KOMPUTER LAINNYA
        </h1>

        <p>
            Mendukung kebutuhan teknologi informasi dan komputer
            untuk aktivitas digital dan operasional.
        </p>

        <a href="{{ route('services') }}" class="ti-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="ti-detail-main">

    <div class="ti-detail-container">

        <div class="ti-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="ti-detail-left">


                {{-- IMAGE --}}

                <div class="ti-detail-image">

                    <img
                        src="{{ asset('assets/css/images-jasa-ti/jasa-teknologi-informasi.png') }}"
                        alt="Aktivitas Jasa Teknologi Informasi dan Komputer Lainnya"
                    >

                </div>


                {{-- DESCRIPTION --}}

                <div class="ti-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan aktivitas jasa teknologi
                        informasi dan komputer lainnya untuk mendukung kebutuhan
                        teknologi dan aktivitas digital.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="ti-detail-features">


                        <div class="ti-feature-card">

                            <h3>
                                <span></span>
                                Teknologi Informasi
                            </h3>

                            <p>
                                Mendukung kebutuhan yang berkaitan dengan
                                teknologi informasi.
                            </p>

                        </div>


                        <div class="ti-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Digital
                            </h3>

                            <p>
                                Membantu menunjang aktivitas yang membutuhkan
                                dukungan teknologi dan komputer.
                            </p>

                        </div>


                        <div class="ti-feature-card">

                            <h3>
                                <span></span>
                                Komputer
                            </h3>

                            <p>
                                Mendukung kebutuhan yang berkaitan dengan penggunaan
                                dan perangkat komputer.
                            </p>

                        </div>


                        <div class="ti-feature-card">

                            <h3>
                                <span></span>
                                Konsultasi Kebutuhan
                            </h3>

                            <p>
                                Hubungi kami untuk membicarakan kebutuhan teknologi
                                informasi dan komputer Anda.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="ti-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="ti-consultation-card">

                    <span class="ti-consultation-label">
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
                        class="ti-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="ti-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="ti-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-jasa-ti/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="ti-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-jasa-ti/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="ti-office-card">

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