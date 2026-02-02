<?php

namespace App\Http\Controllers;

use App\Models\Partner;
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

        $experience = date('Y') - 2021;

        $partners = Partner::where('is_active', true)->get();

        return view('home', compact('services', 'portfolios', 'settings', 'partners', 'experience'));
    }

    public function showService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $settings = Setting::pluck('value', 'key')->toArray();

        $relatedPortfolios = Portfolio::where('service_id', $service->id)
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        return view('service.services-detail', compact('service', 'settings', 'relatedPortfolios'));
    }

    public function allPortfolios()
    {
        $portfolios = Portfolio::with('service')
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        $settings = Setting::pluck('value', 'key')->toArray();

        return view('portfolio.all-portfolios', compact('portfolios', 'settings'));
    }

    public function showPortfolio($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        $portfolio = Portfolio::with('service')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $otherPortfolios = Portfolio::where('id', '!=', $portfolio->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('portfolio.portfolio-detail', compact('portfolio', 'otherPortfolios', 'settings'));
    }

    public function redirect() {
        $settings = Setting::pluck('value', 'key');
        $phoneNumber = $settings['whatsapp_number'] ?? '628123456789';
        
        return redirect()->to('https://wa.me/' . $phoneNumber);
    }
}
