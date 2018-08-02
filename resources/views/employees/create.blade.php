@extends('adminlte::page')

@section('content')
    {{ Form::open(array('route'=>'employees.index')) }}

    <div class="form-group">
        {{ Form::label('name', 'Imię:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('surname', 'Nazwisko:') }}
        {{ Form::text('surname', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Numer telefonu:') }}
        {{ Form::text('phone', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Opis:') }}
        {{ Form::textarea('description', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('sectionList', 'Wybierz dział(y):') }}
        {{ Form::select('departmentsList[]', $departments , null, ['class'=>'form-control', 'multiple']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Dodaj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop