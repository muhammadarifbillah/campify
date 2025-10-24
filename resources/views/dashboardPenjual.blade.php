<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #085d28ff;
            color: white;
            position: fixed;
            width: 250px;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .navbar-brand {
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Campify</h4>
        <a href="#">🏠 Dashboard</a>
        <a href="{{ route('products.index') }}">📦 Produk</a>
        <a href="{{ route('search.products') }}">🔍 Cari Produk</a>
        <a href="{{ route('stok.index') }}">🛠️ Kelola Stok & Harga</a>
        <a href="#">🛒 Pesanan</a>
        <a href="#">📊 Laporan Penjualan</a>
        <a href="#">💬 Ulasan</a>
        <a href="#">⚙️ Pengaturan Toko</a>
        <hr class="bg-light">
        <a href="{{ route('profile') }}">👤 Profil Saya</a>
        <hr class="bg-light">
        <a href="#" class="text-danger">🚪 Logout</a>
    </div>

    <!-- Konten -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Dashboard Penjual</h2>
            <div>
                <span>Halo, <strong>{{ $username ?? 'Penjual' }}</strong> 👋</span>
            </div>
        </div>

        <div class="row">
            <!-- Card Statistik -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Total Produk</h5>
                        <h3>25</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Pesanan Hari Ini</h5>
                        <h3>8</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Pendapatan Bulan Ini</h5>
                        <h3>Rp 12.500.000</h3>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <h4>Aktivitas Terbaru</h4>
        <ul>
            <li>Pesanan #102 telah dikirim</li>
            <li>Produk "Sepatu Sneakers" stok ditambahkan</li>
            <li>Pembeli <strong>Andi</strong> memberikan rating ⭐⭐⭐⭐⭐</li>
        </ul>

        <hr class="my-4">

        <!-- Form Profil di Dalam Dashboard -->
        <h4>Profil Saya</h4>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user['name']) }}"
                    class="form-control rounded-3 @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Bio</label>
                <textarea name="bio" class="form-control rounded-3" rows="3">{{ old('bio', $user['bio']) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Ganti Foto Profil</label>
                <input type="file" name="photo" class="form-control rounded-3">
                <small class="text-muted">Format: JPG/PNG, Max 2MB</small>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-3 shadow-sm">
                    <i class="bi bi-save me-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

</body>

</html>