<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::get()->toTree();

        return view('admin.home.index', compact('employees'));
    }
}
