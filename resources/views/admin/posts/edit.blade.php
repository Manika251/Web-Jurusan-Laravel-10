@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-custom">
            <div class="card-body">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" width="100" class="mt-2 rounded">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="content" id="editor">{{ $post->content }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Update Berita</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary px-4">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

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
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endsection