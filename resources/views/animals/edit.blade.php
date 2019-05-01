@extends('layouts.app')
{{-- FORM TO EDIT THE ANIMAL --}}
@section('content')
    <h1>Edit Animal</h1>
    {!! Form::open(['action' => ['AnimalsController@update', $animal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
        <div class="form-group">
            {{Form::label('animal-img', 'Animal Img')}}
            <br>
            {{Form::file('animal-img')}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $animal->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('age', 'Age')}}
            {{Form::text('age', $animal->age, ['class' => 'form-control', 'placeholder' => 'age'])}}
        </div>
        <div class="form-group">
            {{Form::label('about', 'About')}}
            {{Form::textarea('about', $animal->about, ['class' => 'form-control', 'placeholder' => 'about'])}}
        </div>
        <div class="form-group">
            {{Form::label('species', 'Species')}}
            {{Form::text('species', '', ['class' => 'form-control', 'placeholder' => 'species'])}}
        </div>
        <div class="form-group">
                {{Form::label('sex', 'Sex')}}
                {{Form::select('sex', ['M' => 'M', 'F' => 'F'], $animal->sex, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('status', 'Status')}}
                {{Form::select('status', ['1' => 'Adopted', '2' => 'Requested', '0' => 'Null'], $animal->status, ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection