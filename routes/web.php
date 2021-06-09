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
Route::get('product','ProductController@getForm')->name('product.form');
Route::post('product/submit','ProductController@submitForm')->name('product.form.submit');
Route::get('product/table','ProductController@gettable')->name('product.table');
Route::get('product/edit/form/{id}','ProductController@editform')->name('product.form.edit');
Route::put('product/update/form/{id}','ProductController@updateform')->name('product.form.update');
Route::get('product/delete/form/{id}','ProductController@deleteform')->name('product.form.delete');
Route::post('product/deleteall/table','ProductController@deleteall')->name('product.table.deleteall');
Route::post('/product/destroy','ProductController@destroy')->name('product.form.delete');
Route::get('export','ProductController@export')->name('export');