@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <!-- 1. KARTU SELAMAT DATANG -->
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-primary text-white overflow-hidden position-relative rounded-4">
            <div class="card-body p-4 position-relative z-index-1">
                <h3 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                <p class="mb-0 opacity-75">Ini adalah panel kontrol utama untuk mengelola website Jurusan Sistem Informasi.</p>
            </div>
            <!-- Dekorasi Background Abstrak -->
            <div class="position-absolute top-0 end-0 h-100 w-50 bg-white opacity-10" style="transform: skewX(-20deg) translateX(50px);"></div>
        </div>
    </div>

    <!-- 2. KARTU STATISTIK (4 KOLOM) -->
    <!-- Total Berita -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-newspaper fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Total Berita</h6>
                    <h3 class="fw-bold mb-0">{{ $counts['posts'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Dosen -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-chalkboard-teacher fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Total Dosen</h6>
                    <!-- UBAH 1: Ganti key jadi dosens (sesuai Controller) -->
                    <h3 class="fw-bold mb-0">{{ $counts['dosens'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Prestasi -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-trophy fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Prestasi</h6>
                    <h3 class="fw-bold mb-0">{{ $counts['achievements'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-images fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Galeri Foto</h6>
                    <h3 class="fw-bold mb-0">{{ $counts['galleries'] }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- 3. TABEL AKTIVITAS TERBARU -->
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                <h6 class="fw-bold mb-0">Artikel Terbaru</h6>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-0 text-muted small text-uppercase">Judul</th>
                            <th class="border-0 text-muted small text-uppercase">Kategori</th>
                            <th class="border-0 text-muted small text-uppercase">Status</th>
                            <th class="border-0 text-muted small text-uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($recentPosts as $post)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="rounded me-3" width="40" height="40" style="object-fit: cover;">
                                    @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold text-dark">{{ Str::limit($post->title, 30) }}</div>
                                        <small class="text-muted"><i class="fas fa-eye me-1"></i> {{ $post->views_count }}x dibaca</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $post->category->title }}</span></td>
                            <td>
                                <span class="badge {{ $post->status == 'published' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $post->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada artikel yang diterbitkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 4. AKSI CEPAT (SHORTCUTS) -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="fw-bold mb-0">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <!-- Tombol Tulis Berita -->
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary text-start p-3 rounded-3 d-flex align-items-center hover-shadow border-light bg-light-subtle text-dark">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Tulis Berita Baru</div>
                            <div class="small text-muted">Publikasikan artikel atau pengumuman</div>
                        </div>
                    </a>

                    <!-- Tombol Tambah Dosen -->
                    <!-- UBAH 2: Update route jadi admin.dosen.create -->
                    <a href="{{ route('admin.dosen.create') }}" class="btn btn-outline-success text-start p-3 rounded-3 d-flex align-items-center hover-shadow border-light bg-light-subtle text-dark">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Tambah Dosen</div>
                            <div class="small text-muted">Input data pengajar baru</div>
                        </div>
                    </a>

                    <!-- Tombol Input Prestasi -->
                    <a href="{{ route('admin.achievements.create') }}" class="btn btn-outline-warning text-start p-3 rounded-3 d-flex align-items-center hover-shadow border-light bg-light-subtle text-dark">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Input Prestasi</div>
                            <div class="small text-muted">Tambahkan pencapaian Mahasiswa</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Efek Hover untuk tombol shortcut */
    .hover-shadow:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        background-color: white;
        border-color: var(--bs-primary) !important;
        color: var(--bs-primary) !important;
    }

    .bg-success-subtle {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .bg-warning-subtle {
        background-color: #fff3cd;
        color: #664d03;
    }

    .bg-light-subtle {
        background-color: #f8f9fa;
    }
</style>
@endsection