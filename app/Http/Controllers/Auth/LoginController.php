<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('username', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        $request->session()->regenerate();

        return redirect()->intended(
            $user->role === 'admin' ? '/admin/dashboard' : '/student/dashboard'
        );
    }

    public function logout(Request $request)
    {
        // Get user ID before logout
        $userId = Auth::id();

        // First, perform logout
        Auth::logout();

        // Second, invalidate the session
        $request->session()->invalidate();

        // Third, regenerate token
        $request->session()->regenerateToken();

        // Clear remember token if we had a user
        if ($userId) {
            User::where('id', $userId)->update(['remember_token' => null]);
        }

        // Clear remember me cookie
        if ($request->hasCookie('remember_web_')) {
            Cookie::queue(Cookie::forget('remember_web_'));
        }

        return redirect()->route('home');
    }
}
