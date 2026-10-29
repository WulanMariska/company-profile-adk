```blade
<!DOCTYPE html>
<html dir="ltr" lang="{{ config('twill.locale', 'en') }}">

<head>
    @include('twill::partials.head')

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">

    @if (app()->environment('local', 'development') && config('twill.dev_mode', false))
        <script>
            window.hmr_url = '{{ config('twill.dev_mode_url', 'http://localhost:8080') }}';
        </script>
    @endif

    <style>
        body.adk-admin {
            margin: 0;
            background: #f6f8fb;
            color: #151719;
        }

        body.adk-admin .a17 {
            min-height: 100vh;
        }

        body.adk-admin .adk-sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            width: 250px;
            display: flex;
            flex-direction: column;
            background: #111315;
            color: #fff;
            box-sizing: border-box;
            transition: transform .25s ease;
        }

        body.adk-admin .adk-brand {
            padding: 20px 16px 26px;
            text-align: center;
            border-bottom: 1px solid #292b2e;
        }

        body.adk-admin .adk-brand img {
            display: block;
            width: 110px;
            max-height: 65px;
            object-fit: contain;
            margin: 0 auto 10px;
        }

        body.adk-admin .adk-brand-name {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        body.adk-admin .adk-menu {
            padding: 18px 12px;
        }

        body.adk-admin .adk-menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 44px;
            margin-bottom: 7px;
            padding: 0 14px;
            border-radius: 8px;
            color: #e8e8e8;
            font-size: 14px;
            text-decoration: none;
            transition: background .2s ease;
        }

        body.adk-admin .adk-menu a:hover,
        body.adk-admin .adk-menu a.active {
            color: #fff;
            background: #df171f;
        }

        body.adk-admin .adk-menu-icon {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        body.adk-admin .adk-sidebar-bottom {
            margin-top: auto;
            padding: 22px 20px;
            color: #b9bdc3;
            font-size: 12px;
            line-height: 1.7;
        }

        body.adk-admin .adk-main {
            min-height: 100vh;
            margin-left: 250px;
        }

        body.adk-admin .adk-topbar {
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 0 30px;
            background: #fff;
            border-bottom: 1px solid #e7eaf0;
            box-sizing: border-box;
        }

        body.adk-admin .adk-topbar-right {
            color: #526071;
            font-size: 13px;
        }

        body.adk-admin .adk-toggle {
            border: 0;
            background: transparent;
            color: #526071;
            font-size: 23px;
            cursor: pointer;
        }

        body.adk-admin .adk-content {
            padding: 28px 30px;
        }

        body.adk-admin .adk-page-title {
            margin: 0 0 5px;
            font-size: 28px;
            font-weight: 700;
        }

        body.adk-admin .adk-page-subtitle {
            margin: 0;
            color: #718096;
        }

        body.adk-admin .adk-mobile-overlay {
            display: none;
        }

        body.adk-admin .header,
        body.adk-admin .main > .appLoader {
            display: none;
        }

        @media (max-width: 900px) {
            body.adk-admin .adk-sidebar {
                transform: translateX(-100%);
            }

            body.adk-admin.adk-menu-open .adk-sidebar {
                transform: translateX(0);
            }

            body.adk-admin .adk-main {
                margin-left: 0;
            }

            body.adk-admin .adk-content {
                padding: 22px 18px;
            }

            body.adk-admin .adk-topbar {
                padding: 0 18px;
            }

            body.adk-admin.adk-menu-open .adk-mobile-overlay {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 999;
                background: rgba(0, 0, 0, .45);
            }
        }
    </style>
</head>

<body class="env env--{{ app()->environment() }} @yield('appTypeClass') adk-admin">

    @include('twill::partials.icons.svg-sprite')

    <x-twill.partials::navigation.overlay />

    <div class="adk-sidebar">
     
        <div class="adk-brand">
            <img
                src="{{ asset('assets/css/images-admin-beranda/logo putih.png') }}"
                alt="Logo PT. Ari Dharma Kanti"
            >
        </div>


<nav class="adk-menu">
    <a href="{{ url('/admin') }}"
       class="{{ request()->is('admin') ? 'active' : '' }}">
        <span class="adk-menu-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/>
            </svg>
        </span>
        <span>Beranda</span>
    </a>

    <a href="{{ url('/admin') }}">
        <span class="adk-menu-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m12 2 9 5-9 5-9-5 9-5Z"/>
                <path d="m3 7 9 5 9-5M3 7v10l9 5 9-5V7M12 12v10"/>
            </svg>
        </span>
        <span>Produk &amp; Layanan</span>
    </a>

    <a href="{{ url('/admin') }}">
        <span class="adk-menu-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="3" y="3" width="18" height="18" rx="2"/>
                <circle cx="8.5" cy="8.5" r="1.5"/>
                <path d="m21 15-5-5L5 21"/>
            </svg>
        </span>
        <span>Galeri</span>
    </a>

    <a href="{{ url('/admin') }}">
        <span class="adk-menu-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 21h18M5 21V5l7-3 7 3v16M9 9h1m4 0h1m-6 4h1m4 0h1m-5 8v-4h4v4"/>
            </svg>
        </span>
        <span>Tentang Kami</span>
    </a>

    <a href="{{ url('/admin') }}">
        <span class="adk-menu-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="3" y="5" width="18" height="14" rx="2"/>
                <path d="m3 7 9 6 9-6"/>
            </svg>
        </span>
        <span>Kontak</span>
    </a>
</nav>

        <div class="adk-sidebar-bottom">
            <strong>CMS ADK</strong><br>
            Kelola konten website perusahaan dengan mudah dan efisien.
        </div>
    </div>

    <div class="adk-mobile-overlay"
         onclick="document.body.classList.remove('adk-menu-open')">
    </div>

    <div class="a17">
        <div class="adk-main">
            <header class="adk-topbar">
    <button
        type="button"
        class="adk-toggle"
        aria-label="Buka menu"
        aria-expanded="false"
        onclick="
            document.body.classList.toggle('adk-menu-open');
            this.setAttribute(
                'aria-expanded',
                document.body.classList.contains('adk-menu-open')
            );
        "
    >
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div class="adk-topbar-right">
        <button
            type="button"
            class="adk-notification"
            aria-label="Notifikasi"
            title="Notifikasi"
        >
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                <path d="M10 21h4"/>
            </svg>
            <span class="adk-notification-badge">3</span>
        </button>

        <span class="adk-avatar">
            {{ strtoupper(substr(auth('twill_users')->user()->name ?? 'A', 0, 1)) }}
        </span>

        <span class="adk-user-name">
            {{ auth('twill_users')->user()->name ?? 'Administrator' }}
        </span>

        <span class="adk-user-chevron" aria-hidden="true">⌄</span>
    </div>
</header>

            @hasSection('primaryNavigation')
                @yield('primaryNavigation')
            @else
                <x-twill.partials::navigation.secondary />
                <x-twill.partials::navigation.tertiary />
                <x-twill.partials::navigation.breadcrumbs :breadcrumb="$breadcrumb ?? []" />
            @endif

            <section class="main">
                <div class="app" id="app" v-cloak>
                    <div class="adk-content">
                        @yield('content')
                    </div>

                    @if (config('twill.enabled.media-library') || config('twill.enabled.file-library'))
                        <a17-medialibrary
                            ref="mediaLibrary"
                            :authorized="{{ json_encode(auth('twill_users')->user()->can('edit-media-library')) }}"
                            :extra-metadatas="{{ json_encode(array_values(config('twill.media_library.extra_metadatas_fields', []))) }}"
                            :translatable-metadatas="{{ json_encode(array_values(config('twill.media_library.translatable_metadatas_fields', []))) }}">
                        </a17-medialibrary>

                        <a17-dialog
                            ref="deleteWarningMediaLibrary"
                            modal-title="{{ twillTrans('twill::lang.media-library.dialogs.delete.delete-media-title') }}"
                            confirm-label="{{ twillTrans('twill::lang.media-library.dialogs.delete.delete-media-confirm') }}">
                            <p class="modal--tiny-title">
                                <strong>{{ twillTrans('twill::lang.media-library.dialogs.delete.delete-media-title') }}</strong>
                            </p>
                            <p>{!! twillTrans('twill::lang.media-library.dialogs.delete.delete-media-desc') !!}</p>
                        </a17-dialog>

                        <a17-dialog
                            ref="replaceWarningMediaLibrary"
                            modal-title="{{ twillTrans('twill::lang.media-library.dialogs.replace.replace-media-title') }}"
                            confirm-label="{{ twillTrans('twill::lang.media-library.dialogs.replace.replace-media-confirm') }}">
                            <p class="modal--tiny-title">
                                <strong>{{ twillTrans('twill::lang.media-library.dialogs.replace.replace-media-title') }}</strong>
                            </p>
                            <p>{!! twillTrans('twill::lang.media-library.dialogs.replace.replace-media-desc') !!}</p>
                        </a17-dialog>
                    @endif

                    <a17-notif variant="success"></a17-notif>
                    <a17-notif variant="error"></a17-notif>
                    <a17-notif variant="info" :auto-hide="false" :important="false"></a17-notif>
                    <a17-notif variant="warning" :auto-hide="false" :important="false"></a17-notif>
                </div>

                <div class="appLoader">
                    <span><span class="loader"><span></span></span></span>
                </div>

                @include('twill::partials.footer')
            </section>
        </div>
    </div>

    @if (config('twill.enabled.users-management'))
        <form
            style="display: none"
            method="POST"
            action="{{ route(config('twill.admin_route_name_prefix') . 'logout') }}"
            data-logout-form>
            @csrf
        </form>
    @endif

    <script>
        window['{{ config('twill.js_namespace') }}'] = {};
        window['{{ config('twill.js_namespace') }}'].debug = {{ config('twill.debug') ? 'true' : 'false' }};
        window['{{ config('twill.js_namespace') }}'].version = '{{ config('twill.version') }}';
        window['{{ config('twill.js_namespace') }}'].twillLocalization = {!! json_encode($twillLocalization) !!};
        window['{{ config('twill.js_namespace') }}'].STORE = {};
        window['{{ config('twill.js_namespace') }}'].STORE.form = {};
        window['{{ config('twill.js_namespace') }}'].STORE.config = {
            publishDateDisplayFormat: '{{ config('twill.publish_date_display_format') }}',
        };
        window['{{ config('twill.js_namespace') }}'].STORE.medias = {};
        window['{{ config('twill.js_namespace') }}'].STORE.medias.types = [];
        window['{{ config('twill.js_namespace') }}'].STORE.medias.config = {
            useWysiwyg: {{ config('twill.media_library.media_caption_use_wysiwyg') ? 'true' : 'false' }},
            wysiwygOptions: {!! json_encode(config('twill.media_library.media_caption_wysiwyg_options')) !!}
        };
        window['{{ config('twill.js_namespace') }}'].STORE.languages = {!! json_encode(getLanguagesForVueStore($form_fields ?? [], $translate ?? false)) !!};

        @if (config('twill.enabled.media-library'))
            window['{{ config('twill.js_namespace') }}'].STORE.medias.types.push({
                value: 'image',
                text: '{{ twillTrans('twill::lang.media-library.images') }}',
                total: {{ \A17\Twill\Models\Media::count() }},
                endpoint: '{{ route(config('twill.admin_route_name_prefix') . 'media-library.medias.index') }}',
                tagsEndpoint: '{{ route(config('twill.admin_route_name_prefix') . 'media-library.medias.tags') }}',
                uploaderConfig: {!! json_encode($mediasUploaderConfig) !!}
            });

            window['{{ config('twill.js_namespace') }}'].STORE.medias.showFileName = !!'{{ config('twill.media_library.show_file_name') }}';
        @endif

        @if (config('twill.enabled.file-library'))
            window['{{ config('twill.js_namespace') }}'].STORE.medias.types.push({
                value: 'file',
                text: '{{ twillTrans('twill::lang.media-library.files') }}',
                total: {{ \A17\Twill\Models\File::count() }},
                endpoint: '{{ route(config('twill.admin_route_name_prefix') . 'file-library.files.index') }}',
                tagsEndpoint: '{{ route(config('twill.admin_route_name_prefix') . 'file-library.files.tags') }}',
                uploaderConfig: {!! json_encode($filesUploaderConfig) !!}
            });
        @endif

        @yield('initialStore')

        window.STORE = {};
        window.STORE.form = {};
        window.STORE.publication = {};
        window.STORE.medias = {};
        window.STORE.medias.types = [];
        window.STORE.medias.selected = {};
        window.STORE.browsers = {};
        window.STORE.browsers.selected = {};

        @stack('vuexStore')
    </script>

    <script src="{{ twillAsset('chunk-vendors.js') }}"></script>
    <script src="{{ twillAsset('chunk-common.js') }}"></script>
    @stack('extra_js')
</body>

</html>
```