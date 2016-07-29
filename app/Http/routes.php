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
Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
    return view('index');
     });
    Route::get('/shop', [
     	'uses' => 'ProductController@getMainPage', 
     	'as' => 'shop'     
     	]);
    Route::get('/sp', [
     	'uses' => 'PurchaseController@getMainPage', 
     	'as' => 'sp'
     	]);
    // Маршруты аутентификации...
    Route::get('/auth/login', 'Auth\AuthController@getLogIn');
    Route::post('/auth/login', 'Auth\AuthController@postLogIn');
    Route::get('/auth/logout', 'Auth\AuthController@getLogOut');

});

