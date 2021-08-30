<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MediaController;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'postLogin'])->name('post-login');

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/show/post/{slug}', [HomeController::class, 'showPostDetail'])->name('show-post-detail');
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    
    // Dashboard Route
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // Logout Route
    Route::post('/logout', [BackController::class, 'logout'])->name('logout');

    // Artikel Route
    Route::get('/generate-artikel', [ArtikelController::class, 'generateArtikel'])->name('generate-artikel');

    Route::get('/daftar-artikel', [ArtikelController::class, 'daftarArtikel'])->name('daftar-artikel');
    Route::get('/daftar-artikel-review', [ArtikelController::class, 'daftarArtikelReview'])->name('daftar-artikel-review');

    Route::get('/tambah-artikel', [ArtikelController::class, 'tambahArtikel'])->name('tambah-artikel');
    Route::get('/edit-artikel/{artikel}', [ArtikelController::class, 'editArtikel'])->name('edit-artikel');
    Route::post('/update-artikel/{artikel}', [ArtikelController::class, 'updateArtikel'])->name('update-artikel');
    Route::post('/tambah-artikel', [ArtikelController::class, 'postTambahArtikel'])->name('post-tambah-artikel');
    Route::delete('/delete-artikel/{id}', [ArtikelController::class, 'deleteArtikel'])->name('delete-artikel');

    // Media Route
    Route::get('/gallery', [MediaController::class, 'galleryGambar'])->name('gallery');
});
