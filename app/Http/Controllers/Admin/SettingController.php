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
        // DAFTAR SEMUA KUNCI FILE YANG BISA DIUPLOAD
        $files = [
            'jurusan_principal_photo',
            'jurusan_hero_image',
            'jurusan_hero_image_2', // Tambahan Baru
            'jurusan_hero_image_3', // Tambahan Baru
            'jurusan_structure_image'
        ];

        // 1. Loop untuk handle upload file
        foreach ($files as $fileKey) {
            if ($request->hasFile($fileKey)) {
                $path = $request->file($fileKey)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $fileKey], ['value' => $path]);
            }
        }

        // 2. Handle Data Teks (kecuali file & token)
        $data = $request->except(array_merge(['_token', '_method'], $files));

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
