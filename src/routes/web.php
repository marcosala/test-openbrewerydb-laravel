<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreweryController;

Route::middleware('auth')->group(function () {
    Route::get('/', [BreweryController::class, 'index'])->name('breweries.index');
    Route::get('/breweries', [BreweryController::class, 'index'])->name('breweries.index');
});

require __DIR__.'/auth.php';
