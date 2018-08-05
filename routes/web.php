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
    Route::resource('employees', 'EmployeeController');
});

Route::group(['middleware' => ['web']], function ()
{
    Route::resource('departments', 'DepartmentController');
});

Route::group(['middleware' => ['web']], function ()
{
    Route::resource('users', 'UserController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('pdf/{id}',array('as'=>'pdf','uses'=>'DepartmentController@pdf'));
