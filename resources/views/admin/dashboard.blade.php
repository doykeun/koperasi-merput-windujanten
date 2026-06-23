@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <div class="row">
        <!-- Profil Koperasi -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #dc2626;">
                    <h6 class="m-0 font-weight-bold text-white">Profil Koperasi</h6>
                    <a href="{{ route('admin.profil.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>
                </div>
                <div class="card-body">
                    @if($profil)
                        <div class="mb-3">
                            <label class="text-muted small">Nama Koperasi</label>
                            <h5 class="font-weight-bold mb-0" style="color: #dc2626;">{{ $profil->nama_koperasi }}</h5>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">NIK</label>
                            <p class="mb-0">{{ $profil->nik }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">NIB</label>
                            <p class="mb-0">{{ $profil->nib }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">NPWP</label>
                            <p class="mb-0">{{ $profil->npwp }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small">Jenis Koperasi</label>
                            <p class="mb-0">{{ $profil->jenis_koperasi }}</p>
                        </div>
                    @else
                        <div class="alert alert-info">Profil Koperasi belum diisi, <a href="{{ route('admin.profil.create') }}">klik disini untuk membuat</a></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: #dc2626;">
                    <h6 class="m-0 font-weight-bold text-white">Struktur Organisasi</h6>
                    <a href="{{ route('admin.struktur.index') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-users-cog"></i> Kelola Struktur
                    </a>
                </div>
                <div class="card-body">
                    @if($struktur->count() > 0)
                        <div class="row">
                            @foreach($struktur as $org)
                                <div class="col-md-6 mb-3">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ $org->jabatan }}</div>
                                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $org->nama }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">Struktur Organisasi belum ditambahkan</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Singkat -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Produk::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Berita::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Category::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Struktur</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $struktur->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
