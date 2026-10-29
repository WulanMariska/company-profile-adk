```blade
@extends('twill::layouts.main')

@php
    $emptyMessage = $emptyMessage ?? twillTrans('twill::lang.dashboard.empty-message');
    $isDashboard = true;
    $translate = true;
@endphp

@push('extra_css')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">

    @if(app()->isProduction())
        <link href="{{ twillAsset('main-dashboard.css') }}" rel="preload" as="style" crossorigin/>
    @endif

    @unless(config('twill.dev_mode', false))
        <link href="{{ twillAsset('main-dashboard.css') }}" rel="stylesheet" crossorigin/>
    @endunless
@endpush

@push('extra_js_head')
    @if(app()->isProduction())
        <link href="{{ twillAsset('main-dashboard.js') }}" rel="preload" as="script" crossorigin/>
    @endif
@endpush

@section('appTypeClass', 'body--dashboard')

@section('primaryNavigation')
    @if (config('twill.enabled.search', false))
        <div class="dashboardSearch" id="searchApp" v-cloak>
            <a17-search
                endpoint="{{ route(config('twill.dashboard.search_endpoint')) }}"
                type="dashboard"
                placeholder="{{ twillTrans('twill::lang.dashboard.search-placeholder') }}"
            ></a17-search>
        </div>
    @endif
@stop

@section('content')
    <div class="adk-dashboard">

        {{-- Judul Dashboard --}}
        <div class="adk-dashboard-heading">
            <div>
                <h1>Dashboard ADK</h1>
                <p>Kelola konten website perusahaan</p>
            </div>

                        
            <div class="adk-dashboard-date">
                <span>▦</span>
                <div>
                    <strong>{{ now()->translatedFormat('l, d F Y') }}</strong>
                </div>
            </div>

        </div>

        {{-- Statistik --}}
        <div class="adk-stat-grid">

            <div class="adk-dashboard-card adk-stat-card">
                <div class="adk-icon">
                    <img src="{{ asset('assets/css/images-admin-beranda/18_statistik-produk1.png') }}" alt="Ikon produk">
                </div>
                <div>
                    <h3>Produk</h3>
                    <strong>—</strong>
                    <p>Total produk yang tersedia</p>
                </div>
                <span class="adk-arrow">→</span>
            </div>

            <div class="adk-dashboard-card adk-stat-card">
                <div class="adk-icon">
                    <img src="{{ asset('assets/css/images-admin-beranda/17_statistik-layanan1.png') }}" alt="Ikon layanan">
                </div>
                <div>
                    <h3>Layanan</h3>
                    <strong>—</strong>
                    <p>Total layanan yang tersedia</p>
                </div>
                <span class="adk-arrow">→</span>
            </div>

            <div class="adk-dashboard-card adk-stat-card">
                <div class="adk-icon">
                    <img src="{{ asset('assets/css/images-admin-beranda/15_statistik-foto-galeri1.png') }}" alt="Ikon foto galeri">
                </div>
                <div>
                    <h3>Foto Galeri</h3>
                    <strong>—</strong>
                    <p>Total foto di galeri</p>
                </div>
                <span class="adk-arrow">→</span>
            </div>

            <div class="adk-dashboard-card adk-stat-card">
                <div class="adk-icon">
                    <img src="{{ asset('assets/css/images-admin-beranda/16_statistik-halaman-website1.png') }}" alt="Ikon halaman website">
                </div>
                <div>
                    <h3>Halaman Website</h3>
                    <strong>—</strong>
                    <p>Total halaman website</p>
                </div>
                <span class="adk-arrow">→</span>
            </div>

        </div>

                    
            {{-- Akses Cepat --}}
            <section class="adk-dashboard-card adk-quick-section">
                <div class="adk-section-heading">
                    <h2>Akses Cepat</h2>
                    <p>Kelola konten website dengan cepat dan mudah</p>
                </div>

                <div class="adk-public-website">
                    <div class="adk-public-content">
                        <div class="adk-public-icon">
                            <div class="adk-public-icon">
                                <img
                                    src="{{ asset('assets/css/images-admin-beranda/logo.png') }}"
                                    alt="Logo PT. Ari Dharma Kanti"
                                >
                            </div>
                      <span>◎</span>
                        </div>

                        <div class="adk-public-info">
                            <h3>Website Publik</h3>
                            <p>
                                Lihat tampilan website PT. Ari Dharma Kanti
                                secara langsung.
                            </p>

                            <a href="{{ url('/') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="adk-public-button">
                                Buka Website
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>
                    </div>

                    <div class="adk-public-decoration" aria-hidden="true">
                        ◎
                    </div>

                   <div class="adk-public-preview">
                    <img
                        src="{{ asset('assets/css/images-admin-beranda/background-beranda.png') }}"
                        alt="Preview website PT. Ari Dharma Kanti"
                    >
                </div>
                </div>
            </section>


        {{-- Aktivitas Terbaru --}}
        <section class="adk-dashboard-card adk-activity-section">
            <div class="adk-section-heading">
                <h2>Aktivitas Terbaru</h2>
                <p>Aktivitas pengelolaan website perusahaan.</p>
            </div>

            <div class="adk-activity-empty">
                <p>Aktivitas akan ditampilkan setelah pencatatan aktivitas admin diintegrasikan.</p>
            </div>
        </section>

    </div>
@stop

@section('initialStore')
    window['{{ config('twill.js_namespace') }}'].STORE.datatable = {}

    window['{{ config('twill.js_namespace') }}'].STORE.datatable.mine = {!! json_encode($myActivityData) !!}

    window['{{ config('twill.js_namespace') }}'].STORE.datatable.all = {!! json_encode($allActivityData) !!}

    window['{{ config('twill.js_namespace') }}'].STORE.datatable.data = window['{{ config('twill.js_namespace') }}'].STORE.datatable.all

    window['{{ config('twill.js_namespace') }}'].STORE.datatable.columns = {!! json_encode($tableColumns) !!}
@stop

@push('extra_js')
    <script src="{{ twillAsset('main-dashboard.js') }}" crossorigin></script>
@endpush
```