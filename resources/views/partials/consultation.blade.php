<!-- TES-PARTIAL-CONSULTATION-123 -->

@php
    $consultationSetting = \App\Models\ConsultationSetting::first();

    $consultationLink = $consultationSetting?->button_link ?: '/kontak';

    if (str_starts_with($consultationLink, '/')) {
        $consultationLink = url($consultationLink);
    }
@endphp

{{-- CARD KONSULTASI --}}
@if ($consultationSetting?->is_active ?? true)
    <div class="consultation-card">

        <span class="consultation-label">
            KONSULTASI KEBUTUHAN
        </span>

        <h3>
            {{ $consultationSetting?->title ?? 'Temukan Solusi yang Sesuai' }}
        </h3>

        <p>
            {{ $consultationSetting?->description
                ?? 'Sampaikan kebutuhan Anda kepada tim PT. Ari Dharma Kanti untuk mendapatkan informasi mengenai produk yang tersedia.' }}
        </p>

        <a
            href="{{ $consultationLink }}"
            class="consultation-primary"
        >
            {{ $consultationSetting?->button_text ?? 'Konsultasi Sekarang' }}
        </a>

        <a
            href="{{ route('contact') }}"
            class="consultation-secondary"
        >
            Kirimkan Form Pengadaan
        </a>

        <div class="consultation-info">
            <img
                src="{{ asset('assets/images-layanan-motor/ikonkotak.png') }}"
                alt="Informasi kontak"
            >

            <span>
                Dapatkan informasi mengenai produk dan layanan yang tersedia.
            </span>
        </div>

        <div class="consultation-info">
            <img
                src="{{ asset('assets/images-layanan-motor/ikonjam.png') }}"
                alt="Respons cepat"
            >

            <span>
                Respons cepat dari tim kami.
            </span>
        </div>

    </div>
@endif


{{-- CARD KANTOR --}}
<div class="office-card">

    <h3>
        {{ $consultationSetting?->office_name ?? 'Kantor Operasional' }}
    </h3>

    <p>
        {{ $consultationSetting?->office_address
            ?: 'JL. TUKAD YEH AYA NO. 46 DENPASAR, BALI' }}
    </p>

    @if ($consultationSetting?->office_phone)
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $consultationSetting->office_phone) }}">
            {{ $consultationSetting->office_phone }}
        </a>
    @else
        <a href="tel:08113383828">08113383828</a>
    @endif

    @if ($consultationSetting?->office_email)
        <a href="mailto:{{ $consultationSetting->office_email }}">
            {{ $consultationSetting->office_email }}
        </a>
    @endif

    @if ($consultationSetting?->google_maps_url)
        <a
            href="{{ $consultationSetting->google_maps_url }}"
            target="_blank"
            rel="noopener noreferrer"
        >
            Lihat Lokasi di Google Maps
        </a>
    @endif

</div>
