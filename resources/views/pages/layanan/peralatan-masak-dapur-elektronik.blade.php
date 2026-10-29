@extends('layouts.app')

@section('title', 'Perdagangan Besar Peralatan Masak, Peralatan Dapur, dan Elektronik Rumah Tangga - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-alat-dapur.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

<section class="kitchen-detail-hero">

    <div class="kitchen-detail-hero-overlay"></div>

    <div class="kitchen-detail-hero-content">

        <h1>
            PERDAGANGAN BESAR PERALATAN MASAK, PERALATAN<br>
            DAPUR, ELEKTRONIK RUMAH TANGGA
        </h1>

        <p>
            Lengkapi kebutuhan rumah dan usaha dengan berbagai
            peralatan yang menunjang aktivitas sehari-hari.
        </p>

        <a href="{{ route('services') }}" class="kitchen-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     MAIN CONTENT
========================================================= --}}

<section class="kitchen-detail-main">

    <div class="kitchen-detail-container">

        <div class="kitchen-detail-layout">


            {{-- =================================================
                 LEFT CONTENT
            ================================================= --}}

            <div class="kitchen-detail-left">


                {{-- GAMBAR UTAMA --}}

                <div class="kitchen-detail-image">

                    <img
                        src="{{ asset('assets/css/images-alat-dapur/alat-dapur.png') }}"
                        alt="Peralatan Masak, Peralatan Dapur dan Elektronik Rumah Tangga"
                    >

                </div>


                {{-- DESKRIPSI --}}

                <div class="kitchen-detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan besar peralatan masak,
                        peralatan dapur, dan elektronik rumah tangga untuk memenuhi berbagai
                        kebutuhan penggunaan rumah tangga maupun kebutuhan usaha.
                    </p>


                    {{-- FEATURE CARDS --}}

                    <div class="kitchen-detail-features">


                        <div class="kitchen-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Masak
                            </h3>

                            <p>
                                Mendukung kebutuhan memasak dengan berbagai
                                jenis peralatan yang sesuai.
                            </p>

                        </div>


                        <div class="kitchen-feature-card">

                            <h3>
                                <span></span>
                                Elektronik Rumah Tangga
                            </h3>

                            <p>
                                Mendukung berbagai kebutuhan penggunaan
                                elektronik dalam aktivitas sehari-hari.
                            </p>

                        </div>


                        <div class="kitchen-feature-card">

                            <h3>
                                <span></span>
                                Peralatan Dapur
                            </h3>

                            <p>
                                Melengkapi kebutuhan aktivitas dan perlengkapan
                                dapur.
                            </p>

                        </div>


                        <div class="kitchen-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Usaha
                            </h3>

                            <p>
                                Pilihan peralatan untuk mendukung kebutuhan operasional
                                usaha yang berkaitan dengan kategori tersebut.
                            </p>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR
            ================================================= --}}

            <aside class="kitchen-detail-sidebar">


                {{-- CONSULTATION CARD --}}

                <div class="kitchen-consultation-card">

                    <span class="kitchen-consultation-label">
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
                        class="kitchen-consultation-primary"
                    >
                        Konsultasikan Kebutuhan Anda
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="kitchen-consultation-secondary"
                    >
                        Kirimkan Form Pengadaan
                    </a>


                    <div class="kitchen-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-alat-dapur/ikonkotak.png') }}"
                            alt="Informasi kontak"
                        >

                        <span>
                            Dapatkan informasi mengenai produk dan layanan yang tersedia.
                        </span>

                    </div>


                    <div class="kitchen-consultation-info">

                        <img
                            src="{{ asset('assets/css/images-alat-dapur/ikonjam.png') }}"
                            alt="Respons cepat"
                        >

                        <span>
                            Respons cepat dari tim kami.
                        </span>

                    </div>

                </div>


                {{-- OFFICE CARD --}}

                <div class="kitchen-office-card">

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