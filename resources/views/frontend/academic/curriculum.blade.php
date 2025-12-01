@extends('frontend.layouts')
@section('title', 'Kurikulum Jurusan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <span class="badge bg-primary mb-2 px-3 py-2 rounded-pill">AKADEMIK</span>
                <h2 class="fw-bold display-6">Kurikulum Ajar</h2>
                <p class="text-muted">Pedoman pembelajaran untuk mencetak generasi unggul.</p>
            </div>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-5">

                    {{-- Cek apakah data kurikulum ada --}}
                    @if(isset($web_config) && isset($web_config['jurusan_curriculum']) && !empty($web_config['jurusan_curriculum']))

                    <div class="content-body lh-lg text-secondary">
                        {!! $web_config['jurusan_curriculum'] !!}
                    </div>

                    @else

                    <div class="text-center py-5">
                        <i class="fas fa-book-reader fa-3x text-muted mb-3 opacity-25"></i>
                        <h4 class="fw-bold">Kurikulum Merdeka</h4>
                        <p class="text-muted">
                            (Data kurikulum belum diisi oleh Admin. Silakan login ke Admin Panel untuk mengisi bagian ini.)
                        </p>
                    </div>

                    @endif

                </div>
            </div>

            <!-- Info Tambahan -->
            <div class="row mt-5 g-4">
                <div class="col-md-4">
                    {{-- <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm h-100"> --}}
                        {{-- <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Semester Ganjil</h6>
                            <small class="text-muted">Tahun Ajaran Aktif</small>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm h-100">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0"></h6>
                            <small class="text-muted">Senin - Jumat</small>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm h-100">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Terakreditasi B+</h6>
                            <small class="text-muted">Standar Nasional</small>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .content-body ul,
    .content-body ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .content-body li {
        margin-bottom: 0.5rem;
    }

    .content-body h2,
    .content-body h3,
    .content-body h4 {
        color: #333;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .content-body p {
        margin-bottom: 1rem;
    }
</style>
@endsection