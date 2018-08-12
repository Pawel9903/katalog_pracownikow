<?php

namespace App\Http\Controllers\Voyager;


use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Voyager\VoyagerBreadController;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::sortable()->paginate(5);

        return view('voyager::departments.index', ['departments' => $departments]);
    }

    public function show(Department $department)
    {
        $department->sortable()->paginate(5);

        $emplyees = Employee::pluck('surname', 'id');

        return view('departments.show', ['department'=> $department, 'employees' => $emplyees]);
    }

    public function addEmployees(Request $request, Department $department)
    {
        $employeeId = $request->input('employeesList');
        $department->employees()->attach($employeeId);
        $emplyees = Employee::pluck('surname', 'id');

        $request->session()->flash('success', 'Edytowano pracownika');
        return redirect()->action('DepartmentController@show', ['department'=> $department, 'employees' => $emplyees]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $department = new Department($request->all());
        $department->save();

        $request->session()->flash('success', 'Dodano dział');
        return redirect()->action('DepartmentController@index');
    }


    public function destroy(Department $department, Request $request)
    {
        $department->delete();

        $request->session()->flash('success', 'Usunięto dział');
        return redirect()->action('DepartmentController@index');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', ['department'=>$department]);
    }

    public function update(Department $department, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $department->update($request->all());

        $request->session()->flash('success', 'Edytowano dział');
        return redirect()->action('DepartmentController@index');
    }

    public function pdf(Department $department)
    {
        return PDF::loadView('departments.pdf',['department'=>$department])->stream($department->name.'.pdf');
    }
}
