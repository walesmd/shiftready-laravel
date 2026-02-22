<?php

use App\Http\Controllers\PlacesController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,1')->prefix('api/places')->group(function () {
    Route::get('autocomplete', [PlacesController::class, 'autocomplete']);
});

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/terms', 'terms')->name('terms');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
