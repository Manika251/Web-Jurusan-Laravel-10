<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->paginate(10);
        return view('admin.organizations.index', compact('organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('organizations', 'public');

        Organization::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'Organisasi berhasil ditambahkan!');
    }

    public function destroy(Organization $organization)
    {
        if ($organization->image) Storage::disk('public')->delete($organization->image);
        $organization->delete();
        return back()->with('success', 'Data dihapus.');
    }
}
