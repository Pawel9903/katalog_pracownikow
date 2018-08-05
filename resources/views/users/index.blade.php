@extends('adminlte::page')


@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
   <table class="table table-striped">
       <thead>
            <tr>
                <th>@sortablelink('name', 'Imię')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('created_at', 'Data dodania')</th>
            </tr>
       </thead>
       <tbody>

       @foreach($users as $user)
                <tr>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->created_at}}</th>
                    <th><a class="btn btn-success" href="{{ route('users.show', $user->id) }}">wyświetl</a></th>
                    <th><a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">edytuj</a></th>
                    @if($user->admin != 1)
                    <th><form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                        @else
                        <th></th>
                        @endif
                </tr>
            @endforeach
       {!! $users->appends(\Request::except('page'))->render() !!}
       </tbody>
   </table>
@stop