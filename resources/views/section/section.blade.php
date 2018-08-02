@extends('adminlte::page')
@section('content')
    @foreach($sections as $section)
        <p>{{$section->name}}</p>
    @endforeach
@stop