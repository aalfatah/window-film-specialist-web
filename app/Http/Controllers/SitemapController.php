<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        // Ambil data yang aktif saja
        $services = Service::latest()->get();
        $portfolios = Portfolio::where('is_active', true)->latest()->get();

        // Render ke format XML
        return Response::view('sitemap', [
            'services' => $services,
            'portfolios' => $portfolios,
        ])->header('Content-Type', 'text/xml');
    }
}