@extends('layouts.admin')
@section('title', 'Edit Galeri')

@section('content')
<div class="card card-custom col-md-8 mx-auto">
    <div class="card-header bg-white">
        <h5 class="fw-bold mb-0">Edit Foto Galeri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label class="form-label">Judul Kegiatan</label>
                <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="published" {{ $gallery->status == 'published' ? 'selected' : '' }}>Tayang (Publish)</option>
                    <option value="draft" {{ $gallery->status == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan (Opsional)</label>
                <textarea name="caption" class="form-control" rows="3">{{ $gallery->caption }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label d-block">Foto Saat Ini:</label>
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="img-thumbnail" style="height: 100px;">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection