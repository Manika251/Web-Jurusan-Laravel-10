@extends('frontend.layouts')
@section('title', 'Organisasi Kemahasiswaan')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-2">MINAT & BAKAT</span>
        <h2 class="fw-bold display-6">Organisasi Kemahasiswaan</h2>
        <p class="text-muted">Wadah pengembangan diri dan kreativitas mahasiswa Sistem Informasi.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            @forelse($organizations as $org)
            <div class="card border-0 shadow-sm rounded-4 mb-5 overflow-hidden hover-card">
                
                <div class="bg-light pt-5 pb-4 text-center border-bottom border-light">
                    <div class="d-inline-block p-2 bg-white rounded-circle shadow-sm border">
                        <img src="{{ asset('storage/' . $org->image) }}" 
                             class="img-fluid rounded-circle object-fit-cover" 
                             style="width: 130px; height: 130px;" 
                             alt="{{ $org->name }}">
                    </div>
                </div>

                <div class="card-body p-4 p-lg-5 text-center">
                    <h3 class="card-title fw-bold text-dark mb-3">{{ $org->name }}</h3>
                    
                    <div class="d-flex justify-content-center mb-4">
                        <div class="bg-primary rounded-pill" style="width: 50px; height: 4px;"></div>
                    </div>

                    <p class="card-text text-muted text-start" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! nl2br(e($org->description)) !!}
                    </p>
                </div>

            </div>
            @empty
            <div class="text-center py-5">
                <div class="p-5 rounded-4 bg-light border border-dashed d-inline-block">
                    <i class="fas fa-users fa-3x text-muted mb-3 opacity-50"></i>
                    <h5 class="text-muted">Belum ada data organisasi.</h5>
                </div>
            </div>
            @endforelse

        </div>
    </div>

</div>

<style>
    /* Efek Hover Halus */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
    }
</style>
@endsection