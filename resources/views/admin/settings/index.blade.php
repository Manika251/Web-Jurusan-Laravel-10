@extends('layouts.admin')
@section('title', 'Identitas Jurusan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-custom">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-cog me-2"></i> Pengaturan Website</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- TAB NAVIGASI -->
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="umum-tab" data-bs-toggle="tab" data-bs-target="#umum" type="button">Umum & Kontak</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button">Gambar & Slide</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="statistik-tab" data-bs-toggle="tab" data-bs-target="#statistik" type="button">Statistik Angka</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button">Profil (Sejarah, Visi, Misi)</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <!-- TAB 1: UMUM -->
                        <div class="tab-pane fade show active" id="umum">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Jurusan</label>
                                    <input type="text" name="jurusan_name" class="form-control" value="{{ $settings['jurusan_name'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email Resmi</label>
                                    <input type="email" name="jurusan_email" class="form-control" value="{{ $settings['jurusan_email'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon / WhatsApp</label>
                                    <input type="text" name="jurusan_phone" class="form-control" value="{{ $settings['jurusan_phone'] ?? '' }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                    <textarea name="jurusan_address" class="form-control" rows="2">{{ $settings['jurusan_address'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Deskripsi Singkat (Untuk Footer)</label>
                                    <textarea name="jurusan_description" class="form-control" rows="2">{{ $settings['jurusan_description'] ?? '' }}</textarea>
                                </div>
                            </div>

                            <h6 class="text-primary fw-bold mt-3 mb-3">Sosial Media</h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <input type="url" name="facebook" class="form-control" placeholder="URL Facebook" value="{{ $settings['facebook'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="url" name="instagram" class="form-control" placeholder="URL Instagram" value="{{ $settings['instagram'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="url" name="youtube" class="form-control" placeholder="URL Youtube" value="{{ $settings['youtube'] ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: MEDIA -->
                        <div class="tab-pane fade" id="media">
                            <div class="alert alert-info small">Upload foto untuk mempercantik tampilan website.</div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Foto Ketua Jurusan</label>
                                    <input type="file" name="jurusan_principal_photo" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Slide Banner Utama</label>
                                    <input type="file" name="jurusan_hero_image" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Slide Banner 2</label>
                                    <input type="file" name="jurusan_hero_image_2" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Slide Banner 3</label>
                                    <input type="file" name="jurusan_hero_image_3" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: STATISTIK (BARU) -->
                        <div class="tab-pane fade" id="statistik">
                            <div class="alert alert-primary d-flex align-items-center" role="alert">
                                <i class="fas fa-info-circle me-2"></i>
                                <div>
                                    Data <strong>Jumlah Dosen</strong> akan dihitung otomatis dari database Data Dosen. <br>
                                    Silakan isi data statistik lainnya di bawah ini secara manual.
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-bold text-primary">Jumlah Mahasiswa Aktif</label>
                                    <div class="input-group">
                                        <input type="text" name="jurusan_student_count" class="form-control" placeholder="Contoh: 1200" value="{{ $settings['jurusan_student_count'] ?? '' }}">
                                        <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-bold text-primary">Jumlah Organisasi</label>
                                    <div class="input-group">
                                        <input type="text" name="jurusan_extracurricular_count" class="form-control" placeholder="Contoh: 25" value="{{ $settings['jurusan_extracurricular_count'] ?? '' }}">
                                        <span class="input-group-text"><i class="fas fa-futbol"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-bold text-primary">Persentase Kelulusan</label>
                                    <div class="input-group">
                                        <input type="text" name="jurusan_graduation_rate" class="form-control" placeholder="Contoh: 100%" value="{{ $settings['jurusan_graduation_rate'] ?? '' }}">
                                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: PROFIL -->
                        <div class="tab-pane fade" id="profil">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Sejarah Jurusan</label>
                                <textarea name="jurusan_history" id="editor_sejarah">{{ $settings['jurusan_history'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Visi</label>
                                <textarea name="jurusan_vision" class="form-control" rows="3">{{ $settings['jurusan_vision'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">Misi</label>
                                <textarea name="jurusan_mission" id="editor_misi">{{ $settings['jurusan_mission'] ?? '' }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor_misi')).catch(error => {
        console.error(error);
    });
    ClassicEditor.create(document.querySelector('#editor_sejarah')).catch(error => {
        console.error(error);
    });
</script>

<style>
    .nav-tabs .nav-link {
        color: #6c757d;
        font-weight: 600;
    }

    .nav-tabs .nav-link.active {
        color: #0d6efd;
        border-bottom: 3px solid #0d6efd;
    }

    .ck-editor__editable_inline {
        min-height: 150px;
    }
</style>
@endsection