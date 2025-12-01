@extends('layouts.admin')
@section('title', 'Data Dosen & Staf')

@section('content')
<div class="card card-custom">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-bold">Daftar Dosen</h5>
            <!-- Ganti route ke admin.dosen.create -->
            <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Baru
            </a>
        </div>

        <!-- Alert Sukses -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama & NIDN</th>
                        <th>Jabatan</th>
                        <th>Tipe</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ganti looping variabel  jadi dosens -->
                    @foreach($dosens as $dosen)
                    <tr>
                        <td>
                            <!-- Ganti jadi $dosen -->
                            @if($dosen->photo)
                            <img src="{{ asset('storage/' . $dosen->photo) }}" class="rounded-circle object-fit-cover" width="50" height="50" alt="Foto">
                            @else
                            <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center text-white" style="width: 50px; height: 50px;">
                                <i class="fas fa-user"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $dosen->name }}</div>
                            <small class="text-muted">{{ $dosen->nip ?? '-' }}</small>
                        </td>
                        <td>{{ $dosen->position }}</td>
                        <td>
                            <span class="badge bg-{{ $dosen->type == 'Dosen' ? 'info' : 'warning' }}">
                                {{ ucfirst($dosen->type) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <!-- Ganti route ke admin.dosen.edit -->
                            <a href="{{ route('admin.dosen.edit', $dosen->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <!-- Ganti route ke admin.dosen.destroy -->
                            <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            <!-- Ganti links pagination -->
            {{ $dosens->links() }}
        </div>
    </div>
</div>
@endsection