<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();

        return view('departments.index', ['departments' => $departments]);
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

        return redirect()->action('DepartmentController@index');
    }


    public function destroy($id)
    {
        $department = Department::where('id', $id)->delete();
        return redirect()->action('DepartmentController@index');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', ['department'=>$department]);
    }

    public function update($id, Request $request)
    {
        $validationData = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->action('DepartmentController@index');
    }
}
