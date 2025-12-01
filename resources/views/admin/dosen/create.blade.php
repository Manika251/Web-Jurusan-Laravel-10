@extends('layouts.admin')
@section('title', 'Tambah Dosen & Staff Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Form Input Dosen</h5>
            </div>
            <div class="card-body">
                <!-- PERBAIKAN 1: Route store diganti jadi admin.dosen.store -->
                <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIDN (Opsional)</label>
                            <input type="number" name="nip" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="position" class="form-control" placeholder="Contoh: Ketua Jurusan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Pegawai</label>
                            <select name="type" class="form-select">
                                <option value="Dosen">Tenaga Pengajar (Dosen)</option>
                                <option value="staf">Staf</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Profil (Wajib)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG. Maks: 2MB.</small>
                    </div>

                    <hr>
                    <h6 class="text-primary mb-3"><i class="fas fa-share-alt me-2"></i>Media Sosial (Opsional)</h6>

                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                        <input type="url" name="facebook" class="form-control" placeholder="Link Facebook">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="url" name="instagram" class="form-control" placeholder="Link Instagram">
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                        <input type="url" name="linkedin" class="form-control" placeholder="Link LinkedIn">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                        <!-- PERBAIKAN 2: Route batal diganti jadi admin.dosen.index -->
                        <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection