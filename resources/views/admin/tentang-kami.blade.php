@extends('layouts.admin')

@section('title', 'Tentang Kami')
@section('breadcrumb', 'Tentang Kami')

@section('content')
<div class="about-page">
            <div class="page-heading">
                <div>
                    <h1>Tentang Kami</h1>
                    <p>Kelola informasi profil perusahaan PT. Ari Dharma Kanti.</p>
                </div>
            </div>

                    @if (session('success'))
            <div class="about-alert about-alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="about-alert about-alert-error">
                <strong>Data belum berhasil disimpan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form id="aboutForm"
                    action="{{ route('cms.about.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                <section class="panel">
                    <div class="panel-header">
                        <h2>Informasi Perusahaan</h2>
                        <p>Atur judul dan informasi utama yang menjelaskan perusahaan.</p>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="aboutTitle">Judul Tentang Kami</label>
                            <input
                                id="aboutTitle"
                                name="title"
                                type="text"
                                value="{{ old('title', $aboutPage->title ?? 'Tentang Kami') }}"
                                placeholder="Masukkan judul"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="aboutSubtitle">Subjudul</label>
                           <input
                                id="aboutSubtitle"
                                name="subtitle"
                                type="text"
                                placeholder="Masukkan subjudul perusahaan"
                                value="{{ old('subtitle', $aboutPage->subtitle ?? '') }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Perusahaan</label>

                           <div class="editor-toolbar">
                            <button type="button" data-command="bold" title="Tebal"><b>B</b></button>
                            <button type="button" data-command="italic" title="Miring"><i>I</i></button>
                            <button type="button" data-command="underline" title="Garis bawah"><u>U</u></button>

                            <button type="button" data-command="insertUnorderedList" title="Bullet List">• List</button>
                            <button type="button" data-command="insertOrderedList" title="Numbered List">1. List</button>

                            <button type="button" data-command="justifyLeft" title="Rata kiri">☰←</button>
                            <button type="button" data-command="justifyCenter" title="Rata tengah">☰</button>
                            <button type="button" data-command="justifyRight" title="Rata kanan">→☰</button>
                            <button type="button" data-command="justifyFull" title="Rata kiri-kanan">☷</button>
                        </div>

                            <div
                                id="aboutDescription"
                                class="editor-content"
                                contenteditable="true"
                                role="textbox"
                                aria-multiline="true"
                            >{!! old('content', $aboutPage->content ?? 'Masukkan deskripsi profil PT. Ari Dharma Kanti di sini.') !!}</div>

                            <input
                                type="hidden"
                                id="aboutContentInput"
                                name="content"
                            >

                            <small class="form-help">
                                Gunakan editor untuk mengatur format teks profil perusahaan.
                            </small>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Gambar Profil Perusahaan</h2>
                        <p>Atur gambar utama yang ditampilkan pada halaman Tentang Kami.</p>
                    </div>

                    <div class="panel-body">
                        <div class="image-section">
                            <div class="form-group">
                                <label for="aboutImage">Gambar Perusahaan</label>
                                <input
                                    id="aboutImage"
                                    name="image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                >
                                <small class="form-help">
                                    Format JPG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </small>
                            </div>

                            <div class="form-group">
                                <label>Preview Gambar Perusahaan</label>
                                <div class="image-preview {{ !empty($aboutPage?->image_path) ? 'has-image' : '' }}" id="imagePreview">
                                    <span class="image-placeholder">Preview gambar perusahaan</span>
                                    <img
                                        id="previewImage"
                                        alt="Preview gambar perusahaan"
                                        @if (!empty($aboutPage?->image_path))
                                            src="{{ asset('storage/' . $aboutPage->image_path) }}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Visi &amp; Misi</h2>
                        <p>Kelola visi dan misi perusahaan yang ditampilkan pada website publik.</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="visionTitle">Judul Visi</label>
                            <input
                                id="visionTitle"
                                name="vision_title"
                                type="text"
                                value="{{ old('vision_title', $aboutPage->vision_title ?? 'Visi Kami') }}"
                                placeholder="Contoh: Visi Kami"
                            >
                        </div>
                        <div class="form-group">
                            <label for="visionContent">Isi Visi</label>
                            <textarea
                                id="visionContent"
                                name="vision_content"
                                placeholder="Tuliskan visi perusahaan..."
                            >{{ old('vision_content', $aboutPage->vision_content ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="missionTitle">Judul Misi</label>
                            <input
                                id="missionTitle"
                                name="mission_title"
                                type="text"
                                value="{{ old('mission_title', $aboutPage->mission_title ?? 'Misi Kami') }}"
                                placeholder="Contoh: Misi Kami"
                            >
                        </div>
                        <div class="form-group">
                            <label for="missionContent">Isi Misi</label>
                            <textarea
                                id="missionContent"
                                name="mission_content"
                                placeholder="Tuliskan misi perusahaan..."
                            >{{ old('mission_content', $aboutPage->mission_content ?? '') }}</textarea>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-header">
                        <h2>Komitmen Kami</h2>
                        <p>Kelola judul, deskripsi, dan gambar untuk bagian Komitmen Kami.</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="commitmentTitle">Judul Komitmen</label>
                            <input
                                id="commitmentTitle"
                                name="commitment_title"
                                type="text"
                                value="{{ old('commitment_title', $aboutPage->commitment_title ?? 'Mendukung Beragam Kebutuhan') }}"
                                placeholder="Masukkan judul komitmen"
                            >
                        </div>
                        <div class="form-group">
                            <label for="commitmentContent">Deskripsi Komitmen</label>
                            <textarea
                                id="commitmentContent"
                                name="commitment_content"
                                placeholder="Tuliskan deskripsi komitmen perusahaan..."
                            >{{ old('commitment_content', $aboutPage->commitment_content ?? '') }}</textarea>
                        </div>
                        <div class="image-section">
                            <div class="form-group">
                                <label for="commitmentImage">Gambar Komitmen</label>
                                <input
                                    id="commitmentImage"
                                    name="commitment_image"
                                    type="file"
                                    accept="image/jpeg,image/png,image/webp"
                                >
                                <small class="form-help">
                                    Format JPG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </small>
                            </div>
                            <div class="form-group">
                                <label>Preview Gambar Komitmen</label>
                                <div class="image-preview {{ !empty($aboutPage?->commitment_image) ? 'has-image' : '' }}" id="commitmentImagePreview">
                                    <span class="image-placeholder">Preview gambar komitmen</span>
                                    <img
                                        id="previewCommitmentImage"
                                        alt="Preview gambar komitmen"
                                        @if (!empty($aboutPage?->commitment_image))
                                            src="{{ asset('storage/' . $aboutPage->commitment_image) }}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="save-row">
                    <button class="btn btn-primary" type="submit">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        
</div>
@endsection

@push('scripts')
<script>
const imageInput = document.getElementById('aboutImage');
        const preview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');

        function setupImagePreview(inputId, previewId, imageId) {
            const input = document.getElementById(inputId);
            const previewBox = document.getElementById(previewId);
            const previewImg = document.getElementById(imageId);

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    alert('Pilih file gambar yang valid.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImg.src = event.target.result;
                    previewBox.classList.add('has-image');
                };
                reader.readAsDataURL(file);
            });
        }

        setupImagePreview('aboutImage', 'imagePreview', 'previewImage');
        setupImagePreview('commitmentImage', 'commitmentImagePreview', 'previewCommitmentImage');

            document.querySelectorAll('.editor-toolbar button').forEach(button => {
            button.addEventListener('click', function () {
                const editor = document.getElementById('aboutDescription');

                editor.focus();
                document.execCommand(this.dataset.command, false, null);
            });
        });

       document.getElementById('aboutForm').addEventListener('submit', function () {
            const editor = document.getElementById('aboutDescription');
            const contentInput = document.getElementById('aboutContentInput');

            contentInput.value = editor.innerHTML;
        });
</script>
@endpush
