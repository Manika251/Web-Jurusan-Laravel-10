@extends('frontend.layouts')

@section('title', $post->title)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Breadcrumb (Navigasi Kecil) -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('posts') }}">Berita</a></li>
                    <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>

            <!-- KARTU BERITA -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

                <!-- 1. GAMBAR (Sekarang ada di dalam Card) -->
                <!-- Kita batasi tingginya max 500px agar tidak terlalu panjang ke bawah -->
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top w-100" alt="{{ $post->title }}" style="max-height: 500px; object-fit: cover;">

                <div class="card-body p-4 p-md-5">

                    <!-- 2. JUDUL & INFO -->
                    <div class="mb-4 text-center">
                        <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">{{ $post->category->title }}</span>
                        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                        <div class="text-muted small d-flex justify-content-center gap-3">
                            <span><i class="fas fa-user me-1"></i> {{ $post->user->name }}</span>
                            <span><i class="fas fa-calendar-alt me-1"></i> {{ $post->created_at->format('d F Y') }}</span>
                            <span><i class="fas fa-eye me-1"></i> {{ $post->views_count ?? 0 }}x dibaca</span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- 3. ISI BERITA -->
                    <div class="content-body lh-lg text-dark">
                        {!! $post->content !!}
                    </div>

                    <!-- 4. FOOTER CARD (Tombol Share & Kembali) -->
                    <div class="mt-5 pt-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <a href="{{ route('posts') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Berita
                        </a>

                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted small me-2">Bagikan:</span>
                            <button class="btn btn-primary btn-sm rounded-circle" style="width: 35px; height: 35px;"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-info btn-sm rounded-circle text-white" style="width: 35px; height: 35px;"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-success btn-sm rounded-circle" style="width: 35px; height: 35px;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Style Tambahan untuk merapikan isi konten -->
<style>
    /* Gambar di dalam paragraf tidak boleh melebihi lebar card */
    .content-body img {
        max-width: 100%;
        height: auto !important;
        border-radius: 8px;
        margin: 20px 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .content-body p {
        margin-bottom: 1.2rem;
        font-size: 1.05rem;
        color: #444;
    }

    /* Kutipan */
    .content-body blockquote {
        border-left: 4px solid #0d6efd;
        padding: 10px 20px;
        margin: 20px 0;
        background: #f8f9fa;
        font-style: italic;
        color: #555;
        border-radius: 0 5px 5px 0;
    }

    /* List (ul/ol) */
    .content-body ul,
    .content-body ol {
        padding-left: 20px;
        margin-bottom: 1.5rem;
    }
</style>
@endsection