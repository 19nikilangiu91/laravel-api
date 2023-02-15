@extends('layouts.main-layout')

@section('content')

<div class="container">
    <h1>Create New Movie</h1>
    <form method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="year">Year</label>
        <input type="date" name="year">
        <br>
        <label for="cashOut">Cash-Out</label>
        <input type="number" name="cashOut">
        <br>
        <input type="submit" value="Create New Movie">
    </form>
</div>
@endsection