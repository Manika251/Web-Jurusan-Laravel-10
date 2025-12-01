<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View; // Tambah ini
use App\Models\Setting; // Tambah ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Trik agar data Setting bisa dipanggil di SEMUA file Blade dengan nama variable $web_config
        try {
            $settings = Setting::all()->pluck('value', 'key');
            View::share('web_config', $settings);
        } catch (\Exception $e) {
            // Biar ga error kalau belum migrate database
        }
    }
}
