@extends('layouts.public')

@section('title', 'Produk')

@section('content')
    <div class="content-wrapper">
        <div class="mb-5">
            <h2 class="fw-bold mb-2" style="color: #dc2626;">Katalog Produk</h2>
            <p class="text-muted mb-0">Dukungan ekonomi mandiri untuk Masyarakat. Temukan berbagai produk dan kebutuhan harian anda dengan harga terjangkau.</p>
        </div>

        <!-- Filter & Search Section -->
        <div class="mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('public.produk.index', array_merge(request()->query(), ['category' => null])) }}" class="btn {{ !request()->has('category') ? 'btn-danger' : 'btn-outline-danger' }} btn-sm rounded-pill px-4">
                            Semua Produk
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('public.produk.index', array_merge(request()->query(), ['category' => $category->id])) }}" class="btn {{ request()->category == $category->id ? 'btn-danger' : 'btn-outline-danger' }} btn-sm rounded-pill px-4">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="dropdown">
                        <button class="btn btn-outline-danger btn-sm rounded-pill dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Urutkan: <span class="fw-bold">
                                @if($sort == 'price_desc')
                                    Harga Tertinggi
                                @elseif($sort == 'name_asc')
                                    Nama A-Z
                                @elseif($sort == 'name_desc')
                                    Nama Z-A
                                @else
                                    Harga Terendah
                                @endif
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item {{ $sort == 'price_asc' ? 'active bg-danger text-white' : '' }}" href="{{ route('public.produk.index', array_merge(request()->query(), ['sort' => 'price_asc'])) }}">Harga Terendah</a></li>
                            <li><a class="dropdown-item {{ $sort == 'price_desc' ? 'active bg-danger text-white' : '' }}" href="{{ route('public.produk.index', array_merge(request()->query(), ['sort' => 'price_desc'])) }}">Harga Tertinggi</a></li>
                            <li><a class="dropdown-item {{ $sort == 'name_asc' ? 'active bg-danger text-white' : '' }}" href="{{ route('public.produk.index', array_merge(request()->query(), ['sort' => 'name_asc'])) }}">Nama A-Z</a></li>
                            <li><a class="dropdown-item {{ $sort == 'name_desc' ? 'active bg-danger text-white' : '' }}" href="{{ route('public.produk.index', array_merge(request()->query(), ['sort' => 'name_desc'])) }}">Nama Z-A</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4 mb-5">
            @forelse($produks as $produk)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border border-red-100 hover:shadow-md transition-all">
                        <div class="card-body p-4">
                            @if($produk->stok > 0)
                                <span class="stock-badge">Stok Tersedia</span>
                            @endif
                            <div class="d-flex justify-content-center mb-4">
                                @if($produk->foto)
                                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="img-fluid shadow-sm rounded-2" style="height: 200px; object-fit: contain;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center rounded-3" style="height: 200px; width: 100%; background: #fef2f2;">
                                        <i class="bi bi-box-seam" style="color: #dc2626; font-size: 3rem;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h5 class="fw-bold mb-1" style="color: #1f2937;">{{ $produk->nama_produk }}</h5>
                                @if($produk->category)
                                    <small class="text-muted d-block mb-2">{{ $produk->category->name }}</small>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold fs-4" style="color: #dc2626;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-muted small mb-4">
                                @if($produk->deskripsi)
                                    {{ Str::limit($produk->deskripsi, 100) }}
                                @endif
                            </p>
                            <a href="{{ route('public.produk.show', $produk->id) }}" class="btn btn-lg w-100 rounded-pill fw-semibold" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white; border: none;">
                                <i class="bi bi-eye me-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-10">
                        <i class="bi bi-box-seam text-muted fs-1 mb-3"></i>
                        <h4 class="fw-bold text-muted mb-2">Produk tidak ditemukan</h4>
                        <p class="text-muted small mb-4">Belum ada produk yang tersedia saat ini.</p>
                        <a href="{{ route('public.home') }}" class="btn btn-outline-danger rounded-pill">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination Placeholder -->
        <nav class="d-flex justify-content-center" aria-label="Page navigation">
            <ul class="pagination gap-2">
                <li class="page-item"><a class="page-link rounded-2" href="#"><i class="bi bi-chevron-left"></i></a></li>
                <li class="page-item active"><a class="page-link rounded-2 bg-danger border-danger" href="#">1</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#">2</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#">3</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>
@endsection