@extends('layouts.public')

@section('title', 'Berita')

@section('content')
    <div class="content-wrapper">
        <h4 class="fw-bold mb-4">Berita Terbaru</h4>
        <div class="row g-4">
            @foreach($beritas as $berita)
                <div class="col-md-4">
                    <div class="card h-100">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted fs-1"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h6 class="fw-bold mb-1">{{ $berita->judul }}</h6>
                            <small class="text-muted d-block mb-2">{{ $berita->created_at->format('d M Y') }}</small>
                            <p class="card-text">{{ Str::limit($berita->isi, 100) }}</p>
                            <a href="{{ route('public.berita.show', $berita->id) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection