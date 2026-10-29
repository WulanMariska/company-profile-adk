@extends('layouts.app')

@section('title', 'Layanan - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/layanan.css') }}">
@endpush

@section('content')

{{-- =========================================================
     HERO LAYANAN
========================================================= --}}
<section class="service-hero">

    <img
        src="{{ asset('assets/images-layanan/hero-layanan.png') }}"
        alt="Produk dan Layanan PT. Ari Dharma Kanti"
        class="service-hero-bg"
    >

    <div class="service-hero-content">

        <h1>PRODUK &amp; LAYANAN KAMI</h1>

        <p>
            Kami menyediakan berbagai kebutuhan komersial
            dengan standar kualitas terbaik untuk
            mendukung pertumbuhan bisnis Anda.
        </p>

        <div class="service-hero-badge">
            <strong>12+</strong>

            <span>
                Kategori Produk<br>
                dan Layanan
            </span>
        </div>

    </div>

</section>


{{-- =========================================================
     PRODUK & LAYANAN
========================================================= --}}

{{-- PRODUK & LAYANAN DARI CMS --}}
<section class="service-section">
    <div class="service-grid">

        @forelse ($productsServices as $item)
            <article class="service-card">

                @if ($item->card_image)
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->card_image) }}"
                        alt="{{ $item->name }}"
                        loading="lazy"
                    >
                @else
                    <img
                        src="{{ asset('assets/images-layanan/hero-layanan.png') }}"
                        alt="{{ $item->name }}"
                        loading="lazy"
                    >
                @endif

                <div class="service-card-content">
                    <h3>{{ $item->name }}</h3>

                    <p>
                        {{ $item->short_description ?: $item->description }}
                    </p>

                    <a href="{{ route('service.detail', ['slug' => $item->slug]) }}">
                        Lihat Detail&nbsp; →
                    </a>
                
                </div>

            </article>
        @empty
            <p class="service-empty">
                Belum ada produk atau layanan yang tersedia.
            </p>
        @endforelse

    </div>
</section>





@endsection