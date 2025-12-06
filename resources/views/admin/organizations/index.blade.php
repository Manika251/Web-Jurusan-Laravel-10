@extends('layouts.admin')
@section('title', 'Organisasi Kemahasiswaan')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-custom">
            <div class="card-header bg-white fw-bold">Tambah Organisasi</div>
            <div class="card-body">
                <form action="{{ route('admin.organizations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Organisasi</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Himpunan Mahasiswa" required>
                    </div>
                    <div class="mb-3">
                        <label>Logo / Foto</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan Singkat</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <button class="btn btn-primary w-100">Simpan</button>
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
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Logo</th>
                                <th>Nama & Ket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizations as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$item->image) }}" width="60" class="rounded-circle border">
                                </td>
                                <td>
                                    <strong>{{ $item->name }}</strong><br>
                                    <small class="text-muted">{{ $item->description }}</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.organizations.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.organizations.destroy', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $organizations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection