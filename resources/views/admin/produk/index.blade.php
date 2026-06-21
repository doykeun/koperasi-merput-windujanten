@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
<div class="page-header">
    <h1>Daftar Produk</h1>
    <p>Kelola semua produk koperasi</p>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Semua Produk</span>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $key => $produk)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div style="width: 50px; height: 50px; background: #f8f9fa; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium">{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->category->name ?? '-' }}</td>
                        <td class="fw-semibold text-primary">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $produk->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $produk->stok > 0 ? $produk->stok . ' tersedia' : 'Habis' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.produk.show', $produk->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
