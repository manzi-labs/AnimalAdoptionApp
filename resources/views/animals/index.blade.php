@extends('layouts.app')

@section('content')
    <h1>Animals</h1>
    <div class="container">
    @if(count($animals) > 0)
        <div class='card-columns'>
        @foreach ($animals as $animal)
            @if( (int) $animal->status == 0 | (int) $animal->status == 2)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/animal_images/{{$animal->img_url}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$animal->name}}</h5>
                        <p class="card-text">{{$animal->about}}</p>
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