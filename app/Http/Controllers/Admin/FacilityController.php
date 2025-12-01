<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->paginate(5);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('facilities', 'public');

        Facility::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->image) Storage::disk('public')->delete($facility->image);
        $facility->delete();
        return back()->with('success', 'Fasilitas dihapus.');
    }
}
