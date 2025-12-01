@extends('frontend.layouts')
@section('title', 'Fasilitas Jurusan')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Fasilitas Penunjang</h2>
        <p class="text-muted">Sarana dan prasarana modern untuk mendukung kegiatan belajar mengajar.</p>
    </div>

    <div class="row g-4">
        @forelse($facilities as $item)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" style="height: 250px; object-fit: cover">
                <div class="card-body">
                    <h5 class="fw-bold">{{ $item->name }}</h5>
                    <p class="text-muted small mb-0">{{ $item->description }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada data fasilitas.</div>
        @endforelse
    </div>
</div>
@endsection