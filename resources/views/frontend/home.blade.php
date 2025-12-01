@extends('frontend.layouts')
@section('title', 'Beranda')

@section('content')

@php
// Setup Gambar Slide
$slide1 = isset($web_config['jurusan_hero_image'])
? asset('storage/' . $web_config['jurusan_hero_image'])
: 'https://source.unsplash.com/1920x1080/?jurusan,building';

$slide2 = isset($web_config['jurusan_hero_image_2'])
? asset('storage/' . $web_config['jurusan_hero_image_2'])
: 'https://source.unsplash.com/1920x1080/?library,student';

$slide3 = isset($web_config['jurusan_hero_image_3'])
? asset('storage/' . $web_config['jurusan_hero_image_3'])
: 'https://source.unsplash.com/1920x1080/?classroom,teacher';

$kepsekImage = isset($web_config['jurusan_principal_photo'])
? asset('storage/' . $web_config['jurusan_principal_photo'])
: '';
@endphp

<!-- 1. HERO SECTION (SLIDER FekstULL SCREEN) -->
<header class="hero-section position-relative w-100 overflow-hidden">

    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators mb-5">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <div class="hero-bg" style="background-image: url('{{ $slide1 }}');"></div>
                <div class="hero-overlay"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-bg" style="background-image: url('{{ $slide2 }}');"></div>
                <div class="hero-overlay"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-bg" style="background-image: url('{{ $slide3 }}');"></div>
                <div class="hero-overlay"></div>
            </div>
        </div>
    </div>

    <!-- Konten Teks Tengah -->
    <div class="hero-content position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-center text-white z-2 top-0 start-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    {{-- <div class="badge-wrapper mb-4 animate__animated animate__fadeInDown"> --}}
                        {{-- <span class="py-2 px-4 rounded-pill bg-dark bg-opacity-50 border border-white border-opacity-25 text-uppercase letter-spacing-2 small fw-bold"> --}}
                            <i></i> Selamat Datang di Official Website Jurusan
                        {{-- </span> --}}
                    {{-- </div> --}}
                    <h1 class="display-3 fw-bolder mb-4 text-white animate__animated animate__fadeInUp text-shadow-lg">
                        {{ $web_config['jurusan_name'] ?? 'Jurusan Sistem Informasi' }}
                    </h1>
                    <p class="lead mb-5 opacity-90 fw-light mx-auto text-shadow-sm animate__animated animate__fadeInUp animate__delay-1s" style="max-width: 700px;">
                        {{ $web_config['jurusan_description'] ?? 'Mewujudkan generasi berkarakter, cerdas, dan siap bersaing di era global melalui pendidikan berkualitas tinggi.' }}
                    </p>
                    <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-1s">
                       <div class="d-flex justify-content-center gap-3">
                     {{-- <a href="{{ route('about') }}" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold shadow">
                         Tentang Kami
                     </a> --}}

                     {{-- <a href="{{ route('posts') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-bold border-2">
                      Berita Jurusan
                     </a> --}}
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100" style="line-height: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="#f8f9fa" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path>
        </svg>
    </div>
</header>

<!-- 2. FITUR UNGGULAN -->
<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card card h-100 border-0 shadow-sm hover-shadow p-4 text-center rounded-4 bg-white">
                    <div class="icon-wrapper mb-4 mx-auto bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Dosen Kompeten</h4>
                    <p class="text-muted mb-0 text-start" >Memiliki tim dosen yang tidak hanya ahli secara akademik, tetapi juga inspiratif. Kami hadir sebagai mentor yang siap membimbing, mengarahkan, dan mengembangkan potensi terbaik setiap mahasiswa.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card card h-100 border-0 shadow-sm hover-shadow p-4 text-center rounded-4 bg-white">
                    <div class="icon-wrapper mb-4 mx-auto bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-book-reader fa-2x"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Akreditasi</h4>
                    <p style="text-align: justify" class="text-muted mb-0 style="text-align: justify;" >Terakreditasi Nasional Menjamin standar mutu pendidikan yang diakui, didukung penerapan Kurikulum Merdeka yang responsif dan adaptif terhadap kemajuan teknologi masa kini.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card card h-100 border-0 shadow-sm hover-shadow p-4 text-center rounded-4 bg-white">
                    <div class="icon-wrapper mb-4 mx-auto bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fas fa-trophy fa-2x"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-3">Prestasi Unggul</h4>
                    <p style="text-align: justify" class="text-muted mb-0">Tak hanya menciptakan generasi yang pandai secara akademik, namun juga berkarakter dan kreatif. Kami fokus menggali potensi unik setiap mahasiswa agar siap terjun ke masyarakat.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SAMBUTAN KETUA JURUSAN -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="position-relative">
                    <!-- <div class="position-absolute top-0 start-0 translate-middle bg-primary rounded-3" style="width: 100%; height: 100%; transform: translate(-20px, -20px); opacity: 0.1;"></div> -->
                    <img src="{{ $kepsekImage }}" class="img-fluid rounded-4 shadow w-100 object-fit-cover position-relative z-2" style="min-height: 400px;" alt="Ketua jurusan">
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary fw-bold text-uppercase letter-spacing-2 mb-2">Sambutan Pimpinan</h6>
                <h2 class="display-6 fw-bold mb-4 text-dark">Membangun Masa Depan <span class="text-primary">Gemilang</span></h2>
                <div class="quote-box ps-4 border-start border-4 border-warning mb-4">
                    <p class="lead fst-italic text-secondary mb-0">"Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat belajar yang tak pernah padam."</p>
                </div>
                <p class="text-muted lh-lg mb-4">
                    Selamat datang di website resmi kami. Kami berkomitmen untuk menyediakan lingkungan belajar yang kondusif, fasilitas modern, dan metode pembelajaran yang inovatif demi mencetak generasi emas penerus bangsa.
                </p>
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ $kepsekImage }}" class="rounded-circle object-fit-cover shadow-sm" width="50" height="50" alt="Avatar">
                    <div>
                        <h6 class="fw-bold mb-0"></h6>
                        <small class="text-muted">Ketua Jurusan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. SEJARAH JURUSAN -->
<section class="py-5 bg-light position-relative overflow-hidden">
    <div class="container position-relative z-2 py-4">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">TENTANG KAMI</span>
                <h2 class="fw-bold display-6">Sejarah Perjalanan Jurusan Sistem Informasi</h2>
                <p class="text-muted">Mengenang jejak langkah dan dedikasi dalam mencerdaskan bangsa.</p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="{{ $slide1 }}" class="img-fluid object-fit-cover h-100" alt="Sejarah Jurusan" style="min-height: 400px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="ps-md-4">
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-weight: bold;">1</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Awal Berdiri</h5>
                            <p class="text-muted small mb-0">Jurusan ini didirikan dengan semanga</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-weight: bold;">2</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Pengembangan & Prestasi</h5>
                            <p class="text-muted small mb-0">Terus berbenah meningkatkan fasilitas dan kualitas pengajar hingga berhasil meraih akreditasi A dan prestasi nasional.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-weight: bold;">3</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Era Digital</h5>
                            <p class="text-muted small mb-0">Bertransformasi menjadi Jurusan .</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('sejarah') }}" class="btn btn-link text-decoration-none fw-bold px-0">Baca Sejarah Lengkap <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. STATISTIK (ANGKA DINAMIS) -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('https://www.transparenttextures.com/patterns/stardust.png'); opacity: 0.1;"></div>
    <div class="container position-relative z-1">
        <div class="row text-center g-5">
            <!-- Mahasiswa Aktif -->
            <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">
                    {{ $web_config['jurusan_student_count'] ?? '1000+' }}
                </h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 mb-0">Mahasiswa Aktif</p>
            </div>
            <!-- Dosen & Staf -->
            <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                <!-- UBAH DISINI: Dari $teachers_count jadi $dosens_count -->
                <h2 class="display-4 fw-bold text-warning mb-0 counter">
                    {{ $dosens_count ?? '50+' }}
                </h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 mb-0">Dosen & Staf</p>
            </div>
            
            
            <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">
                    {{ $web_config['jurusan_extracurricular_count'] ?? '20+' }}
                </h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 mb-0">Prestasi</p>
            </div>
            <!-- Kelulusan -->
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">
                    {{ $web_config['jurusan_graduation_rate'] ?? '100%' }}
                </h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 mb-0">Kelulusan</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. BERITA TERBARU -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase letter-spacing-2">Berita & Informasi</h6>
            <h2 class="fw-bold display-6">Kabar Terbaru Jurusan</h2>
        </div>

        <div class="row g-4">
            @forelse($latest_posts as $post)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-news bg-white hover-shadow">
                    <div class="card-img-wrapper position-relative overflow-hidden" style="height: 220px;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100 h-100 object-fit-cover transition-zoom" alt="{{ $post->title }}">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill fw-bold small">
                                {{ $post->category->title }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-muted small mb-2">
                            <i class="far fa-calendar-alt me-2"></i> {{ $post->created_at->format('d M Y') }}
                        </div>
                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark stretched-link line-clamp-2">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <p class="card-text text-secondary small line-clamp-3">
                            {!! Str::limit(strip_tags($post->content), 100) !!}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada berita terbaru.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('posts') }}" class="btn btn-outline-primary rounded-pill px-5 py-2 fw-bold">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<style>
    /* UTILITIES */
    .letter-spacing-2 {
        letter-spacing: 2px;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .text-shadow-lg {
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    .text-shadow-sm {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* HERO SECTION */
    .hero-section {
        height: 85vh;
        min-height: 600px;
        background-color: #212529;
    }

    .hero-bg {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        animation: zoomSlow 20s infinite alternate;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Hitam transparan 50% */
    }

    /* CARD STYLES */
    .icon-wrapper {
        width: 80px;
        height: 80px;
        transition: transform 0.3s;
    }

    .hover-shadow {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .15) !important;
    }

    .transition-zoom {
        transition: transform 0.5s ease;
    }

    .card-news:hover .transition-zoom {
        transform: scale(1.1);
    }

    /* ANIMATIONS */
    @keyframes zoomSlow {
        from {
            transform: scale(1);
        }

        to {
            transform: scale(1.1);
        }
    }

    .hover-lift {
        transition: transform 0.3s;
    }

    .hover-lift:hover {
        transform: translateY(-3px);
    }
</style>

@endsection