@extends('frontend.layouts')
@section('title', 'Prestasi Mahasiswa')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill mb-2"></span>
        <h2 class="fw-bold display-6">Daftar Prestasi</h2>
        <p class="text-muted">Jejak langkah keberhasilan Mahasiswa kami di berbagai bidang.</p>
    </div>

    <div class="row g-4">
        @forelse($achievements as $prestasi)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover rounded-4 overflow-hidden card-lift">
                <!-- Gambar -->
                <div class="position-relative" style="height: 250px; overflow: hidden;">
                    @if($prestasi->image)
                    <img src="{{ asset('storage/'.$prestasi->image) }}" class="w-100 h-100 object-fit-cover transition-zoom">
                    @else
                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                        <i class="fas fa-trophy fa-4x opacity-25"></i>
                    </div>
                    @endif

                    <!-- Badge Tingkat -->
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-warning text-dark shadow-sm px-3 py-2 rounded-pill">
                            {{ $prestasi->level }}
                        </span>
                    </div>
                </div>

                <!-- Konten -->
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-2 text-muted small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ $prestasi->date ? $prestasi->date->format('d F Y') : 'Tanggal tidak tersedia' }}
                    </div>

                    <h5 class="fw-bold text-dark mb-2">{{ $prestasi->title }}</h5>
                    <p class="text-primary fw-bold mb-3 small text-uppercase letter-spacing-1">{{ $prestasi->student_name }}</p>

                    @if($prestasi->description)
                    <p class="text-muted small border-top pt-3 mt-3">
                        {{ Str::limit($prestasi->description, 100) }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 rounded-4 bg-light border border-dashed d-inline-block">
                <i class="fas fa-trophy fa-3x text-muted mb-3 opacity-50"></i>
                <h5 class="text-muted">Belum ada data prestasi.</h5>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $achievements->links() }}
    </div>
</div>

<style>
    .shadow-hover {
        transition: all 0.3s ease;
        background: #fff;
    }

    .card-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .transition-zoom {
        transition: transform 0.5s ease;
    }

    .card-lift:hover .transition-zoom {
        transform: scale(1.1);
    }

    .letter-spacing-1 {
        letter-spacing: 1px;
    }
</style>
@endsection