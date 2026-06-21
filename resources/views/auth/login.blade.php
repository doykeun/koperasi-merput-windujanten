<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Koperasi Merah Putih</title>
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
        }
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #343a40 0%, #2d3436 100%);
            padding: 30px 20px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
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
        .main-content {
            flex: 1;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8f4fd 50%, #f0fff4 100%);
            padding: 100px 40px 40px 40px;
            position: relative;
            overflow-y: auto;
            min-height: 100vh;
        }
        .main-content.login-mode {
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .bg-decoration {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            opacity: 0.15;
        }
        .bg-decoration.blue {
            background: #4285f4;
            top: -100px;
            right: -100px;
        }
        .bg-decoration.green {
            background: #34a853;
            bottom: -100px;
            left: -100px;
        }
        .login-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 40px;
            width: 40px;
            height: 4px;
            background: linear-gradient(90deg, #4285f4 0%, #34a853 100%);
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
            border-radius: 4px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        .input-wrapper input:focus {
            outline: none;
            border-color: #4285f4;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.1);
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
            color: #0d6efd;
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
            background: linear-gradient(90deg, #002b7f 0%, #0040c8 100%);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #001f5f 0%, #0030a0 100%);
            transform: translateY(-1px);
        }
        .security-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
            font-size: 0.85rem;
        }
        .security-info i {
            color: #34a853;
            font-size: 1.2rem;
        }
        .top-header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 24px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
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
        .alert {
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">Koperasi <span>Merah Putih</span></div>
        <div class="sidebar-subtitle">Koperasi Indonesia</div>
        
        <nav class="sidebar-nav">
            <div style="margin-top: auto; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
                @if(auth()->check() && auth()->user()->is_admin)
                        <a href="/kopmerput-admin" class="{{ !request()->has('view') ? 'active' : '' }}">
                            <i class="bi bi-person-circle"></i>
                            Profile
                        </a>
                        <a href="/kopmerput-admin?view=admin" class="{{ request()->has('view') && request()->view == 'admin' ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i>
                            Admin Panel
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; color: #adb5bd; text-decoration: none; border-radius: 6px; margin-bottom: 8px; transition: all 0.2s; font-size: 0.95rem; background: transparent; border: none; width: 100%; cursor: pointer;">
                                <i class="bi bi-box-arrow-left" style="font-size: 1.2rem; width: 24px;"></i>
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('admin.login') }}" class="active">
                            <i class="bi bi-lock"></i>
                            Login Admin
                        </a>
                    @endif
            </div>
        </nav>
    </div>

    <div class="main-content {{ !auth()->check() || !auth()->user()->is_admin ? 'login-mode' : '' }}">
        <div class="top-header">
            <div class="brand">
                <span>Koperasi</span>
                <span class="flag">🇮🇩</span>
            </div>
        </div>

        @if(auth()->check() && auth()->user()->is_admin && request()->has('view') && request()->view == 'admin')
            <!-- Admin Panel Content -->
            <div class="container-fluid">
                <div class="page-header mb-5">
                    <h1 class="fw-bold" style="font-size: 1.75rem;">Manajemen Operasional</h1>
                    <p class="text-muted mb-0">Kelola ketersediaan produk dan publikasi informasi komunitas.</p>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4" style="border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <div class="card-header d-flex justify-content-between align-items-center" style="background: white; border-bottom: 1px solid #dee2e6; padding: 16px 20px;">
                                <h5 class="mb-0"><i class="bi bi-clipboard-check me-2 text-primary"></i> Manajemen Stok Produk</h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-filter me-1"></i> Filter
                                    </button>
                                    <button class="btn btn-primary btn-sm">
                                        <i class="bi bi-download me-1"></i> Ekspor Laporan
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-uppercase small fw-semibold text-muted px-4">Nama Produk</th>
                                            <th class="text-uppercase small fw-semibold text-muted">Kategori</th>
                                            <th class="text-uppercase small fw-semibold text-muted">Stok Saat Ini</th>
                                            <th class="text-uppercase small fw-semibold text-muted">Status</th>
                                            <th class="text-uppercase small fw-semibold text-muted text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td class="px-4 fw-medium">Beras Premium 5kg</td>
                                            <td class="text-muted small">Sembako</td>
                                            <td class="fw-bold text-dark">15 Kg</td>
                                            <td><span class="badge bg-success rounded-pill px-3">Tersedia</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="bi bi-plus-square me-1"></i> Tambah Stok
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 fw-medium">Minyak Goreng 1L</td>
                                            <td class="text-muted small">Sembako</td>
                                            <td class="fw-bold text-dark">2 Dus</td>
                                            <td><span class="badge bg-info text-dark rounded-pill px-3">Stok Menipis</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="bi bi-plus-square me-1"></i> Tambah Stok
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 fw-medium">Indomie Goreng</td>
                                            <td class="text-muted small">Sembako</td>
                                            <td class="fw-bold text-dark">10 Dus</td>
                                            <td><span class="badge bg-success rounded-pill px-3">Tersedia</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="bi bi-plus-square me-1"></i> Tambah Stok
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 fw-medium">Le Mineral</td>
                                            <td class="text-muted small">Sembako</td>
                                            <td class="fw-bold text-dark">0 Dus</td>
                                            <td><span class="badge bg-danger rounded-pill px-3">Stok Habis</span></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="bi bi-plus-square me-1"></i> Tambah Stok
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="px-4 py-3">
                                                <div class="d-flex justify-content-between align-items-center small text-muted">
                                                    <span>Menampilkan 4 dari 40 produk</span>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-left"></i></button>
                                                        <button class="btn btn-sm btn-primary">1</button>
                                                        <button class="btn btn-sm btn-outline-secondary">2</button>
                                                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-right"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <div class="card" style="border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <div class="card-body p-5">
                                <h3 class="fw-semibold mb-5"><i class="bi bi-newspaper me-2 text-success"></i> Buat Berita Baru</h3>
                                <form method="POST" action="#">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold small">Judul Berita</label>
                                        <input type="text" class="form-control" placeholder="Masukkan judul yang informatif...">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold small">Konten Berita</label>
                                        <textarea class="form-control" rows="6" placeholder="Tuliskan isi berita atau pengumuman di sini..."></textarea>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold small">Kategori</label>
                                            <select class="form-select">
                                                <option selected>Pengumuman</option>
                                                <option>Promo</option>
                                                <option>Info Koperasi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold small">Status Publikasi</label>
                                            <div class="d-flex gap-3 align-items-center pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="draft" checked>
                                                    <label class="form-check-label" for="draft">
                                                        Draft
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="publish">
                                                    <label class="form-check-label" for="publish">
                                                        Langsung Terbit
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-3 mt-5">
                                        <button type="button" class="btn btn-outline-success px-5" onclick="window.location.href='/kopmerput-admin'">Batal</button>
                                        <button type="submit" class="btn btn-primary px-5 fw-semibold">Terbitkan Berita</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4" style="border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <div class="card-body">
                                <h5 class="fw-semibold mb-3">Unggah Gambar Utama</h5>
                                <div class="border border-2 border-dashed border-secondary rounded p-4 text-center">
                                    <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                                    <div class="small mb-2 text-dark">Klik atau seret gambar ke sini</div>
                                    <div class="small text-muted">Rekomendasi: 1200x630px (Max 2MB)</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" style="border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <div class="card-body">
                                <h5 class="fw-semibold mb-3">Pratinjau Visual</h5>
                                <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?w=400&h=225&fit=crop" alt="Preview" class="img-fluid rounded">
                                <div class="mt-3 small text-muted">Contoh tampilan judul berita pada aplikasi mobile member...</div>
                            </div>
                        </div>
                        <div class="p-4 bg-success bg-opacity-10 rounded">
                            <div class="d-flex gap-3">
                                <i class="bi bi-info-circle text-success display-6"></i>
                                <div>
                                    <div class="fw-semibold text-success">Tips Publikasi</div>
                                    <div class="small text-muted mt-1">
                                        Gunakan bahasa yang inklusif dan transparan untuk membangun kepercayaan anggota koperasi. Sertakan data konkret jika memungkinkan.
                                    </div>
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
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        @if(session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') === 'profile-updated' ? 'Profil berhasil diperbarui!' : 'Password berhasil diubah!' }}
                            </div>
                        @endif
                        <div class="card shadow-sm">
                            <div class="card-body p-5">
                                <h5 class="card-title mb-4 d-flex align-items-center gap-2 fw-semibold">
                                    <i class="bi bi-person-circle text-primary fs-4"></i>
                                    Informasi Akun
                                </h5>

                                <div class="text-center mb-5">
                                    <div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #002b7f 0%, #0040c8 100%);">
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

                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-link text-decoration-none text-warning p-0 fw-semibold" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                            <i class="bi bi-key me-1"></i>Ubah Password
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-sm px-4">
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
                                <i class="bi bi-key-fill me-2 text-primary"></i>Ubah Password
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary btn-sm">
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
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="login-header">
                    <div style="display: flex; gap: 6px; margin-bottom: 16px;">
                        <div style="width: 20px; height: 4px; background: #002b7f; border-radius: 2px;"></div>
                        <div style="width: 40px; height: 4px; background: #34a853; border-radius: 2px;"></div>
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

                    <div class="form-options">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
