@extends('layouts.app')

@section('title', 'Peralatan Telekomunikasi - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-telekomunikasi.css') }}">
@endpush

@section('content')


{{-- =========================================================
     HERO TELEKOMUNIKASI
========================================================= --}}

<section class="telecom-hero">

    <div class="telecom-hero-overlay"></div>

    <div class="telecom-hero-content">

        <h1>
            PERDAGANGAN BESAR PERALATAN<br>
            TELEKOMUNIKASI
        </h1>

        <p>
            Mendukung kebutuhan komunikasi dan konektivitas
            untuk berbagai kebutuhan.
        </p>

        <a
            href="{{ route('services') }}"
            class="telecom-back-button"
        >
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     DETAIL CONTENT
========================================================= --}}

<section class="telecom-main">

    <div class="telecom-container">

        <div class="telecom-layout">


            {{-- =================================================
                 KOLOM KIRI
            ================================================== --}}

            <div class="telecom-left">


                {{-- FOTO TELEKOMUNIKASI --}}

                <div class="telecom-image">

                    <img
                        src="{{ asset('assets/images-layanan-telekomunikasi/telekomunikasi.png') }}"
                        alt="Peralatan Telekomunikasi"
                    >

                </div>


                {{-- =================================================
                     DESKRIPSI
                ================================================== --}}

                <div class="telecom-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti bergerak dalam perdagangan besar
                        peralatan telekomunikasi untuk mendukung kebutuhan
                        komunikasi dan konektivitas dalam aktivitas bisnis
                        maupun operasional.
                    </p>


                    {{-- =================================================
                         4 CARD KEUNGGULAN
                    ================================================== --}}

                    <div class="telecom-features">


                        {{-- CARD 1 --}}

                        <div class="telecom-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Telekomunikasi
                            </h3>

                            <p>
                                Menyediakan berbagai kebutuhan peralatan
                                yang termasuk dalam kategori telekomunikasi.
                            </p>

                        </div>


                        {{-- CARD 2 --}}

                        <div class="telecom-feature-card">

                            <h3>
                                <span></span>
                                Konektivitas
                            </h3>

                            <p>
                                Mendukung kebutuhan perangkat untuk aktivitas
                                komunikasi dan konektivitas.
                            </p>

                        </div>


                        {{-- CARD 3 --}}

                        <div class="telecom-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Bisnis
                            </h3>

                            <p>
                                Peralatan telekomunikasi untuk mendukung
                                kebutuhan operasional bisnis.
                            </p>

                        </div>


                        {{-- CARD 4 --}}

                        <div class="telecom-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk mendapatkan informasi
                                mengenai produk yang sesuai dengan kebutuhan Anda.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR KANAN
            ================================================== --}}

            <aside class="telecom-sidebar">


                {{-- =================================================
                     CARD KONSULTASI
                ================================================== --}}

                <div class="telecom-consultation-card">

                    <span class="telecom-consultation-label">
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
                        class="telecom-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="telecom-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="telecom-consultation-info">

                        <img
                            src="{{ asset('assets/images-layanan-telekomunikasi/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan
                            yang tersedia.
                        </span>

                    </div>


                    <div class="telecom-consultation-info">

                        <img
                            src="{{ asset('assets/images-layanan-telekomunikasi/ikonjam.png') }}"
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

                <div class="telecom-office-card">

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