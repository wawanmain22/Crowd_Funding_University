<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class StudentAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone_number' => 'required|string|max:20',
            'university_name' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'student_number' => 'required|string|max:255|unique:students',
        ]);

        try {
            DB::beginTransaction();

            // Buat user baru
            $userData = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'student',
                'created_at' => now(),
            ];
            Log::info('Creating user with data:', $userData);

            $user = User::create($userData);
            Log::info('Created user result:', ['user' => $user->toArray()]);

            // Buat data mahasiswa
            $studentData = [
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'university_name' => $request->university_name,
                'faculty' => $request->faculty,
                'major' => $request->major,
                'student_number' => $request->student_number,
                'created_at' => now(),
            ];
            Log::info('Creating student with data:', $studentData);

            $student = Student::create($studentData);
            Log::info('Created student result:', ['student' => $student->toArray()]);

            DB::commit();

            return redirect()->route('login')->with([
                'success' => true,
                'message' => 'Registration successful!',
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Registration error:', ['error' => $e->getMessage()]);

            return back()->withErrors([
                'error' => 'Registration failed. Please try again.',
            ]);
        }
    }
}
