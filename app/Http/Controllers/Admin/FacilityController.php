<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    // 1. INDEX: Menampilkan daftar data
    public function index()
    {
        $facilities = Facility::latest()->paginate(5);
        return view('admin.facilities.index', compact('facilities'));
    }

    // 2. STORE: Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048', // Foto Wajib saat create
            'description' => 'nullable'
        ]);

        // Upload gambar baru
        $path = $request->file('image')->store('facilities', 'public');

        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    // 3. EDIT: Menampilkan form edit (YANG BARU DITAMBAHKAN)
    public function edit($id)
    {
        // Cari data berdasarkan ID, jika tidak ada tampilkan error 404
        $facility = Facility::findOrFail($id);
        
        // Arahkan ke file edit.blade.php
        return view('admin.facilities.edit', compact('facility'));
    }

    // 4. UPDATE: Menyimpan perubahan (YANG BARU DITAMBAHKAN)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048', // Foto BOLEH KOSONG saat update
            'description' => 'nullable'
        ]);

        $facility = Facility::findOrFail($id);

        // Siapkan data yang akan diupdate
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // LOGIKA GANTI FOTO:
        // Cek apakah user mengupload file gambar baru?
        if ($request->hasFile('image')) {
            
            // 1. Hapus foto lama jika ada
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }

            // 2. Upload foto baru
            $path = $request->file('image')->store('facilities', 'public');
            
            // 3. Masukkan path foto baru ke array data
            $data['image'] = $path;
        }

        // Update database
        $facility->update($data);

        // Kembali ke halaman index (tabel)
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    // 5. DESTROY: Menghapus data
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        // Hapus file fisik gambar
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        // Hapus data di database
        $facility->delete();

        return back()->with('success', 'Fasilitas dihapus.');
    }
}