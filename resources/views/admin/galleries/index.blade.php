@extends('layouts.admin')
@section('title', 'Galeri Foto')

@section('content')
<div class="card card-custom mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Upload Foto Baru</h5>
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="title" class="form-control" placeholder="Judul Kegiatan (Wajib)" required>
                </div>
                <div class="col-md-5">
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </div>
            </div>
            <input type="text" name="caption" class="form-control mt-2" placeholder="Keterangan tambahan (Opsional)">
        </form>
    </div>
</div>

<div class="row">
    @forelse($galleries as $gallery)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div style="height: 200px; overflow: hidden;">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top h-100 w-100" style="object-fit: cover;">
            </div>
            <div class="card-body p-2 text-center">
                <h6 class="card-title fw-bold mb-1" style="font-size: 14px;">{{ $gallery->title }}</h6>
                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger w-100 mt-2">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-5">
        <h4>Belum ada foto di galeri.</h4>
    </div>
    @endforelse
</div>

{{ $galleries->links() }}
@endsection