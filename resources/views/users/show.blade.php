@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                {{ $user->name }}
                                <p>hasło: {{ $user->password }}</p>
                                <p>email: {{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop