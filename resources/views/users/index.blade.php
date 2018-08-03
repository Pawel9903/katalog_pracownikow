@extends('adminlte::page')


@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
   <table class="table table-striped">
       <thead>
            <tr>
                <th>Login</th>
                <th>Hasło</th>
                <th>Email</th>
            </tr>
       </thead>
            @foreach($users as $user)
                <tr>
                    <th>{{$user->name}}</th>
                    <th>{{$user->password}}</th>
                    <th>{{$user->email}}</th>
                    <th><a href="{{ route('users.show', $user->id) }}">wyświetl</a></th>
                    <th><a href="{{ route('users.edit', $user->id) }}">edytuj</a></th>
                    @if($user->admin != 1)
                    <th><form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                        @endif
                </tr>
            @endforeach
       <tbody>

       </tbody>
   </table>
@stop