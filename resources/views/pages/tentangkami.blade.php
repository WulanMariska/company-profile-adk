
@extends('layouts.app')

@section('title', ($aboutPage?->title ?: 'Tentang Kami') . ' - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&family=Lora:wght@400;500;700&family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/tentangkami.css') }}">
@endpush

@section('content')

@php
    $img = asset('assets/css/images-tentang-kami');
@endphp

{{-- HERO --}}
<section class="about-hero" style="background-image: url('{{ $img }}/hero_beranda.png');">
    <div class="about-hero-content">
                <p class="about-hero-label">PT. Ari Dharma Kanti</p>

                @php
                    $heroTitle = trim($aboutPage?->title ?: 'TENTANG KAMI');
                    $titleWords = preg_split('/\s+/', $heroTitle);
                    $titleLast = array_pop($titleWords);
                    $titleFirst = implode(' ', $titleWords);
                @endphp

<h1 class="about-hero-title">
    @if ($titleFirst !== '')
        <span class="about-title-white">{{ $titleFirst }}</span>
    @endif
    <span class="about-title-red">{{ $titleLast }}</span>
</h1>

        <p class="about-hero-text">
            {{ $aboutPage?->subtitle ?: 'Mengenal lebih dekat PT. Ari Dharma Kanti dan berbagai bidang usaha yang dijalankan untuk memenuhi kebutuhan pelanggan.' }}
        </p>
    </div>
</section>

<div class="about-page">

    {{-- PROFILE PERUSAHAAN --}}
    <section class="about-block">
        <h2 class="about-label"><i></i>PROFILE PERUSAHAAN</h2>

        <article class="about-card about-profile" tabindex="0">
            <div class="about-profile-logo">
                @if (!empty($aboutPage?->image_path))
                    <img
                        src="{{ asset('storage/' . $aboutPage->image_path) }}"
                        alt="Gambar PT. Ari Dharma Kanti"
                    >
                @else
                    <img
                        src="{{ $img }}/logo.png"
                        alt="Logo PT. Ari Dharma Kanti"
                    >
                @endif
            </div>

            <div class="about-profile-text">
                <h3>{{ $aboutPage?->title ?: 'PT. Ari Dharma Kanti' }}</h3>

                @if (!empty($aboutPage?->content))
                    <div class="about-profile-description">
                        {!! $aboutPage->content !!}
                    </div>
                @else
                    <p>
                        PT. Ari Dharma Kanti merupakan perusahaan yang bergerak
                        dalam berbagai bidang usaha untuk mendukung kebutuhan pelanggan.
                    </p>
                @endif
            </div>
        </article>
    </section>

    {{-- VISI & MISI --}}
    <section class="about-block">
        <h2 class="about-label"><i></i>VISI &amp; MISI</h2>

        <article class="about-card about-visi" tabindex="0">
            <div class="about-visi-item">
                <h3>{{ $aboutPage?->vision_title ?: 'Visi Kami' }}</h3>

                @if (!empty($aboutPage?->vision_content))
                    <div class="about-visi-content">
                        {!! nl2br(e($aboutPage->vision_content)) !!}
                    </div>
                @endif
            </div>

            <div class="about-misi-item">
                <h3>{{ $aboutPage?->mission_title ?: 'Misi Kami' }}</h3>

                @if (!empty($aboutPage?->mission_content))
                    <div class="about-misi-content">
                        {!! nl2br(e($aboutPage->mission_content)) !!}
                    </div>
                @endif
            </div>
        </article>
    </section>

    {{-- KOMITMEN KAMI --}}
    <section class="about-block">
        <h2 class="about-label"><i></i>KOMITMEN KAMI</h2>

        <article class="about-card about-commit" tabindex="0">
            <div class="about-commit-img">
                @if (!empty($aboutPage?->commitment_image))
                    <img
                        src="{{ asset('storage/' . $aboutPage->commitment_image) }}"
                        alt="{{ $aboutPage?->commitment_title ?: 'Komitmen PT. Ari Dharma Kanti' }}"
                        loading="lazy"
                    >
                @else
                    <img
                        src="{{ $img }}/jabat-tangan.jpg"
                        alt="Jabat tangan kerja sama"
                        loading="lazy"
                    >
                @endif
            </div>

            <div class="about-commit-text">
                <h3>
                    {{ $aboutPage?->commitment_title ?: 'Mendukung Beragam Kebutuhan' }}
                </h3>

                <p>
                    {{ $aboutPage?->commitment_content ?: 'PT. Ari Dharma Kanti berfokus pada penyediaan produk dan layanan sesuai dengan bidang usaha perusahaan untuk memenuhi kebutuhan pelanggan.' }}
                </p>
            </div>
        </article>
    </section>

</div>



@endsection
