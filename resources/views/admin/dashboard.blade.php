@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid p-0">
    
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="mb-0 fw-bold text-dark">Dashboard</h3>
            <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
        <div>
            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="far fa-calendar-alt me-2"></i> {{ date('d M Y') }}
            </span>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="card border border-light shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold text-uppercase">Total Berita</span>
                        <i class="fas fa-newspaper text-primary"></i>
                    </div>
                    <h2 class="mb-0 fw-bold">{{ $counts['posts'] ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="card border border-light shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold text-uppercase">Total Dosen</span>
                        <i class="fas fa-chalkboard-user text-success"></i>
                    </div>
                    <h2 class="mb-0 fw-bold">{{ $counts['dosens'] ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="card border border-light shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold text-uppercase">Prestasi</span>
                        <i class="fas fa-trophy text-warning"></i>
                    </div>
                    <h2 class="mb-0 fw-bold">{{ $counts['achievements'] ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="card border border-light shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold text-uppercase">Galeri Foto</span>
                        <i class="fas fa-images text-info"></i>
                    </div>
                    <h2 class="mb-0 fw-bold">{{ $counts['galleries'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card border border-light shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold">Artikel Terbaru</h6>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 text-muted small border-bottom-0">Judul</th>
                                <th class="text-muted small border-bottom-0">Kategori</th>
                                <th class="text-muted small border-bottom-0">Status</th>
                                <th class="pe-4 text-end text-muted small border-bottom-0">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPosts as $post)
                            <tr>
                                <td class="ps-4 py-3">
                                    <span class="d-block fw-bold text-dark text-truncate" style="max-width: 250px;">
                                        {{ $post->title }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-secondary border">
                                        {{ $post->category->title ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    @if($post->status == 'published')
                                        <span class="text-success small fw-bold"><i class="fas fa-check me-1"></i> Terbit</span>
                                    @else
                                        <span class="text-warning small fw-bold"><i class="fas fa-clock me-1"></i> Draft</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end text-muted small">
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Tidak ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border border-light shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Menu Cepat</h6>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.posts.create') }}" class="list-group-item list-group-item-action py-3 d-flex align-items-center">
                        <i class="fas fa-pen text-primary me-3" style="width: 20px;"></i>
                        <div>
                            <div class="fw-bold text-dark">Tulis Berita</div>
                            <small class="text-muted">Buat postingan baru</small>
                        </div>
                    </a>
                    <a href="{{ route('admin.dosen.create') }}" class="list-group-item list-group-item-action py-3 d-flex align-items-center">
                        <i class="fas fa-user-plus text-success me-3" style="width: 20px;"></i>
                        <div>
                            <div class="fw-bold text-dark">Tambah Dosen</div>
                            <small class="text-muted">Input data pengajar</small>
                        </div>
                    </a>
                    <a href="{{ route('admin.achievements.create') }}" class="list-group-item list-group-item-action py-3 d-flex align-items-center">
                        <i class="fas fa-trophy text-warning me-3" style="width: 20px;"></i>
                        <div>
                            <div class="fw-bold text-dark">Input Prestasi</div>
                            <small class="text-muted">Catat penghargaan</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection