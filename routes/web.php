<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::resource('destinations', DestinationController::class);

Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/{id}', [GuideController::class, 'show'])->name('guides.show');

Route::view('/profil-jejaklangkah','pages.profil');
Route::view('/galeri-jejaklangkah','pages.galeri');
Route::view('/kontak-jejaklangkah','pages.kontak');
