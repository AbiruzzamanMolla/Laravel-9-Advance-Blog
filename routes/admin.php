<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth','is_admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'ok admin!';
    })->name('dashboard');
});