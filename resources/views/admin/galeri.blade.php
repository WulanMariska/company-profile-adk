@extends('layouts.admin')

@section('title', 'Galeri')
@section('breadcrumb', 'Galeri')

@section('content')
<div class="gallery-page">
<div class="heading">

 <div>

                                                    <h1>Galeri</h1>

                                                    <p>Kelola foto kegiatan, fasilitas, dan dokumentasi PT. Ari Dharma Kanti.</p>

                                                </div>

                                                <button class="btn primary" id="addGallery" type="button">＋ Tambah Galeri</button>

                                            </div>

                                            <div class="toolbar">

                                            <label class="search">

                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">

                                                    <circle cx="10.8" cy="10.8" r="6.8"/>

                                                    <path d="m16 16 5 5"/>

                                                </svg>

                                                <input id="search" type="search" placeholder="Cari judul atau deskripsi galeri...">

                                            </label>

                                            <select id="filter">

                                                <option value="">Semua Kategori</option>

                                                @foreach ($categories as $category)

                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                       <div class="grid" id="grid">

                                            @forelse ($galleryItems as $item)

                                                <article

                                                    class="card"

                                                    data-id="{{ $item->id }}"

                                                    data-title="{{ $item->title }}"

                                                    data-description="{{ $item->description }}"

                                                    data-category="{{ $item->category?->name }}"

                                                    data-category-id="{{ $item->gallery_category_id }}"
                                                    data-is-active="{{ $item->is_active ? '1' : '0' }}"

                                                >

                                                    <div class="photo">

                                                        <img

                                                            src="{{ asset('storage/' . $item->image_path) }}"

                                                            alt="{{ $item->title }}"

                                                            loading="lazy"

                                                        >

                                                    </div>



                                                    <div class="body">

                                                        <div class="card-top">

                                                            <h2>{{ $item->title }}</h2>



                                                            <span class="category">

                                                                {{ $item->category?->name ?? 'Tanpa kategori' }}

                                                            </span>

                                                        </div>



                                                        <p class="description">

                                                            {{ $item->description }}

                                                        </p>



                                                        <div class="footer">

                                                            <span class="status">

                                                                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}

                                                            </span>



                                                            <div class="actions">

                                                                <button

                                                                    class="small-btn edit"

                                                                    type="button"

                                                                    aria-label="Edit"

                                                                >✎</button>



                                                                <form method="POST" action="{{ route('cms.gallery.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?')">

                                                                    @csrf

                                                                    @method('DELETE')

                                                                    <button class="small-btn delete remove" type="submit" aria-label="Hapus">×</button>

                                                                </form>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </article>

                                            @empty

                                                <p>Belum ada foto galeri. Klik Tambah Galeri untuk menambahkan foto.</p>

                                            @endforelse

                                        </div>

                                                    <div class="empty" id="empty">Galeri tidak ditemukan. Coba kata kunci atau kategori lain.</div>

<div class="backdrop" id="backdrop" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

                                                <div class="modal">

                                                    <div class="modal-head">

                                                        <div>

                                                            <h2 id="modalTitle">Tambah Galeri</h2>

                                                            <p>Tambahkan foto, judul, dan deskripsi yang menjelaskan gambar pada website publik.</p>

                                                        </div>

                                                        <button class="close" id="close" type="button" aria-label="Tutup">×</button>

                                                    </div>

                                                    <form id="galleryForm" action="{{ route('cms.gallery.store') }}" method="POST" enctype="multipart/form-data">

                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="_method"
                                                            id="formMethod"
                                                            value="PUT"
                                                            disabled
                                                        >

                                                        <div class="modal-body">
                                                            <div class="field">
                                                                <label for="is_active">Status Galeri</label>
                                                                <input type="hidden" name="is_active" value="0">
                                                                <label class="gallery-status-toggle">
                                                                    <input
                                                                        type="checkbox"
                                                                        id="is_active"
                                                                        name="is_active"
                                                                        value="1"
                                                                    >
                                                                    Tampilkan di website publik
                                                                </label>
                                                            </div>


                                                            <div class="field">

                                                                <label for="image">Foto Galeri *</label>

                                                                <div class="upload">

                                                                    <label for="image">

                                                                        <span id="uploadLabel">＋ Klik untuk memilih gambar (JPG, PNG, WEBP)</span>

                                                                        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp">

                                                                        <img id="preview" alt="Pratinjau gambar">

                                                                    </label>

                                                                </div>

                                                                <small>Gunakan foto dokumentasi perusahaan yang sesuai dan memiliki izin untuk dipublikasikan.</small>

                                                            </div>

                                                            <div class="field">

                                                                <label for="title">Judul Gambar *</label>

                                                                <input id="title" name="title" type="text" required maxlength="100" placeholder="Contoh: Gedung Perusahaan">

                                                            </div>

                                                            <div class="field">

                                                                <label for="description">Deskripsi Gambar *</label>

                                                                <textarea id="description" name="description" required maxlength="500" placeholder="Jelaskan isi foto, kegiatan, atau informasi yang perlu diketahui pengunjung..."></textarea>

                                                                <small>Deskripsi ini menjelaskan gambar pada galeri website publik.</small>

                                                            </div>

                                                            <div class="field">

                                                                <label for="category">Kategori *</label>

                                                                <select id="category" name="gallery_category_id" required>

                                                                    <option value="">Pilih kategori</option>

                                                                    @foreach ($categories as $category)

                                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="modal-actions">

                                                            <button class="btn outline" id="cancel" type="button">Batal</button>

                                                            <button class="btn primary" type="submit">Simpan Galeri</button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                            <div class="toast" id="toast" role="status">

                                            </div>
</div>
@endsection

@push('scripts')
<script>
const backdrop = document.getElementById('backdrop');

                                                const form = document.getElementById('galleryForm');

                                                const fileInput = document.getElementById('image');

                                                const preview = document.getElementById('preview');

                                                const uploadLabel = document.getElementById('uploadLabel');

                                                const grid = document.getElementById('grid');

                                                const toast = document.getElementById('toast');

                                                const formMethod = document.getElementById('formMethod');

                                                let editing = null;

                                                let imageUrl = '';



                                                function notify(message) {

                                                    toast.textContent = message;

                                                    toast.style.display = 'block';

                                                    clearTimeout(notify.timer);

                                                    notify.timer = setTimeout(() => toast.style.display = 'none', 3200);

                                                }



                                                function openModal(card = null) {

                                                    editing = card;

                                                    form.reset();

                                                    document.getElementById('is_active').checked = false;

                                                    imageUrl = '';

                                                    preview.style.display = 'none';

                                                    preview.removeAttribute('src');

                                                    uploadLabel.style.display = 'block';

                                                    formMethod.value = 'PUT';
                                                    formMethod.disabled = !card;

                                                    form.action = card

                                                        ? `/cms/galeri/${card.dataset.id}`

                                                        : @json(route('cms.gallery.store'));

                                                    fileInput.required = !card;

                                                    document.getElementById('modalTitle').textContent = card ? 'Edit Galeri' : 'Tambah Galeri';



                                                    if (card) {

                                                        document.getElementById('title').value = card.dataset.title;

                                                        document.getElementById('description').value = card.dataset.description;

                                                        document.getElementById('category').value = card.dataset.categoryId;
                                                        document.getElementById('is_active').checked = card.dataset.isActive === '1';

                                                        const img = card.querySelector('.photo img');

                                                        if (img) {

                                                            imageUrl = img.src;

                                                            preview.src = img.src;

                                                            preview.style.display = 'block';

                                                            uploadLabel.style.display = 'none';

                                                        }

                                                    }



                                                    backdrop.classList.add('open');

                                                    document.body.style.overflow = 'hidden';

                                                }



                                                function closeModal() {

                                                    backdrop.classList.remove('open');

                                                    document.body.style.overflow = '';

                                                    editing = null;

                                                }



                                                fileInput.addEventListener('change', () => {

                                                    const file = fileInput.files[0];

                                                    if (!file) return;

                                                    if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {

                                                        notify('Pilih gambar JPG, PNG, atau WEBP.');

                                                        fileInput.value = '';

                                                        return;

                                                    }

                                                    imageUrl = URL.createObjectURL(file);

                                                    preview.src = imageUrl;

                                                    preview.style.display = 'block';

                                                    uploadLabel.style.display = 'none';

                                                });



                                                document.getElementById('addGallery').addEventListener('click', () => openModal());

                                                document.getElementById('close').addEventListener('click', closeModal);

                                                document.getElementById('cancel').addEventListener('click', closeModal);

                                                backdrop.addEventListener('click', event => {

                                                    if (event.target === backdrop) closeModal();

                                                });



                                                grid.addEventListener('click', event => {

                                                    const editButton = event.target.closest('.edit');

                                                    if (!editButton) return;

                                                    const card = editButton.closest('.card');

                                                    if (card) openModal(card);

                                                });



                                                function filterCards() {

                                                    const query = document.getElementById('search').value.toLowerCase().trim();

                                                    const category = document.getElementById('filter').value;

                                                    let count = 0;

                                                    grid.querySelectorAll('.card').forEach(card => {

                                                        const matches = (card.dataset.title + ' ' + card.dataset.description).toLowerCase().includes(query)

                                                            && (!category || card.dataset.category === category);

                                                        card.style.display = matches ? '' : 'none';

                                                        if (matches) count++;

                                                    });

                                                    document.getElementById('empty').style.display = count ? 'none' : 'block';

                                                }



                                                document.getElementById('search').addEventListener('input', filterCards);

                                                document.getElementById('filter').addEventListener('change', filterCards);



                                                @if ($errors->any())

                                                    backdrop.classList.add('open');

                                                    document.body.style.overflow = 'hidden';

                                                @endif
</script>
@endpush
