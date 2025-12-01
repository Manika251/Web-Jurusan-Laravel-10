@extends('frontend.layouts')
@section('title', 'Struktur Organisasi')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary mb-2 px-3 py-2 rounded-pill">AKADEMIK</span>
        <h2 class="fw-bold display-6">Struktur Organisasi</h2>
        <p class="text-muted">Bagan kepemimpinan dan manajemen {{ $web_config['jurusan_name'] ?? 'Jurusan' }}.</p>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-body p-4 text-center bg-white">

            {{-- LOGIKA PENGECEKAN GAMBAR --}}
            @if(isset($web_config['jurusan_structure_image']) && !empty($web_config['jurusan_structure_image']))

            <!-- 1. JIKA GAMBAR SUDAH DI-UPLOAD DI ADMIN -->
            <img src="{{ asset('storage/' . $web_config['jurusan_structure_image']) }}" class="img-fluid rounded shadow-sm border" alt="Struktur Organisasi">

            <div class="mt-4">
                <a href="{{ asset('storage/' . $web_config['jurusan_structure_image']) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                    <i class="fas fa-search-plus me-1"></i> Lihat Ukuran Penuh
                </a>
            </div>

            @else

            <!-- 2. JIKA GAMBAR BELUM ADA (TAMPILAN DEFAULT) -->
            <div class="py-5 bg-light rounded border border-dashed mx-auto" style="max-width: 600px;">
                <div class="mb-3 opacity-25">
                    <i class="fas fa-sitemap fa-4x text-muted"></i>
                </div>
                <h5 class="fw-bold text-muted">Bagan Belum Tersedia</h5>
                <p class="text-muted small mb-0 px-3">
                    Admin belum mengupload gambar Struktur Organisasi. <br>
                    Silakan upload melalui menu <strong>Admin Panel > Kurikulum & Struktur</strong>.
                </p>
            </div>

            @endif

            <div class="mt-5 text-start border-top pt-4">
                <h5 class="fw-bold text-primary"><i class="fas fa-info-circle me-2"></i> Keterangan</h5>
                <p class="text-muted lh-lg">
                     Struktur organisasi di atas menggambarkan hierarki kepemimpinan <strong>Jurusan</strong> yang dipimpin oleh <strong>Ketua Jurusan</strong>, dibantu oleh <strong>Sekretaris Jurusan</strong>, <strong>Kepala Laboratorium</strong>, serta <strong>Dosen dan Staf Administrasi</strong>. Struktur ini dibentuk untuk menjamin mutu pendidikan dan pelayanan akademik yang optimal bagi seluruh <strong>Mahasiswa</strong>.
            </div>
        </div>
    </div>
</div>
@endsection