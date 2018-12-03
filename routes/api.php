<?php

use Illuminate\Http\Request;
use App\Company;

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
//companies
Route::get('companies', 'CompanyController@index');
Route::get('companies/{id}', 'CompanyController@show');
Route::post('companies/create', 'CompanyController@create');
Route::put('companies/{id}', 'CompanyController@update');
Route::delete('companies/{id}', 'CompanyController@delete');
Route::get('companies/{id}', 'CompanyController@companiesUsers');
//users
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::post('users/create', 'UserController@create');
Route::put('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@delete');

//report
Route::post('report', 'ReportController@index');

//generate
Route::get('generate','GenerateController@index');

