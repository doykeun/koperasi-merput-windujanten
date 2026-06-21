@extends('layouts.admin')

@section('title', $produk->nama_produk)

@section('content')
<div class="page-header">
    <h1>Detail Produk</h1>
    <p>Informasi lengkap produk</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-4">
            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                @if($produk->foto)
                    <img src="{{ asset('storage/' . $produk->foto) }}" class="img-fluid rounded" alt="{{ $produk->nama_produk }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                        <span class="text-muted"><i class="bi bi-image fs-1 me-2"></i> No Image</span>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-2">{{ $produk->nama_produk }}</h2>
                <p class="text-muted mb-1">
                    <i class="bi bi-tags me-1"></i> {{ $produk->category->name ?? 'Tidak ada kategori' }}
                </p>
                <h3 class="text-success fw-bold mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h3>
                <p class="mb-3">
                    <span class="badge {{ $produk->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                        <i class="bi bi-box-seam me-1"></i> {{ $produk->stok > 0 ? $produk->stok . ' tersedia' : 'Habis' }}
                    </span>
                </p>
                <hr>
                <h5 class="fw-semibold mb-2">Deskripsi</h5>
                <p class="text-muted">{{ $produk->deskripsi }}</p>
                <div class="mt-4">
                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil me-1"></i> Edit Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
