<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan/{slug}', [HomeController::class, 'showService'])->name('service.show');
Route::get('/portofolio', [HomeController::class, 'allPortfolios'])->name('portfolio.index');
Route::get('/portofolio/{slug}', [HomeController::class, 'showPortfolio'])->name('portfolio.show');

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/brand/{id}/{slug?}', [PartnerController::class, 'show'])->name('brand.detail');

Route::get('/contact', [HomeController::class, 'redirect'])
    ->name('whatsapp.redirect')
    ->middleware('throttle:5,1');