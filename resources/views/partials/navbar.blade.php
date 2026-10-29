<header class="site-header">
    <nav class="navbar">

        <a href="{{ route('home') }}" class="navbar-logo">
            <img
                src="{{ asset('assets/images-beranda/logo.png') }}"
                alt="PT. Ari Dharma Kanti"
            >
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">
            ☰
        </button>

        <div class="nav-menu" id="navMenu">

            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                Beranda
            </a>

            <a href="{{ route('about') }}"
               class="{{ request()->routeIs('about') ? 'active' : '' }}">
                Tentang Kami
            </a>

            <a href="{{ route('services') }}"
               class="{{ request()->routeIs('services') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="{{ route('gallery') }}"
               class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                Galeri
            </a>

            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                Kontak
            </a>

        </div>

    </nav>
</header>