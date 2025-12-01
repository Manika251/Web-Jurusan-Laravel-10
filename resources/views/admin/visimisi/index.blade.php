@extends('layouts.admin')
@section('title', 'Data Akreditasi')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4 class="fw-bold">Data Akreditasi</h4>
    <a href="{{ route('admin.akreditasi.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card card-custom">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->image) }}"
                             class="rounded border"
                             style="height: 80px;">
                    </td>
                    <td>{!! Str::limit($item->description, 80) !!}</td>
                    <td>
                        <a href="{{ route('admin.akreditasi.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('admin.akreditasi.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($data->isEmpty())
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
