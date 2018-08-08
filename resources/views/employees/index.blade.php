@extends('adminlte::page')

@section('content')
    @if(Session::has('success'))
        <div class="callout callout-success">
            <h4>{{ Session::get('success') }}</h4>
        </div>
    @endif

    <h1 class="">Lista Pracowników</h1>
    <a class="btn btn-success deletee" href="{{ route('employees.create') }}">Dodaj pracownika</a>


    <div class="">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pracownicy:</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>@sortablelink('name', 'Imię')</th>
                        <th>@sortablelink('surname', 'Nazwisko')</th>
                        <th>@sortablelink('phone', 'Tel.')</th>
                        <th>@sortablelink('email', 'Email')</th>
                        <th>@sortablelink('created_at', 'Data dodania')</th>
                    </tr>
                    @foreach($employees as $employee)
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
                    {!! $employees->appends(\Request::except('page'))->render() !!}
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@stop