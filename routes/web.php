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
Route::get('/','MoviesController@index')->name('movies.index');
Route::get('/movie/{movie}','MoviesController@show')->name('movies.show');

Route::get('/actors','ActoresController@index')->name('actors.index');
Route::get('/actors/page/{page?}','ActoresController@index');
Route::get('/actors/{actor}','ActoresController@show')->name('actors.show');

Route::get('/tv','TvContrller@index')->name('tv.index');
Route::get('/tv/{id}','TvContrller@show')->name('tv.show');