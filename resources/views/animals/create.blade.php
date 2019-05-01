@extends('layouts.app')
{{-- FORM TO CREATE ANIMAL --}}
@section('content')
    <h1>Add Animal</h1>
    {!! Form::open(['action' => 'AnimalsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('animal-img', 'Animal Img')}}
            <br>
            {{Form::file('animal-img')}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('age', 'Age')}}
            {{Form::text('age', '', ['class' => 'form-control', 'placeholder' => 'age'])}}
        </div>
        <div class="form-group">
            {{Form::label('about', 'About')}}
            {{Form::textarea('about', '', ['class' => 'form-control', 'placeholder' => 'about'])}}
        </div>
        <div class="form-group">
            {{Form::label('species', 'Species')}}
            {{Form::text('species', '', ['class' => 'form-control', 'placeholder' => 'species'])}}
        </div>
        <div class="form-group">
                {{Form::label('sex', 'Sex')}}
                {{Form::select('sex', ['M' => 'M', 'F' => 'F'], '', ['class' => 'form-control', 'placeholder' => '...'])}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection