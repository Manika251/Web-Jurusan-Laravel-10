@extends('layouts.admin')
@section('title', 'Prestasi')

@section('content')
<div class="row">
    <!-- Form Input -->
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header bg-white fw-bold">Tambah Prestasi</div>
            <div class="card-body">
                <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Lomba / Prestasi</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Mahasiswa / Tim</label>
                        <input type="text" name="student_name" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tingkat</label>
                            <select name="level" class="form-select">
                                <option value="Kabupaten">Kabupaten</option>
                                <option value="Provinsi">Provinsi</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Foto Dokumentasi</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <button class="btn btn-primary w-100">Simpan Prestasi</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="col-md-8">
        <div class="card card-custom">
            <div class="card-body">
                @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Prestasi</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($achievements as $item)
                            <tr>
                                <td>
                                    @if($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" width="50" class="rounded">
                                    @else
                                    <span class="badge bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->title }}</strong><br>
                                    <small class="text-muted">{{ $item->student_name }}</small>
                                </td>
                                <td><span class="badge bg-info text-dark">{{ $item->level }}</span></td>
                                <td>
                                    <form action="{{ route('admin.achievements.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        <a href="{{ route('admin.achievements.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $achievements->links() }}
            </div>
        </div>
    </div>
</div>
@endsection