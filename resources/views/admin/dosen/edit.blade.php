@extends('layouts.admin')
@section('title', 'Edit Data Dosen')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-body">
                <!-- Perbaikan 1: Route update ke admin.dosen.update & variabel $dosen -->
                <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <!-- Perbaikan 2: Ubah  jadi $dosen -->
                            <input type="text" name="name" class="form-control" value="{{ $dosen->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIDN</label>
                            <input type="number" name="nip" class="form-control" value="{{ $dosen->nip }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="position" class="form-control" value="{{ $dosen->position }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="type" class="form-select">
                                <!-- Perbaikan 3: Cek tipe data menggunakan $dosen -->
                                <option value="Dosen" {{ $dosen->type == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                <option value="staf" {{ $dosen->type == 'staf' ? 'selected' : '' }}>Staf</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Foto (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        @if($dosen->photo)
                        <div class="mt-2">
                            <small>Foto Saat Ini:</small><br>
                            <img src="{{ asset('storage/' . $dosen->photo) }}" width="80" class="rounded border mt-1">
                        </div>
                        @endif
                    </div>

                    <hr>

                    <!-- Perbaikan 4: Ambil social_links dari $dosen -->
                    @php $sosmed = $dosen->social_links ?? []; @endphp

                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                        <input type="url" name="facebook" class="form-control" value="{{ $sosmed['facebook'] ?? '' }}" placeholder="Link Facebook">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="url" name="instagram" class="form-control" value="{{ $sosmed['instagram'] ?? '' }}" placeholder="Link Instagram">
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                        <input type="url" name="linkedin" class="form-control" value="{{ $sosmed['linkedin'] ?? '' }}" placeholder="Link LinkedIn">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Perubahan</button>
                    <!-- Perbaikan 5: Tombol Batal arahkan kembali ke index dosen -->
                    <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection