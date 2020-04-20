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
//====Frontend
Route::view('/','index')->name('home');
Route::view('/secure', 'secure')->name('secure');

//===Auth
Auth::routes();
//===Admin
//Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', 'HomeController@index')->name('dashboard');
//});

//===File
Route::group(['prefix' => 'files'], function () {
    Route::get('documents/','FilesController@index')->name('archivo.buscar');
    Route::get('documents/crear','FilesController@create')->name('archivo.crear');
    Route::post('documents/subir','FilesController@store')->name('archivo.subir');
    Route::post('documents/editar/{id}','FilesController@edit')->name('archivo.editar');
    Route::post('documents/eliminar{id}','FilesController@destroy')->name('archivo.eliminar');


});


