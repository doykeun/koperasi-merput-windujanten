@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
<div class="page-header">
    <h1>Daftar Produk</h1>
    <p>Kelola semua produk koperasi</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white;">
        <span class="fw-semibold"><i class="bi bi-box-seam me-2"></i>Semua Produk</span>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-light btn-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $key => $produk)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($storageImage($produk->foto))
                                <img src="{{ $storageImage($produk->foto) }}" alt="{{ $produk->nama_produk }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width: 60px; height: 60px; background: #fef2f2; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #dc2626;">
                                    <i class="bi bi-image fs-4"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $produk->nama_produk }}</td>
                        <td><span class="badge bg-light text-dark">{{ $produk->category->name ?? '-' }}</span></td>
                        <td class="fw-bold" style="color: #dc2626;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $produk->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $produk->stok > 0 ? $produk->stok . ' Tersedia' : 'Habis' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-outline-danger btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
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
</div>
@endsection
