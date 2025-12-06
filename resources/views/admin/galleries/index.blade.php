@extends('layouts.admin')
@section('title', 'Galeri Foto')

@section('content')

{{-- === BAGIAN TAMBAHAN: UNTUK MENAMPILKAN ERROR & SUKSES === --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal Upload/Simpan!</strong> Periksa hal berikut:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- === BATAS TAMBAHAN === --}}

<div class="card card-custom mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Upload Foto Baru</h5>
        {{-- Pastikan enctype ada agar file terkirim --}}
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" placeholder="Judul Kegiatan (Wajib)" value="{{ old('title') }}" required>
                </div>
                
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Tayang (Publish)</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    <small class="text-muted" style="font-size: 11px;">Maksimal 2MB (JPG, PNG)</small>
                </div>
                
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </div>
            </div>
            <input type="text" name="caption" class="form-control mt-2" placeholder="Keterangan tambahan (Opsional)" value="{{ old('caption') }}">
        </form>
    </div>
</div>

<div class="row">
    @forelse($galleries as $gallery)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
                {{-- Cek apakah gambar ada, jika tidak pakai placeholder --}}
                @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top h-100 w-100" style="object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                        No Image
                    </div>
                @endif
            </div>
            <div class="card-body p-2 text-center">
                
                <div class="mb-2">
                    @if($gallery->status == 'published')
                        <span class="badge bg-success">Tayang</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </div>

                <h6 class="card-title fw-bold mb-1" style="font-size: 14px;">{{ $gallery->title }}</h6>
                <p class="text-muted small mb-2">{{Str::limit($gallery->caption ?? '-', 50)}}</p>
                
                <div class="d-flex justify-content-center gap-2 mt-2">
                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-warning text-white w-50">
                        Edit
                    </a>

                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="w-50">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger w-100">Hapus</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-5">
        <h4>Belum ada foto di galeri.</h4>
    </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $galleries->links() }}
</div>
@endsection