@extends('layouts.admin')
@section('title', 'Pengaturan Akademik')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- BAGIAN 1: STRUKTUR ORGANISASI -->
            <div class="card card-custom mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-sitemap me-2"></i> Struktur Organisasi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Upload Gambar Bagan Struktur</label>
                            <input type="file" name="jurusan_structure_image" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG/PNG. Ukuran besar disarankan.</small>
                        </div>
                        <div class="col-md-6 text-center">
                            <label class="form-label d-block">Gambar Saat Ini:</label>
                            @if(isset($settings['jurusan_structure_image']))
                            <img src="{{ asset('storage/' . $settings['jurusan_structure_image']) }}" class="img-fluid rounded border shadow-sm" style="max-height: 200px;">
                            @else
                            <span class="text-muted fst-italic">Belum ada gambar struktur.</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- BAGIAN 2: KURIKULUM -->
            <div class="card card-custom mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-book me-2"></i> Penjelasan Kurikulum
                </div>
                <div class="card-body">
                    <label class="form-label">Isi Penjelasan Kurikulum</label>
                    <textarea name="jurusan_curriculum" id="editor">{{ $settings['jurusan_curriculum'] ?? '' }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-5"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
        </form>

    </div>
</div>

<!-- Script CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
    }).catch(error => {
        console.error(error);
    });
</script>
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endsection