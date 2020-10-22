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



Route::get('/', function () {
    return view('home');
});


Route::put('Update','DrzewoController@update')->middleware('auth');;
Route::put('Move','DrzewoController@edit')->middleware('auth');;
Route::post('Add','DrzewoController@store')->middleware('auth');;
Route::post('Delete','DrzewoController@delete')->middleware('auth');;
Route::post('deleteAll','DrzewoController@deleteAll')->middleware('auth');;
Route::get('allBranch','DrzewoController@show')->middleware('auth');;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/drzewo','DrzewoController@showTree')->name('drzewo')->middleware('auth');;

