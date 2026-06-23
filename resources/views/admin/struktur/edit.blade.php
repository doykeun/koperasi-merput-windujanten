@extends('layouts.admin')

@section('title', 'Edit Struktur Organisasi')

@section('content')
<div class="page-header">
    <h1>Edit Anggota Struktur</h1>
    <p>Perbarui informasi anggota struktur organisasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $struktur->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}" required>
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan Tampil</label>
                <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan', $struktur->urutan) }}" required>
                @error('urutan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="foto" class="form-label">Foto (opsional)</label>
                @if($struktur->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $struktur->foto) }}" alt="Foto" style="height: 100px; width: 100px; object-fit: cover; border-radius: 50%;">
                    </div>
                @endif
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save me-1"></i> Update
            </button>
            <a href="{{ route('admin.struktur.index') }}" class="btn btn-outline-danger">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
