<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo il model "Genre"
use App\Models\Genre;

class MainController extends Controller
{
    // Home Route
    public function home()
    {
        $genres = Genre::all();

        return view('pages.home', compact('genres'));
    }
}