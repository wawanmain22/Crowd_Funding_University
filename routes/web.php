<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public routes
Route::get('/', function () {
    return Inertia::render('Home', [
        'title' => 'Home',
    ]);
})->name('home');

Route::get('/donation', function () {
    return Inertia::render('Donation', [
        'title' => 'Donation',
    ]);
})->name('donation');

Route::get('/about-us', function () {
    return Inertia::render('About', [
        'title' => 'About Us',
    ]);
})->name('about');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return Inertia::render('Auth/Register', [
            'title' => 'Sign Up',
        ]);
    })->name('register');

    Route::get('/login', function () {
        return Inertia::render('Auth/Login', [
            'title' => 'Sign In',
        ]);
    })->name('login');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile routes (accessible by both admin and student)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return Inertia::render('Profile/Show', [
            'title' => 'Profile',
        ]);
    })->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

// Student routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return Inertia::render('Student/Dashboard');
    })->name('student.dashboard');

    // Add other student-specific routes here
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    // Add other admin-specific routes here
});
