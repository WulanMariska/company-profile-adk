@extends('layouts.app')

@section('title', 'Perdagangan Besar Komputer dan Perlengkapan Komputer - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-perdagangan-komputer.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="computer-detail-hero">

    <div class="computer-detail-hero-overlay"></div>

    <div class="computer-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR KOMPUTER dan<br>
            PERLENGKAPAN KOMPUTER
        </h1>

        <p>
            Dukung kebutuhan kerja, bisnis, dan aktivitas digital dengan
            perangkat komputer dan perlengkapannya.
        </p>

        <a href="{{ route('services') }}" class="computer-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="computer-detail-main">

    <div class="computer-detail-container">

        <div class="computer-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="computer-detail-left">


                {{-- GAMBAR UTAMA --}}

                <div class="computer-detail-image">

                    <img
                        src="{{ asset('assets/css/images-perdagangan-komputer/komputer.png') }}"
                        alt="Perdagangan Besar Komputer dan Perlengkapan Komputer"
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="computer-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar komputer
                        dan perlengkapan komputer untuk mendukung berbagai kebutuhan
                        digital, pekerjaan, dan operasional usaha.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="computer-detail-features">


                        <div class="computer-feature-card">

                            <h3>
                                <span></span>
                                Perangkat Komputer
                            </h3>

                            <p>
                                Mendukung kebutuhan komputer untuk berbagai
                                aktivitas kerja dan operasional.
                            </p>

                        </div>


                        <div class="computer-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Bisnis
                            </h3>

                            <p>
                                Mendukung kebutuhan komputer untuk aktivitas
                                dan operasional usaha.
                            </p>

                        </div>


                        <div class="computer-feature-card">

                            <h3>
                                <span></span>
                                Perlengkapan Komputer
                            </h3>

                            <p>
                                Melengkapi kebutuhan perangkat komputer dengan
                                perlengkapan yang sesuai.
                            </p>

                        </div>


                        <div class="computer-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Digital
                            </h3>

                            <p>
                                Menunjang berbagai aktivitas yang membutuhkan
                                perangkat komputer.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="computer-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="computer-consultation-card">

                    <span class="computer-consultation-label">
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
                        class="computer-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="computer-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="computer-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-perdagangan-komputer/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="computer-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-perdagangan-komputer/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="computer-office-card">

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