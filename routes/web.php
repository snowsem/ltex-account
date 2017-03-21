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

Route::get('/home', 'HomeController@index');
Route::resource('comments', 'CommentController');
Route::resource('issues', 'IssueController');
Route::post('issues/{id}', 'IssueController@storeComment');
Route::resource('samples', 'SampleController');
Route::resource('outlets', 'OutletController');
