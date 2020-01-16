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

Route::group(['prefix' => 'types'], function(){
    Route::get('', 'TypeController@index')->name('type.index');
    Route::get('create', 'TypeController@create')->name('type.create');
    Route::post('store', 'TypeController@store')->name('type.store');
    Route::get('edit/{type}', 'TypeController@edit')->name('type.edit');
    Route::post('update/{type}', 'TypeController@update')->name('type.update');
    Route::post('delete/{type}', 'TypeController@destroy')->name('type.destroy');
    Route::get('show/{type}', 'TypeController@show')->name('type.show');
});

Route::group(['prefix' => 'groups'], function(){
    Route::get('', 'GroupController@index')->name('group.index');
    Route::get('create', 'GroupController@create')->name('group.create');
    Route::post('store', 'GroupController@store')->name('group.store');
    Route::get('edit/{group}', 'GroupController@edit')->name('group.edit');
    Route::post('update/{group}', 'GroupController@update')->name('group.update');
    Route::post('delete/{group}', 'GroupController@destroy')->name('group.destroy');
    Route::get('show/{group}', 'GroupController@show')->name('group.show');
});

Route::group(['prefix' => 'products'], function(){
    Route::get('', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('update/{product}', 'ProductController@update')->name('product.update');
    Route::post('delete/{product}', 'ProductController@destroy')->name('product.destroy');
    Route::get('show/{product}', 'ProductController@show')->name('product.show');
});