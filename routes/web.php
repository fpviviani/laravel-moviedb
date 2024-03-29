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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');
Route::get('/relatorio-1', ['as'=>'relatorio.1', 'uses'=>'HomeController@relatorio1']);
Route::get('/relatorio-2', ['as'=>'relatorio.2', 'uses'=>'HomeController@relatorio2', 'middleware' => 'regular']);

// Users
Route::group(['prefix' => 'relatorios'], function () {
    Route::post('/relatorio-1', ['as'=>'comum.store', 'uses'=>'RelatorioController@relatorio1']);
    Route::post('/relatorio-2', ['as'=>'premium.store', 'uses'=>'RelatorioController@relatorio2']);
});
