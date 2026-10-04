<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/reservation/create', function () {
    return Inertia::render('Reservation/Create');
});

Route::post('/reservation', [ReservationController::class, 'store']);

require __DIR__.'/settings.php';
