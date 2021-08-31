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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user', 'UserControllers@getView');
Route::get('display', 'UserControllers@display');
Route::get('destory/{id}', 'UserControllers@distory');
Route::post('doRegister', 'UserControllers@saveData');
Route::get('userProfile', 'UserControllers@saveData');


// Tasks Controllers Route
Route::get('displaytask', 'TasksControllers@display');
Route::get('addtask', 'TasksControllers@addView');
Route::post('addnew', 'TasksControllers@addTask');
Route::get('destory/{id}', 'TasksControllers@distory');
Route::get('edit/{id}', 'TasksControllers@edit');
Route::post('updatetask', 'TasksControllers@update');
