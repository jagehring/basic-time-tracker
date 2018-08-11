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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/time', 'TimesController');
Route::post('clockin', ['as'=> 'clockin.clockin', 'uses' => 'TimesController@clockin']);
Route::post('clockout', ['as'=> 'clockout.clockout', 'uses' => 'TimesController@clockout']);
Route::resource('/project', 'ProjectController');
Route::get('project/{id}/delete', ['as'=> 'project.delete', 'uses' => 'ProjectController@destroy']);
Route::get('project/{id}', ['as'=> 'project.show', 'uses' => 'ProjectController@show']);
