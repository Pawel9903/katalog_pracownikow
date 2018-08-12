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

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edytuj dział</h3>
        </div>
        <div class="box-body">
            {{ Form::model($department,['method'=>'PATCH','action'=>['DepartmentController@update', $department]]) }}

            <div class="form-group">
                {{ Form::label('name', 'Nazwa:') }}
                {{ Form::text('name', $department->name, ['class'=>'form-control', 'placeholder' => "Nazwa"]) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Opis:') }}
                {{ Form::textarea('description', $department->description, ['class'=>'form-control', 'placeholder' => "Opis"]) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Edytuj',['class'=>'btn btn-primary']) }}
            </div>
        </div>
            {{ Form::close() }}
    </div>
@stop