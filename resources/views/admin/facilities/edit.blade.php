@extends('layouts.admin')
@section('title', 'Edit Fasilitas')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header fw-bold">Edit Fasilitas: {{ $facility->name }}</div>
        <div class="card-body">
            <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label>Nama Fasilitas</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $facility->name) }}" required>
                </div>

                <div class="mb-3">
                    <label>Foto Saat Ini</label><br>
                    <img src="{{ asset('storage/'.$facility->image) }}" width="150" class="mb-2 rounded">
                    <br>
                    <label>Ganti Foto (Opsional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                </div>

                <div class="mb-3">
                    <label>Deskripsi Singkat</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $facility->description) }}</textarea>
                </div>

                <button class="btn btn-primary">Update Data</button>
                <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection