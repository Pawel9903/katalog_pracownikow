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
    {{ Form::open(['route'=>'departments.index', 'files' => true]) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Opis:') }}
        {{ Form::textarea('description', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Dodaj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop