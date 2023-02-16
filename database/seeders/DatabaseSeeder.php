<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // Ricordarmi l'ordine di richiamo dei Seeder (GenreSeeder FK, TagSeeder N a M, MovieSeeder)
            GenreSeeder::class,
            TagSeeder::class,
            MovieSeeder::class,
        ]);
    }
}