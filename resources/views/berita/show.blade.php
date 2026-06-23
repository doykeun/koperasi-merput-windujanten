@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('public.berita.index') }}" class="btn btn-outline-danger btn-sm mb-3">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <h2 class="fw-bold mb-3">{{ $berita->judul }}</h2>
                <p class="text-muted small mb-4">
                    <i class="bi bi-calendar me-1"></i> {{ $berita->created_at->format('d M Y') }}
                </p>
                @if($berita->foto)
                    <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded mb-4 shadow-sm" alt="{{ $berita->judul }}">
                @endif
                <div class="lead">{{ $berita->isi }}</div>
            </div>
        </div>
    </div>
@endsection