<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function academic()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.academic', compact('settings'));
    }

    public function update(Request $request)
    {
        // === VALIDASI KHUSUS FOTO ===
        $request->validate([
            // Semua harus berupa IMAGE (Foto), maksimal 2MB
            'jurusan_principal_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jurusan_hero_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jurusan_hero_image_2'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jurusan_hero_image_3'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // List key file
        $files = [
            'jurusan_principal_photo',
            'jurusan_hero_image',
            'jurusan_hero_image_2',
            'jurusan_hero_image_3',
            'jurusan_structure_image'
        ];

        // 1. Simpan File jika ada upload baru
        foreach ($files as $fileKey) {
            if ($request->hasFile($fileKey)) {
                $path = $request->file($fileKey)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $fileKey], ['value' => $path]);
            }
        }

        // 2. Simpan Data Teks
        $data = $request->except(array_merge(['_token', '_method'], $files));

        foreach ($data as $key => $value) {
            if ($value !== null) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}