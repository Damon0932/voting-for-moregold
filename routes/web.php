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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post("/voting/create", ["as" => "voting.create", "uses" => "HomeController@voting"]);
Route::any("/voting/statistics", ["as" => "voting.statistics", "uses" => "HomeController@statistics"]);
