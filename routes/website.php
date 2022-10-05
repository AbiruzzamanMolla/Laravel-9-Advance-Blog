<?php

use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Frontend\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::get('/post/{slug}', [WebsiteController::class, 'postDetails'])->name('post.details');
    Route::get('/about', [WebsiteController::class, 'about'])->name('about');
    Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
    Route::get('/posts/{type}/{search}', [WebsiteController::class, 'searchPosts'])->name('search.post');
    Route::get('/posts', [WebsiteController::class, 'searchKeywordPosts'])->name('search.keyword.post');
    Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
});