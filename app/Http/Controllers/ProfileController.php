<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . ($user->student->id ?? ''),
            'phone_number' => 'required|string|max:20',
        ];

        // Add student-specific rules
        if ($user->role === 'student') {
            $rules = array_merge($rules, [
                'university_name' => 'required|string|max:255',
                'faculty' => 'required|string|max:255',
                'major' => 'required|string|max:255',
            ]);
        }

        $validated = $request->validate($rules);

        if ($user->role === 'student') {
            $user->student->update($validated);
        } else {
            $user->admin->update($validated);
        }

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
