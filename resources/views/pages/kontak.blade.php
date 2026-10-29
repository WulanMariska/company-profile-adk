
@extends('layouts.app')

@section('title', 'Kontak - PT. Ari Dharma Kanti')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Lora:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/kontak.css') }}">
@endpush

@section('content')

@php
    $img = asset('assets/css/images-kontak');

    $alamat = $siteSetting?->address ?: 'JL. TUKAD YEH AYA NO. 46 DENPASAR';

    $mapsUrl = $siteSetting?->google_maps_url
        ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($alamat);

    $telepon = $siteSetting?->phone ?: '08113383828';
    $email = $siteSetting?->email ?: 'aridharmakanti2019@gmail.com';

    $waNumber = '628113383828';
@endphp

{{-- HERO KONTAK --}}
<section class="contact-hero">
    <div class="contact-hero-overlay"></div>

    <div class="contact-hero-content">
        <span class="contact-hero-label">PT. Ari Dharma Kanti</span>

        <h1>
            Hubungi
            <span>Kami</span>
        </h1>

        <p>
            Menyediakan berbagai produk berkualitas dengan
            harga kompetitif serta layanan profesional untuk
            memenuhi kebutuhan Anda.
        </p>
    </div>
</section>

{{-- INFORMASI KONTAK DAN FORM --}}
<section class="contact-section">
    <div class="contact-card">

        {{-- INFORMASI KONTAK --}}
        <div class="contact-info">
            <h2>Mari Berdiskusi</h2>

            <p class="contact-intro">
                Silakan isi formulir atau hubungi kami secara langsung melalui
                informasi kontak di bawah ini. Kami akan merespon pertanyaan Anda
                secepat mungkin.
            </p>

            <ul class="contact-list">
                <li>
                    <img src="{{ $img }}/telpon.png" alt="Telepon">
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $telepon) }}">
                        {{ $telepon }}
                    </a>
                </li>

                <li>
                    <img src="{{ $img }}/lokasi.png" alt="Lokasi">
                    <span>{{ $alamat }}</span>
                </li>

                <li>
                    <img src="{{ $img }}/email.png" alt="Email">
                    <a href="mailto:{{ $email }}" class="is-link">
                        {{ $email }}
                    </a>
                </li>
            </ul>

            <a
                class="contact-map"
                href="{{ $mapsUrl }}"
                target="_blank"
                rel="noopener"
                aria-label="Buka lokasi PT. Ari Dharma Kanti di Google Maps"
            >
                <img
                    src="{{ $img }}/maps.png"
                    alt="Peta lokasi PT. Ari Dharma Kanti"
                    loading="lazy"
                >
                <span class="contact-map-badge">Buka di Google Maps ↗</span>
            </a>
        </div>

        {{-- FORM KIRIM PESAN --}}
        <form class="contact-form" id="kirim-pesan" action="#" method="post">
            <h3>Kirim Pesan</h3>

            <label for="cf-nama">Nama Lengkap *</label>
            <input
                type="text"
                id="cf-nama"
                name="nama"
                required
                autocomplete="name"
            >

            <label for="cf-telp">No. Telepon / WhatsApp</label>
            <input
                type="tel"
                id="cf-telp"
                name="telepon"
                autocomplete="tel"
            >

            <label for="cf-email">Email *</label>
            <input
                type="email"
                id="cf-email"
                name="email"
                required
                autocomplete="email"
            >

            <label for="cf-subjek">Subjek *</label>
            <input
                type="text"
                id="cf-subjek"
                name="subjek"
                required
            >

            <label for="cf-pesan">Pesan *</label>
            <textarea
                id="cf-pesan"
                name="pesan"
                rows="6"
                required
            ></textarea>

            <button type="submit">Kirim Pesan</button>
        </form>

    </div>
</section>



{{-- FORM DIARAHKAN KE WHATSAPP --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('kirim-pesan');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const f = form.elements;

        const text =
            'Halo PT. Ari Dharma Kanti,\n\n' +
            'Nama: ' + f.nama.value + '\n' +
            'Telepon: ' + (f.telepon.value || '-') + '\n' +
            'Email: ' + f.email.value + '\n' +
            'Subjek: ' + f.subjek.value + '\n\n' +
            f.pesan.value;

        window.open(
            'https://wa.me/{{ $waNumber }}?text=' + encodeURIComponent(text),
            '_blank'
        );
    });
});
</script>

@endsection
