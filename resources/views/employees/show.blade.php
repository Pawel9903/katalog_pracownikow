@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('storage/'.$employee->imgUrl) }}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                                <h4>{{ $employee->name." ".$employee->surname }}</h4>
                            <ul>
                                <li>email: {{ $employee->email }}</li>
                                <li>tel: {{ $employee->phone }}</li>
                                    <li>działy:</li>
                                <ul>
                                @foreach($employee->departments as $department)
                                    <li>{{ $department->name }}</li>
                                @endforeach
                                </ul>
                                <li>opis: {{ $employee->description }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="">
            <form action="{{ route('employees.destroy',$employee) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </div>
            </form>
            <a class="btn btn-success" href="{{ route('employees.edit', $employee) }}">edytuj</a>
        </div>
    </div>

@stop