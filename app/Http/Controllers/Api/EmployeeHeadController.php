<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeHeadResource;
use Illuminate\Http\Request;

class EmployeeHeadController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->str) && strlen($request->str) >= 3){
            
           return EmployeeHeadResource::collection(Employee::heads($request->str)->get());
        }else{
            return response()->json([
                'status' => 'failed',
                'data' => null,
                'message' => 'You must enter at least 3 characters'
            ], 404);
        }
    }
}
