<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Koperasi Merah Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            min-height: 100vh;
            display: flex;
            background-color: #f8f9ff;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #991b1b;
        }

        /* News card hover */
        .news-card:hover {
            border-color: #dc2626 !important;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2) !important;
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #dc2626 0%, #991b1b 100%);
            padding: 30px 20px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
            box-shadow: 4px 0 20px rgba(220, 38, 38, 0.2);
        }
        .sidebar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        .sidebar-brand span {
            color: white;
        }
        .sidebar-subtitle {
            color: #fecaca;
            font-size: 0.85rem;
            margin-bottom: 40px;
            font-weight: 500;
        }
        .sidebar-nav {
            flex: 1;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            color: #fee2e2;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: all 0.3s;
            font-size: 0.95rem;
            font-weight: 500;
        }
        .sidebar-nav a:hover {
            color: white;
            background: rgba(255,255,255,0.2);
            transform: translateX(4px);
        }
        .sidebar-nav a.active {
            background: white;
            color: #dc2626;
            border-left: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .sidebar-nav a i {
            font-size: 1.25rem;
            width: 24px;
        }
        .sidebar-nav form button:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .sidebar-nav form button:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .main-content {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .top-header {
            background: white;
            backdrop-filter: blur(10px);
            padding: 18px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 24px;
            border-bottom: 2px solid #dc2626;
            box-shadow: 0 2px 10px rgba(220, 38, 38, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .top-header .brand {
            margin-right: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.4rem;
            font-weight: 800;
            color: #dc2626;
        }
        .top-header .brand .flag {
            font-size: 2.5rem;
        }
        .top-header i {
            font-size: 1.5rem;
            color: #64748b;
            cursor: pointer;
            transition: color 0.2s;
        }
        .top-header i:hover {
            color: #dc2626;
        }
        .top-header .search-bar {
            flex: 1;
            max-width: 360px;
            margin-right: auto;
        }
        .top-header .search-bar input {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 10px 20px;
            transition: all 0.2s;
        }
        .top-header .search-bar input:focus {
            background: white;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
            outline: none;
        }
        .content-wrapper {
            padding: 30px 40px;
            flex: 1;
        }
        .page-header {
            margin-bottom: 30px;
        }
        .page-header h1 {
            font-size: 1.75rem;
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .page-header p {
            color: #6c757d;
            margin: 0;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 16px 20px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #991b1b 0%, #7f1d1d 100%);
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: #d7e3fc;
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
            color: #495057;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .alert {
            border-radius: 4px;
        }
        .footer {
            background: transparent;
            padding: 20px 40px;
            margin-top: auto;
            border-top: none;
            font-size: 0.85rem;
            color: #6c757d;
        }
        .hero-section {
            background-image: url('/images/kdmp-windujanten.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 50px 40px;
            border-radius: 4px;
            position: relative;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 4px;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            background: transparent;
            padding: 30px;
            border-radius: 8px;
            display: inline-block;
        }
        .stock-badge {
            background: linear-gradient(135deg, #86efac 0%, #4ade80 100%);
            color: #166534;
            font-weight: 700;
            font-size: 0.75rem;
            padding: 6px 14px;
            border-radius: 999px;
            display: inline-block;
            margin-bottom: 12px;
        }
        .news-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .news-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }
        .announcement-card {
            background: linear-gradient(135deg, #002b7f 0%, #0040c8 100%);
            color: white;
            border-radius: 4px;
            padding: 20px;
            margin-top: 20px;
        }
        
        /* Custom Pagination */
        .pagination .page-link {
            color: #dc2626;
            border-color: #dc2626;
        }
        .pagination .page-link:hover {
            background-color: #fee2e2;
            color: #dc2626;
            border-color: #dc2626;
        }
        .pagination .page-item.active .page-link {
            background-color: #dc2626;
            border-color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            {{ $profilKoperasi ? explode(' ', $profilKoperasi->nama_koperasi)[0] . ' ' . explode(' ', $profilKoperasi->nama_koperasi)[1] : 'Koperasi Merah Putih' }}
        </div>
        <div class="sidebar-subtitle">Koperasi Indonesia</div>
        
        <nav class="sidebar-nav">
            <a href="{{ route('public.home') }}" class="{{ request()->routeIs('public.home') ? 'active' : '' }}">
                <i class="bi bi-house"></i>
                Beranda
            </a>
            <a href="{{ route('public.produk.index') }}" class="{{ request()->routeIs('public.produk.*') ? 'active' : '' }}">
                <i class="bi bi-box"></i>
                Produk
            </a>
            <a href="{{ route('public.berita.index') }}" class="{{ request()->routeIs('public.berita.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                Berita
            </a>
            <a href="{{ route('public.profil.index') }}" class="{{ request()->routeIs('public.profil.*') ? 'active' : '' }}">
                <i class="bi bi-info-circle"></i>
                Profil
            </a>
            <a href="{{ route('public.struktur.index') }}" class="{{ request()->routeIs('public.struktur.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Struktur Organisasi
            </a>

        </nav>
    </div>

    <div class="main-content">
        <div class="top-header">
            <div class="brand w-100 justify-content-center">
                <span>{{ $profilKoperasi ? strtoupper($profilKoperasi->nama_koperasi) : 'KOPERASI MERAH PUTIH WINDUJANTEN' }}</span>
            </div>
            <i class="bi bi-bell" id="notificationBell" data-bs-toggle="modal" data-bs-target="#notificationModal"></i>
        </div>

        @if(session('success'))
            <div class="container mt-3 px-3">
                <div class="alert alert-success mx-3">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3 px-3">
                <div class="alert alert-danger mx-3">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>&copy; {{ date('Y') }} Koperasi Merah Putih. Berizin dan diawasi oleh Kemenkop UKM.</div>
                <div class="d-flex gap-4">
                    <a href="#" class="text-decoration-none text-muted">Syarat & Ketentuan</a>
                    <a href="#" class="text-decoration-none text-muted">Kebijakan Privasi</a>
                    <a href="#" class="text-decoration-none text-muted">Kontak Bantuan</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Notification Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #dc2626; color: white;">
                    <h5 class="modal-title" id="notificationModalLabel">Berita Terbaru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php
                        $oneDayAgo = \Carbon\Carbon::now()->subDay();
                        $recentNews = \App\Models\Berita::where('created_at', '>=', $oneDayAgo)->latest()->get();
                    @endphp
                    @if($recentNews->count() > 0)
                        @foreach($recentNews as $news)
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-1">{{ $news->judul }}</h6>
                                    <small class="text-muted">{{ $news->created_at->format('d M Y') }}</small>
                                    <p class="mb-0 mt-2">{{ Str::limit($news->isi, 100) }}</p>
                                    <a href="{{ route('public.berita.show', $news->id) }}" class="text-danger text-decoration-none fw-semibold small">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center py-4">Tidak ada berita terbaru dalam 1 hari terakhir</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>