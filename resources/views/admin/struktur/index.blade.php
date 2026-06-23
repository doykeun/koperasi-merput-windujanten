@extends('layouts.admin')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="page-header">
    <h1>Struktur Organisasi</h1>
    <p>Kelola struktur organisasi koperasi</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white;">
        <span class="fw-semibold"><i class="bi bi-people me-2"></i>Daftar Struktur Organisasi</span>
        <a href="{{ route('admin.struktur.create') }}" class="btn btn-light btn-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Anggota
        </a>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            @foreach($struktur as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center overflow-hidden">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="mx-auto mt-4" alt="{{ $item->nama }}" style="height: 200px; width: 200px; object-fit: cover; border-radius: 50%;">
                        @else
                            <div class="d-flex align-items-center justify-content-center mx-auto mt-4" style="height: 200px; width: 200px; border-radius: 50%; background: #fef2f2;">
                                <i class="bi bi-person" style="color: #dc2626; font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <p class="text-muted small mb-1">
                                Urutan: {{ $item->urutan }}
                            </p>
                            <h5 class="fw-bold mb-1" style="color: #dc2626;">{{ $item->nama }}</h5>
                            <p class="text-muted mb-3">{{ $item->jabatan }}</p>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.struktur.edit', $item->id) }}" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
