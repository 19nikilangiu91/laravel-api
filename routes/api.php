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
Route::get('/api/v1/test', [ApiController::class, 'test']);

// All Movie Route
Route::get('/v1/movie/all', [ApiController::class, 'getMovieWTagWGenre']);