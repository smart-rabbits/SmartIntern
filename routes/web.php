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


//Admin
Route::get('students', 'AdminController@students');
Route::post('storestudent', 'AdminController@storeStudent');

//Student survey
// Route::resource('stuSurvey', 'StuSurveyController');
Route::get('insert', 'StuSurveyController@show');
Route::post('stuSurvey', 'StuSurveyController@insert');

//Supervisor Survey
Route::resource('svSurvey', 'SvController');
Route::get('insert', 'SvController@show');
Route::post('svSurvey', 'SvController@insert');
