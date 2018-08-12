@extends('adminlte::page')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nowy pracownik</h3>
        </div>
        <div class="box-body">
            {{ Form::open(['route'=>'employees.index', 'files' => true]) }}

            <div class="form-group">
                {{ Form::label('name', 'Imię:') }}
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder' => "Imię"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('surname', 'Nazwisko:') }}
                {{ Form::text('surname', null, ['class'=>'form-control', 'placeholder' => "Nazwisko"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('phone', 'Numer telefonu:') }}
                {{ Form::text('phone', null, ['class'=>'form-control', 'placeholder' => "Telefon"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class'=>'form-control', 'placeholder' => "Email"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Opis:') }}
                {{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder' => "Opis"]) }}
            </div>

            <div class="form-group">
                {{Form::label('imgUrl', 'Dodaj zdjęcie',['class' => 'control-label'])}}
                {{ Form::file('imgUrl') }}
            </div>

            <div class="form-group">
                {{ Form::label('departmentsList', 'Wybierz dział(y):') }}
                {{ Form::select('departmentsList[]', $departments , null, ['class'=>'form-control', 'multiple']) }}
            </div>
        </div>

            <div class="form-group">
                {{ Form::submit('Dodaj',['class'=>'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
    </div>

@stop