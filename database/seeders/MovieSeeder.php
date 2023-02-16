<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importo i model "Genre, Movie, Tag"
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    // Dal model "Movie" richiamiamo la "factory" e tramite il foreach richiamiamo ogni "singolo Movie ($m)"
    public function run()
    {
        Movie::factory()->count(100)->make()->each(function ($m) {

            // Richiamiamo il model "Genre" in ordine casuale e andiamo a prendere il primo elemento casuale. FK
            $genre = Genre::inRandomOrder()->first();

            // Richiamiamo "$m" alla funzione inversa nel Model "Movie" e associamo una singola "Genre ($genre)"
            $m->genre()->associate($genre);

            // Salviamo il nuovo elemento
            $m->save();

            // Andiamo a creare un prodotto casuale e andiamo ad associarla nella Tabella Ponte "movie_tag". N a M
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->get();
            $m->tags()->attach($tags);
        });
    }
}