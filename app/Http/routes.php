<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', ['as'=>'/', 'uses'=>'bankController@home']);
//Route::resource('welcome', 'bankController');
Route::post('balance', ['as'=>'balance', 'uses'=>'bankController@index']);
Route::post('deposit',['as'=>'deposit', 'uses'=>'bankController@create']);
Route::post('withdraw',['as'=>'withdraw', 'uses'=>'bankController@withdraw']);
Route::post('save',['as'=>'save', 'uses'=>'bankController@store']);
Route::post('cashwithdraw',['as'=>'cashwithdraw', 'uses'=>'bankController@withdrawTransaction']);

Route::get('report', ['as'=>'report','uses'=>'bankController@report']);