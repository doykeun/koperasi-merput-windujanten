@extends('layouts.public')

@section('title', 'Profil Koperasi')

@section('content')
    <div class="content-wrapper">
        <div class="mb-5">
            <h2 class="fw-bold mb-2" style="color: #dc2626;">Profil Koperasi</h2>
            <p class="text-muted mb-0">Informasi lengkap tentang Koperasi Merah Putih Desa Windujanten</p>
        </div>
        
        @if($profil)
            <div class="card border border-red-100 shadow-sm overflow-hidden">
                <div class="card-header" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%);">
                    <h5 class="fw-bold mb-0 text-white"><i class="bi bi-building me-2"></i> Profil Koperasi</h5>
                </div>
                <div class="card-body p-5">
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
                </div>
            </div>
        @else
            <div class="alert alert-info border-0 shadow-sm">
                <i class="bi bi-info-circle me-2"></i> Profil koperasi belum tersedia.
            </div>
        @endif
    </div>
@endsection