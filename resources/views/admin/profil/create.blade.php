@extends('layouts.admin')

@section('title', 'Tambah Profil Koperasi')

@section('content')
<div class="page-header">
    <h1>Tambah Profil Koperasi</h1>
    <p>Isikan informasi profil koperasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.profil.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
                <input type="text" class="form-control @error('nama_koperasi') is-invalid @enderror" id="nama_koperasi" name="nama_koperasi" value="{{ old('nama_koperasi') }}" required>
                @error('nama_koperasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="nib" class="form-label">NIB</label>
                <input type="text" class="form-control @error('nib') is-invalid @enderror" id="nib" name="nib" value="{{ old('nib') }}" required>
                @error('nib')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="npwp" class="form-label">NPWP</label>
                <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ old('npwp') }}" required>
                @error('npwp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="jenis_koperasi" class="form-label">Jenis Koperasi</label>
                <input type="text" class="form-control @error('jenis_koperasi') is-invalid @enderror" id="jenis_koperasi" name="jenis_koperasi" value="{{ old('jenis_koperasi') }}" required>
                @error('jenis_koperasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.profil.index') }}" class="btn btn-outline-danger">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection
