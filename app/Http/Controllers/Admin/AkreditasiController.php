<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AkreditasiController extends Controller
{
    // 1. TAMPILKAN TABEL (Halaman Utama)
    public function index()
    {
        $data = Akreditasi::latest()->get(); // Ambil semua data
        return view('admin.akreditasi.index', compact('data'));
    }

    // 2. HALAMAN TAMBAH DATA
    public function create()
    {
        return view('admin.akreditasi.create');
    }

    // 3. PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'peringkat' => 'required',
            'tahun' => 'required',
            'file_sertifikat' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('file_sertifikat')) {
            $nama_file = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path('uploads/akreditasi'), $nama_file);
            $input['file_sertifikat'] = $nama_file;
        }

        Akreditasi::create($input);

        return redirect()->route('admin.akreditasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // 4. HALAMAN EDIT
    public function edit($id)
    {
        $akreditasi = Akreditasi::find($id);
        return view('admin.akreditasi.edit', compact('akreditasi'));
    }

    // 5. PROSES UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'peringkat' => 'required',
            'tahun' => 'required',
        ]);

        $akreditasi = Akreditasi::find($id);
        $input = $request->all();

        if ($image = $request->file('file_sertifikat')) {
            // Hapus file lama
            if ($akreditasi->file_sertifikat && File::exists(public_path('uploads/akreditasi/' . $akreditasi->file_sertifikat))) {
                File::delete(public_path('uploads/akreditasi/' . $akreditasi->file_sertifikat));
            }
            // Upload baru
            $nama_file = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path('uploads/akreditasi'), $nama_file);
            $input['file_sertifikat'] = $nama_file;
        } else {
            unset($input['file_sertifikat']);
        }

        $akreditasi->update($input);

        return redirect()->route('admin.akreditasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 6. PROSES HAPUS (AKSI DELETE)
    public function destroy($id)
    {
        $akreditasi = Akreditasi::find($id);
        
        // Hapus gambarnya juga
        if ($akreditasi->file_sertifikat && File::exists(public_path('uploads/akreditasi/' . $akreditasi->file_sertifikat))) {
            File::delete(public_path('uploads/akreditasi/' . $akreditasi->file_sertifikat));
        }
        
        $akreditasi->delete();

        return redirect()->route('admin.akreditasi.index')->with('success', 'Data berhasil dihapus!');
    }
}