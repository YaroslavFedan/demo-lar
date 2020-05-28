<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace('Api')->group(function () {

    Route::get('/employees/tree/{id?}',  'EmployeesTreeController@index');

//    Route::get('/employees/tree/full',  'EmployeesTreeController@full');

    Route::get('/employee/head/{str?}/{employee_id?}', 'EmployeeHeadController@index');

//    Route::group(['middleware'=>['auth','role:admin']], function (){
//        Route::get('/employees/tree/{employee?}',  'EmployeesTreeController@index');
//    });
});

