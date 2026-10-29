<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PT. Ari Dharma Kanti')</title>

    {{-- CSS global yang sudah ada --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cta.css') }}">

    {{-- CSS navbar & footer (dibawa langsung di sini supaya pasti terpakai) --}}
    <style>
        body {
            margin: 0;
            background: #fff;
            color: #111;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        /* ================= NAVBAR ================= */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;

            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;

            background: #fff;
            border-bottom: 1px solid #ececec;
            box-shadow: none;
        }

        .site-header .adk-nav {
            position: relative;

            width: 100%;
            max-width: none;
            min-height: 60px;
            margin: 0;
            padding: 0 clamp(16px, 3.2vw, 42px);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .site-header .adk-brand {
            display: inline-flex;
            align-items: center;
            flex-shrink: 0;
        }

        .site-header .adk-logo {
            display: block;
            width: auto;
            max-width: none;
            height: 34px;
        }

        .site-header .adk-menu {
            display: flex;
            align-items: center;
            gap: 34px;

            margin: 0;
            padding: 0;
            list-style: none;
        }

        .site-header .adk-menu li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .site-header .adk-menu a {
            display: inline-block;

            padding: 8px 0;
            border-bottom: 3px solid transparent;

            color: #111;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
            text-decoration: none;

            transition: color 0.2s ease, border-color 0.2s ease;
        }

        .site-header .adk-menu a:hover {
            color: #e31b23;
        }

        .site-header .adk-menu a.active {
            color: #e31b23;
            border-bottom-color: #e31b23;
        }

        .site-header .adk-toggle {
            display: none;

            width: 40px;
            height: 36px;
            padding: 0;

            background: transparent;
            color: #111;
            border: 1px solid #d9d9d9;
            border-radius: 4px;

            font-size: 20px;
            line-height: 1;
            cursor: pointer;
        }

        /* ================= FOOTER ================= */
        .site-footer {
            position: relative;
            display: block;

            width: 100%;
            margin: 0;
            padding: 0;

            background: #050505;
            color: #fff;
        }

        .site-footer .adk-footer-inner {
            width: min(1120px, 90%);
            margin: 0 auto;
            padding: 46px 0 38px;

            display: grid;
            grid-template-columns: 3.5fr 2fr 3fr 2.5fr;
            gap: 24px;
        }

        .site-footer .adk-footer-logo {
            display: block;
            width: 82px;
            max-width: 100%;
            height: auto;
            margin: 0 0 22px;
        }

        .site-footer .adk-footer-about {
            max-width: 270px;
            margin: 0;

            color: #fff;
            font-size: 10px;
            line-height: 1.8;
        }

        .site-footer .adk-footer-col h4 {
            margin: 0 0 14px;

            color: #fff;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.3;
        }

        .site-footer .adk-footer-col ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .site-footer .adk-footer-col li {
            margin: 0 0 8px;
            padding: 0;
            list-style: none;
        }

        .site-footer .adk-footer-col li a {
            color: #e6e6e6;
            font-size: 10px;
            line-height: 1.5;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .site-footer .adk-footer-col li a:hover {
            color: #fff;
        }

        /* Link footer tidak pernah merah: hover/klik tetap putih */
        .site-footer a:hover,
        .site-footer a:active,
        .site-footer a:focus {
            color: #fff !important;
            outline: none;
        }

        .site-footer .adk-footer-col h4.adk-contact-title {
            margin-top: 26px;
        }

        .site-footer .adk-contact-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .site-footer .adk-contact-item {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #e6e6e6;
            font-size: 9px;
            line-height: 1.5;
        }

        .site-footer .adk-contact-item img {
            flex: 0 0 auto;
            width: 14px;
            height: 14px;
            object-fit: contain;
        }

        .site-footer .adk-contact-item a {
            color: #e6e6e6;
            text-decoration: none;
        }

        .site-footer .adk-contact-item a:hover {
            color: #fff;
        }

        .site-footer .adk-footer-bottom {
            padding: 14px 0;

            border-top: 1px solid rgba(255, 255, 255, 0.08);

            color: #777;
            font-size: 10px;
            text-align: center;
        }

        /* ================= TABLET ================= */
        @media (max-width: 900px) {
            .site-header .adk-menu {
                gap: 22px;
            }

            .site-header .adk-menu a {
                font-size: 14px;
            }

            .site-footer .adk-footer-inner {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 34px 28px;
            }

            .site-footer .adk-footer-about {
                max-width: 340px;
            }
        }

        /* ================= MOBILE ================= */
        @media (max-width: 760px) {
            .site-header .adk-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .site-header .adk-menu {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;

                display: none;
                flex-direction: column;
                align-items: stretch;
                gap: 0;

                padding: 6px clamp(16px, 5vw, 28px) 12px;

                background: #fff;
                border-bottom: 1px solid #ececec;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            }

            .site-header .adk-menu.is-open {
                display: flex;
            }

            .site-header .adk-menu li {
                border-bottom: 1px solid #f1f1f1;
            }

            .site-header .adk-menu li:last-child {
                border-bottom: 0;
            }

            .site-header .adk-menu a {
                display: block;
                padding: 13px 0;
                border-bottom: 0;
            }
        }

        @media (max-width: 600px) {
            .site-header .adk-nav {
                min-height: 56px;
            }

            .site-header .adk-logo {
                height: 30px;
            }

            .site-footer .adk-footer-inner {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 36px 0 30px;
            }

            .site-footer .adk-footer-logo {
                width: 74px;
                margin-bottom: 16px;
            }

            .site-footer .adk-footer-about {
                max-width: none;
                font-size: 11px;
            }

            .site-footer .adk-footer-col li a {
                font-size: 11px;
            }

            .site-footer .adk-contact-item {
                font-size: 10px;
            }
        }
    </style>

    {{-- CSS khusus tiap halaman (home.css, galeri.css, dst.) --}}
    @stack('styles')
</head>
<body>

@php $imgBase = asset('assets/images-beranda'); @endphp

{{-- ===================== NAVBAR ===================== --}}
<header class="site-header">
    <nav class="adk-nav" aria-label="Navigasi utama">

        <a href="{{ url('/') }}" class="adk-brand" aria-label="PT. Ari Dharma Kanti - Beranda">
            <img class="adk-logo" src="{{ $imgBase }}/logo.png" alt="Logo PT. Ari Dharma Kanti">
        </a>

        <button type="button" class="adk-toggle" id="adkToggle"
                aria-label="Buka menu" aria-expanded="false" aria-controls="adkMenu">
            &#9776;
        </button>

        <ul class="adk-menu nav-menu" id="adkMenu">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ url('/tentang-kami') }}" class="{{ request()->is('tentang-kami*') ? 'active' : '' }}">Tentang Kami</a></li>
            <li><a href="{{ url('/layanan') }}" class="{{ request()->is('layanan*') ? 'active' : '' }}">Layanan</a></li>
            <li><a href="{{ url('/galeri') }}" class="{{ request()->is('galeri*') ? 'active' : '' }}">Galeri</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
        </ul>

    </nav>
</header>


{{-- ===================== ISI HALAMAN ===================== --}}
<main>
    @yield('content')
</main>

@include('partials.cta')

{{-- ===================== FOOTER ===================== --}}
@include('partials.footer')


<script>
document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.getElementById('adkToggle');
    var menu = document.getElementById('adkMenu');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', function () {
        var open = menu.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    menu.addEventListener('click', function (e) {
        if (e.target.tagName === 'A') {
            menu.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });
});
</script>

@stack('scripts')

</body>
</html>
