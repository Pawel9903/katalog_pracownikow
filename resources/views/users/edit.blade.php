@extends('adminlte::page')

@section('content')

    <h1>Edytuj użytkownika</h1>

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
            {{ Form::model($user,['method'=>'PATCH','action'=>['UserController@update', $user]]) }}

            <div class="form-group">
                {{ Form::label('name', 'Imię:') }}
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder' => "Imię"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Nowe hasło:') }}
                {{ Form::password('password', ['class'=>'form-control', 'placeholder' => "Hasło"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Powtórz hasło:') }}
                {{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => "Powtórz hasło"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class'=>'form-control', 'placeholder' => "Email"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('role_id', 'Wybierz role:') }}
                {{ Form::select('role_id', [1 => 'admin' , 2 => 'user'] , null, ['class'=>'form-control']) }}
            </div>
        </div>
            <div class="form-group">
                {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
          </div>
@stop