<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);


Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
//        'name' => 'admin.',
        'middleware' => ['role:admin']
    ], function () {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::resource('/employee', 'EmployeeController', ['as' => 'admin','except'=>'show']);
    });

    Route::group([
        'namespace' => 'User',
        'prefix' => 'user',
//        'name' => 'user.',
        'middleware' => 'role:user'
    ], function () {
        Route::get('/', 'HomeController@index')->name('user.home');

    });

});

