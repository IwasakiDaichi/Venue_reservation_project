<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StudentDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    // Default dashboard
   // Redirect the default dashboard to the student dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // Student dashboard
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard');

    // Reservation form
    Route::get('/reservation/create', function () {
        return view('Reservation/reservationCreate');
    })->name('reservation.create');

    Route::post('/reservation', [ReservationController::class, 'store'])
        ->name('reservation.store');
});

Route::get('/debug-login-response', function () {
    return response()->json([
        'login_response' => get_class(
            app(\Laravel\Fortify\Contracts\LoginResponse::class)
        ),
    ]);
});

require __DIR__.'/settings.php';