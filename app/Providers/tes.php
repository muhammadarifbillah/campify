<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #085d28ff;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Campify</a>
            <div class="d-flex">
                <a href="{{ route('profile') }}" class="btn btn-light btn-sm rounded-pill">
                    <i class="bi bi-person-circle"></i> Profil
                </a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold" style="color: #085d28ff;">Profil Saya</h3>
                            <hr class="w-25 mx-auto">
                        </div>

                        <div class="text-center mb-4">
                            <img src="{{ asset('' . ($user['photo'] ?? 'farrel.jpeg')) }}"
                                class="rounded-circle border shadow-sm mb-3" alt="Foto Profil" width="120" height="120">
                            <h5 class="mb-0">{{ $user['name'] }}</h5>
                            <small class="text-muted">{{ $user['email'] }}</small>
                        </div>

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
                                <textarea name="bio" class="form-control rounded-3"
                                    rows="3">{{ old('bio', $user['bio']) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user['email']) }}"
                                    class="form-control rounded-3 @error('email') is-invalid @enderror">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Ganti Foto Profil</label>
                                <input type="file" name="photo" class="form-control rounded-3">
                                <small class="text-muted">Format: JPG/PNG, Max 2MB</small>
                            </div>

                            <div class="text-center mt-4 d-flex justify-content-center gap-3">
                                <button type="submit" class="px-4 rounded-3 shadow-sm border-0"
                                    style="background-color: #085d28ff; color: white;">
                                    <i class="bi bi-save me-2"></i> Simpan Perubahan
                                </button>

                                
                                <a href="{{ url('/penjual/dashboard') }}" class="btn btn-outline-success rounded-3 px-4">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Dashboard
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
