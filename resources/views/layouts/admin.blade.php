<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

    <div class="sidebar" style="height: 100vh; overflow-y: auto; position: fixed; top: 0; left: 0; bottom: 0; z-index: 100; width: 250px;"> 
        <div class="sidebar-header">
            <h4>PANEL ADMIN</h4>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>

        <div class="menu-label">Konten Website</div>

        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fas fa-tags me-2"></i> Kategori Berita
        </a>

        <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper me-2"></i> Data Berita
        </a>

        <a href="{{ route('admin.dosen.index') }}" class="{{ request()->routeIs('admin.dosen.*') ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher me-2"></i> Data Dosen
        </a>

        <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
            <i class="fas fa-images me-2"></i> Galeri Foto
        </a>
        <a href="{{ route('admin.achievements.index') }}" class="{{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}">
            <i class="fas fa-trophy me-2"></i> Data Prestasi
        </a>
        <a href="{{ route('admin.organizations.index') }}" class="{{ request()->routeIs('admin.organizations.*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Organisasi 
        </a>
        
        <a href="{{ route('admin.akreditasi.index') }}" class="{{ Request::routeIs('admin.akreditasi.*') ? 'active' : '' }}">
            <i class="fas fa-certificate me-2"></i> Data Akreditasi
        </a>

        <div class="menu-label">Pengaturan</div>
        <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fas fa-jurusan me-2"></i> Identitas Jurusan
        </a>
        <a href="{{ route('admin.facilities.index') }}" class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
            <i class="fas fa-building me-2"></i> Fasilitas  Jurusan
        </a>
        <a href="{{ route('admin.academic.settings') }}" class="{{ request()->routeIs('admin.academic.*') ? 'active' : '' }}">
            <i class="fas fa-book-open me-2"></i> Kurikulum & Struktur
        </a>

        <a href="#">
            <i class="fas fa-users-cog me-2"></i> Manajemen User
        </a>

        <div class="p-3 mt-4 mb-5"> <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 btn-sm">
                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="main-content" style="margin-left: 250px;"> 
        <div class="top-navbar">
            <h5 class="page-title">@yield('title', 'Admin Dashboard')</h5>
            <div class="user-profile">
                <span>Hi, {{ Auth::user()->name }}</span>
                <i class="fas fa-user-circle fa-2x text-secondary"></i>
            </div>
        </div>

        <div class="content-body">
            @yield('content')
        </div>

        <footer class="admin-footer">
            <small>&copy; {{ date('Y') }} Sistem Informasi Jurusan</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>