@extends('adminlte::page')

@section('content')
    <h1 class="">Lista Pracowników</h1>

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
       <tbody>
       @foreach($employees as $employee)
                <tr>
                    <th>{{$employee->name}}</th>
                    <th>{{$employee->surname}}</th>
                    <th>{{$employee->phone}}</th>
                    <th>{{$employee->email}}</th>
                    <th>{{$employee->created_at}}</th>
                    <th><a class="btn btn-success" href="{{ route('employees.show', $employee) }}">wyświetl</a></th>
                    <th><a class="btn btn-primary" href="{{ route('employees.edit', $employee) }}">edytuj</a></th>
                    <th><form class="" action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                </tr>
            @endforeach
       {!! $employees->appends(\Request::except('page'))->render() !!}
       </tbody>
   </table>
    <a class="btn btn-success deletee" href="{{ route('employees.create') }}">Dodaj pracownika</a>
@stop