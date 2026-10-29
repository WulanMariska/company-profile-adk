```blade
@extends('layouts.app')

@section('title', 'Sepeda Motor Baru - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-motor.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO DETAIL MOTOR
========================================================= --}}

<section class="detail-hero">

    <div class="detail-hero-overlay"></div>

    <div class="detail-hero-content">

        <h1>
            PERDAGANGAN ECERAN SEPEDA<br>
            MOTOR BARU
        </h1>

        <p>
            Pilihan sepeda motor baru untuk mendukung kebutuhan
            mobilitas Anda.
        </p>

        <a href="{{ route('services') }}" class="detail-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>

    </div>

</section>


{{-- =========================================================
     DETAIL CONTENT
========================================================= --}}

<section class="detail-main">

    <div class="detail-container">

        <div class="detail-layout">

            {{-- =================================================
                 KOLOM KIRI
            ================================================== --}}

            <div class="detail-left">

                {{-- FOTO MOTOR --}}

                <div class="detail-image">

                    <img
                        src="{{ asset('assets/images-layanan-motor/motor.png') }}"
                        alt="Perdagangan Eceran Sepeda Motor Baru"
                    >

                </div>


                {{-- =================================================
                     DESKRIPSI
                ================================================== --}}

                <div class="detail-description">

                    <h2>
                        Deskripsi &amp; Ruang Lingkup Pasokan
                    </h2>

                    <p>
                        PT. Ari Dharma Kanti menyediakan perdagangan eceran
                        sepeda motor baru untuk memenuhi kebutuhan mobilitas
                        pelanggan. Informasi produk dapat disesuaikan dengan
                        kebutuhan penggunaan dan aktivitas pelanggan.
                    </p>


                    {{-- 4 CARD KEUNGGULAN --}}

                    <div class="detail-features">

                        <div class="detail-feature-card">

                            <h3>
                                <span></span>
                                Mobilitas Sehari-hari
                            </h3>

                            <p>
                                Pilihan sepeda motor untuk mendukung berbagai
                                aktivitas dan kebutuhan mobilitas sehari-hari.
                            </p>

                        </div>


                        <div class="detail-feature-card">

                            <h3>
                                <span></span>
                                Pilihan Kendaraan
                            </h3>

                            <p>
                                Membantu pelanggan mendapatkan informasi
                                mengenai pilihan sepeda motor baru sesuai
                                kebutuhannya.
                            </p>

                        </div>


                        <div class="detail-feature-card">

                            <h3>
                                <span></span>
                                Kebutuhan Pribadi
                            </h3>

                            <p>
                                Mendukung kebutuhan kendaraan untuk penggunaan
                                pribadi dan aktivitas sehari-hari.
                            </p>

                        </div>


                        <div class="detail-feature-card">

                            <h3>
                                <span></span>
                                Informasi Produk
                            </h3>

                            <p>
                                Hubungi kami untuk memperoleh informasi lebih
                                lanjut mengenai produk yang Anda butuhkan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR KANAN
            ================================================== --}}

            <aside class="detail-sidebar">

                @include('partials.consultation')

            </aside>

        </div>

    </div>

</section>

@endsection
```