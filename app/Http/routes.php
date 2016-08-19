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
     })->name('home');
    Route::get('/shop', [
     	'uses' => 'ProductController@getMainPage', 
     	'as' => 'shop'     
     	]);
    Route::get('/sp', [
     	'uses' => 'PurchaseController@getMainPage', 
     	'as' => 'sp'
     	]);
    // AUTHENTIFICATION 
    Route::get('/login',  'UserController@getLogIn');
    Route::post('/login', 'UserController@postLogIn');
    Route::get('/logout', 'UserController@getLogOut');
    //REGISTRATION
    Route::get('/signup',  'UserController@getSignUp');
    Route::post('/signup', 'UserController@postSignUp');
    /*ADD TO CART*/
    Route::get('/add-to-cart/{id}', [
        'uses' => 'ProductController@getAddToCart',
        'as' => 'product.addToCart'
        ]);
    /**/
    /*ADD TO CART*/
    Route::get('/shopping-cart', [
        'uses' => 'ProductController@getCart',
        'as' => 'product.shoppingCart'
        ]);
    /**/
    /*SHOW PRODUCTS IN SUBCATEGORY*/
    Route::get('/subcategory/{id}/show', [
        'uses' => 'ProductController@getSubcategoryList',
        'as' => 'product.subcategory.list'
        ]);
    /**/
    /*SHOW SINGLE PRODUCTS*/
    Route::get('/product/{id}/show', [
        'uses' => 'ProductController@getProduct',
        'as' => 'product.show'
        ]);
    /**/
    /*ORDER A CALLBACK*/
    Route::post('/modals/callbyuser', [
        'uses' => 'UserController@postCallbackByUser',
        'as' => 'modals.callbyuser.post'
        ]);
    Route::post('/modals/call', [
        'uses' => 'UserController@postCallback',
        'as' => 'modals.call.post'
        ]);
    /**/
});

