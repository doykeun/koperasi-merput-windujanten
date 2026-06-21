@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="page-header">
    <h1>Edit Produk</h1>
    <p>Ubah informasi produk yang sudah ada</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="category_id" class="form-label fw-semibold">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $produk->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="harga" class="form-label fw-semibold">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="stok" class="form-label fw-semibold">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ $produk->deskripsi }}</textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label fw-semibold">Foto Produk</label>
                @if($produk->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6;">
                    </div>
                @endif
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Update
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
