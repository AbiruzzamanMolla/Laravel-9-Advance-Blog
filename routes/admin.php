<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth','is_admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    // admin profile routes
    Route::controller(AdminController::class)->prefix('profile')->as('profile.')->group(function () {
        Route::get('', 'profile')->name('index');
        Route::get('/edit', 'editProfile')->name('edit');
        Route::put('/update', 'updateProfile')->name('update');
    });
});