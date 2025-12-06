@extends('frontend.layouts')
@section('title', 'Profil Jurusan')

@section('content')

<!-- LOGIKA GAMBAR & PETA -->
@php
$gedungImage = isset($web_config['jurusan_hero_image'])
? asset('storage/' . $web_config['jurusan_hero_image'])
: 'https://source.unsplash.com/1600x900/?jurusan,building';

// Logika Peta: Mengambil alamat dari database, lalu di-encode agar bisa dibaca Google Maps
// Jika alamat kosong, default ke "Jakarta"
$alamat = $web_config['jurusan_address'] ?? 'Jakarta, Indonesia';
$mapUrl = "https://maps.google.com/maps?q=" . urlencode($alamat) . "&t=&z=15&ie=UTF8&iwloc=&output=embed";
@endphp

<!-- 1. HEADER HERO (PARALLAX) -->
<!-- <div class="position-relative py-5 bg-primary overflow-hidden"
    style="background: linear-gradient(rgba(10, 30, 70, 0.9), rgba(13, 110, 253, 0.8)), url('{{ $gedungImage }}'); background-size: cover; background-position: center; min-height: 400px; background-attachment: fixed;">

    <div class="container position-relative z-index-1 text-center text-white h-100 d-flex flex-column justify-content-center" style="min-height: 300px;">
        <span class="d-inline-block py-1 px-3 rounded-pill bg-white bg-opacity-10 border border-light border-opacity-25 mb-3 fw-bold small letter-spacing-2">
            TENTANG KAMI
        </span>
        <h1 class="display-3 fw-bold mb-3">Profil Jurusan</h1>
        <p class="lead mb-4 opacity-75 mx-auto" style="max-width: 600px;">Mengenal lebih dekat sejarah, nilai-nilai, dan dedikasi kami dalam dunia pendidikan.</p>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Profil</li>
            </ol>
        </nav>
    </div> -->

<!-- Dekorasi Gelombang -->
<!-- <div class="position-absolute bottom-0 start-0 w-100" style="line-height: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,128C960,149,1056,171,1152,165.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div> -->

<!-- 2. SEJARAH & SAMBUTAN -->
<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <!-- Gambar Sejarah -->
            <div class="col-lg-6">
                <div class="position-relative ps-4 pb-4">
                    <div class="position-absolute bg-primary rounded" style="top: 20px; left: 0; width: 100%; height: 100%; z-index: -1; opacity: 0.1;"></div>
                    <img src="{{ $gedungImage }}" class="img-fluid rounded-4 shadow-lg w-100 object-fit-cover" alt="Gedung Jurusan" style="min-height: 400px;">

                    <!-- Badge Tahun -->
                    <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded shadow-lg m-4 text-center border-start border-5 border-primary">
                        <h2 class="fw-bold text-dark mb-0">6+</h2>
                        <small class="text-muted fw-bold text-uppercase">Tahun Bersama Negri</small>
                    </div>
                </div>
            </div>

            <!-- Teks Sejarah -->
            <div class="col-lg-6">
                <span class="text-primary fw-bold text-uppercase letter-spacing-2 small">SEJARAH PERJALANAN</span>
                <h2 class="fw-bold display-6 mb-4">Dedikasi <span class="text-primary">{{ $web_config['jurusan_name'] ?? 'Jurusan Kami' }}</span></h2>

                <div class="text-secondary lh-lg mb-4">
                    <p class="mb-3">
                        {{ $web_config['jurusan_description'] ?? 'Jurusan ini didirikan dengan semangat mulia untuk mencerdaskan kehidupan bangsa dan membentuk karakter generasi muda yang unggul.' }}
                    </p>
                    <p>
                        Sejak awal berdiri, kami memegang teguh komitmen untuk menyediakan fasilitas pendidikan terbaik, kurikulum yang adaptif, serta tenaga pengajar yang berdedikasi tinggi. Setiap langkah kami didedikasikan untuk masa depan siswa-siswi kami.
                    </p>
                </div>

                <div class="row g-4 pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-primary fa-2x me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">Akreditasi B</h6>
                                <small class="text-muted">Standar Nasional</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-primary fa-2x me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">Pengajar Ahli</h6>
                                <small class="text-muted">Tersertifikasi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <!-- 3. VISI & MISI (STYLE KARTU MODERN) -->
<section class="py-5 bg-light position-relative overflow-hidden">
    <div class="container py-4 position-relative z-index-1">
        <div class="text-center mb-5 mx-auto" style="max-width: 700px;">
            <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">LANDASAN KAMI</span>
            <h2 class="fw-bold">Visi & Misi</h2>
            <p class="text-muted">Kompas penunjuk arah dalam setiap langkah pendidikan kami.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- VISI -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-up bg-white rounded-4 overflow-hidden">
                    <div class="card-body p-5 text-center position-relative">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-5"></div>
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-4 shadow-sm" style="width: 70px; height: 70px;">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Visi</h3>
                        <p class="lead fst-italic text-secondary px-lg-4">
                            "{{ $web_config['jurusan_vision'] ?? 'Terwujudnya lulusan yang beriman, bertaqwa, berprestasi, dan berwawasan lingkungan.' }}"
                        </p>
                    </div>
                </div>
            </div>

            <!-- MISI -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-up bg-white rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle shadow-sm" style="width: 70px; height: 70px;">
                                <i class="fas fa-bullseye fa-2x"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold text-center mb-4">Misi</h3>

                        @if(isset($web_config['jurusan_mission']))
                        <div class="lh-lg text-secondary">{!! $web_config['jurusan_mission'] !!}</div>
                        @else
                        <ul class="list-unstyled lh-lg text-secondary">
                            <li class="d-flex mb-3">
                                <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                                <span>Melaksanakan pembelajaran aktif, inovatif, dan menyenangkan.</span>
                            </li>
                            <li class="d-flex mb-3">
                                <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                                <span>Menumbuhkan penghayatan terhadap ajaran agama.</span>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-check-circle text-success mt-1 me-3"></i>
                                <span>Mengembangkan potensi peserta didik secara optimal.</span>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <!-- 4. PETA LOKASI (FITUR BARU) -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5">
            <!-- Info Kontak -->
            <div class="col-lg-4">
                <span class="text-primary fw-bold text-uppercase letter-spacing-2 small">LOKASI KAMI</span>
                <h2 class="fw-bold mb-4">Kunjungi Kami</h2>
                <p class="text-muted mb-4">Berada di lokasi strategis dalam lingkungan Universitas Musamus yang asri, kami menyediakan suasana akademis yang tenang dan kondusif. Hal ini mendukung mahasiswa untuk fokus dalam kegiatan belajar mengajar serta pengembangan riset teknologi.</p>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fs-5"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="fw-bold mb-1">Alamat</h6>
                        <p class="text-muted mb-0 small">{{ $web_config['jurusan_address'] ?? 'Alamat belum diatur di admin.' }}</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone-alt fs-5"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="fw-bold mb-1">Telepon</h6>
                        <p class="text-muted mb-0 small">{{ $web_config['jurusan_phone'] ?? '-' }}</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fs-5"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="fw-bold mb-1">Email</h6>
                        <p class="text-muted mb-0 small">{{ $web_config['jurusan_email'] ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Google Maps Embed -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg overflow-hidden rounded-4 h-100">
                    <iframe
                        width="100%"
                        height="450"
                        src="{{ $mapUrl }}"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<style>
    /* Efek Hover Naik */
    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-up:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    .letter-spacing-2 {
        letter-spacing: 2px;
    }

    .opacity-5 {
        opacity: 0.05;
    }
</style>

@endsection