@extends('layouts.app')

@section('title', 'Beranda - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')

{{-- Folder foto beranda. Jika foldermu berbeda (mis. assets/css/images-beranda), ubah di sini saja. --}}
@php $img = asset('assets/images-beranda'); @endphp


{{-- =====================================================
     HERO
===================================================== --}}
<section class="home-hero">
   <img
    class="home-hero-bg"
    src="{{ $settings?->hero_image ? asset('storage/' . $settings->hero_image) : $img . '/hero_beranda.png' }}"
    alt=""
>

    <div class="home-hero-content">
        <p class="home-hero-label">PT. Ari Dharma Kanti</p>

        <h1>
            SOLUSI LENGKAP<br>
            UNTUK<br>
            KEBUTUHAN <span>BISNIS</span><br>
            DAN RUMAH ANDA
        </h1>

       <p class="home-hero-text">
            {{ $settings?->hero_description ?: 'Menyediakan berbagai produk 
            berkualitas dengan harga kompetitif serta layanan profesional 
            untuk memenuhi kebutuhan Anda.' }}
        </p>

        <div class="home-hero-actions">
            <a href="{{ $settings?->hero_link ?: url('/layanan') }}"
            class="home-btn home-btn-red">
                {{ $settings?->hero_button ?: 'Lihat Produk' }}
                <span aria-hidden="true">→</span>
            </a>

            <a href="{{ $settings?->hero_second_link ?: url('/tentang-kami') }}"
            class="home-btn home-btn-white">
                {{ $settings?->hero_second_button ?: 'Pelajari Lebih Lanjut' }}
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>


{{-- =====================================================
     KEUNGGULAN
===================================================== --}}
<section class="home-features">
    <div class="home-features-inner">

        <div class="home-feature">
            <img src="{{ $img }}/ikonprodukberkualitas.png" alt="">
            <div>
                <strong>Produk Berkualitas</strong>
                <span>Pilihan terbaik untuk kebutuhan Anda</span>
            </div>
        </div>

        <div class="home-feature">
            <img src="{{ $img }}/ikonhargakompetitif.png" alt="">
            <div>
                <strong>Harga Kompetitif</strong>
                <span>Harga terjangkau dengan kualitas unggul</span>
            </div>
        </div>

        <div class="home-feature">
            <img src="{{ $img }}/ikonstoklengkap.png" alt="">
            <div>
                <strong>Stok Lengkap</strong>
                <span>Tersedia berbagai produk</span>
            </div>
        </div>

        <div class="home-feature">
            <img src="{{ $img }}/ikonlayananprofesional.png" alt="">
            <div>
                <strong>Layanan Profesional</strong>
                <span>Didukung tim berpengalaman</span>
            </div>
        </div>

    </div>
</section>


{{-- =====================================================
     LAYANAN KAMI
===================================================== --}}
<section class="home-services">
    <div class="home-services-head">
        <h2 class="home-label home-label-center"><i></i>Layanan Kami</h2>
        <h3>Solusi Komprehensif Untuk Anda</h3>
        <p>
            Kami menawarkan berbagai layanan dan produk untuk memenuhi kebutuhan
            bisnis dan operasional perusahaan Anda.
        </p>
    </div>

    <div class="home-cards">

        <a class="home-card" href="{{ url('/layanan/sepeda-motor-baru') }}">
            <div class="home-card-media"><img src="{{ $img }}/motor_beranda.png" alt="Sepeda motor baru" loading="lazy"></div>
            <div class="home-card-body">
                <h4>Perdagangan Eceran Sepeda Motor Baru</h4>
                <p>Berbagai pilihan sepeda motor baru untuk memenuhi kebutuhan mobilitas.</p>
            </div>
        </a>

        <a class="home-card" href="{{ url('/layanan/peralatan-telekomunikasi') }}">
            <div class="home-card-media"><img src="{{ $img }}/telekomunikasi.png" alt="Peralatan telekomunikasi" loading="lazy"></div>
            <div class="home-card-body">
                <h4>Peralatan Telekomunikasi</h4>
                <p>Peralatan telekomunikasi untuk mendukung kebutuhan komunikasi dan operasional.</p>
            </div>
        </a>

        <a class="home-card" href="{{ url('/layanan/penyewaan-mesin-peralatan-kantor') }}">
            <div class="home-card-media"><img src="{{ $img }}/penyewa_alatkantor.png" alt="Mesin dan peralatan kantor" loading="lazy"></div>
            <div class="home-card-body">
                <h4>Penyewaan Mesin &amp; Peralatan Kantor</h4>
                <p>Layanan penyewaan mesin dan peralatan untuk kebutuhan perkantoran.</p>
            </div>
        </a>

        <a class="home-card" href="{{ url('/layanan/komputer-perlengkapannya') }}">
            <div class="home-card-media"><img src="{{ $img }}/komputer.png" alt="Komputer dan perlengkapannya" loading="lazy"></div>
            <div class="home-card-body">
                <h4>Komputer &amp; Perlengkapannya</h4>
                <p>Perangkat komputer dan perlengkapannya untuk kebutuhan digital.</p>
            </div>
        </a>

    </div>

    <div class="home-center">
        <a href="{{ url('/layanan') }}" class="home-btn-outline">Kenali Layanan Kami <span aria-hidden="true">→</span></a>
    </div>
</section>


{{-- =====================================================
     GALERI LAYANAN (SLIDER)
===================================================== --}}
<section class="home-gallery">
    <div class="home-container">
        <h2 class="home-label"><i></i>Galeri Layanan</h2>
        <p class="home-gallery-sub">Dokumentasi produk, layanan PT. Ari Dharma Kanti</p>
    </div>

    <div class="home-carousel" id="homeCarousel" role="region" aria-roledescription="carousel" aria-label="Galeri layanan">
        <div class="home-carousel-track">
            @forelse (($galleryItems ?? collect()) as $item)
    <figure class="home-slide">
        <img
            src="{{ asset('storage/' . $item->image_path) }}"
            alt="{{ $item->title }}"
            loading="lazy"
        >
    </figure>
@empty
    <figure class="home-slide">
        <img src="{{ $img }}/dapur_beranda.png" alt="Peralatan masak dan dapur" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/motor.png" alt="Sepeda motor" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/kamera_beranda.png" alt="Kamera dan fotografi" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/interior_beranda.png" alt="Interior dan furniture" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/laptop.jpg" alt="Laptop dan teknologi informasi" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/alat-gym.jpg" alt="Peralatan olahraga" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/piranti_beranda.png" alt="Piranti lunak" loading="lazy">
    </figure>
    <figure class="home-slide">
        <img src="{{ $img }}/lampu.jpg" alt="Lampu dan elektronik" loading="lazy">
    </figure>
@endforelse
            
        </div>
    </div>

    <div class="home-carousel-nav">
        <button type="button" id="homePrev" aria-label="Foto sebelumnya">←</button>
        <button type="button" id="homeNext" aria-label="Foto berikutnya">→</button>
    </div>

    <div class="home-center">
        <a href="{{ url('/galeri') }}" class="home-btn-outline">Kepoin Galeri Kami <span aria-hidden="true">→</span></a>
    </div>
</section>


{{-- =====================================================
     TENTANG KAMI
===================================================== --}}
<section class="home-about">
    <div class="home-container">
        <h2 class="home-label"><i></i>Tentang Kami</h2>
       <p>
            {{ $settings?->about_summary ?: 'PT. Ari Dharma Kanti menyediakan 
            beragam produk dan layanan melalui berbagai bidang usaha, mencakup kebutuhan otomotif,
            telekomunikasi, teknologi, elektronik, furniture dan interior, hingga peralatan olahraga, 
            fotografi, dan pertanian.' }}
        </p>
    </div>
</section>






{{-- =====================================================
     JAVASCRIPT SLIDER
===================================================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    var root = document.getElementById('homeCarousel');
    if (!root) return;

    var slides = Array.prototype.slice.call(root.querySelectorAll('.home-slide'));
    var prev = document.getElementById('homePrev');
    var next = document.getElementById('homeNext');
    var total = slides.length;
    var current = 2; /* foto kamera berada di tengah saat pertama dibuka */

    function render() {
        slides.forEach(function (slide, i) {
            var d = ((i - current) % total + total) % total;
            if (d > total / 2) d -= total;

            slide.setAttribute('data-pos', Math.abs(d) <= 2 ? d : 'hidden');
            slide.setAttribute('aria-hidden', d === 0 ? 'false' : 'true');
        });
    }

    function go(index) {
        current = (index + total) % total;
        render();
    }

    prev.addEventListener('click', function () { go(current - 1); });
    next.addEventListener('click', function () { go(current + 1); });

    slides.forEach(function (slide, i) {
        slide.addEventListener('click', function () { go(i); });
    });

    root.setAttribute('tabindex', '0');
    root.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft')  go(current - 1);
        if (e.key === 'ArrowRight') go(current + 1);
    });

    /* geser jari di HP */
    var startX = null;
    root.addEventListener('touchstart', function (e) {
        startX = e.touches[0].clientX;
    }, { passive: true });
    root.addEventListener('touchend', function (e) {
        if (startX === null) return;
        var diff = e.changedTouches[0].clientX - startX;
        if (Math.abs(diff) > 40) go(diff < 0 ? current + 1 : current - 1);
        startX = null;
    });

    render();
});
</script>

@endsection
