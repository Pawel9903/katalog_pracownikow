@extends('adminlte::page')

@section('content')
    {{ Form::open(array('method'=>'PATH','route'=>'employees.index')) }}

    <div class="form-group">
        {{ Form::label('name', 'Imię:') }}
        {{ Form::text('name', $employee->name, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('surname', 'Nazwisko:') }}
        {{ Form::text('surname', $employee->surname, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Numer telefonu:') }}
        {{ Form::text('phone', $employee->phone, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', $employee->email, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Opis:') }}
        {{ Form::textarea('description', $employee->description, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('sectionList', 'Wybierz dział:') }}
        {{ Form::select('sectionList', ['1' => 'Księgowość', '2'=>'IT' ] , null, ['class'=>'form-control', 'multiple']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop