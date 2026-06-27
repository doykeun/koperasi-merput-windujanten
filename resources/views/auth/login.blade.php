<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Koperasi Merah Putih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            transform: translateX(0);
            transition: transform 0.3s ease;
        }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }
        .sidebar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .sidebar-brand span {
            color: white;
        }
        .sidebar-subtitle {
            color: #fecaca;
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
            padding: 14px 16px;
            color: #fee2e2;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: all 0.3s;
            font-size: 0.95rem;
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .sidebar-nav a i {
            font-size: 1.25rem;
            width: 24px;
        }
        .sidebar-nav form button:hover {
            color: white;
            background: rgba(255,255,255,0.2);
        }
        .main-content-wrapper {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        .main-content {
            flex: 1;
            background: linear-gradient(135deg, #fff5f5 0%, #fee2e2 50%, #ffffff 100%);
            padding: 40px;
            position: relative;
            overflow-y: auto;
            min-height: calc(100vh - 70px);
        }
        .main-content.login-mode {
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .bg-decoration {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            opacity: 0.15;
        }
        .bg-decoration.blue {
            background: #dc2626;
            top: -100px;
            right: -100px;
        }
        .bg-decoration.green {
            background: #ef4444;
            bottom: -100px;
            left: -100px;
        }
        .login-card {
            background: white;
            border: 1px solid #fecaca;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(220, 38, 38, 0.1);
            padding: 40px 30px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #dc2626 0%, #ef4444 100%);
            border-radius: 12px 12px 0 0;
        }
        .login-header h1 {
            font-size: 1.75rem;
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .login-header p {
            color: #4a5568;
            font-size: 0.95rem;
            margin-bottom: 32px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 8px;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.1rem;
        }
        .input-wrapper input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 2px solid #dee2e6;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        .input-wrapper input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }
        .input-wrapper .toggle-password {
            left: auto;
            right: 14px;
            cursor: pointer;
            color: #495057;
        }
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        .remember-me label {
            font-size: 0.875rem;
            color: #4a5568;
            margin: 0;
            font-weight: 400;
            cursor: pointer;
        }
        .forgot-password {
            color: #dc2626;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #dc2626 0%, #ef4444 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #b91c1c 0%, #dc2626 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }
        .security-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #fecaca;
            color: #991b1b;
            font-size: 0.85rem;
        }
        .security-info i {
            color: #dc2626;
            font-size: 1.2rem;
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
        /* Table responsive */
        .table-responsive {
            overflow-x: auto;
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
            .main-content.login-mode {
                padding: 20px;
            }
        }

        @media (max-width: 767.98px) {
            .login-card {
                padding: 30px 20px;
            }
            .login-header h1 {
                font-size: 1.5rem;
            }
            .page-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="app-container">
        <div class="sidebar" id="sidebar">
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
                    <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        Produk
                    </a>
                    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        Berita
                    </a>
                    <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
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
                @else
                    <a href="{{ route('admin.login') }}" class="active">
                        <i class="bi bi-lock"></i>
                        Login Admin
                    </a>
                @endif
            </nav>
        </div>

        <div class="main-content-wrapper">
            <div class="top-header">
                <button class="menu-toggle" id="menuToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h3 class="w-100 text-center">KOPERASI MERAH PUTIH DESA WINDUJANTEN</h3>
            </div>

            <div class="main-content {{ !auth()->check() || !auth()->user()->is_admin ? 'login-mode' : '' }}">

        @if(auth()->check() && auth()->user()->is_admin && request()->has('view') && request()->view == 'admin')
            <!-- Admin Panel Content -->
            <div class="container-fluid">
                <div class="page-header">
                    <h1>Dashboard</h1>
                    <p>Ringkasan data produk dan berita.</p>
                </div>

                <!-- Quick Stats -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted small mb-2">Total Produk</h5>
                                <h2 class="fw-bold text-danger">{{ \App\Models\Produk::count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted small mb-2">Total Berita</h5>
                                <h2 class="fw-bold text-danger">{{ \App\Models\Berita::count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted small mb-2">Produk Tersedia</h5>
                                <h2 class="fw-bold text-danger">{{ \App\Models\Produk::where('stok', '>', 0)->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title text-muted small mb-2">Produk Habis</h5>
                                <h2 class="fw-bold text-danger">{{ \App\Models\Produk::where('stok', '<=', 0)->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0 py-3">
                                <h5 class="mb-0 fw-semibold"><i class="bi bi-box-seam me-2 text-danger"></i> Produk Terbaru</h5>
                                <a href="{{ route('admin.produk.index') }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-arrow-right me-1"></i> Lihat Semua
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-uppercase small fw-semibold text-muted px-4">Nama Produk</th>
                                                <th class="text-uppercase small fw-semibold text-muted">Kategori</th>
                                                <th class="text-uppercase small fw-semibold text-muted">Harga</th>
                                                <th class="text-uppercase small fw-semibold text-muted">Stok</th>
                                                <th class="text-uppercase small fw-semibold text-muted">Status</th>
                                                <th class="text-uppercase small fw-semibold text-muted text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="align-middle">
                                            @forelse($produks as $produk)
                                                <tr>
                                                    <td class="px-4 fw-medium">{{ $produk->nama_produk }}</td>
                                                    <td class="text-muted small">{{ $produk->category ? $produk->category->name : '-' }}</td>
                                                    <td class="fw-bold text-dark">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                                    <td class="fw-bold text-dark">{{ $produk->stok }}</td>
                                                    <td>
                                                        @if($produk->stok > 0 && $produk->stok <= 5)
                                                            <span class="badge bg-info text-dark rounded-pill px-3">Stok Menipis</span>
                                                        @elseif($produk->stok > 0)
                                                            <span class="badge bg-success rounded-pill px-3">Tersedia</span>
                                                        @else
                                                            <span class="badge bg-danger rounded-pill px-3">Stok Habis</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.produk.edit', $produk) }}" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-pencil me-1"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        Belum ada produk. <a href="{{ route('admin.produk.create') }}" class="fw-semibold">Buat produk baru</a>.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0 py-3">
                                <h5 class="mb-0 fw-semibold"><i class="bi bi-newspaper me-2 text-danger"></i> Berita Terbaru</h5>
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-arrow-right me-1"></i> Lihat Semua
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-uppercase small fw-semibold text-muted px-4">Judul Berita</th>
                                                <th class="text-uppercase small fw-semibold text-muted">Tanggal</th>
                                                <th class="text-uppercase small fw-semibold text-muted text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="align-middle">
                                            @forelse($beritas as $berita)
                                                <tr>
                                                    <td class="px-4 fw-medium">{{ $berita->judul }}</td>
                                                    <td class="text-muted small">{{ $berita->created_at->format('d M Y') }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-pencil me-1"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center py-4">
                                                        Belum ada berita. <a href="{{ route('admin.berita.create') }}" class="fw-semibold">Buat berita baru</a>.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(auth()->check() && auth()->user()->is_admin)
            <!-- Profile Content -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                        @if(session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') === 'profile-updated' ? 'Profil berhasil diperbarui!' : 'Password berhasil diubah!' }}
                            </div>
                        @endif
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-5 p-md-4 p-sm-3">
                                <h5 class="card-title mb-4 d-flex align-items-center gap-2 fw-semibold">
                                    <i class="bi bi-person-circle text-danger fs-4"></i>
                                    Informasi Akun
                                </h5>

                                <div class="text-center mb-5">
                                    <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);">
                                        <i class="bi bi-person-fill text-white fs-1"></i>
                                    </div>
                                    <h4 class="fw-semibold text-dark mb-1">{{ auth()->user()->name ?? 'Admin Koperasi' }}</h4>
                                    <p class="text-muted small mb-0">{{ auth()->user()->email ?? 'admin@koperasi-merah-putih.com' }}</p>
                                </div>

                                <form method="POST" action="{{ route('admin.profile.update') }}">
                                    @csrf
                                    @method('PATCH')
                                    @if ($errors->has('name') || $errors->has('email') || $errors->has('phone'))
                                        <div class="alert alert-danger mb-3">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold small">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold small">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold small">Nomor Telepon</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Masukkan nomor telepon" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                                        <button type="button" class="btn btn-link text-decoration-none text-danger p-0 fw-semibold" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                            <i class="bi bi-key me-1"></i>Ubah Password
                                        </button>
                                        <button type="submit" class="btn btn-danger px-4 w-sm-auto w-100">
                                            <i class="bi bi-check-lg me-1"></i>Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ubah Password Modal -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-semibold" id="changePasswordModalLabel">
                                <i class="bi bi-key-fill me-2 text-danger"></i>Ubah Password
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-3">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Password Lama</label>
                                    <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama" value="{{ old('current_password') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Password Baru</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password baru" value="{{ old('password') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password baru" value="{{ old('password_confirmation') }}" required>
                                </div>
                            </div>
                            <div class="modal-footer flex-column flex-sm-row gap-2">
                                <button type="button" class="btn btn-outline-danger btn-sm flex-grow-1" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger btn-sm flex-grow-1">
                                    <i class="bi bi-check-lg me-1"></i>Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <!-- Login Form Content -->
            <div class="bg-decoration blue"></div>
            <div class="bg-decoration green"></div>

            <div class="login-card">
                @if(session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="login-header">
                    <div style="display: flex; gap: 6px; margin-bottom: 16px;">
                        <div style="width: 20px; height: 4px; background: #dc2626; border-radius: 2px;"></div>
                        <div style="width: 40px; height: 4px; background: #ef4444; border-radius: 2px;"></div>
                    </div>
                    <h1>Login Administrator</h1>
                    <p>Silakan masukkan kredensial Anda untuk mengakses panel manajemen koperasi.</p>
                </div>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-wrapper">
                            <i class="bi bi-person"></i>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="admin_koperasi" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="bi bi-lock"></i>
                            <input type="password" name="password" id="password" placeholder="••••••••" required>
                            <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="form-options flex-column gap-3 align-items-start">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-password">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-login">
                        Masuk ke Panel Admin <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </form>

                <div class="security-info">
                    <i class="bi bi-shield-shaded"></i>
                    <span>Koneksi terenkripsi SSL 256-bit</span>
                </div>
            </div>
        @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        if (togglePassword && password) {
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        }

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

        // Keep change password modal open if there are errors
        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                const changePasswordModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
                changePasswordModal.show();
            @endif
        });
    </script>
</body>
</html>
