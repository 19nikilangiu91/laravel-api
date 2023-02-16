@extends('layouts.main-layout')

@section('content')

<div class="container">
    <h1>Create New Movie</h1>
    <form action="{{route('movie.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        {{-- Inserisco i valori in type come ho dichiarato nel validate --}}
        <input type="text" name="name">
        <br>
        <label for="year">Year</label>
        {{-- Inserisco i valori in type come ho dichiarato nel validate --}}
        <input type="number" name="year">
        <br>
        <label for="cashOut">Cash-Out</label>
        {{-- Inserisco i valori in type come ho dichiarato nel validate --}}
        <input type="number" name="cashOut">
        <br>
        {{-- Creo un foreach per stampare il "Genre" e nella value inserisco la chiave primaria --}}
        <h3>Genre</h3>
        <select name="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre -> id }}">{{ $genre -> name }}</option>    
            @endforeach
        </select>
        <h3>Tags</h3>
        {{-- Creo un foreach per stampare i "tag" e nella value inserisco la chiave primaria --}}
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}" id="{{ $tag -> id}}">
            <label for="{{ $tag -> id}}">{{ $tag -> name }}</label>
            <br>            
        @endforeach
        <br>
        <input type="submit" value="Create New Movie">
    </form>
</div>
@endsection