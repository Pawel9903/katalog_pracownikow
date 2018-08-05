<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Section;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $employees = Employee::sortable()->paginate(5);

        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        $departments = Department::pluck('name', 'id');

        return view('employees.create', ['departments' => $departments]);
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
           "name" => "required",
           "surname" => "required",
           "phone" => "required|numeric",
           "email" => "required|email",
           "description" => "required",
        ]);

        $employee = new Employee($request->all());

        if($request->imgUrl)
        {
            $photoName = time().'.'.$request->imgUrl->getClientOriginalExtension();
            $request->imgUrl->move(public_path('avatars'), $photoName);
            $employee->imgUrl = $photoName;
        }

        $employee->save();
        $departmentId = $request->input('departmentsList');
        $employee->departments()->attach($departmentId);

        $request->session()->flash('success', 'Dodano pracownika');
        return redirect()->action('EmployeeController@index');
    }

    public function show($id)
    {
        $employee = Employee::findOrfail($id);

        return view('employees.show', ['employee'=>$employee]);
    }

    public function destroy($id, Request $request)
    {
        $employee = Employee::where('id', $id)->delete();
        $request->session()->flash('success', 'Usunięto pracownika');
        return redirect()->action('EmployeeController@index');
    }

    public function edit($id)
    {
        $departments = Department::pluck('name', 'id');
        $employee = Employee::findOrFail($id);
        return view('employees.edit', ['employee'=>$employee, 'departments' => $departments]);
    }

    public function update($id, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "surname" => "required",
            "phone" => "required|numeric",
            "email" => "required",
            "description" => "required",
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        $departmentId = $request->input('departmentsList');
        $employee->departments()->attach($departmentId);

        $request->session()->flash('success', 'Edytowano pracownika');
        return redirect()->action('EmployeeController@index');
    }
}
