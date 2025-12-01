<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $web_config['jurusan_name'] ?? 'Web Jurusan' }}</title>

    <link rel="icon" href="{{ asset('img/logo-si.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 700;
            color: #0d6efd !important;
        }

        .nav-link {
            font-weight: 500;
            color: #555 !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #0d6efd !important;
        }

        /* Dropdown Hover Effect */
        @media (min-width: 992px) {
            .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }

        footer {
            background: #212529;
            color: #aaa;
            padding-top: 50px;
        }

        footer a {
            color: #aaa;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('img/logo-si.png') }}" alt="Logo SI" height="55" class="d-inline-block">

                <div class="d-flex flex-column ms-3 text-uppercase">
                    <span class="fw-bold" style="font-family: 'Times New Roman', serif; font-size: 14px; line-height: 1.1; letter-spacing: 0.5px; color: #333;">
                        Jurusan Sistem Informasi
                    </span>
                    <span class="fw-bold" style="font-family: 'Times New Roman', serif; font-size: 16px; line-height: 1.1; letter-spacing: 0.5px; color: #333;">
                        Universitas Musamus Merauke
                    </span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('#') || request()->routeIs('academic.structure') ? 'active' : '' }}"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('akreditasi') }}">Akreditasi</a>
                            <li><a class="dropdown-item py-2" href="{{ route('academic.visimisi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah</a></li>
                           <li><a class="dropdown-item" href="https://www.google.com/maps?q=Universitas+Musamus+Merauke" target="_blank">Maps </a>
</li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('academic.*') || request()->routeIs('dosen') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-0">
                            <li><a class="dropdown-item py-2" href="{{ route('academic.structure') }}">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('dosen') }}">Dosen & Staff</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('academic.curriculum') }}">Kurikulum</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('academic.facilities') }}">Fasilitas</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('posts*') || request()->routeIs('achievements*') || request()->routeIs('organizations*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aktifitas
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm mt-0">
                            <li><a class="dropdown-item py-2" href="{{ route('posts') }}">Berita</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('achievements') }}">Prestasi Mahasiswa</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('organizations') }}">Organisasi Kemahasiswaan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">{{ $web_config['jurusan_name'] ?? 'Jurusan' }}</h5>
                    <p class="small">{{ $web_config['jurusan_description'] ?? 'Mencerdaskan kehidupan bangsa.' }}</p>
                    <div class="d-flex gap-3">
                        @if(!empty($web_config['facebook'])) <a href="{{ $web_config['facebook'] }}"><i class="fab fa-facebook fa-lg"></i></a> @endif
                        @if(!empty($web_config['instagram'])) <a href="{{ $web_config['instagram'] }}"><i class="fab fa-instagram fa-lg"></i></a> @endif
                        @if(!empty($web_config['youtube'])) <a href="{{ $web_config['youtube'] }}"><i class="fab fa-youtube fa-lg"></i></a> @endif
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('about') }}">Profil Jurusan</a></li>
                        <li><a href="{{ route('dosen') }}">Direktori Dosen</a></li>
                        <li><a href="{{ route('achievements') }}">Prestasi</a></li>
                        <li><a href="{{ route('posts') }}">Berita Terbaru</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> {{ $web_config['jurusan_address'] ?? 'Alamat belum diisi' }}</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> {{ $web_config['jurusan_phone'] ?? '-' }}</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> {{ $web_config['jurusan_email'] ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-black py-3 text-center small">
            &copy; {{ date('Y') }} {{ $web_config['jurusan_name'] ?? 'Web Jurusan' }}. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>