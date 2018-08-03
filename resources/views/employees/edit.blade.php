@extends('adminlte::page')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::model($employee,['method'=>'PATCH','action'=>['EmployeeController@update', $employee->id]]) }}

    <div class="form-group">
        {{ Form::label('name', 'Imię:') }}
        {{ Form::text('name', $employee->name, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('surname', 'Nazwisko:') }}
        {{ Form::text('surname', $employee->surname, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Numer telefonu:') }}
        {{ Form::text('phone', $employee->phone, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', $employee->email, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Opis:') }}
        {{ Form::textarea('description', $employee->description, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('departmentsList', 'Wybierz dział(y):') }}
        {{ Form::select('departmentsList[]', $departments , null, ['class'=>'form-control', 'multiple']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop