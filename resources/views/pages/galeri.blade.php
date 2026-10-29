
@extends('layouts.app')

@section('title', 'Galeri - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
@endpush

@section('content')

{{-- =====================================================
     HERO GALERI
===================================================== --}}
<section class="gallery-hero">
    <div class="gallery-hero-overlay"></div>

    <div class="gallery-hero-content">
        <h1>
            <span>Galeri</span>
            <span>Kami</span>
        </h1>

        <p>Dokumentasi produk dan layanan PT. Ari Dharma Kanti</p>
    </div>
</section>


{{-- =====================================================
     GALERI PRODUK DAN LAYANAN
===================================================== --}}
<section class="gallery-section">
    
<div class="gallery-grid">
    @forelse ($galleryItems as $item)
        @php
            $imageUrl = \Illuminate\Support\Facades\Storage::disk('public')
                ->url($item->image_path);
        @endphp

        <button
            type="button"
            class="gallery-item"
            data-full="{{ $imageUrl }}"
            data-title="{{ $item->title }}"
            data-description="{{ $item->description }}"
            aria-label="Lihat foto {{ $item->title }}"
        >
            <img
                src="{{ $imageUrl }}"
                alt="{{ $item->title }}"
                loading="lazy"
            >

            <span class="gallery-item-overlay">
                <span class="gallery-item-title">
                    {{ $item->title }}
                </span>

                <span class="gallery-item-description">
                    {{ $item->description }}
                </span>
            </span>
        </button>
    @empty
        <p>Belum ada foto galeri yang tersedia.</p>
    @endforelse

    </div>{{-- tutup .gallery-grid --}}
</section>{{-- tutup .gallery-section --}}


{{-- =====================================================
     INFO KUNJUNGAN
===================================================== --}}
<section class="gallery-visit">
    <div class="gallery-visit-inner">
        <h2>Ingin Mengunjungi Kantor &amp; Fasilitas Operasional Kami?</h2>
        <p>
            Kami siap menerima kunjungan koordinasi dan survei legalitas perusahaan
            di Jl. Tukad Yeh Aya No. 46, Denpasar.
        </p>
        <a href="{{ route('contact') }}">Atur Jadwal Kunjungan</a>
    </div>
</section>

{{-- =====================================================
     LIGHTBOX
===================================================== --}}
<div class="gallery-lightbox"
     id="galleryLightbox"
     role="dialog"
     aria-modal="true"
     aria-label="Pratinjau foto galeri"
     aria-hidden="true">

    <button type="button"
            class="gallery-lightbox-close"
            id="galleryLightboxClose"
            aria-label="Tutup gambar">
        &times;
    </button>

    <button type="button"
            class="gallery-lightbox-nav gallery-lightbox-prev"
            id="galleryPrev"
            aria-label="Foto sebelumnya">
        &#10094;
    </button>

    <img id="galleryLightboxImage"
         src=""
         alt="Pratinjau foto galeri">

    <button type="button"
            class="gallery-lightbox-nav gallery-lightbox-next"
            id="galleryNext"
            aria-label="Foto berikutnya">
        &#10095;
    </button>

    <p class="gallery-lightbox-counter" id="galleryCounter"></p>
</div>





{{-- =====================================================
     LIGHTBOX JAVASCRIPT
===================================================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const items = Array.from(document.querySelectorAll('.gallery-item'));
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImage = document.getElementById('galleryLightboxImage');
    const closeButton = document.getElementById('galleryLightboxClose');
    const prevButton = document.getElementById('galleryPrev');
    const nextButton = document.getElementById('galleryNext');
    const counter = document.getElementById('galleryCounter');

    if (!items.length || !lightbox || !lightboxImage) return;

    let currentIndex = 0;
    let previousFocus = null;

    function showImage(index) {
        currentIndex = (index + items.length) % items.length;

        const item = items[currentIndex];
        const image = item.querySelector('img');
        const title = item.dataset.title || (image ? image.alt : 'Foto galeri');
        const description = item.dataset.description || '';

        lightboxImage.src = item.dataset.full;
        lightboxImage.alt = title + (description ? '. ' + description : '');
        counter.textContent = (currentIndex + 1) + ' / ' + items.length;
    }

    function openLightbox(index) {
        previousFocus = document.activeElement;

        showImage(index);

        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('gallery-no-scroll');

        closeButton.focus();
    }

    function closeLightbox() {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImage.src = '';
        document.body.classList.remove('gallery-no-scroll');

        if (previousFocus) {
            previousFocus.focus();
        }
    }

    items.forEach(function (item, index) {
        item.addEventListener('click', function () {
            openLightbox(index);
        });
    });

    closeButton.addEventListener('click', closeLightbox);

    prevButton.addEventListener('click', function () {
        showImage(currentIndex - 1);
    });

    nextButton.addEventListener('click', function () {
        showImage(currentIndex + 1);
    });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('is-open')) return;

        if (event.key === 'Escape') {
            closeLightbox();
        }

        if (event.key === 'ArrowLeft') {
            showImage(currentIndex - 1);
        }

        if (event.key === 'ArrowRight') {
            showImage(currentIndex + 1);
        }
    });
});
</script>

@endsection
