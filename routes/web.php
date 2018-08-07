<?php

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

use Barryvdh\DomPDF\Facade as PDF;
Route::get('/', function (){
    return view('welcome');
});

/*Route::get('/employees/list', 'EmployeeController@employees');
Route::get('/employees/create', 'EmployeeController@create');
Route::post('/employees', 'EmployeeController@store');
Route::delete('/employees/delete/{id}',['uses' => 'EmployeeController@delete', 'as' => 'employee.delete']);
Route::get('/employees/details/{id}', 'EmployeeController@details');*/

Route::group(['middleware' => ['web']], function ()
{
    Route::resource('departments', 'DepartmentController');
    Route::resource('users', 'UserController');
    Route::resource('employees', 'EmployeeController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pdf/{department}',array('as'=>'departments.pdf','uses'=>'DepartmentController@pdf'));
Route::get('departments/{department}/addEmployees',array('as'=>'departments.addEmployees','uses'=>'DepartmentController@addEmployees'));


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
