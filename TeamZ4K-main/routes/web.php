<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // <== BARIS BARU: Import Controller
use App\Http\Controllers\OrderController;   // <== BARIS BARU: Import Controller

Route::redirect('/start', '/home');

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/program', function () {
    return view('pages.program'); // Pastikan Anda membuat file program.blade.php
});

Route::get('/our-team', function () {
    return view('pages.team'); // Menggunakan nama file team.blade.php
});

Route::get('/contact-us', function () {
    return view('pages.contact'); // Pastikan Anda membuat file contact.blade.php
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Pastikan Anda membuat admin/dashboard.blade.php
    });
    Route::get('/users', function () {
        return view('admin.users'); // Pastikan Anda membuat admin/users.blade.php
    });
});

Route::fallback(function () {
    return view('404'); // Pastikan Anda membuat file 404.blade.php
});