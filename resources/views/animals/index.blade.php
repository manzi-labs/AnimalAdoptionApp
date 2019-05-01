@extends('layouts.app')

@section('content')
    <h1>Animals</h1>
    
   

{!! Form::open(['method'=>'GET','url'=>'animals','class'=>'navbar-form navbar-left','role'=>'search'])  !!} 
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search">Search</i>
        </button>
    </span>
</div>
{!! Form::close() !!}
    <br>
    <br>
    <div class="container">
    @if(count($animals) > 0)
        <div class='card-columns'>
        @foreach ($animals as $animal)
            @if( (int) $animal->status == 0 | (int) $animal->status == 2)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/animal_images/{{$animal->img_url}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$animal->name}} : {{$animal->species}}</h5>
                        <p class="card-text">{{$animal->about}} Age: {{$animal->age}}</p>
                        <small>Added on {{$animal->created_at}}</small>
                        <a href="/animals/{{$animal->id}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            @endif
        @endforeach
            </div>
    </div>
    @else
        <p>No Animals Found!</p>
    @endif
    </div>
@endsection