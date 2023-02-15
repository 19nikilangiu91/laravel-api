<li class="m-3">
    <div>
        <h5 class="d-inline">Name: </h5>{{ $movie -> name }}<br>
        <h5 class="d-inline">Year: </h5>{{ $movie -> year }}<br>
        <h5 class="d-inline">CashOut: </h5> {{ $movie -> cashOut}} €<br>
    </div>
    <a href="{{ route('movie.delete', $movie) }}">Delete</a> - 
    <a href="{{ route('movie.edit', $movie) }}">Edit</a>
</li>