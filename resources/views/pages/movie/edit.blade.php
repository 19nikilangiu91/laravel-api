@extends('layouts.main-layout')

@section('content')

<div class="container">
    <h1>Update Movie</h1>
    <form action="{{ route('movie.update', $movie) }}"method="POST">
        @csrf
        <label for="name">Name</label>
        {{-- Inserisco i "value" per visualizzare i dati --}}
        <input type="text" name="name" value="{{$movie -> name}}">
        <br>
        <label for="year">Year</label>
        {{-- Inserisco i "value" per visualizzare i dati --}}
        <input type="number" name="year" value="{{$movie -> year}}">
        <br>
        <label for="cashOut">Cash-Out</label>
        {{-- Inserisco i "value" per visualizzare i dati --}}
        <input type="number" name="cashOut" value="{{$movie -> cashOut}}">
        <br>
        <h3>Genre</h3>
        <select name="genre_id">
            @foreach ($genres as $genre)
            <option value="{{$genre -> id}}" 
                {{-- Creo una condizione per visualizzare il genere selezionato nella select  --}}
                @if ($movie -> genre -> id == $genre -> id)
                    selected
                @endif>
                {{$genre -> name}}
            </option>
            @endforeach
        </select>
        <h3>Tags</h3>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value={{ $tag -> id }}
            {{-- Creo un "foreach" per visualizzare a quale tag appartiene il Movie --}}
            @foreach ($movie -> tags as $tagMovie)
            {{-- Creo una "condizione" per visualizzare i "tag" già inseriti o inserirne nuovi nelle checkbox  --}}
                @if ($tagMovie -> id == $tag -> id)
                checked
                @endif
            @endforeach> 
            <label for="tags">{{ $tag -> name }}</label>
            <br>            
        @endforeach
        <br>
        <input type="submit" value="Update Movie">
    </form>
</div>
@endsection