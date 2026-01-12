<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\MatchGameResourceController;

Route::resource('matches', MatchGameResourceController::class);

Route::get('/matches', [MatchGameController::class, 'index'])->name('matches.index');
Route::get('/matches/create', [MatchGameController::class, 'create'])->name('matches.create');
Route::post('/matches', [MatchGameController::class, 'store'])->name('matches.store');
Route::get('/matches/{id}/edit', [MatchGameController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{id}', [MatchGameController::class, 'update'])->name('matches.update');
Route::delete('/matches/{id}', [MatchGameController::class, 'destroy'])->name('matches.destroy');
Route::get('/matches/{id}', [MatchGameController::class, 'show'])->name('matches.show'); // optional

use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\VenueController;

// Teams CRUD
Route::resource('teams', TeamController::class);

// Matches CRUD
Route::resource('matches', MatchController::class);

// Venues CRUD
Route::resource('venues', VenueController::class);

// Restore a soft-deleted team
Route::get('teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');

// Restore a match
Route::get('matches/{id}/restore', [MatchController::class, 'restore'])->name('matches.restore');

// Restore a venue
Route::get('venues/{id}/restore', [VenueController::class, 'restore'])->name('venues.restore');
