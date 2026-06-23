@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="page-header">
    <h1>Edit Kategori</h1>
    <p>Ubah nama kategori produk</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-check-lg me-1"></i> Update
                </button>
                <a href="{{ route('admin.category.index') }}" class="btn btn-outline-danger">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
