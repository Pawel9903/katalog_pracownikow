<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="font-family: DejaVu Sans;">


    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">Nazwa działu: {{ $department->name }}</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">Opis działu: {{ $department->description }}</div>
        </div>
    </div>

    <h4>Pracownicy działu:</h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Data dołączenia</th>
        </tr>
        </thead>
        <tbody>
        @foreach($department->employees as $employee)
            <tr>
                <th>{{$employee->name}}</th>
                <th>{{$employee->surname}}</th>
                <th>{{$employee->phone}}</th>
                <th>{{$employee->email}}</th>
                <th>{{$employee->created_at}}</th>
            </tr>
        @endforeach

        </tbody>
    </table>
</body>
<html>

</html>

