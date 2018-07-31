<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->get();

        return view('employees.index')->with('employee', $employee);
    }
}
