<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    // Menampilkan daftar organisasi
    public function index()
    {
        $organizations = Organization::latest()->paginate(10);
        return view('admin.organizations.index', compact('organizations'));
    }

    // Menyimpan organisasi baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
            // description sebaiknya divalidasi juga (nullable jika boleh kosong)
            'description' => 'nullable|string', 
        ]);

        $path = $request->file('image')->store('organizations', 'public');

        Organization::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Organisasi berhasil ditambahkan!');
    }

    // [BARU] Menampilkan Form Edit
    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        
        // Pastikan kamu nanti membuat file view: admin/organizations/edit.blade.php
        return view('admin.organizations.edit', compact('organization'));
    }

    // [BARU] Menyimpan Perubahan (Update)
    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048', // Gambar jadi nullable (tidak wajib diganti)
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Cek apakah user mengupload logo baru?
        if ($request->hasFile('image')) {
            // Hapus logo lama jika ada
            if ($organization->image && Storage::disk('public')->exists($organization->image)) {
                Storage::disk('public')->delete($organization->image);
            }
            // Simpan logo baru
            $data['image'] = $request->file('image')->store('organizations', 'public');
        }

        $organization->update($data);

        return redirect()->route('admin.organizations.index')->with('success', 'Data organisasi berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy(Organization $organization)
    {
        if ($organization->image && Storage::disk('public')->exists($organization->image)) {
            Storage::disk('public')->delete($organization->image);
        }
        $organization->delete();
        return back()->with('success', 'Data dihapus.');
    }
}