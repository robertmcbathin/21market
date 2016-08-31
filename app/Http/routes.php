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
    Route::get('/eula', ['uses' => 'UserController@showEula', 'as' => 'eula']);
    Route::get('/privacy', ['uses' => 'UserController@showPrivacyPolitics', 'as' => 'privacy']);
    // AUTHENTIFICATION 
    Route::get('/login',  'UserController@getLogIn');
    Route::post('/login', 'UserController@postLogIn');
    Route::get('/logout', 'UserController@getLogOut');
    //REGISTRATION
    Route::get('/signup',  'UserController@getSignUp')->name('auth.signup');
    Route::post('/signup', 'UserController@postSignUp');
    Route::get('/account_activated', 'UserController@getActivationCallback')->name('activation.ok');
    /*ADD TO CART*/
    Route::get('/shop/add-to-cart/{id}', [
        'uses' => 'ProductController@getAddToCart',
        'as' => 'product.addToCart'
        ]);
    /**/
    /*ADD TO CART*/
    Route::get('/shop/shopping-cart', [
        'uses' => 'ProductController@getCart',
        'as' => 'product.shoppingCart'
        ]);
    /**/
    /*REDUCE 1 ITEM*/
    Route::get('/shop/reduce/{id}', [
        'uses' => 'ProductController@getRemoveItem',
        'as' => 'product.remove'
        ]);
    /**/
    /*REMOVE 1 ITEM*/
    Route::get('/shop/remove/{id}', [
        'uses' => 'ProductController@getReduceByOne',
        'as' => 'product.reduceByOne'
        ]);
    /*SHOW PRODUCTS IN SUBCATEGORY*/
    Route::get('shop/subcategory/{id}/show', [
        'uses' => 'ProductController@getSubcategoryList',
        'as' => 'product.subcategory.list'
        ]);
    /**/
    /*SHOW SINGLE PRODUCTS*/
    Route::get('/shop/product/{id}/show', [
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
    /*DESIRES*/
    Route::post('/modals/desirebyuser', [
        'uses' => 'UserController@postDesireByUser',
        'as' => 'modals.desirebyuser.post'
        ]);
    Route::post('/modals/desire', [
        'uses' => 'UserController@postDesire',
        'as' => 'modals.desire.post'
        ]);
    /**/
    /*CONFIRM ORDER*/
    Route::get('/shop/confirm',[
        'uses' => 'ProductController@getConfirm',
        'as' => 'shop.confirm'
        ]);
    Route::get('/shop/confirmed',[
        'uses' => 'ProductController@getConfirmed',
        'as' => 'shop.confirmed'
        ]);
    Route::post('/shop/confirm',[
        'uses' => 'ProductController@postConfirm',
        'as' => 'shop.confirm.post'
        ]);
    /**/
    /*CONFIRM ORDER*/
    Route::get('/shop/fast-confirm',[
        'uses' => 'ProductController@getFastConfirm',
        'as' => 'shop.fast-confirm'
        ]);
    Route::get('/shop/fast-confirmed',[
        'uses' => 'ProductController@getFastConfirmed',
        'as' => 'shop.fast-confirmed'
        ]);
    Route::post('/shop/fast-confirm',[
        'uses' => 'ProductController@postFastConfirm',
        'as' => 'shop.fast-confirm.post'
        ]);
    /**/
    Route::get('/shop/about',function(){
        return view('shop.about');
    })->name('shop.about');
    Route::get('/shop/how-to-order',function(){
        return view('shop.how_to_order');
    })->name('shop.how-to-order');
    Route::get('/shop/delivery-points',function(){
        return view('shop.delivery_points');
    })->name('shop.delivery-points');

});
Route::group(['middleware' => ['auth']], function(){
    /*PROFILE*/
    Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'profile'
        ]);
    /**/
    });

