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
Route::get('error_401',function(){
    return view('error_401');
});

Route::get('/','LoginController@index');
Route::post('login','LoginController@login');
Route::get('register','RegisterController@register');
Route::post('registeremp','RegisterController@store');
Route::get('logout','LoginController@logout');

Route::group(['middleware'=>['checkRole']],function(){
    Route::get('welcome','UserController@index');
    Route::get('viewEmp','EmployeeController@listall');
    Route::put('updateemp','EmployeeController@update');
    Route::get('addEmp','EmployeeController@create');
    Route::post('createEmp','EmployeeController@store');
    Route::get('editEmp/{id}','EmployeeController@getUser');
    Route::put('update-employee','EmployeeController@update');
    Route::get('deleteEmp/{id}','EmployeeController@delete');
    Route::get('viewSkill/{id}','SkillsController@view');
    Route::get('deleteSkill/{id}','SkillsController@destroy');
    Route::get('addSkills','SkillsController@create');
    Route::post('skill_create','SkillsController@store');
   
});

Route::group(['middleware'=>['checkEmployee']],function(){
    Route::get('employee','EmployeeController@index');
    Route::get('addEmpSkill','SkillsController@empSkill');
    Route::get('viewSkills','SkillsController@viewSkills');
    Route::post('skillEmpCreate','SkillsController@empStore');
    Route::get('deleteEmpSkill/{id}','SkillsController@deleteSkill');
    
});