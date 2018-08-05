@extends('adminlte::page')


@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
   <table class="table table-striped">
       <thead>
            <tr>
                <th>@sortablelink('name', 'Nazwa')</th>
                <th>@sortablelink('description', 'Opis')</th>
                <th>@sortablelink('created_at', 'Data dodania')</th>
            </tr>
       </thead>
       <tbody>

       @foreach($departments as $department)
                <tr>
                    <th>{{$department->name}}</th>
                    <th>{{ str_limit($department->description, 10)}}</th>
                    <th>{{ str_limit($department->created_at)}}</th>
                    <th><a class="btn btn-success" href="{{ route('departments.show', $department->id) }}">wyświetl</a></th>
                    <th><a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}">edytuj</a></th>
                    <th><form action="{{ route('departments.destroy', ['id' => $department->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </div>
                        </form></th>
                </tr>
            @endforeach
       {!! $departments->appends(\Request::except('page'))->render() !!}

       </tbody>
   </table>
@stop