@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <div class="content-wrapper">
        <!-- Hero Section -->
        <div class="hero-section mb-5">
            <div class="hero-content">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang.</h1>
                <p class="lead opacity-80">Bersama Koperasi Merah Putih, Cari Kebutuhan harian dan<br>Tingkatkan ekonomi bersama - sama.</p>
            </div>
        </div>

        <div class="row">
            <!-- Produk Section -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">Daftar Produk</h4>
                    <a href="{{ route('public.produk.index') }}" class="text-primary text-decoration-none fw-bold small">
                        Katalog Lengkap <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="row g-4">
                    @foreach($produks as $produk)
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body p-4">
                                    @if($produk->stok > 0)
                                        <span class="stock-badge">Stok Tersedia</span>
                                    @endif
                                    <div class="d-flex justify-content-center mb-3">
                                        @if($produk->foto)
                                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="img-fluid" style="height: 150px; object-fit: contain;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px; width: 100%;">
                                                <span class="text-muted">No Image</span>
                                            </div>
                                        @endif
                                    </div>
                                    <h6 class="fw-bold mb-1">{{ $produk->nama_produk }}</h6>
                                    @if($produk->category)
                                        <small class="text-muted d-block mb-2">{{ $produk->category->name }}</small>
                                    @endif
                                    <small class="text-muted mb-2 d-block">
                                        @if($produk->deskripsi)
                                            {{ Str::limit($produk->deskripsi, 80) }}
                                        @endif
                                    </small>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary fs-5">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Berita Section -->
            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">Berita Terbaru</h4>
                @foreach($beritas as $berita)
                    <div class="news-card">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 8px;">
                                <i class="bi bi-image text-muted fs-2"></i>
                            </div>
                        @endif
                        <div class="flex-1">
                            <small class="text-primary fw-bold d-block mb-1">Pengumuman</small>
                            <h6 class="fw-bold mb-0">{{ Str::limit($berita->judul, 40) }}</h6>
                            <small class="text-muted mt-1 d-block">{{ $berita->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

                <!-- Announcement Card -->
                <div class="announcement-card">
                    <div class="d-flex align-items-start gap-3">
                        <div class="flex-1">
                            <h6 class="fw-bold mb-2">Pengumuman Penting</h6>
                            <p class="small mb-0 opacity-90">Sistem akan melakukan maintenance pada Sabtu, 15 Juni pukul 23:00 WIB.</p>
                        </div>
                        <i class="bi bi-megaphone fs-1 opacity-20"></i>
                    </div>
                    <a href="#" class="text-white text-decoration-none small fw-bold mt-3 d-block">
                        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection