@extends('layouts.admin')
@section('title', 'Edit Organisasi')

@section('content')
<div class="card card-custom col-md-8 mx-auto">
    <div class="card-header bg-white">
        <h5 class="fw-bold mb-0">Edit Organisasi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.organizations.update', $organization->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Organisasi</label>
                <input type="text" name="name" class="form-control" value="{{ $organization->name }}" required>
            </div>

            <div class="mb-3">
                <label>Keterangan Singkat</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $organization->description }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label>Ganti Logo (Opsional)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-4 text-center">
                    <small class="d-block mb-1">Logo Saat Ini:</small>
                    <img src="{{ asset('storage/' . $organization->image) }}" width="80" class="rounded-circle border">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.organizations.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection