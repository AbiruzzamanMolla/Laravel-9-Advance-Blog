<?php

use App\Http\Controllers\Frontend\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::get('/about', [WebsiteController::class, 'about'])->name('about');
    Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
});