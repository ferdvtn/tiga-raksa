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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/member/{id}', 'HomeController@detail');
Route::get('/export', 'HomeController@export');

Route::group(['middleware' => ['administrator']], function () {
    Route::get('/form/{id?}', 'HomeController@form');
    Route::post('/member', 'HomeController@insert');
    Route::put('/member', 'HomeController@update');
    Route::delete('/member', 'HomeController@delete');
});
