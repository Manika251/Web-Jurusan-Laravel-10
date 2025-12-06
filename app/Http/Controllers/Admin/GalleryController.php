<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        // Menampilkan data terbaru, dipagination 12 per halaman
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:draft,published', // Validasi status
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'status' => $request->status, // Menyimpan status yang dipilih
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    // Fungsi baru untuk menampilkan form Edit
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    // Fungsi baru untuk menyimpan perubahan (Update)
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image boleh kosong saat edit
        ]);

        // Siapkan data yang akan diupdate
        $data = [
            'title' => $request->title,
            'caption' => $request->caption,
            'status' => $request->status,
        ];

        // Cek apakah user mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari penyimpanan
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        // Lakukan update ke database
        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'Foto dihapus.');
    }
}