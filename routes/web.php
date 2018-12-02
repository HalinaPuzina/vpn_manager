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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'IndexController@index')->name('home');
//
Route::get('companies', 'CompanyController@lists')->name('companies-list');
Route::get('companies/edit/{id}', 'CompanyController@edit')->name('company-edit');
Route::get('companies/new', 'CompanyController@newCompany')->name('company-new');
//
Route::get('users', ['as' => 'users-list', 'uses' => 'UserController@lists']);
Route::get('users/edit/{id}', 'UserController@edit')->name('user-edit');
Route::get('users/new', 'UserController@newUser')->name('user-new');
//
Route::get('report', 'ReportController@lists')->name('report');
//
Route::put('companies/{id}', 'AjaxController@updateCompany')->name('update-company');
Route::post('companies/create', 'AjaxController@createCompany')->name('create-company');
Route::get('companies/delete/{id}', 'AjaxController@deleteCompany')->name('delete-company');
//
Route::put('users/{id}', 'AjaxController@updateUser')->name('update-user');
Route::post('users/create', 'AjaxController@createUser')->name('create-user');
Route::get('users/delete/{id}', 'AjaxController@deleteUser')->name('delete-user');

