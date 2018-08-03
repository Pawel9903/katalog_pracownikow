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
    {{ Form::open(['route'=>'users.index', 'files' => true]) }}

    <div class="form-group">
        {{ Form::label('name', 'Imię:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Hasło:') }}
        {{ Form::password('password', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('admin', 'Wybierz role:') }}
        {{ Form::select('admin', [1=>'admin' , 0=>'user'] , null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Dodaj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop