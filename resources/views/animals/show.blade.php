@extends('layouts.app')

@section('content')
    <h1>{{$animal->name}}</h1>
    <div>
    <img style="width:100%" src='/UNIVERSITY/AnimalAdoptonApp/public/storage/animal_images/{{$animal->img_url}}' >
        {{$animal->about}}
    </div>
    <hr>
    <small>Added On {{$animal->created_at}}</small>

    <hr>
    @if(!Auth::guest())
    <div class='container'>
        <div class='row' align='center'>
        <div class='col-sm-4'> <a href="/UNIVERSITY/AnimalAdoptonApp/public/adoptions/store/{{$animal->id}}" class="btn btn-success">Request!</a> </div>

        @if(Auth::user()->access_level > 0) 
            <div class='col-sm-4'> <a href="/UNIVERSITY/AnimalAdoptonApp/public/animals/{{$animal->id}}/edit" class="btn btn-default">Edit</a> </div>

            {!!Form::open(['action' => ['AnimalsController@destroy', $animal->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                <div class='col-sm-4'> {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} </div>
            {!!Form::close()!!}
        @endif
        </div>
    </div>
    @endif
@endsection