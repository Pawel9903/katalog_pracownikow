@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Witaj w panelu pracowników</h1>
@stop

@section('content')
    @if(Session::has('error'))
        <div class="callout callout-danger">
            <h4>{{ Session::get('error') }}</h4>
        </div>
    @endif
@stop