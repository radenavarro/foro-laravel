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
////    return view('welcome');
//    return view('inicio');
//});
Route::get('/', 'InicioController@index')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categoria/{id}', 'CategoriaController@index')->name('categoria');
Route::post('/hilo', 'HiloController@createThread');

Route::get('/hilo/{id}', 'HiloController@index');
Route::get('/nuevohilo/{id}', 'NewThreadController@index');
