@extends('adminlte::page')


@section('content')

    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">Nazwa działu: {{ $department->name }}</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">Opis działu: {{ $department->description }}</div>
        </div>
    </div>

    <a class="btn btn-primary" href="{{ route('departments.pdf', ['department'=>$department]) }}">Generuj PDF</a>

    <h4>Pracownicy działu:</h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Data dołączeniaa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($department->employees as $employee)
            <tr>
                <th>{{$employee->name}}</th>
                <th>{{$employee->surname}}</th>
                <th>{{$employee->phone}}</th>
                <th>{{$employee->email}}</th>
                <th>{{$employee->created_at}}</th>
                <th><a class="btn btn-success" href="{{ route('employees.show', $employee) }}">wyświetl</a></th>
                <th><a class="btn btn-primary" href="{{ route('employees.edit', $employee) }}">edytuj</a></th>
                <th><form action="{{ route('employees.destroy', $employee) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </div>
                    </form></th>
            </tr>
        @endforeach

        </tbody>
    </table>

    <h3>Dodaj pracownika działu</h3>

    {{ Form::model($department,['method'=>'GET','action'=>['DepartmentController@addEmployees', $department]]) }}


    <div class="form-group">
        {{ Form::label('employeesList', 'Wybierz pracownika:') }}
        {{ Form::select('employeesList', $employees , null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Dodaj pracownika',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

@stop