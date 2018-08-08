@extends('adminlte::page')


@section('content')

    @if(Session::has('success'))
        <div class="callout callout-success">
            <h4>{{ Session::get('success') }}</h4>
        </div>
    @endif

    <h1>Lista Działów</h1>

    <a class="btn btn-success" href="{{ route('departments.create') }}">Dodaj dział</a>

    <div class="">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pracownicy działu:</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>@sortablelink('name', 'Nazwa')</th>
                        <th>@sortablelink('description', 'Opis')</th>
                        <th>@sortablelink('created_at', 'Data dodania')</th>
                    </tr>
                    @foreach($departments as $department)
                        <tr>
                            <th>{{$department->name}}</th>
                            <th>{{ str_limit($department->description, 10)}}</th>
                            <th>{{ str_limit($department->created_at)}}</th>
                            <th><a class="label label-success" href="{{ route('departments.show', $department) }}">wyświetl</a></th>
                            <th><a class="label label-primary" href="{{ route('departments.edit', $department) }}">edytuj</a></th>
                            <th><form action="{{  route('departments.destroy', ['department' => $department]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <button type="submit" class="label label-warning">Usuń</button>
                                    </div>
                                </form></th>
                        </tr>
                    @endforeach
                    {!! $departments->appends(\Request::except('page'))->render() !!}
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@stop