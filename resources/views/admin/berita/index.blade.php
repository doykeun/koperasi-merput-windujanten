@extends('layouts.admin')

@section('title', 'Berita')

@section('content')
<div class="page-header">
    <h1>Daftar Berita</h1>
    <p>Kelola semua berita dan pengumuman koperasi</p>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Semua Berita</span>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-danger btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($beritas as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-muted"><i class="bi bi-image fs-1"></i></span>
                            </div>
                        @endif
                        <div class="card-body">
                            <p class="text-muted small mb-1">
                                <i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y') }}
                            </p>
                            <h5 class="card-title fw-semibold">{{ $berita->judul }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($berita->isi, 100) }}</p>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.berita.show', $berita->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
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
