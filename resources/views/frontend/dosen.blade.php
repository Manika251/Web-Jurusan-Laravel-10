@extends('frontend.layouts')
@section('title', 'Direktori Dosen')

@section('content')
<div class="container py-5">

    <!-- HEADER SECTION -->
    <div class="text-center mb-5">
        <!-- Perbaikan Typo: Tenaga Pendidik -->
        <span class="badge bg-primary mb-2 px-3 py-2 rounded-pill">Tenaga Pendidik</span>
        <h2 class="fw-bold display-6">Dosen & Staf Pengajar</h2>
        <p class="text-muted">Pendidik profesional yang siap membimbing masa depan Mahasiswa.</p>
    </div>

    <!-- GRID DOSEN -->
    <div class="row g-4 justify-content-center">
        <!-- UBAH 1: jadi dosens -->
        @forelse($dosens as $dosen)
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-hover rounded-4 text-center overflow-hidden position-relative">

                <!-- Dekorasi Background Atas Card -->
                <div class="position-absolute top-0 start-0 w-100 bg-primary bg-opacity-10" style="height: 80px;"></div>

                <div class="card-body p-4 position-relative">

                    <!-- FOTO PROFIL -->
                    <div class="mb-3 d-inline-block position-relative">
                        <div class="rounded-circle overflow-hidden border border-4 border-white shadow-sm" style="width: 120px; height: 120px;">
                            <!-- UBAH 2 jadi $dosen -->
                            @if($dosen->photo)
                            <img src="{{ asset('storage/' . $dosen->photo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $dosen->name }}">
                            @else
                            <!-- Avatar Default dari Inisial Nama -->
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($dosen->name) }}&background=random&color=fff&size=128" class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <!-- Ikon Kecil -->
                        <div class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; border: 2px solid white;">
                            <i class="fas fa-check small"></i>
                        </div>
                    </div>

                    <!-- INFO DOSEN -->
                    <h5 class="fw-bold mb-1 text-dark">{{ $dosen->name }}</h5>
                    <p class="text-primary small fw-bold text-uppercase mb-2 letter-spacing-1">{{ $dosen->position }}</p>

                    @if($dosen->nip)
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">
                        NIP: {{ $dosen->nip }}
                    </p>
                    @else
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">
                        -
                    </p>
                    @endif

                    <!-- SOSMED -->
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        @php $sosmed = $dosen->social_links ?? []; @endphp

                        @if(!empty($sosmed['facebook']))
                        <a href="{{ $sosmed['facebook'] }}" class="btn btn-sm btn-outline-primary rounded-circle icon-btn" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif

                        @if(!empty($sosmed['instagram']))
                        <a href="{{ $sosmed['instagram'] }}" class="btn btn-sm btn-outline-danger rounded-circle icon-btn" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif

                        @if(!empty($sosmed['linkedin']))
                        <a href="{{ $sosmed['linkedin'] }}" class="btn btn-sm btn-outline-info rounded-circle icon-btn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="mb-3 opacity-25">
                <i class="fas fa-user-tie fa-4x text-muted"></i>
            </div>
            <h5 class="text-muted">Belum ada data dosen yang ditampilkan.</h5>
        </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-5 d-flex justify-content-center">
        <!-- UBAH 3: Pagination variable -->
        {{ $dosens->links() }}
    </div>
</div>

<!-- CSS KHUSUS -->
<style>
    .shadow-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
    }

    .shadow-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .letter-spacing-1 {
        letter-spacing: 1px;
    }

    .icon-btn {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .icon-btn:hover {
        transform: scale(1.1);
    }
</style>
@endsection