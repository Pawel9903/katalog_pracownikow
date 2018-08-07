@extends('adminlte::page')

@section('content')

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">Imię: {{ $user->name }}</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">Email: {{ $user->email }}</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">Data dodania: {{ $user->created_at }}</div>
        </div>
    </div>
    <div class="container">
        <div class="">
            <form action="{{ route('users.destroy', ['id' => $user]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </div>
            </form>
        </div>
        <a class="btn btn-success" href="{{ route('users.edit', $user) }}">edytuj</a>
    </div>
@stop