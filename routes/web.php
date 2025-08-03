<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolarMonitorController;
use App\Http\Controllers\SitemapController;

Route::get('/', [DolarMonitorController::class, 'dashboard'])->name('dashboard');

Route::prefix('api/monitor')->group(function () {
    Route::get('/cotizaciones', [DolarMonitorController::class, 'cotizaciones'])->name('api.monitor.cotizaciones');
});

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Legal pages
Route::get('/terminos-de-uso', [DolarMonitorController::class, 'terms'])->name('terms');
