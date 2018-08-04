@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img @if($employee->imgUrl) src="{{ asset('avatars/'.$employee->imgUrl) }} @endif" src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                {{ $employee->name." ".$employee->surname }}</h4>
                                <p>email: {{ $employee->email }}</p>
                                <p>tel: {{ $employee->phone }}</p>
                                <p>działy:</p>
                                    @foreach($employee->departments as $department)
                                    <p>{{ $department->name }}</p>
                                    @endforeach
                                <p>opis: {{ $employee->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="">
            <form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </div>
            </form>
            <a class="btn btn-success" href="{{ route('employees.edit', $employee->id) }}">edytuj</a>
        </div>
    </div>





@stop