@extends('layouts.admin')
@section('title', 'Manajemen Fasilitas')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header bg-white fw-bold">Tambah Fasilitas Baru</div>
            <div class="card-body">
                <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Lab Komputer" required>
                    </div>
                    <div class="mb-3">
                        <label>Foto Fasilitas</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary w-100">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Info Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facilities as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$item->image) }}" width="80" class="rounded">
                            </td>
                            <td>
                                <strong>{{ $item->name }}</strong><br>
                                <small class="text-muted">{{ $item->description }}</small>
                            </td>
                            <td>
                                <a href="{{ route('admin.facilities.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.facilities.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $facilities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection