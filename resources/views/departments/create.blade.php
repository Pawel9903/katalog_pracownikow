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
            {{ Form::open(['route'=>'departments.index', 'files' => true]) }}

            <div class="form-group">
                {{ Form::label('name', 'Nazwa:') }}
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder' => "Nazwa"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Opis:') }}
                {{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder' => "Opis"]) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Dodaj',['class'=>'btn btn-primary']) }}
            </div>
        </div>
            {{ Form::close() }}
    </div>
@stop