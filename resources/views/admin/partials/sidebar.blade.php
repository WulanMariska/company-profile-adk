
<aside class="sidebar">
    <div class="brand">
        <img
            class="brand-logo"
            src="{{ asset('assets/css/images-admin-beranda/logo putih.png') }}"
            alt="Logo PT. Ari Dharma Kanti"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
        >
        <div class="brand-name" style="display:none">
            PT. ARI <span>DHARMA KANTI</span>
        </div>
    </div>

    <nav class="nav-list" aria-label="Navigasi CMS">
        {{-- BERANDA --}}
        <a
            class="nav-item {{ request()->is('cms/beranda') ? 'active' : '' }}"
            href="{{ route('cms.dashboard') }}"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 10 9-7 9 7"/>
                <path d="M5 9v11h14V9"/>
                <path d="M9 20v-7h6v7"/>
            </svg>
            <span>Beranda</span>
        </a>

        {{-- PRODUK & LAYANAN --}}
        <a
            class="nav-item {{ request()->is('cms/produk-layanan*') ? 'active' : '' }}"
            href="{{ route('cms.products-services.index') }}"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12 3 9 5-9 5-9-5 9-5Z"/>
                <path d="m3 8 9 5 9-5"/>
                <path d="M3 8v9l9 5 9-5V8"/>
                <path d="M12 13v9"/>
            </svg>
            <span>Produk &amp; Layanan</span>
        </a>

        {{-- GALERI --}}
        <a
            class="nav-item {{ request()->is('cms/galeri*') ? 'active' : '' }}"
            href="{{ route('cms.gallery.index') }}"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="3"/>
                <circle cx="8.5" cy="8.5" r="1.5"/>
                <path d="m21 15-5-5L5 21"/>
            </svg>
            <span>Galeri</span>
        </a>

        {{-- TENTANG KAMI --}}
        <a
            class="nav-item {{ request()->is('cms/tentang-kami') ? 'active' : '' }}"
            href="{{ route('cms.about') }}"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 21h18"/>
                <path d="M5 21V7l7-4 7 4v14"/>
                <path d="M9 21v-5h6v5"/>
                <path d="M9 9h.01M15 9h.01M9 12h.01M15 12h.01"/>
            </svg>
            <span>Tentang Kami</span>
        </a>

        {{-- KONTAK --}}
        <a
            class="nav-item {{ request()->is('cms/kontak') ? 'active' : '' }}"
            href="{{ route('cms.contact') }}"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="5" width="18" height="14" rx="2"/>
                <path d="m3 7 9 6 9-6"/>
            </svg>
            <span>Kontak</span>
        </a>

        {{-- PENGATURAN GLOBAL --}}
        @php
            $isGlobalSettings = request()->is('cms/pengaturan-global*');
            $currentSection = request()->query('section');
        @endphp

        <div class="nav-group {{ $isGlobalSettings ? 'active-group' : '' }}">
            <button
                type="button"
                class="nav-item nav-toggle {{ $isGlobalSettings ? 'active' : '' }}"
                id="globalSettingsToggle"
                aria-expanded="{{ $isGlobalSettings ? 'true' : 'false' }}"
                aria-controls="globalSettingsSubmenu"
                onclick="toggleGlobalSettings()"
            >
                <svg class="settings-icon" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.7"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 3-.2-.1a1.7 1.7 0 0 0-1.8.2l-.1.1h-3.4l-.1-.2a1.7 1.7 0 0 0-1.5-1.1 1.7 1.7 0 0 0-1.5 1.1l-.1.2H6l-.1-.2a1.7 1.7 0 0 0-1.8-.2l-.2.1-1.7-3 .1-.1A1.7 1.7 0 0 0 2.6 15l-.1-.2v-3.4l.2-.1a1.7 1.7 0 0 0 0-1.8l-.2-.1V6l.2-.1a1.7 1.7 0 0 0 .2-1.8l-.1-.2 3-1.7.1.1a1.7 1.7 0 0 0 1.9.3l.2-.1h3.4l.1.2a1.7 1.7 0 0 0 1.8 0l.1-.2h3.4l.1.2a1.7 1.7 0 0 0 1.8.2l.2-.1 1.7 3-.1.1a1.7 1.7 0 0 0-.3 1.9l.1.2v3.4z"/>
                </svg>

                <span>Pengaturan Global</span>

                <svg class="submenu-chevron" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </button>

            <div
                class="nav-submenu"
                id="globalSettingsSubmenu"
                style="display: {{ $isGlobalSettings ? 'flex' : 'none' }};"
            >
                <a
                    href="{{ route('cms.global-settings.index', ['section' => 'cta']) }}"
                    class="nav-subitem {{ $currentSection === 'cta' ? 'active' : '' }}"
                >
                    <span class="submenu-dot"></span>
                    CTA
                </a>

                <a
                    href="{{ route('cms.global-settings.index', ['section' => 'footer']) }}"
                    class="nav-subitem {{ $currentSection === 'footer' ? 'active' : '' }}"
                >
                    <span class="submenu-dot"></span>
                    Footer
                </a>

             
            </div>
        </div>
    </nav>

  

<div class="sidebar-bottom">
    <form action="{{ route('logout') }}" method="POST"
          onsubmit="return confirm('Apakah kamu yakin ingin keluar dari CMS?');">
        @csrf

        <button type="submit" class="logout-button">
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <path d="M10 17l5-5-5-5"/>
                <path d="M15 12H3"/>
                <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
            </svg>
            <span>Keluar</span>
        </button>
    </form>

    <div class="sidebar-brand-info">
        <strong>ADK CMS</strong>
        <br>
        Content Management System
        <br>
        &copy; 2026 Ari Dharma Kanti
    </div>
</div>
</aside>



<style>
    /* NAVIGASI SIDEBAR ADK */
    .sidebar .nav-list {
        display: flex;
        flex-direction: column;
        gap: 6px;
        width: 100%;
    }

    .sidebar .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        min-height: 44px;
        padding: 11px 12px;
        margin: 0;
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: #d5dbe3;
        text-decoration: none;
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.4;
        cursor: pointer;
        transition: background-color .2s ease, color .2s ease;
    }

    .sidebar .nav-item svg {
        display: block;
        width: 19px;
        height: 19px;
        flex: 0 0 19px;
        stroke: currentColor;
        transition: transform .2s ease;
    }

    .sidebar .nav-item:hover {
        background: #202a35;
        color: #fff;
    }

    .sidebar .nav-item.active {
        background: #e50920;
        color: #fff;
        font-weight: 700;
    }

    .sidebar .nav-group {
        width: 100%;
    }

    /* TOMBOL PENGATURAN GLOBAL */
    .sidebar .nav-toggle {
        appearance: none;
        -webkit-appearance: none;
        box-shadow: none;
        outline-offset: 2px;
    }

    .sidebar .nav-toggle span {
        flex: 1;
        min-width: 0;
    }

    .sidebar .nav-toggle .submenu-chevron {
        width: 16px;
        height: 16px;
        flex: 0 0 16px;
        margin-left: auto;
        transition: transform .2s ease;
    }

    .sidebar .nav-toggle[aria-expanded="true"] .submenu-chevron {
        transform: rotate(180deg);
    }

    .sidebar .nav-toggle.active {
        background: #e50920;
        color: #fff;
    }

    /* SUBMENU CTA, FOOTER, KONSULTASI */
    .sidebar .nav-submenu {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 100%;
        gap: 5px;
        padding: 7px 0 8px 34px;
        box-sizing: border-box;
    }

    .sidebar .nav-subitem {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        min-height: 38px;
        box-sizing: border-box;
        padding: 9px 12px;
        border: 1px solid transparent;
        border-radius: 6px;
        background: transparent;
        color: #aeb9c8;
        text-decoration: none;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        line-height: 1.4;
        transition: background-color .2s ease, color .2s ease, border-color .2s ease;
    }

    .sidebar .submenu-dot {
        display: inline-block;
        width: 6px;
        height: 6px;
        flex: 0 0 6px;
        border-radius: 50%;
        background: #64748b;
        transition: background-color .2s ease;
    }

    .sidebar .nav-subitem:hover {
        background: #202a35;
        color: #fff;
    }

    .sidebar .nav-subitem:hover .submenu-dot {
        background: #fff;
    }

    .sidebar .nav-subitem.active {
        background: rgba(229, 9, 32, .14);
        border-color: rgba(229, 9, 32, .35);
        color: #ff6878;
        font-weight: 700;
    }

    .sidebar .nav-subitem.active .submenu-dot {
        background: #e50920;
    }

    /* FOOTER SIDEBAR */
    .sidebar .sidebar-bottom {
        margin-top: auto;
        padding-top: 18px;
        color: #8190a1;
        font-size: 10px;
        line-height: 1.7;
    }

    /* RESPONSIVE */
    @media (max-width: 700px) {
        .sidebar .nav-list {
            gap: 5px;
        }

        .sidebar .nav-item {
            min-height: 42px;
        }

        .sidebar .nav-submenu {
            padding-left: 22px;
        }

        .sidebar .nav-subitem {
            min-height: 36px;
        }
    }

    
        .sidebar .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            min-height: 42px;
            padding: 10px 12px;
            margin-bottom: 16px;
            border: 1px solid rgba(229, 9, 32, 0.45);
            border-radius: 7px;
            background: rgba(229, 9, 32, 0.12);
            color: #ff6878;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color .2s ease, color .2s ease;
        }

        .sidebar .logout-button svg {
            width: 18px;
            height: 18px;
            flex: 0 0 18px;
        }

        .sidebar .logout-button:hover {
            background: #e50920;
            color: #fff;
        }

        .sidebar .sidebar-brand-info {
            color: #8190a1;
            font-size: 10px;
            line-height: 1.7;
        }

        .sidebar .sidebar-brand-info strong {
            color: #8190a1;
        }

</style>

<script>
    function toggleGlobalSettings() {
        const submenu = document.getElementById('globalSettingsSubmenu');
        const toggle = document.getElementById('globalSettingsToggle');

        if (!submenu || !toggle) {
            return;
        }

        const isOpen = submenu.style.display !== 'none';

        submenu.style.display = isOpen ? 'none' : 'flex';
        toggle.setAttribute('aria-expanded', String(!isOpen));
    }
</script>
