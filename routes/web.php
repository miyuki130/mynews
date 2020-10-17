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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::get('profile/create','Admin\ProfileController@add'); 
     Route::get('news','Admin\NewsController@index');
     //Route::get('profile/edit','Admin\ProfileController@edit');　/*No21の課題で追記　エラーになるからコメントアウト*/
     Route::post('news/create','Admin\NewsController@create'); //NO22でこちらに修正
     Route::post('profile/create','Admin\ProfileController@create'); //No22課題で追記
     Route::post('profile/edit','Admin\ProfileController@update'); //No22課題で追記
     Route::get('profile/edit','Admin\ProfileController@edit'); //No26課題で追記
     Route::get('news/edit', 'Admin\NewsController@edit');
     Route::post('news/edit', 'Admin\NewsController@update');
     Route::get('news/delete', 'Admin\NewsController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');

Route::get('/profile','ProfileController@index');