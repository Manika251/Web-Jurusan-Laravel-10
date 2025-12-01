@extends('layouts.admin')
@section('title', 'Tulis Berita Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-custom">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Formulir Berita</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul menarik..." required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Gambar Utama (Thumbnail)</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published">Langsung Tayang (Published)</option>
                                <option value="draft">Simpan sebagai Konsep (Draft)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Isi Berita</label>
                        <!-- Textarea ini akan diubah jadi CKEditor -->
                        <textarea name="content" id="editor" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-paper-plane me-2"></i> Terbitkan</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>

<!-- Sedikit style untuk Editor -->
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endsection