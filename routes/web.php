<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/donation', function () {
    return Inertia::render('Donation');
});

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
});

// Uncomment jika sudah siap mengimplementasi auth
// require __DIR__.'/auth.php';
