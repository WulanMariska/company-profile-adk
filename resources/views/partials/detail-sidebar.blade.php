@once
<style>
    /* ===== CARD KONSULTASI ===== */
    .adk-consult-card {
        width: 100%;
        padding: 26px 24px 28px;
        box-sizing: border-box;
        background: #feeeee;
        border: 1px solid #f6caca;
        border-radius: 10px;
    }

    .adk-consult-label {
        display: block;
        margin: 0 0 14px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #e31b23;
    }

    .adk-consult-card h3 {
        margin: 0 0 14px;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.3;
        color: #111;
    }

    .adk-consult-card > p {
        margin: 0 0 22px;
        font-size: 13px;
        line-height: 1.7;
        color: #555;
    }

    .adk-consult-primary,
    .adk-consult-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 46px;
        margin: 0 0 12px;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    .adk-consult-primary {
        background: #e31b23;
        color: #fff;
    }

    .adk-consult-secondary {
        background: #fff;
        color: #111;
        border: 1px solid #f0d4d4;
    }

    .adk-consult-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 16px;
        font-size: 10px;
        line-height: 1.5;
        color: #444;
    }

    .adk-consult-info img {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
        object-fit: contain;
    }

    /* ===== CARD KANTOR OPERASIONAL ===== */
    .adk-office-card {
        width: 100%;
        min-height: 150px;
        margin: 20px 0 0;
        padding: 26px 24px 28px;
        box-sizing: border-box;

        display: flex;
        flex-direction: column;
        justify-content: flex-start;

        background: #0a0a0a;
        border-radius: 10px;
    }

    .adk-office-card h3 {
        margin: 0 0 14px;
        font-size: 17px;
        font-weight: 700;
        line-height: 1.3;
        color: #fff;
    }

    .adk-office-card .adk-office-address {
        margin: 0 0 22px;
        font-size: 10px;
        line-height: 1.7;
        letter-spacing: 0.3px;
        text-transform: uppercase;
        color: #d6d6d6;
    }

    .adk-office-card .adk-office-phone {
        font-size: 12px;
        font-weight: 700;
        color: #e31b23;
        text-decoration: none;
    }
</style>
@endonce

{{-- ===== CARD KONSULTASI KEBUTUHAN ===== --}}
<div class="adk-consult-card">
    <span class="adk-consult-label">KONSULTASI KEBUTUHAN</span>

    <h3>Temukan Solusi yang Sesuai</h3>

    <p>
        Sampaikan kebutuhan Anda kepada tim PT. Ari Dharma Kanti
        untuk mendapatkan informasi mengenai produk yang tersedia.
    </p>

    <a href="{{ route('contact') }}" class="adk-consult-primary">
        Konsultasikan Kebutuhan Anda
    </a>

    <a href="{{ route('contact') }}" class="adk-consult-secondary">
        Kirimkan Form Pengadaan
    </a>

    <div class="adk-consult-info">
        <img src="{{ asset('assets/images-layanan-telekomunikasi/ikonkotak.png') }}" alt="Informasi produk">
        <span>Dapatkan informasi mengenai produk dan layanan yang tersedia.</span>
    </div>

    <div class="adk-consult-info">
        <img src="{{ asset('assets/images-layanan-telekomunikasi/ikonjam.png') }}" alt="Respons cepat">
        <span>Respons cepat dari tim kami.</span>
    </div>
</div>

{{-- ===== CARD KANTOR OPERASIONAL ===== --}}
<div class="adk-office-card">
    <h3>Kantor Operasional</h3>

    <p class="adk-office-address">
        {{ $globalSiteSetting?->address ?: 'Alamat kantor belum tersedia.' }}
    </p>

    @if ($globalSiteSetting?->phone)
        <a
            href="tel:{{ preg_replace('/[^0-9+]/', '', $globalSiteSetting->phone) }}"
            class="adk-office-phone"
        >
            {{ $globalSiteSetting->phone }}
        </a>
    @else
        <span class="adk-office-phone">Nomor telepon belum tersedia.</span>
    @endif
</div>