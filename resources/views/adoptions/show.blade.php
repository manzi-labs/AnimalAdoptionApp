@extends('layouts.app')
<?php 
use App\AdoptionReq;
use App\Animal;
?>
@section('content')
    <h1>{{Animal::find((int) $request->animal_id)->name}}</h1>
    <div>
    <img style="width:100%" src='/storage/animal_images/{{Animal::find((int) $request->animal_id)->img_url}}' >
        {{Animal::find((int) $request->animal_id)->about}}
    </div>
    <hr>
    <small>Added On {{Animal::find((int) $request->animal_id)->created_at}}</small>

    <hr>
    <div class='container'>
        <div class='row'>
        <a href="" class="btn btn-success">Request!</a>
        </div>
    </div>
@endsection