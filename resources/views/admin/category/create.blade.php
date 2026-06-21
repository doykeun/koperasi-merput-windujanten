@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="page-header">
    <h1>Tambah Kategori Baru</h1>
    <p>Buat kategori produk baru</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama kategori">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
