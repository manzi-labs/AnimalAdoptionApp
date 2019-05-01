@extends('layouts.app')
<?php 
use App\AdoptionReq;
use App\Animal;
use App\User;
?>
@section('content')
<h1>Adoption Request #{{$request->id}}</h1>

    <div class='row'>
        <div class='col-sm-3'>
            <div>
                <img style="max-width:100%" src='/storage/animal_images/{{Animal::find((int) $request->animal_id)->img_url}}' >
                <hr>
                {{Animal::find((int) $request->animal_id)->about}}
            </div>
                <hr>
                <small>Added On {{Animal::find((int) $request->animal_id)->created_at}}</small>
                <hr>
            </div>
        <div class='col-sm-9' style="text-align:center">
        <h3>{{User::find((int) $request->user_id)->name}}s request to adopt {{ Animal::find((int) $request->animal_id)->name }}</h3>
            <hr>
            {!! Form::open(['action' => ['AdoptionReqsController@update', $request->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::select('status', [1 => 'Grant Request', 2 => 'Deny Request', 0 => '...'], $request->status, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
        </div>
        <div class='container'>
                
    </div>
@endsection