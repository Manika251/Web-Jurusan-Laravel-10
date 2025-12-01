<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ubah fallback title jadi 'Jurusan SI' atau nama aplikasi -->
    <title>Login Admin - {{ config('app.name', 'Jurusan SI') }}</title>

    <!-- 1. Bootstrap CSS (Wajib) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 2. Font Awesome & Google Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- 3. Custom CSS Login (File Terpisah) -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="login-card">

            <!-- Kiri: Gambar & Sambutan -->
            <div class="login-image">
                <div class="login-text">
                    <h2>Selamat Datang</h2>
                    <p>Silakan login untuk mengelola sistem informasi jurusan.</p>
                </div>
            </div>

            <!-- Kanan: Form Login -->
            <div class="login-form">
                <div class="mb-4">
                    <h3 class="fw-bold text-dark">Login Admin</h3>
                    <p class="text-muted small">Masukkan email dan password Anda.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">ALAMAT EMAIL</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 ps-3" style="border-color: #eef2f7;">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <!-- PERUBAHAN DI SINI: Placeholder diganti jadi admin@jurusan.com -->
                            <input id="email" type="email" class="form-control border-start-0 ps-2 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="admin@jurusan.com">
                        </div>
                        @error('email')
                        <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 ps-3" style="border-color: #eef2f7;">
                                <i class="fas fa-lock text-muted"></i>
                            </span>
                            <input id="password" type="password" class="form-control border-start-0 ps-2 @error('password') is-invalid @enderror"
                                name="password" required placeholder="••••••••">
                        </div>
                        @error('password')
                        <span class="text-danger small mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        MASUK DASHBOARD <i class="fas fa-arrow-right ms-2"></i>
                    </button>

                    <div class="auth-footer">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-long-arrow-alt-left me-2"></i> Kembali ke Beranda
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>