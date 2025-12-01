@extends('layouts.admin')
@section('title', 'Edit Prestasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-header bg-white fw-bold">
                <i class="fas fa-edit me-2"></i> Edit Data Prestasi
            </div>
            <div class="card-body">
                <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- WAJIB: Method PUT untuk Update -->

                    <div class="mb-3">
                        <label class="form-label">Nama Lomba / Prestasi</label>
                        <input type="text" name="title" class="form-control" value="{{ $achievement->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa / Tim</label>
                        <input type="text" name="student_name" class="form-control" value="{{ $achievement->student_name }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tingkat</label>
                            <select name="level" class="form-select">
                                <option value="Jurusan" {{ $achievement->level == 'Jurusan' ? 'selected' : '' }}>Jurusan</option>
                                <option value="Kabupaten" {{ $achievement->level == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                                <option value="Provinsi" {{ $achievement->level == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                <option value="Nasional" {{ $achievement->level == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="Internasional" {{ $achievement->level == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ $achievement->date ? $achievement->date->format('Y-m-d') : '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Dokumentasi (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">

                        @if($achievement->image)
                        <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                            <small class="d-block text-muted mb-1">Foto Saat Ini:</small>
                            <img src="{{ asset('storage/' . $achievement->image) }}" width="100" class="rounded">
                        </div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Keterangan / Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ $achievement->description }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                        <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection