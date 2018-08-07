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

    {{ Form::model($department,['method'=>'PATCH','action'=>['DepartmentController@update', $department]]) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa:') }}
        {{ Form::text('name', $department->name, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Opis:') }}
        {{ Form::textarea('description', $department->description, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop