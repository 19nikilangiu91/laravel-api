<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
    ];

    // Dichiaro la relazione diretta tra "Genre" e "Movie"
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}