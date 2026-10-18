<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CpdoDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');

Route::middleware(['auth', 'verified'])->group(function () {

    // Default dashboard
   // Redirect users according to their role
Route::get('/dashboard', function () {
    $user = auth()->user();

    return match ($user->role) {
        'cpdo'     => redirect()->route('cpdo.dashboard'),
        'student'  => redirect()->route('student.dashboard'),
        'dean'     => redirect()->route('dean.dashboard'),
        'external' => redirect()->route('external.dashboard'),
        default    => abort(403, 'Your account has no valid role.'),
    };
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

    // CPDO dashboard — CPDO accounts only
    Route::get('/cpdo/dashboard', [CpdoDashboardController::class, 'index'])
        ->middleware('role:cpdo')
        ->name('cpdo.dashboard');
    
    
});

Route::get('/debug-login-response', function () {
    return response()->json([
        'login_response' => get_class(
            app(\Laravel\Fortify\Contracts\LoginResponse::class)
        ),
    ]);
});


require __DIR__.'/settings.php';