@extends('layouts.public')

@section('title', $produk->nama_produk)

@section('content')
    <div class="content-wrapper">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('public.home') }}" class="text-decoration-none text-danger">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.produk.index') }}" class="text-decoration-none text-danger">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>

        <!-- Product Detail Section -->
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <div class="row g-5">
                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-center p-4 bg-light rounded-4">
                            @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" class="img-fluid rounded-3 shadow-sm" alt="{{ $produk->nama_produk }}" style="max-height: 450px; object-fit: contain;">
                            @else
                                <div class="d-flex align-items-center justify-content-center rounded-3" style="height: 450px; width: 100%;">
                                    <i class="bi bi-box-seam text-muted fs-1"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6">
                        @if($produk->stok > 0)
                            <span class="stock-badge fw-bold px-3 py-1 mb-3">Stok Tersedia</span>
                        @else
                            <span class="badge bg-danger text-white fw-bold px-3 py-1 mb-3">Stok Habis</span>
                        @endif
                        
                        <h1 class="fw-bold mb-3 text-dark">{{ $produk->nama_produk }}</h1>
                        
                        @if($produk->category)
                            <div class="mb-3">
                                <span class="badge bg-danger-subtle text-danger-emphasis px-3 py-1 rounded-pill fw-semibold small">
                                    <i class="bi bi-tag me-1"></i> {{ $produk->category->name }}
                                </span>
                            </div>
                        @endif

                        <div class="mb-4">
                            <span class="fw-bold text-danger display-5">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </div>

                        <hr class="mb-4">

                        <div class="mb-5">
                            <h5 class="fw-semibold mb-3 text-dark"><i class="bi bi-box-seam me-2"></i> Deskripsi Produk</h5>
                            <p class="text-muted">{{ $produk->deskripsi }}</p>
                        </div>

                        <div class="d-flex gap-3 mb-5">
                            <div class="bg-light px-4 py-3 rounded-3">
                                <div class="small text-muted mb-1">Stok Tersedia</div>
                                <div class="fw-bold fs-4 text-danger">{{ $produk->stok }}</div>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <a href="{{ route('public.produk.index') }}" class="btn btn-outline-danger rounded-pill px-5 fw-semibold flex-grow-1">
                                <i class="bi bi-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="mt-8 pt-8">
            <h4 class="fw-bold mb-4">Produk Terkait</h4>
            <div class="row g-4">
                @php
                    $relatedProduks = \App\Models\Produk::where('stok', '>', 0)->where('id', '!=', $produk->id)->take(3)->get();
                @endphp
                @foreach($relatedProduks as $related)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border border-light-subtle">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-center mb-3">
                                    @if($related->foto)
                                        <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->nama_produk }}" class="img-fluid" style="height: 150px; object-fit: contain;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px; width: 100%;">
                                            <i class="bi bi-box-seam text-muted fs-1"></i>
                                        </div>
                                    @endif
                                </div>
                                <h6 class="fw-semibold mb-1 text-dark">{{ $related->nama_produk }}</h6>
                                <span class="fw-bold text-danger">Rp {{ number_format($related->harga, 0, ',', '.') }}</span>
                                <a href="{{ route('public.produk.show', $related->id) }}" class="btn btn-outline-danger btn-sm mt-3 w-100 rounded-pill">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection