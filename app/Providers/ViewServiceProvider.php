<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Partner;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        View::composer('layouts.app', function ($view) {
            $view->with('navServices', Service::where('is_featured', true)->get());
            $view->with('navPartners', Partner::all());
        });
    }
}