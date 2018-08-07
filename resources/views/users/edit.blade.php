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

    {{ Form::model($user,['method'=>'PATCH','action'=>['UserController@update', $user]]) }}

    <div class="form-group">
        {{ Form::label('name', 'Imię:') }}
        {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'nowe hasło:') }}
        {{ Form::password('password', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('admin', 'Wybierz role:') }}
        {{ Form::select('admin', [1 => 'admin' , 0 => 'user'] , null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop