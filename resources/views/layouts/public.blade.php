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
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #343a40 0%, #2d3436 100%);
            padding: 30px 20px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
        }
        .sidebar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .sidebar-brand span {
            color: #dc3545;
        }
        .sidebar-subtitle {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 40px;
        }
        .sidebar-nav {
            flex: 1;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #adb5bd;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 8px;
            transition: all 0.2s;
            font-size: 0.95rem;
        }
        .sidebar-nav a:hover {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .sidebar-nav a.active {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left: 3px solid #dee2e6;
        }
        .sidebar-nav a i {
            font-size: 1.2rem;
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
            background: rgba(200, 200, 220, 0.8);
            backdrop-filter: blur(10px);
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 24px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .top-header .brand {
            margin-right: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #002b7f;
        }
        .top-header .brand .flag {
            font-size: 2.5rem;
        }
        .top-header i {
            font-size: 1.75rem;
            color: #495057;
            cursor: pointer;
        }
        .top-header .search-bar {
            flex: 1;
            max-width: 400px;
            margin-right: auto;
        }
        .top-header .search-bar input {
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
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
            background: linear-gradient(90deg, #002b7f 0%, #0040c8 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #001f5f 0%, #0030a0 100%);
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
            background: linear-gradient(135deg, #002b7f 0%, #0040c8 100%);
            color: white;
            padding: 50px 40px;
            border-radius: 4px;
            position: relative;
        }
        .stock-badge {
            background: #98d9a8;
            color: #155724;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">Koperasi <span>Merah Putih</span></div>
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

        </nav>
    </div>

    <div class="main-content">
        <div class="top-header">
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="brand">
                <span>Koperasi</span>
                <span class="flag">🇮🇩</span>
            </div>
            <i class="bi bi-bell"></i>
            <i class="bi bi-question-circle"></i>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>