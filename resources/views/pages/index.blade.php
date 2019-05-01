@extends('layouts.app')

@section('content')
    @if(!Auth::check())
        <div class="jumbotron text-center">
            <h1> Welcome to AnimalAdoptionApp! </h1>
            <p> Find a new freind today </p>
            <p><a class="btn btn-primary btn-lg" href="login" role="button">Login</a> <a class="btn btn-success btn-lg" href="register" role="button">Register</a></p>
        </div>    
    @endif   
        <div>
        </div>
@endsection
