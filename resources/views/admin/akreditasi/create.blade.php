@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Akreditasi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.akreditasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Peringkat</label>
                        <input type="text" name="peringkat" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Sertifikat (Gambar)</label>
                    <input type="file" name="file_sertifikat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="published">Langsung Terbit (Published)</option>
        <option value="draft" selected>Simpan sebagai Draft</option>
    </select>
</div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.akreditasi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection