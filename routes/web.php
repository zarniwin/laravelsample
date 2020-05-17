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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Admin','middleware'=> 'admin'],function(){
    Route::get('/users','UserController@index');
    Route::get('/users/{id}/delete','UserController@delete')->name('user_delete');
    Route::get('/users/{id}/restore','UserController@restore')->name('user_restore');
    Route::get('/menus','MenuController@index');
    Route::get('/menus/create','MenuController@create');
    Route::post('/menus/create','MenuController@store');
    Route::get('/menus/{id}/edit','MenuController@edit')->name('menu_edit');
    Route::post('/menus/{id}/edit','MenuController@update');
    Route::get('/menus/{id}/delete','MenuController@delete')->name('menu_delete');
    Route::get('/menus/{id}/restore','MenuController@restore')->name('menu_restore');
    Route::get('/menus/{id}/forcedelete','MenuController@forceDelete')->name('menu_forcedelete');    
});

Route::group(['namespace'=>'Admin','middleware'=>'superadmin'],function(){
    Route::get('/users/{id}/edit','UserController@edit')->name('user_edit');
    Route::post('/users/{id}/edit','UserController@update');
    Route::get('/users/{id}/forcedelete','UserController@forceDelete')->name('user_forcedelete');
});


 