
@php
    $ctaSetting = $globalCtaSetting ?? \App\Models\GlobalCtaSetting::first();
@endphp

@if ($ctaSetting?->is_active ?? true)
    <section class="home-cta">
        <div class="home-cta-content">
            <span class="home-cta-eyebrow">
                {{ $ctaSetting?->title ?? 'Siap bekerja sama dengan' }}
            </span>

            <h2>PT. Ari Dharma Kanti</h2>

            <p>
                {{ $ctaSetting?->description ?? 'Hubungi kami sekarang untuk mendapatkan penawaran terbaik sesuai kebutuhan Anda.' }}
            </p>

            <a href="{{ $ctaSetting?->button_link
                ? (str_starts_with($ctaSetting->button_link, '/') ? url($ctaSetting->button_link) : $ctaSetting->button_link)
                : route('contact') }}">
                {{ $ctaSetting?->button_text ?? 'Hubungi Kami' }} →
            </a>
        </div>
    </section>
@endif
