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
//
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/','orderController@index')->name('order');
Route::get('order_info','orderController@index');
Route::get('/','orderController@index');
Route::get('/add_order', [
    'uses'=>'orderController@getOrder',
    'as'=>'order.add_order'
]);

Route::post('/add_order', [
    'uses'=>'orderController@postOrder',
    'as'=>'order.add_order'
]);

Route::get('order/{id}','orderController@getstatus')->name('orderController.status');
Route::post('order/{id}','orderController@poststatus')->name('orderController.status');
