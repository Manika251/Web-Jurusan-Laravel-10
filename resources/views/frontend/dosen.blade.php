@extends('frontend.layouts')
@section('title', 'Direktori Dosen')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <span class="badge bg-primary mb-2 px-3 py-2 rounded-pill">Tenaga Pendidik</span>
        <h2 class="fw-bold display-6">Dosen & Staf Pengajar</h2>
        <p class="text-muted">Pendidik profesional yang siap membimbing masa depan Mahasiswa.</p>
    </div>

    {{-- BAGIAN PIMPINAN (Biarkan tetap layoutnya atau sesuaikan jika perlu) --}}
    @if($pimpinan->count() > 0)
    <div class="row justify-content-center g-4 mb-5">
        <div class="col-12 text-center">
            <h3 class="fw-bold text-dark border-bottom d-inline-block pb-2 border-primary">Pimpinan Jurusan</h3>
        </div>

        @foreach($pimpinan as $row)
        {{-- Pimpinan tetap 4 kolom (col-lg-3) atau mau diubah jadi 3 juga silakan ganti ke col-lg-4 --}}
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-hover rounded-4 text-center overflow-hidden position-relative">
                
                <div class="position-absolute top-0 start-0 w-100 bg-primary bg-opacity-10" style="height: 80px;"></div>

                <div class="card-body p-4 position-relative">
                    <div class="mb-3 d-inline-block position-relative">
                        <div class="rounded-circle overflow-hidden border border-4 border-white shadow-sm" style="width: 120px; height: 120px;">
                            @if($row->photo)
                            <img src="{{ asset('storage/' . $row->photo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $row->name }}">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($row->name) }}&background=random&color=fff&size=128" class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; border: 2px solid white;">
                            <i class="fas fa-check small"></i>
                        </div>
                    </div>

                    {{-- Nama Pimpinan --}}
                    <h6 class="fw-bold mb-1 text-dark" style="font-size: 1rem;">{{ $row->name }}</h6>
                    <p class="text-primary small fw-bold text-uppercase mb-2 letter-spacing-1">{{ $row->position }}</p>

                    @if($row->nip)
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">NIP: {{ $row->nip }}</p>
                    @else
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">-</p>
                    @endif

                    <div class="d-flex justify-content-center gap-2 mt-2">
                        @php $sosmed = $row->social_links ?? []; @endphp
                        @if(!empty($sosmed['facebook'])) <a href="{{ $sosmed['facebook'] }}" class="btn btn-sm btn-outline-primary rounded-circle icon-btn" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                        @if(!empty($sosmed['instagram'])) <a href="{{ $sosmed['instagram'] }}" class="btn btn-sm btn-outline-danger rounded-circle icon-btn" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                        @if(!empty($sosmed['linkedin'])) <a href="{{ $sosmed['linkedin'] }}" class="btn btn-sm btn-outline-info rounded-circle icon-btn" target="_blank"><i class="fab fa-linkedin-in"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- BAGIAN DOSEN PENGAJAR --}}
    @if($dosen->count() > 0)
    <div class="row g-4 mb-5">
        <div class="col-12 mb-2 border-bottom pb-2">
            <h4 class="fw-bold text-dark"><i class="fas fa-chalkboard-teacher me-2 text-primary"></i>Dosen Pengajar</h4>
        </div>

        @foreach($dosen as $row)
        {{-- UBAH DISINI: col-lg-4 agar jadi 3 kolom per baris --}}
        <div class="col-md-6 col-lg-4"> 
            <div class="card h-100 border-0 shadow-hover rounded-4 text-center overflow-hidden position-relative">
                
                <div class="position-absolute top-0 start-0 w-100 bg-primary bg-opacity-10" style="height: 80px;"></div>

                <div class="card-body p-4 position-relative">
                    <div class="mb-3 d-inline-block position-relative">
                        <div class="rounded-circle overflow-hidden border border-4 border-white shadow-sm" style="width: 120px; height: 120px;">
                            @if($row->photo)
                            <img src="{{ asset('storage/' . $row->photo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $row->name }}">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($row->name) }}&background=random&color=fff&size=128" class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; border: 2px solid white;">
                            <i class="fas fa-check small"></i>
                        </div>
                    </div>

                    {{-- UBAH DISINI: Pakai h6 dan font-size disesuaikan agar nama panjang muat --}}
                    <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem; line-height: 1.4;">{{ $row->name }}</h6>
                    
                    <p class="text-primary small fw-bold text-uppercase mb-2 letter-spacing-1">{{ $row->position }}</p>

                    @if($row->nip)
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">NIP: {{ $row->nip }}</p>
                    @else
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">-</p>
                    @endif

                    <div class="d-flex justify-content-center gap-2 mt-2">
                        @php $sosmed = $row->social_links ?? []; @endphp
                        @if(!empty($sosmed['facebook'])) <a href="{{ $sosmed['facebook'] }}" class="btn btn-sm btn-outline-primary rounded-circle icon-btn" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                        @if(!empty($sosmed['instagram'])) <a href="{{ $sosmed['instagram'] }}" class="btn btn-sm btn-outline-danger rounded-circle icon-btn" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                        @if(!empty($sosmed['linkedin'])) <a href="{{ $sosmed['linkedin'] }}" class="btn btn-sm btn-outline-info rounded-circle icon-btn" target="_blank"><i class="fab fa-linkedin-in"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- BAGIAN STAF --}}
    @if($staf->count() > 0)
    <div class="row g-4 mb-5">
        <div class="col-12 mb-2 border-bottom pb-2">
            <h4 class="fw-bold text-dark"><i class="fas fa-user-cog me-2 text-warning"></i>Staf & Tata Usaha</h4>
        </div>

        @foreach($staf as $row)
        {{-- UBAH DISINI: col-lg-4 agar jadi 3 kolom per baris --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-hover rounded-4 text-center overflow-hidden position-relative">
                
                <div class="position-absolute top-0 start-0 w-100 bg-primary bg-opacity-10" style="height: 80px;"></div>

                <div class="card-body p-4 position-relative">
                    <div class="mb-3 d-inline-block position-relative">
                        <div class="rounded-circle overflow-hidden border border-4 border-white shadow-sm" style="width: 120px; height: 120px;">
                            @if($row->photo)
                            <img src="{{ asset('storage/' . $row->photo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $row->name }}">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($row->name) }}&background=random&color=fff&size=128" class="w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 35px; height: 35px; border: 2px solid white;">
                            <i class="fas fa-check small"></i>
                        </div>
                    </div>

                    {{-- UBAH DISINI: Pakai h6 dan font-size disesuaikan --}}
                    <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem; line-height: 1.4;">{{ $row->name }}</h6>

                    <p class="text-primary small fw-bold text-uppercase mb-2 letter-spacing-1">{{ $row->position }}</p>

                    @if($row->nip)
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">NIP: {{ $row->nip }}</p>
                    @else
                    <p class="text-muted small mb-3 bg-light rounded-pill px-2 py-1 d-inline-block" style="font-size: 0.75rem;">-</p>
                    @endif

                    <div class="d-flex justify-content-center gap-2 mt-2">
                        @php $sosmed = $row->social_links ?? []; @endphp
                        @if(!empty($sosmed['facebook'])) <a href="{{ $sosmed['facebook'] }}" class="btn btn-sm btn-outline-primary rounded-circle icon-btn" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                        @if(!empty($sosmed['instagram'])) <a href="{{ $sosmed['instagram'] }}" class="btn btn-sm btn-outline-danger rounded-circle icon-btn" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                        @if(!empty($sosmed['linkedin'])) <a href="{{ $sosmed['linkedin'] }}" class="btn btn-sm btn-outline-info rounded-circle icon-btn" target="_blank"><i class="fab fa-linkedin-in"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>

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