<?php

use App\Http\Controllers\InternshipOpportunityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/jobOffers', [InternshipOpportunityController::class, 'index'])->name('jobOffers.index');
Route::get('/jobOffers/{id}', [InternshipOpportunityController::class, 'show'])->name('jobOffers.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jobOffers/create', [InternshipOpportunityController::class, 'create'])->name('jobOffers.create');
    Route::post('/jobOffers', [InternshipOpportunityController::class, 'store'])->name('jobOffers.store');
    Route::get('/jobOffers/{id}/edit', [InternshipOpportunityController::class, 'edit'])->name('jobOffers.edit');
    Route::patch('/jobOffers/{id}', [InternshipOpportunityController::class, 'update'])->name('jobOffers.update');
    Route::delete('/jobOffers/{id}', [InternshipOpportunityController::class, 'destroy'])->name('jobOffers.destroy');
});

require __DIR__.'/auth.php';
