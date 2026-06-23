@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="page-header">
    <h1>Tambah Berita Baru</h1>
    <p>Buat berita atau pengumuman baru untuk koperasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" required placeholder="Masukkan judul berita">
            </div>
            <div class="mb-4">
                <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                <textarea class="form-control" id="isi" name="isi" rows="6" required placeholder="Masukkan isi berita"></textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="form-label fw-semibold">Foto Berita (Opsional)</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_penting" name="is_penting" value="1">
                    <label class="form-check-label fw-semibold" for="is_penting">
                        Jadikan sebagai Pengumuman Penting
                    </label>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-danger">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
