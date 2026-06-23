@extends('layouts.admin')

@section('title', 'Profil Koperasi')

@section('content')
<div class="page-header">
    <h1>Profil Koperasi</h1>
    <p>Kelola informasi profil koperasi</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white;">
        <span class="fw-semibold"><i class="bi bi-info-circle me-2"></i>Informasi Profil</span>
        @if(!$profil)
            <a href="{{ route('admin.profil.create') }}" class="btn btn-light btn-sm fw-semibold">
                <i class="bi bi-plus-lg me-1"></i> Tambah Profil
            </a>
        @else
            <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn btn-light btn-sm fw-semibold">
                <i class="bi bi-pencil me-1"></i> Edit Profil
            </a>
        @endif
    </div>
    <div class="card-body p-4">
        @if($profil)
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-4 p-4 rounded-3" style="background: #fef2f2;">
                        <label class="text-muted small text-uppercase mb-2 d-block fw-semibold" style="color: #4b5563;">Nama Koperasi</label>
                        <h4 class="fw-bold mb-0" style="color: #dc2626;">{{ $profil->nama_koperasi }}</h4>
                    </div>
                    <div class="mb-4 p-4 rounded-3" style="background: #f9fafb;">
                        <label class="text-muted small text-uppercase mb-2 d-block fw-semibold" style="color: #4b5563;">NIK</label>
                        <h5 class="fw-bold mb-0" style="color: #1f2937;">{{ $profil->nik }}</h5>
                    </div>
                    <div class="mb-4 p-4 rounded-3" style="background: #f9fafb;">
                        <label class="text-muted small text-uppercase mb-2 d-block fw-semibold" style="color: #4b5563;">NIB</label>
                        <h5 class="fw-bold mb-0" style="color: #1f2937;">{{ $profil->nib }}</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4 p-4 rounded-3" style="background: #f9fafb;">
                        <label class="text-muted small text-uppercase mb-2 d-block fw-semibold" style="color: #4b5563;">NPWP</label>
                        <h5 class="fw-bold mb-0" style="color: #1f2937;">{{ $profil->npwp }}</h5>
                    </div>
                    <div class="mb-4 p-4 rounded-3" style="background: #f9fafb;">
                        <label class="text-muted small text-uppercase mb-2 d-block fw-semibold" style="color: #4b5563;">Jenis Koperasi</label>
                        <h5 class="fw-bold mb-0" style="color: #1f2937;">{{ $profil->jenis_koperasi }}</h5>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info mb-0">
                Profil koperasi belum ditambahkan. Silakan tambahkan profil terlebih dahulu.
            </div>
        @endif
    </div>
</div>
@endsection
