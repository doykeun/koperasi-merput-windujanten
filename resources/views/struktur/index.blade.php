@extends('layouts.public')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="content-wrapper">
        <div class="mb-5">
            <h2 class="fw-bold mb-2" style="color: #dc2626;">Struktur Organisasi</h2>
            <p class="text-muted mb-0">Struktur kepengurusan Koperasi Merah Putih Desa Windujanten</p>
        </div>
        
        <div class="row g-4">
            @foreach($struktur as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <div class="card-body text-center p-4">
                            @if($item->foto)
                                <img 
                                    src="{{ asset('storage/' . $item->foto) }}" 
                                    alt="{{ $item->nama }}" 
                                    class="img-fluid rounded-circle mb-3" 
                                    style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fecaca;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 150px; border-radius: 50%; border: 4px solid #fecaca;">
                                    <i class="bi bi-person" style="font-size: 3.5rem; color: #dc2626;"></i>
                                </div>
                            @endif
                            <h5 class="fw-bold mb-1" style="color: #dc2626;">{{ $item->nama }}</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">{{ $item->jabatan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection