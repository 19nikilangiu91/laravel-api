<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo il model "Movie", "Genre", "Tag"
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;


class ApiController extends Controller
{
    // Test Api Route
    public function test()
    {
        return response()->json([
            'data' => 'test'
        ]);
    }

    // All Movie Route
    public function getAllMovies()
    {

        $movies = Movie::with('tags')->get();
        $genres = Genre::all();
        $tags = Tag::all();

        return response()->json([
            'success' => true,
            'response' => [
                'movies' => $movies,
                'genres' => $genres,
                'tags' => $tags,
            ]
        ]);
    }
}