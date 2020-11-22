<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class TableTestController extends Controller
{
    public function index()
    {
        $employees = [];
        foreach (Employee::all() as $employee)
            $employees[$employee->id] = $employee->json();
        return view("test.table", ["employees" => $employees]);
    }
}
