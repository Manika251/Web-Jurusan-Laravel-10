<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Dosen; 
use App\Models\Gallery;
use App\Models\Achievement;
use App\Models\Organization;

class HomeController extends Controller
{
    /**
     * Halaman Utama (Beranda)
     */
    public function index()
    {
        // 1. Berita Terbaru (3 item)
        $latest_posts = Post::with('category', 'user')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        // 2. Prestasi Terbaru (3 item)
        $achievements = Achievement::latest()->take(3)->get();

        // 3. Galeri Terbaru (4 item)
        $galleries = Gallery::latest()->take(4)->get();

        // 4. Data Organisasi & Ekskul (Semua)
        $organizations = Organization::all();

        // 5. Statistik Dosen (Hitung Otomatis dari database)
       
        $dosens_count = Dosen::count(); 

        return view('frontend.home', compact(
            'latest_posts',
            'achievements',
            'galleries',
            'organizations',
            'dosens_count' // Kirim variabel baru ini ke view home
        ));
    }

    /**
     * Halaman Profil jurusan (About)
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
    
     */
    // UBAH 3: Ganti nama function jadi 'dosen' (sesuai web.php)
    public function dosen() 
    {
        // Ambil semua dosen, 12 per halaman
        $dosens = Dosen::paginate(12);
        
        // Arahkan ke view frontend.dosen (Pastikan kamu rename file view-nya juga)
        return view('frontend.dosen', compact('dosens'));
    }

    /**
     * Halaman Daftar Berita (Blog)
     */
    public function posts()
    {
        $posts = Post::with('category', 'user')
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        return view('frontend.posts', compact('posts'));
    }

    /**
     * Halaman Detail Berita (Single Post)
     */
    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $post->increment('views_count');

        return view('frontend.post_detail', compact('post'));
    }

    /**
     * Halaman Daftar Prestasi Lengkap
     */
    public function achievements()
    {
        $achievements = Achievement::latest()->paginate(9);
        return view('frontend.achievements', compact('achievements'));
    }

    /**
     * Halaman Daftar Organisasi & Ekskul Lengkap
     */
    public function organizations()
    {
        $organizations = Organization::all();
        return view('frontend.organizations', compact('organizations'));
    }

    /**
     * Halaman Galeri Foto Lengkap
     */
    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('frontend.gallery', compact('galleries'));
    }

    
}