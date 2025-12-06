@extends('frontend.layouts')
@section('title', 'Beranda')

@section('content')

{{-- CSS DIKOMPRES BIAR LEBIH PENDEK --}}
<style>
    :root { --primary-color: #0d6efd; --dark-navy: #1e293b; --text-body: #475569; --bg-soft: #f8fafc; }
    .heading-dark { color: var(--dark-navy); font-weight: 700; }
    .text-body-custom { color: var(--text-body); line-height: 1.7; }
    .letter-spacing-2 { letter-spacing: 2px; }
    .text-shadow-lg { text-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); }
    .object-fit-cover { object-fit: cover; }

    /* Hero & Animation */
    .hero-section { height: 85vh; min-height: 600px; background-color: var(--dark-navy); position: relative; }
    .hero-bg { width: 100%; height: 100%; background-size: cover; background-position: center; animation: zoomSlow 25s infinite alternate; }
    .hero-overlay { background: linear-gradient(to bottom, rgba(30, 41, 59, 0.3), rgba(30, 41, 59, 0.8)); }
    @keyframes zoomSlow { from { transform: scale(1); } to { transform: scale(1.15); } }
    
    /* Smooth Transition Fix */
    .carousel-fade .carousel-item { opacity: 0; transition-duration: 1.5s ease-in-out; transition-property: opacity; }
    .carousel-fade .carousel-item.active, .carousel-fade .carousel-item-next.carousel-item-start, .carousel-fade .carousel-item-prev.carousel-item-end { opacity: 1; }

    /* Cards & Stats */
    .feature-card, .card-news, .icon-box { transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); }
    .feature-card { border: 1px solid rgba(0,0,0,0.05); }
    .feature-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; border-color: var(--primary-color); }
    .feature-card:hover .icon-box { transform: scale(1.1) rotate(5deg); }
    .icon-box { width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; border-radius: 16px; font-size: 1.75rem; margin-bottom: 1.5rem; }
    
    .stats-section { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); }
    .card-news { border: none; }
    .card-news:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    .card-img-wrapper img { transition: transform 0.5s ease; }
    .card-news:hover .card-img-wrapper img { transform: scale(1.05); }
</style>

<header class="hero-section position-relative w-100 overflow-hidden">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators mb-5">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <div class="hero-bg" style="background-image: url('{{ asset('storage/' . ($web_config['jurusan_hero_image'] ?? '')) }}');"></div>
                <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-bg" style="background-image: url('{{ asset('storage/' . ($web_config['jurusan_hero_image_2'] ?? '')) }}');"></div>
                <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-bg" style="background-image: url('{{ asset('storage/' . ($web_config['jurusan_hero_image_3'] ?? '')) }}');"></div>
                <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
            </div>
        </div>
    </div>

    <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-center text-white z-2 top-0 start-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="d-inline-block py-2 px-4 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-25 text-uppercase letter-spacing-2 small fw-bold mb-3 backdrop-blur-sm animate__animated animate__fadeInDown">
                        Selamat Datang di Official Website
                    </span>
                    <h1 class="display-3 fw-bolder mb-4 text-white animate__animated animate__fadeInUp text-shadow-lg">
                        {{ $web_config['jurusan_name'] ?? 'Teknik Informatika' }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="features-section py-5" id="features" style="background-color: var(--bg-soft);">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card card h-100 bg-white p-4 rounded-4 text-center">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary mx-auto">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4 class="heading-dark mb-3">Dosen Kompeten</h4>
                    <p class="text-body-custom mb-0">
                        Tim pengajar profesional dan praktisi ahli yang siap membimbing mahasiswa mencapai potensi akademik terbaiknya.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card card h-100 bg-white p-4 rounded-4 text-center">
                    <div class="icon-box bg-success bg-opacity-10 text-success mx-auto">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 class="heading-dark mb-3">Terakreditasi</h4>
                    <p class="text-body-custom mb-0">
                        Program studi yang telah terakreditasi Nasional, menjamin mutu pendidikan dan kurikulum yang relevan dengan industri.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card card h-100 bg-white p-4 rounded-4 text-center">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning mx-auto">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4 class="heading-dark mb-3">Berprestasi</h4>
                    <p class="text-body-custom mb-0">
                        Mendorong mahasiswa untuk aktif berkompetisi dan meraih prestasi gemilang di tingkat regional maupun nasional.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="position-relative ps-3 pt-3">
                    <div class="position-absolute top-0 start-0 bg-primary rounded-4" style="width: 100%; height: 100%; opacity: 0.1; z-index: 0;"></div>
                    <img src="{{ asset('storage/' . ($web_config['jurusan_principal_photo'] ?? '')) }}" class="img-fluid rounded-4 shadow-lg w-100 object-fit-cover position-relative z-1" style="min-height: 400px;" alt="Ketua Jurusan">
                </div>
            </div>
            <div class="col-lg-7">
                <h6 class="text-primary fw-bold text-uppercase letter-spacing-2 mb-2">Sambutan Pimpinan</h6>
                <h2 class="display-5 heading-dark mb-4">Membangun Masa Depan <span class="text-primary">Digital</span></h2>
                
                <figure class="bg-light p-4 rounded-3 border-start border-4 border-warning mb-4">
                    <blockquote class="blockquote mb-0">
                        <p class="fst-italic text-secondary fs-6">"Pendidikan bukan sekadar mengisi wadah, tetapi menyalakan api semangat belajar yang tak pernah padam."</p>
                    </blockquote>
                </figure>
                
                <p class="text-body-custom mb-4">
                    Selamat datang di website resmi kami. Kami berkomitmen menyediakan lingkungan belajar kondusif dengan fasilitas modern dan metode pembelajaran inovatif demi mencetak generasi emas yang siap bersaing di era global.
                </p>
                
                <div class="d-flex align-items-center gap-3 mt-4">
                   <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-signature"></i>
                   </div>
                   <div>
                        <h6 class="fw-bold mb-0 text-dark">Ir. Jarot Budiasto, S.T., M.T</h6>
                        <small class="text-muted">Ketua Jurusan {{ $web_config['jurusan_name'] ?? '' }}</small>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 position-relative overflow-hidden" style="background-color: var(--bg-soft);">
    <div class="container py-4">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">TENTANG KAMI</span>
                <h2 class="heading-dark display-6">Sejarah & Perjalanan</h2>
                <p class="text-body-custom">Mengenang jejak langkah dedikasi dalam mencerdaskan bangsa.</p>
            </div>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative ps-4 pt-4">
                    <div class="position-absolute top-0 end-0 translate-middle-y bg-warning rounded-circle" style="width: 100px; height: 100px; opacity: 0.2; filter: blur(20px); z-index: 0;"></div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4 border border-primary border-opacity-10" 
                         style="background-image: radial-gradient(circle, var(--primary-color) 1px, transparent 1px); background-size: 20px 20px; opacity: 0.15; z-index: 0;">
                    </div>
                    <img src="{{ asset('storage/' . ($web_config['jurusan_hero_image'] ?? '')) }}" class="img-fluid rounded-4 shadow w-100 position-relative z-1" alt="Sejarah" style="min-height: 350px; object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="vstack gap-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-white shadow-sm text-primary fw-bold rounded-circle d-flex align-items-center justify-content-center border border-primary border-opacity-25" style="width: 50px; height: 50px;">01</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="heading-dark">Awal Berdiri</h5>
                            <p class="text-body-custom small mb-0">Jurusan didirikan dengan semangat untuk memenuhi kebutuhan tenaga ahli di bidang teknologi informasi.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-white shadow-sm text-success fw-bold rounded-circle d-flex align-items-center justify-content-center border border-success border-opacity-25" style="width: 50px; height: 50px;">02</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="heading-dark">Pengembangan</h5>
                            <p class="text-body-custom small mb-0">Peningkatan fasilitas laboratorium dan kualitas dosen hingga berhasil meraih akreditasi Unggul.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="bg-white shadow-sm text-warning fw-bold rounded-circle d-flex align-items-center justify-content-center border border-warning border-opacity-25" style="width: 50px; height: 50px;">03</div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="heading-dark">Era Digital</h5>
                            <p class="text-body-custom small mb-0">Transformasi kurikulum berbasis digital dan kerjasama industri berskala nasional.</p>
                        </div>
                    </div>
                    <div class="mt-2">
                         <a href="{{ route('sejarah') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold btn-sm">Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-white position-relative stats-section overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 20px 20px; opacity: 0.5;"></div>
    <div class="container position-relative z-1 py-3">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">{{ $web_config['jurusan_student_count'] ?? '1000+' }}</h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 fw-bold">Mahasiswa</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">{{ $dosens_count ?? '50+' }}</h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 fw-bold">Dosen & Staf</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">{{ $web_config['jurusan_extracurricular_count'] ?? '25+' }}</h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 fw-bold">Prestasi</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold text-warning mb-0 counter">{{ $web_config['jurusan_graduation_rate'] ?? '98%' }}</h2>
                <p class="small text-white-50 text-uppercase letter-spacing-2 fw-bold">Kelulusan</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 flex-wrap gap-2">
            <div>
                <h6 class="text-primary fw-bold text-uppercase letter-spacing-2 mb-1">Berita & Informasi</h6>
                <h2 class="heading-dark mb-0">Kabar Terbaru Jurusan</h2>
            </div>
            <a href="{{ route('posts') }}" class="btn btn-outline-dark rounded-pill px-4">Lihat Semua</a>
        </div>
        <div class="row g-4">
            @forelse($latest_posts as $post)
            <div class="col-md-4">
                <div class="card card-news h-100 rounded-4 overflow-hidden bg-white shadow-sm">
                    <div class="card-img-wrapper position-relative" style="height: 220px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $post->title }}">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill fw-bold small">
                                {{ $post->category->title ?? 'Umum' }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-muted small mb-2 d-flex align-items-center gap-2">
                            <i class="far fa-calendar-alt text-primary"></i> 
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark stretched-link">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                        </h5>
                        <p class="card-text text-body-custom small mb-4 flex-grow-1">
                            {!! Str::limit(strip_tags($post->content), 90) !!}
                        </p>
                        <div class="pt-3 border-top border-light">
                            <small class="fw-bold text-primary">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 bg-light rounded-4">
                <div class="text-muted">
                    <i class="far fa-newspaper fa-3x mb-3 opacity-50"></i>
                    <p>Belum ada berita terbaru yang dipublikasikan.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection