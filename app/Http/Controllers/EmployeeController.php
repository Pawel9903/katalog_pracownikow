<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Section;
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
        $employees = Employee::latest()->get();

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

       return redirect()->action('EmployeeController@index');
    }

    public function show($id)
    {
        $employee = Employee::findOrfail($id);

        return view('employees.show', ['employee'=>$employee]);
    }

    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->delete();
        return redirect()->action('EmployeeController@index');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', ['employee'=>$employee]);
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
        return redirect()->action('EmployeeController@index');
    }
}
