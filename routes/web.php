<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// DESTINATIONS — BERSIH & BENAR
Route::resource('destinations', DestinationController::class);

// GUIDES
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/{id}', [GuideController::class, 'show'])->name('guides.show');
