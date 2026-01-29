<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan/{slug}', [HomeController::class, 'showService'])->name('service.show');
Route::get('/portofolio', [HomeController::class, 'allPortfolios'])->name('portfolio.index');
