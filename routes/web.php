<?php

use Illuminate\Support\Facades\Route;

// Importo il "MainController".
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Route
Route::get('/', [MainController::class, 'home'])
    ->name('home');

// Home Movie Route
Route::get('/movie', [MainController::class, 'movie'])
    ->name('home.movie');

// Create Movie Route 
Route::get('/movie/create', [MainController::class, 'movieCreate'])
    ->name('movie.create');

// Store Movie Route
Route::post('/movie/create', [MainController::class, 'movieStore'])
    ->name('movie.store');

// Edit Movie Route
Route::get('/movie/edit/{movie}', [MainController::class, 'movieEdit'])
    ->name('movie.edit');

// Delete Movie Route
Route::get('/movie/delete/{movie}', [MainController::class, 'movieDelete'])
    ->name('movie.delete');