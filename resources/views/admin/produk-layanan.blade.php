@extends('layouts.admin')

@section('title', 'Produk & Layanan')
@section('breadcrumb', 'Produk & Layanan')

@section('content')
<div class="products-page">
<div class="page-heading">
                <div>
                    <h1>Produk &amp; Layanan</h1>
                    <p>Kelola data produk dan layanan perusahaan Anda.</p>
                </div>

                <a href="{{ route('cms.products-services.create') }}" class="btn btn-primary">
                    + Tambah Produk &amp; Layanan
                </a>
            </div>

            <section class="panel">
                <div class="tabs" role="tablist">
                    <button class="tab active" data-tab="Semua">Semua</button>
                    <button class="tab" data-tab="Produk">Produk</button>
                    <button class="tab" data-tab="Layanan">Layanan</button>
                </div>

                <div class="toolbar">
                    <label class="search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m16 16 4 4"/>
                        </svg>
                        <input id="searchInput" type="search" placeholder="Cari produk atau layanan...">
                    </label>

                    <select id="categoryFilter" aria-label="Filter kategori">
                        <option value="">Semua Kategori</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Peralatan">Peralatan</option>
                    </select>

                    <div class="view-toggle">
                        <button class="selected" aria-label="Tampilan tabel">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 5h16M4 10h16M4 15h16M4 20h16"/>
                            </svg>
                        </button>
                        <button aria-label="Tampilan grid">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="4" y="4" width="6" height="6" rx="1"/>
                                <rect x="14" y="4" width="6" height="6" rx="1"/>
                                <rect x="4" y="14" width="6" height="6" rx="1"/>
                                <rect x="14" y="14" width="6" height="6" rx="1"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>GAMBAR</th>
                            <th>NAMA</th>
                            <th>KATEGORI</th>
                            <th>STATUS</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>AKSI</th>
                        </tr>
                        </thead>

<tbody id="productTable">
    @forelse ($productsServices as $item)
        <tr
            data-type="{{ ucfirst($item->type) }}"
            data-category="{{ $item->category ?? 'Lainnya' }}"
        >

            <td>
                <div class="product-thumb">
                    @if ($item->card_image)
                        <img
                            src="{{ asset('storage/' . $item->card_image) }}"
                            alt="{{ $item->name }}"
                            style="width:100%; height:100%; object-fit:cover; display:block;"
                        >
                    @else
                        <svg viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5">
                            <rect x="4" y="4" width="16" height="16" rx="3"/>
                            <path d="M8 9h8M8 12h8M8 15h5"/>
                        </svg>
                    @endif
                </div>
            </td>


            <td>
                <div class="product-cell">
                    <div>
                        <div class="product-name">
                            {{ $item->name }}
                        </div>
                        <div class="product-description">
                            {{ $item->short_description ?? '-' }}
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <span class="category">
                    {{ $item->category ?? 'Lainnya' }}
                </span>
            </td>

            <td>
                <span class="status">
                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
            </td>

            <td class="date">
                {{ $item->created_at?->format('d M Y') ?? '-' }}
            </td>

            <td>
                <div class="actions">
                    <a href="{{ route('cms.products-services.edit', $item->id) }}"
                       class="action-btn edit" aria-label="Edit {{ $item->name }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                        </svg>
                    </a>

                    <form action="{{ route('cms.products-services.destroy', $item->id) }}"
                          method="POST" onsubmit="return confirm('Hapus {{ $item->name }}?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete" aria-label="Hapus {{ $item->name }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M3 6h18"/>
                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                <path d="M10 11v6M14 11v6"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="text-align: center; padding: 30px;">
                Belum ada data produk atau layanan.
            </td>
        </tr>
    @endforelse
</tbody>

                    </table>

                    <div class="empty" id="emptyState">
                        Tidak ada produk atau layanan yang cocok dengan pencarian.
                    </div>
                </div>

                <div class="table-footer">
                    <span id="resultCount">
                        Menampilkan {{ $productsServices->count() }} dari {{ $productsServices->total() }} data
                    </span>
                    {{ $productsServices->links() }}
                </div>
            </section>

<!-- MODAL TAMBAH / EDIT -->
<div class="modal-backdrop" id="productModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="modalTitle">Tambah Produk &amp; Layanan</h2>
            <button class="icon-button" id="closeModal" aria-label="Tutup">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        </div>

        @if ($errors->any())
            <div style="background:#fdecea;color:#b91429;padding:12px;border-radius:6px;margin:16px 22px 0;">
                <ul style="margin:0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form id="productForm"
         action="{{ route('cms.products-services.store') }}"
            method="POST"
                enctype="multipart/form-data">
            @csrf

    <div class="modal-body">


                <div class="form-group">
                    <label for="itemImage">Gambar Produk atau Layanan</label>
                    <input
                        id="itemImage"
                        name="card_image"
                        type="file"
                        accept=".jpg,.jpeg,.png,.webp"
                    >
                    <small class="form-help">
                        Format JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                    </small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="cancelModal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const rows = [...document.querySelectorAll('#productTable tr')];
    const tabs = [...document.querySelectorAll('.tab')];

    let currentTab = 'Semua';

    function filterRows() {
        const keyword = searchInput.value.toLowerCase().trim();
        const category = categoryFilter.value;
        let visible = 0;

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesKeyword = text.includes(keyword);
            const matchesCategory = !category ||
                row.dataset.category === category;
            const matchesTab = currentTab === 'Semua' ||
                row.dataset.type === currentTab;

            const show = matchesKeyword && matchesCategory && matchesTab;
            row.style.display = show ? '' : 'none';

            if (show) visible++;
        });

        document.getElementById('emptyState').style.display =
            visible === 0 ? 'block' : 'none';

        document.getElementById('resultCount').textContent =
            `Menampilkan ${visible} data contoh`;
    }

    searchInput.addEventListener('input', filterRows);
    categoryFilter.addEventListener('change', filterRows);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(item => item.classList.remove('active'));
            tab.classList.add('active');
            currentTab = tab.dataset.tab;
            filterRows();
        });
    });

    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const addButton = document.getElementById('addButton');
    const modalTitle = document.getElementById('modalTitle');
    const storeUrl = @json(route('cms.products-services.store'));

    function openModal(title = 'Tambah Produk & Layanan') {
        form.reset();
        form.action = storeUrl;

        // Hapus method PUT saat membuka form tambah.
        form.querySelector('input[name="_method"]')?.remove();

        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = false;
        submitButton.textContent = 'Simpan';

        modalTitle.textContent = title;
        modal.classList.add('open');
    }

    function openEditModal(product) {
        openModal('Edit Produk & Layanan');

        // Route update menggunakan PUT melalui method spoofing Laravel.
        form.action = `${storeUrl}/${product.id}`;

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        form.appendChild(methodInput);

            const fields = [
            'name',
            'type',
            'category',
            'short_description'
        ];

        fields.forEach(name => {
            const input = form.elements.namedItem(name);
            if (!input) return;

            let value = product[name] ?? '';
            if (name === 'type' && value) {
                value = value.charAt(0).toUpperCase() + value.slice(1).toLowerCase();
            }
            input.value = value;
        });
    }

    function closeModal() {
        modal.classList.remove('open');
    }

    if (addButton) {
        addButton.addEventListener('click', () => openModal());
    }
    document.getElementById('closeModal').addEventListener('click', closeModal);
    document.getElementById('cancelModal').addEventListener('click', closeModal);

    modal.addEventListener('click', event => {
        if (event.target === modal) closeModal();
    });

    document.querySelectorAll('.view-toggle button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.view-toggle button')
                .forEach(item => item.classList.remove('selected'));
            button.classList.add('selected');
        });
    });

    form.addEventListener('submit', () => {
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Menyimpan...';
    });

    @if (isset($editProduct) && $editProduct)
        openEditModal(@json($editProduct));
    @elseif ($errors->any())
        modal.classList.add('open');
    @endif
</script>
@endpush
