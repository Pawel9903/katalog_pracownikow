@extends('adminlte::page')


@section('content')

    <div class="">

        <div class="">
            <h1 class="text-center">Panel działu</h1>

            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">{{ $department->name }}</h3>

                    <p class="text-muted text-center"> </p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item ">
                            <b>Opis</b> <a class="pull">{{ $department->description }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary"><b>Edytuj</b></a>
                    <a href="{{ route('departments.pdf', ['department'=>$department]) }}" class="btn btn-success "><b>Generuj pdf</b></a><br>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pracownicy działu:</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Data dołączeniaa</th>
                        </tr>
                        @foreach($department->employees as $employee)
                            <tr>
                                <th>{{$employee->name}}</th>
                                <th>{{$employee->surname}}</th>
                                <th>{{$employee->phone}}</th>
                                <th>{{$employee->email}}</th>
                                <th>{{$employee->created_at}}</th>
                                <th><a class="label label-success" href="{{ route('employees.show', $employee) }}">wyświetl</a></th>
                                <th><a class="label label-primary" href="{{ route('employees.edit', $employee) }}">edytuj</a></th>
                                <th><form action="{{ route('employees.destroy', $employee) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="form-group">
                                            <button type="submit" class="label label-warning">Usuń</button>
                                        </div>
                                    </form></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    <!--<h3>Dodaj pracownika działu</h3>

    {{ Form::model($department,['method'=>'GET','action'=>['DepartmentController@addEmployees', $department]]) }}


    <div class="form-group">
        {{ Form::label('employeesList', 'Wybierz pracownika:') }}
        {{ Form::select('employeesList', $employees , null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Dodaj pracownika',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}-->
    </div>
@stop