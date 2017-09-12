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
})->name('mainPage');

Route::get('/products', 'ProductController@index')->name('all.products');
Route::get('/products/create', 'ProductController@create')->name('create.product');
Route::post('/products/store', 'ProductController@store')->name('store.product');
Route::get('/products/{id}', 'ProductController@show')->name('single.product');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('edit.product');
Route::post('/products/{id}/update', 'ProductController@update')->name('update.product');
Route::get('/products/{id}/delete', 'ProductController@delete')->name('delete.product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
