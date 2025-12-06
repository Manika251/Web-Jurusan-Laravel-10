<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    // --- BAGIAN ADMIN (JANGAN DIUBAH) ---
    public function index()
    {
        $dosens = Dosen::latest()->paginate(10);
        return view('admin.dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|numeric',
            'position' => 'required|string',            
            'type' => 'required|in:Dosen,staf',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('dosens', 'public');
        }

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

        if ($request->hasFile('photo')) {
            if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
                Storage::disk('public')->delete($dosen->photo);
            }
            $data['photo'] = $request->file('photo')->store('dosens', 'public');
        }

        $dosen->update($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Dosen $dosen)
    {
        if ($dosen->photo && Storage::disk('public')->exists($dosen->photo)) {
            Storage::disk('public')->delete($dosen->photo);
        }

        $dosen->delete();
        return redirect()->back()->with('success', 'Data Dosen berhasil dihapus.');
    }

    // --- BAGIAN KHUSUS HALAMAN DEPAN (PUBLIC) ---
    public function tampilPublic()
    {
        // 1. PIMPINAN (Kajur, Sekjur, Kaprodi)
        $pimpinan = Dosen::whereIn('position', ['Ketua Jurusan', 'Sekretaris Jurusan', 'Ketua Program Studi'])
                         ->get();

        // 2. DOSEN BIASA (Type Dosen, tapi bukan Pimpinan)
        $dosen = Dosen::where('type', 'Dosen')
                      ->whereNotIn('position', ['Ketua Jurusan', 'Sekretaris Jurusan', 'Ketua Program Studi'])
                      ->get();

        // 3. STAF
        $staf = Dosen::where('type', 'staf')->get();

        // PERBAIKAN DI SINI: Mengarah ke folder 'frontend' lalu file 'dosen'
        return view('frontend.dosen', compact('pimpinan', 'dosen', 'staf'));
    }
}