@extends('adminlte::page')

@section('content')

    <h1 class="text-center">Panel pracownika</h1>

    <div class="container">
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" @if($employee->imgUrl) src="{{ asset('storage/'.$employee->imgUrl) }}" @else src="{{ asset('storage/profile/default.png') }}" @endif alt="User profile picture">

            <h3 class="profile-username text-center">{{ $employee->name." ".$employee->surname }}</h3>

            <p class="text-muted text-center"> </p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Imię</b> <a class="pull">{{ $employee->name }}</a>
                </li>
                <li class="list-group-item">
                    <b>Nazwisko</b> <a class="pull">{{ $employee->surname }}</a>
                </li>
                <li class="list-group-item">
                    <b>Opis</b> <a class="pull">{{ $employee->description }}</a>
                </li>
                <li class="list-group-item">
                    <b>Data dodania</b> <a class="pull">{{ $employee->created_at }}</a>
                </li>
                <li class="list-group-item">
                    <b>Działy</b>
                    <ul>
                    @foreach($employee->departments as $department)
                            <li><a class="pull">{{ $department->name }}</li>
                        @endforeach
                    </ul>
                </li>
            </ul>

                <form class="col-2" action="{{ route('employees.destroy',$employee) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </div>
                </form>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary"><b>Edytuj</b></a>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
@stop