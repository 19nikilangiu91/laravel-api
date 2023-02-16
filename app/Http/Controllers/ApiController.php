<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo il model "Movie"
use App\Models\Movie;

class ApiController extends Controller
{
    // Test Api Route
    public function test()
    {
        return response()->json([
            'data' => 'test'
        ]);
    }

    // Movie Api Route
    public function movieAll()
    {
        $movies = Movie::all();

        return response()->json([
            'success' => true,
            // Cambio il nome dell'array Json
            'movies' => $movies
        ]);
    }
}