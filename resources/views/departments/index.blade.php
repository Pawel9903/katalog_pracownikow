@extends('adminlte::page')


@section('content')
   <table class="table table-striped">
       <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
            </tr>
       </thead>
            @foreach($departments as $department)
                <tr>
                    <th>{{$department->name}}</th>
                    <th>{{$department->description}}</th>
                    <th><a href="{{ route('departments.edit', $department->id) }}">edytuj</a></th>
                    <th><form action="{{ route('departments.destroy', ['id' => $department->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                </tr>
            @endforeach
       <tbody>

       </tbody>
   </table>
@stop