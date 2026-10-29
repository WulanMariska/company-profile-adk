@extends('layouts.app')

@section('title', 'Perdagangan Besar Mesin, Peralatan dan Perlengkapan Pertanian - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-pertanian.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="agriculture-detail-hero">

    <div class="agriculture-detail-hero-overlay"></div>

    <div class="agriculture-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR MESIN, PERALATAN<br>
            &amp; PERLENGKAPAN PERTANIAN
        </h1>

        <p>
            Mendukung kebutuhan kegiatan pertanian melalui mesin,
            peralatan, dan perlengkapan yang sesuai.
        </p>

        <a href="{{ route('services') }}" class="agriculture-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="agriculture-detail-main">

    <div class="agriculture-detail-container">

        <div class="agriculture-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="agriculture-detail-left">


                {{-- GAMBAR UTAMA --}}

                <div class="agriculture-detail-image">

                    <img
                        src="{{ asset('assets/css/images-pertanian/peralatan-pertanian.png') }}"
                        alt="Perdagangan Besar Mesin, Peralatan dan Perlengkapan Pertanian"
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="agriculture-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar mesin, peralatan,
                        dan perlengkapan pertanian untuk mendukung berbagai kebutuhan kegiatan
                        pertanian.
                    </p>


                    {{-- 4 FEATURE CARD --}}

                    <div class="agriculture-detail-features">


                        <div class="agriculture-feature-card">

                            <h3>
                                <span></span>
                                Mesin Pertanian
                            </h3>

                            <p>
                                Mendukung kebutuhan penggunaan mesin dalam
                                kegiatan pertanian.
                            </p>

                        </div>


                        <div class="agriculture-feature-card">

                            <h3>
                                <span></span>
                                Perlengkapan Pertanian
                            </h3>

                            <p>
                                Melengkapi kebutuhan perlengkapan yang digunakan
                                dalam kegiatan pertanian.
                            </p>

                        </div>


                        <div class="agriculture-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Pertanian
                            </h3>

                            <p>
                                Menyediakan kebutuhan peralatan untuk menunjang
                                aktivitas pertanian.
                            </p>

                        </div>


                        <div class="agriculture-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Operasional
                            </h3>

                            <p>
                                Mendukung kebutuhan peralatan untuk aktivitas pertanian
                                sesuai penggunaannya.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="agriculture-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="agriculture-consultation-card">

                    <span class="agriculture-consultation-label">
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
                        class="agriculture-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="agriculture-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="agriculture-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-pertanian/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="agriculture-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-pertanian/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="agriculture-office-card">

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