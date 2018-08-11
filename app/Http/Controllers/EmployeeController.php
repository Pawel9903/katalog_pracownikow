<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->sortable()->paginate(5);

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

        if($request->hasFile('imgUrl'))
        {
            $employee->imgUrl = Storage::disk('public')->putFile('/profile', $request->file('imgUrl'));
        }

        $employee->save();
        $departmentId = $request->input('departmentsList');
        $employee->departments()->attach($departmentId);

        $request->session()->flash('success', 'Dodano pracownika');
        return redirect()->action('EmployeeController@index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee'=>$employee]);
    }

    public function destroy(Employee $employee, Request $request)
    {
        Storage::disk('public')->delete($employee->imgUrl);
        $employee->delete();
        $request->session()->flash('success', 'Usunięto pracownika');
        return redirect()->action('EmployeeController@index');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::pluck('name', 'id');
        return view('employees.edit', ['employee'=>$employee, 'departments' => $departments]);
    }

    public function update(Employee $employee, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "surname" => "required",
            "phone" => "required|numeric",
            "email" => "required",
            "description" => "required",
        ]);

        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->description = $request->input('description');
        $employee->phone = $request->input('phone');

        if($request->hasFile('imgUrl'))
        {
            if($employee->imgUrl)
            {
                Storage::disk('public')->delete($employee->imgUrl);
            }
            $employee->imgUrl = Storage::disk('public')->putFile('/profile', $request->file('imgUrl'));
        }

        $employee->update();

        $departmentId = $request->input('departmentsList');
        $employee->departments()->attach($departmentId);

        $request->session()->flash('success', 'Edytowano pracownika');
        return redirect()->action('EmployeeController@index');
    }
}
