@extends('layouts.admin')
@section('title', 'Tambah Akreditasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card card-custom mb-4">
            <div class="card-header bg-white fw-bold">
                <i class="fas fa-certificate me-2"></i> Tambah Data Akreditasi
            </div>
            <div class="card-body">

                <form action="{{ route('admin.akreditasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label fw-bold">Upload Sertifikat / Gambar Akreditasi</label>
                    <input type="file" name="image" class="form-control mb-3" accept="image/*">

                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea id="editor" name="description"></textarea>

                    <button class="btn btn-primary mt-3 px-4">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor'));
</script>
@endsection
