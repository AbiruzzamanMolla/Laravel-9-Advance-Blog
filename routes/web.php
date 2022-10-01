<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/setroles', function () {
    $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
    auth()->user()->attachRole($role);
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
require __DIR__.'/website.php';