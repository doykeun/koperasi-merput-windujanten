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
            <div class="col-12 col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold" style="color: #dc2626;">Daftar Produk</h4>
                    <a href="{{ route('public.produk.index') }}" class="text-danger text-decoration-none fw-bold small">
                        Katalog Lengkap <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="row g-4">
                    @foreach($produks as $produk)
                        <div class="col-12 col-md-6">
                            <div class="card h-100 border border-red-100 shadow-sm overflow-hidden hover:shadow-md transition-all">
                                <div class="card-body p-4">
                                    @if($produk->stok > 0)
                                        <span class="stock-badge">Stok Tersedia</span>
                                    @else
                                        <span class="badge bg-danger mb-3">Stok Habis</span>
                                    @endif
                                    <div class="d-flex justify-content-center mb-3">
                                        @if($produk->foto)
                                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="img-fluid rounded-2" style="height: 150px; object-fit: contain;">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center rounded" style="height: 150px; width: 100%; background: #fef2f2;">
                                                <i class="bi bi-box" style="color: #dc2626; font-size: 2rem;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <h6 class="fw-bold mb-1" style="color: #1f2937;">{{ $produk->nama_produk }}</h6>
                                    @if($produk->category)
                                        <small class="text-muted d-block mb-2">{{ $produk->category->name }}</small>
                                    @endif
                                    <small class="text-muted mb-2 d-block">
                                        @if($produk->deskripsi)
                                            {{ Str::limit($produk->deskripsi, 80) }}
                                        @endif
                                    </small>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold fs-5" style="color: #dc2626;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Berita Section -->
            <div class="col-12 col-lg-4">
                <h4 class="fw-bold mb-4" style="color: #dc2626;">Berita Terbaru</h4>
                @foreach($beritas as $berita)
                    <a href="{{ route('public.berita.show', $berita->id) }}" class="text-decoration-none">
                        <div class="news-card mb-3 border border-red-100 shadow-sm p-3 rounded hover:shadow-md transition-all">
                            @if($berita->foto)
                                <img src="{{ asset('storage/' . $berita->foto) }}" class="rounded" alt="{{ $berita->judul }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center rounded" style="width: 80px; height: 80px; background: #fef2f2;">
                                    <i class="bi bi-newspaper" style="color: #dc2626; font-size: 2rem;"></i>
                                </div>
                            @endif
                            <div class="flex-1">
                                <small class="fw-bold d-block mb-1" style="color: #dc2626;">Pengumuman</small>
                                <h6 class="fw-bold mb-0" style="color: #1f2937;">{{ Str::limit($berita->judul, 40) }}</h6>
                                <small class="text-muted mt-1 d-block">{{ $berita->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach

                <!-- Announcement Card -->
                @if($pengumumanPenting)
                <a href="{{ route('public.berita.show', $pengumumanPenting->id) }}" class="text-decoration-none">
                    <div class="announcement-card border-0 shadow-sm" style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: white;">
                        <div class="d-flex align-items-start gap-3">
                            <div class="flex-1">
                                <h6 class="fw-bold mb-2">Pengumuman Penting</h6>
                                <p class="small mb-0 opacity-90">{{ Str::limit($pengumumanPenting->isi, 200) }}</p>
                            </div>
                            <i class="bi bi-megaphone fs-1 opacity-30"></i>
                        </div>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
@endsection