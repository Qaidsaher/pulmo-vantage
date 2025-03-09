<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PredictController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogPostController::class, 'show'])
    ->name('blog.show')
    ->where('id', '[0-9]+');

// Routes for Predictions (Publicly accessible; adjust middleware if needed)
Route::get('/predict/image', function () {
    return view('predicts.predict-image');
})->name('predict.image.show');

Route::get('/predict/manual', function () {
    return view('predicts.predict-manual');
})->name('predict.manual.show');

Route::post('/predict/image', [PredictController::class, 'predictImage'])->name('predict.image');
Route::post('/predict/manual', [PredictController::class, 'predictManual'])->name('predict.manual');

// Authenticated & Verified Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard & Static Pages
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

    // Blog Management using resource routes (create, edit, update, destroy)
    Route::resource('/blog', BlogPostController::class)->only(['create', 'edit', 'update', 'destroy']);

    // Store a comment on a blog post
    Route::post('/blog/{id}/comments', [BlogPostController::class, 'storeComment'])->name('blog.comments.store');
});

// Profile Routes (Require Authentication Only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
