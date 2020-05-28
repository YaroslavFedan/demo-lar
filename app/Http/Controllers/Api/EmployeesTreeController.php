<?php

namespace App\Http\Controllers\Api;

use App\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeesTreeResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeesTreeController extends Controller
{
    public function index(Request $request)
    {
        if(!isset($request->id) || !$request->id){

            $nodes = Employee::whereIsRoot()->with('position')->get();
        }else{
            $root = Employee::findOrFail($request->id);
            $nodes = $root->children()->with('position')->get();
        }

        return EmployeesTreeResource::collection($nodes);
    }

    public function full()
    {
        $tree = Employee::with('position')->get()->toTree();
        return EmployeesTreeResource::collection($tree);
    }
}
