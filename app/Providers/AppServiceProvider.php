<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // if (str_contains(request()->getHost(), 'ngrok-free.dev')) {
        //     URL::forceScheme('https');
        // }
        // if (str_contains(Config::get('app.url'), 'ngrok-free') || Request::header('X-Forwarded-Proto') === 'https') {
        //     URL::forceScheme('https');
        // }

        //production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 1. Cek koneksi & tabel agar tidak crash saat migration/CLI
        if (!app()->runningInConsole() && Schema::hasTable('settings')) {
            
            // Ganti '*' dengan 'layouts.app' jika hanya butuh di layout utama
            View::composer('*', function ($view) {
                
                $expiration = now()->addDay();

                $settings = Cache::remember('site_settings', $expiration, function () {
                    return Setting::pluck('value', 'key')->toArray();
                });

                $navServices = Cache::remember('nav_services', $expiration, function () {
                    return Service::where('is_featured', true)->get();
                });

                $navPartners = Cache::remember('nav_partners', $expiration, function () {
                    return Partner::where('is_active', true)->get();
                });

                $navCategories = Cache::remember('nav_categories', $expiration, function () {
                    return Category::with(['services' => function($query) {
                        // Di sini kita hapus where('is_active', true) yang bikin error
                        $query->orderBy('name', 'asc'); 
                    }])->has('services')->get();
                });

                $view->with([
                    'settings'      => $settings,
                    'navServices'   => $navServices,
                    'navPartners'   => $navPartners,
                    'navCategories' => $navCategories
                ]);
            });
        }
    }
}