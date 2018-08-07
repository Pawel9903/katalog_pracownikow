<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $departments = Department::sortable()->paginate(5);

        return view('departments.index', ['departments' => $departments]);
    }

    public function show(Department $department)
    {
        $department->sortable()->paginate(5);


        return view('departments.show', ['department'=> $department]);
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
