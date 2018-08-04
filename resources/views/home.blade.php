@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Witaj w panelu pracowników</h1>
@stop

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
@stop