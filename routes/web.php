<?php

use App\Http\Controllers\Auth\StudentAuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::post('/register', [StudentAuthController::class, 'register'])->name('register.store');

// ... routes lainnya jika ada ...
