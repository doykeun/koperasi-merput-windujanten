<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Koperasi Merah Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            color: #1a202c;
        }
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1a202c 0%, #2d3748 100%);
            padding: 30px 24px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }
        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 4px;
        }
        .sidebar-brand span { color: #dc2626; }
        .sidebar-subtitle {
            color: #9ca3af;
            font-size: 0.85rem;
            margin-bottom: 32px;
        }
        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
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
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .sidebar-nav a.active {
            background: rgba(220,38,38,0.2);
            color: white;
            font-weight: 600;
        }
        .sidebar-nav i { font-size: 1.2rem; width: 24px; }
        .main-content-wrapper {
            flex: 1;
            margin-left: 280px;
        }
        .top-header {
            background: white;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        .top-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e40af;
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
            background: linear-gradient(135deg, #f8f9ff 0%, #e8f4fd 50%, #f0fff4 100%);
            padding: 40px;
            position: relative;
            overflow-y: auto;
            min-height: calc(100vh - 70px);
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
    </style>
</head>
<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-brand">Koperasi <span>Merah Putih</span></div>
            <div class="sidebar-subtitle">Koperasi Indonesia</div>
            
            <nav class="sidebar-nav">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="/kopmerput-admin" class="{{ !request()->has('view') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i>
                        Profile
                    </a>
                    <a href="/kopmerput-admin?view=admin" class="{{ request()->has('view') && request()->view == 'admin' ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.produk.index') }}">
                        <i class="bi bi-box-seam"></i>
                        Produk
                    </a>
                    <a href="{{ route('admin.berita.index') }}">
                        <i class="bi bi-newspaper"></i>
                        Berita
                    </a>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="bi bi-tags"></i>
                        Kategori
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
                <h3>Koperasi <span style="color: #1e40af;">ID</span></h3>
                <div class="header-actions">
                    <i class="bi bi-bell"></i>
                    <i class="bi bi-question-circle"></i>
                </div>
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
</body>
</html>