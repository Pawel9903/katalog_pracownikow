@extends('adminlte::page')

@section('content')

    <h1 class="text-center">Panel użytkownika</h1>


    <div class="container">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"  src="{{ asset('storage/profile/default.png') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center"> </p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Data dodania</b> <a class="pull">{{ $user->created_at }}</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-lg-1">
                        <form class="" action="{{ route('users.destroy', ['id' => $user]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary"><b>Edytuj</b></a>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@stop