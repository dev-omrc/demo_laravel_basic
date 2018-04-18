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

Route::get('/', 'DistroController@getAll')->name('index');

Route::prefix('distro')->name('distro.')->group(function(){

    Route::middleware('auth')->group(function(){
        Route::get('index', 'DistroController@index')->name('index');
        Route::get('list', 'DistroController@list')->name('list');
        Route::get('show/{distro}', 'DistroController@show')->name('show');
        Route::post('update', 'DistroController@update')->name('update');
        Route::post('create', 'DistroController@create')->name('create');
        Route::delete('delete/{distro}', 'DistroController@delete')->name('delete');
    });

    Route::get('all', 'DistroController@getAll')->name('all');

});
Auth::routes();
