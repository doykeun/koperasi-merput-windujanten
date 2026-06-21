@extends('layouts.public')

@section('title', 'Produk')

@section('content')
    <div class="content-wrapper">
        <!-- Hero Section -->
        <div class="hero-section mb-5">
            <div class="hero-content">
                <h1 class="display-4 fw-bold mb-3">Katalog Produk</h1>
                <p class="lead opacity-80">Dukungan ekonomi mandiri untuk Masyarakat. Temukan berbagai produk ,<br>dan kebutuhan harian anda dengan harga terjangkau.</p>
            </div>
        </div>

        <!-- Filter & Search Section -->
        <div class="mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('public.produk.index') }}" class="btn {{ !request()->has('category') ? 'btn-primary' : 'btn-outline-primary' }} btn-sm rounded-pill px-4">
                            Semua Produk
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('public.produk.index', ['category' => $category->id]) }}" class="btn {{ request()->category == $category->id ? 'btn-primary' : 'btn-outline-primary' }} btn-sm rounded-pill px-4">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Urutkan: <span class="fw-bold text-primary">Harga Terendah</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item" href="#">Harga Terendah</a></li>
                            <li><a class="dropdown-item" href="#">Harga Tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Nama A-Z</a></li>
                            <li><a class="dropdown-item" href="#">Nama Z-A</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4 mb-5">
            @forelse($produks as $produk)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border border-light-subtle">
                        <div class="card-body p-4">
                            @if($produk->stok > 0)
                                <span class="stock-badge fw-bold px-3 py-1">Stok Tersedia</span>
                            @endif
                            <div class="d-flex justify-content-center mb-4">
                                @if($produk->foto)
                                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="img-fluid shadow-sm" style="height: 200px; object-fit: contain;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded-3" style="height: 200px; width: 100%;">
                                        <i class="bi bi-box-seam text-muted fs-1"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h5 class="fw-semibold mb-1 text-dark">{{ $produk->nama_produk }}</h5>
                                @if($produk->category)
                                    <small class="text-muted d-block mb-2">{{ $produk->category->name }}</small>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold text-primary fs-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-muted small mb-4">
                                @if($produk->deskripsi)
                                    {{ Str::limit($produk->deskripsi, 100) }}
                                @endif
                            </p>
                            <a href="{{ route('public.produk.show', $produk->id) }}" class="btn btn-primary btn-lg w-100 rounded-pill fw-semibold">
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
                        <a href="{{ route('public.home') }}" class="btn btn-outline-primary rounded-pill">
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
                <li class="page-item active"><a class="page-link rounded-2 bg-primary border-primary" href="#">1</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#">2</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#">3</a></li>
                <li class="page-item"><a class="page-link rounded-2" href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>
@endsection