@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="page-header">
    <h1>Tambah Produk Baru</h1>
    <p>Tambahkan produk baru ke koperasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required placeholder="Masukkan nama produk">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="category_id" class="form-label fw-semibold">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="harga" class="form-label fw-semibold">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required placeholder="Masukkan harga">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="stok" class="form-label fw-semibold">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" required placeholder="Masukkan stok">
                </div>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required placeholder="Masukkan deskripsi produk"></textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label fw-semibold">Foto Produk</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-danger">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
