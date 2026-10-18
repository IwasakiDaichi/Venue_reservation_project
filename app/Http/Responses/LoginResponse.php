<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

use Inertia\Inertia;

class LoginResponse implements LoginResponseContract
{
   public function toResponse($request)
    {
        $user = $request->user();

\Log::info('Login role diagnostic', [
    'user_id' => $user?->id,
    'email' => $user?->email,
    'role' => $user?->getRawOriginal('role'),
    'guard' => auth()->getDefaultDriver(),
]);
    
        \Log::info('Custom login response reached', [
            'user_id' => $user?->id,
            'role' => $user?->role,
            'expects_json' => $request->expectsJson(),
            'inertia' => $request->header('X-Inertia'),
        ]);
    
        $path = match ($user?->role) {
            'cpdo'     => '/cpdo/dashboard',
            'student'  => '/student/dashboard',
            'dean'     => '/dean/dashboard',
            'external' => '/external/dashboard',
            default    => abort(403, 'Your account has no valid role.'),
        };
    
       
        \Log::info('Login redirect destination', [
                'path' => $path,
            ]);

            return Inertia::location($path);
    }
}
