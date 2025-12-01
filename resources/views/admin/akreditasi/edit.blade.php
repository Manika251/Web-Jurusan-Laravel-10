@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Akreditasi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.akreditasi.update', $akreditasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $akreditasi->judul }}" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Peringkat</label>
                        <input type="text" name="peringkat" class="form-control" value="{{ $akreditasi->peringkat }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ $akreditasi->tahun }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold text-primary">Status Publikasi</label>
                    <select name="status" class="form-control">
                        <option value="draft" {{ $akreditasi->status == 'draft' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                        <option value="published" {{ $akreditasi->status == 'published' ? 'selected' : '' }}>Terbit (Tampilkan di Website)</option>
                    </select>
                    <small class="text-muted">Pilih 'Terbit' jika ingin data ini muncul di halaman pengunjung.</small>
                </div>

                <div class="mb-3">
                    <label>Ganti Sertifikat (Biarkan kosong jika tidak diganti)</label>
                    <input type="file" name="file_sertifikat" class="form-control">
                    @if($akreditasi->file_sertifikat)
                        <div class="mt-2">
                            <label>Gambar Saat Ini:</label><br>
                            <img src="{{ asset('uploads/akreditasi/'.$akreditasi->file_sertifikat) }}" width="150" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ $akreditasi->deskripsi }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Perubahan</button>
                <a href="{{ route('admin.akreditasi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection