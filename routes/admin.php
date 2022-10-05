<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\WebsiteSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'is_admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    // admin profile routes
    Route::middleware('role:admin')->controller(AdminController::class)->prefix('profile')->as('profile.')->group(function () {
        Route::get('', 'profile')->name('index');
        Route::get('/edit', 'editProfile')->name('edit');
        Route::put('/update', 'updateProfile')->name('update');
        Route::get('/edit/password', 'editProfilePassword')->name('edit.password');
        Route::put('/update/password', 'updateProfilePassword')->name('update.password');
    });
    // post routes
    Route::resource('posts', PostController::class)->scoped([
        'post' => 'slug',
    ]);
    Route::post('/status/toggle', [PostController::class, 'updateStatus'])->name('posts.status');
    // category routes
    Route::resource('categories', CategoryController::class)->scoped([
        'category' => 'slug',
    ])->except('show', 'create');
    // tag routes
    Route::resource('tags', TagController::class)->scoped([
        'tag' => 'slug',
    ])->except('show', 'create');
    // settings routes
    Route::middleware('role:admin')->controller(WebsiteSettingController::class)->prefix('settings')->as('settings.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::put('/website/update', 'updateWebsite')->name('update.website');
        Route::put('/about/update', 'updateAbout')->name('update.about');
        Route::put('/social/update', 'updateSocial')->name('update.social');
    });
    // contact us mails
    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.us')->middleware('role:admin');
});
