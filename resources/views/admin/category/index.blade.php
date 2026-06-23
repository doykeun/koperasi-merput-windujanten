@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="page-header">
    <h1>Daftar Kategori</h1>
    <p>Kelola semua kategori produk</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white;">
        <span class="fw-semibold"><i class="bi bi-tags me-2"></i>Semua Kategori</span>
        <a href="{{ route('admin.category.create') }}" class="btn btn-light btn-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="fw-semibold">{{ $category->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-outline-danger btn-sm me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
