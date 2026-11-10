@extends('layouts.admin')

@section('title', 'Kontak')
@section('breadcrumb', 'Kontak')

@section('content')
<div class="contact-page">
<div class="page-heading">

      <h1>

       Kontak

      </h1>

      <p>

       Kelola informasi kontak dan lokasi PT. Ari Dharma Kanti.

      </p>

     </div>

     @if (session('success'))
    <div class="status status-success" id="status">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="status status-error" id="status">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid">

      <section class="panel">

       <div class="panel-head">

        <h2>

         Informasi Kontak

        </h2>

        <p>

         Informasi yang akan ditampilkan pada halaman kontak website perusahaan.

        </p>

       </div>

       <div class="panel-body">

        <form id="contactForm"

            action="{{ route('cms.contact.update') }}"

            method="POST">

            @csrf

            @method('PUT')



         <div class="group">

          <label for="company">

           Nama Perusahaan

          </label>

          <input id="company" name="company_name"

            value="{{ old('company_name', $siteSetting?->company_name ?? 'PT. Ari Dharma Kanti') }}"

            placeholder="Nama perusahaan">

         </div>

         <div class="group">



          <label for="address">

           Alamat Perusahaan

          </label>

          <textarea id="address" name="address"

          placeholder="Masukkan alamat lengkap perusahaan">{{ old('address', $siteSetting?->address ?? '') }}</textarea>

         </div>

         <div class="two">

          <div class="group">



           <label for="phone">

            Nomor Telepon

           </label>

           <input id="phone" name="phone" type="tel"

            value="{{ old('phone', $siteSetting?->phone ?? '') }}"

            placeholder="Contoh: 08xxxxxxxxxx">

          </div>

          <div class="group">

           <label for="email">

            Email

           </label>

           <input id="email" name="email" type="email"

            value="{{ old('email', $siteSetting?->email ?? '') }}"

            placeholder="nama@perusahaan.com">

          </div>

         </div>

            <div class="group">

          <label for="mapsUrl">

           Link Google Maps

          </label>

                <input id="mapsUrl" name="google_maps_url" type="url"

            value="{{ old('google_maps_url', $siteSetting?->google_maps_url ?? '') }}"

            placeholder="Tempel link lokasi Google Maps di sini">

          <small class="help">

           Salin tautan lokasi dari Google Maps. Pratinjau peta di sebelah kanan dapat diklik untuk membuka lokasi.

          </small>

         </div>

         <div class="actions">

          <button class="btn outline" id="reset" type="reset">

           Reset

          </button>

          <button class="btn primary" type="submit">

           Simpan Perubahan

          </button>

         </div>

        </form>

       </div>

      </section>

      <section class="panel">

       <div class="panel-head">

        <h2>

         Lokasi Perusahaan

        </h2>

        <p>

         Pratinjau lokasi yang dapat dibuka pengunjung melalui Google Maps.

        </p>

       </div>

       <div class="map-preview">

        <div class="placeholder" id="placeholder">

         <div class="pin">

          &target;

         </div>

         <strong>

          Lokasi Google Maps

         </strong>

         <span>

          Pratinjau peta akan muncul setelah link dimasukkan.

         </span>

        </div>

        <iframe class="map-frame" id="mapFrame" loading="lazy" title="Pratinjau Google Maps">

        </iframe>

        <a aria-label="Buka Google Maps" class="map-overlay" href="#" id="mapOverlay" rel="noopener noreferrer" target="_blank">

        </a>

       </div>

       <div class="map-note">

        Klik peta atau tombol di bawah untuk membuka lokasi di Google Maps.

       </div>

       <div class="map-actions">

        <span id="mapStatus" style="font-size:11px;color:#8793a3">

         Link lokasi belum diisi

        </span>

        <a class="btn primary" href="#" id="openMaps" rel="noopener noreferrer" style="pointer-events:none;opacity:.5" target="_blank">

         Buka Google Maps &nearrow;

        </a>

       </div>

      </section>

     </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    const input = document.getElementById('mapsUrl');
    const frame = document.getElementById('mapFrame');
    const placeholder = document.getElementById('placeholder');
    const overlay = document.getElementById('mapOverlay');
    const openMaps = document.getElementById('openMaps');
    const mapStatus = document.getElementById('mapStatus');
    const contactForm = document.getElementById('contactForm');
    const resetButton = document.getElementById('reset');
    const status = document.getElementById('status');

    if (!input || !frame || !placeholder || !overlay || !openMaps || !mapStatus) {
        return;
    }

    function validMapsUrl(value) {
        try {
            const url = new URL(value.trim());

            if (!['https:', 'http:'].includes(url.protocol)) {
                return null;
            }

            const host = url.hostname.toLowerCase();
            const validHost =
                host === 'goo.gl' ||
                host.endsWith('.goo.gl') ||
                host === 'maps.app.goo.gl' ||
                host === 'google.com' ||
                host.endsWith('.google.com') ||
                /^google\.[a-z.]+$/.test(host);

            return validHost ? url.href : null;
        } catch (error) {
            return null;
        }
    }

    function updateMap() {
        const url = validMapsUrl(input.value);

        if (!url) {
            frame.style.display = 'none';
            frame.removeAttribute('src');
            overlay.style.display = 'none';
            placeholder.style.display = 'block';
            openMaps.href = '#';
            openMaps.style.pointerEvents = 'none';
            openMaps.style.opacity = '.5';
            mapStatus.textContent = input.value.trim()
                ? 'Link belum valid'
                : 'Link lokasi belum diisi';
            return;
        }

        openMaps.href = url;
        overlay.href = url;
        openMaps.style.pointerEvents = 'auto';
        openMaps.style.opacity = '1';
        mapStatus.textContent = 'Link lokasi siap dibuka';
        frame.src = 'https://maps.google.com/maps?q=' + encodeURIComponent(url) + '&output=embed';
        frame.style.display = 'block';
        overlay.style.display = 'block';
        placeholder.style.display = 'none';
    }

    input.addEventListener('input', updateMap);

    if (contactForm) {
        contactForm.addEventListener('submit', function () {
            updateMap();
        });
    }

    if (resetButton) {
        resetButton.addEventListener('click', function () {
            setTimeout(function () {
                updateMap();
                if (status) status.style.display = 'none';
            }, 0);
        });
    }

    updateMap();
})();
</script>
@endpush
