<?php

namespace App\Http\Controllers\Admin;


use App\Employee;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'count_employees'=>Employee::all()->count(),
            'count_position'=>Position::all()->count()
        ];

        return view('admin.home.index', compact('data'));
    }
}
