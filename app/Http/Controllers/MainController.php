<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importo il model "Genre"
use App\Models\Genre;

// Importo il model "Movie"
use App\Models\Movie;

// Importo il model "Tag"
use App\Models\Tag;

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
        // Creo $genres all'interno della funzione per crearmi i Generi
        $genres = Genre::all();
        // Creo $tags all'interno della funzione per crearmi i Tag
        $tags = Tag::all();

        return view('pages.movie.create', compact('genres', "tags"));
    }

    // Store Movie Route
    public function movieStore(Request $request)
    {
        // Prova di ricezione dati al submit "Create New Movie"
        // $data = $request->all();
        // dd($data);

        // Convalido i dati
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'year' => 'required|integer',
            'cashOut' => 'required|integer',
            // Inserisco il "genre_id"
            'genre_id' => 'required|integer',
            // Inserisco il "tags"
            'tags' => 'required|array',

        ]);

        // dd($data);

        // Creo un nuovo "Movie"
        $movie = Movie::make($data);

        // Recupero "Genre" dal DB (FK)
        $genre = Genre::find($data['genre_id']);
        // Associo l'elemento
        $movie->genre()->associate($genre);
        // Salvo l'elemento in DB
        $movie->save();

        // Recupero "Tag" dal DB (N a M) 
        $tags = Tag::find($data['tags']);
        $movie->tags()->attach($tags);

        return redirect()->route('home');
    }
}