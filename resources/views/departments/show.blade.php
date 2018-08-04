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

    <h4>Pracownicy działu</h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Emial</th>
        </tr>
        </thead>
        @foreach($department->employees as $employee)
            <tr>
                <th>{{$employee->name}}</th>
                <th>{{$employee->surname}}</th>
                <th>{{$employee->phone}}</th>
                <th>{{$employee->email}}</th>
                <th><a href="{{ route('employees.show', $employee->id) }}">wyświetl</a></th>
                <th><a href="{{ route('employees.edit', $employee->id) }}">edytuj</a></th>
                <th><form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </div>
                    </form></th>
            </tr>
        @endforeach
        <tbody>

        </tbody>
    </table>
@stop