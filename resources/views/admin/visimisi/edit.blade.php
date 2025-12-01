@extends('layouts.admin')
@section('title', 'Edit Akreditasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card card-custom mb-4">
            <div class="card-header bg-white fw-bold">
                <i class="fas fa-edit me-2"></i> Edit Data Akreditasi
            </div>

            <div class="card-body">

                <form action="{{ route('admin.akreditasi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label class="form-label fw-bold">Gambar Saat Ini</label><br>
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="rounded border mb-3"
                         style="max-height: 150px;">

                    <label class="form-label fw-bold">Ganti Gambar</label>
                    <input type="file" name="image" class="form-control mb-3" accept="image/*">

                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea id="editor" name="description">{!! $item->description !!}</textarea>

                    <button class="btn btn-primary mt-3 px-4">
                        <i class="fas fa-save me-1"></i> Update
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
