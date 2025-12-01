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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- NAVBAR STYLE (UGM) --- */
        .header-top {
            background-color: #0d3b66; /* Biru Tua */
            padding: 15px 0;
            color: white;
        }
        .header-nav {
            background-color: #082d4f; /* Biru Gelap */
            padding: 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .header-nav .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            padding: 15px 20px !important;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        .header-nav .nav-link:hover, .header-nav .nav-link.active {
            background-color: #051b30;
            color: #ffc107 !important;
        }
        
        /* Dropdown Style */
        .dropdown-menu { 
            background-color: #082d4f; 
            border: none; 
            margin-top: 0; 
            border-radius: 0; /* Supaya kotak tegas */
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Tambah bayangan sedikit */
        }
        .dropdown-item { color: #fff; padding: 10px 20px; }
        .dropdown-item:hover { background-color: #0d3b66; color: #ffc107; }
        .navbar-toggler { border: 1px solid rgba(255,255,255,0.5); }
        .navbar-toggler-icon { filter: invert(1); }

        /* --- FITUR HOVER (LOGIC PENTING) --- */
        /* Kode ini hanya jalan di Layar Besar (Desktop/Laptop) */
        @media (min-width: 992px) {
            .dropdown:hover .dropdown-menu {
                display: block; /* Paksa muncul saat di-hover */
                margin-top: 0; /* Hilangkan jarak supaya mouse tidak jatuh */
            }
            .dropdown .dropdown-menu {
                display: none; /* Sembunyikan kalau tidak di-hover */
            }
            /* Matikan fungsi klik bawaan bootstrap di desktop agar tidak bentrok */
            .dropdown-toggle::after {
                transition: transform 0.3s;
            }
            .dropdown:hover .dropdown-toggle::after {
                transform: rotate(180deg); /* Animasi panah kecil berputar */
            }
        }


        /* --- FOOTER STYLE --- */
        footer {
            margin-top: auto;
            background-color: #0d3b66; 
            color: white;
            padding-top: 60px;
            font-family: sans-serif; 
        }
        
        footer h5 { 
            font-weight: bold; 
            margin-bottom: 25px; 
            font-size: 16px; 
            text-transform: uppercase; 
            letter-spacing: 1px;
        }
        
        footer a { color: rgba(255,255,255,0.8); text-decoration: none; transition: 0.3s; }
        footer a:hover { color: #ffc107; opacity: 1; text-decoration: none; }
        
        footer ul li { margin-bottom: 12px; font-size: 14px; }
        
        .copyright-bar {
            background-color: #082d4f; 
            padding: 20px 0;
            margin-top: 40px;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="header-top">
        <div class="container d-flex align-items-center">
            <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none text-white">
                <img src="{{ asset('img/logo-si.png') }}" alt="Logo SI" height="70" class="d-inline-block me-3">
                <div class="d-flex flex-column text-uppercase">
                    <span class="fw-bold" style="font-family: 'Times New Roman', serif; font-size: 14px; letter-spacing: 1px; opacity: 0.9;">
                        Jurusan Sistem Informasi
                    </span>
                    <span class="fw-bold" style="font-family: 'Times New Roman', serif; font-size: 22px; letter-spacing: 0.5px;">
                        Universitas Musamus Merauke
                    </span>
                </div>
            </a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg header-nav sticky-top shadow-sm">
        <div class="container">
            <button class="navbar-toggler ms-auto my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('#') || request()->routeIs('academic.structure') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('akreditasi') }}">Akreditasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('academic.visimisi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah</a></li>
                            <li><a class="dropdown-item" href="https://www.google.com/maps?q=Universitas+Musamus+Merauke" target="_blank">Maps</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('academic.*') || request()->routeIs('dosen') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Akademik</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('academic.structure') }}">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('dosen') }}">Dosen & Staff</a></li>
                            <li><a class="dropdown-item" href="{{ route('academic.curriculum') }}">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="{{ route('academic.facilities') }}">Fasilitas</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('posts*') || request()->routeIs('achievements*') || request()->routeIs('organizations*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Aktifitas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('posts') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('achievements') }}">Prestasi Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="{{ route('organizations') }}">Organisasi Kemahasiswaan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container pb-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">{{ $web_config['jurusan_name'] ?? 'JURUSAN SISTEM INFORMASI' }}</h5>
                    <p class="small" style="opacity: 0.8; line-height: 1.8;">{{ $web_config['jurusan_description'] ?? 'Mencerdaskan kehidupan bangsa.' }}</p>
                    <div class="d-flex gap-3 mt-3">
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

                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled small" style="opacity: 0.9;">
                        <li class="mb-3 d-flex"><i class="fas fa-map-marker-alt me-3 mt-1"></i> {{ $web_config['jurusan_address'] ?? 'Alamat belum diisi' }}</li>
                        <li class="mb-3"><i class="fas fa-phone me-3"></i> {{ $web_config['jurusan_phone'] ?? '-' }}</li>
                        <li class="mb-3"><i class="fas fa-envelope me-3"></i> {{ $web_config['jurusan_email'] ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-bar text-center">
            <div class="container">
                <span class="opacity-75">© {{ date('Y') }} {{ $web_config['jurusan_name'] ?? 'Web Jurusan' }}. All rights reserved.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Memastikan dropdown tertutup rapi saat kursor pergi
        document.addEventListener("DOMContentLoaded", function(){
            if (window.innerWidth > 992) {
                document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
                    everyitem.addEventListener('mouseover', function(e){
                        let el_link = this.querySelector('a[data-bs-toggle]');
                        if(el_link != null){
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.add('show');
                            nextEl.classList.add('show');
                        }
                    });
                    everyitem.addEventListener('mouseleave', function(e){
                        let el_link = this.querySelector('a[data-bs-toggle]');
                        if(el_link != null){
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.remove('show');
                            nextEl.classList.remove('show');
                        }
                    })
                });
            }
        });
    </script>
</body>
</html>