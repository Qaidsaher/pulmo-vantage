<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PredictController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiConfigController;

// Public Routes
Route::get('/', function () {
    return view('index');
});

// Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
// Route::get('/blog/{id}', [BlogPostController::class, 'show'])
//     ->name('blog.show')
//     ->where('id', '[0-9]+');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/api-configs', [ApiConfigController::class, 'index'])->name('admin.api-configs.index');
    Route::get('/admin/api-configs/create', [ApiConfigController::class, 'create'])->name('admin.api-configs.create');
    Route::post('/admin/api-configs', [ApiConfigController::class, 'store'])->name('admin.api-configs.store');
    Route::get('/admin/api-configs/{id}/edit', [ApiConfigController::class, 'edit'])->name('admin.api-configs.edit');
    Route::put('/admin/api-configs/{id}', [ApiConfigController::class, 'update'])->name('admin.api-configs.update');
    Route::delete('/admin/api-configs/{id}', [ApiConfigController::class, 'destroy'])->name('admin.api-configs.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy-policy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/help', function () {
    return view('help');
})->name('help');

// Authenticated & Verified Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard & Static Pages
    Route::get('/index', function () {
        return view('index');
    })->name('index');


    // Blog Management using resource routes (create, edit, update, destroy)
    Route::resource('/blog', BlogPostController::class);

    // Store a comment on a blog post
    Route::post('/blog/{id}/comments', [BlogPostController::class, 'storeComment'])->name('blog.comments.store');
    // Other blog management routes...

    // Route to delete a comment
    Route::delete('/blog/comments/{id}', [BlogPostController::class, 'destroyComment'])->name('blog.comments.destroy');

    // Prediction History Route
    Route::get('/predict/history', [PredictController::class, 'history'])->name('predict.history');
    Route::get('/predict/history/{id}', [PredictController::class, 'show'])->name('predict.history.show');
    // Routes for Predictions (Publicly accessible; adjust middleware if needed)
    Route::get('/predict/image', function () {
        return view('predicts.predict-image');
    })->name('predict.image.show');

    Route::get('/predict/manual', function () {
        return view('predicts.predict-manual');
    })->name('predict.manual.show');
    Route::delete('/predict/{id}', [PredictController::class, 'destroy'])->name('predict.destroy');

    Route::post('/predict/image', [PredictController::class, 'predictImage'])->name('predict.image');
    Route::post('/predict/manual', [PredictController::class, 'predictManual'])->name('predict.manual');
});

// Profile Routes (Require Authentication Only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
