@extends('frontend.layouts')
@section('title', 'Organisasi Kemahasiswaan')

@section('content')
<div class="container py-5">

    <!-- Header Halaman -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">MINAT & BAKAT</span>
        <h2 class="fw-bold display-6">Organisasi Kemahasiswaan</h2>
        <p class="text-muted">Wadah pengembangan diri, kepemimpinan, dan kreativitas mahasiswa Sistem Informasi di luar akademik.</p>
    </div>

    <!-- Grid Organisasi -->
    <div class="row g-4 justify-content-center">
        @forelse($organizations as $org)
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-scale bg-white overflow-hidden">
                <div class="card-body p-4 text-center d-flex flex-column align-items-center">

                    <!-- Logo Lingkaran (DIPERBESAR) -->
                    <div class="mb-4 position-relative">
                        <!-- Ubah width dan height dari 100px menjadi 150px -->
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
                            <!-- Ubah w-75 menjadi w-100 dan tambah padding agar tidak mentok pinggir -->
                            <img src="{{ asset('storage/' . $org->image) }}" class="w-100 h-100 object-fit-contain p-3" alt="{{ $org->name }}">
                        </div>
                    </div>

                    <!-- Nama & Deskripsi -->
                    <h5 class="fw-bold text-dark mb-2">{{ $org->name }}</h5>
                    <p class="text-muted small mb-0 flex-grow-1">
                        {{ $org->description ?? 'Kegiatan positif untuk mengembangkan potensi Mahasiswa.' }}
                    </p>

                </div>

                <!-- Garis Bawah Warna (Hiasan) -->
                <div class="card-footer border-0 p-0 bg-primary" style="height: 4px;"></div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 rounded-4 bg-light border border-dashed d-inline-block">
                <i class="fas fa-users fa-3x text-muted mb-3 opacity-50"></i>
                <h5 class="text-muted">Belum ada data organisasi.</h5>
            </div>
        </div>
        @endforelse
    </div>

</div>

<style>
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection