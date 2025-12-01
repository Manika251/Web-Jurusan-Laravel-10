@extends('frontend.layouts')
@section('title', 'Jurusan Sistem Informasi')

@section('content')
<div class="container py-5">

    <!-- Header Halaman -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">DOKUMENTASI</span>
        <h2 class="fw-bold display-6">Galeri Kegiatan</h2>
        <p class="text-muted">Momen-momen berharga bersama yang kami abadikan.</p>
    </div>

    <!-- Grid Galeri -->
    <div class="row g-4">
        @forelse($galleries as $gallery)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden gallery-card h-100">

                <!-- Pembungkus Gambar -->
                <div class="position-relative overflow-hidden gallery-img-wrapper" style="padding-top: 75%;"> <!-- Rasio 4:3 -->
                    <img src="{{ asset('storage/' . $gallery->image) }}"
                        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover transition-zoom"
                        alt="{{ $gallery->title }}">

                    <!-- Overlay Hitam saat Hover -->
                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                        <a href="{{ asset('storage/' . $gallery->image) }}" target="_blank" class="btn btn-light btn-sm rounded-pill px-4 fw-bold shadow-sm">
                            <i class="fas fa-search-plus me-2"></i> Lihat Penuh
                        </a>
                    </div>
                </div>

                <!-- Keterangan Foto -->
                <div class="card-body text-center p-3">
                    <h6 class="fw-bold text-dark mb-1">{{ $gallery->title }}</h6>
                    @if($gallery->caption)
                    <p class="text-muted small mb-0 text-truncate">{{ $gallery->caption }}</p>
                    @endif
                </div>

            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 rounded-4 bg-light border border-dashed d-inline-block">
                <i class="fas fa-images fa-3x text-muted mb-3 opacity-50"></i>
                <h5 class="text-muted">Belum ada foto di galeri.</h5>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $galleries->links() }}
    </div>
</div>

<!-- CSS KHUSUS GALERI -->
<style>
    /* Efek Zoom Gambar */
    .gallery-card:hover .transition-zoom {
        transform: scale(1.1);
    }

    .transition-zoom {
        transition: transform 0.5s ease;
    }

    /* Efek Overlay Gelap */
    .gallery-overlay {
        background: rgba(0, 0, 0, 0.4);
        opacity: 0;
        transition: opacity 0.3s ease;
        backdrop-filter: blur(2px);
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    /* Shadow Card */
    .gallery-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection