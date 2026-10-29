@php
    $footerSetting = $globalSiteSetting ?? \App\Models\SiteSetting::first();

    $quickLinksText = $footerSetting?->quick_links_text
        ?: "Beranda | /\nTentang Kami | /tentang-kami\nLayanan | /layanan\nGaleri | /galeri\nKontak | /kontak";

    $productCategoriesText = $footerSetting?->product_categories_text
        ?: "Sepeda Motor Baru\nSuku Cadang & Aksesoris Motor\nPeralatan Telekomunikasi\nPeralatan Masak, Dapur & Elektronik Rumah Tangga\nKomputer & Perlengkapannya\nMesin Pendingin\nFurniture & Interior\nPeralatan & Perlengkapan Olahraga\nPiranti Lunak\nFotografi & Barang Optik\nMesin & Peralatan Pertanian\nSuku Cadang Elektronik";

    $servicesText = $footerSetting?->services_text
        ?: "Penyewaan & Sewa Guna Usaha Mesin dan Peralatan Kantor\nJasa Teknologi Informasi & Komputer";

    $quickLinks = collect(preg_split('/\r\n|\r|\n/', $quickLinksText))
        ->map(function ($line) {
            $parts = explode('|', $line, 2);

            return [
                'label' => trim($parts[0] ?? ''),
                'url' => trim($parts[1] ?? '/'),
            ];
        })
        ->filter(fn ($item) => $item['label'] !== '');

    $productCategories = collect(preg_split('/\r\n|\r|\n/', $productCategoriesText))
        ->map(fn ($line) => trim($line))
        ->filter(fn ($line) => $line !== '');

    $footerServices = collect(preg_split('/\r\n|\r|\n/', $servicesText))
        ->map(fn ($line) => trim($line))
        ->filter(fn ($line) => $line !== '');

    $socialLinks = $footerSetting?->social_links ?? [];
@endphp

<footer class="site-footer">
    <div class="adk-footer-inner">

        <div class="adk-footer-col">
            <img
                class="adk-footer-logo"
                src="{{ asset('assets/images-layanan/logo-putih.png') }}"
                alt="{{ $footerSetting?->company_name ?: 'PT. Ari Dharma Kanti' }}"
            >

            <p class="adk-footer-about">
                {{ $footerSetting?->footer_description ?: 'PT. Ari Dharma Kanti menyediakan beragam produk dan layanan untuk kebutuhan bisnis dan rumah.' }}
            </p>
        </div>

        <div class="adk-footer-col">
            <h4>Quick Link</h4>
            <ul>
                @foreach ($quickLinks as $link)
                    <li>
                        <a href="{{ str_starts_with($link['url'], 'http://') || str_starts_with($link['url'], 'https://') ? $link['url'] : url($link['url']) }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="adk-footer-col">
            <h4>Kategori Produk ADK</h4>
            <ul>
                @foreach ($productCategories as $category)
                    <li>
                        <a href="{{ url('/layanan') }}">{{ $category }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="adk-footer-col">
            <h4>Layanan ADK</h4>
            <ul>
                @foreach ($footerServices as $service)
                    <li>
                        <a href="{{ url('/layanan') }}">{{ $service }}</a>
                    </li>
                @endforeach
            </ul>

            <h4 class="adk-contact-title">Kontak Kami</h4>
            <div class="adk-contact-list">
                @if ($footerSetting?->phone)
                    <div class="adk-contact-item">
                        <img src="{{ asset('assets/images-layanan/telpon.png') }}" alt="">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $footerSetting->phone) }}">
                            {{ $footerSetting->phone }}
                        </a>
                    </div>
                @endif

                @if ($footerSetting?->email)
                    <div class="adk-contact-item">
                        <img src="{{ asset('assets/images-layanan/email.png') }}" alt="">
                        <a href="mailto:{{ $footerSetting->email }}">
                            {{ $footerSetting->email }}
                        </a>
                    </div>
                @endif

                @if ($footerSetting?->address)
                    <div class="adk-contact-item">
                        <img src="{{ asset('assets/images-layanan/lokasi.png') }}" alt="">
                        <span>{{ $footerSetting->address }}</span>
                    </div>
                @endif
            </div>

            @if (!empty($socialLinks))
                <div class="footer-social-links">
                    @foreach ($socialLinks as $platform => $url)
                        @if ($url)
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                                {{ ucfirst($platform) }}
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

    </div>

    <div class="adk-footer-bottom">
        {{ $footerSetting?->copyright_text ?: '© ' . date('Y') . ' PT. Ari Dharma Kanti. All Rights Reserved.' }}

        @if ($footerSetting?->privacy_policy_url)
            | <a href="{{ url($footerSetting->privacy_policy_url) }}">Kebijakan Privasi</a>
        @endif

        @if ($footerSetting?->terms_url)
            | <a href="{{ url($footerSetting->terms_url) }}">Syarat &amp; Ketentuan</a>
        @endif
    </div>
</footer>
