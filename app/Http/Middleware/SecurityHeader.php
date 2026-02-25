<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SecurityHeader
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // 1. Security Headers Standar
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=(), autoplay=(self)');

        // Hanya cache halaman publik (bukan admin/auth)
        if (!$request->is('fjfilm-portal*') && !$request->user()) {
            $response->headers->set('X-LiteSpeed-Cache-Control', 'public,max-age=3600');
        } else {
            $response->headers->set('X-LiteSpeed-Cache-Control', 'no-cache');
        }
        
        // 2. HSTS - Memaksa browser menggunakan HTTPS selama 1 tahun
        if (App::environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // 3. Konfigurasi Content Security Policy (CSP)
        $allowedScripts = [
            "'self'",
            "'unsafe-inline'",
            "'unsafe-eval'",
            "https://cdn.jsdelivr.net",
            "https://*.googletagmanager.com",
            "https://*.google-analytics.com",
        ];

        $allowedConnect = [
            "'self'",
            "https://*.google-analytics.com",
            "https://*.googletagmanager.com",
        ];

        $allowedImages = [
            "'self'",
            "data:",
            "https:",
            "http:",
            "https://images.unsplash.com",
            "https://ui-avatars.com",
            "https://www.gravatar.com",
        ];
        
        // Tambahan khusus untuk environment lokal (Vite)
        if (App::environment('local', 'testing')) {
            $allowedScripts[] = "http://localhost:5173";
            $allowedScripts[] = "http://127.0.0.1:5173";
            
            $allowedConnect[] = "ws://localhost:5173";
            $allowedConnect[] = "ws://127.0.0.1:5173";
            $allowedConnect[] = "http://localhost:5173";
            $allowedConnect[] = "http://127.0.0.1:5173";
            
            $allowedImages[]  = "http://localhost:5173";
            $allowedImages[]  = "http://127.0.0.1:5173";
        }

        $directives = [
            "default-src 'self'",
            "form-action 'self'",
            "script-src " . implode(' ', array_unique($allowedScripts)),
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            "font-src 'self' data: https://fonts.gstatic.com",
            "img-src " . implode(' ', array_unique($allowedImages)),
            "connect-src " . implode(' ', array_unique($allowedConnect)),
            "frame-src 'self' https://www.youtube.com https://www.google.com",
            "frame-ancestors 'self'", // Menghalangi website di-embed di domain lain
            "object-src 'none'",
            "base-uri 'self'",
            "upgrade-insecure-requests", // Otomatis ubah HTTP ke HTTPS pada aset
        ];

        $response->headers->set('Content-Security-Policy', implode('; ', $directives));

        return $response;
    }
}