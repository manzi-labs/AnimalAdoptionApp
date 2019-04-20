@extends('layouts.app')
<?php
use App\AdoptionReq;
use App\Animal;

?>

@section('content')
<h1>Adoption Requests</h1>
<div class="container">
    <div class='row'>
        <h3>Pending Applications</h3>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 0)
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/UNIVERSITY/AnimalAdoptonApp/public/storage/animal_images/{{Animal::find((int) $request->animal_id)->img_url}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$request->name}}</h5>
                            <p class="card-text">status: {{$request->status}}</p>
                            <small>Added on {{$request->created_at}}</small>
                            <a href="/UNIVERSITY/AnimalAdoptonApp/public/adoptions/{{$request->id}}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class='row'> 
        <h3>Approved Applications</h3>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 1)
                <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="/UNIVERSITY/AnimalAdoptonApp/public/storage/animal_images/{{Animal::find((int) $request->animal_id)->img_url}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$request->name}}</h5>
                                    <p class="card-text">status: {{$request->status}}</p>
                                    <small>Added on {{$request->created_at}}</small>
                                    <a href="/UNIVERSITY/AnimalAdoptonApp/public/adoptions/{{$request->id}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class='row'> 
        <h3>Denied Applications</h3>
        <div class='card-columns'>
            @foreach ($requests as $request)
                @if((int)$request->status == 2)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/UNIVERSITY/AnimalAdoptonApp/public/storage/animal_images/{{Animal::find((int) $request->animal_id)->img_url}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$request->name}}</h5>
                                <p class="card-text">status: {{$request->status}}</p>
                                <small>Added on {{$request->created_at}}</small>
                                <a href="/UNIVERSITY/AnimalAdoptonApp/public/adoptions/{{$request->id}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection