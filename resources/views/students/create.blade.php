@extends('layouts.app')

@section('content')
<h1> Hello </h1> 
@endsection 


@section('main')
<form action="{{ url('/students') }}" method="post">

    <input type="text" name="name" placeholder="name">
    <input type="text" name="age" placeholder="age">
    <input type="text" name="image" placeholder="image">
    <button type="submit">Create</button>
</form>
@endsection
