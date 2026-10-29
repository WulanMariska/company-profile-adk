@extends('layouts.app')

@section('title', 'Peralatan & Perlengkapan Olahraga - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-peralatan-olahraga.css') }}">
@endpush

@section('content')

{{-- =========================
    HERO
========================= --}}
<section class="sports-detail-hero">

    <div class="sports-detail-hero-overlay"></div>

    <div class="sports-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR, PERALATAN &<br>
            PERLENGKAPAN OLAHRAGA
        </h1>

        <p>
            Lengkapi kebutuhan aktivitas olahraga dengan berbagai
            peralatan dan perlengkapan.
        </p>

        <a href="{{ route('services') }}" class="sports-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================
    MAIN CONTENT
========================= --}}
<section class="sports-detail-main">

    <div class="sports-detail-container">

        <div class="sports-detail-layout">

            {{-- =========================================
                BAGIAN KIRI
            ========================================= --}}
            <div class="sports-detail-left">

                {{-- GAMBAR --}}
                <div class="sports-detail-image">

                    <img
                        src="{{ asset('assets/css/images-peralatan-olahraga/peralatan-olahraga.png') }}"
                        alt="Peralatan dan Perlengkapan Olahraga"
                    >

                </div>


                {{-- DESKRIPSI --}}
                <div class="sports-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar
                        peralatan dan perlengkapan olahraga untuk mendukung
                        berbagai kebutuhan aktivitas olahraga.
                    </p>


                    {{-- 4 CARD --}}
                    <div class="sports-detail-features">

                        <div class="sports-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Olahraga
                            </h3>

                            <p>
                                Mendukung kebutuhan penggunaan peralatan
                                untuk berbagai aktivitas olahraga.
                            </p>

                        </div>


                        <div class="sports-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Individu
                            </h3>

                            <p>
                                Mendukung kebutuhan olahraga untuk penggunaan
                                pribadi.
                            </p>

                        </div>


                        <div class="sports-feature-card">

                            <h3>
                                <span></span>
                                Perlengkapan Olahraga
                            </h3>

                            <p>
                                Melengkapi kebutuhan aktivitas olahraga dengan
                                berbagai perlengkapan.
                            </p>

                        </div>


                        <div class="sports-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Kegiatan
                            </h3>

                            <p>
                                Mendukung kebutuhan peralatan dan perlengkapan
                                untuk berbagai kegiatan olahraga.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================
                SIDEBAR
            ========================================= --}}
            <aside class="sports-detail-sidebar">

                {{-- KONSULTASI --}}
                <div class="sports-consultation-card">

                    <span class="sports-consultation-label">
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
                        class="sports-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="sports-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>

                    <div class="sports-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-peralatan-olahraga/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>

                    <div class="sports-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-peralatan-olahraga/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- KANTOR --}}
                <div class="sports-office-card">

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