<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'postLogin'])->name('post-login');

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/show/{slug}', [HomeController::class, 'showPostDetail'])->name('show-post-detail');
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::post('/logout', [BackController::class, 'logout'])->name('logout');
    Route::get('/daftar-artikel', [ArtikelController::class, 'daftarArtikel'])->name('daftar-artikel');
});
