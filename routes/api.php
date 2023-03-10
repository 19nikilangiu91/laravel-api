<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importo il "ApiController
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Test Api Route
Route::get('/v1/test', [ApiController::class, 'test']);

// All Api Movie Route
Route::get('/v1/movie/all', [ApiController::class, 'getAllMovies']);

// Create Api Movie Store
Route::post('/v1/movie/store', [ApiController::class, 'movieStore']);

// Update Api Movie
Route::post('/v1/movie/update/{movie}', [ApiController::class, 'movieUpdate']);

// Delete Api Movie
Route::delete('/v1/movie/delete/{movie}', [ApiController::class, 'movieDelete']);