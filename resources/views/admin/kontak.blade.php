<!DOCTYPE html>
<html lang="id">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Kontak - CMS ADK
  </title>
  <style>
   * {
    box-sizing:border-box
}

:root {
    --red:#e50920;
    --side:#101820;
    --text:#263445;
    --muted:#8793a3;
    --line:#e9edf2;
    --bg:#f5f7fa
}

body {
    margin:0;
    font:13px Arial,Helvetica,sans-serif;
    color:var(--text);
    background:var(--bg)
}

button,input,textarea {
    font:inherit
}

button {
    cursor:pointer
}

.app {
    min-height:100vh;
    display:flex
}

.sidebar {
    position:fixed;
    inset:0 auto 0 0;
    width:225px;
    height:100vh;
    overflow-y:auto;
    background:var(--side);
    color:#c7d0dc;
    padding:20px 12px;
    display:flex;
    flex-direction:column;
    z-index:10
}

.brand {
    display:flex;
    justify-content:center;
    align-items:center;
    padding:4px 0 25px;
    margin-bottom:22px;
    border-bottom:1px solid #27313b
}

.brand-logo {
    width:145px;
    height:65px;
    object-fit:contain;
    max-width:100%
}

.nav-item {
    display:flex;
    align-items:center;
    gap:11px;
    padding:12px;
    margin-bottom:5px;
    border-radius:5px;
    color:#c7d0dc;
    text-decoration:none;
    font-size:12px
}

.nav-item svg {
    width:17px;
    height:17px;
    flex-shrink:0
}

.nav-item:hover {
    background:#202a35;
    color:#fff
}

.nav-item.active {
    background:var(--red);
    color:#fff;
    font-weight:700
}

.sidebar-bottom {
    margin-top:auto;
    border-top:1px solid #27313b;
    padding:18px 10px 0;
    color:#8190a1;
    font-size:10px;
    line-height:1.7
}

.main {
    margin-left:225px;
    width:calc(100% - 225px);
    min-width:0
}

.topbar {
    min-height: 64px;
    padding: 0 30px;
    background: #fff;
    border-bottom: 1px solid var(--line);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

.topbar-left,
.topbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.topbar-left {
    min-width: 0;
}



.icon-button {
    width: 34px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 0;
    border-radius: 6px;
    background: transparent;
    color: #758195;
    padding: 7px;
}

.icon-button:hover {
    background: #f5f7fa;
}

.icon-button svg {
    width: 18px;
    height: 18px;
}

.breadcrumb {
    color: #8a95a5;
    font-size: 11px;
    white-space: nowrap;
}

.breadcrumb strong {
    color: #374355;
}

.notification {
    position:relative
}

.notification:after {
    content:"";
    position:absolute;
    top:3px;
    right:3px;
    width:6px;
    height:6px;
    border-radius:50%;
    background:var(--red)
}

.avatar {
    width:34px;
    height:34px;
    display:grid;
    place-items:center;
    background:#fce4e7;
    color:#b91429;
    border-radius:50%;
    font-weight:700
}

.admin-name {
    font-size:11px;
    font-weight:700
}

.content {
    padding:30px;
    max-width:1600px;
    margin:auto
}

.page-heading {
    margin-bottom:25px
}

.page-heading h1 {
    margin:0 0 9px;
    font-size:25px;
    letter-spacing:-.7px
}

.page-heading p {
    margin:0;
    color:var(--muted);
    font-size:12px
}

.grid {
    display:grid;
    grid-template-columns:minmax(0,1.1fr) minmax(300px,.9fr);
    gap:20px;
    align-items:start
}

.panel {
    background:#fff;
    border:1px solid #edf0f4;
    border-radius:8px;
    box-shadow:0 3px 15px #202e4007;
    overflow:hidden
}

.panel-head {
    padding:20px 22px;
    border-bottom:1px solid var(--line)
}

.panel-head h2 {
    margin:0 0 6px;
    font-size:15px
}

.panel-head p {
    margin:0;
    color:var(--muted);
    font-size:11px;
    line-height:1.6
}

.panel-body {
    padding:22px
}

.group {
    margin-bottom:17px
}

.group label {
    display:block;
    margin-bottom:8px;
    font-weight:600;
    font-size:12px
}

.group input,.group textarea {
    width:100%;
    padding:11px 12px;
    border:1px solid #dfe5ec;
    border-radius:5px;
    outline:none;
    color:var(--text);
    background:#fff
}

.group textarea {
    min-height:85px;
    resize:vertical
}

.group input:focus,.group textarea:focus {
    border-color:#e88b96;
    box-shadow:0 0 0 3px #e509200c
}

.help {
    display:block;
    margin-top:6px;
    color:#929cab;
    font-size:10px;
    line-height:1.5
}

.two {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px
}

.btn {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    padding:11px 15px;
    border:1px solid transparent;
    border-radius:5px;
    font-weight:600;
    text-decoration:none;
    white-space:nowrap
}

.primary {
    background:var(--red);
    color:#fff
}

.primary:hover {
    background:#c9081b
}

.outline {
    background:#fff;
    border-color:#dce2e9;
    color:#526072
}

.actions {
    display:flex;
    justify-content:flex-end;
    gap:10px;
    padding-top:20px;
    border-top:1px solid var(--line);
    margin-top:22px
}

.map-preview {
    min-height:290px;
    background:#eef2f5;
    position:relative;
    display:grid;
    place-items:center;
    overflow:hidden
}

.placeholder {
    text-align:center;
    padding:25px;
    color:#7b8797
}

.pin {
    font-size:38px;
    color:var(--red);
    margin-bottom:10px
}

.placeholder strong {
    display:block;
    color:#374355;
    margin-bottom:6px
}

.map-frame {
    width:100%;
    height:290px;
    border:0;
    display:none
}

.map-overlay {
    position:absolute;
    inset:0;
    z-index:2;
    display:none;
    background:transparent
}

.map-note {
    padding:14px 18px;
    color:#7d8998;
    font-size:11px;
    line-height:1.6;
    border-top:1px solid var(--line)
}

.map-actions {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
    padding:14px 18px;
    border-top:1px solid var(--line)
}

.status {
    display:none;
    padding:11px 13px;
    margin-bottom:15px;
    border-radius:5px;
    background:#e8f8ef;
    color:#239456;
    font-size:11px
}

@media(max-width:1050px) {
    .sidebar {
    width:190px
}

.main {
    margin-left:190px;
    width:calc(100% - 190px)
}

.content {
    padding:23px 18px
}

.topbar {
    padding:0 18px
}

.grid {
    grid-template-columns:1fr
}

}

@media(max-width:700px) {
    .app {
    display:block
}

.sidebar {
    position:relative;
    width:100%;
    height:auto;
    padding:12px
}

.brand {
    padding:4px 0 12px;
    margin-bottom:10px
}

.brand-logo {
    height:48px
}

.sidebar nav {
    display:flex;
    gap:5px;
    overflow-x:auto
}

.nav-item {
    flex-shrink:0;
    margin:0;
    padding:10px
}

.sidebar-bottom {
    display:none
}

.main {
    margin:0;
    width:100%
}

.topbar {
    height:55px;
    padding:0 14px
}

.breadcrumb,.admin-name {
    display:none
}

.content {
    padding:21px 12px
}

.page-heading h1 {
    font-size:22px
}

.two {
    grid-template-columns:1fr;
    gap:0
}

.panel-body {
    padding:16px
}

}


.nav-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    min-height: 44px;
    padding: 11px 12px;
    border-radius: 7px;
    color: #d5dbe3;
    text-decoration: none;
    font-size: 13px;
    transition: background-color .2s ease, color .2s ease;
}

.nav-item svg {
    width: 19px;
    height: 19px;
    flex: 0 0 19px;
    display: block;
    stroke: currentColor;
    transition: transform .2s ease;
}

.nav-item:hover {
    background: #2a3038;
    color: #fff;
}

.nav-item:hover svg {
    transform: translateY(-1px);
}

.nav-item.active {
    background: #e50920;
    color: #fff;
    font-weight: 700;
}

.nav-item.active svg {
    stroke-width: 1.9;
}

.nav-item span {
    line-height: 1.4;
}
/* ===== SIDEBAR MOBILE: MENU HORIZONTAL (TEMPEL PALING BAWAH) ===== */
@media (max-width: 700px) {

    .sidebar {
        padding: 8px 12px 0 !important;
    }

    .brand {
        height: 56px !important;
        padding: 0 0 6px !important;
        margin-bottom: 6px !important;
    }

    .brand img {
        width: 95px !important;
        height: 40px !important;
    }

    /* Semua kemungkinan pembungkus menu dibuat horizontal */
    .sidebar > nav,
    .sidebar > ul,
    .sidebar > div:not(.brand):not(.sidebar-bottom),
    .sidebar .nav-list,
    .sidebar .menu,
    .sidebar .sidebar-menu {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        gap: 6px !important;
        overflow-x: auto !important;
        overflow-y: hidden !important;
        padding: 0 0 8px !important;
        margin: 0 !important;
        list-style: none !important;
        scrollbar-width: none;
    }

    .sidebar > nav::-webkit-scrollbar,
    .sidebar > ul::-webkit-scrollbar,
    .sidebar .nav-list::-webkit-scrollbar {
        display: none;
    }

    /* Setiap item menu */
    .sidebar .nav-item,
    .sidebar a.nav-item,
    .sidebar button.nav-item {
        flex: 0 0 auto !important;
        width: auto !important;
        min-height: 38px !important;
        padding: 8px 12px !important;
        margin: 0 !important;
        white-space: nowrap !important;
        font-size: 12px !important;
    }

    /* Panah dropdown disembunyikan di mobile supaya ringkas */
    .sidebar .nav-item > svg:last-child:not(:first-child) {
        display: none !important;
    }

    /* Submenu Pengaturan Global: tidak menumpuk ke bawah */
    .sidebar .submenu,
    .sidebar .dropdown-menu,
    .sidebar .nav-submenu {
        position: static !important;
        display: flex !important;
        flex-direction: row !important;
        gap: 6px !important;
        padding: 0 !important;
        margin: 0 !important;
    }
}

  </style>


 </head>
 <body>
  <div class="app">
   

@include('admin.partials.sidebar')
           
   <main class="main">
   
<header class="topbar">
    <div class="topbar-left">
        <button
            aria-label="Menu"
            class="icon-button"
            id="adminMenuToggle"
            type="button"
        >
            <svg
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                viewBox="0 0 24 24"
                aria-hidden="true"
            >
                <path d="M4 7h16M4 12h16M4 17h16"></path>
            </svg>
        </button>

        <div class="breadcrumb">
            CMS ADK &nbsp; / &nbsp;
            <strong>Kontak</strong>
        </div>
    </div>

    <div class="topbar-right">
        <button
            aria-label="Notifikasi"
            class="icon-button notification"
            type="button"
        >
            <svg
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                viewBox="0 0 24 24"
                aria-hidden="true"
            >
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                <path d="M10 21h4"></path>
            </svg>
        </button>

        <div class="avatar">A</div>

        <span class="admin-name">Admin</span>

        <svg
            width="15"
            height="15"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#758195"
            stroke-width="1.8"
            aria-hidden="true"
        >
            <path d="m7 10 5 5 5-5"></path>
        </svg>
    </div>
</header>

    <section class="content">
     <div class="page-heading">
      <h1>
       Kontak
      </h1>
      <p>
       Kelola informasi kontak dan lokasi PT. Ari Dharma Kanti.
      </p>
     </div>
     <div class="status" id="status">
      @if (session('success'))
            <div class="status" id="status" style="display:block;">
                {{ session('success') }}
            </div>
        @endif

@if ($errors->any())
    <div class="status" id="status"
         style="display:block;background:#fde8e8;color:#b91c1c;">
        <ul style="margin:0;padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     </div>
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
    </section>
   </main>
  </div>
  <script>
   const input=document.getElementById('mapsUrl'),frame=document.getElementById('mapFrame'),placeholder=document.getElementById('placeholder'),overlay=document.getElementById('mapOverlay'),openMaps=document.getElementById('openMaps'),mapStatus=document.getElementById('mapStatus');
function validMapsUrl(value) {
    try {
        const u=new URL(value.trim());if (!['https:', 'http:'].includes(u.protocol)) return null;
        if (!/(^|\.)google\.[a-z.]+$|(^|\.)maps\.app\.goo\.gl$|(^|\.)goo\.gl$/.test(u.hostname)) return null;
        return u.href;
    } catch (e) {
        return null;
    }
}

function updateMap() {
    const url = validMapsUrl(input.value);
    if (!url) {
        frame.style.display = 'none';
        overlay.style.display = 'none';
        placeholder.style.display = 'block';
        openMaps.href = '#';
        openMaps.style.pointerEvents = 'none';
        openMaps.style.opacity = '.5';
        mapStatus.textContent = input.value.trim() ? 'Link belum valid' : 'Link lokasi belum diisi';
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
document.getElementById('contactForm').document.getElementById('contactForm').addEventListener('submit', () => {
    updateMap();
}); {
    e.preventDefault();
    updateMap();
    const status = document.getElementById('status');
    status.style.display = 'block';
    status.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
});
document.getElementById('reset').addEventListener('click', () => {
    setTimeout(() => {
        updateMap();
        document.getElementById('status').style.display = 'none';
    }, 0);
});
  </script>
 </body>
</html>
