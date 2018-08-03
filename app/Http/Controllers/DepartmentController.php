<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $departments = Department::latest()->get();

        return view('departments.index', ['departments' => $departments]);
    }

    public function show($id)
    {
        $department = Department::findOrfail($id);

        return view('departments.show', ['department'=>$department]);
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


    public function destroy($id, Request $request)
    {
        $department = Department::where('id', $id)->delete();

        $request->session()->flash('success', 'Usunięto dział');
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

        $request->session()->flash('success', 'Edytowano dział');
        return redirect()->action('DepartmentController@index');
    }
}
