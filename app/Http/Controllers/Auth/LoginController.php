<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
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
        // Get the user before logging out
        if ($user = Auth::user()) {
            // Clear remember token using DB facade
            DB::table('users')
                ->where('id', $user->id)
                ->update(['remember_token' => null]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Clear remember me cookie
        if ($request->hasCookie('remember_web_')) {
            Cookie::queue(Cookie::forget('remember_web_'));
        }

        return redirect()->route('home');
    }
}
