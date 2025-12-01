<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Import Model yang mau dihitung
use App\Models\Post;
use App\Models\Dosen; // UBAH 1: Panggil Model Dosen 
use App\Models\Achievement;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data untuk Widget Statistik
        $counts = [
            'posts' => Post::count(),
            // UBAH 2: Ganti key  jadi 'dosens' 
            'dosens' => Dosen::count(), 
            'achievements' => Achievement::count(),
            'galleries' => Gallery::count(),
        ];

        // Mengambil 5 berita terbaru untuk tabel "Artikel Terbaru"
        $recentPosts = Post::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('counts', 'recentPosts'));
    }
}