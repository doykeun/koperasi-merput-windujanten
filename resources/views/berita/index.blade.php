@extends('layouts.public')

@section('title', 'Berita')

@section('content')
    <div class="content-wrapper">
        <div class="mb-5">
            <h2 class="fw-bold mb-2" style="color: #dc2626;">Berita & Pengumuman</h2>
            <p class="text-muted mb-0">Informasi terbaru dari Koperasi Merah Putih Desa Windujanten</p>
        </div>
        
        <div class="row g-4">
            @foreach($beritas as $berita)
                <div class="col-md-4">
                    <div class="card h-100 border border-red-100 shadow-sm overflow-hidden hover:shadow-md transition-all">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height: 200px; background: #fef2f2;">
                                <i class="bi bi-newspaper" style="color: #dc2626; font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body p-4">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y') }}
                            </small>
                            <h5 class="fw-bold mb-2" style="color: #dc2626;">{{ $berita->judul }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($berita->isi, 100) }}</p>
                            <a href="{{ route('public.berita.show', $berita->id) }}" class="btn btn-sm fw-semibold" style="background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%); color: white; border: none;">
                                <i class="bi bi-arrow-right me-1"></i> Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection