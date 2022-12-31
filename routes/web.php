<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

    return view('login');
});

//Authentication
Route::post('loginuser', 'AuthenticationController@login');
Route::get('signout', 'AuthenticationController@signout');


//Home
Route::get('home', 'HomeController@index');

//profile
Route::get('profile','AuthenticationController@profile');
Route::post('profileupd','AuthenticationController@profileupd');
Route::post('changepass','AuthenticationController@changepass');

//Admin
Route::get('students', 'AdminController@students');
Route::post('storestudent', 'AdminController@storeStudent');

Route::get('deleteStudent/{id}', 'AdminController@destroy');
Route::get('fsupervisor', 'AdminController@fsupervisor');
Route::post('storefsupervisor', 'AdminController@storefsupervisor');
Route::get('deleteFsupervisor/{id}', 'AdminController@destroy2');
Route::get('company', 'AdminController@company');
Route::post('storecompany', 'AdminController@storecompany');
Route::get('deleteCsupervisor/{id}', 'AdminController@destroy3');

//Student
Route::get('MyLogbooks','StudentsController@index');
Route::post('storelogbook','StudentsController@store');
Route::get('deleteLogbook/{id}','StudentsController@destroy');

//Faculty Supervisor
Route::get('MyStudents','FacultySupervisorController@index');
Route::get('vLogs/{id}','FacultySupervisorController@logbooks');
Route::post('updatemarks','FacultySupervisorController@update')->name('updatemarks');

//Company Supervisor
Route::get('MyStudentsComp','CompanySupervisorController@index');
Route::get('cLogs/{id}','CompanySupervisorController@logbooks');
Route::post('compupdatemarks','CompanySupervisorController@update')->name('compupdatemarks');

//Export
Route::get('exportusr', 'AuthenticationController@export')->name('export');


//Supervisor Survey
//Route::resource('svSurvey', 'SvController');
Route::get('insert', 'SvController@show');
Route::post('svSurvey', 'SvController@insert');

Route::get('list', 'SvController@view');

