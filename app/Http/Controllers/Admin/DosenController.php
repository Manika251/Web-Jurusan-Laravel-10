<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        // Ambil data terbaru, 10 per halaman
        $dosens = Dosen::latest()->paginate(10);
        
        // PERBAIKAN: Folder view 'dosen' (bukan admin.dosens)
        return view('admin.dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|numeric',
            'position' => 'required|string',            
            'type' => 'required|in:Dosen,staf',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
        ]);

        // 2. Upload Foto
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('dosens', 'public');
        }

        // 3. Simpan ke Database
        Dosen::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'position' => $request->position,
            'type' => $request->type,
            'photo' => $photoPath,
            'social_links' => [
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin
            ]
        ]);

        // PERBAIKAN: Route pakai 'admin.dosen.index' (tanpa s)
        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            // Tambahkan validasi type disini juga biar aman
            'type' => 'required|in:Dosen,staf',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'position' => $request->position,
            'type' => $request->type,
            'social_links' => [
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin
            ]
        ];

        // Cek jika ada upload foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
                Storage::disk('public')->delete($dosen->photo);
            }
            // Upload foto baru
            $data['photo'] = $request->file('photo')->store('dosens', 'public');
        }

        $dosen->update($data);

        // PERBAIKAN: Route pakai 'admin.dosen.index'
        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        // Hapus file foto fisik
        if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
            Storage::disk('public')->delete($dosen->photo);
        }

        $dosen->delete();
        return redirect()->back()->with('success', 'Data Dosen berhasil dihapus.');
    }
}