<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();

        // Accept only Google accounts with verified email addresses.
        $emailVerified = $googleUser->user['email_verified'] ?? false;

        if (
            ! filter_var($googleUser->getEmail(), FILTER_VALIDATE_EMAIL) ||
            ! in_array($emailVerified, [true, 1, '1', 'true'], true)
        ) {
            return $this->popupResponse(
                false,
                'Google sign-in requires a verified email address.'
            );
        }

        // Find an account already linked to this Google identity.
        $user = User::where('google_id', $googleUser->getId())->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return $this->popupResponse(true);
        }

        // Do not automatically link an existing password account.
        $existingUser = User::where(
            'email',
            $googleUser->getEmail()
        )->first();

        if ($existingUser) {
            return $this->popupResponse(
                false,
                'An account with this email already exists. Please sign in using your existing login method.'
            );
        }

        // Assign a role based on the verified email address.
        $email = strtolower($googleUser->getEmail());

        $role = Str::endsWith($email, '@s.ubaguio.edu')
            ? 'student'
            : 'external';

        // Create the account.
        $user = User::create([
            'name' => $googleUser->getName() ?: 'Google User',
            'email' => $email,
            'google_id' => $googleUser->getId(),
            'password' => Str::random(40),
            'email_verified_at' => now(),
            'role' => $role,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return $this->popupResponse(true);
    }

    private function popupResponse(
        bool $success,
        ?string $message = null
    ) {
        return response()->view('auth.google-popup', [
            'success' => $success,
            'message' => $message,
        ]);
    }
}
