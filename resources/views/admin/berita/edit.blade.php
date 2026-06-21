@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="page-header">
    <h1>Edit Berita</h1>
    <p>Ubah konten berita yang sudah ada</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required>
            </div>
            <div class="mb-4">
                <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                <textarea class="form-control" id="isi" name="isi" rows="6" required>{{ $berita->isi }}</textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label fw-semibold">Foto Berita</label>
                @if($berita->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6;">
                    </div>
                @endif
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Update
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
