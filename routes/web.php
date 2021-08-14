<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/show/{slug}', [HomeController::class, 'showPostDetail'])->name('show-post-detail');
});

Route::get('/dashboard', [BackController::class, 'index'])->name('dashboard');
