<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Koperasi Merah Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            min-height: 100vh;
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
        .app-container {
            display: flex;
            min-height: 100vh;
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
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(220, 38, 38, 0.2);
            transform: translateX(0);
            transition: transform 0.3s ease;
        }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
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
        .main-content-wrapper {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        .top-header {
            background: white;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dc2626;
            box-shadow: 0 2px 10px rgba(220, 38, 38, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #dc2626;
            cursor: pointer;
        }
        .top-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #dc2626;
            margin: 0;
        }
        .top-header .header-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }
        .top-header .header-actions i {
            font-size: 1.4rem;
            color: #6c757d;
            cursor: pointer;
        }
        .main-content {
            flex: 1;
            background: linear-gradient(135deg, #fff5f5 0%, #fef2f2 50%, #ffffff 100%);
            padding: 40px;
            position: relative;
            overflow-y: auto;
            min-height: calc(100vh - 70px);
        }
        .card {
            border-radius: 12px;
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
        .alert {
            border-radius: 6px;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sidebar-overlay.active {
                display: block;
            }
            .main-content-wrapper {
                margin-left: 0;
            }
            .menu-toggle {
                display: block;
            }
            .top-header {
                padding: 12px 20px;
            }
            .top-header h3 {
                font-size: 1.1rem;
            }
            .main-content {
                padding: 20px;
            }
        }

        @media (max-width: 767.98px) {
            .page-header h1 {
                font-size: 1.5rem;
            }
        }

        /* Table responsive */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="app-container">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                {{ $profilKoperasi ? explode(' ', $profilKoperasi->nama_koperasi)[0] . ' ' . explode(' ', $profilKoperasi->nama_koperasi)[1] : 'Koperasi Merah Putih' }}
            </div>
            <div class="sidebar-subtitle">Koperasi Indonesia</div>
            
            <nav class="sidebar-nav">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i>
                        Profil Saya
                    </a>
                    <a href="{{ route('admin.profil.index') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i>
                        Profil Koperasi
                    </a>
                    <a href="{{ route('admin.struktur.index') }}" class="{{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i>
                        Kategori
                    </a>
                    <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        Produk
                    </a>
                    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        Berita
                    </a>
                    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #adb5bd; text-decoration: none; border-radius: 6px; margin-bottom: 8px; transition: all 0.2s; font-size: 0.95rem; background: transparent; border: none; width: 100%; cursor: pointer;">
                                <i class="bi bi-box-arrow-left" style="font-size: 1.2rem; width: 24px;"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                @endif
            </nav>
        </div>

        <div class="main-content-wrapper">
            <div class="top-header">
                <button class="menu-toggle" id="menuToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h3 class="w-100 text-center">{{ $profilKoperasi ? strtoupper($profilKoperasi->nama_koperasi) : 'KOPERASI MERAH PUTIH WINDUJANTEN' }}</h3>
            </div>
            
            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar for mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }

        // Close sidebar when clicking a link on mobile
        const sidebarLinks = document.querySelectorAll('.sidebar-nav a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 991.98) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
