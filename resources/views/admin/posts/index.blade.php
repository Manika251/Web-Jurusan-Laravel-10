@extends('layouts.admin')
@section('title', 'Manajemen Berita')

@section('content')
<div class="card card-custom">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-bold">Daftar Artikel & Berita</h5>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                <i class="fas fa-pen-nib me-1"></i> Tulis Berita
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="100">Gambar</th>
                        <th>Judul & Penulis</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $post->image) }}" class="rounded shadow-sm" width="80" height="50" style="object-fit: cover">
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ Str::limit($post->title, 40) }}</div>
                            <small class="text-muted"><i class="fas fa-user-edit me-1"></i> {{ $post->user->name }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $post->category->title }}</span>
                        </td>
                        <td>
                            @if($post->status == 'published')
                            <span class="badge bg-success">Tayang</span>
                            @else
                            <span class="badge bg-warning text-dark">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">Belum ada berita yang ditulis.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </div>
</div>
@endsection