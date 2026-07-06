<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ryoki Skincare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #fff;
        }
        .content-area {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            color: #644339 !important;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 d-none d-md-block" style="width: 250px;">
            <h4 class="text-center mb-4 mt-2">Ryoki Admin</h4>
            <ul class="nav flex-column space-y-2">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.products.index') ?? '#' }}" class="nav-link"><i class="bi bi-box me-2"></i> Kelola Produk</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link"><i class="bi bi-file-earmark-text me-2"></i> Kelola Artikel</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 content-area">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand d-md-none" href="#">Ryoki</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="target" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/') }}" target="_blank">Lihat Website</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="container-fluid p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Dashboard Admin</h2>
                    <!-- Tombol Upload Produk -->
                    <a href="{{ route('admin.products.create') ?? '#' }}" class="btn btn-primary">
                        <i class="bi bi-upload me-2"></i> Upload Produk Baru
                    </a>
                </div>

                <div class="row g-4">
                    <!-- Stats Card 1 -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase">Total Produk</h6>
                                <h3>12</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Stats Card 2 -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase">Total Artikel</h6>
                                <h3>5</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Stats Card 3 -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase">Pesan Masuk</h6>
                                <h3>3</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Products Section -->
                <div class="card border-0 shadow-sm mt-5">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Produk Terbaru</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data produk. Silakan <a href="{{ route('admin.products.create') ?? '#' }}">upload produk pertama</a> Anda.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>