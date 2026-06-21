@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('public.berita.index') }}" class="btn btn-secondary btn-sm mb-3">Kembali</a>
                <h2>{{ $berita->judul }}</h2>
                <p class="text-muted small mb-4">{{ $berita->created_at->format('d M Y') }}</p>
                @if($berita->foto)
                    <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
                @endif
                <div>{{ $berita->isi }}</div>
            </div>
        </div>
    </div>
@endsection