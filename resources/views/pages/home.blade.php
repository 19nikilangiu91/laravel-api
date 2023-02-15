@extends('layouts.main-layout')

@section('content')

<div class="container">
    <a href="{{ route('movie.create') }}">Create a New Movie</a>
    <h1>Movies</h1>
    @foreach ($genres as $genre)
        <h2 class="d-inline">Genre: {{ $genre -> name }}</h2>
        <ul>
            @foreach ($genre -> movies as $movie)
                <li class="m-3">
                    <div>
                        <h5 class="d-inline">Name: </h5>{{ $movie -> name }}<br>
                        <h5 class="d-inline">Year: </h5>{{ $movie -> year }}<br>
                        <h5 class="d-inline">CashOut: </h5> {{ $movie -> cashOut}} €<br>
                    </div>
                </li>
            @endforeach
        </ul>
        <hr>
    @endforeach
</div>
@endsection