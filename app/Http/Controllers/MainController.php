<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo il model "Genre"
use App\Models\Genre;

// Importo il model "Movie"
use App\Models\Movie;

class MainController extends Controller
{
    // Home Route
    public function home()
    {
        $genres = Genre::all();

        return view('pages.home', compact('genres'));
    }

    // Home Movie Route
    public function movie()
    {
        $movies = Movie::all();

        return view('pages.movie.home', compact('movies'));
    }

    // Create Movie Route
    public function movieCreate()
    {
        return view('pages.movie.create');
    }

    // Store Movie Route
    public function movieStore(Request $request)
    {
        // Prova di ricezione dati al submit "Create New Movie"
        $data = $request->all();

        dd($data);
    }
}