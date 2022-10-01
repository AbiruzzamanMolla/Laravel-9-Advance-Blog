<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
require __DIR__.'/website.php';