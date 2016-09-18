<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {return view('welcome');});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/search', function () { return view('properties.search'); });
Route::get('/overview', function () { return view('properties.overview'); });
Route::get('/parcels', function () { return view('properties.parcels'); });
Route::get('/occupancy', function () { return view('properties.occupancy'); });
Route::get('/structured', function () { return view('properties.structured'); });
Route::get('/blank', function () { return view('properties.blank'); });
Route::post('/search', 'PropertyController@search');
Route::get('/search/{id}', 'PropertyController@show');

Route::get('/adminsearch', function () { return view('properties.adminsearch'); });
Route::post('/adminsearch', 'PropertyController@adminsearch');

Route::post('addDoc', 'DocumentController@store');

Route::get('/payment', 'Payment_transactionController@index');

Route::get('mydocs', 'PropertyController@index');
Route::get('todo', 'DocumentController@pending');
Route::get('docreview/{id}', 'DocumentController@show');
