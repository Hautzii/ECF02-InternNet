<?php

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/jobOffers', [JobOfferController::class, 'index'])->name('jobOffers.index');
Route::get('/jobOffers/job/{id}', [JobOfferController::class, 'show'])->name('jobOffers.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jobOffers/create', [JobOfferController::class, 'create'])->name('jobOffers.create');
    Route::post('/jobOffers', [JobOfferController::class, 'store'])->name('jobOffers.store');
    Route::get('/jobOffers/{id}/edit', [JobOfferController::class, 'edit'])->name('jobOffers.edit');
    Route::patch('/jobOffers/{id}', [JobOfferController::class, 'update'])->name('jobOffers.update');
    Route::delete('/jobOffers/{id}', [JobOfferController::class, 'destroy'])->name('jobOffers.destroy');
});

require __DIR__.'/auth.php';
