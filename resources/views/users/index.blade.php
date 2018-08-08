@extends('adminlte::page')


@section('content')

    @if(Session::has('success'))
        <div class="callout callout-success">
            <h4>{{ Session::get('success') }}</h4>
        </div>
    @endif

    <h1>Lista Użytkowników</h1>

    <a class="btn btn-success" href="{{ route('users.create') }}">Dodaj użytkownika</a>

    <div class="">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Użytkownicy:</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>@sortablelink('name', 'Imię')</th>
                        <th>@sortablelink('email', 'Email')</th>
                        <th>@sortablelink('created_at', 'Data dodania')</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->created_at}}</th>
                            <th><a class="label label-success" href="{{ route('users.show', $user) }}">wyświetl</a></th>
                            <th><a class="label label-primary" href="{{ route('users.edit', $user) }}">edytuj</a></th>
                            <th><form action="{{ route('users.destroy', ['user' => $user]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <button type="submit" class="label label-warning">Usuń</button>
                                    </div>
                                </form></th>
                        </tr>
                    @endforeach
                    {!! $users->appends(\Request::except('page'))->render() !!}
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@stop