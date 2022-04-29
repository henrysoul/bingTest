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

Route::get('/', 'EmployeeController@index');
Route::post('add_emloyee','EmployeeController@store');
Route::post('update_emloyee','EmployeeController@update');
Route::get('/delete_emloyee/{id}','EmployeeController@delete_emloyee');
// Route::get('/delete_emloyee',function(){
//     dd("in");
// });
