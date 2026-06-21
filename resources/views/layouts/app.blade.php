<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Koperasi Merah Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            background-color: #2d3436;
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            flex-shrink: 0;
        }
        .sidebar-brand {
            font-weight: bold;
            font-size: 1.2rem;
            padding: 0 20px 20px;
            border-bottom: 1px solid #444;
            margin-bottom: 20px;
        }
        .sidebar-nav .nav-link {
            color: #b2bec3;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }
        .sidebar-nav .nav-link:hover, .sidebar-nav .nav-link.active {
            background-color: #636e72;
            color: white;
            border-left: 4px solid #dc3545;
        }
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .search-bar {
            flex: 1;
            max-width: 400px;
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .hero-section {
            background: linear-gradient(135deg, #001a72 0%, #003399 100%);
            color: white;
            padding: 50px 30px;
            margin: 0 30px;
            border-radius: 10px;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .card {
            transition: transform 0.2s;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .stock-badge {
            background-color: #00b894;
            color: white;
            font-size: 0.7rem;
            padding: 4px 8px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }
        .news-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e1e8ed;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .news-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .announcement-card {
            background-color: #001a72;
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        .footer {
            background: #f1f2f6;
            padding: 20px 30px;
            margin-top: auto;
            border-top: 1px solid #e1e8ed;
            font-size: 0.9rem;
            color: #636e72;
        }
        .content-wrapper {
            padding: 30px;
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <div>Koperasi Merah Putih</div>
            <small class="text-secondary">Koperasi Indonesia</small>
        </div>
        <ul class="nav sidebar-nav flex-column">
            <!-- Public Menu (always visible) -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    <i class="bi bi-house"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="{{ route('produk.public.index') }}">
                    <i class="bi bi-box"></i> Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" href="{{ route('berita.public.index') }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
            </li>

            @guest
                <!-- Admin Login (only for guests) -->
                <li class="nav-item mt-4">
                    <a class="nav-link {{ request()->is('login') || request()->is('register') ? 'active' : '' }}" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Admin Login
                    </a>
                </li>
            @else
                <!-- Admin Menu (only for logged in admin) -->
                <li class="nav-item mt-4 pt-4 border-top border-secondary">
                    <div class="px-4 mb-2 text-secondary text-uppercase small">Admin Panel</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">
                        <i class="bi bi-tags"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/produk*') ? 'active' : '' }}" href="{{ route('admin.produk.index') }}">
                        <i class="bi bi-box-seam"></i> Kelola Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">
                        <i class="bi bi-journal-text"></i> Kelola Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
                        <i class="bi bi-person"></i> Profil
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="search-bar">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control bg-light border-start-0" placeholder="Cari produk...">
                </div>
            </div>
            <div class="header-right">
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold text-primary">Koperasi</span>
                    <span class="fs-3">🇮🇩</span>
                </div>
                <i class="bi bi-bell fs-4 text-secondary"></i>
                <i class="bi bi-question-circle fs-4 text-secondary"></i>
            </div>
        </header>

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

        @yield('content')

        <footer class="footer">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>&copy; 2026 Koperasi Merah Putih. Berizin dan diawasi oleh Kemenkop UKM.</div>
                <div class="d-flex gap-4">
                    <a href="#" class="text-decoration-none text-secondary">Syarat & Ketentuan</a>
                    <a href="#" class="text-decoration-none text-secondary">Kebijakan Privasi</a>
                    <a href="#" class="text-decoration-none text-secondary">Kontak Bantuan</a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>