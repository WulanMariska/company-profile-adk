
@extends('layouts.app')

@section('title', $productService->name . ' - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-motor.css') }}">
@endpush

@section('content')

@php
    $heroImage = $productService->hero_image
        ?: ($productService->detail_image
        ?: $productService->card_image);
@endphp

<section
    class="detail-hero"
    @if ($heroImage)
        style="background-image: url('{{ \Illuminate\Support\Facades\Storage::disk('public')->url($heroImage) }}');"
    @endif
>
    <div class="detail-hero-overlay"></div>

    <div class="detail-hero-content">
        <h1>{{ $productService->name }}</h1>

        <p>
            {{ $productService->detail_intro
                ?: ($productService->short_description ?: $productService->description) }}
        </p>

        <a href="{{ route('services') }}" class="detail-back-button">
            ← &nbsp; Kembali ke Layanan
        </a>
    </div>
</section>

<section class="detail-main">
    <div class="detail-container">
        <div class="detail-layout">
            <div class="detail-left">

                @if ($productService->detail_image || $productService->card_image)
                    <div class="detail-image">
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($productService->detail_image ?: $productService->card_image) }}"
                            alt="{{ $productService->name }}"
                        >
                    </div>
                @endif

                <div class="detail-description">
                    <h2>
                        {{ $productService->detail_section_title ?: 'Deskripsi & Ruang Lingkup' }}
                    </h2>

                    <p>
                        {{ $productService->description ?: $productService->short_description }}
                    </p>

                    <div class="detail-features">
                        @for ($i = 1; $i <= 4; $i++)
                            @php
                                $featureTitle = $productService->{'feature_' . $i . '_title'};
                                $featureDescription = $productService->{'feature_' . $i . '_description'};
                            @endphp

                            @if ($featureTitle || $featureDescription)
                                <div class="detail-feature-card">
                                    <h3>
                                        <span></span>
                                        {{ $featureTitle ?: 'Informasi Produk' }}
                                    </h3>

                                    <p>{{ $featureDescription }}</p>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

      <aside class="detail-sidebar">
    @include('partials.detail-sidebar')
</aside>
        </div>
    </div>
</section>



@endsection
