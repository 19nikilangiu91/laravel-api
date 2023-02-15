@extends('layouts.main-layout')

@section('content')
     <div class="container">
        <h1>All Movies</h1>
            @foreach ($movies as $movie)
                <li class="m-3">
                    <div>
                        <h5 class="d-inline">Name: </h5>{{ $movie -> name }}<br>
                        <h5 class="d-inline">Year: </h5>{{ $movie -> year }}<br>
                        <h5 class="d-inline">CashOut: </h5> {{ $movie -> cashOut}} €<br>
                    </div>
                </li>
            @endforeach
     </div>
@endsection