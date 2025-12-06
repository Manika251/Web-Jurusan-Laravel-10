@extends('frontend.layouts')
 @section('content')
 @section('title', 'Akreditasi Jurusan')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="text-center mb-5">
                <h2 class="fw-bold">Akreditasi Jurusan</h2>
                <div class="divider mx-auto"></div>
            </div>

            @if($akreditasi)
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            
                            <div class="col-md-6 mb-4 mb-md-0 text-center">
                                @if($akreditasi->file_sertifikat)
                                    <img src="{{ asset('uploads/akreditasi/'.$akreditasi->file_sertifikat) }}" 
                                         alt="Sertifikat Akreditasi" 
                                         class="img-fluid rounded border shadow-sm"
                                         style="max-height: 400px;">
                                @else
                                    <div class="alert alert-secondary">Gambar Sertifikat belum diupload.</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <h3 class="text-primary fw-bold">{{ $akreditasi->judul }}</h3>
                                <hr>
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="30%" class="fw-bold text-muted">Peringkat</td>
                                        <td class="fs-5 fw-bold">: {{ $akreditasi->peringkat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Tahun SK</td>
                                        <td class="fs-5">: {{ $akreditasi->tahun }}</td>
                                    </tr>
                                </table>
                                
                                <div class="mt-3 text-secondary">
                                    {!! nl2br(e($akreditasi->deskripsi)) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>Belum ada data akreditasi.</h4>
                    <p>Admin sedang memperbarui data.</p>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection