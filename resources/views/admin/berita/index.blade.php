@extends('layouts.admin')

@section('title', 'Berita')

@section('content')
<div class="page-header">
    <h1>Daftar Berita</h1>
    <p>Kelola semua berita dan pengumuman koperasi</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white;">
        <span class="fw-semibold"><i class="bi bi-newspaper me-2"></i>Semua Berita</span>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-light btn-sm fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            @foreach($beritas as $berita)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        @if($storageImage($berita->foto))
                            <img src="{{ $storageImage($berita->foto) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height: 200px; background: #fef2f2;">
                                <span style="color: #dc2626;"><i class="bi bi-image fs-1"></i></span>
                            </div>
                        @endif
                        <div class="card-body">
                            <p class="text-muted small mb-2">
                                <i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y') }}
                                @if($berita->is_penting)
                                    <span class="badge bg-danger ms-1">Penting</span>
                                @endif
                            </p>
                            <h5 class="card-title fw-bold" style="color: #dc2626;">{{ $berita->judul }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($berita->isi, 100) }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-outline-danger btn-sm flex-grow-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
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
