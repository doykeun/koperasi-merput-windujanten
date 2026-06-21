@extends('layouts.admin')

@section('title', $berita->judul)

@section('content')
<div class="page-header">
    <h1>Detail Berita</h1>
    <p>Lihat berita secara lengkap</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-4">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="mb-3">
            <span class="text-muted">
                <i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y') }}
            </span>
        </div>
        <h2 class="fw-bold mb-4">{{ $berita->judul }}</h2>
        @if($berita->foto)
            <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}" style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="lead">{{ $berita->isi }}</div>
        <div class="mt-4">
            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i> Edit Berita
            </a>
        </div>
    </div>
</div>
@endsection
