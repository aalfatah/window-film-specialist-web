<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_featured', true)->get();
        $settings = Setting::pluck('value', 'key')->toArray();
        $portfolios = Portfolio::with('service')
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        $partners = [
            '3M Auto Film', 'Solar Gard', 'V-Kool', 'LLumar', 'Iceberg', 'Wincos'
        ];

        return view('home', compact('services', 'portfolios', 'settings', 'partners'));
    }
}
