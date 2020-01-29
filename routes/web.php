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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PageController@index')->name('front.index');

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

Route::group(['prefix' => 'ingridients'], function(){
    Route::get('', 'IngridientController@index')->name('ingridient.index');
    Route::get('create', 'IngridientController@create')->name('ingridient.create');
    Route::post('store', 'IngridientController@store')->name('ingridient.store');
    Route::get('edit/{ingridient}', 'IngridientController@edit')->name('ingridient.edit');
    Route::post('update/{ingridient}', 'IngridientController@update')->name('ingridient.update');
    Route::post('delete/{ingridient}', 'IngridientController@destroy')->name('ingridient.destroy');
    Route::get('show/{ingridient}', 'IngridientController@show')->name('ingridient.show');
});

Route::group(['prefix' => 'p-ingridients'], function(){
    Route::get('', 'ProductIngridientController@index')->name('p-ingridient.index');
    Route::get('create', 'ProductIngridientController@create')->name('p-ingridient.create');
    Route::post('store', 'ProductIngridientController@store')->name('p-ingridient.store');
    Route::get('edit/{group}', 'ProductIngridientController@edit')->name('p-ingridient.edit');
    Route::post('update/{group}', 'ProductIngridientController@update')->name('p-ingridient.update');
    Route::post('delete/{p-ingridient}', 'ProductIngridientController@destroy')->name('p-ingridient.destroy');
    Route::get('show/{p-ingridient}', 'ProductIngridientController@show')->name('p-ingridient.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Add product to cart route
Route::get('add-product/{product}', 'CartController@add')->name('add');

// Paysera testavimo rout'as
Route::get('paysera-test', 'HomeController@test')->name('test');
Route::post('pay', 'HomeController@pay')->name('pay');


Route::match(['GET', 'POST'], 'accept', 'HomeController@accept')->name('accept');
Route::match(['GET', 'POST'], 'cancel', 'HomeController@cancel')->name('cancel');
Route::match(['GET', 'POST'], 'callback', 'HomeController@callback')->name('callback');