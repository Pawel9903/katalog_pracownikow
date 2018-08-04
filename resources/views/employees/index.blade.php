@extends('adminlte::page')


@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

   <table class="table table-striped">
       <thead>
            <tr>
                <th>@sortablelink('name', 'Imię')</th>
                <th>@sortablelink('surname', 'Nazwisko')</th>
                <th>@sortablelink('phone', 'Tel.')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('created_at', 'Data dodania')</th>
            </tr>
       </thead>
            @foreach($employees as $employee)
                <tr>
                    <th>{{$employee->name}}</th>
                    <th>{{$employee->surname}}</th>
                    <th>{{$employee->phone}}</th>
                    <th>{{$employee->email}}</th>
                    <th>{{$employee->created_at}}</th>
                    <th><a class="btn btn-success" href="{{ route('employees.show', $employee->id) }}">wyświetl</a></th>
                    <th><a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">edytuj</a></th>
                    <th><form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                </tr>
            @endforeach
       {!! $employees->appends(\Request::except('page'))->render() !!}

       <tbody>

       </tbody>
   </table>
@stop