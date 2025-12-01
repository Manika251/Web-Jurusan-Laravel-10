@extends('frontend.layouts')
@section('title', 'Berita Jurusan')

@section('content')
<div class="container py-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold">Berita & Artikel Terbaru</h2>
            <p class="text-muted">Ikuti perkembangan terbaru dari kegiatan jurusan kami.</p>
        </div>
    </div>

    <div class="row">
        @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm card-custom">
                <div style="height: 220px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $post->title }}">
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2 small">
                        <span class="text-primary fw-bold">{{ $post->category->title }}</span>
                        <span class="text-muted">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    <h5 class="card-title fw-bold">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($post->title, 60) }}</a>
                    </h5>
                    <p class="card-text text-muted small">{!! Str::limit(strip_tags($post->content), 120) !!}</p>
                </div>
                <div class="card-footer bg-white border-0 pb-3">
                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="display-1 text-muted mb-3"><i class="far fa-newspaper"></i></div>
            <h4>Belum ada berita yang diterbitkan.</h4>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection