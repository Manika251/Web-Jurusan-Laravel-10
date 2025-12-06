@extends('frontend.layouts')
@section('title', 'Visi & Misi')

@section('content')

<section class="py-5 bg-white">
    <div class="container">
        
        <div class="text-center mb-5 mx-auto">
            <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">LANDASAN KAMI</span>
            <h2 class="fw-bold display-6">Visi & Misi</h2>
        </div>

        <div class="row g-4 justify-content-center align-items-stretch">
            
            <div class="col-lg-5 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-effect">
                    <div class="bg-primary text-white text-center py-3 position-relative">
                        <div class="bg-decoration-circle"></div>
                        <div class="position-relative z-index-1">
                            <i class="fas fa-eye fs-3 mb-1"></i>
                            <h5 class="fw-bold mb-0">Visi</h5>
                        </div>
                    </div>
                    
                    <div class="card-body p-4 text-center d-flex flex-column justify-content-center">
                        <div class="my-auto">
                            <i class="fas fa-quote-left text-primary opacity-25 mb-2"></i>
                            <blockquote class="blockquote mb-0">
                                <p class="fs-6 fst-italic text-dark mb-2 px-2">
                                    "{{ $web_config['jurusan_vision'] ?? 'Menjadi program studi unggulan yang mencetak lulusan kompeten dan berkarakter.' }}"
                                </p>
                            </blockquote>
                            <i class="fas fa-quote-right text-primary opacity-25 mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-effect">
                    <div class="bg-success text-white text-center py-3 position-relative">
                        <div class="bg-decoration-circle"></div>
                        <div class="position-relative z-index-1">
                            <i class="fas fa-bullseye fs-3 mb-1"></i>
                            <h5 class="fw-bold mb-0">Misi</h5>
                        </div>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        @if(isset($web_config['jurusan_mission']) && !empty($web_config['jurusan_mission']))
                            <div class="misi-content text-secondary small">
                                {!! $web_config['jurusan_mission'] !!}
                            </div>
                        @else
                            <ul class="list-unstyled text-secondary small mb-0 my-auto">
                                <li class="d-flex mb-3 align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-3 flex-shrink-0"></i>
                                    <span>Melaksanakan pembelajaran aktif, inovatif, dan menyenangkan berbasis teknologi.</span>
                                </li>
                                <li class="d-flex mb-3 align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-3 flex-shrink-0"></i>
                                    <span>Menumbuhkan penghayatan terhadap ajaran agama dan etika profesi.</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success mt-1 me-3 flex-shrink-0"></i>
                                    <span>Mengembangkan potensi peserta didik dan riset yang bermanfaat bagi masyarakat.</span>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* Hover Effect */
    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    /* Dekorasi Lingkaran */
    .bg-decoration-circle {
        position: absolute;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -50px;
        left: -30px;
    }

    /* List Style */
    .misi-content ul {
        padding-left: 1rem;
        margin-bottom: 0;
    }
    .misi-content li {
        margin-bottom: 0.5rem;
    }
    
    .opacity-25 { opacity: 0.25; }
</style>

@endsection